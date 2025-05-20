<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        protected $fillable = [
        'nom_regions',
         'description_regions',
     ];
     public function candidat()
{
return $this->belongsToMany(Candidat::class, 'candidat_regions');
}
}
