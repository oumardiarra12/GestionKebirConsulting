<?php

namespace App\Livewire\Candidat;

use App\Models\Emploi;
use App\Models\Metier;
use App\Models\Secteur;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class OffreEmploiIndex extends Component
{
    use WithPagination;

    public $searchTitre = '';
    public $metier = '';
    public $secteur = '';
   public $date_debut_emplois;
    public $date_fin_emplois;
    public $jours_restants;

    protected $paginationTheme = 'bootstrap';

  public function updatingSearchTitre()
{
    $this->resetPage();
}

public function updatingMetier()
{
    $this->resetPage();
}

public function updatingSecteur()
{
    $this->resetPage();
}
public function calculerJoursRestants()
{
    if ($this->date_debut_emplois && $this->date_fin_emplois) {
        $debut = Carbon::parse($this->date_debut_emplois);
        $fin = Carbon::parse($this->date_fin_emplois);

        // Utiliser abs(false) pour ne pas retourner un nombre absolu (donc si fin < debut, résultat négatif)
        $jours = $debut->diffInDays($fin, false);

        // Si tu veux arrondir vers le haut même s’il reste quelques heures (1.2 jours => 2), utilise ceil()
        $this->jours_restants = $jours > 0 ? ceil($jours) : 0;
    } else {
        $this->jours_restants = 0;
    }
}
    public function render()
    {
      $offres = Emploi::query()
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
            ->paginate(10);

        return view('livewire.candidat.offre-emploi-index', [
            'offres' => $offres,
            'metiers' => Metier::select('id', 'nom_metier')->get(),
            'secteurs' => Secteur::select('id', 'nom_secteur')->get(),
        ])->layout('layouts.public');
    }
}
