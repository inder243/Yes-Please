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

class EventsController extends Controller
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
    //function thet will render events 
    public function getEvents(Request $request)
    {
        //get settings from BusinessUserProSettingsTrait
        return view('/business/event_dashboard');
        
    }

}
