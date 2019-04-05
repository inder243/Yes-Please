<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpCampaignImpression  extends Model
{
    protected $table = 'yp_campaign_impression';
    protected $fillable = [
       'id','cat_id','camp_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];


    public function camp_det_impression(){
        return $this->belongsTo('App\Models\YpCampaignDetail','camp_id','id');
    }
   

}