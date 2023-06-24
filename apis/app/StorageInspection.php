<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageInspection extends Model
{
    protected $fillable = [
        'inspection_time', 'storage_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
