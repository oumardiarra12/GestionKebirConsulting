<?php

namespace App\Livewire\Auth\Public;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public ?string $errorMessage = null;

    public function mount(): mixed
{
    if (Auth::guard('candidat')->check()) {
        return redirect()->route('home');
    }

    return null;
}

    public function logincandidat(): void
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('candidat')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            session()->regenerate();
            redirect()->route('candidat.dashboard');
        } else {
            $this->errorMessage = 'Identifiants incorrects.';
        }
    }

    public function render()
    {
        return view('livewire.auth.public.login')
            ->layout('layouts.public');
    }
}
