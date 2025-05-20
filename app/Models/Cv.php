<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'titre_cv',
        'resume_cv',
        'url_cv',
        'candidat_id'
    ];
    public function candidat()
{
    return $this->belongsTo(Candidat::class);
}
}
