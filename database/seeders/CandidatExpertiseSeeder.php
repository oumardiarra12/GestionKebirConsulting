<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Expertise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Récupérer quelques candidats et expertises
        $candidats = Candidat::all();
        $expertises = Expertise::all();

        foreach ($candidats as $candidat) {
            // Associer aléatoirement 1 à 3 expertises à chaque candidat
            $expertisesIds = $expertises->random(rand(1, 3))->pluck('id')->toArray();

            // Attacher les expertises au candidat
            $candidat->expertises()->syncWithoutDetaching($expertisesIds);
        }
    }
}
