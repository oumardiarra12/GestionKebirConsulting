<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisponibiliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $disponibilites = [
            ['nom_disponibilite' => 'Temps plein'],
            ['nom_disponibilite' => 'Temps partiel'],
            ['nom_disponibilite' => 'Freelance'],
            ['nom_disponibilite' => 'Mission ponctuelle'],
            ['nom_disponibilite' => 'Stage'],
        ];

        DB::table('disponibilites')->insert($disponibilites);
    }
}
