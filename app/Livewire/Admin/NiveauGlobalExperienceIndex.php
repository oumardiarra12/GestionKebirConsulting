<?php

namespace App\Livewire\Admin;

use App\Models\NiveauGlobalExperience;
use Livewire\Component;
use Livewire\WithPagination;

class NiveauGlobalExperienceIndex extends Component
{
    use WithPagination;

    public $nom_niveau_global_experience, $niveauId;
    public $isEdit = false;
    public $showModal = false;

    protected $rules = [
        'nom_niveau_global_experience' => 'required|string|min:2|max:255',
    ];

    protected $paginationTheme = 'bootstrap';

    public function resetForm()
    {
        $this->reset(['nom_niveau_global_experience', 'niveauId', 'isEdit', 'showModal']);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function store()
    {
        $this->validate();

        NiveauGlobalExperience::create([
            'nom_niveau_global_experience' => $this->nom_niveau_global_experience,
        ]);

        $this->resetForm();
        session()->flash('message', 'Niveau ajouté avec succès.');
    }
    public function showCreateModal()
    {
        $this->resetForm();
     $this->openModal();
        $this->isEdit = false;
    }
    public function edit($id)
    {
        $niveau = NiveauGlobalExperience::findOrFail($id);
        $this->niveauId = $niveau->id;
        $this->nom_niveau_global_experience = $niveau->nom_niveau_global_experience;
        $this->isEdit = true;
        $this->openModal();
    }

    public function update()
    {
        $this->validate();

        if ($this->niveauId) {
            $niveau = NiveauGlobalExperience::findOrFail($this->niveauId);
            $niveau->update([
                'nom_niveau_global_experience' => $this->nom_niveau_global_experience,
            ]);

            $this->resetForm();
            session()->flash('message', 'Niveau modifié avec succès.');
        }
    }

    public function delete($id)
    {
        NiveauGlobalExperience::destroy($id);
        session()->flash('message', 'Niveau supprimé.');
    }

    public function render()
    {
        return view('livewire.admin.niveau-global-experience-index', [
            'niveaux' => NiveauGlobalExperience::latest()->paginate(5),
        ])->layout('layouts.admin');
    }
}
