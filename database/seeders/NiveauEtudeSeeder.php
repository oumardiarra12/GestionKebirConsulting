<?php

namespace Database\Seeders;

use App\Models\NiveauEtude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauEtudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = [
            'Aucun',
            'Primaire',
            'Secondaire',
            'BEP',
            'CAP',
            'Baccalauréat',
            'Licence',
            'Master',
            'Doctorat',
        ];

        foreach ($niveaux as $nom) {
            NiveauEtude::create([
                'nom_niveau_etude' => $nom,
            ]);
        }

    }
}
