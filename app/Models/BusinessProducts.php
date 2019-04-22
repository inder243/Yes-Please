<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProducts extends Model
{
    protected $table = 'yp_business_products';
    protected $fillable = [
       'product_id','business_id','name','category_id','sub_category_id','price_type','price','price_from','price_to','price_per','product_description','product_images'
    ];
    protected $hidden = [
       // 'remember_token',
    ];
}
