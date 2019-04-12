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
use App\Models\YpCampaignCategory;
use App\Models\YpCampaignDetail;
use App\Models\YpCampaignImpression;
use App\Models\YpCampaignClick;
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
    public function index(Request $request)
    {
        //get settings from BusinessUserProSettingsTrait
        if($request->ajax())
        {
            $currentMonth = $request->post('month');
            $currentYear = $request->post('year');
            $getSettings = $this->getProSettings($currentMonth,$currentYear);

            if($getSettings['advertise_mode']==1)
            {
               return view('/business/advertisement_dashboard_monthwise')->with(array('monthlyBudget'=>$getSettings));
            }
        }
        else
        {
            $currentMonth = date('m');
            $currentYear = date('Y');

            $getSettings = $this->getProSettings($currentMonth,$currentYear);
            if($getSettings['advertise_mode']==1)
            {
               return view('/business/advertisement_dashboard')->with(array('monthlyBudget'=>$getSettings));
            }
            else
            {
                return view('/business/advertisement_free_mode');
            }
        }
    }

    //function thet will render advertisement pro page
    public function proMode()
    {
        //get business user id from auth
        $bUserId  = Auth::user()->id;

        $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();

        //get settings from BusinessUserProSettingsTrait
        $currentMonth = date('m');
        $currentYear = date('Y');
        $getSettings = $this->getProSettings($currentMonth,$currentYear);

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

            $currentMonth = date('m');
            $currentYear = date('Y');
            $getSettings = $this->getProSettings($currentMonth,$currentYear);

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
            else if($monthlyBudget<=0)
            {
                $error = "Please provide monthly budget greater than zero.";
                Session::flash('error_message', $error);
                return back()->withInput();
            }

            $data = $_POST;

            
            foreach($data as $key=>$categoryData)
            {
                
                //check if all categories amount is greater than zero or not
                if($key!='monthly_budget' && $key!='_token')
                {

                    if(isset($categoryData[0]) && !empty($categoryData[0]))
                    {
                        $quoteWithPh = $categoryData[0];
                    }
                    

                    if(isset($categoryData[1]) && !empty($categoryData[1]))
                    {
                        $quoteWithoutPh = $categoryData[1];
                    }
                    
                    if($quoteWithPh<=0 || $quoteWithoutPh<=0)
                    {
                        
                        $error = "Please provide quotes bid amount greater than zero.";
                        Session::flash('error_message', $error);
                        return back()->withInput();
                    }
                    
                }
                
            }
           
            if(!empty($_POST))
            {
                $data = $_POST;
                
                //update bid amount of each category
                foreach($data as $key=>$categoryData)
                {
                    if($key!='monthly_budget' && $key!='_token')
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
                $YpBusinessUserTransactions->amount=$monthlyBudget;
                $YpBusinessUserTransactions->status=1;
                $YpBusinessUserTransactions->save();

                //update user pro_mode
                YpBusinessUsers::where("id",$bUserId)->update(array('advertise_mode'=>1));

                $monthlyBudget = YpBusinessUserCcDetails::select("wallet_amount","updated_wallet_amount")->where("b_id",$bUserId)->first();

                $currentMonth = date('m');
                $currentYear = date('Y');
                $getSettings = $this->getProSettings($currentMonth,$currentYear);

 
                return view('/business/advertisement_dashboard')->with(array('monthlyBudget'=>$getSettings));
                
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

    //get all top ads for current month
    public function showTopads(Request $request)
    {
        try
        {
            //get business user id from auth
            $bUserId  = Auth::user()->id;

            if($request->ajax())
            {
                $fulldate = $request->post('day');
                $dateForCliks = $request->post('day');
                $currentYear = date('Y', strtotime($fulldate));
                $currentMonth = date('m', strtotime($fulldate));
                $currentDay = date('d', strtotime($fulldate));
            }
            else
            {
                $currentMonth = date('m');
                $currentYear = date('Y');
                $currentDay = date('d');
                $fulldate = date('Y-m-d');
            }
            

            //get categories selected by business user
            $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();

            //get list of Campaigns,with impression count,click count,and sum of amount
            $campaigns = YpCampaignDetail::where('b_id',$bUserId)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->withCount(['impressions'=>function($query){
                $query->select( DB::raw( "COALESCE(count(id),0)" ) );
                $query->whereMonth('created_at', '=', date('m'));
                $query->whereYear('created_at', '=', date('Y'));
           },
          'clicks'=>function($query){
             $query->select( DB::raw( "COALESCE(count(id),0)" ) );
             $query->whereMonth('created_at', '=', date('m'));
             $query->whereYear('created_at', '=', date('Y'));
           },
          'trans'=>function($query){
             $query->select( DB::raw( "COALESCE(sum(amount),0)" ) );
             $query->whereMonth('created_at', '=', date('m'));
             $query->whereYear('created_at', '=', date('Y'));
           }])->get();


          /* $campaigns = YpCampaignDetail::where('b_id',$bUserId)->withCount(['impressions'=>function($query){
                $query->select( DB::raw( "COALESCE(count(id),0)" ) );
                
           },
          'clicks'=>function($query){
             $query->select( DB::raw( "COALESCE(count(id),0)" ) );
             
           },
          'trans'=>function($query){
             $query->select( DB::raw( "COALESCE(sum(amount),0)" ) );
            
           }])->get();*/

           //get list of clicks
           $clicks = YpCampaignClick::where('yp_campaign_click.b_id',$bUserId)->whereMonth('yp_campaign_click.created_at',$currentMonth)->whereYear('yp_campaign_click.created_at',$currentYear)->whereDay('yp_campaign_click.created_at',$currentDay)->with([
          'camp_det_click'=>function($query){
           },
           'cat_det_click'=>function($query){
           }])->leftJoin('yp_business_user_transactions', 'yp_campaign_click.id', '=', 'yp_business_user_transactions.click_id')
           ->get();

           if($request->ajax())
            {
                 return view('/business/advertisement_top_ads_monthly_clicks')->with(array('selectedcats'=>$getSelectedCats,'campaigns'=>$campaigns,'clicks'=>$clicks,'currentMonth'=>$currentMonth,'currentYear'=>$currentYear,'currentDay'=>$currentDay,'fulldate'=>$fulldate));
                
            }
            else
            {
                return view('/business/advertisement_top_ads')->with(array('selectedcats'=>$getSelectedCats,'campaigns'=>$campaigns,'clicks'=>$clicks,'currentMonth'=>$currentMonth,'currentYear'=>$currentYear,'currentDay'=>$currentDay,'fulldate'=>$fulldate));
            }

           
        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
            Session::flash('error_message', $error);
            return back()->withInput();
        }
    }

    //function to save campaign
    public function saveCampaign(Request $request)
    {
        try
        {
            $campname = isset($_POST['campname'])?$_POST['campname']:'';
            $selectedCats = isset($_POST['selected_cats'])?$_POST['selected_cats']:'';
            $payperclick = isset($_POST['payperclick'])?$_POST['payperclick']:'';
            $dbudget = isset($_POST['dbudget'])?$_POST['dbudget']:'';
            $enddate = isset($_POST['enddate'])?$_POST['enddate']:'';

            if($campname=='')
            {
                Session::flash('error_message', 'Please provide campaign name');
                return back()->withInput();
            }
            else if(empty($selectedCats))
            {
                $error = $e->getMessage();
                Session::flash('error_message', 'Please choose atleast one category');
                return back()->withInput();
            }
            else if($payperclick=='')
            {
                $error = $e->getMessage();
                Session::flash('error_message', 'Please provide pay per click amount');
                return back()->withInput();
            }
            else if($payperclick<=0)
            {
                $error = $e->getMessage();
                Session::flash('error_message', 'Please provide valid pay per click amount');
                return back()->withInput();
            }
            else if($dbudget=='')
            {
                $error = $e->getMessage();
                Session::flash('error_message', 'Please provide daily budget');
                return back()->withInput();
            }
            else if($dbudget<=0)
            {
                $error = $e->getMessage();
                Session::flash('error_message', 'Please provide valid daily budget');
                return back()->withInput();
            }
            else if($enddate=='')
            {
                $error = $e->getMessage();
                Session::flash('error_message','Please provide campaign name');
                return back()->withInput();
            }
            
            //get business user id from auth
            $bUserId  = Auth::user()->id;

            //save campaign detail

            $YpCampaignDetail = new YpCampaignDetail;
            $YpCampaignDetail->name=$campname;
            $YpCampaignDetail->pay_per_click=$payperclick;
            $YpCampaignDetail->daily_budget=$dbudget;
            $YpCampaignDetail->end_date=$enddate;
            $YpCampaignDetail->b_id=$bUserId;
            $YpCampaignDetail->status=1;
            $YpCampaignDetail->save();

            //save campaign for selected categories
            if(!empty($selectedCats))
            {
                foreach($selectedCats as $selectedCat)
                {
                    $YpCampaignCategory = new YpCampaignCategory;
                    $YpCampaignCategory->camp_id=$YpCampaignDetail->id;
                    $YpCampaignCategory->cat_id=$selectedCat;
                    $YpCampaignCategory->b_id=$bUserId;
                    $YpCampaignCategory->save();
                }
            }

            $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();

            return redirect('business_user/advertisement_top_ads');
        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
            Session::flash('error_message', $error);
            return back()->withInput();
        }
    }
   
    public function testPayment()
    {
        $tranzila_api_host = 'secure5.tranzila.com';
        $tranzila_api_path = '/cgi-bin/tranzila71u.cgi';
         
        // Prepare transaction parameters
        $query_parameters['supplier'] = 'yespleastest';
        // 'terminal_name' should be replaced by actual terminal name
        $query_parameters['sum'] = '1.70';
        $query_parameters['currency'] = '1'; // ILS
        $query_parameters['ccno'] = '12312312'; // Test card number
        $query_parameters['expmonth'] = '08'; // Card expiry date: mmyy
        $query_parameters['expyear'] = '20'; // Card expiry date: mmyy
        $query_parameters['expdate'] = '0820'; // Card expiry date: mmyy
        $query_parameters['cred_type'] = '1'; // Card expiry date: mmyy
        $query_parameters['mycvv'] = '123'; // Card expiry date: mmyy
        $query_parameters['myid'] = '111'; // Card expiry date: mmyy

         
        // Prepare query string
        $query_string = '';
        foreach ($query_parameters as $name => $value) {
            $query_string .= $name . '=' . $value . '&';
        }
         
        $query_string = substr($query_string, 0, -1); // Remove trailing '&'
         
        // Initiate CURL
        $cr = curl_init();
         
        curl_setopt($cr, CURLOPT_URL, "https://$tranzila_api_host$tranzila_api_path");
        curl_setopt($cr, CURLOPT_POST, 1);
        curl_setopt($cr, CURLOPT_FAILONERROR, true);
        curl_setopt($cr, CURLOPT_POSTFIELDS, $query_string);
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cr, CURLOPT_SSL_VERIFYPEER, 0);
         
        // Execute request
        $result = curl_exec($cr);
        $error = curl_error($cr);
         
        if (!empty($error)) {
            die ($error);
        }
        curl_close($cr);
         
        // Preparing associative array with response data
        $response_array = explode('&', $result);

        echo "<pre>";
        print_r($response_array);
        die();
    }

    //edit budget function
    public function editBudget(Request $request)
    {
        try
        {
            //get business user id from auth
            $bUserId  = Auth::user()->id;

            if(!empty($_POST))
            {
                //get settings from BusinessUserProSettingsTrait
                $monthlyBudget = isset($_POST['monthly_budget'])?$_POST['monthly_budget']:'';
                if($monthlyBudget=='')
                {
                    $error ="Please provide monthly budget.";
                    Session::flash('error_message', $error);
                    return back()->withInput();
                }
                else if($monthlyBudget<=0)
                {
                    $error = "Please provide monthly budget greater than zero.";
                    Session::flash('error_message', $error);
                    return back()->withInput();
                }

                $data = $_POST;

                //echo "<pre>";
                //print_r($_POST);
               /* foreach($data as $key=>$categoryData)
                {
                    if($key!='monthly_budget' && $key!='_token')
                    {
                        if(isset($categoryData[1]) && !empty($categoryData[1]))
                        {
                            echo $quoteWithoutPh = $categoryData[1];
                        }
                    }
                }
                die();*/
                foreach($data as $key=>$categoryData)
                {

                    $quoteWithoutPh=0;
                    $quoteWithPh=0;
                    //check if all categories amount is greater than zero or not
                    if($key!='monthly_budget' && $key!='_token')
                    {

                        if(isset($categoryData[0]) && !empty($categoryData[0]))
                        {
                            $quoteWithPh = $categoryData[0];
                        }
                        

                        if(isset($categoryData[1]) && !empty($categoryData[1]))
                        {
                             $quoteWithoutPh = $categoryData[1];
                        }
                        
                        if($quoteWithPh<=0 || $quoteWithoutPh<=0)
                        {
                            
                            $error = "Please provide quotes bid amount greater than zero.";
                            Session::flash('error_message', $error);
                            return back()->withInput();
                        }

                        if($quoteWithPh<5)
                        {
                            
                            $error = "Please provide quotes with phone bid amount greater or equal to 5.";
                            Session::flash('error_message', $error);
                            return back()->withInput();
                        }

                      
                        
                    }
                    
                }
               
                if(!empty($_POST))
                {
                    $data = $_POST;
                    
                    //update bid amount of each category
                    foreach($data as $key=>$categoryData)
                    {
                        if($key!='monthly_budget' && $key!='_token')
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


                    //update monthly budget in cc detail table and save transaction in transactions table.

                   $existingdet = YpBusinessUserCcDetails::where("b_id",$bUserId)->first(); 
                   $updatedExistBudget = $existingdet['updated_wallet_amount'];
                   $monthExistBudget = $existingdet['wallet_amount'];

                   if($monthlyBudget>$monthExistBudget)
                   {
                        $diff = $monthlyBudget-$monthExistBudget;
                        $updatedExistBudget = $updatedExistBudget+$diff;

                        YpBusinessUserCcDetails::where("b_id",$bUserId)->update(array('wallet_amount'=>$monthlyBudget,'updated_wallet_amount'=>$updatedExistBudget)); 

                        $YpBusinessUserCcDetails = new YpBusinessUserCcDetails;
                        $YpBusinessUserCcDetails->b_id=$bUserId;
                        $YpBusinessUserTransactions = new YpBusinessUserTransactions;
                        $YpBusinessUserTransactions->trans_id=time();
                        $YpBusinessUserTransactions->b_id=$bUserId;
                        $YpBusinessUserTransactions->cat_id=0;
                        $YpBusinessUserTransactions->transaction_made_on=date('Y-m-d');
                        $YpBusinessUserTransactions->amount=$diff;
                        $YpBusinessUserTransactions->status=1;
                        $YpBusinessUserTransactions->save();
                   }
                   else if($monthlyBudget<$monthExistBudget)
                   {
                        $diff = $monthExistBudget-$monthlyBudget;
                        $updatedExistBudget = $updatedExistBudget-$diff;

                        YpBusinessUserCcDetails::where("b_id",$bUserId)->update(array('wallet_amount'=>$monthlyBudget,'updated_wallet_amount'=>$updatedExistBudget)); 

                        
                   }


                    //update user pro_mode
                    YpBusinessUsers::where("id",$bUserId)->update(array('advertise_mode'=>1));

                    $currentMonth = date('m');
                    $currentYear = date('Y');
                    $getSettings = $this->getProSettings($currentMonth,$currentYear);

                    $error ="Settings updated successfully.";
                    Session::flash('success_message', $error);
     
                    $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();
                
                    return view('/business/advertisement_edit_budget')->with(array('getSelectedCats'=>$getSelectedCats,'monthlyBudget'=>$getSettings));
                    
                    
                }
                else
                {
                    $error ="Somethng went wrong,Please try again.";
                    Session::flash('error_message', $error);
                    return back()->withInput();
                }
            }
            else
            {
                $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();
                $currentMonth = date('m');
                $currentYear = date('Y');
                $getSettings = $this->getProSettings($currentMonth,$currentYear);
                
                return view('/business/advertisement_edit_budget')->with(array('getSelectedCats'=>$getSelectedCats,'monthlyBudget'=>$getSettings));
            }
            

        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
            Session::flash('error_message', $error);
            return back()->withInput();
        }
       
    }

    public function getCampaignDetail($compid)
    {
        //get list of Campaigns,with impression count,click count,and sum of amount
        $campaigns = YpCampaignDetail::where('id',$compid)->withCount(['impressions'=>function($query){
            $query->select( DB::raw( "COALESCE(count(id),0)" ) );
       },
      'clicks'=>function($query){
         $query->select( DB::raw( "COALESCE(count(id),0)" ) );
         
       },
      'trans'=>function($query){
         $query->select( DB::raw( "COALESCE(sum(amount),0)" ) );
       }])->get();

      


       //get list of clicks
       $clicks = YpCampaignClick::where('yp_campaign_click.camp_id',$compid)->with([
      'camp_det_click'=>function($query){
       },
       'cat_det_click'=>function($query){
       }])->leftJoin('yp_business_user_transactions', 'yp_campaign_click.id', '=', 'yp_business_user_transactions.click_id')
       ->get();
        return view('/business/advertisement_single_campaign')->with(array('campaigns'=>$campaigns,'clicks'=>$clicks));
    }

    public function startCamp(Request $request)
    {
       
        $compid= $request->campId;
       

        if($compid!='')
        {
            $getDetail = YpCampaignDetail::where('id',$compid)->first();
            if(!empty($getDetail))
            {
                if($getDetail['status']==1)
                {
                    return response()->json(['success'=>'0','message'=>'Campaign already running.']);
                }
                else
                {
                    YpCampaignDetail::where("id",$compid)->update(array('status'=>1));
                    return response()->json(['success'=>'1','message'=>'Campaign started successfully.']);
                }
            }
            else
            {
                return response()->json(['success'=>'0','message'=>'Campaign does not exist.']);
            }
            
        }
        else
        {
            return response()->json(['success'=>'0','message'=>'Please try again later!']);
        }
    }

    public function pauseCamp(Request $request)
    {
        $compid= $request->campId;
        if($compid!='')
        {
            $getDetail = YpCampaignDetail::where('id',$compid)->first();
            if(!empty($getDetail))
            {
                if($getDetail['status']==2)
                {
                    return response()->json(['success'=>'0','message'=>'Campaign already paused.']);
                }
                else
                {
                    YpCampaignDetail::where("id",$compid)->update(array('status'=>2));
                    return response()->json(['success'=>'1','message'=>'Campaign paused successfully.']);
                }
            }
            else
            {
                return response()->json(['success'=>'0','message'=>'Campaign does not exist.']);
            }
            
        }
        else
        {
            return response()->json(['success'=>'0','message'=>'Please try again later!']);
        }
    }

    public function endCamp(Request $request)
    {
        $compid= $request->campId;
        if($compid!='')
        {
            $getDetail = YpCampaignDetail::where('id',$compid)->first();
            if(!empty($getDetail))
            {
                $today = date('Y-m-d');
                if($getDetail['status']==3 || ($today>$getDetail['end_date']))
                {
                    return response()->json(['success'=>'0','message'=>'Campaign already ended.']);
                }
                else
                {
                    YpCampaignDetail::where("id",$compid)->update(array('status'=>3));
                    return response()->json(['success'=>'1','message'=>'Campaign ended successfully.']);
                }
            }
            else
            {
                return response()->json(['success'=>'0','message'=>'Campaign does not exist.']);
            }
            
        }
        else
        {
            return response()->json(['success'=>'0','message'=>'Please try again later!']);
        }
    }
  
}
