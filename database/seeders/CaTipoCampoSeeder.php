<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaTipoCampoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ca_tipos_campos')->insert([
            'descripcion' => 'Archivo PDF',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);

        DB::table('ca_tipos_campos')->insert([
            'descripcion' => 'Alfanúmerico',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_tipos_campos')->insert([
            'descripcion' => 'Alfanúmerico sin caracteres especiales',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_tipos_campos')->insert([
            'descripcion' => 'Solo Letras',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_tipos_campos')->insert([
            'descripcion' => 'Númerico',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
    }
}
