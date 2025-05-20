<?php

use App\Livewire\Admin\AdminForm;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Admin\AdminIndex;
use App\Livewire\Admin\CandidatureIndex;
use App\Livewire\Admin\ContratIndex;
use App\Livewire\Admin\CVthequeIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\DetailCandidat;
use App\Livewire\Admin\DisponibiliteIndex;
use App\Livewire\Admin\EmploiForm;
use App\Livewire\Admin\EmploisIndex;
use App\Livewire\Admin\EntrepriseForm;
use App\Livewire\Admin\EtapeIndex;
use App\Livewire\Admin\ExpertiseIndex;
use App\Livewire\Admin\LangueIndex;
use App\Livewire\Admin\MetierIndex;
use App\Livewire\Admin\MobiliteGeographiqueIndex;
use App\Livewire\Admin\NiveauEtude;
use App\Livewire\Admin\NiveauGlobalExperienceIndex;
use App\Livewire\Admin\PartenaireIndex;
use App\Livewire\Admin\ProfilAdmin;
use App\Livewire\Admin\ProfilVoirAdmin;
use App\Livewire\Admin\RegionIndex;
use App\Livewire\Admin\RenumerationIndex;
use App\Livewire\Admin\SecteurIndex;
use App\Livewire\Auth\Admin\Login;
use App\Livewire\Auth\Public\Login as PublicLogin;
use App\Livewire\Candidat\About;
use App\Livewire\Candidat\AddPostuler;
use App\Livewire\Candidat\CandidatEditProfile;
use App\Livewire\Candidat\CandidatLangueIndex;
use App\Livewire\Candidat\CandidatLogout;
use App\Livewire\Candidat\CandidatProfile;
use App\Livewire\Candidat\Dashboard as CandidatDashboard;
use App\Livewire\Candidat\ForgetPassword;
use App\Livewire\Candidat\FormationIndex;
use App\Livewire\Candidat\Inscription;
use App\Livewire\Candidat\OffreEmploiDetail;
use App\Livewire\Candidat\OffreEmploiIndex;
use App\Livewire\Candidat\ResetPassword;
use App\Livewire\Candidat\Service;
use App\Livewire\Public\Home;
use Illuminate\Support\Facades\Route;


Route::get('/admin/login', Login::class)->name('login');
Route::get('/login', PublicLogin::class)->name('candidat.login');
Route::get('/', Home::class)->name('home');
Route::get('/offre_emplois', OffreEmploiIndex::class)->name('candidat.listeoffre');
Route::get('/offre_emploi/{emploiId}/details', OffreEmploiDetail::class)->name('candidat.offredetail');
Route::get('/inscription', Inscription::class)->name('inscrire');
Route::get('/apropos', About::class)->name('apropos');
Route::get('/service', Service::class)->name('nosservice');
Route::get('/forgot-password', ForgetPassword::class)->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->middleware('guest')->name('password.reset');
// Page de notification de vérification (accessible si connecté mais pas encore vérifié)
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth:candidat')->name('verification.notice');

// Validation du lien de vérification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('candidat.dashboard');
})->middleware(['auth:candidat', 'signed'])->name('verification.verify');

// Renvoyer le lien de vérification (pas besoin de vérifier que le candidat est déjà vérifié)
Route::post('/email/verification-notification', function (Request $request) {
    $user = auth('candidat')->user();

    if ($user && !$user->hasVerifiedEmail()) {
        $user->sendEmailVerificationNotification();
        return back()->with('message', 'Un nouveau lien de vérification a été envoyé à votre adresse e-mail.');
    }

    return back()->with('message', 'Votre adresse e-mail est déjà vérifiée.');
})->middleware(['auth:candidat', 'throttle:6,1'])->name('verification.send');

// Routes accessibles seulement si email vérifié
Route::middleware(['auth:candidat', 'candidat.verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('candidat.dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:candidat', 'candidat.verified'])->group(function ()  {

     Route::get('/postuler/{offreId}', AddPostuler::class)->name('candidat.postuler');
    Route::get('/profile', CandidatProfile::class)->name('candidat.profile');
    Route::get('/editprofile', CandidatEditProfile::class)->name('candidat.editprofile');
    Route::get('/formations', FormationIndex::class)->name('candidat.formations');
    Route::get('/choisirlangues', CandidatLangueIndex::class)->name('candidat.choisirlangues');
    Route::get('/logout', CandidatLogout::class)->name('candidat.logout');
    Route::get('/abonner', CandidatDashboard::class)->name('candidat.dashboard');

});

Route::middleware(['auth:admin'])->group(function () {
 Route::get('/admin/entreprise', EntrepriseForm::class)->name('admin.entreprise');
    Route::get('/admin/utilisateurs', AdminIndex::class)->name('admin.index');
    Route::get('/admin/langues', LangueIndex::class)->name('langues.index');
    Route::get('/admin/secteur', SecteurIndex::class)->name('secteur.index');
    Route::get('/admin/typecontrat', ContratIndex::class)->name('contrat.index');
    Route::get('/admin/etapes', EtapeIndex::class)->name('etapes.index');
    Route::get('/admin/niveauetudes', NiveauEtude::class)->name('niveauetudes.index');
    Route::get('/admin/niveauexperience', NiveauGlobalExperienceIndex::class)->name('niveauexperience.index');
    Route::get('/admin/emplois', EmploisIndex::class)->name('emplois.index');
    Route::get('/admin/emploi/{emploiId}', CandidatureIndex::class)->name('emplois.candidatures');
    Route::get('/admin/emplois/create', EmploiForm::class)->name('emplois.create');
    Route::get('/admin/emplois/{emploiId}', EmploiForm::class)->name('emplois.edit');
    Route::get('/admin/metiers', MetierIndex::class)->name('metiers.index');
    Route::get('/admin/disponibilites', DisponibiliteIndex::class)->name('disponibilites.index');
    Route::get('/admin/mobilites', MobiliteGeographiqueIndex::class)->name('mobilites.index');
    Route::get('/admin/renumerations', RenumerationIndex::class)->name('renumerations.index');
    Route::get('/admin/profile', ProfilVoirAdmin::class)->name('admin.voirprofile');
    Route::get('/admin/editprofile', ProfilAdmin::class)->name('admin.editprofile');
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    // Route::get('/admin/candidatures', CandidatureIndex::class)->name('candidatures.index');
     Route::get('/admin/regions', RegionIndex::class)->name('regions.index');
      Route::get('/admin/expertises', ExpertiseIndex::class)->name('expertises.index');
      Route::get('/admin/partenaires', PartenaireIndex::class)->name('partenaires.index');
      Route::get('/admin/cvtechs', CVthequeIndex::class)->name('cvtech.index');
       Route::get('/admin/cv_detail/{id}', DetailCandidat::class)->name('detailcandidat');

});
