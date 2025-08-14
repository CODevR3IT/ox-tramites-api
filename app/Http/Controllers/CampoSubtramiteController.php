<?php

namespace App\Http\Controllers;

use App\Models\CampoSubtramite;
use Illuminate\Http\Request;
use App\Services\CampoSubtramiteService;

class CampoSubtramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CampoSubtramite::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = $request->validate([            
            'campos'=>'required',
            'ca_subtramite_id'=>'required|exists:App\Models\Subtramite,id',
        ]);

        return CampoSubtramiteService::create($validate);
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
        return response()->json(CampoSubtramiteService::show($request), 200);
        
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
            'id'=>'required|exists:App\Models\CampoSubtramite,id',
            'campos'=>'',
            'estatus'=>'boolean:strict',
            'ca_subtramite_id'=>'exists:App\Models\Subtramite,id',
        ]);
        error_log(json_encode($validate));
        //return CampoSubtramiteService::update($validate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\CampoSubtramite,id',
        ]);
        return CampoSubtramiteService::delete($validate);
    }
}
