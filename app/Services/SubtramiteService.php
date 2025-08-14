<?php

namespace App\Services;

use App\Models\Subtramite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class SubtramiteService
{

    protected $tipoUsuarioService;

    public function __construct(TipoUsuarioService $tipoUsuarioService)
    {
        $this->tipoUsuarioService = $tipoUsuarioService;
    }

    public function todos($request)
    {
        $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);
        
        if(isset($tipoUsuario[0]->id)){
            $tipoUsuario = $tipoUsuario[0]->id;
        }

         $subtramites = Subtramite::select(
            'ca_subtramites.*', 
            'ca_tramites.descripcion as tramite_descripcion'
        )
        ->leftJoin('ca_tramites', 'ca_subtramites.ca_tramite_id', '=', 'ca_tramites.id')
        ->where(function($query) use ($tipoUsuario) {
            $query->whereJsonDoesntContain('ca_subtramites.tipo_usuarios_restringidos', $tipoUsuario)
                  ->orWhereNull('ca_subtramites.tipo_usuarios_restringidos');
        })
        ->orderBy('ca_tramites.descripcion')
        ->get();

        return $subtramites;
    }

    public function show($request)
    {
        $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);

        if(isset($tipoUsuario[0]->id)){
            $tipoUsuario = $tipoUsuario[0]->id;
        }
        
        $data = $request->all();
        
        $where = [];
        foreach ($data as $key => $value) {
            $tablePrefix = str_contains($key, '.') ? '' : 'ca_subtramites.';
            $where[] = [$tablePrefix . $key, "=", $value];          
        }
        
        return Subtramite::select(
            'ca_subtramites.*',
            'ca_tramites.descripcion as tramite_descripcion'
        )
        ->leftJoin('ca_tramites', 'ca_subtramites.ca_tramite_id', '=', 'ca_tramites.id')
        ->where($where)
        ->where(function($query) use ($tipoUsuario) {
            $query->whereJsonDoesntContain('ca_subtramites.tipo_usuarios_restringidos', $tipoUsuario)
                ->orWhereNull('ca_subtramites.tipo_usuarios_restringidos');
        })
        ->orderBy('ca_tramites.descripcion')
        ->get();
    }

    public static function create($subtramiteValidado)
    {
        error_log(json_encode($subtramiteValidado));
       $tramite = Subtramite::create($subtramiteValidado);       
        return $tramite;
    }

    public static function update($subtramiteValidado)
    {       
        $id = $subtramiteValidado['id'];
        /*********************Archivos***************************/

        if(isset($subtramiteValidado['fileb64']) || isset($subtramiteValidado['fileb641']) || isset($subtramiteValidado['fileb642'])){
            $subtramite = Subtramite::where('id', $id)->get();
            $archivos =  $subtramite[0]['files'];
            $files = [];
            $url = '';
                if(isset($subtramiteValidado['fileb64']) && isset($subtramiteValidado['ext'])){                                        
                    $ext = $subtramiteValidado['ext'];

                    //$cleanChars = preg_replace("/[^a-zA-Z0-9\_\-]/", "", $request->input('nombre'));
                    $ruta = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre'] .'.'. $ext;
                    //$url = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre'] .'/'. $ext;
                    $url = ['helper-file',$id,$subtramiteValidado['nombre'],$ext];
                    Storage::disk('local')->put(
                        $ruta,
                        base64_decode($subtramiteValidado['fileb64'])
                    );
                    array_push($files,['url_file' => $url, 'nombre' => $subtramiteValidado['nombre'] ]); 
                }else{
                    if(isset($archivos[0])){
                        array_push($files,$archivos[0]); 
                    }
                }
                if(isset($subtramiteValidado['fileb641']) && isset($subtramiteValidado['ext1'])){
                    $ext1 = $subtramiteValidado['ext1'];

                    $ruta = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre1'] .'.'.  $ext1;
                    //$url = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre1'] .'/'. $ext1;
                    $url = ['helper-file',$id,$subtramiteValidado['nombre'],$ext];
                    Storage::disk('local')->put(
                        $ruta,
                        base64_decode($subtramiteValidado['fileb641'])
                    );
                    array_push($files,['url_file' => $url, 'nombre' => $subtramiteValidado['nombre1'] ]); 
                    
                }else{
                    if(isset($archivos[1])){
                        array_push($files,$archivos[1]); 
                    }
                }
                if(isset($subtramiteValidado['fileb642']) && isset($subtramiteValidado['ext2'])){
                    $ext2 = $subtramiteValidado['ext2'];

                    $ruta = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre2'] .'.'.  $ext2;
                    //$url = 'helper-file/'. $id .'/' . $subtramiteValidado['nombre2'] .'/'. $ext2;
                    $url = ['helper-file',$id,$subtramiteValidado['nombre'],$ext];
                    Storage::disk('local')->put(
                        $ruta,
                        base64_decode($subtramiteValidado['fileb642'])
                    );
                    array_push($files,['url_file' => $url, 'nombre' => $subtramiteValidado['nombre2']]); 
                }else{
                    if(isset($archivos[2])){
                        array_push($files,$archivos[2]); 
                    }
                }

                    $subtramiteValidado = Arr::except(
                        $subtramiteValidado,
                        array_filter(
                            array_keys($subtramiteValidado),
                            fn($key) => str_starts_with($key, 'fileb64')
                        )
                    );
                    $subtramiteValidado = Arr::except(
                        $subtramiteValidado,
                        array_filter(
                            array_keys($subtramiteValidado),
                            fn($key) => str_starts_with($key, 'ext')
                        )
                    );
                    $subtramiteValidado = Arr::except(
                        $subtramiteValidado,
                        array_filter(
                            array_keys($subtramiteValidado),
                            fn($key) => str_starts_with($key, 'nombre')
                        )
                    );            
            $subtramiteValidado['files'] = json_encode($files);
            
        }
        /*******************************************************/
       
        unset($subtramiteValidado['id']);
        $where = $subtramiteValidado;        
        $subtramite = Subtramite::where('id', $id)->update($where);      
        return $subtramite;        
        
    }
    
    public static function delete($subtramiteValidado)
    {       
        $id = $subtramiteValidado['id'];
        return Subtramite::where('id', $id)->delete();
    }

}