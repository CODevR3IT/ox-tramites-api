<?php

use App\Http\Controllers\TramiteController;
use App\Http\Controllers\SubtramiteController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/


Route::prefix('tramite')->controller(TramiteController::class)->group(function () {
    Route::get('','index');
    Route::get('obten','show');
    Route::post('crea','create');
    Route::patch('actualiza','update');
    Route::delete('borra','destroy');
});

Route::prefix('subtramite')->controller(SubtramiteController::class)->group(function () {
    Route::get('','index');
    Route::get('obten','show');
    Route::post('crea','create');
    Route::patch('actualiza','update');
    Route::delete('borra','destroy');
});

Route::prefix('catalogo')->controller(CatalogoController::class)->group(function () {
    Route::get('tipoUsuario','indexTipoUsuario');
    Route::get('obtenTipoUsuario','showTipoUsuario');
    Route::post('creaTipoUsuario','createTipoUsuario');
    Route::patch('actualizaTipoUsuario','updateTipoUsuario');
    Route::delete('borraTipoUsuario','destroyTipoUsuario');
});