<?php

namespace App\Livewire\Admin;

use App\Models\Metier;
use Livewire\Component;
use Livewire\WithPagination;

class MetierIndex extends Component
{
     use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
    public $metiers, $nom_metier, $metier_id;
    public $modalFormVisible = false;
    public $updateMode = false;

    protected $rules = [
        'nom_metier' => 'required|string|max:255',
    ];

    public function render()
    {

        return view('livewire.admin.metier-index', [
            'metiers' => Metier::latest()->paginate(10),
        ])->layout('layouts.admin');
    }
    public function showModalForm()
    {
        $this->resetForm();
        $this->modalFormVisible = true;
        $this->updateMode = false;
    }

    public function showEditModal($id)
    {
        $metier = Metier::findOrFail($id);
        $this->metier_id = $metier->id;
        $this->nom_metier = $metier->nom_metier;
        $this->modalFormVisible = true;
        $this->updateMode = true;
    }

    public function saveMetier()
    {
        $this->validate();
        if ($this->updateMode) {
            Metier::findOrFail($this->metier_id)->update(['nom_metier' => $this->nom_metier]);
            session()->flash('message', 'Métier mis à jour avec succès.');
        } else {
            Metier::create(['nom_metier' => $this->nom_metier]);
            session()->flash('message', 'Métier créé avec succès.');
        }
        $this->modalFormVisible = false;
        $this->resetForm();
    }

    public function deleteMetier($id)
    {
        Metier::destroy($id);
        session()->flash('message', 'Métier supprimé avec succès.');
    }

    public function resetForm()
    {
        $this->reset(['nom_metier', 'metier_id']);
    }
}
