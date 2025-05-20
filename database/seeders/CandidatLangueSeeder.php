<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatLangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = ['débutant', 'intermédiaire', 'avancé'];

        // Exemple avec 10 candidats et 5 langues
        foreach (range(1, 10) as $candidatId) {
            foreach (range(1, rand(1, 3)) as $i) {
                DB::table('candidat_langues')->insert([
                    'candidat_id' => rand(1, 2),
                    'langue_id' => rand(1, 5),
                    'niveau' => $niveaux[array_rand($niveaux)],
                ]);
            }
        }

    }
}
