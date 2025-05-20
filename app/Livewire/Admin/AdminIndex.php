<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $adminId;
    public $nom_admin, $email, $tel_admin, $password, $description_admin, $photo_admin;
    public $isModalOpen = false;
    public $search = '';

    protected function rules()
    {
        return [
            'nom_admin' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $this->adminId,
            'tel_admin' => 'required|string|max:20',
            'password' => $this->adminId ? 'nullable|min:6' : 'required|min:6',
            'description_admin' => 'nullable|string',
            'photo_admin' => 'nullable|image|max:1024',
        ];
    }

    public function render()
    {
        $administrateurs = Admin::query()
            ->where(function ($query) {
                $query->where('nom_admin', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('tel_admin', 'like', "%{$this->search}%");
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('livewire.admin.admin-index', [
            'administrateurs' => $administrateurs
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo_admin) {
            $photoPath = $this->photo_admin->store('admins', 'public');
        }

        Admin::create([
            'nom_admin'          => $this->nom_admin,
            'email'              => $this->email,
            'tel_admin'          => $this->tel_admin,
            'password'           => Hash::make($this->password),
            'description_admin'  => $this->description_admin,
            'photo_admin'        => $photoPath,
        ]);

        session()->flash('message', 'Admin ajouté avec succès.');

        $this->closeModal();

        // Optionnel : Réinitialiser les champs du formulaire
        $this->reset(['nom_admin', 'email', 'tel_admin', 'password', 'description_admin', 'photo_admin']);

    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        $this->adminId = $admin->id;
        $this->nom_admin = $admin->nom_admin;
        $this->email = $admin->email;
        $this->tel_admin = $admin->tel_admin;
        $this->description_admin = $admin->description_admin;
        $this->photo_admin = null;

        $this->openModal();
    }

    public function update()
    {
        $this->validate();

        $admin = Admin::findOrFail($this->adminId);

        if ($this->photo_admin) {
            if ($admin->photo_admin) {
                Storage::disk('public')->delete($admin->photo_admin);
            }
            $photoPath = $this->photo_admin->store('photos', 'public');
        }

        $admin->update([
            'nom_admin' => $this->nom_admin,
            'email' => $this->email,
            'tel_admin' => $this->tel_admin,
            'password' => $this->password ? Hash::make($this->password) : $admin->password,
            'description_admin' => $this->description_admin,
            'photo_admin' => $photoPath ?? $admin->photo_admin,
        ]);

        session()->flash('message', 'Admin mis à jour avec succès.');
        $this->closeModal();
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->photo_admin) {
            Storage::disk('public')->delete($admin->photo_admin);
        }
        $admin->delete();

        session()->flash('message', 'Admin supprimé avec succès.');
    }

    private function resetInputFields()
    {
        $this->adminId = null;
        $this->nom_admin = '';
        $this->email = '';
        $this->tel_admin = '';
        $this->password = '';
        $this->description_admin = '';
        $this->photo_admin = null;
    }

    private function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }
}
