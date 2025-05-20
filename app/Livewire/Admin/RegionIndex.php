<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class RegionIndex extends Component
{
       use WithPagination;
       // Optionnel si tu veux utiliser une pagination AJAX sans recharger toute la page
    protected $paginationTheme = 'bootstrap';
     public  $region_id, $nom_regions, $description_regions;
    public $isModalOpen = false;
    public function render()
    {

        return view('livewire.admin.region-index',[
            'regions'=>Region::latest()->paginate(5),
        ])->layout('layouts.admin');
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetFields();
        $this->isModalOpen = false;
    }

    private function resetFields()
    {
        $this->region_id = null;
        $this->nom_regions = '';
        $this->description_regions = '';
    }

    public function store()
    {
        $this->validate([
            'nom_regions' => 'required|string|max:255',
            'description_regions' => 'nullable|string',
        ]);

        Region::updateOrCreate(['id' => $this->region_id], [
            'nom_regions' => $this->nom_regions,
            'description_regions' => $this->description_regions,
        ]);

        session()->flash('message',
            $this->region_id ? 'Région modifiée avec succès.' : 'Région créée avec succès.'
        );

        $this->closeModal();
    }

    public function edit($id)
    {
        $region = Region::findOrFail($id);
        $this->region_id = $id;
        $this->nom_regions = $region->nom_regions;
        $this->description_regions = $region->description_regions;

        $this->openModal();
    }

    public function delete($id)
    {
        Region::find($id)->delete();
        session()->flash('message', 'Région supprimée avec succès.');
    }
}
