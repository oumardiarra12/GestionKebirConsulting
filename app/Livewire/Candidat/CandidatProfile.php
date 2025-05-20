<?php

namespace App\Livewire\Candidat;

use App\Models\Candidat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CandidatProfile extends Component
{
    use WithFileUploads;

    public Candidat $abonne;
    public $nom_candidat, $prenom_candidat, $datenaissance_candidat, $lieunaissance_candidat,
           $sexe_candidat, $nationalite_candidat, $email, $tel_candidat,
           $situationmatrimoniale_candidat, $adresse_candidat, $nombreenfant_candidat,
           $photo_candidat, $cv_candidat;

    public $formations = [], $experiences = [], $langues = [], $competences = [];

    public function mount()
    {
        // Récupération automatique du candidat connecté
        $this->abonne = Auth::guard('candidat')->user();

        // Remplissage des champs principaux
        $this->fill($this->abonne->only([
            'nom_candidat', 'prenom_candidat', 'datenaissance_candidat', 'lieunaissance_candidat',
            'sexe_candidat', 'nationalite_candidat', 'email', 'tel_candidat',
            'situationmatrimoniale_candidat', 'adresse_candidat', 'nombreenfant_candidat',
            'photo_candidat', 'cv_candidat'
        ]));

        // Chargement des relations
        $this->formations   = $this->abonne->formations()->get()->toArray();
        $this->experiences  = $this->abonne->experiences()->get()->toArray();
        $this->langues      = $this->abonne->langues()->get()->toArray();
        $this->competences  = $this->abonne->competences()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.candidat.candidat-profile')->layout('layouts.public');
    }
}
