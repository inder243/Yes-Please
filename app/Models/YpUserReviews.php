<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpUserReviews extends Model
{
    protected $table = 'yp_user_reviews';
    protected $fillable = [
       'business_id','general_id','quote_id','review','rating','user_type'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function get_quotes(){
    	return $this->belongsTo('App\Models\YpBusinessUsersQuotes','business_id','business_id');
    }

    public function get_quotes_reply(){
        return $this->belongsTo('App\Models\YpBusinessUsersQuotesReply','quote_id','quote_id');
    }

    public function get_bus_user(){
        return $this->belongsTo('App\Models\YpBusinessUsers','business_id','id');
    }

}
