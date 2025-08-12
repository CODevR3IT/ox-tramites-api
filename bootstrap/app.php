<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\SSOAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'sso.auth' => SSOAuth::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'msg' => 'Petición no valida, revisa los campos.',
                    'errores' =>  $e->errors()
                ], 400);
            }
        });
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'msg' => 'No tienes una autenticación para acceder a este recurso.',
                ], 401);
            }
        });
        $exceptions->render(function (Throwable $e, Request $request) {
            error_log($e);
            Log::error($e);
            if ($request->is('api/*')) {
                return response()->json([
                    'msg' => 'Ocurrió algo inesperado, contacte con el administrador.'
                ], 500);
            }
        });
    })->create();
