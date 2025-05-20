<?php

namespace Database\Seeders;

use App\Models\Candidat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatMetierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidat = Candidat::find(1);
        $metierIds = [2, 3];
        $candidat->metiers()->sync($metierIds);

        $candidat2 = Candidat::find(2);
        $candidat2->metiers()->attach(1);
    }
}
