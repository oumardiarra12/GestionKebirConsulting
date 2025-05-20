<?php

namespace Database\Seeders;

use App\Models\TypeContrat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'nom_type_contrat' => 'CDI',
                'description_type_contrat' => 'Contrat à durée indéterminée',
            ],
            [
                'nom_type_contrat' => 'CDD',
                'description_type_contrat' => 'Contrat à durée déterminée',
            ],
            [
                'nom_type_contrat' => 'Stage',
                'description_type_contrat' => 'Contrat de stage pour étudiants',
            ],
            [
                'nom_type_contrat' => 'Freelance',
                'description_type_contrat' => 'Contrat de travail indépendant',
            ],
        ];

        foreach ($types as $type) {
            TypeContrat::create($type);
        }

    }
}
