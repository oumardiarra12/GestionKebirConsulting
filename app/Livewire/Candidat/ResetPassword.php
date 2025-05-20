<?php

namespace App\Livewire\Candidat;

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;

class ResetPassword extends Component
{
    #[Url]
    public string $token;
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', 'Mot de passe réinitialisé avec succès.');
            return redirect()->route('login');
        } else {
            $this->addError('email', __($status));
        }
    }
    public function render()
    {
        return view('livewire.candidat.reset-password')->layout('layouts.public');
    }
}
