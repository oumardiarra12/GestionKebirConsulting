<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatNiveauEtude extends Model
{
    protected $fillable = [
        'candidat_id',
        'niveau_etude_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function niveauetude()
    {
        return $this->belongsTo(NiveauEtude::class);
    }
}
