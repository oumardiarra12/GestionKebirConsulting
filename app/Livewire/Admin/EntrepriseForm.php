<?php

namespace App\Livewire\Admin;

use App\Models\Entreprise;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EntrepriseForm extends Component
{
    use WithFileUploads;

    public ?Entreprise $entreprise = null;
    public $form = [];
    public $logo_entreprise;
    public $old_logo;
    public string $mode = 'view';

    protected function rules()
    {
        return [
            'form.nom_entreprise' => 'required|string|max:255',
            'logo_entreprise' => ($this->mode === 'edit' && !$this->entreprise->logo_entreprise) ? 'required|image|max:2048' : 'nullable|image|max:2048',
            'form.email_entreprise' => 'nullable|email|max:255',
            'form.tel_entreprise' => 'nullable|string|max:20',
            'form.addresse_entreprise' => 'nullable|string|max:255',
            'form.forme_juridique_entreprise' => 'nullable|string|max:255',
            'form.description_entreprise' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $this->entreprise = Entreprise::first();

        if ($this->entreprise) {
            $this->form = $this->entreprise->toArray();
            $this->old_logo = $this->entreprise->logo_entreprise;
            $this->mode = 'view';
        } else {
            $this->entreprise = new Entreprise();
            $this->mode = 'edit';
        }
    }

    public function toggleEdit()
    {
        $this->mode = $this->mode === 'view' ? 'edit' : 'view';

        if ($this->mode === 'view') {
            $this->reset('logo_entreprise');
        }
    }

    public function save()
    {
        $this->validate();

        $this->entreprise->fill($this->form);

        if ($this->logo_entreprise) {
            if ($this->old_logo && Storage::disk('public')->exists($this->old_logo)) {
                Storage::disk('public')->delete($this->old_logo);
            }

            $this->entreprise->logo_entreprise = $this->logo_entreprise->store('logos', 'public');
        }

        $this->entreprise->save();

        $this->old_logo = $this->entreprise->logo_entreprise;

        session()->flash('message', $this->entreprise->wasRecentlyCreated ? 'Entreprise créée avec succès.' : 'Entreprise mise à jour avec succès.');

        $this->mode = 'view';
        $this->reset('logo_entreprise');
    }

    public function render()
    {
        return view('livewire.admin.entreprise-form', [
            'isView' => $this->mode === 'view',
            'isEdit' => $this->mode === 'edit',
        ])->layout('layouts.admin');
    }
}
