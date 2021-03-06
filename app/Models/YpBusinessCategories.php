<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessCategories extends Model
{
    protected $table = 'yp_business_categories';
    protected $fillable = [
       'category_id','category_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


    public function sub_category()
    {
    	//cat_id = sub_cat
    	//id = cat
        return $this->hasMany('App\Models\YpBusinessSubCategories','cat_id','id');
    }

    public function bu_cats()
    {
        return $this->belongsTo('App\Models\YpBusinessUsercategories','id','category_id');
    }

}
