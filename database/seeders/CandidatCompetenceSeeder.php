<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Competence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Récupérer tous les candidats
        $candidats = Candidat::all();

        // Récupérer toutes les compétences
        $competences = Competence::all();

        // Pour chaque candidat, attacher 2 compétences aléatoires
        foreach ($candidats as $candidat) {
            $competencesIds = $competences->random(2)->pluck('id')->toArray();

            // Attacher les compétences à ce candidat
            $candidat->competences()->syncWithoutDetaching($competencesIds);
        }
    }
}
