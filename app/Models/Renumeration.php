<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renumeration extends Model
{
    protected $fillable = [
        'nom_renumeration',
      ];
       public function candidats()
      {
          return $this->belongsToMany(Candidat::class, 'candidat_renumeratioms');
      }
        public function candidatures()
      {
          return $this->belongsToMany(Candidature::class, 'candidature_renumeratioms');
      }
}
