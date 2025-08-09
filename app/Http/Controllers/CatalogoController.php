<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Models\Validacion;
use App\Models\TipoCampo;
use App\Models\TipoEstatus;
use App\Models\Estatus;
use App\Services\TipoUsuarioService;
use App\Services\ValidacionService;
use App\Services\TipoCampoService;
use App\Services\TipoEstatusService;
use App\Services\EstatusService;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /****************************************Tipo Usuario****************************************/
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

/****************************************Validaciones****************************************/

    public function indexValidacion()
    {
        return response()->json(Validacion::all(),200);
    }

    public function createValidacion(Request $request)
    {
        $validate = $request->validate([
            'descripcion'=>'required|string|max:255',
            'regex'=>'string|max:999',
        ]);
       
        return ValidacionService::create($validate);
    }

    public function showValidacion(Request $request)
    {
        return ValidacionService::show($request);
    }

    public function updateValidacion(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Validacion,id',
            'descripcion'=>'string|max:255',
            'regex'=>'string|max:999',
            'estatus'=>'boolean:strict',
        ]);
        return ValidacionService::update($validate);
    }

    public function destroyValidacion(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Validacion,id',
        ]);
        return ValidacionService::delete($validate);
    }

    /****************************************Tipo Campo****************************************/

    public function indexTipoCampo()
    {
        return response()->json(TipoCampo::all(),200);
    }
    
    public function createTipoCampo(Request $request)
    {
        $validate = $request->validate([
            'descripcion'=>'required|string|max:255',
        ]);
       
        return TipoCampoService::create($validate);
    }

    public function showTipoCampo(Request $request)
    {
        return TipoCampoService::show($request);
    }
    
    public function updateTipoCampo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoCampo,id',
            'descripcion'=>'string|max:255',
            'estatus'=>'boolean:strict',
        ]);
        return TipoCampoService::update($validate);
    }
    
    public function destroyTipoCampo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoCampo,id',
        ]);
        return TipoCampoService::delete($validate);
    }

    /****************************************Tipo Estatus****************************************/

    public function indexTipoEstatus()
    {
        return response()->json(TipoEstatus::all(),200);
    }
    
    public function createTipoEstatus(Request $request)
    {
        $validate = $request->validate([
            'descripcion'=>'required|string|max:255',
        ]);
       
        return TipoEstatusService::create($validate);
    }

    public function showTipoEstatus(Request $request)
    {
        return TipoEstatusService::show($request);
    }
    
    public function updateTipoEstatus(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoEstatus,id',
            'descripcion'=>'string|max:255',
        ]);
        return TipoEstatusService::update($validate);
    }
    
    public function destroyTipoEstatus(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\TipoEstatus,id',
        ]);
        return TipoEstatusService::delete($validate);
    }

    /****************************************Estatus****************************************/

     public function indexEstatus()
    {
        return response()->json(Estatus::all(),200);
    }
    
    public function createEstatus(Request $request)
    { error_log(json_encode($request));
        $validate = $request->validate([
            'descripcion'=>'required|string|max:255',
            'asunto_correo'=>'string|max:999',
            'contenido_correo'=>'string|max:10000',
            'estatus'=>'boolean:strict',
            'ca_tipo_estatus_id'=>'required|exists:App\Models\TipoEstatus,id',
        ]);
       
        return EstatusService::create($validate);
    }

    public function showEstatus(Request $request)
    {
        return EstatusService::show($request);
    }
    
    public function updateEstatus(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Estatus,id',
            'descripcion'=>'string|max:255',
            'asunto_correo'=>'string|max:999',
            'contenido_correo'=>'string|max:5000',
            'estatus'=>'boolean:strict',
            'ca_tipo_estatus_id'=>'exists:App\Models\TipoEstatus,id',
        ]);
        return EstatusService::update($validate);
    }
    
    public function destroyEstatus(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Estatus,id',
        ]);
        return EstatusService::delete($validate);
    }

}
