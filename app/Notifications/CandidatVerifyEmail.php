<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CandidatVerifyEmail extends VerifyEmailBase
{
     public function toMail($notifiable)
    {
        $verifyUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Vérifiez votre adresse email')
            ->greeting('Bonjour ' . $notifiable->prenom_candidat . ',')
            ->line("Bienvenue sur la plateforme de gestion de CV. Merci de vous être inscrit.")
            ->line("Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.")
            ->action('Vérifier mon email', $verifyUrl)
            ->line("Merci,")
            ->line(config('app.name') . ' - L’équipe administrative'); // nom administrateur via .env
    }
}
