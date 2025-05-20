<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $fillable = [
        'nom_langue',
      ];
      public function candidats()
      {
          return $this->belongsToMany(Candidat::class, 'candidat_langues')
                      ->withPivot('niveau');
      }
}
