<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaCatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogos = [
            ['descripcion'=>'delegacion', 'detalle'=> 'Catalogo de delegaciones', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'distritos_cat', 'detalle'=> 'Catalogo de distritos', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'edad_construccion', 'detalle'=> 'Catalogo de edad construccion', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'entidades', 'detalle'=> 'atalogo de entidades', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'estado_conservacion', 'detalle'=> 'Catalogo de estado conservacion', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'forma_predio', 'detalle'=> 'Catalogo de forma predio', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'movimiento_catastral', 'detalle'=> 'Catalogo de movimiento catastral', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'municipio', 'detalle'=> 'atalogo de municipio', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'numero_niveles', 'detalle'=> 'Catalogo de numero niveles', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_asentamiento', 'detalle'=> 'Catalogo de tipo asentamiento', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_construccion', 'detalle'=> 'Catalogo de tipo construccion', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_localidad', 'detalle'=> 'Catalogo de tipo localidad', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_persona', 'detalle'=> 'Catalogo de tipo persona', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_predio', 'detalle'=> 'Catalogo tipo predio', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_suelo', 'detalle'=> 'Catalogo tipo suelo', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_tramite', 'detalle'=> 'Catalogo tipo tramite', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'tipo_vialidad', 'detalle'=> 'Catalogo tipo vialidad', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'ubicacion_manzana', 'detalle'=> 'Catalogo ubicacion manzana', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'unidad_medida', 'detalle'=> 'Catalogo unidad medida', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'uso_suelo', 'detalle'=> 'Catalogo uso suelo', 'estatus'=>true,'created_at' => DB::raw('now()')],
            ['descripcion'=>'viento', 'detalle'=> 'atalogo de viento', 'estatus'=>true,'created_at' => DB::raw('now()')],
        ];

        DB::table('ca_catalogos')->insert($catalogos);
    }
}
