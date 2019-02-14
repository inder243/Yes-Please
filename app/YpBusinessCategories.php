<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YpBusinessCategories extends Model
{
    protected $fillable = [
       'category_id','category_name'
    ];
    protected $hidden = [
       // 'remember_token',
    ];
}
