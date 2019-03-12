<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessUsersQuotes extends Authenticatable
{
    use Notifiable;
    protected $table = 'yp_business_users_quotes';
    protected $guard = 'business_user';

    protected $fillable = [
        'business_id','general_id','quote_id','status'
    ];

    protected $hidden = [
        //'password', 'remember_token',
    ];

    public function get_gen_user(){
    	return $this->belongsTo('App\Models\YpGeneralUsers','general_id','id');
    }

    public function get_bus_user(){
        return $this->belongsTo('App\Models\YpBusinessUsers','business_id','id');
    }

    public function quote_reply(){
        return $this->belongsTo('App\Models\YpBusinessUsersQuotesReply', 'quote_id','quote_id');
    }

    public function get_review(){
        return $this->hasMany('App\Models\YpUserReviews', 'general_id','general_id');
    }

    public function get_quotes(){
        return $this->belongsTo('App\Models\YpGeneralUsersQuotes','quote_id','id');
    }
}
