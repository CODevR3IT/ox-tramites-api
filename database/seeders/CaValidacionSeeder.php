<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaValidacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ca_validaciones')->insert([
            'descripcion' => 'Sin validación',
            'regex' => '',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_validaciones')->insert([
            'descripcion' => 'Validación RFC Persona Fisica',
            'regex' => '^([A-ZÑ&]{4})?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_validaciones')->insert([
            'descripcion' => 'Validación RFC Persona Moral',
            'regex' => '^([A-ZÑ&]{3}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
        DB::table('ca_validaciones')->insert([
            'descripcion' => 'Validación CURP',
            'regex' => '^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$',
            'estatus' => true,
            'created_at' => DB::raw('now()')
        ]);
    }
}
