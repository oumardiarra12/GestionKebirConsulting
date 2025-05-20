<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $fillable = [
         'nom_partenaire',
            'email_partenaire',
            'tel_partenaire',
            'adresse_partenaire',
            'logo_partenaire',
            'siteweb_partenaire',
          'type_partenaire',
    ];
}
