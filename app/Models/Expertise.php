<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
     protected $fillable = [
        'nom_expertise',
    ];
    public function candidat()
{
    return $this->belongsToMany(Candidat::class, 'candidat_expertises');
}
}
