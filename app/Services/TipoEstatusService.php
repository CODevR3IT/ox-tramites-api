<?php

namespace App\Services;

use App\Models\TipoEstatus;

class TipoEstatusService{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
             if(!strstr($key,"/")){
                $where[] = [$key,"=",$value];            
             }
        }
        return TipoEstatus::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($tipoEstatusValidado)
    {
       $tipoEstatus = TipoEstatus::create($tipoEstatusValidado);       
        return $tipoEstatus;
    }

    public static function update($tipoEstatusValidado)
    {       
        $id = $tipoEstatusValidado['id'];
        unset($tipoEstatusValidado['id']);
        $where = $tipoEstatusValidado;        
        $tipoEstatus = TipoEstatus::where('id', $id)->update($where);      
        return $tipoEstatus;
    }
    
    public static function delete($tipoEstatusValidado)
    {       
        $id = $tipoEstatusValidado['id'];
        return TipoEstatus::where('id', $id)->delete();
    }
}