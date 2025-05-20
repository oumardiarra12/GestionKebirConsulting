<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    protected $fillable = [
       'nom_type_contrat',
        'description_type_contrat',
    ];
    public function candidat()
{
return $this->belongsToMany(Candidat::class, 'candidat_type_contrats');
}
}
