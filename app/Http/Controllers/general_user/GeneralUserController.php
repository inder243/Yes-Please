<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsers;

class GeneralUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:general_user');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/user/user_dashboard');
    }   

    /****************
    fn to get list of business users on dashboard/category page
    ******************/ 
    public function getlist_business(){
        //print'<pre>';print_r($_POST['option']);die;
        //Auth::user()-> ;
       // print'<pre>';print_r(Auth::user()->id);die;

        $latitude = Auth::user()->latitude;
        $longitude = Auth::user()->longitude;
   
        $results = DB::select(DB::raw('SELECT user.business_name,user.business_userid,user.logitude,user.latitude,detail.distance_kms as BUkms, ( 6371 * acos( cos( radians('.$latitude.') ) * cos( radians( user.latitude ) ) * cos( radians( user.logitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin(radians(user.latitude)) ) ) AS distance FROM yp_business_users as user INNER JOIN yp_business_details as detail ON user.business_userid = detail.business_userid HAVING distance <= '.$_POST['option'].' ORDER BY distance') );
        //  WHERE kms <= distance
        echo "<pre>";print_r($results);die;        
        

    }/****getlist fn ends here****/

    /******
    fn to show public profile page
    ******/
    public function showPublicProfile($business_userid){
       
        $user_details = YpBusinessUsers::with(['bu_details','hash_tags','hash_tags.bus_hashtags','bu_cat','bu_cat.buser_cat','bu_cat.buser_sub_cat'])->where('business_userid',$business_userid)->first()->toArray();
        
        //$userCategoryModel = new YpBusinessUserCategories();
        
        return view('user.public_profile')->with(array('user_details'=>$user_details));
        
    }

}
