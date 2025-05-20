<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $fillable = [
        'nom_secteur',
         'description_secteur',
     ];
     public function candidat()
{
return $this->belongsToMany(Candidat::class, 'candidat_secteurs');
}
}
