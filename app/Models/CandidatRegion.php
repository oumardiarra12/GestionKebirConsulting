<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatRegion extends Model
{
    protected $fillable = [
        'candidat_id',
       'region_id',

    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
