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
use DB;

class GeneralUserLoginController extends Controller
{

  use AuthenticatesUsers;

    public function __construct()
    {
      $this->middleware('guest:general_user', ['except' => ['logout','index']]);
    }

    public function index(Request $request)
    {

        if($request->ajax()){
            if(isset($_GET)){

                try{

                    $data = array();
                    //get category id
                    $categoryId = $request->catid;
                   
                    //get first question of form for given category
                    $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
                    $data = $getFirstQuestion;

                    $latitude = $_GET['latitude'];
                    $longitude = $_GET['longitude'];
                   
                    $results = DB::select(DB::raw('SELECT user.business_name,user.full_address,user.business_userid,user.id,bcat.category_name,user.logitude,user.latitude,detail.distance_kms as BUkms, ( 6371 * acos( cos( radians('.$latitude.') ) * cos( radians( user.latitude ) ) * cos( radians( user.logitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin(radians(user.latitude)) ) ) AS distance FROM yp_business_user_categories as buc INNER JOIN yp_business_categories as bcat ON buc.category_id=bcat.id INNER JOIN yp_business_users as user ON buc.business_userid = user.id INNER JOIN yp_business_details as detail ON user.business_userid = detail.business_userid WHERE buc.category_id= '.$categoryId.' GROUP BY user.business_userid HAVING distance <= 10') );
                  
                return view('/user/user_dashboard_ajax')->with(array('categoryId'=>$categoryId,'data'=>$data,'all_business'=>$results,'success'=>1));

                }catch(\Exception $e){
                    return response()->json(['success'=>'0','message'=>$e->getMessage()]);  
                }
                
            }/***if isset ends***/

        }else{
            try{
                $data = array();
                //get category id
                $categoryId = $request->catid;

                //get first question of form for given category
                $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
                $data = $getFirstQuestion;

                /******get business list of selected categories******/
                $get_business_by_cat = YpBusinessUserCategories::with(['get_business_user','get_business_details','get_category'])->where('category_id',$categoryId)->get()->toArray();

                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'data'=>$data,'all_business'=>$get_business_by_cat,'success'=>1));
                
            }catch(Exception $e){
                $errorMsg =  $e->getMessage();
                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'data'=>$data,'all_business'=>$get_business_by_cat,'success'=>0,'error'=>$errorMsg));
               
            }/****catch ends here****/
        }
        
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
        return response()->json(['success'=>'2','message'=>'Login Successfull']);

        } 
        // if unsuccessful, then redirect back to the login with the form data
        //return redirect()->back()->withInput($request->only('email', 'remember'));
        return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
      }else{
        // Attempt to log the user in
        if (Auth::guard('general_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        // if successful, then redirect to their intended location
        //return redirect()->intended(route('user.dashboard'));
        //return view('/user/user_dashboard');
        // return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/general_user/dashboard/catid/1']);
        return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/general_user/general_dashboard']);

        } 
        // if unsuccessful, then redirect back to the login with the form data
        //return redirect()->back()->withInput($request->only('email', 'remember'));
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
      return redirect()->intended('/');
    }


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
                return redirect()->intended('/general_user/dashboard');
            }
        }
        return redirect()->to('/general_user/dashboard');
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
