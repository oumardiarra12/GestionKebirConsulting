<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
       'nom_reference',
       'tel_reference',
       'poste_reference',
       'description_reference',
     ];
}
