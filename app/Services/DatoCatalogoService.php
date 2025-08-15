<?php

namespace App\Services;

use App\Models\DatoCatalogo;


class DatoCatalogoService
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

         $info = json_decode(DatoCatalogo::where($where)
        ->orderBy('id')
        ->get());        
        
        $arr = [];
        foreach($info as $data){
            $info = json_decode($data->datos);
            $info->idReal = $data->id;
            
            $arr[] = $info;            
        }
        return $arr;
    }

    public static function showAsField($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            if(!strstr($key,"/")){
                $where[] = [$key,"=",$value];            
            }
        }

         $info = json_decode(DatoCatalogo::where($where)
        ->orderBy('id')
        ->get());        
        
        $arr = [];
        foreach($info as $data){
            $info = json_decode($data->datos);           
            $arr[] = $info;            
        }
        return $arr;
    }

    public static function create($datoCatalogoValidado)
    {         
       $datoCatalogo = DatoCatalogo::create($datoCatalogoValidado);       
        return $datoCatalogo;
    }

    public static function update($datoCatalogoValidado)
    {       
        $id = $datoCatalogoValidado['id'];
        unset($datoCatalogoValidado['id']);
        $where = $datoCatalogoValidado;        
        $datoCatalogo = DatoCatalogo::where('id', $id)->update($where);      
        return $datoCatalogo;
    }
    
    public static function delete($datoCatalogoValidado)
    {       
        $id = $datoCatalogoValidado['id'];
        return DatoCatalogo::where('id', $id)->delete();
    }

}