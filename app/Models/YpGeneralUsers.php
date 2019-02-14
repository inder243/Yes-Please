<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpGeneralUsers extends Authenticatable
{
    use Notifiable;

    protected $guard = 'general_user';

    protected $fillable = [
        'user_id','first_name','last_name','city','country','state', 'email', 'password','phone_number','image_url','longitude','latitude','remember_token','google_id','name','avatar','avatar_original','	facebook_id','provider_user_id','	provider'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
