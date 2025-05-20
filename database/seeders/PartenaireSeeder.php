<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Exemple avec une boucle pour créer plusieurs partenaires
        for ($i = 1; $i <= 10; $i++) {
            Partenaire::create([
                'nom_partenaire' => 'Partenaire ' . $i,
                'email_partenaire' => 'partenaire' . $i . '@example.com',
                'tel_partenaire' => '70' . rand(10000000, 99999999),
                'adresse_partenaire' => 'Adresse ' . $i,
                'logo_partenaire' => 'logos/logo' . $i . '.png',
                'siteweb_partenaire' => 'https://www.partenaire' . $i . '.com',
                'type_partenaire' => ['entreprise','institution','autres'][rand(0, 2)],
            ]);
        }
    }
}
