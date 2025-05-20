<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = [
        'nom_competence',
        'description_competence',
    ];
    public function candidats()
    {
        return $this->belongsToMany(Candidat::class)->withTimestamps();
    }

}
