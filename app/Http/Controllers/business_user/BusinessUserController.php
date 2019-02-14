<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpVerificationBusinessUsers;
use App\Models\YpBusinessUserCategories;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSubCategories;
use App\Models\YpBusinessHashtags;
use App\Models\Yphashtag;
use App\Models\YpBusinessDetails;
use App\Models\YpBusinessUserHashtags;
use File;
use Illuminate\Support\Facades\DB;
use Session;

class BusinessUserController extends Controller
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
    public function index()
    {
        $business_user_id = Auth::user()->business_userid;
        $completed_steps = Auth::user()->completed_steps;
        $redirect_to_step = $completed_steps+1;

        $arr = array('1'=>'one','2'=>'two','3'=>'three','4'=>'four','5'=>'five','6'=>'six','7'=>'seven');

        if($completed_steps < 7){
            Auth::guard('business_user')->logout();
            return redirect('/business_user/register_'.$arr[$redirect_to_step].'/'.$business_user_id);
        }else{
            return view('/business/business_dashboard');
        }
    }

    /****************
    fn to show business user verify form
    ****************/
    public function showVerifyForm(){
        return view('business.verify_user');
    }

    /******************************
    fn to save verify business user data
    *******************************/
    public function verifyUser(request $request){

        $business_user_id = Auth::user()->business_userid;
        $b_id = Auth::user()->id;
        $saved = false;
        $uploaded_files = YpVerificationBusinessUsers::select('uploaded_files')->where('business_user_id', '=',  $business_user_id)->get()->toArray();
        $YpVerificationBusinessUsers = YpVerificationBusinessUsers::where('business_user_id', '=',  $business_user_id)->first();
        if(!empty($YpVerificationBusinessUsers)){
            $YpVerificationBusinessUsers = $YpVerificationBusinessUsers;
        }else{
            $YpVerificationBusinessUsers = new YpVerificationBusinessUsers;
        }
        
        $YpVerificationBusinessUsers->business_user_id = $business_user_id;
        $YpVerificationBusinessUsers->b_id = $b_id;
        $YpVerificationBusinessUsers->save();

        /****check selected files from button****/
        if ($request->hasFile('myfile')) {
            foreach($request->file('myfile') as $files){
                $file = $files;             
                $extension = $file->getClientOriginalExtension(); // getting image extension            
                $filename = rand(10,100).time().'.'.$extension;
                
                if($file->move(public_path().'/images/verify_certificate/'.$business_user_id.'/', $filename)){                
                   
                    if(!empty($uploaded_files[0]['uploaded_files'])){
                        $pic_vid_arr = json_decode($uploaded_files[0]['uploaded_files']);
                        $pic_vid_arr->pic[] = $filename;
                        
                    }else{
                        $pic_vid_arr['pic'][] = $filename;
                    }
                    
                    $pic_vid_json = json_encode($pic_vid_arr);
                    $YpVerificationBusinessUsers->uploaded_files = $pic_vid_json;
                    if($YpVerificationBusinessUsers->save()){
                        $saved = true;
                    }
                }
            }
            
        }

        /*******check drag and drop files********/
        if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
            foreach ($_POST['dropzone_file'] as $filenames) {
                if(!empty($uploaded_files[0]['uploaded_files'])){
                    $pic_vid_arr = json_decode($uploaded_files[0]['uploaded_files']);
                    $pic_vid_arr->pic[] = $filenames;
                }else{
                    $pic_vid_arr['pic'][] = $filenames;
                }
                
                $pic_vid_json = json_encode($pic_vid_arr);
                
                $YpVerificationBusinessUsers->uploaded_files = $pic_vid_json;
                if($YpVerificationBusinessUsers->save()){
                    $saved = true;
                }
            }
        }

        /*****check value of business id input field****/
        if(isset($_POST['businessid']) && !empty($_POST['businessid'])){
            $YpVerificationBusinessUsers->business_id = $_POST['businessid'];
            $YpVerificationBusinessUsers->admin_verified_status = '1';
            if($YpVerificationBusinessUsers->save()){
                $saved = true;
            }
        }

        /*****After save data redirect to same page*****/
        Session::flash('message', 'Data is Submitted Successfully!'); 
        Session::flash('alert-class', 'alert-success1'); 
        Session::flash('alert-type', 'business_verify'); 

        return redirect()->intended('business_user/verify');
 
    }

    /*******
    function to upload multiple files for verify user
    *******/
    public function uploadUserMultipleFiles(Request $request){
        $id = Auth::user()->business_userid;
        if ($request->hasFile('file')) {
            $file = $request->file('file');             
            $extension = $file->getClientOriginalExtension(); // getting image extension  
            $originalName = $file->getClientOriginalName();
            $name=explode('.',$originalName)[0];
            $filename = $name.'_'.rand().'.'.$extension;
            if($file->move(public_path().'/images/verify_certificate/'.$id.'/', $filename)){
                echo $filename;
            }else{
                echo 'false';
            }
        }
    }

    /*******
    function to upload multiple files for profile setting
    *******/
    public function uploadUserMultipleFilesProfile(Request $request){
        $id = Auth::user()->business_userid;
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

    

    /*********
    Fn to remove/delete drag images
    ***********/
    public function removeImages(){
        $id = Auth::user()->business_userid;
        if(isset($_POST['id'])){
            $filename = $_POST['id'];
            $image_path = public_path().'/images/verify_certificate/'.$id.'/'.$filename;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
                echo "yes";die;
            }else{
                echo "no";die;
            }
        }/****end of isset****/
    } /****fn remove image ends here***/

    /******
    fn to show peofile setting page
    ******/
    public function showProfileSeting(){
        $business_userid = Auth::user()->business_userid;

        $user_details = YpBusinessUsers::with(['bu_details','hash_tags','hash_tags.bus_hashtags','bu_cat','bu_cat.buser_cat','bu_cat.buser_sub_cat'])->where('business_userid',$business_userid)->first()->toArray();
        
        //$userCategoryModel = new YpBusinessUserCategories();
        
        $all_categories = YpBusinessCategories::with('sub_category')->where('category_status',1)->whereHas('sub_category', function($q) {$q->where('sub_category_status',1);})->get(); 
        $business_categories = $this->get_user_allcategories($business_userid); 

        $hashtags = Yphashtag::where('hashtag_status','1')->get()->toArray();

        return view('business.profile_setting')->with(array('user_details'=>$user_details,'categories'=>$all_categories,'business_categories'=>$business_categories,'hashtags'=>$hashtags));
        
    }

    /*************
    fn to submit profile settings
    ***************/
    public function profileSettingSubmit(Request $request){

        $id = Auth::user()->business_userid;

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
                'url' => ['string', 'max:255'],
                'fb_url' => ['string', 'max:255'],
               // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            ],$messages);
        }
        

        if($validator->fails()) {
           
            return redirect()->route('business_user.profile_setting')->withInput()->withErrors($validator);
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

            /******check for business details table data******/
            $business_id = Auth::user()->id;
            $check_bu_details = YpBusinessDetails::where('b_id',$business_id)->get()->toArray();

            $distance_all = 0;
            $distance_kms = 0;
            if(isset($_POST['country']) && $_POST['country'] == 'all'){
                $distance_all = 1;
            }else{
                $distance_kms = $_POST['radius'];
            }

            if(isset($_POST['descripton']) && !empty($_POST['descripton'])){
                $descriptn = $_POST['descripton'];
            }else{
                $descriptn = '';
            }
            if(isset($_POST['send_question'])){
                $send_question = 1;
            }else{
                $send_question = 0;
            }
            if(isset($_POST['send_schedule'])){
                $send_schedule = 1;
            }else{
                $send_schedule = 0;
            }


            /******seven step****/
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

            $json = json_encode($arr);

            /*****check if data exists******/
            if(!empty($check_bu_details)){
            
                $update = array(
                    'website_url'       => $_POST['url'],
                    'facebook_url'      => $_POST['fb_url'],
                    'distance_all'      => $distance_all,
                    'distance_kms'      => $distance_kms,
                    'business_profile'  => $descriptn,
                    'send_question'     => $send_question,
                    'send_schedule'     => $send_schedule,
                    'schedule'          => $json
                );
                YpBusinessDetails::where('b_id',$business_id)->update($update);
            }else{/*****else create****/
                YpBusinessDetails::create([
                    'b_id'              => $business_id,
                    'business_userid'   => $id,
                    'website_url'       => $_POST['url'],
                    'facebook_url'      => $_POST['fb_url'],
                    'distance_all'      => $distance_all,
                    'distance_kms'      => $distance_kms,
                    'business_profile'  => $descriptn,
                    'send_question'     => $send_question,
                    'send_schedule'     => $send_schedule,
                    'schedule'          => $json
                ]);

            }/*****else ends here***/

            /*******save images starts*******/

            
            $YpBusinessDetails = YpBusinessDetails::where('business_userid', '=',  $id)->first();

            /****check selected files from button****/
            if ($request->hasFile('myfile')) {
                foreach($request->file('myfile') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/profile/'.$id.'/', $filename)){                
                        $pic_vid = YpBusinessDetails::select('pic_vid')->where('business_userid', '=',  $id)->get()->toArray();                       
                        if(!empty($pic_vid[0]['pic_vid'])){
                            $pic_vid_arr = json_decode($pic_vid[0]['pic_vid']);
                            $pic_vid_arr->pic[] = $filename;
                            
                        }else{
                            $pic_vid_arr['pic'][] = $filename;
                        }
                        
                        $pic_vid_json = json_encode($pic_vid_arr);
                        $YpBusinessDetails->pic_vid = $pic_vid_json;
                        $YpBusinessDetails->save();
                    }
                }/***end foreach***/
                
            }
           
            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                
                foreach ($_POST['dropzone_file'] as $filenames) {
                    $pic_vid = YpBusinessDetails::select('pic_vid')->where('business_userid', '=',  $id)->get()->toArray();
                    if(!empty($pic_vid[0]['pic_vid'])){
                        $pic_vid_arr = json_decode($pic_vid[0]['pic_vid']);
                        $pic_vid_arr->pic[] = $filenames;
                    }else{
                        $pic_vid_arr['pic'][] = $filenames;
                    }
                    
                    $pic_vid_json = json_encode($pic_vid_arr);
                    
                    $YpBusinessDetails->pic_vid = $pic_vid_json;
                    $YpBusinessDetails->save();
                }
            }
            /*******save images ends*******/

            /********hash tags*******/
            $getHashtags = Yphashtag::get()->toArray();
            $YpUserHashtags = YpBusinessUserHashtags::where('business_userid', '=',  $business_id)->get()->toArray();
            if(!isset($_POST['hashtag'])){
                $_POST['hashtag'] = array();
            }
            //echo '<pre>'; print_r($_POST['hashtag']); echo '</pre>';die;        
            //echo '<pre>'; print_r($YpUserHashtags); echo '</pre>'; 

            if(!empty($_POST['hashtag'])){
                YpBusinessUserHashtags::where(['business_userid' => $business_id])->delete();
                foreach($_POST['hashtag'] as $tag){
                    $YpUsertags = YpBusinessUserHashtags::where(['business_userid' => $business_id ,'tag_id'=>$tag])->get()->toArray();
                    if(empty($YpUsertags)){
                        YpBusinessUserHashtags::create([
                            'business_userid' => $business_id,
                            'tag_id' => $tag
                        ]);
                    }
                }
            }       
           /* if(!empty($YpUserHashtags)){
                foreach($getHashtags AS $hashtag){
                    $getTagId = $hashtag['id'];
                    if(in_array($getTagId, $_POST['hashtag'])){
                        YpBusinessUserHashtags::create([
                            'business_userid' => $business_id,
                            'tag_id' => $getTagId
                        ]);
                    }else{
                        echo $getTagId;
                        YpBusinessUserHashtags::where(['business_userid' => $business_id, 'tag_id' => $getTagId])->delete();
                    }
                }
             }else{
                foreach($_POST['hashtag'] AS $hashtag){
                    $getTagId = $hashtag;
                    YpBusinessUserHashtags::create([
                        'business_userid' => $business_id,
                        'tag_id' => $getTagId
                    ]);
                }
             }*/
            /********hash tagsends*******/



        }/****not empty $id****/
        Session::flash('message', 'Your Profile is Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success1'); 
        Session::flash('alert-type', 'profile_setting'); 
        return redirect()->route('business_user.profile_setting');

    }/*****end of profiel setting submit funciton*****/

    /*****************
    fn for geocode in full address field
    *****************/
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
    }/*****geo code fn ends here******/

    public function get_user_allcategories($user_id)
    { 

        $id = Auth::user()->id;
        // $cat_data = YpBusinessUserCategories::with(['buser_cat','buser_sub_cat'])->where('business_userid',$id)->get()->toArray();
        // if(!empty($cat_data)){
        //     $result = $cat_data;
        // }else{
        //     $result = '';
        // }
        // return $result;


        $business_category_ids = DB::table('yp_business_user_categories AS y_b_u_c')->where('y_b_u_c.business_userid',$id)
                ->leftjoin('yp_business_categories AS y_b_c', 'y_b_u_c.category_id', '=', 'y_b_c.id')
                ->distinct()
                ->select('y_b_u_c.category_id','y_b_c.category_name','y_b_c.category_id as cat_id')
                ->get()->toArray(); 

        
        $i = 0;
        if(!empty($business_category_ids)){
            foreach($business_category_ids as $value){
                $category_id = $value->category_id;
                $parent_category_name = $value->category_name;
                $cat_id = $value->cat_id;
                $result[$i]['id'] = $category_id;
                $result[$i]['cat_id'] = $cat_id;
                $result[$i]['name'] = $parent_category_name;
                $result[$i]['values'] = DB::table('yp_business_user_categories AS y_b_u_c')->where('y_b_u_c.category_id',$category_id)
                ->join('yp_business_sub_categories AS y_b_s_c', 'y_b_u_c.sub_category_id', '=', 'y_b_s_c.id')          
                ->select('y_b_u_c.sub_category_id','y_b_s_c.sub_category_name','y_b_s_c.sub_category_id as sub_cat_id')
                ->get()->toArray();         
                $i++;
            }

        }else{
            $result = '';
        }
        return $result;
    }

    /*********************
    fn to save selected categories by business user
    **********************/
    public function addBusinessUserCategory(Request $request){
        $input = $request->all();
        $user_id = Auth::user()->id;
        
        $category_id = $input['category_id'];
        $category_increamentid = YpBusinessCategories::select('id')->where('category_id',$category_id)->first()->toArray();
        $sub_cat_id = $input['sub_cat_id'];
        $subcategory_increamentid = YpBusinessSubCategories::select('id')->where('sub_category_id',$sub_cat_id)->first()->toArray();

        YpBusinessUserCategories::create([
                'business_userid' => $user_id,
                'category_id' => $category_increamentid['id'],
                'sub_category_id' => $subcategory_increamentid['id'],
            ]);
    }

    /****************************
    fn to delete the selected categories by business user
    ****************************/
    public function removeBusinessUserCategory(Request $request){

        $input = $request->all();  
        $user_id = Auth::user()->id;
        
        $category_id = $input['category_id'];
        $category_increamentid = YpBusinessCategories::select('id')->where('category_id',$category_id)->first()->toArray();
        $sub_cat_id = $input['sub_cat_id'];  
        $subcategory_increamentid = YpBusinessSubCategories::select('id')->where('sub_category_id',$sub_cat_id)->first()->toArray();          
        YpBusinessUserCategories::where(['business_userid' => $user_id, 'sub_category_id' => $subcategory_increamentid['id']])->delete();
        //echo '<pre>';print_r($input); die;
    }

    /**************
    Category search function starts
    ***************/
    public function category_search($id){

        $input_text = $_POST['input_text'];

        if($input_text == ''){
            $all_categories = YpBusinessCategories::with('sub_category')->get();
        }else{
            $all_categories = YpBusinessCategories::with('sub_category')->where('category_name', 'like', '%'.$input_text.'%')->get();
        }
        
        return view('auth.category_search')->with(array('id'=>$id,'categories'=>$all_categories));

    }/*****cat search ends****/

    /****************************
    delete imag on cross-profilesetting
    ************************/
    public function removeProfileImages(){

        $business_user_id = Auth::user()->business_userid;

        if(isset($_POST['img_name'])){
            $filename = $_POST['img_name'];
            $image_path = public_path().'/images/profile/'.$business_user_id.'/'.$filename;  // Value is not URL but directory file path

            $check_img_json = YpBusinessDetails::select('pic_vid')->where('business_userid',$business_user_id)->get()->toArray();
            if(!empty($check_img_json)){
                $img_json = json_decode($check_img_json[0]['pic_vid'],true);
                $new_images = \array_diff($img_json['pic'], [$filename]);

                if(!empty($new_images)){
                    foreach($new_images as $key=>$img){
                        $pic_vid_arr['pic'][] = $img;
                    }
                    
                    $new_json_pics = json_encode($pic_vid_arr);
                    $update = array(
                        'pic_vid'       => $new_json_pics
                    );
                    YpBusinessDetails::where('business_userid',$business_user_id)->update($update);
                }else{
                    $update = array(
                        'pic_vid'       => null
                    );
                    YpBusinessDetails::where('business_userid',$business_user_id)->update($update);
                }
                   
            } /***end if not empty***/ 

            if(File::exists($image_path)) {

                File::delete($image_path);

                return response()->json(['success'=>'1','message'=>'Image deleted successfully']);
            }else{
                return response()->json(['success'=>'0','message'=>'Please try again lator!']);
            }
        }/****end of isset****/

    }/****fn ends here****/
}
