<?php

namespace App\Services;

use App\Models\TipoUsuario;

class TipoUsuarioService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        return TipoUsuario::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function tipoUsuario($request)
    {
        $user = $request->get('sso_user');
        if(isset($user['person']['registerType']) && isset($user['person']['personType'])){
            $tipoUsuarioLogin = trim($user['person']['registerType'])." ".trim($user['person']['personType']);
            //error_log($tipoUsuarioLogin);
            $where[] = ["descripcion","=",$tipoUsuarioLogin];
            return TipoUsuario::where($where)
            ->orderBy('id')
            ->get();
        }else{
            return 0;
        }       
         
    }

    public static function create($tipoUsuarioValidado)
    {
       $tipoUsuario = TipoUsuario::create($tipoUsuarioValidado);       
        return $tipoUsuario;
    }

    public static function update($tipoUsuarioValidado)
    {       
        $id = $tipoUsuarioValidado['id'];
        unset($tipoUsuarioValidado['id']);
        $where = $tipoUsuarioValidado;        
        $tipoUsuario = TipoUsuario::where('id', $id)->update($where);      
        return $tipoUsuario;
    }
    
    public static function delete($tipoUsuarioValidado)
    {       
        $id = $tipoUsuarioValidado['id'];
        return TipoUsuario::where('id', $id)->delete();
    }

}