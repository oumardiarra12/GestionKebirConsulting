<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    protected $fillable = [
      'titre_emplois',
            'description_emplois',
           'date_debut_emplois',
            'date_fin_emplois',
            'status_emploi',
            'type_contrat_id',
            'region_id',
             'partenaire_id',
            'secteur_id',
            'niveau_etude_id',
            'niveau_global_experience_id',
            'metier_id',
            'renumeration_id',
    ];
    public function typecontrat()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'partenaire_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }
    public function niveauetude()
    {
        return $this->belongsTo(NiveauEtude::class, 'niveau_etude_id');
    }
    public function niveauglobalexperience()
    {
        return $this->belongsTo(NiveauGlobalExperience::class, 'niveau_global_experience_id');
    }

    public function renumeration()
    {
        return $this->belongsTo(Renumeration::class);
    }

}
