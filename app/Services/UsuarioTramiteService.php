<?php

namespace App\Services;

use App\Models\UsuarioTramite;
use Illuminate\Support\Facades\Http;

class UsuarioTramiteService
{

    protected $tipoUsuarioService;

    public function __construct(TipoUsuarioService $tipoUsuarioService)
    {
        $this->tipoUsuarioService = $tipoUsuarioService;
    } 

    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        return UsuarioTramite::where($where)
        ->orderBy('id')
        ->get();
    }

    public function create($usuarioTramiteValidado,$request)
    {
       //$tipoUsuario = $this->tipoUsuarioService->idUsuario($request);
       $usuarioTramiteValidado['user_id'] = $this->tipoUsuarioService->idUsuario($request);       
       $usuarioTramite = UsuarioTramite::create($usuarioTramiteValidado);
       //print_r($usuarioTramiteValidado); exit();
       
        return $usuarioTramite;
    }

    public static function update($usuarioTramiteValidado)
    {       
        $id = $usuarioTramiteValidado['id'];
        unset($usuarioTramiteValidado['id']);
        $where = $usuarioTramiteValidado;        
        $usuarioTramite = UsuarioTramite::where('id', $id)->update($where);      
        return $usuarioTramite;
    }
    
    public static function delete($usuarioTramiteValidado)
    {       
        $id = $usuarioTramiteValidado['id'];
        return UsuarioTramite::where('id', $id)->delete();
    }

}