<?php

namespace App\Livewire\Candidat;


use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\Attributes\On;
class CandidatEditProfile extends Component
{

    public $candidat;
    public string $activeTab = 'info';
  #[On('go-to-next-tab')]
    public function goToNextTab()
    {
        $tabs = ['info', 'critiere', 'competences', 'donnees', 'options'];
        $currentIndex = array_search($this->activeTab, $tabs);
        if ($currentIndex !== false && $currentIndex < count($tabs) - 1) {
            $this->activeTab = $tabs[$currentIndex + 1];
        }
    }
    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function mount()
    {
        $this->candidat = Auth::guard('candidat')->user(); // ou passer $candidat en paramètre si admin

    }



    public function render()
    {

        return view('livewire.candidat.candidat-edit-profile')->layout('layouts.public');
    }
}
