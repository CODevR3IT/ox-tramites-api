<?php

namespace App\Services;

//use App\Models\UsuarioTramite;
use App\Models\Expediente;
use Illuminate\Support\Facades\Storage;
use App\Models\OficioExpediente;
//use Carbon\Carbon;
use Illuminate\Support\Str;
//use Dompdf\Dompdf;

class OficioService
{

    /*public static function findByTask($idTask)
    {
        return OficioTarea::where('tarea_id', $idTask)
            ->get();
    }

    public static function create($payload)
    {
        OficioTarea::create($payload);
        return response()->json(['msg' => 'Oficio creado exitosamente'], 201);
    }

    public static function active($idOficio, $idTarea)
    {
        $oficio = OficioTarea::find($idOficio);
        if (!$oficio) {
            return response()->json(['error' => 'Oficio no encontrado'], 404);
        }
        OficioTarea::where('tarea_id', $idTarea)
            ->update(['activo' => false]);
        $oficio->refresh();
        $oficio->activo = true;
        $oficio->save();
        return response()->json(['msg' => 'Oficio actualizado exitosamente'], 201);
    }

    public static function findByExpediente($idExpediente)
    {
        return OficioExpediente::where('expediente_id', $idExpediente)
            ->select('id', 'oficio_id')
            ->with('oficioTarea:id,nombre_oficio,tipo_oficio')
            ->get();
    }

    public static function getOficio($idOficio)
    {
        $oficio = OficioExpediente::find($idOficio);
        if (!$oficio || !Storage::exists($oficio->path)) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        //$phpWord = IOFactory::load(Storage::path($oficio->path));
        //$objWriter = IOFactory::createWriter($phpWord, 'HTML');
        //ob_start();
        //$objWriter->save('php://output');
        //$html = ob_get_clean();
        //$dompdf = new Dompdf();
        //$dompdf->loadHtml($html);
        //$dompdf->setPaper('A4', 'portrait');
        //$dompdf->render();
        //Storage::put("tmp/{$oficio->id}.pdf", $dompdf->output());
        //return Storage::download("tmp/{$oficio->id}.pdf");
        return Storage::download($oficio->path);
    }*/
    /*public static function createOficioTarea(Expediente $expediente, OficioTarea $oficio)
    {
        $persona = UserService::mapUserNames($expediente->user);
        $templatePath = storage_path("app/private/" . $oficio->path_plantilla);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);
        $templateProcessor->setValue('folio', htmlspecialchars($expediente->folio));
        $templateProcessor->setValue('ciudadano', htmlspecialchars(mb_strtoupper($persona['full_name'], 'UTF-8')));
        $templateProcessor->setValue('fecha_letra', htmlspecialchars(self::fechaCadena(date('Y-m-d'))));
        $templateProcessor->setValue('ciudad', htmlspecialchars(mb_strtoupper('PUEBLA', 'UTF-8')));
        $templateProcessor->setValue('tramite', htmlspecialchars(mb_strtoupper($expediente->tramite->tramite, 'UTF-8')));
        $uuid = Str::uuid()->toString();
        $idUser = $expediente->user->id;
        $directory = "oficios/{$idUser}";
        Storage::makeDirectory($directory);
        $filepath = storage_path("app/private/{$directory}/{$uuid}.docx");
        $templateProcessor->saveAs($filepath);
        $oficioExpediente = new OficioExpediente();
        $oficioExpediente->expediente_id = $expediente->id;
        $oficioExpediente->oficio_id = $oficio->id;
        $oficioExpediente->path = "{$directory}/{$uuid}.docx";
        $oficioExpediente->save();
    }*/

    /*public static function fechaCadena($fechaYmd)
    {
        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
        $fecha = Carbon::parse($fechaYmd);
        $fecha->format('m');
        return "{$fecha->format('d')} de " . $meses[$fecha->format('m') - 1] . " de {$fecha->format('Y')}";
    }*/
}