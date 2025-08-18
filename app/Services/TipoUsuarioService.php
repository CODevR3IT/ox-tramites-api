<?php

namespace App\Services;

use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Log;

class TipoUsuarioService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            if(!strstr($key,"/")){
                $where[] = [$key,"=",$value];            
            }
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
            
            $where[] = ["descripcion","=",$tipoUsuarioLogin];
            return TipoUsuario::where($where)
            ->orderBy('id')
            ->get();
        }/*elseif(isset($user['roles'][0]['roleKey'])){
            
            $tipoRolLogin = trim($user['roles'][0]['roleKey']);
            $where[] = ["descripcion","=",$tipoRolLogin];
            $tipoUsuario = TipoUsuario::where($where)
            ->orderBy('id')
            ->get();
            if(count($tipoUsuario) > 0){
                return $tipoUsuario;
            }else{
                return 0;    
            }            
        }else{
            return 0;
        }*/       
         
    }

    public static function idUsuario($request)
    {
        $user = $request->get('sso_user');
        //print_r($user);
        return $user['id'];         
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