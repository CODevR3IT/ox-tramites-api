<?php

namespace App\Services;

use App\Models\Tramite;
use App\Models\Subtramite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TramiteService
{
    protected $tipoUsuarioService;

    public function __construct(TipoUsuarioService $tipoUsuarioService)
    {
        $this->tipoUsuarioService = $tipoUsuarioService;
    }    

    public function todos($request)
    {
        $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);
        //error_log($tipoUsuario[0]->id);
        if(isset($tipoUsuario[0]->id)){
            $tipoUsuario = $tipoUsuario[0]->id;
        }

        $tramites = Tramite::whereJsonDoesntContain('tipo_usuarios_restringidos', $tipoUsuario)
                      ->orWhereNull('tipo_usuarios_restringidos')
                      ->get();
        return response()->json($tramites, 200);
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
            if(!strstr($key,"/")){
                $where[] = [$key, "=", $value];            
            }
        }

        return Tramite::where($where)
            ->where(function($query) use ($tipoUsuario) {
                $query->whereJsonDoesntContain('tipo_usuarios_restringidos', $tipoUsuario)
                    ->orWhereNull('tipo_usuarios_restringidos');
            })
            ->orderBy('descripcion')
            ->get();
    }

    public function showTramitesSubtramites($request)
    {
       
            try{
            //Log::error("Lo que llega en sso_user ".json_encode($request->get('sso_user')));
             $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);
             //Log::error("Lo que refresa tipousuario ".$tipoUsuario);
            if(isset($tipoUsuario[0]->id)){
                $tipoUsuario = $tipoUsuario[0]->id;
            }

            $data = $request->all();
            //Log::error("Lo que reresa data ".json_encode($data));
            $where = [];        
            foreach ($data as $key => $value) {
                if(!strstr($key,"/")){
                    $where[] = [$key, "=", $value]; 
                }           
            }
            //Log::error("Lo que trae wher e ".json_encode($where));
            $tramites = Tramite::where($where)
                ->where(function($query) use ($tipoUsuario) {
                    $query->whereJsonDoesntContain('tipo_usuarios_restringidos', $tipoUsuario)
                        ->orWhereNull('tipo_usuarios_restringidos');
                })
                ->orderBy('descripcion')
                ->get();

            //Log::error("Lo obtiene de tramites ".json_encode($tramites));
        
            foreach($tramites as $key => $tramite){                       
                $whereS = [];
                $whereS[] = ["ca_subtramites.estatus", "=", true];
                $whereS[] = ["ca_subtramites.ca_tramite_id", "=", $tramite->id];          
                
                //$where[] = [$tablePrefix . $key, "=", $value];
                
                $subtramites = Subtramite::select(
                    'ca_subtramites.*',
                    'ca_tramites.descripcion as tramite_descripcion'
                )
                ->leftJoin('ca_tramites', 'ca_subtramites.ca_tramite_id', '=', 'ca_tramites.id')
                ->where($whereS)
                ->where(function($query) use ($tipoUsuario) {
                    $query->whereJsonDoesntContain('ca_subtramites.tipo_usuarios_restringidos', $tipoUsuario)
                        ->orWhereNull('ca_subtramites.tipo_usuarios_restringidos');
                })
                ->orderBy('ca_tramites.descripcion')
                ->get();
                //Log::error("Lo obtiene de SUBTRAMITES ".json_encode($subtramites));
                $tramites[$key]['subtramites'] = $subtramites;
                
            }
            
            return $tramites;
    
        } catch (\Exception $e) {
            Log::error("Error en el proceso: " . $e->getMessage(), [
                'exception' => $e,
                'data' => $request->all()
            ]);
        }

    }

    public static function create($tramiteValidado)
    {
       $tramite = Tramite::create($tramiteValidado);    
       
        return $tramite;
    }

    public static function update($tramiteValidado)
    {       
        $id = $tramiteValidado['id'];
        unset($tramiteValidado['id']);
        $where = $tramiteValidado;        
        $tramite = Tramite::where('id', $id)->update($where);      
        return $tramite;
    }
    
    public static function delete($tramiteValidado)
    {       
        $id = $tramiteValidado['id'];
        return Tramite::where('id', $id)->delete();
    }

}