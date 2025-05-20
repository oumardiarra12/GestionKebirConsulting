<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $secteurs = [
            [
                'nom_secteur' => 'Informatique',
                'description_secteur' => 'Technologies de l\'information, développement logiciel, réseaux.'
            ],
            [
                'nom_secteur' => 'BTP',
                'description_secteur' => 'Bâtiment et travaux publics.'
            ],
            [
                'nom_secteur' => 'Agroalimentaire',
                'description_secteur' => 'Production et transformation des produits agricoles.'
            ],
            [
                'nom_secteur' => 'Commerce',
                'description_secteur' => 'Activités liées à l’achat et à la vente de biens.'
            ],
        ];

        foreach ($secteurs as $secteur) {
            Secteur::create($secteur);
        }
    }

}
