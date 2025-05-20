<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Emploi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Assurez-vous qu'il y a des candidats et des emplois
        $candidats = Candidat::all();
        $emplois = Emploi::all();

        if ($candidats->count() == 0 || $emplois->count() == 0) {
            $this->command->warn('Ajoutez d\'abord des candidats et des emplois dans la base.');
            return;
        }

        foreach (range(1, 15) as $i) {
            Candidature::create([
                'date_candidature'     => Carbon::now()->subDays(rand(0, 30)),
                'candidat_id'          => $candidats->random()->id,
                'emploi_id'            => $emplois->random()->id,
                'status_candidature'   => 'entend',
                'etape_candidature'    => 'initiale',
                'lettre_motivation'    => 'Je suis très motivé à rejoindre votre entreprise. Merci de considérer ma candidature. [Candidature '.$i.']',
            ]);
        }

    }
}
