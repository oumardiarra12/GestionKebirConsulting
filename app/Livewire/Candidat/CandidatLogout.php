<?php

namespace App\Livewire\Candidat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CandidatLogout extends Component
{
    public function candidatlogout()
    {
        Auth::guard('candidat')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.candidat.candidat-logout')->layout('layouts.public');
    }
}
