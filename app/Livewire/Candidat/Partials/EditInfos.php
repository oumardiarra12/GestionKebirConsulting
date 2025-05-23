<?php

namespace App\Livewire\Candidat\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditInfos extends Component
{
     use WithFileUploads;

    public $candidat ;
   // mot de passe en clair
     // Propriétés individuelles à plat
    public $nom_candidat;
    public $prenom_candidat;
    public $email;
    public $datenaissance_candidat;
    public $lieunaissance_candidat;
    public $sexe_candidat;
    public $nationalite_candidat;
    public $tel_candidat;
    public $situationmatrimoniale_candidat;
    public $nombreenfant_candidat;
    public $adresse_candidat;
    public $urllinkedln_candidat;

    public $photo_candidat;
    public $cv_candidat;
    public $password;
    public $password_confirmation;


    public function mount()
    {
        $this->candidat = Auth::user(); // objet User
        $this->nom_candidat = $this->candidat->nom_candidat;
        $this->prenom_candidat = $this->candidat->prenom_candidat;
        $this->email = $this->candidat->email;
        $this->datenaissance_candidat = $this->candidat->datenaissance_candidat;
        $this->lieunaissance_candidat = $this->candidat->lieunaissance_candidat;
        $this->sexe_candidat = $this->candidat->sexe_candidat;
        $this->nationalite_candidat = $this->candidat->nationalite_candidat;
        $this->tel_candidat = $this->candidat->tel_candidat;
        $this->situationmatrimoniale_candidat = $this->candidat->situationmatrimoniale_candidat;
        $this->nombreenfant_candidat = $this->candidat->nombreenfant_candidat;
        $this->adresse_candidat = $this->candidat->adresse_candidat;
        $this->urllinkedln_candidat = $this->candidat->urllinkedln_candidat;

        $this->password = null;
        $this->password_confirmation = null;
    }

   protected $rules = [
    'candidat.nom_candidat' => 'required|string|max:255',
    'candidat.prenom_candidat' => 'required|string|max:255',
    'candidat.email' => 'required|email|max:255',
    'candidat.datenaissance_candidat' => 'nullable|date',
    'candidat.lieunaissance_candidat' => 'nullable|string|max:255',
    'candidat.sexe_candidat' => 'nullable|in:Homme,Femme',
    'candidat.nationalite_candidat' => 'nullable|string|max:255',
    'candidat.tel_candidat' => 'nullable|string|max:25',
    'candidat.situationmatrimoniale_candidat' => 'nullable|in:Célibataire,Marié(e),Divorcé(e),Veuf(ve)',
    'candidat.adresse_candidat' => 'nullable|string|max:500',
    'candidat.nombreenfant_candidat' => 'nullable|integer|min:0',
    'candidat.urllinkedln_candidat' => 'nullable|url|max:255',
    'photo_candidat' => 'nullable|image|max:1024',
    'cv_candidat' => 'nullable|mimes:pdf,doc,docx|max:2048',
    'password' => 'nullable|string|min:6|confirmed',
];


    public function updatedPhotoCandidat()
    {
        $this->validateOnly('photo_candidat');
    }

    public function updatedCvCandidat()
    {
        $this->validateOnly('cv_candidat');
    }

    public function save()
    {
        $this->validate();

        $this->candidat->nom_candidat = $this->nom_candidat;
        $this->candidat->prenom_candidat = $this->prenom_candidat;
        $this->candidat->email = $this->email;
        $this->candidat->datenaissance_candidat = $this->datenaissance_candidat;
        $this->candidat->lieunaissance_candidat = $this->lieunaissance_candidat;
        $this->candidat->sexe_candidat = $this->sexe_candidat;
        $this->candidat->nationalite_candidat = $this->nationalite_candidat;
        $this->candidat->tel_candidat = $this->tel_candidat;
        $this->candidat->situationmatrimoniale_candidat = $this->situationmatrimoniale_candidat;
        $this->candidat->nombreenfant_candidat = $this->nombreenfant_candidat;
        $this->candidat->adresse_candidat = $this->adresse_candidat;
        $this->candidat->urllinkedln_candidat = $this->urllinkedln_candidat;

        if ($this->password) {
            $this->candidat->password = Hash::make($this->password);
        }

        if ($this->photo_candidat) {
            if ($this->candidat->photo_candidat) {
                Storage::disk('public')->delete($this->candidat->photo_candidat);
            }
            $this->candidat->photo_candidat = $this->photo_candidat->store('photos_candidats', 'public');
        }

        if ($this->cv_candidat) {
            if ($this->candidat->cv_candidat) {
                Storage::disk('public')->delete($this->candidat->cv_candidat);
            }
            $this->candidat->cv_candidat = $this->cv_candidat->store('cvs_candidats', 'public');
        }

        $this->candidat->save();

        session()->flash('message', 'Informations mises à jour avec succès.');

        // Optionnel : reset des fichiers uploadés
        $this->photo_candidat = null;
        $this->cv_candidat = null;
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function getPhotoUrlProperty()
    {
        return $this->candidat->photo_candidat ? Storage::url($this->candidat->photo_candidat) : null;
    }

    public function getCvUrlProperty()
    {
        return $this->candidat->cv_candidat ? Storage::url($this->candidat->cv_candidat) : null;
    }

    public function removePhoto()
    {
        if ($this->candidat->photo_candidat) {
            Storage::disk('public')->delete($this->candidat->photo_candidat);
            $this->candidat->photo_candidat = null;
            $this->candidat->save();
        }
        $this->photo_candidat = null;
    }

    public function removeCv()
    {
        if ($this->candidat->cv_candidat) {
            Storage::disk('public')->delete($this->candidat->cv_candidat);
            $this->candidat->cv_candidat = null;
            $this->candidat->save();
        }
        $this->cv_candidat = null;
    }
    public function render()
    {
        return view('livewire.candidat.partials.edit-infos');
    }
}
