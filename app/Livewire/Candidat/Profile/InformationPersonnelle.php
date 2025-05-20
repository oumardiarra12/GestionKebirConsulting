<?php

namespace App\Livewire\Candidat\Profile;

use App\Models\Experience;
use App\Models\Formation;
use App\Models\NiveauEtude;
use App\Models\NiveauGlobalExperience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InformationPersonnelle extends Component
{
    use WithFileUploads;

    public $niveau_etude_id;
    public $niveaux_etude = [];
    public array $formations = [];
    public $niveau_global_experience_id;
    public $niveaux_global_experience = [];
    public array $experiences = [];
    public $photo_candidat, $cv_candidat;
    public $candidat;
   public $activeTab = 'info';

    public function mount()
    {
        $this->candidat = Auth::user();
        $this->niveau_etude_id = $this->candidat->niveauetudes()->first()?->id ?? '';
        $this->niveau_global_experience_id = $this->candidat->candidatnges()?->first()->id ?? '';
if ($this->candidat && $this->candidat->photo_candidat) {
            $this->photo_candidat = $this->candidat->photo_candidat; // stocke le chemin
        }
        if ($this->candidat && $this->candidat->cv_candidat) {
            $this->cv_candidat = $this->candidat->cv_candidat; // stocke le chemin
        }
        $this->niveaux_etude = NiveauEtude::all();
        $this->niveaux_global_experience = NiveauGlobalExperience::all();

        $this->formations = $this->candidat->formations->map(fn($formation) => [
            'id' => $formation->id,
            'diplome_formation' => $formation->diplome_formation,
            'description_formation' => $formation->description_formation,
            'etablissement_formation' => $formation->etablissement_formation,
            'date_debut_formation' => $formation->date_debut_formation,
            'date_fin_formation' => $formation->date_fin_formation,
            'encours_formation' => $formation->encours_formation,
        ])->toArray() ?? [];

        $this->experiences = $this->candidat->experiences->map(fn($exp) => [
            'id' => $exp->id,
            'poste_experience' => $exp->poste_experience,
            'entreprise_experience' => $exp->entreprise_experience,
            'date_debut_experience' => $exp->date_debut_experience,
            'date_fin_experience' => $exp->date_fin_experience,
            'encours_experience' => (bool) $exp->encours_experience,
            'description_poste' => $exp->description_poste,
        ])->toArray() ?? [];
    }

   private function updateInfos()
{
    // Si aucun fichier n'est fourni, on ne fait rien
    if (!$this->photo_candidat && !$this->cv_candidat) {
        return;
    }

    $this->validate([
        'photo_candidat' => 'nullable|image|max:2048',
        'cv_candidat' => 'nullable|mimes:pdf|max:2048',
        'niveau_etude_id' => 'required|exists:niveau_etudes,id',
        'niveau_global_experience_id' => 'required|exists:niveau_global_experiences,id',
    ]);

    if ($this->photo_candidat) {
        // Supprimer l'ancienne photo si elle existe
        if ($this->candidat->photo_candidat && Storage::disk('public')->exists($this->candidat->photo_candidat)) {
            Storage::disk('public')->delete($this->candidat->photo_candidat);
        }

        // Enregistrer la nouvelle photo
        $this->candidat->photo_candidat = $this->photo_candidat->store('Candidats', 'public');
    }

    if ($this->cv_candidat) {
        // Supprimer l'ancien CV s'il existe
        if ($this->candidat->cv_candidat && Storage::disk('public')->exists($this->candidat->cv_candidat)) {
            Storage::disk('public')->delete($this->candidat->cv_candidat);
        }

        // Enregistrer le nouveau CV
        $this->candidat->cv_candidat = $this->cv_candidat->store('cvs', 'public');
    }

    // Sauvegarder le modèle candidat
    $this->candidat->save();
    session()->flash('message', 'Informations mises à jour.');
}

    public function ajouterFormation()
    {
        $this->formations[] = [
            'diplome_formation' => '',
            'description_formation' => '',
            'etablissement_formation' => '',
            'date_debut_formation' => null,
            'date_fin_formation' => null,
            'encours_formation' => false,
        ];
        $this->resetErrorBag();
    }

   public function retirerFormation($index)
{
    // Vérifie si une formation avec un ID existe à cet index
    if (isset($this->formations[$index]['id'])) {
        $formationId = $this->formations[$index]['id'];

        // Détache la formation sans la supprimer de la base
        $this->candidat->formations()->detach($formationId);
    }

    // Retire la formation de la liste locale (Livewire par exemple)
    array_splice($this->formations, $index, 1);
}

    public function ajouterExperience()
    {
        $this->experiences[] = [
            'poste_experience' => '',
            'entreprise_experience' => '',
            'date_debut_experience' => null,
            'date_fin_experience' => null,
            'encours_experience' => false,
            'description_poste' => '',
        ];
        $this->resetErrorBag();
    }

   public function retirerExperience($index)
{
    if (isset($this->experiences[$index]['id'])) {
        $experienceId = $this->experiences[$index]['id'];

        // Détacher l'expérience du candidat au lieu de la supprimer définitivement
        $this->candidat->experiences()->detach($experienceId);
    }

    // Supprimer du tableau Livewire
    array_splice($this->experiences, $index, 1);
}
    public function removePhoto()
    {
        $this->photo_candidat = null;
    }

    public function removeCV()
    {
        $this->cv_candidat = null;
    }
    public function setActiveTab($tab)
{
    $this->activeTab = $tab;

}
    public function save()
    {

        $this->saveFormations();
        $this->saveExperiences();
        $this->updateInfos();
        $this->candidat->niveauetudes()->sync([$this->niveau_etude_id]);
        $this->candidat->candidatnges()->sync([$this->niveau_global_experience_id]);
        $this->dispatch('go-to-next-tab');
        session()->flash('success', 'Profil mis à jour avec succès.');
    }

    private function saveFormations()
    {
        $this->validate([
            'formations.*.diplome_formation' => 'required|string|max:255',
            'formations.*.description_formation' => 'nullable|string',
            'formations.*.etablissement_formation' => 'required|string|max:255',
            'formations.*.date_debut_formation' => 'required|date',
            'formations.*.date_fin_formation' => 'nullable|date|after_or_equal:formations.*.date_debut_formation',
            'formations.*.encours_formation' => 'boolean',
        ]);

        $formationIds = [];

        foreach ($this->formations as $formationData) {
            $formation = null;

            if (!empty($formationData['id'])) {
                $formation = Formation::find($formationData['id']);
                if ($formation) {
                    $formation->update($formationData);
                }
            }

            if (!$formation) {
                $formation = Formation::create($formationData);
            }

            $formationIds[] = $formation->id;
        }

        // Synchronise les relations du candidat avec les formations
        $this->candidat->formations()->sync($formationIds);
    }

    private function saveExperiences()
    {
        $this->validate([
            'experiences.*.poste_experience' => 'required|string|max:255',
            'experiences.*.entreprise_experience' => 'required|string|max:255',
            'experiences.*.date_debut_experience' => 'required|date',
            'experiences.*.date_fin_experience' => 'nullable|date|after_or_equal:experiences.*.date_debut_experience',
            'experiences.*.encours_experience' => 'nullable|boolean',
            'experiences.*.description_poste' => 'nullable|string',
        ]);

        $experienceIds = [];

        foreach ($this->experiences as $experienceData) {
            $experience = null;

            // Mise à jour si ID existe
            if (!empty($experienceData['id'])) {
                $experience = Experience::find($experienceData['id']);
                if ($experience) {
                    $experience->update($experienceData);
                }
            }

            // Création si non trouvé
            if (!$experience) {
                $experience = Experience::create($experienceData);
            }

            $experienceIds[] = $experience->id;
        }

        // Synchronise les relations du candidat avec les expériences
        $this->candidat->experiences()->sync($experienceIds);
    }

    public function render()
    {
        return view('livewire.candidat.profile.information-personnelle');
    }
}
