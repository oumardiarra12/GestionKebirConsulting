<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfilVoirAdmin extends Component
{
    public $admin;

    public function mount()
    {
        // On récupère le premier profil admin. À adapter selon votre logique.
        $this->admin = Auth::user();
    }
    public function render()
    {
        return view('livewire.admin.profil-voir-admin')->layout('layouts.admin');
    }
}
