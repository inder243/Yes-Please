<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessUserEvents extends Authenticatable
{
    protected $table = 'yp_business_user_events';

    protected $fillable = [
       'title','from_date','to_date','from_time','to_time','type','status','b_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function business_user()
    {
        return $this->belongsTo('App\Models\YpBusinessUsers','b_id','id');
    }
    public function general_user()
    {
        return $this->belongsTo('App\Models\YpBusinessUsers','g_id','id');
    }
}
