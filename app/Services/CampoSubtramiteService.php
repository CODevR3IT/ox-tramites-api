<?php

namespace App\Services;

use App\Models\CampoSubtramite;

class CampoSubtramiteService
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
        //print_r($where);
        return CampoSubtramite::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($campoSubtramiteValidado)
    {
       $tramite = CampoSubtramite::create($campoSubtramiteValidado);       
        return $tramite;
    }

    public static function update($campoSubtramiteValidado)
    {       
        $id = $campoSubtramiteValidado['id'];
        unset($campoSubtramiteValidado['id']);
        $where = $campoSubtramiteValidado;        
        $subtramite = CampoSubtramite::where('id', $id)->update($where);      
        return $subtramite;
    }
    
    public static function delete($campoSubtramiteValidado)
    {       
        $id = $campoSubtramiteValidado['id'];
        return CampoSubtramite::where('id', $id)->delete();
    }

}