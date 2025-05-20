<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('entreprises')->insert([
            'nom_entreprise' => 'Exemple SARL',
            'logo_entreprise' => 'logo_exemple.png', // ou url/logo path
            'tel_entreprise' => '0123456789',
            'addresse_entreprise' => '123 Rue Exemple, Ville, Pays',
            'forme_juridique_entreprise' => 'SARL',
            'description_entreprise' => 'Entreprise spécialisée dans la vente de produits électroniques.',
            'email_entreprise' => 'contact@exemple.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
