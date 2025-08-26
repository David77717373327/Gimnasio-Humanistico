<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ProfessorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $professors = [
            [
                'document' => '200000001',
                'name' => 'Dr. Miguel Torres',
                'email' => 'miguel.torres@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000002',
                'name' => 'Prof. Laura Gómez',
                'email' => 'laura.gomez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000003',
                'name' => 'Dr. Pedro Sánchez',
                'email' => 'pedro.sanchez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000004',
                'name' => 'Prof. Clara Ramírez',
                'email' => 'clara.ramirez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000005',
                'name' => 'Dr. Esteban Díaz',
                'email' => 'esteban.diaz@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
        ];

        foreach ($professors as $professor) {
            User::updateOrCreate(
                ['document' => $professor['document']],
                [
                    'name' => $professor['name'],
                    'email' => $professor['email'],
                    'password' => $professor['password'],
                    'role' => $professor['role'],
                ]
            );
        }
    }
}