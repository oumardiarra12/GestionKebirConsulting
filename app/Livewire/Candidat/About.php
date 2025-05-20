<?php

namespace App\Livewire\Candidat;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.candidat.about')->layout('layouts.public');
    }
}
