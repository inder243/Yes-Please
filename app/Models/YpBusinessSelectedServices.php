<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessSelectedServices extends Model
{
    protected $table = 'yp_business_selected_services';

    protected $fillable = [
       'business_id','cat_id','service_text'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

}
