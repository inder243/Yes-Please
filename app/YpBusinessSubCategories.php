<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YpBusinessSubCategories extends Model
{
    protected $fillable = [
       'cat_id','sub_category_id','sub_category_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];
}
