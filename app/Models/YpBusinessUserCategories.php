<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class YpBusinessUserCategories extends Model
{
    protected $fillable = [
       'business_userid','category_id','sub_category_id'
    ];

    public function get_business_user(){
    	return $this->belongsTo('App\Models\YpBusinessUsers','business_userid','id');
    }

    public function get_business_details(){
    	return $this->belongsTo('App\Models\YpBusinessDetails','business_userid','b_id');
    }

    public function get_category(){
    	return $this->belongsTo('App\Models\YpBusinessCategories','category_id','id');
    }
    
}
