<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\YpBusinessUsers;
use App\Models\YpBusinessDetails;
use App\Models\YpGeneralUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Support\Facades\Input;
use Mail;

class RegisterGeneralUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/general_user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:general_user', ['except' => ['create']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($_POST, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:yp_business_users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()) {
            return response()->json(array('error'=> $validator->getMessageBag()->toArray(),'success'=>0,));
        }

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function showUserRegisterForm(){
        
        return view('auth.register_general_user');
        
    }
    public function create(Request $request){

        if(!empty($_POST['city'])){
            $geocodes = $this->get_geocode($_POST['city']);
        }
       
        
        // $validator = Validator::make($_POST, [
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'city' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:yp_general_users'],
        //     'phone_number' => ['required', 'numeric', 'digits_between:9,15'],
        //     'password' => ['required', 'string', 'min:6'],
        //     'checkbox' =>'required|in:1',
        // ]);

        $messsages = [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'city.required' => 'The city field is required',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please add an email.',
            'phone_number.digits_between'=>'Phone number must be between 9 and 15 digits.',
            'password.required' => 'The password field is required.',
            'checkbox.required' =>'Please check this box.',
        ];

        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:yp_general_users'],
            'phone_number' => ['numeric', 'digits_between:9,15'],
            'password' => ['required', 'string', 'min:6'],
            'checkbox' =>'required|in:1',
        ];

        $validator = Validator::make($_POST, $rules,$messsages);
      //  echo "<pre>";print_r($validator);die;
        if($validator->fails()) {
           
            return redirect()->route('general_user.register')->withInput()->withErrors($validator);
        }

        $general_userid = str_shuffle(rand(1,1000).strtotime("now"));

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'.$extension;  
            $file->move(public_path().'/images/users/'.$general_userid.'/', $filename);
        }else{
            $filename = '';
        }

        /******get longitude and latitude from geocode******/
        if(isset($geocodes['latitude'])){
            $latitude = $geocodes['latitude'];
        }else{
            $latitude = '';
        }
        if(isset($geocodes['longitude'])){
            $longitude = $geocodes['longitude'];
        }else{
            $longitude = '';
        }

        $user = YpGeneralUsers::create([
            'user_id' => $general_userid,
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'city' => $_POST['city'],
            'email' => $_POST['email'],
            'phone_number' => $_POST['phone_number'],
            'image_url' => $filename,
            'password' => Hash::make($_POST['password']),
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
        //return $user;


        if(Auth::guard('general_user')->attempt(['email'=>$_POST['email'], 'password'=>$_POST['password']])){
              // return redirect()->to('/general_user/dashboard');
           // return redirect()->intended('/general_user/general_dashboard');
            return redirect('/general_user/general_dashboard');
        }

    }

    /*************************
    fn to get longitude and latitude 
    **************************/
    public function get_geocode($address){
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

    public function check_user_email_exists(){
        $email = $_POST['email'];
        $get_data = YpGeneralUsers::where('email',$email)->get()->toArray();
        if(empty($get_data)){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    public function forgotPasswordSubmit(){
        
        $user = YpGeneralUsers::where('email',$_POST['email'])->first();
        if(!$user)
        {
            //return response()->json(['success'=>0,"message"=>"This email does not exists."],200);   
        }
        else
        {
            $FPtoken = str_random(16);
            YpGeneralUsers::where('email',$user->email)->update(['fp_token'=>$FPtoken]);
            
            $send_email_from = $_ENV['send_email_from'];
            
            $data['recoverurl'] = asset('/general_user/recover_password')."/".$user->user_id."/".$FPtoken;
             
            //die($data['recoverurl']);
            $data['name'] = $user->first_name;
            
            $sent_to_email = $user->email ;
            Mail::send('user.forgot_email', ['data'=>$data], function ($message) use ($sent_to_email,$send_email_from) {

                    $message->from($send_email_from, 'Yes Please'); 

                    $message->to($sent_to_email)->subject('Yes Please Password Reset');

            });
            die('sent');
            //return response()->json(['success'=>1,"message"=>"Reset Password link sent to ".$sent_to_email.""],200);
        }
    }

    public function recoverPassword($id,$token){
        if(!empty($_POST)){
            $getUser = YpGeneralUsers::where('user_id',$id)->first();
            $getUser->password = Hash::make($_POST['password']);
            $getUser->fp_token = '';
            if($getUser->save()){
                $msg = 'Password has been changed successfully';                
            }
            return view('user.recover_password')->with(array('msg'=>$msg));
            //echo '<pre>';print_r($_POST); die;

        }else{
            $getUser = YpGeneralUsers::where('user_id',$id)->get()->toArray();
            $error = '';
            //echo '<pre>'; print_r($getUser); echo '</pre>'; die;
            if($getUser){
                $getToken = $getUser[0]['fp_token'];
                if($getToken != $token){
                    $error = 'Link Expired';
                }
            }else{
                $error = 'Unathenticated User';
            }
            return view('user.recover_password')->with(array('error'=>$error));
        }
    }
    
}
