<?php

namespace App\Http\Traits;
use Auth;
use DB;

use App\Models\YpBusinessUsers;
use App\Models\YpBusinessUserCcDetails;
use App\Models\YpBusinessUserCategories;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessUserTransactions;



trait BusinessUserProSettingsTrait {
    public function getProSettings() 
    {
    	//get business user id from auth
        $bUserId  = Auth::user()->id;

    	$proSettings = array();

        //get monthly budget of logged in business user
        $monthlyBudget = YpBusinessUserCcDetails::select("wallet_amount","updated_wallet_amount")->where("b_id",$bUserId)->first();
        if(!empty($monthlyBudget))
        {
        	$proSettings['wallet_amount'] = $monthlyBudget['wallet_amount']; //total amount
        	$proSettings['updated_wallet_amount'] = $monthlyBudget['updated_wallet_amount'];//updated amount
        }

        //get mode type free or pro of logged in user
        $getSettings = YpBusinessUsers::select("advertise_mode")->where("id",$bUserId)->first(); 

        if(!empty($getSettings))
        {
        	$proSettings['advertise_mode'] = $getSettings['advertise_mode'];
        }
        
        $currentMonth = date('m');
        $currentYear = date('Y');

        //get count of Quotes requests with phone,total of amount deduction for bids of Quotes requests with phone for current month

        $calculationsQuoteWithPh = YpBusinessUserTransactions::select(DB::raw('count(id) as countOfBid, sum(amount) as sumOfbid'))->where("type",1)->where("reason_of_deduction",1)->where("b_id",$bUserId)->whereMonth('transaction_made_on', $currentMonth)->whereYear('transaction_made_on', $currentYear)->get();

        

        if(!empty($calculationsQuoteWithPh))
        {
            $proSettings['countOfBidWithPh'] = $calculationsQuoteWithPh[0]['countOfBid'];
            $proSettings['sumOfbidWithPh'] = $calculationsQuoteWithPh[0]['sumOfbid'];
        }

       
        //get count of Quotes requests without phone,total of amount deduction for bids of Quotes requests without phone for current month

        $calculationsQuoteWithoutPh = YpBusinessUserTransactions::select(DB::raw('count(id) as countOfBid, sum(amount) as sumOfbid'))->where("type",1)->where("reason_of_deduction",2)->where("b_id",$bUserId)->whereMonth('transaction_made_on', $currentMonth)->whereYear('transaction_made_on', $currentYear)->get();

        if(!empty($calculationsQuoteWithoutPh))
        {
            $proSettings['countOfBidWithoutPh'] = $calculationsQuoteWithoutPh[0]['countOfBid'];
            $proSettings['sumOfbidWithoutPh'] = $calculationsQuoteWithoutPh[0]['sumOfbid'];
        }

        //get count of clicks of top ad,total of amount deduction for bids of clicks of top ad for current month

        $calculationsTopAd = YpBusinessUserTransactions::select(DB::raw('count(id) as countOfBid, sum(amount) as sumOfbid'))->where("type",1)->where("reason_of_deduction",4)->where("b_id",$bUserId)->whereMonth('transaction_made_on', $currentMonth)->whereYear('transaction_made_on', $currentYear)->get();

        if(!empty($calculationsTopAd))
        {
            $proSettings['countOfTopAd'] = $calculationsTopAd[0]['countOfBid'];
            $proSettings['sumOfTopAd'] = $calculationsTopAd[0]['sumOfbid'];
        }

         //get total  month deduction for this month

        $calculationsTotalForMonth = YpBusinessUserTransactions::select(DB::raw('sum(amount) as sumOfbid'))->where("type",1)->where("b_id",$bUserId)->whereMonth('transaction_made_on', $currentMonth)->whereYear('transaction_made_on', $currentYear)->get();

        if(!empty($calculationsTotalForMonth))
        {
            $proSettings['totalSpent'] = $calculationsTotalForMonth[0]['sumOfbid'];
            
        }

        return $proSettings;
    }

