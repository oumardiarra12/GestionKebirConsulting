<?php

namespace App\Livewire\Admin;

use App\Models\Partenaire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class PartenaireIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $partenaire_id, $nom_partenaire, $email_partenaire, $tel_partenaire, $adresse_partenaire, $siteweb_partenaire, $type_partenaire;
    public $logo_partenaire, $new_logo_partenaire;
    public $modal = false;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nom_partenaire' => 'required|string|max:255',
        'email_partenaire' => 'nullable|email',
        'tel_partenaire' => 'nullable|string|max:20',
        'adresse_partenaire' => 'nullable|string',
        'siteweb_partenaire' => 'nullable|url',
        'type_partenaire' => 'nullable|string',
        'new_logo_partenaire' => 'nullable|image|max:1024',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $partenaires = Partenaire::query()
            ->when($this->search, function ($query) {
                $query->where('nom_partenaire', 'like', '%' . $this->search . '%')
                    ->orWhere('email_partenaire', 'like', '%' . $this->search . '%')
                    ->orWhere('tel_partenaire', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5);

        return view('livewire.admin.partenaire-index', [
            'partenaires' => $partenaires,
        ])->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->resetInput();
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function resetInput()
    {
        $this->partenaire_id = null;
        $this->nom_partenaire = '';
        $this->email_partenaire = '';
        $this->tel_partenaire = '';
        $this->adresse_partenaire = '';
        $this->siteweb_partenaire = '';
        $this->type_partenaire = '';
        $this->logo_partenaire = null;
        $this->new_logo_partenaire = null;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nom_partenaire' => $this->nom_partenaire,
            'email_partenaire' => $this->email_partenaire,
            'tel_partenaire' => $this->tel_partenaire,
            'adresse_partenaire' => $this->adresse_partenaire,
            'siteweb_partenaire' => $this->siteweb_partenaire,
            'type_partenaire' => $this->type_partenaire,
        ];

        if ($this->new_logo_partenaire) {
            $data['logo_partenaire'] = $this->new_logo_partenaire->store('logos', 'public');
        }

        Partenaire::updateOrCreate(['id' => $this->partenaire_id], $data);

        session()->flash('message', $this->partenaire_id ? 'Partenaire mis à jour.' : 'Partenaire ajouté.');
        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        $this->partenaire_id = $partenaire->id;
        $this->nom_partenaire = $partenaire->nom_partenaire;
        $this->email_partenaire = $partenaire->email_partenaire;
        $this->tel_partenaire = $partenaire->tel_partenaire;
        $this->adresse_partenaire = $partenaire->adresse_partenaire;
        $this->siteweb_partenaire = $partenaire->siteweb_partenaire;
        $this->type_partenaire = $partenaire->type_partenaire;
        $this->logo_partenaire = $partenaire->logo_partenaire;
        $this->modal = true;
    }

    public function delete($id)
    {
        Partenaire::find($id)?->delete();
        session()->flash('message', 'Partenaire supprimé.');
    }
}
