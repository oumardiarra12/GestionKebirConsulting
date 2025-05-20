<?php
namespace App\Livewire\Admin;

use App\Models\Candidature;
use App\Models\Emploi;
use App\Models\NiveauGlobalExperience;
use Livewire\Component;

class CandidatureIndex extends Component
{
//  public string $rechercheTitreEmploi = '';
    public string $filtreNiveauExperience = '';

    public array $emploisDisponibles = [];
    public array $niveauxExperience = [];

    public array $candidaturesParEtape = [];
    public $titreposte;
    public bool $showModal = false;
    public ?int $candidatureToReject = null;
    public $emploiId;
    // Étapes fixes pour la gestion des candidatures
    protected array $etapes = [
        'initiale' => ['label' => '📥 Candidatures Initiales', 'color' => 'primary', 'bg' => 'white'],
        'preselection1' => ['label' => '✅ Pré-sélection', 'color' => 'success', 'bg' => 'light'],
        'preselection2' => ['label' => '🟡 Post-préselection', 'color' => 'warning', 'bg' => 'warning bg-opacity-10'],
        'selection' => ['label' => '🎯 Sélectionnées', 'color' => 'info', 'bg' => 'info bg-opacity-10'],
    ];

    public function mount(): void
    {
        $this->emploisDisponibles = Emploi::pluck('titre_emplois', 'id')->toArray();
        $this->niveauxExperience = NiveauGlobalExperience::all()->toArray();
        $this->titreposte=Emploi::where('id',$this->emploiId)->first()->titre_emplois;
        $this->chargerCandidatures();
    }

    public function updatedRechercheTitreEmploi(): void
    {
        $this->chargerCandidatures();
    }

    public function updatedFiltreNiveauExperience(): void
    {
        $this->chargerCandidatures();
    }

    /**
     * Charge les candidatures par étape selon les filtres actifs.
     */
    protected function chargerCandidatures(): void
    {
        $this->candidaturesParEtape = [];

        foreach (array_keys($this->etapes) as $etape) {
            $query = Candidature::with(['candidat.candidatnges', 'emplois'])
                 ->where('emploi_id', $this->emploiId)
                ->where('etape_candidature', $etape);

            // // Filstre titre emploi si renseigné
            // if ($this->rechercheTitreEmploi !== '') {
            //     $query->whereHas('emplois', function ($q) {
            //         $q->where('titre_emplois', 'like', '%' . $this->rechercheTitreEmploi . '%');
            //     });
            // }

            // Filtre niveau expérience via relation 'candidat.niveauGlobalExperience'
            if ($this->filtreNiveauExperience !== '') {
                $query->whereHas('candidat.candidatnges', function ($q) {
                    $q->where('nom_niveau_global_experience', $this->filtreNiveauExperience);
                });
            }

            // Trier par ID niveau experience descendant si relation exists
            $query->orderByDesc('id'); // Vous pouvez adapter selon la colonne pertinente

            $this->candidaturesParEtape[$etape] = $query->get()->toArray();

        }
    }

    public function changerEtape(int $candidatureId, string $nouvelleEtape): void
    {
        $candidature = Candidature::find($candidatureId);
        if ($candidature && array_key_exists($nouvelleEtape, $this->etapes)) {
            $candidature->etape_candidature = $nouvelleEtape;
            $candidature->save();
            $this->chargerCandidatures();
        }
    }

    public function demanderRejet(int $candidatureId): void
    {
        $this->candidatureToReject = $candidatureId;
        $this->showModal = true;
    }

    public function rejeterCandidature(): void
    {
        if ($this->candidatureToReject) {
            $this->changerEtape($this->candidatureToReject, 'rejete');
            $this->showModal = false;
            $this->candidatureToReject = null;
        }
    }

public function changerStatus(int $candidatureId, string $nouveauStatus): void
{
    $candidature = Candidature::find($candidatureId);
    if ($candidature) {
        $candidature->status_candidature = $nouveauStatus;
        $candidature->save();
        $this->chargerCandidatures(); // Recharge la liste pour refléter les changements
    }
}
    public function render()
    {
        return view('livewire.admin.candidature-index', [
            'etapes' => $this->etapes,
        ])->layout('layouts.admin');
    }
}
