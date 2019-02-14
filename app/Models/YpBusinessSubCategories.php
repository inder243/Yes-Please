<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessSubCategories extends Model
{
    protected $table = 'yp_business_sub_categories';

    protected $fillable = [
       'cat_id','sub_category_id','sub_category_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\YpBusinessCategories','id','cat_id');
    }

}
