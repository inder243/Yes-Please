<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpFormQuestions;
use App\Models\YpQuesJumps;
use App\Models\YpGeneralUsersQuotes;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessCategories;
use App\Models\YpCampaignClick;
use App\Models\YpCampaignDetail;
use App\Models\YpBusinessUserCcDetails;
use App\Models\YpCampaignImpression;
use App\Models\YpBusinessUserTransactions;

use Mail;


class GetCallDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    public function __construct()
    {
       // $this->middleware('guest:general_user', ['except' => ['getdata']]);
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata(Request $request)
    {
        //https://yesplease.iapplabz.co.in/general_user/get_paycall_data
        file_put_contents('getdata.txt', print_r($_GET,true));
    }   

}
