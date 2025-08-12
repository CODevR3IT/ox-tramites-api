<?php

use App\Http\Controllers\PersonaController;
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

    Route::get('tipoEstatus','indexTipoEstatus');
    Route::get('obtenTipoEstatus','showTipoEstatus');
    Route::post('creaTipoEstatus','createTipoEstatus');
    Route::patch('actualizaTipoEstatus','updateTipoEstatus');
    Route::delete('borraTipoEstatus','destroyTipoEstatus');

    Route::get('estatus','indexEstatus');
    Route::get('obtenEstatus','showEstatus');
    Route::post('creaEstatus','createEstatus');
    Route::patch('actualizaEstatus','updateEstatus');
    Route::delete('borraEstatus','destroyEstatus');

    Route::get('catalogos','indexCatalogos');
    Route::get('obtenCatalogo','showCatalogo');
    Route::post('creaCatalogo','createCatalogo');
    Route::patch('actualizaCatalogo','updateCatalogo');
    Route::delete('borraCatalogo','destroyCatalogo');

    Route::get('camposCatalogo','indexCampoCatalogo');
    Route::get('obtenCampoCatalogo','showCampoCatalogo');
    Route::post('creaCampoCatalogo','createCampoCatalogo');
    Route::patch('actualizaCampoCatalogo','updateCampoCatalogo');
    Route::delete('borraCampoCatalogo','destroyCampoCatalogo');

    Route::get('datosCatalogo','indexDatosCatalogo');
    Route::get('obtenDatoCatalogo','showDatoCatalogo');
    Route::get('obtenCatalogoComoCampo','showCatalogoComoCampo');
    Route::post('creaDatoCatalogo','createDatoCatalogo');
    Route::patch('actualizaDatoCatalogo','updateDatoCatalogo');
    Route::delete('borraDatoCatalogo','destroyDatoCatalogo');
});