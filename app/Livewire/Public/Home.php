<?php

namespace App\Livewire\Public;

use App\Models\Emploi;
use App\Models\Metier;
use App\Models\Secteur;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
     public $emplois;
      public $searchTitre = '';
    public $metier = '';
    public $secteur = '';
       public $date_debut_emplois;
    public $date_fin_emplois;
    public $jours_restants;
public $limit = 6;

    public function loadMore()
    {
        $this->limit += 6;
    }
    public function render()
    {
          $this->emplois = Emploi::query()
    ->with([
        'metier:id,nom_metier',
        'secteur:id,nom_secteur',
        'typecontrat:id,nom_type_contrat',
        'niveauetude:id,nom_niveau_etude',
        'niveauglobalexperience:id,nom_niveau_global_experience',
        'renumeration:id,nom_renumeration'
    ])
    ->where('status_emploi', 'Publier') // ✅ Ajout du filtre sur le statut
    ->when($this->searchTitre, fn($q) => $q->where('titre_emplois', 'like', '%' . $this->searchTitre . '%'))
    ->when($this->metier, fn($q) => $q->where('metier_id', $this->metier))
    ->when($this->secteur, fn($q) => $q->where('secteur_id', $this->secteur))
    ->orderByDesc('created_at')
    ->take($this->limit)
    ->get();
        return view('livewire.public.home', [
            // 'offres' => $offres,
            'metiers' => Metier::select('id', 'nom_metier')->get(),
            'secteurs' => Secteur::select('id', 'nom_secteur')->get(),
        ])->layout('layouts.public');
    }
}
