<?php

namespace App\Services;

use App\Models\Tramite;

class TramiteService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        //print_r($where);
        return Tramite::where($where)
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