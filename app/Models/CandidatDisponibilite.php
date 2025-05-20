<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatDisponibilite extends Model
{
      protected $fillable = [
        'candidat_id',
        'disponibilite_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function disponibilite()
    {
        return $this->belongsTo(Disponibilite::class,'disponibilite_id');
    }
}
