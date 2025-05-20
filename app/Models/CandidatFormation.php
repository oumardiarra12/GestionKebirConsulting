<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatFormation extends Model
{
    protected $fillable = [
        'candidat_id',
        'formation_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
