<?php

namespace App\Livewire\Admin;

use App\Models\Renumeration;
use Livewire\Component;
use Livewire\WithPagination;

class RenumerationIndex extends Component
{
    use WithPagination;

    public $nom_renumeration, $renumerationId;
    public $isModalOpen = false;
    public $isEditMode=false;
    protected $rules = [
        'nom_renumeration' => 'required|string|max:255',
    ];

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $renumerations = Renumeration::latest()->paginate(5);
        return view('livewire.admin.renumeration-index', compact('renumerations'))->layout('layouts.admin');
    }
    public function resetFields()
    {
        $this->nom_renumeration = '';
        $this->renumerationId = null;
        $this->isModalOpen = false;
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
    public function showCreateModal()
    {
        $this->resetFields();
     $this->openModal();
        $this->isModalOpen = true;
        $this->isEditMode=false;
    }
    public function store()
    {
        $this->validate();

        Renumeration::create([
            'nom_renumeration' => $this->nom_renumeration,
        ]);

        session()->flash('message', 'Rémunération ajoutée avec succès.');
        $this->resetFields();
        $this->dispatch('closeModal');
    }

    public function edit($id)
    {
        $renum = Renumeration::findOrFail($id);
        $this->renumerationId = $renum->id;
        $this->nom_renumeration = $renum->nom_renumeration;
        $this->isModalOpen = true;
        $this->isEditMode=true;
    }

    public function update()
    {
        $this->validate();

        Renumeration::find($this->renumerationId)->update([
            'nom_renumeration' => $this->nom_renumeration,
        ]);

        session()->flash('message', 'Rémunération modifiée.');
        $this->resetFields();

    }

    public function delete($id)
    {
        Renumeration::destroy($id);
        session()->flash('message', 'Rémunération supprimée.');
    }
}
