<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'about_us', 'income_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }

    public function verify()
    {
        if(empty($this->email_verified_at)){
            $this->email_verified_at = now();
            $this->save();
        }
        return $this;
    }

    public function residential_inspection()
    {
        return $this->hasMany('App\ResidentialInspection');
    }

    public function storage_inspection()
    {
        return $this->hasMany('App\StorageInspection');
    }

    public function coworking_inspection()
    {
        return $this->hasMany('App\CoworkingInspection');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function topic()
    {
        return $this->hasMany('App\Topic');
    }

    public function upcoming_locations()
    {
        return $this->hasMany('App\UpcomingLocation');
    }
}
