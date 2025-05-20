<?php

namespace App\Livewire\Admin;

use App\Models\Etape;
use Livewire\Component;

class EtapeIndex extends Component
{
    public $etapes, $nom_etape, $order_etape, $etape_id;
    public $isOpen = false;
    public function render()
    {
        $this->etapes = Etape::orderBy('order_etape')->get();
        return view('livewire.admin.etape-index')->layout('layouts.admin');
    }
    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->resetFields(); $this->isOpen = false; }

    public function resetFields()
    {
        $this->nom_etape = '';
        $this->order_etape = '';
        $this->etape_id = null;
    }

    public function store()
    {
        $this->validate([
            'nom_etape' => 'required|string|max:255',
            'order_etape' => 'required|integer',
        ]);

        Etape::updateOrCreate(['id' => $this->etape_id], [
            'nom_etape' => $this->nom_etape,
            'order_etape' => $this->order_etape,
        ]);

        session()->flash('message', $this->etape_id ? 'Étape mise à jour.' : 'Étape créée.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $etape = Etape::findOrFail($id);
        $this->etape_id = $etape->id;
        $this->nom_etape = $etape->nom_etape;
        $this->order_etape = $etape->order_etape;
        $this->openModal();
    }

    public function delete($id)
    {
        Etape::find($id)->delete();
        session()->flash('message', 'Étape supprimée.');
    }
}
