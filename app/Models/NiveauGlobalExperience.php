<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauGlobalExperience extends Model
{
    protected $fillable = [
        'nom_niveau_global_experience',
    ];
    public function candidat()
    {
        return $this->belongsToMany(Candidat::class, 'candidat_metiers');
    }
}
