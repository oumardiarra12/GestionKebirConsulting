<?php

namespace App\Livewire\Auth\Admin;

use Livewire\Component;

class Login extends Component
{
    public $tel, $password;
    public function login()
    {
        $this->validate([
            'tel' => 'required',
            'password' => 'required',
        ]);

        if (auth('admin')->attempt(['tel_admin' => $this->tel, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        $this->addError('tel', 'Numéro ou mot de passe incorrect');
    }
    public function render()
    {
        return view('livewire.auth.admin.login')->layout('layouts.auth');
    }
}
