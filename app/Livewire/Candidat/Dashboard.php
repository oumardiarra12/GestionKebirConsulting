<?php

namespace App\Livewire\Candidat;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.candidat.dashboard')->layout('layouts.public');
    }
}
