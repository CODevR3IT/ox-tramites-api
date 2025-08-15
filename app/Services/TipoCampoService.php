<?php

namespace App\Services;

use App\Models\TipoCampo;

class TipoCampoService
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
        return TipoCampo::where($where)
        ->orderBy('id')
        ->get();
    }

    public static function create($tipoCampoValidado)
    {
       $tipoCampo = TipoCampo::create($tipoCampoValidado);       
        return $tipoCampo;
    }

    public static function update($tipoCampoValidado)
    {       
        $id = $tipoCampoValidado['id'];
        unset($tipoCampoValidado['id']);
        $where = $tipoCampoValidado;        
        $tipoCampo = TipoCampo::where('id', $id)->update($where);      
        return $tipoCampo;
    }
    
    public static function delete($tipoCampoValidado)
    {       
        $id = $tipoCampoValidado['id'];
        return TipoCampo::where('id', $id)->delete();
    }

}