<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'poste_experience',
            'entreprise_experience',
           'date_debut_experience',
           'date_fin_experience',
            'encours_experience',
            'description_poste',
            // 'reference_id'
    ];
    public function candidat()
{
    return $this->belongsToMany(Candidat::class, 'candidat_experiences');
}


    // public function reference()
    // {
    //     return $this->belongsTo(Reference::class);
    // }
}
