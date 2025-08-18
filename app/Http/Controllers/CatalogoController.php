<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Models\Validacion;
use App\Models\TipoCampo;
use App\Models\TipoEstatus;
use App\Models\Estatus;
use App\Models\Catalogo;
use App\Models\CampoCatalogo;
use App\Models\DatoCatalogo;
use App\Services\TipoUsuarioService;
use App\Services\ValidacionService;
use App\Services\TipoCampoService;
use App\Services\TipoEstatusService;
use App\Services\EstatusService;
use App\Services\CatalogoService;
use App\Services\CampoCatalogoService;
use App\Services\DatoCatalogoService;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /****************************************Tipo Usuario****************************************/
    /**
     * Display a listing of the resource.
     */
    public function indexTipoUsuario()
    {
        return response()->json(TipoUsuario::whereNot("tipo","A")->get(),200);
        /*$perPage = request()->input('per_page', 15); // 15 por defecto
        $tiposUsuario = TipoUsuario::paginate($perPage);
        
        return response()->json($tiposUsuario, 200);*/
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
    
    /****************************************Catalogos****************************************/

    public function indexCatalogos()
    {
        return response()->json(Catalogo::all(),200);
    }
    
    public function createCatalogo(Request $request)
    {
        $validate = $request->validate([
            'descripcion'=>'required|string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
        ]);
       
        return CatalogoService::create($validate);
    }

    public function showCatalogo(Request $request)
    {
        return CatalogoService::show($request);
    }
    
    public function updateCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Catalogo,id',
            'descripcion'=>'string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
        ]);
        return CatalogoService::update($validate);
    }
    
    public function destroyCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\Catalogo,id',
        ]);
        return CatalogoService::delete($validate);
    }


    /****************************************CamposCatalogo****************************************/

    public function indexCampoCatalogo()
    {
        return response()->json(CampoCatalogo::all(),200);
    }
    
    public function createCampoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'orden'=>'integer:strict|numeric:strict|max:999',
            'nombre'=>'required|string|max:255',
            'tipo'=>'required|string|max:255',
            'longitud'=>'integer:strict|numeric:strict|max:999',
            'nullable'=>'boolean:strict',
            'ca_catalogo_id'=>'required|exists:App\Models\Catalogo,id',
        ]);
       
        return CampoCatalogoService::create($validate);
    }

    public function showCampoCatalogo(Request $request)
    {
        return CampoCatalogoService::show($request);
    }
    
    public function updateCampoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\CampoCatalogo,id',
            'orden'=>'integer:strict|numeric:strict|max:999',
            'nombre'=>'string|max:255',
            'tipo'=>'string|max:255',
            'longitud'=>'integer:strict|numeric:strict|max:999',
            'nullable'=>'boolean:strict',
            'ca_catalogo_id'=>'exists:App\Models\Catalogo,id',
        ]);
        return CampoCatalogoService::update($validate);
    }
    
    public function destroyCampoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\CampoCatalogo,id',
        ]);
        return CampoCatalogoService::delete($validate);
    }

    /****************************************DatosCatalogo****************************************/

    public function indexDatosCatalogo()
    {
        return response()->json(DatoCatalogo::all(),200);
    }
    
    public function createDatoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'datos'=>'required|json',
            'ca_catalogo_id'=>'required|exists:App\Models\Catalogo,id',
        ]);
       
        return DatoCatalogoService::create($validate);
    }

    public function showDatoCatalogo(Request $request)
    {        
        return DatoCatalogoService::show($request);
    }

    public function showCatalogoComoCampo(Request $request)
    {        
        return DatoCatalogoService::showAsField($request);
    }
    
    public function updateDatoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\DatoCatalogo,id',
            'datos'=>'json',
            'ca_catalogo_id'=>'exists:App\Models\Catalogo,id',
        ]);
        return DatoCatalogoService::update($validate);
    }
    
    public function destroyDatoCatalogo(Request $request)
    {
        $validate = $request->validate([
            'id'=>'required|exists:App\Models\DatoCatalogo,id',
        ]);
        return DatoCatalogoService::delete($validate);
    }

    public function cargaArchivoCatalogo(Request $request)
    {
        $archivo = $request->file('archivo');    
        
        $contenido = $archivo->getContent();
        $lineas = explode("\n", trim($contenido));
        foreach($lineas as $linea){
            $elementos = explode('|',$linea);
            //$jsonData = json_decode(trim($elementos[0]), true);
            print_r(trim($elementos[0]));
            $jsonData = trim($elementos[0]);
            DatoCatalogo::create([
                'datos' => "$jsonData",
                'ca_catalogo_id' => (int)trim($elementos[1])
            ]);            
        }
       
    }

}
