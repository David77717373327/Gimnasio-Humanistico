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
                'name' => 'Miguel Torres',
                'email' => 'miguel.torres@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000002',
                'name' => 'Laura Gómez',
                'email' => 'laura.gomez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000003',
                'name' => 'Pedro Sánchez',
                'email' => 'pedro.sanchez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000004',
                'name' => 'Clara Ramírez',
                'email' => 'clara.ramirez@example.com',
                'password' => Hash::make('professor123'),
                'role' => 'professor',
            ],
            [
                'document' => '200000005',
                'name' => 'Esteban Díaz',
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