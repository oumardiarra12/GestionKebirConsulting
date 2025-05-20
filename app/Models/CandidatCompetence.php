<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatCompetence extends Model
{
    protected $fillable = [
        'candidat_id',
        'competence_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
