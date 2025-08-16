<?php

namespace App\Services;

use App\Models\UsuarioTramite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UsuarioTramiteService
{

    protected $tipoUsuarioService;

    public function __construct(TipoUsuarioService $tipoUsuarioService)
    {
        $this->tipoUsuarioService = $tipoUsuarioService;
    } 

    public static function show($request)
    {
        $data = $request->all();
        $where = [];
        foreach ($data as $key => $value) {
             if(!strstr($key,"/")){
                $where[] = [$key,"=",$value]; 
             }           
        }
        return UsuarioTramite::where($where)
        ->orderBy('id')
        ->get();
    }

    public function create($usuarioTramiteValidado,$request)
    {       
       $usuarioTramiteValidado['user_id'] = $this->tipoUsuarioService->idUsuario($request);

       $tipoUsuario = $this->tipoUsuarioService->tipoUsuario($request);
       //Log::error("Lo que llega en tipoUsuaario ".json_encode($tipoUsuario));
       if($tipoUsuario == 0){
        $folio =  "X".$usuarioTramiteValidado['ca_subtramite_id'].Carbon::now()->format('YmdHis').str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
       }else{
        $folio =  $tipoUsuario[0]->tipo.$usuarioTramiteValidado['ca_subtramite_id'].Carbon::now()->format('YmdHis').str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
       }
       
       $usuarioTramiteValidado['folio_seguimiento'] = $folio;
        
       $usuarioTramite = UsuarioTramite::create($usuarioTramiteValidado);
       
       $notificacion = ["title" => "Notificación para inicio de tramite",
                         "content" => "Iniciaste un tramite con el folio de seguimiento ".json_encode($usuarioTramite->folio_seguimiento)];
        NotificacionService::notifica($request,$notificacion);
       
        return $usuarioTramite;
    }

    public static function update($usuarioTramiteValidado)
    {       
        $id = $usuarioTramiteValidado['id'];
        unset($usuarioTramiteValidado['id']);
        $where = $usuarioTramiteValidado;        
        $usuarioTramite = UsuarioTramite::where('id', $id)->update($where);      
        return $usuarioTramite;
    }
    
    public static function delete($usuarioTramiteValidado)
    {       
        $id = $usuarioTramiteValidado['id'];
        return UsuarioTramite::where('id', $id)->delete();
    }

}