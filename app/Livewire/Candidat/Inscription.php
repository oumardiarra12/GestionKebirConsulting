<?php

namespace App\Livewire\Candidat;

use App\Models\Candidat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Inscription extends Component
{
    #[Validate('required|string|max:255')]
    public $nom_candidat;

    #[Validate('required|string|max:255')]
    public $prenom_candidat;

    #[Validate('required|date')]
    public $datenaissance_candidat;

    #[Validate('required|in:M,F')]
    public $sexe_candidat;

    #[Validate('required|email|unique:candidats,email')]
    public $email;

    #[Validate('required|string|max:20')]
    public $tel_candidat;

    #[Validate(['required', 'confirmed'])]
    public $password;

    public $password_confirmation;

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $validated = $this->validate();

       try {
    // Création du candidat
    $candidat = Candidat::create([
        'nom_candidat'         => $this->nom_candidat,
        'prenom_candidat'      => $this->prenom_candidat,
        'datenaissance_candidat'=> $this->datenaissance_candidat,
        'sexe_candidat'        => $this->sexe_candidat,
        'email'                => $this->email,
        'tel_candidat'         => $this->tel_candidat,
        'password'             => Hash::make($this->password),
    ]);

    // Envoi de l’email de vérification
    event(new Registered($candidat)); // Utilise l'événement Laravel standard pour gérer les notifications

    // Vérification que l'email n'est pas déjà vérifié avant connexion
    if (!$candidat->hasVerifiedEmail()) {
        // Connexion automatique uniquement si l'envoi de mail est présumé réussi
        Auth::guard('candidat')->login($candidat);
        session()->regenerate();

        return redirect()->route('verification.notice')->with('message', 'Veuillez vérifier votre adresse e-mail.');
    }

} catch (\Exception $e) {
    // Log pour le debug (optionnel mais recommandé)
    Log::error("Erreur lors de l'inscription du candidat : " . $e->getMessage());

    // Lève une exception que Livewire ou Laravel gère proprement
    throw ValidationException::withMessages([
        'email' => 'Une erreur est survenue lors de l’envoi de l’e-mail de vérification. Veuillez réessayer.',
    ]);
}
        // Notification côté Livewire
        $this->dispatch('notification', message: 'Inscription réussie. Vérifiez votre adresse email.');

        // Redirection vers page de vérification d’email
        return redirect()->route('verification.notice');
    }

    public function render()
    {
        return view('livewire.candidat.inscription')->layout('layouts.public');
    }
}
