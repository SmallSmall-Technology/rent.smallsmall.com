<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    protected $fillable = [
        'user_id', 'file_path'
    ];
}
