<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatTypeContrat extends Model
{
     protected $fillable = [
        'candidat_id',
        'type_contrat_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function typecontrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }
}
