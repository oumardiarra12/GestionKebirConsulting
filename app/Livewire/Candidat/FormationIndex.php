<?php

namespace App\Livewire\Candidat;

use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormationIndex extends Component
{
    public bool $formVisible = false;
    public ?int $formationId = null;

    public array $selectedFormations = [];

    public string $diplome_formation = '';
    public string $etablissement_formation = '';
    public $date_debut_formation;
    public $date_fin_formation;
    public bool $encours_formation = false;

    public $formations;
    public $abonne;
    // protected $listeners = ['formationSaved' => 'onFormationSaved'];
    protected function rules()
    {
        return [
            'diplome_formation' => ['required', 'string', 'max:255'],
            'etablissement_formation' => ['required', 'string', 'max:255'],
            'date_debut_formation' => ['required', 'date'],
            'date_fin_formation' => ['nullable', 'date', 'after_or_equal:date_debut_formation'],
            'encours_formation' => ['boolean'],
        ];
    }

    public function mount()
    {
        $this->abonne = Candidat::where('id', Auth::id())->firstOrFail();
        $this->formations = Formation::all();
        $this->selectedFormations = $this->abonne->formations()->pluck('formations.id')->toArray();

    }

    public function create()
    {
        $this->resetFields();
        $this->formVisible = true;
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);

        $this->formationId = $formation->id;
        $this->diplome_formation = $formation->diplome_formation;
        $this->etablissement_formation = $formation->etablissement_formation;
        $this->date_debut_formation = $formation->date_debut_formation;
        $this->date_fin_formation = $formation->date_fin_formation;
        $this->encours_formation = $formation->encours_formation;

        $this->formVisible = true;
    }

    public function save()
    {
        $this->validate();

        $formation = Formation::updateOrCreate(
            ['id' => $this->formationId],
            [
                'diplome_formation' => $this->diplome_formation,
                'etablissement_formation' => $this->etablissement_formation,
                'date_debut_formation' => $this->date_debut_formation,
                'date_fin_formation' => $this->encours_formation ? null : $this->date_fin_formation,
                'encours_formation' => $this->encours_formation,
            ]
        );

        $this->abonne->formations()->syncWithoutDetaching([$formation->id]);

        $this->resetFields();
        $this->formVisible = false;

        // $this->emit('formationSaved');
    }

    public function delete($id)
    {
        try {
            $formation = Formation::findOrFail($id);
            $this->abonne->formations()->detach($formation->id);
            $formation->delete();

            // $this->emit('formationDeleted');
        } catch (\Exception $e) {
            $this->addError('delete_error', 'Erreur lors de la suppression.');
        }
    }

    public function resetFields()
    {
        $this->formationId = null;
        $this->diplome_formation = '';
        $this->etablissement_formation = '';
        $this->date_debut_formation = '';
        $this->date_fin_formation = '';
        $this->encours_formation = false;
    }
    public function render()
    {

        return view('livewire.candidat.formation-index')->layout('layouts.public');
    }
}
