<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatMetier extends Model
{
    protected $fillable = [
        'candidat_id',
        'metier_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }
}
