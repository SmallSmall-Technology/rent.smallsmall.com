<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'topic_id', 'user_id', 'body', 'status'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
