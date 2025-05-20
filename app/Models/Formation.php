<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
       'diplome_formation',
       'desciption_formation',
       'etablissement_formation',
       'date_debut_formation',
       'date_fin_formation',
       'encours_formation',

    ];
    public function candidat()
{
    return $this->belongsToMany(Candidat::class, 'candidat_formations');
}

}
