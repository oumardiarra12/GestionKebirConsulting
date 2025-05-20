<?php

namespace App\Livewire\Admin;

use App\Models\TypeContrat;
use Livewire\Component;
use Livewire\WithPagination;

class ContratIndex extends Component
{
    use WithPagination;
     // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
    public  $nom_type_contrat, $description_type_contrat, $typeContratId;
    public $isModalOpen = false;

    protected $rules = [
        'nom_type_contrat' => 'required|string|max:255',
        'description_type_contrat' => 'nullable|string',
    ];

    public function render()
    {
    //    $this->typeContrats = TypeContrat::paginate(10);
        return view('livewire.admin.contrat-index', [
            'typeContrats' => TypeContrat::paginate(10),
        ])->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetInputFields()
    {
        $this->nom_type_contrat = '';
        $this->description_type_contrat = '';
        $this->typeContratId = null;
    }

    public function store()
    {
        $this->validate();

        TypeContrat::updateOrCreate(['id' => $this->typeContratId], [
            'nom_type_contrat' => $this->nom_type_contrat,
            'description_type_contrat' => $this->description_type_contrat,
        ]);

        session()->flash('message',
            $this->typeContratId ? 'Type de contrat mis à jour.' : 'Type de contrat créé.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $typeContrat = TypeContrat::findOrFail($id);
        $this->typeContratId = $id;
        $this->nom_type_contrat = $typeContrat->nom_type_contrat;
        $this->description_type_contrat = $typeContrat->description_type_contrat;

        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        TypeContrat::find($id)->delete();
        session()->flash('message', 'Type de contrat supprimé.');
    }

}
