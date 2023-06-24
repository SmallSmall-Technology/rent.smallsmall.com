<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'favoritable_id',
        'favoritable_type',
    ];

    /**
     * Get the owning favoritable model.
     */
    public function favoritable()
    {
        return $this->morphTo();
    }
}
