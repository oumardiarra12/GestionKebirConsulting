<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtapeCandidature extends Model
{
    protected $fillable = [
        'date_debut_etape',
          'date_fin_etape',
           'candidature_id',
           'etape_id',
           'commentaire',
           'status_etape',
    ];
    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }
}
