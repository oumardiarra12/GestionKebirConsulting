<?php

namespace Database\Seeders;

use App\Models\Candidat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $candidats = [
            [
                'nom_candidat' => 'Diallo',
                'prenom_candidat' => 'Moussa',
                'datenaissance_candidat' => '1990-05-12',
                'sexe_candidat' => 'M',
                'nationalite_candidat' => 'Mali',
                'email' => 'moussa.diallo@example.com',
                'tel_candidat' => '70000001',
                'photo_candidat' => 'photos/moussa.jpg',
                'cv_candidat' => 'cvs/moussa.pdf',
                'situationmatrimoniale_candidat' => 'celibataire',
                'adresse_candidat' => 'Bamako, Mali',
                'nombreenfant_candidat' => 0,
                'password' => Hash::make('password123'),
            ],
            [
                'nom_candidat' => 'Traoré',
                'prenom_candidat' => 'Fatoumata',
                'datenaissance_candidat' => '1985-10-22',
                'sexe_candidat' => 'F',
                'nationalite_candidat' => 'Mali',
                'email' => 'fatoumata.traore@example.com',
                'tel_candidat' => '70000002',
                'photo_candidat' => 'photos/fatoumata.jpg',
                'cv_candidat' => 'cvs/fatoumata.pdf',
                'situationmatrimoniale_candidat' => 'marie',
                'adresse_candidat' => 'Sikasso, Mali',
                'nombreenfant_candidat' => 2,
                'password' => Hash::make('securepass456'),
            ],
            // Ajoute autant de candidats que tu veux ici...
        ];

        foreach ($candidats as $candidat) {
            Candidat::create($candidat);
        }
    }
}
