<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpCampaignCategory  extends Model
{
    protected $table = 'yp_campaign_category';
    protected $fillable = [
       'id','camp_id','cat_id','b_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


   

}
