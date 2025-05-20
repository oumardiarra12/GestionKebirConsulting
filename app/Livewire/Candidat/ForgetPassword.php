<?php

namespace App\Livewire\Candidat;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgetPassword extends Component
{
    public string $email = '';

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:candidats,email',
        ]);

        // Utilisation du broker personnalisé pour le guard "candidat"
        $status = Password::broker('candidats')->sendResetLink([
            'email' => $this->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.candidat.forget-password')
            ->layout('layouts.public');
    }
}
