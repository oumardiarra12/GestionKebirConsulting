<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $fillable = [
        'nom_etape',
        'order_etape',
    ];
    public function candidatures()
{
    return $this->hasMany(Candidature::class, 'etape_id');
}
}
