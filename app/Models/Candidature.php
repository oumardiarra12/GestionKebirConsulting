<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'date_candidature',
        'candidat_id',
        'emploi_id',
        // 'etape_id',
        'status_candidature',
        'lettre_motivation'
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }
    public function emplois()
    {
        return $this->belongsTo(Emploi::class, 'emploi_id');
    }
    // public function etape()
    // {
    //     return $this->belongsTo(Etape::class, 'etape_id');
    // }
    public function renumerations()
    {
        return $this->belongsToMany(Renumeration::class, 'candidature_renumerations');
    }
}
