<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\NiveauGlobalExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatNgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On récupère quelques candidats
        $candidats = Candidat::all();

        // On récupère quelques niveaux d'expérience globale
        $niveaux = NiveauGlobalExperience::all();

        // Pour chaque candidat, on lui attribue un ou plusieurs niveaux d'expérience
        foreach ($candidats as $candidat) {
            // Exemple : attribuer un niveau aléatoire
            $niveau = $niveaux->random();

            // On attache dans la table pivot
            $candidat->candidatnges()->attach($niveau->id);
        }
    }
}
