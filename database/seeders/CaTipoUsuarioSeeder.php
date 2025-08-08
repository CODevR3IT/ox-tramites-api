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
            ['tipo'=>'F','descripcion'=>'Contribuyente (Persona Fisica)', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'M','descripcion'=>'Contribuyente (Persona Noral)', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'N','descripcion'=>'Notario', 'estatus'=>true, 'created_at' => DB::raw('now()')],
            ['tipo'=>'I','descripcion'=>'Institución (Persona Noral)', 'estatus'=>true, 'created_at' => DB::raw('now()')],
        ];

        DB::table('ca_tipo_usuarios')->insert($tiposUsuarios);
    }
}
