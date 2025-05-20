<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Récupérer tous les candidats et expériences
        $candidats = Candidat::all();
        $experiences = Experience::all();

        foreach ($candidats as $candidat) {
            // Associer aléatoirement 1 à 3 expériences à chaque candidat
            $randomExperiences = $experiences->random(rand(1, 2))->pluck('id')->toArray();

            // Attacher les expériences au candidat dans la table pivot
            $candidat->experiences()->syncWithoutDetaching($randomExperiences);
        }
    }
}
