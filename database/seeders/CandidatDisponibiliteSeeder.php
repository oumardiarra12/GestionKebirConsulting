<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Disponibilite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatDisponibiliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidat = Candidat::find(1); // ou Candidat::first();
        $disponibilites = Disponibilite::whereIn('id', [2, 3])->get();

        // Sync ou attach pour créer les relations pivot
        $candidat->disponibilites()->sync($disponibilites->pluck('id')->toArray());

        // Exemple pour un autre candidat
        $candidat2 = Candidat::find(2);
        $candidat2->disponibilites()->attach(1);
    }
}
