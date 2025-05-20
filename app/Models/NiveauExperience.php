<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauExperience extends Model
{
    protected $fillable = [
        'nom_experience',
        'candidat_id',
      ];
      public function candidat()
      {
          return $this->belongsTo(Candidat::class);
      }
}
