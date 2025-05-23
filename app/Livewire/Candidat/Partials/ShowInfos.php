<?php

namespace App\Livewire\Candidat\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowInfos extends Component
{
    public $candidat;
     public function mount()
    {
         $this->candidat = Auth::user();
    }
    public function render()
    {
        return view('livewire.candidat.partials.show-infos');
    }
}
