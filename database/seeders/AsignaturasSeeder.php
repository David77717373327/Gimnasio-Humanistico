<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('asignaturas')->insert([
            ['nombre' => 'Matemáticas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Lengua y Literatura', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ciencias Naturales', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Estudios Sociales', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Inglés', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
