<?php

namespace App\Livewire\Admin;

use App\Models\Emploi;
use App\Models\Metier;
use App\Models\Secteur;
use App\Models\NiveauEtude;
use App\Models\TypeContrat;
use App\Models\NiveauGlobalExperience;
use App\Models\Renumeration;
use App\Models\Region;
use App\Models\Partenaire;
use Livewire\Component;

class EmploiForm extends Component
{
    public $emploi;
    public $emploiId;
    // Champs du formulaire
    public $titre_emplois,  $date_debut_emplois, $date_fin_emplois, $description_emplois;
    public $status_emploi = 'Brouillon'; // Valeur par défaut
    public $type_contrat_id, $region_id, $partenaire_id, $secteur_id, $niveau_etude_id, $niveau_global_experience_id, $metier_id, $renumeration_id;

    // Données pour selects
    public $metiers, $secteurs, $niveauxEtudes, $typesContrats, $niveauxExperience, $renumerations, $regions, $partenaires;

    public function mount($emploiId = null)
    {
        $this->emploiId = $emploiId;
        // Charger toutes les listes déroulantes
        $this->metiers = Metier::all();
        $this->secteurs = Secteur::all();
        $this->niveauxEtudes = NiveauEtude::all();
        $this->typesContrats = TypeContrat::all();
        $this->niveauxExperience = NiveauGlobalExperience::all();
        $this->renumerations = Renumeration::all();
        $this->regions = Region::all();
        $this->partenaires = Partenaire::all();

        if ($emploiId) {
            $this->emploi = Emploi::findOrFail($emploiId);
            $this->fillFormFromModel();
        } else {
            $this->emploi = new Emploi();
        }
    }

    protected function fillFormFromModel()
    {
        $this->titre_emplois = $this->emploi->titre_emplois;
        $this->description_emplois = $this->emploi->description_emplois;
        $this->date_debut_emplois = $this->emploi->date_debut_emplois;
        $this->date_fin_emplois = $this->emploi->date_fin_emplois;
        $this->status_emploi = $this->emploi->status_emploi ?? 'Brouillon';
        $this->type_contrat_id = $this->emploi->type_contrat_id;
        $this->region_id = $this->emploi->region_id;
        $this->partenaire_id = $this->emploi->partenaire_id;
        $this->secteur_id = $this->emploi->secteur_id;
        $this->niveau_etude_id = $this->emploi->niveau_etude_id;
        $this->niveau_global_experience_id = $this->emploi->niveau_global_experience_id;
        $this->metier_id = $this->emploi->metier_id;
        $this->renumeration_id = $this->emploi->renumeration_id;
    }

    protected function rules()
    {
        return [
            'titre_emplois' => 'required|string|max:255',
            'description_emplois' => 'required|string',
            'date_debut_emplois' => 'required|date',
            'date_fin_emplois' => 'required|date|after_or_equal:date_debut_emplois',
            'status_emploi' => 'required|in:Publier,Brouillon,Cloture',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'region_id' => 'nullable|exists:regions,id',
            'partenaire_id' => 'nullable|exists:partenaires,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'niveau_etude_id' => 'required|exists:niveau_etudes,id',
            'niveau_global_experience_id' => 'required|exists:niveau_global_experiences,id',
            'metier_id' => 'required|exists:metiers,id',
            'renumeration_id' => 'required|exists:renumerations,id',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        // Hydrater le modèle
        $this->emploi->fill($validatedData);

        // Sauvegarder
        $this->emploi->save();

        session()->flash('message', $this->emploi->wasRecentlyCreated ? 'Emploi ajouté avec succès.' : 'Emploi modifié avec succès.');

        return redirect()->route('emplois.index');
    }

    public function render()
    {
        return view('livewire.admin.emploi-form')->layout('layouts.admin');
    }
}
