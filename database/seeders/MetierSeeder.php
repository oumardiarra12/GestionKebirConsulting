<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metiers = [
            ['nom_metier' => 'Développeur web'],
            ['nom_metier' => 'Designer graphique'],
            ['nom_metier' => 'Chef de projet'],
            ['nom_metier' => 'Comptable'],
            ['nom_metier' => 'Électricien'],
            ['nom_metier' => 'Plombier'],
        ];

        DB::table('metiers')->insert($metiers);
    }
}
