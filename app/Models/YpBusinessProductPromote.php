<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YpBusinessProductPromote extends Authenticatable
{
    protected $table = 'yp_business_products_promote';

    protected $fillable = [
       'product_id','business_id','pay_per_click','daily_budget','end_date'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function get_product(){
    	return $this->belongsTo('App\Models\BusinessProducts','product_id','id');
    }

    public function get_business(){
        return $this->belongsTo('App\Models\YpBusinessUsers','business_id','id');
    }
}
