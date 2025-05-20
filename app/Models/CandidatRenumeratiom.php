<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatRenumeratiom extends Model
{
     protected $fillable = [
        'candidat_id',
        'renumeration_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function renumeration()
    {
        return $this->belongsTo(Renumeration::class);
    }
}
