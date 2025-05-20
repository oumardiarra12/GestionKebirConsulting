<?php

namespace App\Livewire\Admin;

use App\Models\Emploi;
use App\Models\Metier;
use App\Models\Secteur;
use Livewire\Component;
use Livewire\WithPagination;

class EmploisIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $secteur_id = null;
    public $metier_id = null;
    public $status_emploi = null;

    // Champs pour formulaire (exemple)
    public $emploi_id, $titre_emplois, $description_emplois, $date_debut_emplois, $date_fin_emplois;
    public $type_contrat_id, $niveau_etude_id, $niveau_global_experience_id, $renumeration_id;
    public $isEdit = false;

    protected $queryString = ['search', 'secteur_id', 'metier_id', 'status_emploi'];
    protected $listeners = ['emploiDeleted' => '$refresh'];

    // Reset pagination quand filtre change
    public function updatingSearch() { $this->resetPage(); }
    public function updatingSecteurId() { $this->resetPage(); }
    public function updatingMetierId() { $this->resetPage(); }
    public function updatingStatusEmploi() { $this->resetPage(); }

    public function deleteEmploi($id)
    {
        Emploi::findOrFail($id)->delete();
        session()->flash('success', 'Emploi supprimé avec succès.');
        $this->emit('emploiDeleted');
    }

    public function render()
    {
        $emploisQuery = Emploi::with(['metier', 'secteur'])
            ->when($this->search, fn($q) => $q->where('titre_emplois', 'like', '%' . $this->search . '%'))
            ->when($this->secteur_id, fn($q) => $q->where('secteur_id', $this->secteur_id))
            ->when($this->metier_id, fn($q) => $q->where('metier_id', $this->metier_id))
            ->when($this->status_emploi, fn($q) => $q->where('status_emploi', $this->status_emploi))
            ->orderByDesc('created_at');

        $emplois = $emploisQuery->paginate($this->perPage);

        $secteurs = Secteur::orderBy('nom_secteur')->get();
        $metiers = Metier::orderBy('nom_metier')->get();

        // Tu peux définir ici les statuts possibles (adapter selon ta DB)
        $statusOptions = [
            'Publier' => 'Publié',
            'Brouillon' => 'Brouillon',
            'Cloture' => 'Cloture',
        ];

        return view('livewire.admin.emplois-index', compact('emplois', 'secteurs', 'metiers', 'statusOptions'))->layout('layouts.admin');
    }

    public function resetFields()
    {
        $this->reset([
            'emploi_id', 'titre_emplois', 'description_emplois', 'date_debut_emplois',
            'date_fin_emplois', 'type_contrat_id', 'secteur_id', 'niveau_etude_id', 'niveau_global_experience_id',
            'metier_id', 'renumeration_id', 'status_emploi', 'isEdit'
        ]);
    }

    public function store()
    {
        $this->validate([
            'titre_emplois' => 'required|string|max:255',
            'description_emplois' => 'nullable|string',
            'date_debut_emplois' => 'nullable|date',
            'date_fin_emplois' => 'nullable|date|after_or_equal:date_debut_emplois',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'niveau_etude_id' => 'nullable|exists:niveau_etudes,id',
            'niveau_global_experience_id' => 'nullable|exists:niveau_global_experiences,id',
            'metier_id' => 'required|exists:metiers,id',
            'renumeration_id' => 'nullable|exists:renumerations,id',
            'status_emploi' => 'required|in:publie,archive,brouillon',
        ]);

        Emploi::create($this->only([
            'titre_emplois', 'description_emplois', 'date_debut_emplois', 'date_fin_emplois',
            'type_contrat_id', 'secteur_id', 'niveau_etude_id', 'niveau_global_experience_id',
            'metier_id', 'renumeration_id', 'status_emploi'
        ]));

        session()->flash('message', 'Emploi créé avec succès.');
        $this->resetFields();
        $this->dispatch('closeModal');
    }

    public function edit($id)
    {
        $emploi = Emploi::findOrFail($id);
        $this->emploi_id = $emploi->id;
        $this->fill($emploi->toArray());
        $this->isEdit = true;
        $this->dispatch('editEmploi', $id)->to('admin.emploi-form');
    }

    public function update()
    {
        $this->validate([
            'titre_emplois' => 'required|string|max:255',
            'description_emplois' => 'nullable|string',
            'date_debut_emplois' => 'nullable|date',
            'date_fin_emplois' => 'nullable|date|after_or_equal:date_debut_emplois',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'niveau_etude_id' => 'nullable|exists:niveau_etudes,id',
            'niveau_global_experience_id' => 'nullable|exists:niveau_global_experiences,id',
            'metier_id' => 'required|exists:metiers,id',
            'renumeration_id' => 'nullable|exists:renumerations,id',
            'status_emploi' => 'required|in:publie,archive,brouillon',
        ]);

        $emploi = Emploi::findOrFail($this->emploi_id);
        $emploi->update($this->only([
            'titre_emplois', 'description_emplois', 'date_debut_emplois', 'date_fin_emplois',
            'type_contrat_id', 'secteur_id', 'niveau_etude_id', 'niveau_global_experience_id',
            'metier_id', 'renumeration_id', 'status_emploi'
        ]));

        session()->flash('message', 'Emploi mis à jour avec succès.');
        $this->resetFields();
        $this->dispatch('closeModal');
    }
}
