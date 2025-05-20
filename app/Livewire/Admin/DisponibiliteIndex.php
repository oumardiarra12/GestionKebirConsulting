<?php

namespace App\Livewire\Admin;

use App\Models\Disponibilite;
use Livewire\Component;
use Livewire\WithPagination;

class DisponibiliteIndex extends Component
{
    use WithPagination;

    public $nom_disponibilite, $disponibilite_id;
    public $isEdit = false;
    public $showModal = false;

    protected $rules = [
        'nom_disponibilite' => 'required|string|min:2|max:100',
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.disponibilite-index', [
            'disponibilites' => Disponibilite::latest()->paginate(5),
        ])->layout('layouts.admin');
    }

    public function resetForm()
    {
        $this->nom_disponibilite = '';
        $this->disponibilite_id = null;
        $this->isEdit = false;
        $this->showModal = false;
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        Disponibilite::create([
            'nom_disponibilite' => $this->nom_disponibilite,
        ]);

        session()->flash('success', 'Ajouté avec succès');
        $this->resetForm();
    }

    public function edit($id)
    {
        $disponibilite = Disponibilite::findOrFail($id);

        $this->disponibilite_id = $disponibilite->id;
        $this->nom_disponibilite = $disponibilite->nom_disponibilite;
        $this->isEdit = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $disponibilite = Disponibilite::findOrFail($this->disponibilite_id);
        $disponibilite->update([
            'nom_disponibilite' => $this->nom_disponibilite,
        ]);

        session()->flash('success', 'Mis à jour avec succès');
        $this->resetForm();
    }

    public function delete($id)
    {
        Disponibilite::destroy($id);
        session()->flash('success', 'Supprimé avec succès');
    }
}
