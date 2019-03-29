<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUserCcDetails  extends Model
{
    protected $table = 'yp_business_user_cc_details';
    protected $fillable = [
       'id','b_id','customer_id','wallet_amount','updated_wallet_amount','lastdigit','expire_month','expire_year','card_added_on'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


   

}
