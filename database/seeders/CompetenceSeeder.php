<?php

namespace Database\Seeders;

use App\Models\Competence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $competences = [
            [
                'nom_competence' => 'Programmation PHP',
                'description_competence' => 'Maîtrise du langage PHP pour développement backend.',
            ],
            [
                'nom_competence' => 'Gestion de projet',
                'description_competence' => 'Compétence en organisation et gestion de projets IT.',
            ],
            [
                'nom_competence' => 'Base de données MySQL',
                'description_competence' => 'Connaissance approfondie de MySQL et optimisation des requêtes.',
            ],
            [
                'nom_competence' => 'Frontend React',
                'description_competence' => 'Création d’interfaces utilisateur avec React.js.',
            ],
            // Ajoute autant que tu veux
        ];

        foreach ($competences as $competence) {
            Competence::create($competence);
        }
    }
}
