<?php

namespace App\Livewire\Candidat\Profile;

use App\Models\Disponibilite;
use App\Models\Metier;
use App\Models\MobiliteGeographique;
use App\Models\Renumeration;
use App\Models\Secteur;
use App\Models\TypeContrat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Critiere extends Component
{
      public $candidat;
public $metiers = [];
public $secteurs = [];

public $allMetiers;
public $allSecteurs;
public $disponibilites;
public $selectedDisponibilite;
public $selectedMetier;
public $selectedSecteur;
 public $mobilitesDisponibles = [];
public $mobilitesSelectionnees = [];
public array $selectedTypes = [];
public $typesContrat;
 public $renumeration_id;
    public $renumerations;

public function mount()
{
    $this->candidat = Auth::user();
    $this->typesContrat = TypeContrat::all();
$this->disponibilites = Disponibilite::all();
    $this->allMetiers = Metier::all();
    $this->allSecteurs = Secteur::all();
     $this->selectedDisponibilite = $this->candidat->disponibilites->first()?->id;
 $this->mobilitesDisponibles = MobiliteGeographique::all();
        $this->mobilitesSelectionnees = $this->candidat->mobilitegeographique()->pluck('mobilite_geographiques.id')->toArray() ?? [];
        $this->selectedTypes = $this->candidat->typecontrats()->pluck('type_contrats.id')->toArray() ?? [];
    if ($this->candidat) {
        $this->metiers = $this->candidat->metiers?->pluck('id')->toArray() ?? [];
    $this->secteurs = $this->candidat->secteurs?->pluck('id')->toArray() ?? [];
    }
     $this->renumerations = Renumeration::all();
        $this->renumeration_id = $this->candidat->renumerations()->first()->id ?? null;
}

public function addMetier()
{
    if ($this->selectedMetier && !in_array($this->selectedMetier, $this->metiers)) {
        $this->metiers[] = $this->selectedMetier;
    }
    $this->selectedMetier = null;
}

public function removeMetier($id)
{
    $this->candidat->metiers()->detach($id);
    $this->metiers = array_filter($this->metiers, fn($m) => $m != $id);
}

public function addSecteur()
{
    if ($this->selectedSecteur && !in_array($this->selectedSecteur, $this->secteurs)) {
        $this->secteurs[] = $this->selectedSecteur;
    }
    $this->selectedSecteur = null;
}

public function removeSecteur($id)
{
     $this->user->secteurs()->detach($id);
    $this->secteurs = array_filter($this->secteurs, fn($s) => $s != $id);
}
public function updatedSelectedDisponibilite()
{
    $candidat = Auth::user();
    $candidat->disponibilites()->sync([$this->selectedDisponibilite]);
    session()->flash('message', 'Disponibilité mise à jour avec succès.');
}
     public function updatedMobilitesSelectionnees()
    {
        $this->candidat->mobilitegeographique()->sync($this->mobilitesSelectionnees);
        session()->flash('message', 'Mobilités géographiques mises à jour.');
    }
    public function updatedSelectedTypes()
    {
        $this->candidat->typecontrats()->sync($this->selectedTypes);
        session()->flash('message', 'Types de contrat mis à jour.');
    }

    public function updatedRenumerationId($value)
    {


        // Detach existing then attach the new one
        $this->candidat->renumerations()->sync([$value]);
    }
public function save()
{


    $this->candidat->metiers()->sync($this->metiers);
    $this->candidat->secteurs()->sync($this->secteurs);
    $this->updatedMobilitesSelectionnees();
    $this->updatedSelectedTypes();
    $this->updatedSelectedDisponibilite();
    $this->updatedRenumerationId($this->renumeration_id);
    $this->dispatch('go-to-next-tab');
    session()->flash('message', 'Candidat enregistré avec succès!');
}
    public function render()
    {
        return view('livewire.candidat.profile.critiere');
    }
}
