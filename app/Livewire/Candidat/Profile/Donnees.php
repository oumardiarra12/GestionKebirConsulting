<?php

namespace App\Livewire\Candidat\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Donnees extends Component
{
    public $candidatId;
     public $candidat;
    public $nom_candidat, $prenom_candidat, $datenaissance_candidat,
           $lieunaissance_candidat, $sexe_candidat, $nationalite_candidat,
           $tel_candidat, $adresse_candidat;

    public function mount()
    {
        $candidat = Auth::user();

        $this->candidatId = $candidat->id;
        $this->nom_candidat = $candidat->nom_candidat;
        $this->prenom_candidat = $candidat->prenom_candidat;
        $this->datenaissance_candidat = $candidat->datenaissance_candidat;
        $this->lieunaissance_candidat = $candidat->lieunaissance_candidat;
        $this->sexe_candidat = $candidat->sexe_candidat;
        $this->nationalite_candidat = $candidat->nationalite_candidat;
        $this->tel_candidat = $candidat->tel_candidat;
        $this->adresse_candidat = $candidat->adresse_candidat;
    }

    public function update()
    {
        $this->validate([
            'nom_candidat' => 'required|string|max:255',
            'prenom_candidat' => 'required|string|max:255',
            'datenaissance_candidat' => 'required|date',
            'lieunaissance_candidat' => 'required|string|max:255',
            'sexe_candidat' => 'required|in:M,F',
            'nationalite_candidat' => 'required|string|max:255',
            'tel_candidat' => 'required|string|max:20',
            'adresse_candidat' => 'nullable|string|max:255',
        ]);



        $this->candidat->update([
            'nom_candidat' => $this->nom_candidat,
            'prenom_candidat' => $this->prenom_candidat,
            'datenaissance_candidat' => $this->datenaissance_candidat,
            'lieunaissance_candidat' => $this->lieunaissance_candidat,
            'sexe_candidat' => $this->sexe_candidat,
            'nationalite_candidat' => $this->nationalite_candidat,
            'tel_candidat' => $this->tel_candidat,
            'adresse_candidat' => $this->adresse_candidat,
        ]);

        session()->flash('success', 'Candidat mis à jour avec succès.');
    }
    public function render()
    {
        return view('livewire.candidat.profile.donnees');
    }
}
