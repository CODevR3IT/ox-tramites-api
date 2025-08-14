<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioTramite;
use App\Services\UsuarioTramiteService;
use App\Services\OficioService;

class UsuarioTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(UsuarioTramite::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'user_id'=>'uuid',
            'datos_tramite'=>'required',            
            //'ca_tramite_id'=>'exists:App\Models\Tramite,id',
            'ca_subtramite_id'=>'exists:App\Models\Subtramite,id',
            'ca_estatus_id'=>'exists:App\Models\Estatus,id',
        ]);
       
        $usuarioTramite = app(UsuarioTramiteService::class);
        $usuarioTramite->create($validate,$request);

        $ofico = app(OficioService::class);
        $ofico->createAcuse($request,$usuarioTramite);
        
        //return UsuarioTramite::create($validate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return UsuarioTramiteService::show($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\UsuarioTramite,id',
            'user_id'=>'uuid',
            'datos_tramite'=>'',
            //'ca_tramite_id'=>'exists:App\Models\Tramite,id',
            'ca_subtramite_id'=>'exists:App\Models\Subtramite,id',
            'ca_estatus_id'=>'exists:App\Models\Estatus,id',
        ]);
        return UsuarioTramiteService::update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\UsuarioTramite,id',
        ]);
        return UsuarioTramiteService::delete($validate);
    }
}
