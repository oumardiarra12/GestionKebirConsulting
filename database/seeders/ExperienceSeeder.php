<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $experiences = [
            [
                'poste_experience' => 'Développeur Web',
                'entreprise_experience' => 'Tech Solutions',
                'date_debut_experience' => '2020-01-01',
                'date_fin_experience' => '2021-12-31',
                'encours_experience' => false,
                'description_poste' => 'Développement de sites web sur mesure en Laravel et React.'
            ],
            [
                'poste_experience' => 'Administrateur Réseau',
                'entreprise_experience' => 'MaliNet',
                'date_debut_experience' => '2019-03-01',
                'date_fin_experience' => '2020-02-28',
                'encours_experience' => false,
                'description_poste' => 'Gestion des infrastructures réseau et sécurité informatique.'
            ],
            [
                'poste_experience' => 'Analyste de Données',
                'entreprise_experience' => 'DataPro',
                'date_debut_experience' => '2021-05-01',
                'date_fin_experience' => null,
                'encours_experience' => true,
                'description_poste' => 'Analyse des données clients et création de rapports stratégiques.'
            ],
            [
                'poste_experience' => 'Chef de projet IT',
                'entreprise_experience' => 'Innovatech',
                'date_debut_experience' => '2018-06-01',
                'date_fin_experience' => '2020-05-31',
                'encours_experience' => false,
                'description_poste' => 'Gestion de projets digitaux et coordination d’équipes techniques.'
            ],
            [
                'poste_experience' => 'Technicien Support',
                'entreprise_experience' => 'HelpDesk Pro',
                'date_debut_experience' => '2017-01-01',
                'date_fin_experience' => '2018-12-31',
                'encours_experience' => false,
                'description_poste' => 'Assistance technique pour les utilisateurs en entreprise.'
            ],
            [
                'poste_experience' => 'Développeur Backend',
                'entreprise_experience' => 'CodeFactory',
                'date_debut_experience' => '2022-01-01',
                'date_fin_experience' => null,
                'encours_experience' => true,
                'description_poste' => 'Développement d’API RESTful avec Laravel.'
            ],
            [
                'poste_experience' => 'Consultant IT',
                'entreprise_experience' => 'GlobalTech',
                'date_debut_experience' => '2020-03-01',
                'date_fin_experience' => '2021-02-28',
                'encours_experience' => false,
                'description_poste' => 'Consultation en transformation numérique.'
            ],
            [
                'poste_experience' => 'Designer UI/UX',
                'entreprise_experience' => 'DesignLab',
                'date_debut_experience' => '2019-07-01',
                'date_fin_experience' => '2020-06-30',
                'encours_experience' => false,
                'description_poste' => 'Conception des interfaces utilisateurs pour applications mobiles.'
            ],
            [
                'poste_experience' => 'Responsable Informatique',
                'entreprise_experience' => 'Ecole Supérieure',
                'date_debut_experience' => '2016-09-01',
                'date_fin_experience' => '2018-08-31',
                'encours_experience' => false,
                'description_poste' => 'Supervision du système informatique de l’établissement.'
            ],
            [
                'poste_experience' => 'Développeur Fullstack',
                'entreprise_experience' => 'DevMali',
                'date_debut_experience' => '2023-01-01',
                'date_fin_experience' => null,
                'encours_experience' => true,
                'description_poste' => 'Développement d’applications web complètes en Laravel & Vue.js.'
            ],
        ];

        DB::table('experiences')->insert($experiences);
    }
}
