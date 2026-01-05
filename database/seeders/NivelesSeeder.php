<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('niveles')->insert([
            ['nombre' => 'Educación Inicial - Preescolar'],
            ['nombre' => 'Educación Básica Primaria'],
            ['nombre' => 'Educación Básica Secundaria'],
            ['nombre' => 'Educación Media Académica'],
        ]);
    }
}
