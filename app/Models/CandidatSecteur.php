<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatSecteur extends Model
{
    protected $fillable = [
        'candidat_id',
        'secteur_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
