<?php

namespace App\Services;

use App\Models\Catalogo;

class CatalogoService
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
        return Catalogo::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($catalogoValidado)
    {
       $catalogo = Catalogo::create($catalogoValidado);       
        return $catalogo;
    }

    public static function update($catalogoValidado)
    {       
        $id = $catalogoValidado['id'];
        unset($catalogoValidado['id']);
        $where = $catalogoValidado;        
        $catalogo = Catalogo::where('id', $id)->update($where);      
        return $catalogo;
    }
    
    public static function delete($catalogoValidado)
    {       
        $id = $catalogoValidado['id'];
        return Catalogo::where('id', $id)->delete();
    }

}