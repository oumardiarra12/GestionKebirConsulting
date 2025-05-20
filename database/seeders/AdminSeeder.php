<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'nom_admin' => 'Admin One',
                'photo_admin' => 'photo1.jpg',
                'email' => 'admin1@example.com',
                'tel_admin' => '1234567890',
                'password' => Hash::make('password123'),
                'description_admin' => 'Premier administrateur du site.',
            ],
            [
                'nom_admin' => 'Admin Two',
                'photo_admin' => 'photo2.jpg',
                'email' => 'admin2@example.com',
                'tel_admin' => '0987654321',
                'password' => Hash::make('password456'),
                'description_admin' => 'Deuxième administrateur du site.',
            ],
            // Ajoute autant d'admins que tu veux
        ];

        DB::table('admins')->insert($admins);
    }
}
