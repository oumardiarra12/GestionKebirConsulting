<?php

namespace App\Livewire\Admin;

use App\Models\Secteur;
use Livewire\Component;
use Livewire\WithPagination;

class SecteurIndex extends Component
{
     use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
    public $nom_secteur, $description_secteur, $secteur_id;
    public $isOpen = false;

    protected $rules = [
        'nom_secteur' => 'required|string|max:255',
        'description_secteur' => 'nullable|string',
    ];
    public function render()
    {

        return view('livewire.admin.secteur-index', [
            'secteurs' => Secteur::latest()->paginate(10),
        ])->layout('layouts.admin');
    }
    public function openModal()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->nom_secteur = '';
        $this->description_secteur = '';
        $this->secteur_id = null;
    }

    public function store()
    {
        $this->validate();

        Secteur::updateOrCreate(['id' => $this->secteur_id], [
            'nom_secteur' => $this->nom_secteur,
            'description_secteur' => $this->description_secteur,
        ]);

        session()->flash('message', $this->secteur_id ? 'Secteur mis à jour.' : 'Secteur créé.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $secteur = Secteur::findOrFail($id);
        $this->secteur_id = $secteur->id;
        $this->nom_secteur = $secteur->nom_secteur;
        $this->description_secteur = $secteur->description_secteur;
        $this->isOpen = true;
    }

    public function delete($id)
    {
        Secteur::find($id)->delete();
        session()->flash('message', 'Secteur supprimé.');
    }
}
