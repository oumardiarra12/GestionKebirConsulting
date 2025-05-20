<?php

namespace Database\Seeders;

use App\Models\Renumeration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RenumerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Renumeration::insert([
            ['nom_renumeration' => '<100000'],
            ['nom_renumeration' => '<100000>200000'],
            ['nom_renumeration' => '>200000'],
        ]);
    }
}
