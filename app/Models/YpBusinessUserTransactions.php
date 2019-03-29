<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpBusinessUserTransactions  extends Model
{
    protected $table = 'yp_business_user_transactions';
    protected $fillable = [
       'id','trans_id','response','b_id','cat_id','transaction_made_on','type','amount','status','reason_of_deduction'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


   

}