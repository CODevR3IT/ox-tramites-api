<?php

namespace App\Services;

use App\Models\Tramite;
use Illuminate\Support\Facades\Http;

class NotificacionService
{
    
    public static function notifica($request,$notificacion)
    {
       $token = $request->bearerToken();
       Http::sso()->withToken($token)->post('/notifications',$notificacion);
       Http::sso()->withToken($token)->post('/notifications/mail',$notificacion);
    }

}