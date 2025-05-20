<?php

namespace App\Livewire\Candidat\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Options extends Component
{
     public $current_email;
    public $new_email;
    public $password;

    protected $rules = [
        'new_email' => 'required|email|unique:users,email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changeEmail()
    {
        $user = Auth::user();

        // Vérification de l'email actuel ou du mot de passe
        if ($this->current_email !== $user->email && !Hash::check($this->password, $user->password)) {
            $this->addError('auth', 'Vous devez fournir soit l\'email actuel correct, soit le mot de passe.');
            return;
        }

        $this->validate();

        // Mise à jour de l'email
        $user->email = $this->new_email;
        $user->save();

        session()->flash('message', 'Votre email a été mis à jour avec succès.');
        // Réinitialiser les champs
        $this->reset(['current_email', 'new_email', 'password']);
    }
    public function render()
    {
        return view('livewire.candidat.profile.options');
    }
}
