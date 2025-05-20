<?php
namespace App\Livewire\Candidat;
use App\Models\Candidature;
use App\Models\Emploi;
use App\Models\Renumeration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPostuler extends Component
{
    use WithFileUploads;

    public $offreId;
    public $candidat;
    public $selectedRenumerations = [];
    public $renumerations;
    public string $lettre_motivation='';
    public $cv;
     public $emploi;
    public function mount($offreId)
    {
        $this->candidat = Auth::user();
        $this->offreId = $offreId;
        $this->emploi = Emploi::findOrFail($offreId);
        $this->renumerations = Renumeration::all();
         $this->lettre_motivation = $this->defaultLettreMotivation();
    }

    public function submit()
    {
        $this->validate([
            'selectedRenumerations' => 'required',
            'lettre_motivation' => 'nullable|string|max:5000',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // 2Mo max
        ]);

        $cvPath = null;
        if ($this->cv) {
            $cvPath = $this->cv->store('cvs', 'public');
        }

        $candidature = Candidature::create([
            'candidat_id' => $this->candidat->id,
            'emploi_id' => $this->offreId,
            'etape_id' => 1,
            'status_candidature' => 'entend',
            'lettre_motivation' => $this->lettre_motivation ?? null,
            'cv_path' => $cvPath, // à ajouter dans votre table "candidatures"
        ]);

        $candidature->renumerations()->attach($this->selectedRenumerations);

        session()->flash('success', 'Candidature envoyée avec succès !');
        return redirect()->route('home');
    }
 private function defaultLettreMotivation(): string
    {
        return "Bonjour,\n\nJe me permets de vous adresser ma candidature pour le poste de {$this->emploi->titre_emplois}, tel que publié sur votre site.\n\nMotivé(e), sérieux(se) et disposant des compétences requises, je suis convaincu(e) de pouvoir contribuer efficacement à votre équipe.\n\nJe reste à votre disposition pour tout entretien afin de discuter plus en détail de ma candidature.\n\nVeuillez agréer, Madame, Monsieur, l’expression de mes salutations distinguées.";
    }
    public function render()
    {
        return view('livewire.candidat.add-postuler')->layout('layouts.public');
    }
}

