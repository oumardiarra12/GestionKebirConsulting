<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobiliteGeographique extends Model
{
    protected $fillable = [
        'nom_mobilite_geographique',
    ];
     public function candidats()
      {
          return $this->belongsToMany(Candidat::class, 'candidatmgs');
      }
}
