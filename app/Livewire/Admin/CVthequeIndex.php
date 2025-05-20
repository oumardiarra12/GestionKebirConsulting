<?php

namespace App\Livewire\Admin;

use App\Models\Candidat;
use App\Models\Metier;
use App\Models\NiveauEtude;
use App\Models\NiveauGlobalExperience;
use App\Models\Secteur;
use Livewire\Component;
use Livewire\WithPagination;

class CVthequeIndex extends Component
{
     use WithPagination;
      public $niveauglobalexperience = '';
    public $secteur = '';
    public $metier = '';
    public $sexe_candidat = '';
    public $niveauetude = '';
    protected $updatesQueryString = [
        'niveauglobalexperience' => ['except' => ''],
        'secteur' => ['except' => ''],
        'metier' => ['except' => ''],
        'sexe_candidat' => ['except' => ''],
        'niveauetude' => ['except' => ''],
    ];
     protected $queryString = ['page'];

    public function updating($field)
    {
        $this->resetPage();
    }
    public function resetFilters()
{
    $this->reset(['niveauglobalexperience', 'secteur', 'metier', 'sexe_candidat', 'niveauetude']);
    $this->resetPage(); // remet la pagination à la page 1
}
    public function render()
    {
       $query = Candidat::query()
    ->with(['secteurs', 'metiers']) // Corrigé pour correspondre aux relations belongsToMany
    ->when($this->niveauglobalexperience, fn($q) =>
        $q->whereHas('candidatnges', fn($subQ) =>
            $subQ->where('niveau_global_experience_id', $this->niveauglobalexperience)
        )
    )
    ->when($this->secteur, fn($q) =>
        $q->whereHas('secteurs', fn($subQ) =>
            $subQ->where('secteurs.id', $this->secteur)
        )
    )
    ->when($this->metier, fn($q) =>
        $q->whereHas('metiers', fn($subQ) =>
            $subQ->where('metiers.id', $this->metier)
        )
    )
    ->when($this->sexe_candidat, fn($q) =>
        $q->where('sexe_candidat', $this->sexe_candidat)
    )
    ->when($this->niveauetude, fn($q) =>
        $q->whereHas('niveauetudes', fn($subQ) =>
            $subQ->where('niveau_etudes.id', $this->niveauetude)
        )
    )
    ->latest();
        return view('livewire.admin.c-vtheque-index', [
    'candidats' => $query->paginate(10),
    'secteurs' => cache()->rememberForever('secteurs.all', fn() => Secteur::all()),
    'metiers' => cache()->rememberForever('metiers.all', fn() => Metier::all()),
    'niveauetudes' => cache()->rememberForever('niveauetudes.all', fn() => NiveauEtude::all()),
    'niveauexperiences' => cache()->rememberForever('niveauexperiences.all', fn() => NiveauGlobalExperience::all()),
])->layout('layouts.admin');
    }
}
