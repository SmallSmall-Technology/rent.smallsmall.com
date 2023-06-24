<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValidID extends Model
{

    protected $table = 'valid_ids';
    protected $fillable = [
        'user_id', 'file_path'
    ];
}
