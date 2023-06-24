<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the User's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
