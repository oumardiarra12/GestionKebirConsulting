<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatureRenumeration extends Model
{
     protected $fillable = [
        'candidature_id',
        'renumeration_id',
    ];
    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
    public function renumeration()
    {
        return $this->belongsTo(Renumeration::class);
    }
}
