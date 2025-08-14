<?php

namespace App\Services;

//use App\Models\UsuarioTramite;
//use App\Models\Expediente;
use Illuminate\Support\Facades\Storage;
//use App\Models\OficioExpediente;
use Carbon\Carbon;
use Illuminate\Support\Str;
//use Dompdf\Dompdf;

class OficioService
{
    protected $tipoUsuarioService;

    public function __construct(TipoUsuarioService $tipoUsuarioService)
    {
        $this->tipoUsuarioService = $tipoUsuarioService;
    }

    public function createAcuse($request,$datosFormulario)
    {
        $templatePath = storage_path("app/private/templates/template_servicios_cartograficos.docx");
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);
        $templateProcessor->setValue('fecha_letra', self::fechaCadena(date("Y-m-d")));
        $templateProcessor->setValue('suscribe', htmlspecialchars("Jose Perez Leon"));
        $templateProcessor->setValue('caracter', htmlspecialchars("Tranquilo"));
        $templateProcessor->setValue('acredito', htmlspecialchars("Lo que se acredita"));
        $templateProcessor->setValue('cuentacas', htmlspecialchars("001001010006"));
        $templateProcessor->setValue('direccion_inmueble', htmlspecialchars("Calle alcazar, Oaxaca, Oaxaca, México"));
        $templateProcessor->setValue('ciudadano', htmlspecialchars("Isaias Vidal"));
        $templateProcessor->setValue('telefono', htmlspecialchars("55 76 28 11 20"));
        $templateProcessor->setValue('correo', htmlspecialchars("jose_perez@gmail.com"));
        $templateProcessor->setValue('ciudadano', htmlspecialchars("Ciudadano Modelo"));

        $uuid = Str::uuid()->toString();
        $idUser = $this->tipoUsuarioService->idUsuario($request); 
        $directory = "{$idUser}";
        Storage::disk("public")->makeDirectory($directory);
        $filepath = storage_path("app/public/{$directory}/{$uuid}.docx");
        $templateProcessor->saveAs($filepath);

        $url = Storage::disk("public")->url("{$directory}/{$uuid}.docx");
        return response()->json(['url' => $url]);
        
    }

    public static function fechaCadena($fechaYmd)
    {
        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
        $fecha = Carbon::parse($fechaYmd);
        $fecha->format('m');
        return "{$fecha->format('d')} de " . $meses[$fecha->format('m') - 1] . " de {$fecha->format('Y')}";
    }
}