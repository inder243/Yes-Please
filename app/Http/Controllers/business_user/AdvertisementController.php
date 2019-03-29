<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpVerificationBusinessUsers;
use App\Models\YpBusinessUsercategories;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSubCategories;
use App\Models\YpBusinessHashtags;
use App\Models\Yphashtag;
use App\Models\YpBusinessDetails;
use App\Models\YpBusinessUserHashtags;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpFormQuestions;
use App\Models\YpBusinessSelectedServices;
use App\Models\YpBusinessUserTransactions;
use App\Models\YpBusinessUserCcDetails;
use App\Http\Traits\BusinessUserProSettingsTrait;

use File;
use Illuminate\Support\Facades\DB;
use Session;

class AdvertisementController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:business_user');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    use BusinessUserProSettingsTrait;
    //function thet will render advertisement free page
    public function index()
    {
        //get settings from BusinessUserProSettingsTrait

        $getSettings = $this->getProSettings();

        if($getSettings['advertise_mode']==1)
        {
           return view('/business/advertisement_dashboard')->with(array('monthlyBudget'=>$getSettings));
        }
        else
        {
            return view('/business/advertisement_free_mode');
        }
        
     
    }

    //function thet will render advertisement pro page
    public function proMode()
    {
        //get business user id from auth
        $bUserId  = Auth::user()->id;

        $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();

        //get settings from BusinessUserProSettingsTrait
        $getSettings = $this->getProSettings();

        if($getSettings['advertise_mode']==1)
        {
           return view('/business/advertisement_dashboard')->with(array('monthlyBudget'=>$getSettings));
        }
        else
        {
            return view('/business/advertisement_pro_mode')->with(array('getSelectedCats'=>$getSelectedCats,'monthlyBudget'=>$getSettings));
        }

        
       
    }

    //save pro mode settings set by business user
    public function saveProModeSettings(Request $request)
    {
        try
        {
            //get business user id from auth
            $bUserId  = Auth::user()->id;

            //get settings from BusinessUserProSettingsTrait

            $getSettings = $this->getProSettings();

            if($getSettings['advertise_mode']==1)
            {
                Session::flash('success_message', 'Pro Mode already activated');
                return back()->withInput();  
            }

            

            $monthlyBudget = isset($_POST['monthly_budget'])?$_POST['monthly_budget']:'';
            if($monthlyBudget=='')
            {
                $error ="Please provide monthly budget.";
                Session::flash('error_message', $error);
                return back()->withInput();
            }
            if(!empty($_POST))
            {
                $data = $_POST;
                

                foreach($data as $key=>$categoryData)
                {
                    if($key!='monthly_budget')
                    {
                        $categoryId = $key;

                        if(isset($categoryData[0]) && !empty($categoryData[0]))
                        {
                            $quoteWithPh = $categoryData[0];
                        }
                        else
                        {
                            $quoteWithPh = 0;
                        }

                        if(isset($categoryData[1]) && !empty($categoryData[1]))
                        {
                            $quoteWithoutPh = $categoryData[1];
                        }
                        else
                        {
                            $quoteWithoutPh = 0;
                        }

                        if(isset($categoryData[2]) && !empty($categoryData[2]) && ($categoryData[2]=="on" || $categoryData[2]==1))
                        {
                            $activeQuote = 1;
                        }
                        else
                        {
                            $activeQuote = 0;
                        }
                        
                        YpBusinessUsercategories::where("category_id",$categoryId)->where("business_userid",$bUserId)->update(array('quote_with_ph'=>$quoteWithPh,'quote_without_ph'=>$quoteWithoutPh,'accept_request'=>$activeQuote)); 
                    }
                    
                }


                //save monthly budget in cc detail table and save transaction in transactions table.

                $YpBusinessUserCcDetails = new YpBusinessUserCcDetails;
                $YpBusinessUserCcDetails->b_id=$bUserId;
               // $YpBusinessUserCcDetails->response = $response;
                $YpBusinessUserCcDetails->customer_id=time();
                $YpBusinessUserCcDetails->wallet_amount=$monthlyBudget;
                $YpBusinessUserCcDetails->updated_wallet_amount=$monthlyBudget;
                $YpBusinessUserCcDetails->lastdigit=4444;
                $YpBusinessUserCcDetails->expire_month="10";
                $YpBusinessUserCcDetails->expire_year="22";
                $YpBusinessUserCcDetails->card_added_on=date('Y-m-d');
                $YpBusinessUserCcDetails->save();
                
                $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                $YpBusinessUserTransactions->trans_id=time();
               // $YpBusinessUserTransactions->response = $response;
                $YpBusinessUserTransactions->b_id=$bUserId;
                $YpBusinessUserTransactions->cat_id=0;
                $YpBusinessUserTransactions->transaction_made_on=date('Y-m-d');
                $YpBusinessUserTransactions->amonut=$monthlyBudget;
                $YpBusinessUserTransactions->status=1;
                $YpBusinessUserTransactions->save();

                //update user pro_mode
                YpBusinessUsers::where("id",$bUserId)->update(array('advertise_mode'=>1));

                $monthlyBudget = YpBusinessUserCcDetails::select("wallet_amount","updated_wallet_amount")->where("b_id",$bUserId)->first();
 
                return view('/business/advertisement_dashboard')->with(array('monthlyBudget'=>$monthlyBudget));
                
            }
            else
            {
                $error ="Somethng went wrong,Please try again.";
                Session::flash('error_message', $error);
                return back()->withInput();
            }

        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
            Session::flash('error_message', $error);
            return back()->withInput();
        }
       
    }

  
}
