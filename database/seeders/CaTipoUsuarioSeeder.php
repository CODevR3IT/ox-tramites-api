<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaTipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposUsuarios = [
            ['tipo'=>'F','descripcion'=>'CONTRIBUYENTE FISICA', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'M','descripcion'=>'CONTRIBUYENTE MORAL', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'N','descripcion'=>'NOTARIO FISICA', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'I','descripcion'=>'INSTITUCION MORAL', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            //['tipo'=>'A','descripcion'=>'ADMIN', 'estatus'=>true, 'created_at' => DB::raw('now()')],
        ];

        DB::table('ca_tipo_usuarios')->insert($tiposUsuarios);
    }
}
