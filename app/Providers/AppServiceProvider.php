<?php

namespace App\Providers;

use App\Services\SubtramiteService;
use App\Services\TipoUsuarioService;
use App\Services\TramiteService;
use App\Services\UsuarioTramiteService;
use App\Services\OficioService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TipoUsuarioService::class, function ($app) {
        return new TipoUsuarioService();
        });
        
        $this->app->bind(TramiteService::class, function ($app) {
            return new TramiteService($app->make(TipoUsuarioService::class));
        });

        $this->app->bind(SubtramiteService::class, function ($app) {
            return new SubtramiteService($app->make(TipoUsuarioService::class));
        });

        $this->app->bind(UsuarioTramiteService::class, function ($app) {
            return new UsuarioTramiteService($app->make(TipoUsuarioService::class));
        });

        $this->app->bind(OficioService::class, function ($app) {
            return new OficioService($app->make(TipoUsuarioService::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('sso', function () {
            return Http::baseUrl(env('SSO_URL'));
        });
    }
}
