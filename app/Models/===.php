<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessUsers extends Model
{
    use Notifiable;

    protected $guard = 'business_user';

    protected $fillable = [
        'business_userid','first_name','last_name', 'email', 'password','phone_number','full_address','logitude','latitude','remember_token	'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
