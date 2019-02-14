<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','first_name','middle_name','postcode','phone_number','address','profile_image','w9_form','facebook_link','twitter_link','instagram_link','bio','login_type','birth_date','country','city','state','contract_date','added_by','profile_img_type','username','instagram_id','balance','stage_name','csv_id'
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

    Social login 
    */
     public function socialProfile()
    {
        return $this->hasOne(SocialLoginProfile::class);
    }
}
