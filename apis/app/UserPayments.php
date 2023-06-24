<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'property_type',
        'status',
        'txn_reference',
        'amount',
        'months',
        'expires_at'
    ];
}
