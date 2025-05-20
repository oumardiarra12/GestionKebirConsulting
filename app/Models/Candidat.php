<?php

namespace App\Models;

use App\Notifications\CandidatVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidat extends  Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $guard = 'candidat';

    protected $fillable = ['nom_candidat','prenom_candidat','datenaissance_candidat', 'lieunaissance_candidat','sexe_candidat', 'nationalite_candidat', 'email', 'tel_candidat','situationmatrimoniale_candidat', 'adresse_candidat','nombreenfant_candidat','password','photo_candidat','urllinkedln_candidat','cv_candidat'];

    protected $hidden = ['password', 'remember_token'];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tel_candidat' => 'string',
    'cv_candidat' => 'string',
        ];
    }
    public function cvs()
{
    return $this->hasMany(Cv::class);
}
public function formations()
{
    return $this->belongsToMany(Formation::class, 'candidat_formations');
}
public function experiences()
{
    return $this->belongsToMany(Experience::class,'candidat_experiences');
}
public function competences()
{
    return $this->belongsToMany(Competence::class, 'candidat_competences');
}
public function langues()
{
    return $this->belongsToMany(Langue::class, 'candidat_langues')
                ->withPivot('niveau');
}
public function metiers()
{
    return $this->belongsToMany(Metier::class, 'candidat_metiers');
}
public function secteurs()
{
    return $this->belongsToMany(Secteur::class, 'candidat_secteurs');
}
public function niveauetudes()
{
    return $this->belongsToMany(NiveauEtude::class, 'candidat_niveau_etudes');
}

public function candidatnges()
{
    return $this->belongsToMany(NiveauGlobalExperience::class, 'candidat_nges');
}
public function disponibilites()
{
    return $this->belongsToMany(Disponibilite::class, 'candidat_disponibilites');
}
public function typecontrats()
{
    return $this->belongsToMany(TypeContrat::class, 'candidat_type_contrats');
}
public function regions()
{
    return $this->belongsToMany(Region::class, 'candidat_regions');
}
public function expertises()
{
    return $this->belongsToMany(Expertise::class, 'candidat_expertises');
}
public function mobilitegeographique()
{
    return $this->belongsToMany(MobiliteGeographique::class, 'candidatmgs');
}
public function renumerations()
{
    return $this->belongsToMany(Renumeration::class, 'candidat_renumerations');
}
public function sendEmailVerificationNotification()
{
    $this->notify(new CandidatVerifyEmail);
}
}
