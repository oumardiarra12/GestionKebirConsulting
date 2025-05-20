<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauEtude extends Model
{
    protected $fillable = [
        'nom_niveau_etude',
      ];
      public function candidats()
      {
          return $this->belongsToMany(Candidat::class, 'candidat_niveau_etudes');
      }
}
