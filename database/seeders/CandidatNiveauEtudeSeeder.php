<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\NiveauEtude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatNiveauEtudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidats = Candidat::all();
        $niveaux = NiveauEtude::all();

        foreach ($candidats as $candidat) {
            // Choisir aléatoirement 1 ou plusieurs niveaux d'étude
            $niveauIds = $niveaux->random(rand(1, 2))->pluck('id');

            // Attacher les relations
            $candidat->niveauetudes()->syncWithoutDetaching($niveauIds);
        }
    }
}
