<?php

namespace App\Livewire\Admin;

use App\Models\MobiliteGeographique;
use Livewire\Component;
use Livewire\WithPagination;

class MobiliteGeographiqueIndex extends Component
{
       use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $modalFormVisible = false;
    public $isEdit = false;
    public $mobiliteId;
    public $nom_mobilite_geographique;

    protected $rules = [
        'nom_mobilite_geographique' => 'required|string|max:255|unique:mobilite_geographiques,nom_mobilite_geographique',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function render()
    {
        return view('livewire.admin.mobilite-geographique-index', [
            'mobilites' => MobiliteGeographique::where('nom_mobilite_geographique', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ])->layout('layouts.admin');
    }
    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalFormVisible = true;
        $this->isEdit = false;
    }

    public function showEditModal($id)
    {
        $this->resetForm();
        $this->isEdit = true;
        $this->modalFormVisible = true;

        $mobilite = MobiliteGeographique::findOrFail($id);
        $this->mobiliteId = $mobilite->id;
        $this->nom_mobilite_geographique = $mobilite->nom_mobilite_geographique;
    }

    public function create()
    {
        $this->validate();
        MobiliteGeographique::create([
            'nom_mobilite_geographique' => $this->nom_mobilite_geographique,
        ]);
        $this->resetForm();
    }

    public function update()
    {
        $this->validate([
            'nom_mobilite_geographique' => 'required|string|max:255|unique:mobilite_geographiques,nom_mobilite_geographique,' . $this->mobiliteId,
        ]);
        MobiliteGeographique::findOrFail($this->mobiliteId)->update([
            'nom_mobilite_geographique' => $this->nom_mobilite_geographique,
        ]);
        $this->resetForm();
    }

    public function delete($id)
    {
        MobiliteGeographique::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->reset(['nom_mobilite_geographique', 'mobiliteId', 'modalFormVisible', 'isEdit']);
        $this->resetValidation();
    }
}
