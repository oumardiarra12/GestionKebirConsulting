<?php

namespace App\Livewire\Candidat\Profile;

use App\Models\Competence;
use App\Models\Expertise;
use App\Models\Langue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Competences extends Component
{
    public $selectedExpertises = [];
    public $allExpertises = [];
    public $candidat;

    public $nom_competence;
    public $competence_id;
    public $selectedCompetences = [];

    public $langues;
    public $langue_id;
    public $niveau;
    public $languesTemp = [];

    public function mount($competenceId = null)
{
    $this->candidat = Auth::user();

    // Chargement des données de base
    $this->langues = Langue::all();
    $this->allExpertises = Expertise::all();

    // Traitement de la compétence spécifique si l'ID est fourni

        $competence = $this->candidat
            ->competences()
            ->firstOrFail();

        $this->competence_id = $competence->pivot->id;
        $this->nom_competence = $competence->nom_competence;


    // Chargement des expertises sélectionnées
    $this->selectedExpertises = $this->candidat
        ->expertises()
        ->pluck('expertises.id')
        ->toArray();

    // Préparation des langues avec niveau
    $this->languesTemp = $this->candidat->langues->map(function ($langue) {
        return [
            'id' => $langue->id,
            'nom_langue' => $langue->nom_langue,
            'niveau' => $langue->pivot->niveau,
        ];
    })->toArray() ?? [];
}


    public function updatedSelectedExpertises()
    {
        $this->candidat->expertises()->sync($this->selectedExpertises);
        session()->flash('success', 'Expertises mises à jour avec succès.');
    }

    public function saveCompetence()
    {
        $this->validate([
            'nom_competence' => 'required|string|max:255',
        ]);

        $competence = Competence::updateOrCreate(
            ['id' => $this->competence_id],
            ['nom_competence' => $this->nom_competence]
        );

        $this->candidat->competences()->syncWithoutDetaching([$competence->id]);

        session()->flash('message', 'Compétence enregistrée avec succès.');
        $this->reset(['nom_competence', 'competence_id']);
    }

    public function addLangue()
    {
        $this->validate([
            'langue_id' => 'required|exists:langues,id',
            'niveau' => 'required|string|max:255',
        ]);

        if (collect($this->languesTemp)->pluck('id')->contains($this->langue_id)) {
            $this->addError('langue_id', 'Cette langue est déjà ajoutée.');
            return;
        }

        $langue = Langue::findOrFail($this->langue_id);

        $this->languesTemp[] = [
            'id' => $langue->id,
            'nom_langue' => $langue->nom_langue,
            'niveau' => $this->niveau,
        ];

        $this->reset(['langue_id', 'niveau']);
    }

    public function removeLangue($index)
    {
        if (isset($this->languesTemp[$index])) {
            unset($this->languesTemp[$index]);
            $this->languesTemp = array_values($this->languesTemp);
            // Détache la formation sans la supprimer de la base
            $this->candidat->langues()->detach($this->langue_id);
        }
    }

    public function save()
    {
        // Sauvegarde des langues avec pivot
        $syncLangues = collect($this->languesTemp)->mapWithKeys(function ($item) {
            return [$item['id'] => ['niveau' => $item['niveau']]];
        })->toArray();

        $this->candidat->langues()->sync($syncLangues);

        // Appeler les autres sauvegardes
        $this->saveCompetence();
        $this->updatedSelectedExpertises();

        session()->flash('message', 'Enregistrement effectué avec succès.');
        $this->languesTemp = [];
         $this->dispatch('go-to-next-tab');
    }

    public function render()
    {
        return view('livewire.candidat.profile.competences');
    }
}
