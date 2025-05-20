<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Secteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatSecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Exemple : on suppose que tu veux associer 2 secteurs à chaque candidat
        $secteurs = Secteur::all();

        Candidat::all()->each(function ($candidat) use ($secteurs) {
            // On associe aléatoirement 2 secteurs à chaque candidat
            $candidat->secteurs()->sync($secteurs->random(2)->pluck('id')->toArray());
        });
    }
}
