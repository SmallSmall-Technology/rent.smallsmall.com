<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidentialInspection extends Model
{

    protected $fillable = [
        'inspection_time', 'residential_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
