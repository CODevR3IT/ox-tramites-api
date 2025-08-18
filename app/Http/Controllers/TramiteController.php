<?php

namespace App\Http\Controllers;

//use App\Models\Tramite;
use App\Services\TramiteService;
use App\Services\NotificacionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        /*$perPage = request()->input('per_page', 15); // 15 por defecto
        $tramites = Tramite::paginate($perPage);
        
        return response()->json($tramites, 200);*/
        $tramiteService = app(TramiteService::class);
        return $tramiteService->todos($request);
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
            'is_service'=> 'boolean',
            'tipo_usuarios_restringidos' => 'nullable|json',
            //'ca_tipo_usuario_id'=>'required|exists:App\Models\TipoUsuario,id',
        ]);
        //Log::error("Lo que voy a mandara create ".json_encode($validate));
        $tramite = TramiteService::create($validate);
        $notificacion = ["title" => "Notificación para creación de tramite",
                         "content" => "Creaste el traamite ".json_encode($tramite)];
        NotificacionService::notifica($request,$notificacion);
        return $tramite;
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
        $tramiteService = app(TramiteService::class);       
        return $tramiteService->show($request);
    }

    public function showTramitesSubtramites(Request $request)
    {
        $tramiteService = app(TramiteService::class);       
        return $tramiteService->showTramitesSubtramites($request);
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
            'id'=>'required|exists:App\Models\Tramite,id',
            'orden'=>'integer:strict|numeric:strict|max:999',
            'descripcion'=>'string|max:255',
            'detalle'=>'string|max:999',
            'estatus'=>'boolean:strict',
            'tipo_usuarios_restringidos' => 'nullable|json',
            //'ca_tipo_usuario_id'=>'required|exists:App\Models\TipoUsuario,id',
        ]);
        
        //error_log(json_encode($validate));
        $tramite = TramiteService::update($validate);
        $notificacion = ["title" => "Notificación para actualización de tramite",
                         "content" => "Actualizaste el tramite ".json_encode($validate)];
        NotificacionService::notifica($request,$notificacion);

        return $tramite;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate = $request->validate([
            //'id'=>'required|integer:strict|numeric:strict|max:999',
            'id'=>'required|exists:App\Models\Tramite,id',
        ]);
        return TramiteService::delete($validate);
    }
}
