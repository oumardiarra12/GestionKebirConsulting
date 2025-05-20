<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    protected $fillable = [
        'nom_metier',
    ];

public function candidat()
{
return $this->belongsToMany(Candidat::class, 'candidat_metiers');
}
}
