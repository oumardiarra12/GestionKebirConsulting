<?php

namespace Database\Seeders;

use App\Models\Emploi;
use App\Models\Metier;
use App\Models\NiveauEtude;
use App\Models\NiveauGlobalExperience;
use App\Models\Partenaire;
use App\Models\Region;
use App\Models\Renumeration;
use App\Models\Secteur;
use App\Models\TypeContrat;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous que les tables liées ont des données
$secteurs = Secteur::all();
$metiers = Metier::all();
$renumerations = Renumeration::all();
$typeContrats = TypeContrat::all();
$niveauxEtude = NiveauEtude::all();
$niveauxExperience = NiveauGlobalExperience::all();
$regions = Region::all();
$partenaires = Partenaire::all();

// Vérifiez que chaque table a des entrées
if (
    $secteurs->isEmpty() || $metiers->isEmpty() || $renumerations->isEmpty() ||
    $typeContrats->isEmpty() || $niveauxEtude->isEmpty() || $niveauxExperience->isEmpty() ||
    $regions->isEmpty() || $partenaires->isEmpty()
) {
    $this->command->error('Assurez-vous que toutes les tables liées ont des données.');
    return;
}

// Génère 10 emplois
for ($i = 0; $i < 10; $i++) {
    Emploi::create([
        'titre_emplois' => 'Poste ' . Str::random(5),
        'description_emplois' => 'Description du poste ' . Str::random(20),
        'date_debut_emplois' => Carbon::now()->addDays(rand(1, 30)),
        'date_fin_emplois' => Carbon::now()->addDays(rand(31, 60)),
        'status_emploi' => 'Publier', // ou un autre statut par défaut selon ton enum ou logique métier

        'type_contrat_id' => $typeContrats->random()->id,
        'secteur_id' => $secteurs->random()->id,
        'niveau_etude_id' => $niveauxEtude->random()->id,
        'niveau_global_experience_id' => $niveauxExperience->random()->id,
        'metier_id' => $metiers->random()->id,
        'renumeration_id' => $renumerations->random()->id,
        'region_id' => $regions->random()->id,
        'partenaire_id' => $partenaires->random()->id,
    ]);
}
    }
}
