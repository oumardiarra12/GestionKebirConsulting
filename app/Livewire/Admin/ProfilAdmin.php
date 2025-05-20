<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilAdmin extends Component
{
    use WithFileUploads;

    public $nom_admin, $email, $tel_admin, $description_admin, $photo_admin;
    public $new_photo_admin, $password, $password_confirmation;

    public function mount()
    {
        $admin = Auth::user(); // Assure-toi que seul l'admin utilise ce composant
        $this->nom_admin = $admin->nom_admin;
        $this->email = $admin->email;
        $this->tel_admin = $admin->tel_admin;
        $this->description_admin = $admin->description_admin;
        $this->photo_admin = $admin->photo_admin;
    }

    public function updateProfile()
    {
        $this->validate([
            'nom_admin' => 'required|string|max:255',
            'email' => 'required|email',
            'tel_admin' => 'nullable|string|max:20',
            'description_admin' => 'nullable|string|max:500',
            'new_photo_admin' => 'nullable|image|max:2048',
            'password' => 'nullable|min:6|same:password_confirmation',
        ]);

        $admin = Auth::user();
        $admin->nom_admin = $this->nom_admin;
        $admin->email = $this->email;
        $admin->tel_admin = $this->tel_admin;
        $admin->description_admin = $this->description_admin;

        if ($this->new_photo_admin) {
            $path = $this->new_photo_admin->store('admins', 'public');
            $admin->photo_admin = $path;
        }

        if ($this->password) {
            $admin->password = Hash::make($this->password);
        }

        $admin->save();

        session()->flash('message', 'Profil mis à jour avec succès.');
    }
    public function render()
    {
        return view('livewire.admin.profil-admin')->layout('layouts.admin');
    }
}
