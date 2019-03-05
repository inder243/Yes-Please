<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsers;
use App\Models\YpFormQuestions;
use App\Models\YpBusinessUserCategories;
use App\Models\YpUserReviews;
use App\Models\YpGeneralUsersQuotes;
use File;
Use Redirect;

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

    /****
    **fn to dashboard
    ****/
    public function dashboard()
    {
        $general_user_id   = Auth::user()->user_id;
        
        return view('/dashboard');

    }/**dahsboard fn ends**/

    public function index(Request $request)
    {
echo "here";die;
        if($request->ajax()){

            if(isset($_GET)){

                try{

                    $data = array();
                    //get category id
                    $categoryId = $request->catid;
                    echo $categoryId;die;
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
                echo $categoryId;die;
                //get first question of form for given category
                $getFirstQuestion = YpFormQuestions::where(array('cat_id'=>$categoryId))->first();
                $data = $getFirstQuestion;

                /******get business list of selected categories******/
                $get_business_by_cat = YpBusinessUserCategories::with(['get_business_user','get_business_details','get_category'])->where('category_id',$categoryId)->get()->toArray();

                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'data'=>$data,'all_business'=>$get_business_by_cat,'success'=>1));
                
            }catch(Exception $e){
                echo $categoryId."catch";die;
                $errorMsg =  $e->getMessage();
                return view('/user/user_dashboard')->with(array('categoryId'=>$categoryId,'data'=>$data,'all_business'=>$get_business_by_cat,'success'=>0,'error'=>$errorMsg));
               
            }/****catch ends here****/
        }
        
    }/*****function ends here*****/

    /****************
    fn to get list of business users on dashboard/category page
    ******************/ 
    public function getlist_business(){
        
        $latitude = Auth::user()->latitude;
        $longitude = Auth::user()->longitude;
   
        $results = DB::select(DB::raw('SELECT user.business_name,user.business_userid,user.logitude,user.latitude,detail.distance_kms as BUkms, ( 6371 * acos( cos( radians('.$latitude.') ) * cos( radians( user.latitude ) ) * cos( radians( user.logitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin(radians(user.latitude)) ) ) AS distance FROM yp_business_users as user INNER JOIN yp_business_details as detail ON user.business_userid = detail.business_userid HAVING distance <= '.$_POST['option'].' ORDER BY distance') );
        //  WHERE kms <= distance
        echo "<pre>";print_r($results);die;        
        

    }/****getlist fn ends here****/

    /******
    fn to show public profile page
    ******/
    public function showPublicProfile($b_id){

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
            $get_reviews = YpUserReviews::where('business_id',$b_id)->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        if(!empty($get_reviews)){
            $sum = 0;
            $index = 0;
            foreach($get_reviews as $key=>$review){
                $sum+= $review['rating'];
                $index++;
            }/***end foreach***/
            
            /*****get the average rating of user*****/
            $avg_rating = $sum/$index;
            $round_rating = round($avg_rating);
        }else{
            $round_rating = 0;
            $index = 0;
        }
        
        //$userCategoryModel = new YpBusinessUserCategories();
        
        return view('user.public_profile')->with(array('user_details'=>$user_details,'round_rating'=>$round_rating,'total_review'=>$index));
        
    }/***show profile page ends here***/

    /*******
    function to upload multiple files for profile setting
    *******/
    public function uploadUserMultipleFilesQuotes(Request $request){
        $id = Auth::user()->user_id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');             
            $extension = $file->getClientOriginalExtension(); // getting image extension  
            $originalName = $file->getClientOriginalName();
            $name=explode('.',$originalName)[0];
            $filename = $name.'_'.rand().'.'.$extension;
            if($file->move(public_path().'/images/general_quotes/'.$id.'/', $filename)){
                echo $filename;
            }else{
                echo 'false';
            }
        }
    }

    /*************************
    Fn to remove/delete drag images for verify users page
    ****************************/
    public function removeImagesQuotes(){
        $id = Auth::user()->user_id;
        if(isset($_POST['id'])){
            $filename = $_POST['id']; 
            $image_path = public_path().'/images/general_quotes/'.$id.'/'.$filename;  

            if(File::exists($image_path)) {
                File::delete($image_path);
                echo "yes";die;
            }else{
                echo "no";die;
            }
        }/****end of isset****/
    } /****fn remove image ends here***/

    /**********
    *****fn to send quotes
    ***********/
    public function sendQuotes(Request $request){

        $general_userid = Auth::user()->user_id;
        $g_id = Auth::user()->id;

        $YpGeneralUsersQuotes = new YpGeneralUsersQuotes;

        if(isset($_POST)){

            if(isset($_POST['work_description_text'])){
                $work_description = $_POST['work_description_text'];
            }else{
                $work_description = '';
            }


            if(isset($_POST['mobile_phone'])){
                $mobile_phone = $_POST['mobile_phone'];
            }else{
                $mobile_phone = '';
            }
            $quote_id = str_shuffle(rand(1,1000).strtotime("now"));

            $YpGeneralUsersQuotes->quote_id = $quote_id;
            $YpGeneralUsersQuotes->general_id = $g_id;
            $YpGeneralUsersQuotes->work_description = $work_description;
            $YpGeneralUsersQuotes->phone_number = $mobile_phone;
            $YpGeneralUsersQuotes->save();

            /****check selected files from button****/
            if ($request->hasFile('myfile')) {
                foreach($request->file('myfile') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/general_quotes/'.$general_userid.'/', $filename)){                
                       
                        $pic_vid_arr['pic'][] = $filename;
                        
                        $pic_vid_json = json_encode($pic_vid_arr);
                        $YpGeneralUsersQuotes->uploaded_files = $pic_vid_json;
                        $YpGeneralUsersQuotes->save();
                    }
                }
                
            }/*********code ends to upload selected files********/

            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                foreach ($_POST['dropzone_file'] as $filenames) {
                   
                    $pic_vid_arr['pic'][] = $filenames;
                    
                    $pic_vid_json = json_encode($pic_vid_arr);
                    
                    $YpGeneralUsersQuotes->uploaded_files = $pic_vid_json;
                    $YpGeneralUsersQuotes->save();
                }
            }/*****drag and drop ends*****/
            return Redirect::back();
        }

    }/***send quote ends here***/

    /***
    ** fn to check user login or not
    ***/
    public function checkLogin(Request $request){
        if(\Auth::check()){
            return response()->json(['success'=>1,'message'=>'login'],200);
        }else{
            return response()->json(['success'=>0,'message'=>'logout'],200);
        }
    }/***fn ends here***/

    public function getdata(Request $request)
    {
        try{
            return response()->json(['success'=>1,'message'=>'done'],200);
        }
        catch(Exception $e)
        {
            return response()->json(['success'=>1,'message'=>'done'],200);
        }
        
        
    }

}
