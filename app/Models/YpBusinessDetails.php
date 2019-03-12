<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class YpBusinessDetails extends Model
{
	protected $table = 'yp_business_details';
    protected $fillable = [
       'b_id','business_userid','website_url','facebook_url','schedule','geographic','business_profile','pic_vid','hash_tags','review_count','rating','category'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function bus_users()
    {
        return $this->belongsTo('App\Models\YpBusinessUsers','b_id','id');
    }

    public function bus_user_cat(){
        return $this->belongsTo('App\Models\YpBusinessUserCategories','b_id','business_userid');
    }

}
