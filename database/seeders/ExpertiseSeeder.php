<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expertises = [
            'Développement Web',
            'Réseaux et Sécurité',
            'Base de Données',
            'Gestion de Projet',
            'Intelligence Artificielle',
            'DevOps',
            'Marketing Digital',
        ];

        foreach ($expertises as $nom) {
            Expertise::create(['nom_expertise' => $nom]);
        }
    }
}
