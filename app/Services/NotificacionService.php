<?php

namespace App\Services;

use App\Models\Tramite;
use Illuminate\Support\Facades\Http;

class NotificacionService
{
    
    public static function notifica($request,$notificacion)
    {
       $token = $request->bearerToken();
       Http::sso()->withToken($token)->withOptions(["verify"=>false])->post('/notifications',$notificacion);
       Http::sso()->withToken($token)->withOptions(["verify"=>false])->post('/notifications/mail',$notificacion);
    }

}