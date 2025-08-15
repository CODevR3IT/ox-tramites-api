<?php

namespace App\Services;

use App\Models\Estatus;

class EstatusService{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
             if(!strstr($key,"/")){
                $where[] = [$key,"=",$value];
             }          
        }
        return Estatus::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($estatusValidado)
    {
       $estatus = Estatus::create($estatusValidado);       
        return $estatus;
    }

    public static function update($estatusValidado)
    {       
        $id = $estatusValidado['id'];
        unset($estatusValidado['id']);
        $where = $estatusValidado;        
        $estatus = Estatus::where('id', $id)->update($where);      
        return $estatus;
    }
    
    public static function delete($estatusValidado)
    {       
        $id = $estatusValidado['id'];
        return Estatus::where('id', $id)->delete();
    }
}