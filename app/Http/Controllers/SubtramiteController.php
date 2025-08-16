<?php

namespace App\Http\Controllers;

//use App\Models\Subtramite;
use Illuminate\Http\Request;
use App\Services\SubtramiteService;
use App\Services\NotificacionService;
use Illuminate\Support\Facades\Storage;

class SubtramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return response()->json(Subtramite::all(), 200);
        $tramiteService = app(SubtramiteService::class);
        return $tramiteService->todos($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         $validate = $request->validate([
            'clave'=>'string|max:5',            
            'descripcion'=>'required|string|max:255',
            'detalle'=>'string|max:999',
            'ca_tramite_id'=>'required|exists:App\Models\Tramite,id',
            'tipo_usuarios_restringidos' => 'json',
            //'ca_tipo_usuario_id'=>'required|exists:App\Models\TipoUsuario,id',
        ]);

        $subtramite = SubtramiteService::create($validate);

        $notificacion = ["title" => "Notificación para creación de subtramite",
                         "content" => "Creaste el subtramite ".json_encode($subtramite)];
        NotificacionService::notifica($request,$notificacion);

        return $subtramite;
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
        //return SubtramiteService::show($request);
        $subtramiteService = app(SubtramiteService::class);       
        return $subtramiteService->show($request);
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
            'fileb64' => 'string',
            'ext' => 'string|in:jpg,jpeg,png,gif,webp,pdf,xlsx,xls,dxf',
            'nombre' => 'string',
            'fileb641' => 'string',
            'ext1' => 'string|in:jpg,jpeg,png,gif,webp,pdf,xlsx,xls,dxf',
            'nombre1' => 'string',
            'fileb642' => 'string',
            'ext2' => 'string|in:jpg,jpeg,png,gif,webp,pdf,xlsx,xls,dxf',
            'nombre2' => 'string',
            'ca_tramite_id'=>'exists:App\Models\Tramite,id',
            'tipo_usuarios_restringidos' => 'json',
        ]);

        $subtramite = SubtramiteService::update($validate);
        $notificacion = ["title" => "Notificación para actualización de subtramite",
                         "content" => "Actualizaste el subtramite ".json_encode($validate)];
        NotificacionService::notifica($request,$notificacion);

        return $subtramite;
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

    public function getFile($path,$id, $file, $ext){
        $file = urldecode($file);
        $filepath = $path.'/'.$id . '/' . $file . '.' . $ext;
        return Storage::download($filepath);
    }
}
