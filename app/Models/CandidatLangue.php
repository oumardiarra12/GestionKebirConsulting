<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatLangue extends Model
{
    protected $fillable = [
        'candidat_id',
       'langue_id',
       'niveau',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }
}
