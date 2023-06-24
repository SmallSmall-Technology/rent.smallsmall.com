<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message()
    {
        return $this->hasMany('App\Message');
    }
}
