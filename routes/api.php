<?php

use App\Http\Controllers\CampoSubtramiteController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\SubtramiteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\FileController;
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

    Route::prefix('campo')->controller(CampoSubtramiteController::class)->group(function () {
        Route::get('','index');
        Route::get('obten','show');
        Route::post('crea','create');
        Route::patch('actualiza','update');
        Route::delete('borra','destroy');
    });

    Route::prefix('file')->controller(FileController::class)->group(function () {
        Route::get('obten','show');
        Route::post('guardaArchivo','create');
    });
});



Route::prefix('catalogo')->controller(CatalogoController::class)->group(function () {
    Route::get('tipoUsuario','indexTipoUsuario');
    Route::get('obtenTipoUsuario','showTipoUsuario');
    Route::post('creaTipoUsuario','createTipoUsuario');
    Route::patch('actualizaTipoUsuario','updateTipoUsuario');
    Route::delete('borraTipoUsuario','destroyTipoUsuario');

    Route::get('validacion','indexValidacion');
    Route::get('obtenValidacion','showValidacion');
    Route::post('creaValidacion','createValidacion');
    Route::patch('actualizaValidacion','updateValidacion');
    Route::delete('borraValidacion','destroyValidacion');

    Route::get('tipoCampo','indexTipoCampo');
    Route::get('obtenTipoCampo','showTipoCampo');
    Route::post('creaTipoCampo','createTipoCampo');
    Route::patch('actualizaTipoCampo','updateTipoCampo');
    Route::delete('borraTipoCampo','destroyTipoCampo');
});