<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutButton extends Component
{
    public function logout()
    {
        Auth::guard('admin')->logout();;
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function render()
    {
        return view('livewire.admin.logout-button')->layout('layouts.admin');
    }
}
