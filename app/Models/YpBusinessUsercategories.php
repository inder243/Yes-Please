<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUsercategories extends Model
{
    protected $table = 'yp_business_user_categories';
    protected $fillable = [
       'business_userid','category_id','sub_category_id','quote_with_ph','quote_without_ph','accept_request'
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

    public function buser_cat()
    {
        return $this->belongsTo('App\Models\YpBusinessCategories','category_id','id');
    }

    public function buser_sub_cat()
    {
        return $this->belongsTo('App\Models\YpBusinessSubCategories','sub_category_id','id');
    }

}
