<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatExperience extends Model
{
    protected $fillable = [
        'candidat_id',
        'experience_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function experience()
    {
        return $this->belongsTo(Experience::class,'experience_id');
    }
}
