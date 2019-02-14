<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpVerificationBusinessUsers extends Authenticatable
{
    protected $table = 'yp_verfication_business_users';

    protected $fillable = [
       'b_id','business_user_id','uploaded_files','business_id','admin_verified_status'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function business_user()
    {
        return $this->belongsTo('App\Models\YpBusinessUsers','b_id','id');
    }
}
