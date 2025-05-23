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


    public bool $editMode = false;
    public string $tab = 'infos'; // Onglet actif par défaut
public $candidat = [
        'nom_candidat' => '',
        'prenom_candidat' => '',
        'datenaissance_candidat' => '',
        'lieunaissance_candidat' => '',
        'sexe_candidat' => '',
        'nationalite_candidat' => '',
        'email' => '',
        'tel_candidat' => '',
        'situationmatrimoniale_candidat' => '',
        'adresse_candidat' => '',
        'nombreenfant_candidat' => '',
        'password' => '',
        'urllinkedln_candidat' => '',
    ];

    public $photo_candidat;
    public $cv_candidat;
   protected function rules()
    {
        return [
            'candidat.nom_candidat' => 'required|string|max:255',
            'candidat.prenom_candidat' => 'required|string|max:255',
            'candidat.datenaissance_candidat' => 'required|date',
            'candidat.lieunaissance_candidat' => 'required|string|max:255',
            'candidat.sexe_candidat' => 'required|in:Homme,Femme',
            'candidat.nationalite_candidat' => 'required|string|max:255',
            'candidat.email' => 'required|email|unique:candidats,email',
            'candidat.tel_candidat' => 'required|string|max:20',
            'candidat.situationmatrimoniale_candidat' => 'nullable|string|max:255',
            'candidat.adresse_candidat' => 'nullable|string|max:255',
            'candidat.nombreenfant_candidat' => 'nullable|integer|min:0',
            'candidat.password' => 'required|string|min:6',
            'candidat.urllinkedln_candidat' => 'nullable|url',
            'photo_candidat' => 'nullable|image|max:2048',
            'cv_candidat' => 'nullable|mimes:pdf,doc,docx|max:4096',
        ];
    }

    public function mount()
    {
         $this->candidat = Auth::user()->load([
        'formations', 'experiences', 'competences',
        'langues', 'metiers', 'secteurs', 'niveauetudes',
        'disponibilites', 'typecontrats', 'regions',
        'mobilitegeographique', 'renumerations'
    ]);
    }

    public function toggleEdit()
    {
        $this->editMode = !$this->editMode;
    }

    public function save()
    {
       $this->validate();

        $photoPath = $this->photo_candidat ? $this->photo_candidat->store('photos', 'public') : null;
        $cvPath = $this->cv_candidat ? $this->cv_candidat->store('cvs', 'public') : null;

        $candidat = Auth::user();
        $candidat->fill($this->candidat);
        $candidat->password = Hash::make($this->candidat['password']);
        $candidat->photo_candidat = $photoPath;
        $candidat->cv_candidat = $cvPath;
        $candidat->save();

        session()->flash('message', 'Candidat enregistré avec succès.');

        $this->reset(); //
        $this->editMode = false;
        session()->flash('success', 'Profil mis à jour avec succès.');
    }

    public function render()
    {
        return view('livewire.candidat.candidat-profile')->layout('layouts.public');
    }
}
