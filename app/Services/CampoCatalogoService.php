<?php

namespace App\Services;

use App\Models\CampoCatalogo;

class CampoCatalogoService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        return CampoCatalogo::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($campoCatalogoValidado)
    {
       $campoCatalogo = CampoCatalogo::create($campoCatalogoValidado);       
        return $campoCatalogo;
    }

    public static function update($campoCatalogoValidado)
    {       
        $id = $campoCatalogoValidado['id'];
        unset($campoCatalogoValidado['id']);
        $where = $campoCatalogoValidado;        
        $campoCatalogo = CampoCatalogo::where('id', $id)->update($where);      
        return $campoCatalogo;
    }
    
    public static function delete($campoCatalogoValidado)
    {       
        $id = $campoCatalogoValidado['id'];
        return CampoCatalogo::where('id', $id)->delete();
    }

}