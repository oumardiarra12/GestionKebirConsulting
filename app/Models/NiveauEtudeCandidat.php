<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauEtudeCandidat extends Model
{
    protected $fillable = [
        'niveau_etude_id',
        'candidat_id',
      ];
      public function candidat()
      {
          return $this->belongsTo(Candidat::class);
      }

}
