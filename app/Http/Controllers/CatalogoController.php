<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Services\TipoUsuarioService;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexTipoUsuario()
    {
        return response()->json(TipoUsuario::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTipoUsuario(Request $request)
    {
        $validate = $request->validate([
            'tipo'=>'required|string|max:255',
            'descripcion'=>'required|string|max:255',
            'detalle'=>'string|max:999',
        ]);
       
        return TipoUsuarioService::create($validate);
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
    public function showTipoUsuario(Request $request)
    {
        return TipoUsuarioService::show($request);
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
    public function updateTipoUsuario(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoUsuario,id',
            'tipo'=>'string|max:255',
            'descripcion'=>'string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
        ]);
        return TipoUsuarioService::update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyTipoUsuario(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoUsuario,id',
        ]);
        return TipoUsuarioService::delete($validate);
    }
}
