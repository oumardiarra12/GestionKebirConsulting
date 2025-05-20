<?php

namespace App\Livewire\Admin;

use App\Models\Expertise;
use Livewire\Component;
use Livewire\WithPagination;

class ExpertiseIndex extends Component
{
     use WithPagination;
      // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
     public $nom_expertise, $expertise_id;
    public $modal = false;

    protected $rules = [
        'nom_expertise' => 'required|string|max:255'
    ];

    public function render()
    {

        return view('livewire.admin.expertise-index', [
            'expertises' => Expertise::latest()->paginate(5),
        ])->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->resetInput();
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function resetInput()
    {
        $this->nom_expertise = null;
        $this->expertise_id = null;
    }

    public function store()
    {
        $this->validate();

        Expertise::updateOrCreate(
            ['id' => $this->expertise_id],
            ['nom_expertise' => $this->nom_expertise]
        );

        session()->flash('message',
            $this->expertise_id ? 'Expertise modifiée avec succès.' : 'Expertise créée avec succès.');

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $expertise = Expertise::findOrFail($id);
        $this->expertise_id = $expertise->id;
        $this->nom_expertise = $expertise->nom_expertise;
        $this->modal = true;
    }

    public function delete($id)
    {
        Expertise::find($id)?->delete();
        session()->flash('message', 'Expertise supprimée avec succès.');
    }

}
