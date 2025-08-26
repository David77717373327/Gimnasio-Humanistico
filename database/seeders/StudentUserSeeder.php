<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class StudentUserSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'document' => '100000007', // Cambiado para evitar duplicados
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
            [
                'document' => '100000008',
                'name' => 'María García',
                'email' => 'maria.garcia@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
            [
                'document' => '100000009',
                'name' => 'Carlos López',
                'email' => 'carlos.lopez@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
            [
                'document' => '100000010',
                'name' => 'Ana Martínez',
                'email' => 'ana.martinez@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
            [
                'document' => '100000011',
                'name' => 'Luis Rodríguez',
                'email' => 'luis.rodriguez@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
            [
                'document' => '100000012',
                'name' => 'Sofía Hernández',
                'email' => 'sofia.hernandez@example.com',
                'password' => Hash::make('student123'),
                'role' => 'student',
            ],
        ];

        foreach ($students as $student) {
            User::updateOrCreate(
                ['document' => $student['document']],
                [
                    'name' => $student['name'],
                    'email' => $student['email'],
                    'password' => $student['password'],
                    'role' => $student['role'],
                ]
            );
        }
    }
}