<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class YpBusinessUserCategories extends Model
{
    protected $fillable = [
       'business_userid','category_id','sub_category_id'
    ];

    
}
