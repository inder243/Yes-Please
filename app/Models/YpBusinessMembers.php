<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessMembers extends Authenticatable
{
    protected $table = 'yp_business_members';

    protected $fillable = [
       'member_id','business_id','name','phone','email','notes','added_date'
    ];
    protected $hidden = [
       // 'remember_token',
    ];
}
