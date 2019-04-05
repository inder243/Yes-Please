<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YpCampaignDetail  extends Model
{
    protected $table = 'yp_campaign_detail';
    protected $fillable = [
       'id','name','pay_per_click','daily_budget','status','end_date','b_id'
    ];
    protected $hidden = [
       // 'remember_token',
    ];

    public function impressions()
    {
        return $this->hasMany('App\Models\YpCampaignImpression','camp_id','id');
    }

    public function clicks()
    {
        return $this->hasMany('App\Models\YpCampaignClick','camp_id','id');
    }

    public function trans()
    {
        return $this->hasMany('App\Models\YpBusinessUserTransactions','camp_id','id');
    }
   

}
