<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessSuperCategories extends Model
{
    protected $table = 'yp_business_super_categories';
    protected $fillable = [
       'super_cat_id','cat_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];



    public function sub_category()
    {
    	return $this->hasMany('App\Models\YpBusinessSubCategories','cat_id','id');
    }

    public function bu_cats()
    {
        return $this->belongsTo('App\Models\YpBusinessUsercategories','id','category_id');
    }

    public function bus_user_cat(){
        return $this->belongsTo('App\Models\YpBusinessUserCategories','category_id','id');
    }

}
