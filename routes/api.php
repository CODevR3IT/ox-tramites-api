<?php

use App\Http\Controllers\TramiteController;
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