    public function deductAmountFromWallet($businessUsers,$catid,$columNameForBid) 
    {
        //get business user ids
        if(!empty($businessUsers) && !empty($catid) && !empty($columNameForBid))
        {
            //check column to save in reason of deduction
            if($columNameForBid=="quote_with_ph")
            {
                $reasonOfDeduction = 1;
            }
            else if($columNameForBid=="quote_without_ph")
            {
                $reasonOfDeduction = 2;
            }

            
            foreach($businessUsers as $businessUser)
            {
                //get update wallet amount of each business user
                $monthlyBudget = YpBusinessUserCcDetails::select("updated_wallet_amount")->where("b_id",$businessUser)->first();

                if(!empty($monthlyBudget))
                {
                    //if amount is greater than 0
                    if($monthlyBudget['updated_wallet_amount']>0)
                    {
                       $availableWalletAmount =  $monthlyBudget['updated_wallet_amount'];//remaining amount in wallet

                       //get bid amount set by business user
                       $bUserBidAmount = YpBusinessUserCategories::select($columNameForBid)->where("category_id",$catid)->where("business_userid",$businessUser)->first();

                       //if available wallet amount is greater than bidamount set by business user then deduct that much amount
                       if($availableWalletAmount>=$bUserBidAmount[$columNameForBid])
                       {
                            $availableWalletAmount = $availableWalletAmount-$bUserBidAmount[$columNameForBid];

                           // if wallet amount reached to 0 after deduction then update wallet as 0
                            if($availableWalletAmount<=0)
                            {
                                $updateWalletAmount = YpBusinessUserCcDetails::where("b_id",$businessUser)->update(['updated_wallet_amount' =>0]);

                                //insert in transaction table
                                $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                                $YpBusinessUserTransactions->trans_id=time();
                               // $YpBusinessUserTransactions->response = $response;
                                $YpBusinessUserTransactions->b_id=$businessUser;
                                $YpBusinessUserTransactions->cat_id=$catid;
                                $YpBusinessUserTransactions->transaction_made_on=date('Y-m-d');
                                $YpBusinessUserTransactions->amount=$bUserBidAmount[$columNameForBid];
                                $YpBusinessUserTransactions->status=1;
                                $YpBusinessUserTransactions->type=1;
                                $YpBusinessUserTransactions->reason_of_deduction=$reasonOfDeduction;

                                $YpBusinessUserTransactions->save(); 
                            }
                            else
                            {
                                 //insert in transaction table
                                $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                                $YpBusinessUserTransactions->trans_id=time();
                               // $YpBusinessUserTransactions->response = $response;
                                $YpBusinessUserTransactions->b_id=$businessUser;
                                $YpBusinessUserTransactions->cat_id=$catid;
                                $YpBusinessUserTransactions->transaction_made_on=date('Y-m-d');
                                $YpBusinessUserTransactions->amount=$bUserBidAmount[$columNameForBid];
                                $YpBusinessUserTransactions->status=1;
                                $YpBusinessUserTransactions->type=1;
                                $YpBusinessUserTransactions->reason_of_deduction=$reasonOfDeduction;
                                $YpBusinessUserTransactions->save(); 
                                
                                $updateWalletAmount = YpBusinessUserCcDetails::where("b_id",$businessUser)->update(['updated_wallet_amount' => $availableWalletAmount]);
                            }

                            

                       }
                       else
                       {
                         //if available wallet amount is greater than bidamount set by admin  then deduct that much amount
                            $adminBidAmount = YpBusinessCategories::select($columNameForBid)->where("id",$catid)->first();
                            if($availableWalletAmount>=$adminBidAmount[$columNameForBid])
                            {
                                $availableWalletAmount = $availableWalletAmount-$adminBidAmount[$columNameForBid]; 
                                // if wallet amount reached to 0 after deduction then update wallet as 0
                                if($availableWalletAmount<=0)
                                {
                                    $updateWalletAmount = YpBusinessUserCcDetails::where("b_id",$businessUser)->update(['updated_wallet_amount' =>0]);
                                    $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                                    $YpBusinessUserTransactions->trans_id = time();
                                    // $YpBusinessUserTransactions->response = $response;
                                    $YpBusinessUserTransactions->b_id = $businessUser;
                                    $YpBusinessUserTransactions->cat_id = $catid;
                                    $YpBusinessUserTransactions->transaction_made_on = date('Y-m-d');
                                    $YpBusinessUserTransactions->amount = $adminBidAmount[$columNameForBid];
                                    $YpBusinessUserTransactions->status = 1;
                                    $YpBusinessUserTransactions->type = 1;
                                    $YpBusinessUserTransactions->reason_of_deduction=$reasonOfDeduction;
                                    $YpBusinessUserTransactions->save(); 
                                    $updateWalletAmount = YpBusinessUserCcDetails::where("b_id",$businessUser)->update(['updated_wallet_amount' => 0]);

                                }
                                else
                                {
                                    $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                                    $YpBusinessUserTransactions->trans_id = time();
                                    // $YpBusinessUserTransactions->response = $response;
                                    $YpBusinessUserTransactions->b_id = $businessUser;
                                    $YpBusinessUserTransactions->cat_id = $catid;
                                    $YpBusinessUserTransactions->transaction_made_on = date('Y-m-d');
                                    $YpBusinessUserTransactions->amount = $adminBidAmount[$columNameForBid];
                                    $YpBusinessUserTransactions->status = 1;
                                    $YpBusinessUserTransactions->type = 1;
                                    $YpBusinessUserTransactions->reason_of_deduction=$reasonOfDeduction;
                                    $YpBusinessUserTransactions->save(); 

                                    $updateWalletAmount = YpBusinessUserCcDetails::where("b_id",$businessUser)->update(['updated_wallet_amount' => $availableWalletAmount]);
                                }
                                
                            }
                       }
                    }
                }

            }

            return 1;
        }
        else
        {
            return 0;
        }
    }
}