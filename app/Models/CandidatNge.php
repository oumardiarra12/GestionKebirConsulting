<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatNge extends Model
{
     protected $fillable = [
        'candidat_id',
        'candidat_nge_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function niveauglobalexperience()
    {
        return $this->belongsTo(NiveauGlobalExperience::class,'candidat_nge_id');
    }
}
