<?php

namespace App\Livewire\Candidat\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Formation extends Component
{
    public  $candidat;

    public $diplome_formation, $description_formation, $etablissement_formation;
    public $date_debut_formation, $date_fin_formation, $encours_formation = false;
    public $editing = false;
    public $formationId = null;

    protected function rules()
    {
        return [
            'diplome_formation' => 'required|string|max:255',
            'description_formation' => 'nullable|string',
            'etablissement_formation' => 'required|string|max:255',
            'date_debut_formation' => 'required|date',
            'date_fin_formation' => 'nullable|date|after_or_equal:date_debut_formation',
            'encours_formation' => 'boolean',
        ];
    }

    public function mount()
    {
        $this->candidat = Auth::user();
    }

    public function save()
    {
        $this->validate();

        $formation = Formation::updateOrCreate(
            ['id' => $this->formationId],
            [
                'diplome_formation' => $this->diplome_formation,
                'description_formation' => $this->description_formation,
                'etablissement_formation' => $this->etablissement_formation,
                'date_debut_formation' => $this->date_debut_formation,
                'date_fin_formation' => $this->encours_formation ? null : $this->date_fin_formation,
                'encours_formation' => $this->encours_formation,
            ]
        );

        // Attache s’il n’est pas encore lié
        if (!$this->candidat->formations->contains($formation->id)) {
            $this->candidat->formations()->attach($formation->id);
        }

        $this->resetForm();
        $this->dispatch('formation-saved');
    }

    public function edit(Formation $formation)
    {
        $this->formationId = $formation->id;
        $this->diplome_formation = $formation->diplome_formation;
        $this->description_formation = $formation->description_formation;
        $this->etablissement_formation = $formation->etablissement_formation;
        $this->date_debut_formation = $formation->date_debut_formation;
        $this->date_fin_formation = $formation->date_fin_formation;
        $this->encours_formation = $formation->encours_formation;
        $this->editing = true;
    }

    public function delete($formationId)
    {
        $this->candidat->formations()->detach($formationId);
    }

    public function resetForm()
    {
        $this->reset(['formationId', 'diplome_formation', 'description_formation', 'etablissement_formation', 'date_debut_formation', 'date_fin_formation', 'encours_formation', 'editing']);
    }
    public function render()
    {
        return view('livewire.candidat.partials.formation', [
            'formations' => $this->candidat->formations()->latest()->get(),
        ]);
    }
}
