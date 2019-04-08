<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpCampaignClick  extends Model
{
    protected $table = 'yp_campaign_click';
    protected $fillable = [
       'id','cat_id','camp_id','general_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

     public function camp_det_click(){
        return $this->belongsTo('App\Models\YpCampaignDetail','camp_id','id');
    }

    public function cat_det_click(){
        return $this->belongsTo('App\Models\YpBusinessCategories','cat_id','id');
    }

    public function trans_det_click(){
        return $this->belongsTo('App\Models\YpBusinessUserTransactions','click','id');
    }
   

}