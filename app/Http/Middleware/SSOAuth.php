<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class SSOAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Token no proporcionado'], Response::HTTP_UNAUTHORIZED);
        }
        $response = Http::sso()->withToken($token)->withOptions(["verify"=>false])->get('/auth/user');

        if ($response->failed()) {
            return response()->json(['error' => 'Token inválido'], Response::HTTP_UNAUTHORIZED);
        }

        $userData = $response->json();

        $request->attributes->set('sso_user', $userData);

        return $next($request);
    }
}