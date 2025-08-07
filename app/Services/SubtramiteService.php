<?php

namespace App\Services;

use App\Models\Subtramite;

class SubtramiteService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        //print_r($where);
        return Subtramite::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($subtramiteValidado)
    {
       $tramite = Subtramite::create($subtramiteValidado);       
        return $tramite;
    }

    public static function update($subtramiteValidado)
    {       
        $id = $subtramiteValidado['id'];
        unset($subtramiteValidado['id']);
        $where = $subtramiteValidado;        
        $subtramite = Subtramite::where('id', $id)->update($where);      
        return $subtramite;
    }
    
    public static function delete($subtramiteValidado)
    {       
        $id = $subtramiteValidado['id'];
        return Subtramite::where('id', $id)->delete();
    }

}