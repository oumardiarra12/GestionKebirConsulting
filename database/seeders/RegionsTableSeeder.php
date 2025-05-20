<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('regions')->insert([
            [
                'nom_regions' => 'Kayes',
                'description_regions' => 'Région située à l’ouest du Mali.',
            ],
            [
                'nom_regions' => 'Koulikoro',
                'description_regions' => 'Région proche de Bamako, au sud-ouest du Mali.',
            ],
            [
                'nom_regions' => 'Sikasso',
                'description_regions' => 'Région agricole dans le sud du Mali.',
            ],
            [
                'nom_regions' => 'Ségou',
                'description_regions' => 'Région située au centre du Mali.',
            ],
            [
                'nom_regions' => 'Mopti',
                'description_regions' => 'Région fluviale centrale du Mali.',
            ],
            [
                'nom_regions' => 'Tombouctou',
                'description_regions' => 'Région historique au nord du Mali.',
            ],
            [
                'nom_regions' => 'Gao',
                'description_regions' => 'Région dans la zone saharienne du Mali.',
            ],
            [
                'nom_regions' => 'Kidal',
                'description_regions' => 'Région désertique au nord-est du Mali.',
            ],
            [
                'nom_regions' => 'Ménaka',
                'description_regions' => 'Région récemment créée au nord-est du Mali.',
            ],
            [
                'nom_regions' => 'Taoudéni',
                'description_regions' => 'Région très peu peuplée du nord du Mali.',
            ],
            [
                'nom_regions' => 'Bamako',
                'description_regions' => 'Capitale du Mali et région autonome.',
            ],
        ]);
    }
}
