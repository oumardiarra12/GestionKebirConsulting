<?php

namespace App\Livewire\Admin;

use App\Models\NiveauEtude as ModelsNiveauEtude;
use Livewire\Component;
use Livewire\WithPagination;

class NiveauEtude extends Component
{
      use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
    public  $nom_niveau_etude, $niveauEtude_id;
    public $isModalOpen = false;
    public function render()
    {

        return view('livewire.admin.niveau-etude', [
            'niveauEtudes' => ModelsNiveauEtude::latest()->paginate(5),
        ])->layout('layouts.admin');
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->nom_niveau_etude = '';
        $this->niveauEtude_id = null;
    }

    public function store()
    {
        $this->validate(['nom_niveau_etude' => 'required|string|max:255']);

        ModelsNiveauEtude::updateOrCreate(
            ['id' => $this->niveauEtude_id],
            ['nom_niveau_etude' => $this->nom_niveau_etude]
        );

        session()->flash('message', $this->niveauEtude_id ? 'Modifié avec succès' : 'Créé avec succès');

        $this->closeModal();
    }

    public function edit($id)
    {
        $niveau = ModelsNiveauEtude::findOrFail($id);
        $this->niveauEtude_id = $id;
        $this->nom_niveau_etude = $niveau->nom_niveau_etude;

        $this->openModal();
    }

    public function delete($id)
    {
        ModelsNiveauEtude::findOrFail($id)->delete();
        session()->flash('message', 'Supprimé avec succès');
    }
}
