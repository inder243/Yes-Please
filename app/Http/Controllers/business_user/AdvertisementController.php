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

    //function thet will render advertisement free page
    public function index()
    {
        return view('/business/advertisement_free_mode');
     
    }

    //function thet will render advertisement pro page
    public function proMode()
    {
        //get business user id from auth
        $bUserId  = Auth::user()->id;

        $getSelectedCats = YpBusinessUsercategories::with("buser_cat")->where("yp_business_user_categories.business_userid",$bUserId)->get();

        return view('/business/advertisement_pro_mode')->with(array('getSelectedCats'=>$getSelectedCats));
       
    }

    //save pro mode settings set by business user
    public function saveProModeSettings(Request $request)
    {
        try
        {
             //get business user id from auth
            $bUserId  = Auth::user()->id;
            if(!empty($_POST))
            {
                $data = $_POST;

                foreach($data as $key=>$categoryData)
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

                    if(isset($categoryData[2]) && !empty($categoryData[2]) && $categoryData[2]=="on")
                    {
                        $activeQuote = 1;
                    }
                    else
                    {
                        $activeQuote = 0;
                    }
                    
                    YpBusinessUsercategories::where("category_id",$categoryId)->where("business_userid",$bUserId)->update(array('quote_with_ph'=>$quoteWithPh,'quote_without_ph'=>$quoteWithoutPh,'accept_request'=>$activeQuote));
                }

                return redirect('business_user/advertisement_pro_mode')->with('status', 'Data saved successfullly');
            }
            else
            {
                $error ="Please try again.";
                return view('/business/advertisement_pro_mode')->withErrors($error);
            }

        }
        catch(Exception $e)
        {
            $errors = $e->getMessage();
            return view('/business/advertisement_pro_mode')->withErrors($error);
        }
       
    }

  
}
