<?php

namespace App\Http\Traits;
use Auth;

use App\Models\YpBusinessUsers;
use App\Models\YpBusinessUserCcDetails;

trait BusinessUserProSettingsTrait {
    public function getProSettings() 
    {
    	//get business user id from auth
        $bUserId  = Auth::user()->id;

    	$proSettings = array();

        $monthlyBudget = YpBusinessUserCcDetails::select("wallet_amount","updated_wallet_amount")->where("b_id",$bUserId)->first();
        if(!empty($monthlyBudget))
        {
        	$proSettings['wallet_amount'] = $monthlyBudget['wallet_amount'];
        	$proSettings['updated_wallet_amount'] = $monthlyBudget['updated_wallet_amount'];
        }

        $getSettings = YpBusinessUsers::select("advertise_mode")->where("id",$bUserId)->first(); 

        if(!empty($getSettings))
        {
        	$proSettings['advertise_mode'] = $getSettings['advertise_mode'];
        }

        return $proSettings;
    }
}