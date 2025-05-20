<?php

namespace App\Livewire\Candidat;

use App\Models\Candidat;
use App\Models\Langue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CandidatLangueIndex extends Component
{
    public $languesDisponibles = [];
    public $selectedLangueId;
    public $niveau;
    public $candidat;

    protected $rules = [
        'selectedLangueId' => 'required|exists:langues,id',
        'niveau' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->candidat = Candidat::findOrFail(Auth::user()->id);
        $this->languesDisponibles = Langue::all();
    }

    public function ajouterLangue()
    {
        $this->validate();

        // Évite les doublons
        if ($this->candidat->langues()->where('langue_id', $this->selectedLangueId)->exists()) {
            $this->addError('selectedLangueId', 'Cette langue est déjà ajoutée.');
            return;
        }

        $this->candidat->langues()->syncWithoutDetaching($this->selectedLangueId, [
            'niveau' => $this->niveau,
        ]);

        $this->reset(['selectedLangueId', 'niveau']);
        $this->candidat->refresh();
    }

    public function supprimerLangue($langueId)
    {
        $this->candidat->langues()->detach($langueId);
        $this->candidat->refresh();
    }
    public function render()
    {
        return view('livewire.candidat.candidat-langue-index', [
            'languesCandidat' => $this->candidat->langues,
        ])->layout('layouts.public');
    }
}
