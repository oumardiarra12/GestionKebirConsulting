<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatExpertise extends Model
{
    protected $fillable = [
        'candidat_id',
       'expertise_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function expertise()
    {
        return $this->belongsTo(Expertise::class);
    }
}
