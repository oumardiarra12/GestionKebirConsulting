<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\TypeContrat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatTypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidats = Candidat::all();
        $typeContrats = TypeContrat::all();

        foreach ($candidats as $candidat) {
            // On attache aléatoirement 1 à 3 types de contrat à chaque candidat
            $candidat->typeContrats()->syncWithoutDetaching(
                $typeContrats->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
