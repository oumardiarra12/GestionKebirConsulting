<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    protected $fillable = [
        'nom_disponibilite',
    ];
    public function candidat()
{
return $this->belongsToMany(Candidat::class, 'candidat_disponibilites');
}
}
