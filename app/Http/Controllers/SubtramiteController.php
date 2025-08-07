<?php

namespace App\Http\Controllers;

use App\Models\Subtramite;
use Illuminate\Http\Request;
use App\Services\SubtramiteService;

class SubtramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Subtramite::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         $validate = $request->validate([            
            'descripcion'=>'required|string|max:255',
            'detalle'=>'string|max:999',
            'ca_tramite_id'=>'required|exists:App\Models\Tramite,id',
            'tipo_usuarios_restringidos' => 'json',
            //'ca_tipo_usuario_id'=>'required|exists:App\Models\TipoUsuario,id',
        ]);

        return SubtramiteService::create($validate);
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
        return SubtramiteService::show($request);
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
            'id'=>'required|exists:App\Models\Subtramite,id',            
            'descripcion'=>'string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
            'is_cita'=>'boolean:strict',
            'is_pago'=>'boolean:strict',
            'config' => 'json',
            'url_file'=>'string|max:500',
            'files' => 'json',
            'ca_tramite_id'=>'exists:App\Models\Tramite,id',
            'tipo_usuarios_restringidos' => 'json',
        ]);

        return SubtramiteService::update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Subtramite,id',
        ]);
        return SubtramiteService::delete($validate);
    }
}
