<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\CandidatFormation;
use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $candidats = Candidat::all();
        $formations = Formation::all();

        foreach ($candidats as $candidat) {
            $formationsIds = $formations->random(2)->pluck('id')->toArray();

            foreach ($formationsIds as $formationId) {
                CandidatFormation::create([
                    'candidat_id' => $candidat->id,
                    'formation_id' => $formationId,
                ]);
            }
        }
    }
}
