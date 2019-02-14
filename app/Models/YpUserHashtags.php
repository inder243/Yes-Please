<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpUserHashtags extends Model
{
    protected $table = 'yp_business_user_hashtags';
    protected $fillable = [
       'business_userid','tag_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


    public function bus_users()
    {
    	//cat_id = sub_cat
    	//id = cat
        return $this->belongsTo('App\Models\YpBusinessUsers','business_userid','id');
    }

    public function bus_hashtags()
    {
        return $this->belongsTo('App\Models\Yphashtag','tag_id','id');
    }
}
