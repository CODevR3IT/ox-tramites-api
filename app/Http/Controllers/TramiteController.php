<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use App\Services\TramiteService;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tramite::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'orden'=>'integer:strict|numeric:strict|max:999',
            'descripcion'=>'required|string|max:255',
            'detalle'=>'string|max:999',
        ]);

        return TramiteService::create($validate);
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
        return TramiteService::show($request);
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
            'id'=>'required|integer:strict|numeric:strict|max:999',
            'orden'=>'integer:strict|numeric:strict|max:999',
            'descripcion'=>'string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
        ]);
        return TramiteService::update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|integer:strict|numeric:strict|max:999',
        ]);
        return TramiteService::delete($validate);
    }
}
