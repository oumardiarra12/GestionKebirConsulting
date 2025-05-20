<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
      protected $fillable = [
       'nom_entreprise',
          'logo_entreprise',
          'tel_entreprise',
          'addresse_entreprise',
          'forme_juridique_entreprise',
           'description_entreprise',
          'email_entreprise',
    ];
}
