<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaEstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ca_tipos_estatus')->insert([
            'descripcion' => 'Trámite',
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_tipos_estatus')->insert([
            'descripcion' => 'Cita',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Pre-registro de trámite',
            'estatus' => true,
            'id_tipo_estatus' => 1,
            'asunto_correo' => 'Alta de Pre-registro de trámite.',
            'contenido_correo' => '<p style="text-align:justify;">Estimado contribuyente <strong>$nombre </strong>se le informa que su solicitud de Pre-registro de trámite <strong>$subtramite</strong> con fecha <strong>$fecha</strong> se recibió con éxito, su número de folio es <strong>$folio</strong>, se le estará notificando por este medio sobre su estatus.</p><p>Recuerde una vez reabiertas las instalaciones deberá presentar la documentación física.</p>',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'En Validación',
            'estatus' => true,
            'id_tipo_estatus' => 1,
            'asunto_correo' => 'Estatus del Pre-registro de trámite ',
            'contenido_correo' => '<p>Estimado contribuyente <strong>$nombre&nbsp;</strong>se le informa que su trámite <strong>$subtramite</strong> con folio <strong>$folio</strong> se encuentra <strong>en validación</strong> con las siguientes<strong> observaciones $observaciones</strong></p><p>Recuerde una vez reabiertas las instalaciones deberá presentar la documentación física.</p>',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Validado',
            'estatus' => true,
            'id_tipo_estatus' => 1,
            'asunto_correo' => 'Estatus del Pre-registro de trámite ',
            'contenido_correo' => '<p>Estimado contribuyente <strong>$nombre&nbsp;</strong>se le informa que su solicitud de Pre-registro de trámite <strong>$subtramite</strong> con folio <strong>$folio</strong> se encuentra <strong>validado </strong>con las siguientes observaciones: <strong>$observaciones.</strong></p><p>Recuerde una vez reabiertas las instalaciones deberá presentar la documentación física.</p>',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Rechazado',
            'estatus' => true,
            'id_tipo_estatus' => 1,
            'asunto_correo' => 'Estatus del Pre-registro de trámite ',
            'contenido_correo' => '<p>Estimado contribuyente <strong>$nombre&nbsp;</strong>se le informa que su solicitud de Pre-registro de trámite <strong>$subtramite</strong> con folio <strong>$folio</strong> se encuentra <strong>rechazado </strong>con las siguientes observaciones: <strong>$observaciones.</strong></p><p>Recuerde una vez reabiertas las instalaciones deberá presentar la documentación física.</p>',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Cita agendada',
            'estatus' => true,
            'id_tipo_estatus' => 2,
            'asunto_correo' => 'Citas para $subtramite',
            'contenido_correo' => '<p style="margin-left:0px;text-align:justify;"><span style="background-color:inherit;">Se le informa <strong>$nombre</strong> que su cita ha sido agendada con fecha <strong>$fecha_cita</strong><i> y horario </i><strong>$horario_cita</strong> en <strong>$locacion</strong> y su folio de cita es <strong>$folio</strong>.</span>&nbsp;</p><p style="margin-left:0px;text-align:justify;">&nbsp;</p><p style="margin-left:0px;text-align:justify;"><span style="background-color:inherit;">Recuerde presentarse con 10 minutos de anticipación.</span>&nbsp;</p><p style="margin-left:0px;">&nbsp;</p>',
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_estatus')->insert([
            'descripcion' => 'Cita cancelada',
            'estatus' => true,
            'id_tipo_estatus' => 2,
            'asunto_correo' => 'Cancelación de cita para $subtramite',
            'contenido_correo' => '<p style="margin-left:0px;text-align:justify;"><span style="background-color:inherit;">Se le informa <strong>$nombre</strong> que su cita con folio <strong>$folio,</strong> ha sido cancelada con fecha </span><strong>$fecha_cita</strong><span style="background-color:inherit;"> &nbsp;y horario </span><strong>$horario_cita</strong><span style="background-color:inherit;">.</span>&nbsp;</p><p style="margin-left:0px;text-align:justify;">&nbsp;</p><p style="margin-left:0px;text-align:justify;"><span style="background-color:inherit;">Gracias por usar el sistema de notificaciones de la Secretaría de Administración y Finanzas.</span>&nbsp;</p>',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Cita cancelada por el contribuyente',
            'estatus' => true,
            'id_tipo_estatus' => 2,
            'asunto_correo' => 'Cancelación de cita para $subtramite',
            'contenido_correo' => '',
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_estatus')->insert([
            'descripcion' => 'Cita reagendada',
            'estatus' => true,
            'id_tipo_estatus' => 2,
            'asunto_correo' => 'Cancelación de cita para $subtramite',
            'contenido_correo' => '',
            'created_at' => DB::raw('now()')
        ]);
        
        DB::table('ca_estatus')->insert([
            'descripcion' => 'Cita atendida',
            'estatus' => true,
            'id_tipo_estatus' => 2,
            'created_at' => DB::raw('now()')
        ]);
    }
}
