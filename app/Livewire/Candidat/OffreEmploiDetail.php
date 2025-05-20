<?php

namespace App\Livewire\Candidat;

use App\Models\{Candidat, Candidature, Emploi, Etape, Metier, NiveauEtude, NiveauGlobalExperience};
use Livewire\Component;
use Livewire\WithFileUploads;

class OffreEmploiDetail extends Component
{
    use WithFileUploads;

    public Emploi $emploi;
    public Etape $etape;
    public int $step = 1;
    public int $emploiId;

    // Infos personnelles
    public string $nom_candidat = '';
    public string $prenom_candidat = '';
    public string $email = '';
    public string $tel_candidat = '';
    public string $sexe_candidat = '';
    public string $datenaissance_candidat = '';
    public $cv_candidat;

    // Infos professionnelles
    public ?int $niveau_etude_id = null;
    public ?int $niveau_global_experience_id = null;
    public ?int $metier_id = null;
    public string $lettre_motivation = '';

    public function mount($emploiId)
    {
        $this->emploiId = $emploiId;
        $this->emploi = Emploi::with(['typecontrat', 'secteur', 'metier', 'niveauetude', 'niveauglobalexperience'])->findOrFail($emploiId);

        $this->lettre_motivation = $this->defaultLettreMotivation();
    }

    protected function rules(): array
    {
        return $this->step === 1 ? $this->stepOneRules() : $this->stepTwoRules();
    }

    protected function stepOneRules(): array
    {
        return [
            'nom_candidat' => ['required', 'string', 'max:255'],
            'prenom_candidat' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'tel_candidat' => ['required', 'string'],
            'sexe_candidat' => ['required', 'in:M,F'],
            'datenaissance_candidat' => ['required', 'date'],
            'cv_candidat' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ];
    }

    protected function stepTwoRules(): array
    {
        return [
            'niveau_etude_id' => ['required', 'exists:niveau_etudes,id'],
            'niveau_global_experience_id' => ['required', 'exists:niveau_global_experiences,id'],
            'metier_id' => ['required', 'exists:metiers,id'],
            'lettre_motivation' => ['nullable', 'string'],
        ];
    }

    public function nextStep()
    {
        $this->validate($this->rules());
        if ($this->step === 1) {
            $this->step = 2;
        }
    }

    public function previousStep()
    {
        $this->step = 1;
    }

    public function submit()
    {
        // Vérifie si la date de fin est dépassée
    if ($this->emploi->date_fin_emplois && now()->greaterThan($this->emploi->date_fin_emplois)) {
        session()->flash('error', 'La date limite de candidature pour ce poste est dépassée.');
        return;
    }
        $this->validate($this->rules());
        $candidat = $this->storeCandidat();

        Candidature::create([
            'candidat_id' => $candidat->id,
            'emploi_id' => $this->emploiId,
            'etape_candidature' => 'initiale',
            'lettre_motivation' => $this->lettre_motivation,
        ]);

        session()->flash('success', 'Candidature enregistrée avec succès !');
        $this->resetForm();

        return redirect()->route('home');
    }

    private function storeCandidat(): Candidat
    {
        $cvPath = $this->cv_candidat ? $this->cv_candidat->store('cv', 'public') : null;

        $candidat = Candidat::create([
            'nom_candidat' => $this->nom_candidat,
            'prenom_candidat' => $this->prenom_candidat,
            'datenaissance_candidat' => $this->datenaissance_candidat,
            'sexe_candidat' => $this->sexe_candidat,
            'email' => $this->email,
            'tel_candidat' => $this->tel_candidat,
            'cv_candidat' => $cvPath,
        ]);

        $candidat->niveauetudes()->sync([$this->niveau_etude_id]);
        $candidat->metiers()->sync([$this->metier_id]);
        $candidat->candidatnges()->sync([$this->niveau_global_experience_id]);

        return $candidat;
    }

    private function resetForm()
    {
        $this->reset([
            'nom_candidat',
            'prenom_candidat',
            'email',
            'tel_candidat',
            'sexe_candidat',
            'datenaissance_candidat',
            'cv_candidat',
            'niveau_etude_id',
            'niveau_global_experience_id',
            'metier_id',
            'lettre_motivation',
        ]);
        $this->step = 1;
    }

    private function defaultLettreMotivation(): string
    {
        return "Bonjour,\n\nJe me permets de vous adresser ma candidature pour le poste de {$this->emploi->titre_emplois}, tel que publié sur votre site.\n\nMotivé(e), sérieux(se) et disposant des compétences requises, je suis convaincu(e) de pouvoir contribuer efficacement à votre équipe.\n\nJe reste à votre disposition pour tout entretien afin de discuter plus en détail de ma candidature.\n\nVeuillez agréer, Madame, Monsieur, l’expression de mes salutations distinguées.";
    }

    public function render()
    {

    $dateExpiree = $this->emploi->date_fin_emplois && now()->greaterThan($this->emploi->date_fin_emplois);
        return view('livewire.candidat.offre-emploi-detail', [
            'emploi' => $this->emploi,
            'dateExpiree'=>$dateExpiree,
            'niveaux_etude' => NiveauEtude::all(),
            'niveaux_experience' => NiveauGlobalExperience::all(),
            'metiers' => Metier::all(),
        ])->layout('layouts.public');
    }
}

