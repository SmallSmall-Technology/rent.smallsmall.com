<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingLocation extends Model
{
    protected $fillable = [
        'user_id', 'location_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
