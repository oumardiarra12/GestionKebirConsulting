<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $formations = [
            [
                'diplome_formation' => 'Licence en Informatique',
                'desciption_formation' => 'Formation en développement web et base de données',
                'etablissement_formation' => 'Université de Bamako',
                'date_debut_formation' => '2018-09-01',
                'date_fin_formation' => '2021-06-30',
                'encours_formation' => false,
            ],
            [
                'diplome_formation' => 'Master en Intelligence Artificielle',
                'desciption_formation' => 'Spécialisation en apprentissage automatique',
                'etablissement_formation' => 'Université de Dakar',
                'date_debut_formation' => '2022-01-15',
                'date_fin_formation' => null,  // Null si en cours
                'encours_formation' => true,
            ],
            [
                'diplome_formation' => 'Certification Laravel',
                'desciption_formation' => 'Formation professionnelle sur Laravel',
                'etablissement_formation' => 'OpenClassrooms',
                'date_debut_formation' => '2023-03-01',
                'date_fin_formation' => '2023-06-01',
                'encours_formation' => false,
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }

    }
}
