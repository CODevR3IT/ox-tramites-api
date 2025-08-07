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
            ['tipo'=>'F','descripcion'=>'Contribuyente (Persona Fisica)', 'estatus'=>true],
            ['tipo'=>'M','descripcion'=>'Contribuyente (Persona Noral)', 'estatus'=>true],
            ['tipo'=>'N','descripcion'=>'Notario', 'estatus'=>true],
            ['tipo'=>'I','descripcion'=>'Institución (Persona Noral)', 'estatus'=>true],
        ];

        DB::table('ca_tipo_usuarios')->insert($tiposUsuarios);
    }
}
