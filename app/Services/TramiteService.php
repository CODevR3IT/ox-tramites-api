<?php

namespace App\Services;

use App\Models\Tramite;

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
        $tramites = Tramite::whereJsonDoesntContain('tipo_usuarios_restringidos', $tipoUsuario[0]->id)
                      ->orWhereNull('tipo_usuarios_restringidos')
                      ->get();
        return response()->json($tramites, 200);
    }

    public function show($request)
    {
        $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);
        $data = $request->all();
        
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key, "=", $value];            
        }

        return Tramite::where($where)
            ->where(function($query) use ($tipoUsuario) {
                $query->whereJsonDoesntContain('tipo_usuarios_restringidos', $tipoUsuario[0]->id)
                    ->orWhereNull('tipo_usuarios_restringidos');
            })
            ->orderBy('descripcion')
            ->get();
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