<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidatmg extends Model
{
      protected $fillable = [
        'candidat_id',
        'mobilite_geographique_id',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id');
    }
    public function mobilitegeographique()
    {
        return $this->belongsTo(MobiliteGeographique::class,'mobilite_geographique_id');
    }
}
