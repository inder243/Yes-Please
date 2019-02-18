<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Models\YpBusinessUsers;
use App\Models\YpBusinessDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSubCategories;
use App\Models\YpBusinessUsercategories;
use App\Models\YpBusinessHashtags;
use App\Models\YpBusinessUserHashtags;
use App\Models\Yphashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class RegisterBusinessUserController extends Controller
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
    protected $redirectTo = '/business_user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:business_user');
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
    public function showBusinessRegisterForm($id = null){

        if($id != null){
            $get_register_val = YpBusinessUsers::where('business_userid',$id)->get()->toArray();
            return view('auth.register_business_user')->with(array('id'=>$id,'get_register_val'=>$get_register_val));
        }else{
            return view('auth.register_business_user')->with(array('id'=>''));
        }
        
    }
    public function create($id=''){
        if(!empty($_POST['full_address'])){
            //$geocodes = $this->get_geocode($_POST['full_address']);
            $geocodes = $this->get_geocode($_POST['full_address']);
            //echo $geocodes; die;
        }
        $messages = array('digits_between'=>'Mobile phone must be between 9 and 15 digits.');
        if(!empty($id)){
            $validator = Validator::make($_POST, [
                'business_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'mobile_phone' => ['required', 'numeric', 'digits_between:9,15'],
                'full_address' => ['required', 'string', 'max:255'],
               // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        }else{
            $validator = Validator::make($_POST, [
                'business_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:yp_business_users'],
                'mobile_phone' => ['required', 'numeric', 'digits_between:9,15'],
                'full_address' => ['required', 'string', 'max:255'],
               // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            ],$messages);
        }
        

        if($validator->fails()) {
           
            return redirect()->route('business_user.register')->withInput()->withErrors($validator);
        }

        

        /*****Generate password*****/
        $first_three = substr($_POST['first_name'], 0, 3);
        $last_three = substr($_POST['last_name'], 0, 3);
        $makepassword = $first_three.$last_three.'@123';
        if(!empty($id)){
            $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
            $YpBusinessUser->business_name = $_POST['business_name'];
            $YpBusinessUser->first_name = $_POST['first_name'];
            $YpBusinessUser->last_name = $_POST['last_name'];
            //$YpBusinessUser->email = $_POST['email'];
            $YpBusinessUser->phone_number = $_POST['mobile_phone'];
            $YpBusinessUser->full_address = $_POST['full_address'];
            if(isset($geocodes['latitude'])){
                $YpBusinessUser->latitude = $geocodes['latitude'];
            }else{
                $YpBusinessUser->latitude = '';
            }
            if(isset($geocodes['longitude'])){
                $YpBusinessUser->logitude = $geocodes['longitude'];
            }else{
                $YpBusinessUser->logitude = '';
            }
            $YpBusinessUser->save();

        }else{
            $id = str_shuffle(rand(1,1000).strtotime("now"));
            YpBusinessUsers::create([
                'business_userid' => $id,
                'business_name' => $_POST['business_name'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['mobile_phone'],
                'full_address' => $_POST['full_address'],
                'password' => Hash::make($makepassword),
                'logitude' => $geocodes['longitude'],
                'latitude' => $geocodes['latitude'],
                'completed_steps' => '1',
            ]);
            $email  = $_POST['email'];
            $data= array('first_name'=>$_POST['first_name'],'last_name' => $_POST['last_name'],'password'=>$makepassword,'email' => $_POST['email']);
            $send_email_from = $_ENV['send_email_from'];
            Mail::send('business.register_email', ['data'=>$data], function ($message) use ($email,$send_email_from) {

                $message->from($send_email_from, 'Yes Please'); 

                $message->to($email)->subject('Yes Please Business Registration');
            });            
        }

        return redirect()->intended('business_user/register_two/'.$id);
        
    }

    function get_geocode($address){
        $str = str_replace(" ","+", $address);
        //echo 'https://maps.googleapis.com/maps/api/geocode/json?address='.$str.'&key=AIzaSyBpMNNjoiE9oR5ZbgY_kH8L3uRHLkiE9d0'; die;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.$str.'&key=AIzaSyBpMNNjoiE9oR5ZbgY_kH8L3uRHLkiE9d0',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        $resp = curl_exec($curl);
        $arr = json_decode($resp);
        //echo '<pre>';print_r($arr); die;
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
    }

    /*****step two*****/
    public function showBusinessRegisterForm_two($id){
        $get_register_val = YpBusinessDetails::where('business_userid',$id)->get()->toArray();
        return view('auth.register_business_user_two')->with(array('id'=>$id,'get_register_val'=>$get_register_val));
    }
    public function create_two($id){

        $business_userid = $id;

        $get_businessuser_id = YpBusinessUsers::where('business_userid',$business_userid)->get(['id'])->toArray();
        $business_id = $get_businessuser_id[0]['id'];

        $validator = Validator::make($_POST, [
            'url' => ['string', 'max:255'],
            'fb_url' => ['string', 'max:255'],
           // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()) {
           
            return redirect()->url('/business_user/register_two'.$business_userid)->withInput()->withErrors($validator);
        }

        $check_bu_details = YpBusinessDetails::where('b_id',$business_id)->get()->toArray();

        if(!empty($check_bu_details)){
            
            $update = array('website_url' => $_POST['url'],'facebook_url' => $_POST['fb_url']);
            YpBusinessDetails::where('b_id',$business_id)->update($update);
        }else{
            YpBusinessDetails::create([
                'b_id' => $business_id,
                'business_userid' => $business_userid,
                'website_url' => $_POST['url'],
                'facebook_url' => $_POST['fb_url'],
            ]);

        }

        YpBusinessUsers::where('business_userid',$business_userid)->update(['completed_steps'=>'2']);

        return redirect()->intended('business_user/register_three/'.$business_userid);
        
    }

    /*****step three*****/
    public function showBusinessRegisterForm_three($id){
        //die('here');
        $userCategoryModel = new YpBusinessUsercategories();
        $get_register_val = YpBusinessDetails::where('business_userid',$id)->get()->toArray();
        $all_categories =  YpBusinessCategories::with('sub_category')->where('category_status',1)->whereHas('sub_category', function($q) {$q->where('sub_category_status',1);})->get();  
        $business_categories =  $this->get_user_categories($id);            
        //print'<pre>vfg';print_r($business_categories); echo '</pre>';
        return view('auth.register_business_user_three')->with(array('id'=>$id,'get_register_val'=>$get_register_val,'categories'=>$all_categories,'business_categories'=>$business_categories));
    }

    /*******get all categories*******/
    public function get_user_categories($user_id)
    { 
        $b_id = YpBusinessUsers::select('id')->where('business_userid',$user_id)->get()->toArray();
        $b_u_id = $b_id[0]['id'];
        $business_category_ids = DB::table('yp_business_user_categories AS y_b_u_c')->where('y_b_u_c.business_userid',$b_u_id)
                ->leftjoin('yp_business_categories AS y_b_c', 'y_b_u_c.category_id', '=', 'y_b_c.id')
                ->distinct()
                ->select('y_b_u_c.business_userid','y_b_u_c.category_id','y_b_c.category_name','y_b_c.category_id as cat_id')
                ->get()->toArray(); 

        //echo '<pre>';print_r($business_category_ids); echo '</pre>'; die;
        $i = 0;
        if(!empty($business_category_ids)){
            foreach($business_category_ids as $value){
                $category_id = $value->category_id;
                $business_userid = $value->business_userid;
                $parent_category_name = $value->category_name;
                $cat_id = $value->cat_id;
                $result[$i]['id'] = $category_id;
                $result[$i]['cat_id'] = $cat_id;
                $result[$i]['name'] = $parent_category_name;
                $result[$i]['values'] = DB::table('yp_business_user_categories AS y_b_u_c')->where(['y_b_u_c.category_id'=>$category_id,'y_b_u_c.business_userid'=>$business_userid])
                ->join('yp_business_sub_categories AS y_b_s_c', 'y_b_u_c.sub_category_id', '=', 'y_b_s_c.id')          
                ->select('y_b_u_c.sub_category_id','y_b_s_c.sub_category_name','y_b_s_c.sub_category_id as sub_cat_id')
                ->get()->toArray();         
                $i++;
            }

        }else{
            $result = '';
        }
       // echo '<pre>';print_r($result); echo '</pre>';
        return $result;
    }/******get user categories fn ends here*****/

    public function create_three($id){
        $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
        $YpBusinessUser->completed_steps = 3;
        $YpBusinessUser->save();
        return redirect()->intended('business_user/register_four/'.$id);
    }

    /*****step four*****/
    public function showBusinessRegisterForm_four($id){
        $grapic_details = YpBusinessDetails::where('business_userid',$id)->select('distance_all','distance_kms')->get()->toArray();
        //echo '<pre>';print_r($grapic_details); echo '</pre>';
        return view('auth.register_business_user_four')->with(array('id'=>$id,'grapic_details'=>$grapic_details));
    }

    public function create_four($id){
        //echo '<pre>';print_r($_POST); echo '</pre>';die;
        $distance_all = 0;
        $distance_kms = 0;
        if(isset($_POST['country']) && $_POST['country'] == 'all'){
            $distance_all = 1;
        }else{
            $distance_kms = $_POST['radius'];
        }
        $YpBusinessDetails = YpBusinessDetails::where('business_userid', '=',  $id)->first();
        $YpBusinessDetails->distance_all = $distance_all;
        $YpBusinessDetails->distance_kms = $distance_kms;
        if($YpBusinessDetails->save()){
            $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
            $YpBusinessUser->completed_steps = 4;
            $YpBusinessUser->save();
        }
        return redirect()->intended('business_user/register_five/'.$id);
    }

    /*****step four*****/
    public function showBusinessRegisterForm_five($id){
        $userDetails = YpBusinessDetails::where('business_userid', '=',  $id)->get()->toArray();
        //echo '<pre>';print_r($userDetails); echo '</pre>';
        return view('auth.register_business_user_five')->with(array('id'=>$id,'userDetails'=>$userDetails));
    }

    public function create_five($id,Request $request){
        //echo '<pre>'; print_r($_REQUEST); echo '</pre>';die;
        $saved = false;
        $pic_vid = YpBusinessDetails::select('pic_vid')->where('business_userid', '=',  $id)->get()->toArray();
        $YpBusinessDetails = YpBusinessDetails::where('business_userid', '=',  $id)->first();

        if ($request->hasFile('myfile')) {
            foreach($request->file('myfile') as $files){
                $file = $files;             
                $extension = $file->getClientOriginalExtension(); // getting image extension            
                $filename = time().'.'.$extension;
                
                if($file->move(public_path().'/images/profile/'.$id.'/', $filename)){                
                    //echo '<pre>';print_r($pic_vid); echo '</pre>';die;
                    if(!empty($pic_vid[0]['pic_vid'])){
                        $pic_vid_arr = json_decode($pic_vid[0]['pic_vid']);
                        $pic_vid_arr->pic[] = $filename;
                        
                    }else{
                        $pic_vid_arr['pic'][] = $filename;
                    }
                    //echo '<pre>';print_r($pic_vid_arr); echo '</pre>';die;
                    $pic_vid_json = json_encode($pic_vid_arr);
                    $YpBusinessDetails->pic_vid = $pic_vid_json;
                    if($YpBusinessDetails->save()){
                        $saved = true;
                    }
                }
            }

        }
        if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
            foreach ($_POST['dropzone_file'] as $filename) {
                if(!empty($pic_vid[0]['pic_vid'])){
                    $pic_vid_arr = json_decode($pic_vid[0]['pic_vid']);
                    $pic_vid_arr->pic[] = $filename;
                }else{
                    $pic_vid_arr['pic'][] = $filename;
                }
                $pic_vid_json = json_encode($pic_vid_arr);
                //echo '<pre>'; print_r($pic_vid_json); die;
                
                $YpBusinessDetails->pic_vid = $pic_vid_json;
                if($YpBusinessDetails->save()){
                    $saved = true;
                }
            }
            //echo '<pre>'; print_r($pic_vid_json); die;
        }
        if(isset($_POST['descripton']) && !empty($_POST['descripton'])){
            $YpBusinessDetails->business_profile = $_POST['descripton'];
            if($YpBusinessDetails->save()){
                $saved = true;
            }
        }
        if(isset($_POST['send_question'])){
            $YpBusinessDetails->send_question = 1;
            if($YpBusinessDetails->save()){
                $saved = true;
            }
        }else{
            $YpBusinessDetails->send_question = 0;
            if($YpBusinessDetails->save()){
                $saved = true;
            }
        }
        if(isset($_POST['send_schedule'])){
            $YpBusinessDetails->send_schedule = 1;
            if($YpBusinessDetails->save()){
                $saved = true;
            }
        }else{
            $YpBusinessDetails->send_schedule = 0;
            if($YpBusinessDetails->save()){
                $saved = true;
            }
        }
        if($saved){
            $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
            $YpBusinessUser->completed_steps = 5;
            $YpBusinessUser->save();
        }
        return redirect()->intended('business_user/register_six/'.$id);
    }

    /*****step six*****/
    public function showBusinessRegisterForm_six($id){   
        $hashtags = Yphashtag::where('hashtag_status','1')->get()->toArray();
        $GetYpUserHashtags = YpBusinessUserHashtags::where('business_userid', '=',  $id)->select('tag_id')->get()->toArray();
        if(!empty($GetYpUserHashtags)){
            foreach($GetYpUserHashtags AS $UserHashtags){
                $YpUserHashtags[] = $UserHashtags['tag_id'];
            }
        }else{
            $YpUserHashtags = array();
        }
        //echo '<pre>'; print_r($YpUserHashtags); echo '</pre>';
        return view('auth.register_business_user_six')->with(array('id'=>$id,'hashtags'=>$hashtags,'YpUserHashtags'=>$YpUserHashtags));
    }
    public function create_six($id){
        $user_incre_id = YpBusinessUsers::select('id')->where('business_userid',$id)->first()->toArray();
        $getHashtags = Yphashtag::get()->toArray();
        $YpUserHashtags = YpBusinessUserHashtags::where('business_userid', '=',  $user_incre_id['id'])->get()->toArray();
        if(!isset($_POST['hashtag'])){
            $_POST['hashtag'] = array();
        }
        //echo '<pre>'; print_r($_POST['hashtag']); echo '</pre>';        
        //echo '<pre>'; print_r($YpUserHashtags); echo '</pre>';        
        if(!empty($YpUserHashtags)){
            foreach($getHashtags AS $hashtag){
                $getTagId = $hashtag['id'];
                if(in_array($getTagId, $_POST['hashtag'])){
                    YpBusinessUserHashtags::create([
                        'business_userid' => $user_incre_id['id'],
                        'tag_id' => $getTagId
                    ]);
                }else{
                    echo $getTagId;
                    YpBusinessUserHashtags::where(['business_userid' => $user_incre_id['id'], 'tag_id' => $getTagId])->delete();
                }
            }
         }else{
            foreach($_POST['hashtag'] AS $hashtag){
                $getTagId = $hashtag;
                YpBusinessUserHashtags::create([
                    'business_userid' => $user_incre_id['id'],
                    'tag_id' => $getTagId
                ]);
            }
         }
        
        $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
        $YpBusinessUser->completed_steps = 6;
        $YpBusinessUser->save();
        return redirect()->intended('business_user/register_seven/'.$id);
    }
    /*****step seven*****/
    public function showBusinessRegisterForm_seven($id){
        $userSchedule = YpBusinessDetails::select('schedule')->where('business_userid', '=',  $id)->get()->toArray();
        $userSchedule = json_decode($userSchedule[0]['schedule']);
        //echo '<pre>'; print_r($userSchedule); echo '</pre>';
        return view('auth.register_business_user_seven')->with(array('id'=>$id,'userSchedule'=>$userSchedule));
    } 
    public function create_seven($id){   
        //echo '<pre>'; print_r($_POST); echo '</pre>';      
        if(isset($_POST) && !empty($_POST)){
            if(isset($_POST['available'])){
                $arr = array('available'=>'available');
            }else{
                $arr = array('sunday_from'=>$_POST['sunday_from'],
                    'sunday_from'=>$_POST['sunday_from'],
                    'sunday_to'=>$_POST['sunday_to'],
                    'monday_from'=>$_POST['monday_from'],
                    'monday_to'=>$_POST['monday_to'],
                    'tuesday_from'=>$_POST['tuesday_from'],
                    'tuesday_to'=>$_POST['tuesday_to'],
                    'wednesday_from'=>$_POST['wednesday_from'],
                    'wednesday_to'=>$_POST['wednesday_to'],
                    'thursday_from'=>$_POST['thursday_from'],
                    'thursday_to'=>$_POST['thursday_to'],
                    'friday_from'=>$_POST['friday_from'],
                    'friday_to'=>$_POST['friday_to'],
                    'saturday_from'=>$_POST['saturday_from'],
                    'saturday_to'=>$_POST['saturday_to']
                );
            }
        }
        $json = json_encode($arr);
        $YpBusinessDetails = YpBusinessDetails::where('business_userid', '=',  $id)->first();
        $YpBusinessDetails->schedule = $json;
        if($YpBusinessDetails->save()){
            $YpBusinessUser = YpBusinessUsers::where('business_userid', '=',  $id)->first();
            $YpBusinessUser->completed_steps = 7;
            $YpBusinessUser->save();
        }


        $userDetail = YpBusinessUsers::where('business_userid', '=',  $id)->get()->toArray();
        $first_three = substr($userDetail[0]['first_name'], 0, 3);
        $last_three = substr($userDetail[0]['last_name'], 0, 3);
        $makepassword = $first_three.$last_three.'@123';
        //echo '<pre>';print_r($userDetail); die;
        if (Auth::guard('business_user')->attempt(['email' => $userDetail[0]['email'], 'password' => $makepassword])) {
                return redirect()->intended('business_user/business_dashboard');
            }else{
                return redirect()->intended('business_user/register_seven/'.$id);
        }

        //return redirect()->intended('business_user');
    }   

    /*********************
    fn to save selected categories by business user
    **********************/
    public function addBusinessUserCategory(Request $request){
        $input = $request->all();
        $user_id = $input['user_id'];
        $user_incre_id = YpBusinessUsers::select('id')->where('business_userid',$user_id)->first()->toArray();
        $category_id = $input['category_id'];
        $category_increamentid = YpBusinessCategories::select('id')->where('category_id',$category_id)->first()->toArray();
        $sub_cat_id = $input['sub_cat_id'];
        $subcategory_increamentid = YpBusinessSubCategories::select('id')->where('sub_category_id',$sub_cat_id)->first()->toArray();

        YpBusinessUsercategories::create([
                'business_userid' => $user_incre_id['id'],
                'category_id' => $category_increamentid['id'],
                'sub_category_id' => $subcategory_increamentid['id'],
            ]);
    }

    /****************************
    fn to delete the selected categories by business user
    ****************************/
    public function removeBusinessUserCategory(Request $request){
        $input = $request->all();  
        $user_id = $input['user_id'];
        $user_incre_id = YpBusinessUsers::select('id')->where('business_userid',$user_id)->first()->toArray();
        $category_id = $input['category_id'];
        $category_increamentid = YpBusinessCategories::select('id')->where('category_id',$category_id)->first()->toArray();
        $sub_cat_id = $input['sub_cat_id'];  
        $subcategory_increamentid = YpBusinessSubCategories::select('id')->where('sub_category_id',$sub_cat_id)->first()->toArray();          
        YpBusinessUsercategories::where(['business_userid' => $user_incre_id['id'], 'sub_category_id' => $subcategory_increamentid['id']])->delete();
        //echo '<pre>';print_r($input); die;
    }

    public function uploadUserMultipleFiles($id,Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');             
            $extension = $file->getClientOriginalExtension(); // getting image extension  
            $originalName = $file->getClientOriginalName();
            $name=explode('.',$originalName)[0];
            $filename = $name.'_'.rand().'.'.$extension;
            if($file->move(public_path().'/images/profile/'.$id.'/', $filename)){
                echo $filename;
            }else{
                echo 'false';
            }
        }
    }

    public function category_search($id){
        $input_text = $_POST['input_text'];
        if($input_text == ''){
            $all_categories = YpBusinessCategories::with('sub_category')->get();
        }else{
        $all_categories = YpBusinessCategories::with('sub_category')->where('category_name', 'like', '%'.$input_text.'%')->get();
        }
        //print_r($all_categories);die;
        return view('auth.category_search')->with(array('id'=>$id,'categories'=>$all_categories));
    }

    

    public function forgotPassword(){
        return view('auth.forgot_password');

        
    }

    public function check_admin_email_exists(){
        $email = $_POST['email'];
        $get_data = YpBusinessUsers::where('email',$email)->get()->toArray();
        if(empty($get_data)){
            echo 'true';
        }else{
            echo 'false';
        }
    }


    public function forgotPasswordSubmit(){
        
        $user = YpBusinessUsers::where('email',$_POST['email'])->first();
        //echo '<pre>'; print_r($_ENV); echo '</pre>'; die;
        if(!$user)
        {
            //return response()->json(['success'=>0,"message"=>"This email does not exists."],200);   
        }
        else
        {
            $FPtoken = str_random(16);
            YpBusinessUsers::where('email',$user->email)->update(['fp_token'=>$FPtoken]);
            
            $send_email_from = $_ENV['send_email_from'];
            
            $data['recoverurl'] = asset('/business_user/recover_password')."/".$user->business_userid."/".$FPtoken;
             
            //die($data['recoverurl']);
            $data['name'] = $user->first_name;
            
            $sent_to_email = $user->email ;
            
            Mail::send('business.forgot_email', ['data'=>$data], function ($message) use ($sent_to_email,$send_email_from) {

                    $message->from($send_email_from, 'Yes Please'); 

                    $message->to($sent_to_email)->subject('Yes Please Password Reset');

            });
            die('sent');
            //return response()->json(['success'=>1,"message"=>"Reset Password link sent to ".$sent_to_email.""],200);
        }
    }

    public function recoverPassword($id,$token){
        if(!empty($_POST)){
            $getUser = YpBusinessUsers::where('business_userid',$id)->first();
            $getUser->password = Hash::make($_POST['password']);
            $getUser->fp_token = '';
            if($getUser->save()){
                $msg = 'Password has been changed successfully';                
            }
            return view('business.recover_password')->with(array('msg'=>$msg));
            //echo '<pre>';print_r($_POST); die;

        }else{
            $getUser = YpBusinessUsers::where('business_userid',$id)->get()->toArray();
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
            return view('business.recover_password')->with(array('error'=>$error));
        }
    }

    /*********
    Fn to remove/delete drag images
    ***********/
    public function removeImages(){
        $id = Auth::user()->business_userid;
        if(isset($_POST['id'])){
            $filename = $_POST['id'];
            $image_path = public_path().'/images/profile/'.$id.'/'.$filename;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
                echo "yes";die;
            }else{
                echo "no";die;
            }
        }/****end of isset****/
    } /****fn remove image ends here***/

    

    public function test(){
        return view('business.test');
    }

    private function commoncurl($url,$post_data = null){
        $ch1 = curl_init();       
        curl_setopt($ch1, CURLOPT_URL,$url);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch1);  
        //echo "<pre>"; print_r($output);exit;
        curl_close ($ch1);
        $output= json_decode($output,true);
        
        return $output;
    } 
    private function commoncurl_post($url,$post_data = null){
        $ch1 = curl_init();       
        curl_setopt($ch1, CURLOPT_URL,$url);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $post_data);  
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch1);  
        //echo "<pre>"; print_r($output);exit;
        curl_close ($ch1);
        $output= json_decode($output,true);
        
        return $output;
    } 
}
