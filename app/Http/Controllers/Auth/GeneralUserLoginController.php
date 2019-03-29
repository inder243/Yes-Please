<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Socialize;
// use Laravel\Socialite\Facades\Socialite;
use Socialite;
use App\Models\YpGeneralUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Services\SocialFacebookAccountService;
use App\Models\YpBusinessUserCategories;
use App\Models\YpUserReviews;
use App\Models\YpFormQuestions;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessUsers;
use DB;

class GeneralUserLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
      $this->middleware('guest:general_user', ['except' => ['logout','index','showPublicProfile']]);
    }

    /******
    ** fn to display business on category page with locations
    *******/
    public function index(Request $request,$catid = null, $location = null){

      if(!is_numeric($catid)){
        return abort(404);
      }

      $check_id_exist_db = YpBusinessCategories::where('id','28')->get()->toArray();

      /******if id is empty the redirect to 404 page******/
      if(empty($check_id_exist_db)){

        return abort(404);

      }else{

        if($request->ajax()){
           
            if(isset($_GET)){

                try{

                    $data = array();
                    //get category id
                    $categoryId = $request->catid;
                   
                    $check_cat_exist = 
                    //get first question of form for given category
                    $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
                    $data = $getFirstQuestion;

                    $categoryName = YpBusinessCategories::select('category_name')->where('id',$categoryId)->first();
                    $catName = $categoryName['category_name'];

                    if($location != null && isset($location)){

                        if(isset($_GET['address']) && $_GET['address'] != ''){
                            $address = $_GET['address'];

                            if(!empty($address)){
                                $geocodes_latlong = $this->get_geocode_latlong($address);
                            }

                            /******get longitude and latitude from geocode******/
                            if(isset($geocodes_latlong['latitude'])){
                                $latitude = $geocodes_latlong['latitude'];
                            }else{
                                $latitude = '';
                            }
                            if(isset($geocodes_latlong['longitude'])){
                                $longitude = $geocodes_latlong['longitude'];
                            }else{
                                $longitude = '';
                            }
                        }else{
                            
                            $latitude = $_GET['latitude'];
                            $longitude = $_GET['longitude'];

                            $address = $this->getAddress($latitude, $longitude);
           
                            if($address)
                            {
                            $address = $address;
                            }
                            else
                            {
                            $address = '';
                            }
                        }
                        
                        if(isset($_GET['selected_radious']) && $_GET['selected_radious'] != ''){
                            $radious = $_GET['selected_radious'];
                        }else{
                            $radious = '100';
                        }
                    
                    }else{
                        $latitude = $_GET['latitude'];
                        $longitude = $_GET['longitude'];

                        $address = $this->getAddress($latitude, $longitude);
       
                        if($address)
                        {
                        $address = $address;
                        }
                        else
                        {
                        $address = '';
                        }

                        if(isset($_GET['selected_radious']) && $_GET['selected_radious'] != ''){
                            $radious = $_GET['selected_radious'];
                        }else{
                            $radious = '100';
                        }
                    }
    
                    $results = DB::select(DB::raw('SELECT user.business_name,user.business_userid,user.image_name,user.phone_number,user.full_address,user.business_userid,user.id,bcat.category_name,(select AVG(yur.rating) from yp_user_reviews as yur where user.id = yur.business_id AND yur.user_type="general" ) as tot_rating,(select count(yur.review) from yp_user_reviews as yur where user.id = yur.business_id AND yur.user_type="general" ) as tot_review,user.logitude,user.latitude,user.full_address,detail.distance_kms as BUkms, ( 6371 * acos( cos( radians('.$latitude.') ) * cos( radians( user.latitude ) ) * cos( radians( user.logitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin(radians(user.latitude)) ) ) AS distance,bcat.id as cid FROM yp_business_user_categories as buc INNER JOIN yp_business_categories as bcat ON buc.category_id=bcat.id INNER JOIN yp_business_users as user ON buc.business_userid = user.id INNER JOIN yp_business_details as detail ON user.business_userid = detail.business_userid WHERE bcat.id= '.$categoryId.' GROUP BY user.business_userid HAVING distance <= '.$radious) );
                //echo "<pre>";print_r($results);die;
                return view('/user/user_dashboard_ajax')->with(array('categoryId'=>$categoryId,'catName'=>$catName,'data'=>$data,'all_business'=>$results,'address'=>$address,'latitude'=>$latitude,'longitude'=>$longitude,'selected_radious'=>$radious,'success'=>1));

                }catch(\Exception $e){
                    return response()->json(['success'=>'0','message'=>$e->getMessage()]);  
                }
                
            }/***if isset ends***/

        }else{ /******$request->ajax else*******/

            try{
               //  $data = array();
               //  //get category id
               //  $categoryId = $request->catid;

               //  //get first question of form for given category
               //  $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
               //  $data = $getFirstQuestion;

               //  $categoryName = YpBusinessCategories::select('category_name')->where('id',$categoryId)->first();
               //  $catName = $categoryName['category_name'];

               //  $address = '';
               //  *****get business list of selected categories*****
               //  $get_business_by_cat = YpBusinessUserCategories::with(['get_business_user','get_business_user.avgRating','get_business_details','get_category'])->where('category_id',$categoryId)->groupBy('yp_business_user_categories.business_userid')->get()->toArray();

               // // echo "<pre>";print_r($get_business_by_cat);die;
               //  return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'catName'=>$catName,'data'=>$data,'all_business'=>$get_business_by_cat,'success'=>1));


                $data = array();
                    //get category id
                    $categoryId = $request->catid;
                   
                    $check_cat_exist = 
                    //get first question of form for given category
                    $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
                    $data = $getFirstQuestion;

                    $categoryName = YpBusinessCategories::select('category_name')->where('id',$categoryId)->first();
                    $catName = $categoryName['category_name'];

                    
                     if (Auth::guard('general_user')->check()){
                            //$address = Auth::guard('general_user')->user()->city;
                            $longitude = Auth::guard('general_user')->user()->longitude;
                            $latitude = Auth::guard('general_user')->user()->latitude;

                            $address = $this->getAddress($latitude, $longitude);
       
                            if($address)
                            {
                            $address = $address;
                            }
                            else
                            {
                            $address = '';
                            }
                          //echo "<pre>city";print_r($address);die;
                            // if(!empty($address)){
                            //     $geocodes_latlong = $this->get_geocode_latlong($address);
                            // }

                            // /******get longitude and latitude from geocode******/
                            // if(isset($geocodes_latlong['latitude'])){
                            //     $latitude = $geocodes_latlong['latitude'];
                            // }else{
                            //     $latitude = '';
                            // }
                            // if(isset($geocodes_latlong['longitude'])){
                            //     $longitude = $geocodes_latlong['longitude'];
                            // }else{
                            //     $longitude = '';
                            // }

                            if(isset($_GET['selected_radious']) && $_GET['selected_radious'] != ''){
                                $radious = $_GET['selected_radious'];
                            }else{
                                $radious = '100';
                            }
                        }else{
                            $latitude = '32.0853';
                            $longitude = '34.7818';

                            $address = $this->getAddress($latitude, $longitude);
           
                            if($address)
                            {
                            $address = $address;
                            }
                            else
                            {
                            $address = '';
                            }

                            if(isset($_GET['selected_radious']) && $_GET['selected_radious'] != ''){
                                $radious = $_GET['selected_radious'];
                            }else{
                                $radious = '100';
                            }
                        }
                    
    
                    $results = DB::select(DB::raw('SELECT user.business_name,user.business_userid,user.image_name,user.phone_number,user.full_address,user.business_userid,user.id,bcat.category_name,(select AVG(yur.rating) from yp_user_reviews as yur where user.id = yur.business_id AND yur.user_type="general" ) as tot_rating,(select count(yur.review) from yp_user_reviews as yur where user.id = yur.business_id AND yur.user_type="general" ) as tot_review,user.logitude,user.latitude,user.full_address,detail.distance_kms as BUkms, ( 6371 * acos( cos( radians('.$latitude.') ) * cos( radians( user.latitude ) ) * cos( radians( user.logitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin(radians(user.latitude)) ) ) AS distance,bcat.id as cid FROM yp_business_user_categories as buc INNER JOIN yp_business_categories as bcat ON buc.category_id=bcat.id INNER JOIN yp_business_users as user ON buc.business_userid = user.id INNER JOIN yp_business_details as detail ON user.business_userid = detail.business_userid WHERE bcat.id= '.$categoryId.' GROUP BY user.business_userid HAVING distance <= '.$radious) );
                //echo "<pre>";print_r($results);die;
                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'catName'=>$catName,'data'=>$data,'all_business'=>$results,'address'=>$address,'latitude'=>$latitude,'longitude'=>$longitude,'selected_radious'=>$radious,'success'=>1));
                
            }catch(Exception $e){
                $errorMsg =  $e->getMessage();
                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'catName'=>$catName,'default_log'=>$longitude,'default_lat'=>$latitude,'data'=>$data,'all_business'=>$get_business_by_cat,'address'=>$address,'selected_radious'=>$radious,'success'=>0,'error'=>$errorMsg));
               
            }/****catch ends here****/
        }/******$request->ajax else ends*******/
        
      }/*** 404 else ends***/

        
        
    }/*****function ends here*****/
    
    public function showLoginForm()
    {
      return view('auth.general_user_login');
    }
    
    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);

      if($request->attr_status == 'quotes'){
     
        // Attempt to log the user in
        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        //return redirect()->intended(route('user.dashboard'));
        //return view('/user/user_dashboard');
        // return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/general_user/dashboard/catid/1']);
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'2','message'=>'Login Successfull']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
        // if unsuccessful, then redirect back to the login with the form data
        //return redirect()->back()->withInput($request->only('email', 'remember'));
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
      }
      else if($request->attr_status == 'quotes_login'){

        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'2','message'=>'Login Successfull']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
       
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
      }else if($request->attr_status == 'quotessingle'){
  
        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
       
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'3','message'=>'Login Successfull']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
       
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);

      }else if($request->attr_status == 'questionsingle'){
  
        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
       
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'4','message'=>'Login Successfull']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
       
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);

      }else if($request->attr_status == 'simple'){

        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
       
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
      }
      else{

        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        
          if(Auth::guard('general_user')->user()->admin_approve == '1'){
              return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/']);
          }else{
              return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
          }


        }
      
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
      }

    }/****login fn ends here***/

    public function beforeLogin($id = ""){
        if(!empty($id)){
            return view('/user/user_index')->withErrors(array('message' => 'Some error occurred. Please try again.','id'=>1));
        }else{
            return view('/user/user_index');
        }
      
    }

    public function dashboard(){
        return view('dashboard');
    }
    
    public function logout(){
      Auth::guard('general_user')->logout();
      //return redirect('/general_user');
      //return redirect()->intended('/');
      return redirect('/');
    }

    /******fn to get address from long lat******/
    function getAddress($lat, $lon){
    //Google map API (Freely Available)
       $url  = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ&latlng=".
                $lat.",".$lon."&sensor=false";


    //Get content from google map api in json format
       $json = @file_get_contents($url);
    //decode data
       $data = json_decode($json);
       
       $status = $data->status;
       $address = '';
       if($status == "OK"){
          $address = $data->results[0]->formatted_address;
        }
       return $address;
    }/*****fn ends to get address*****/


    /******
    fn to show public profile page
    ******/
    public function showPublicProfile($b_id,$catId,$status = null){

      if(!is_numeric($b_id) || !is_numeric($catId)){
        return abort(404);
      }

      $check_businessID = YpBusinessUsers::where('id',$b_id)->get()->toArray();
      $check_catID = YpBusinessCategories::where('id',$catId)->get()->toArray();

      if(empty($check_businessID) || empty($check_catID)){

        return abort(404);

      }else{

        /**get category name**/
        $get_cat_name = YpBusinessCategories::select('category_name')->where('id',$catId)->first();
        
        $get_business_userid = YpBusinessUsers::select('business_userid')->where('id',$b_id)->first();

        if($get_business_userid){
            $business_userid = $get_business_userid->business_userid;

            try{
                $user_details = YpBusinessUsers::with(['bu_details','hash_tags','hash_tags.bus_hashtags','bu_cat','bu_cat.buser_cat','bu_cat.buser_sub_cat'])->where('business_userid',$business_userid)->first()->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }

        }

        try{
            $get_reviews = YpUserReviews::where(['business_id'=>$b_id,'user_type'=>'general'])->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        if(!empty($get_reviews)){
            $sum = 0;
            $index = 0;
            $tot_review = 0;
            foreach($get_reviews as $key=>$review){
                $sum+= $review['rating'];
                if($review['review'] != ''){
                   $tot_review++; 
                }
                $index++;
            }/***end foreach***/
            
            /*****get the average rating of user*****/
            $avg_rating = $sum/$index;
            $round_rating = round($avg_rating);
        }else{
            $round_rating = 0;
            $index = 0;
            $tot_review = 0;
        }
        
        //$userCategoryModel = new YpBusinessUserCategories();
        
        return view('user.public_profile')->with(array('user_details'=>$user_details,'round_rating'=>$round_rating,'total_review'=>$tot_review,'status'=>$status,'b_id'=>$b_id,'cat_name'=>$get_cat_name->category_name,'cat_id'=>$catId));

      }/*****check id else ends*****/
        
    }/***show profile page ends here***/


    /*************************
    fn to get longitude and latitude 
    **************************/
    public function get_geocode_latlong($address){
        $str = str_replace(" ","+", $address);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.$str.'&key=AIzaSyBpMNNjoiE9oR5ZbgY_kH8L3uRHLkiE9d0',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        $resp = curl_exec($curl);
        $arr = json_decode($resp);
        
        if(isset($arr->results[0])){
            $result = $arr->results[0]->geometry->location;
            $lat = $result->lat;
            $lng = $result->lng;
            $geocode = array('latitude'=>$lat,'longitude'=>$lng);
        }else{
            $geocode = array('latitude'=>'','longitude'=>'');
        }
        curl_close($curl);
        return $geocode;
    }/********geocode fn ends here**********/



    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/general_user/user/1');
        }

      
        // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }

        $general_userid = str_shuffle(rand(1,1000).strtotime("now"));
        // check if they're an existing user
        $existingUser = YpGeneralUsers::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            //auth()->login($existingUser, true);
          /*if(Auth::guard('general_user')->attempt(['email'=>$_POST['email'], 'password'=>$_POST['password']])){
              // return redirect()->to('/general_user/dashboard');
            return redirect()->intended('/general_user/dashboard');
        }*/

          Auth::guard('general_user')->loginUsingId($existingUser->id);

        } else {
          $password_rand = rand(1,10000);
            // create a new user
            $newUser                  = new YpGeneralUsers;
            $newUser->name            = $user->name;
            $newUser->user_id         = $general_userid;
            $newUser->email           = $user->email;
            $newUser->password        = Hash::make($password_rand);
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
           // Auth::guard('admin')->login($newUser, true);
            if(Auth::guard('general_user')->attempt(['email'=>$user->email, 'password'=>$password_rand])){
                  // return redirect()->to('/general_user/dashboard');
                //return redirect()->intended('/general_user/dashboard');
                return redirect('/');
            }
        }
       // return redirect()->to('/general_user/dashboard');
        return redirect('/');
        //return redirect()->intended('general_user');
    }

    public function redirectfb()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // public function createOrGetUser(ProviderUser $providerUser)
    // {
    //     $account = SocialFacebookAccount::whereProvider('facebook')
    //         ->whereProviderUserId($providerUser->getId())
    //         ->first();

    //     if ($account) {
    //         return $account->user;
    //     } else {

    //         $account = new SocialFacebookAccount([
    //             'provider_user_id' => $providerUser->getId(),
    //             'provider' => 'facebook'
    //         ]);

    //         $user = User::whereEmail($providerUser->getEmail())->first();

    //         if (!$user) {

    //             $user = User::create([
    //                 'email' => $providerUser->getEmail(),
    //                 'name' => $providerUser->getName(),
    //                 'password' => md5(rand(1,10000)),
    //             ]);
    //         }

    //         $account->user()->associate($user);
    //         $account->save();

    //         return $user;
    //     }
    // }
    public function callbackfb()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            print'<pre>';echo env('FACEBOOK_CLIENT_ID');
            print'<pre>';echo env('FACEBOOK_CLIENT_SECRET');
            print'<pre>';print_r($user);die;
        } catch (\Exception $e) {
            print'<pre>';echo env('FACEBOOK_CLIENT_ID');
            print'<pre>';echo env('FACEBOOK_CLIENT_SECRET');
            dd($e);
            return redirect('/general_user/user/1');
        }

      
        // // only allow people with @company.com to login
        // // if(explode("@", $user->email)[1] !== 'company.com'){
        // //     return redirect()->to('/');
        // // }

        // $general_userid = str_shuffle(rand(1,1000).strtotime("now"));
        // // check if they're an existing user
        // $existingUser = YpGeneralUsers::where('email', $user->email)->first();
        // if($existingUser){
        //     // log them in
        //     //auth()->login($existingUser, true);
        //   /*if(Auth::guard('general_user')->attempt(['email'=>$_POST['email'], 'password'=>$_POST['password']])){
        //       // return redirect()->to('/general_user/dashboard');
        //     return redirect()->intended('/general_user/dashboard');
        // }*/

        //   Auth::guard('general_user')->loginUsingId($existingUser->id);

        // } else {
        //   $password_rand = rand(1,10000);
        //     // create a new user
        //     $newUser                  = new YpGeneralUsers;
        //     $newUser->name            = $user->name;
        //     $newUser->user_id         = $general_userid;
        //     $newUser->email           = $user->email;
        //     $newUser->password        = Hash::make($password_rand);
        //     $newUser->google_id       = $user->id;
        //     $newUser->avatar          = $user->avatar;
        //     $newUser->avatar_original = $user->avatar_original;
        //     $newUser->save();
        //    // Auth::guard('admin')->login($newUser, true);
        //     if(Auth::guard('general_user')->attempt(['email'=>$user->email, 'password'=>$password_rand])){
        //           // return redirect()->to('/general_user/dashboard');
        //         return redirect()->intended('/general_user/dashboard');
        //     }
        // }
        // return redirect()->to('/general_user/dashboard');
        // //return redirect()->intended('general_user');

        $user = Socialite::driver('facebook')->user();
dd($user);
        // $authUser = $this->findOrCreateUser($user, 'facebook');
        // Auth::login($authUser, true);
        
        // return redirect()->to('/general_user/dashboard');
    }
}
