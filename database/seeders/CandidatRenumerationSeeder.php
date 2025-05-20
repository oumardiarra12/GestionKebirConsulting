<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\CandidatRenumeration;
use App\Models\Renumeration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatRenumerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidats = Candidat::all();
        $renumerations = Renumeration::all();

        foreach ($candidats as $candidat) {
            // Attache aléatoirement 1 à 3 rémunérations par candidat
            $renumerationIds = $renumerations->random(rand(1, 3))->pluck('id');

            foreach ($renumerationIds as $renumId) {
                CandidatRenumeration::create([
                    'candidat_id' => $candidat->id,
                    'renumeration_id' => $renumId,
                ]);
            }}
    }
}
