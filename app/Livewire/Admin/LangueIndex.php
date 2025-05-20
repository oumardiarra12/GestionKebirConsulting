<?php

namespace App\Livewire\Admin;

use App\Models\Langue;
use Livewire\Component;
use Livewire\WithPagination;

class LangueIndex extends Component
{
    use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
    public  $nom_langue, $langue_id;
    public $isOpen = 0;
    public function render()
    {

        return view('livewire.admin.langue-index', [
            'langues' => Langue::paginate(5),
        ])->layout('layouts.admin');
    }
    public function store()
    {
        $this->validate([
            'nom_langue' => 'required|string|max:25',
        ]);

        Langue::create(['nom_langue' => $this->nom_langue]);

        session()->flash('message', 'Langue ajoutée avec succès.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $langue = Langue::find($id);
        $this->langue_id = $id;
        $this->nom_langue = $langue->nom_langue;

        $this->openModal();
    }
    private function resetFields()
    {
        $this->langue_id = null;
        $this->nom_langue = '';

    }
    public function update()
    {
        $this->validate([
            'nom_langue' => 'required|string|max:25',
        ]);

        $langue = Langue::find($this->langue_id);
        $langue->update(['nom_langue' => $this->nom_langue]);

        session()->flash('message', 'Langue mise à jour avec succès.');

        $this->closeModal();
    }

    public function delete($id)
    {
        Langue::find($id)->delete();

        session()->flash('message', 'Langue supprimée avec succès.');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetFields();
    }
}
