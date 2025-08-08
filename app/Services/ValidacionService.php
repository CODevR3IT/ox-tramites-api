<?php

namespace App\Services;

use App\Models\Validacion;

class ValidacionService
{
    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
            $where[] = [$key,"=",$value];            
        }
        return Validacion::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($validacionValidado)
    {
       $validacion = Validacion::create($validacionValidado);       
        return $validacion;
    }

    public static function update($validacionValidado)
    {       
        $id = $validacionValidado['id'];
        unset($validacionValidado['id']);
        $where = $validacionValidado;        
        $validacion = Validacion::where('id', $id)->update($where);      
        return $validacion;
    }
    
    public static function delete($validacionValidado)
    {       
        $id = $validacionValidado['id'];
        return Validacion::where('id', $id)->delete();
    }
}