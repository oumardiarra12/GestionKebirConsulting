<?php

namespace Database\Seeders;

use App\Models\NiveauGlobalExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauGlobalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = [
            'Moins de 1 an',
            '1 à 2 ans',
            '2 à 3 ans',
            '3 à 5 ans',
            '5 à 7 ans',
            'Plus de 7 ans',
            '10 ans et plus'
        ];

        foreach ($niveaux as $niveau) {
            NiveauGlobalExperience::create([
                'nom_niveau_global_experience' => $niveau
            ]);
        }

    }
}
