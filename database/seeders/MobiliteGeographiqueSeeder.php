<?php

namespace Database\Seeders;

use App\Models\MobiliteGeographique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobiliteGeographiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $mobilites = [
            'Locale',
            'Régionale',
            'Nationale',
            'Internationale',
        ];

        foreach ($mobilites as $nom) {
            MobiliteGeographique::create([
                'nom_mobilite_geographique' => $nom,
            ]);
        }

    }
}
