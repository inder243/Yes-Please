<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessUsersQuotesReply extends Authenticatable
{
    use Notifiable;
    protected $table = 'yp_business_user_quotes_reply';
    protected $guard = 'business_user';

    protected $fillable = [
        'business_id','quote_id','price_quotes','price_type', 'templates', 'details','uploaded_files'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotes(){
    	return $this->belongsTo('App\Models\YpBusinessUsersQuotes','business_id','business_id');
    }

    public function bus_quotes(){
        return $this->hasMany('App\Models\YpBusinessUsersQuotes','quote_id','quote_id');
    }

    public function get_bus_user(){
        return $this->belongsTo('App\Models\YpBusinessUsers','business_id','id');
    }

    public function get_reviews(){
        return $this->hasMany('App\Models\YpUserReviews', 'general_id','general_id');
    }

    public function get_reviewss(){
        return $this->hasMany('App\Models\YpUserReviews', 'business_id','business_id');
    }


}
