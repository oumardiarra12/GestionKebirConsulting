<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $candidats = Candidat::all();
        $regions = Region::all();

        foreach ($candidats as $candidat) {
            // On choisit entre 1 et 3 régions aléatoires par candidat
            $regionIds = $regions->random(rand(1, 3))->pluck('id')->toArray();
            $candidat->regions()->syncWithoutDetaching($regionIds);
        }
    }
}
