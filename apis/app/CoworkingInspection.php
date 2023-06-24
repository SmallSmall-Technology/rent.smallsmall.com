<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoworkingInspection extends Model
{
    protected $fillable = [
        'inspection_time', 'coworking_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
