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
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSuperCategories;
use Mail;
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
      $super_categories = YpBusinessSuperCategories::all()->take(7)->toArray();
      foreach($super_categories AS $super_cat){
        $super_cat_id = $super_cat['super_cat_id'];
        $YpBusinessCategories = YpBusinessCategories::where('super_cat_id',$super_cat_id)->get()->toArray();
        if(!empty($YpBusinessCategories)){
          $final[] = $super_cat;
        }
        //echo '<pre>';print_r($YpBusinessCategories); echo '</pre>';
      }
      return view('dashboard')->with(array('categories'=>$final));

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
    public function sendQuotes(Request $request,$b_id = null){

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

            $YpBusinessUsersQuotes = new YpBusinessUsersQuotes;
            $YpBusinessUsersQuotes->business_id = $b_id;
            $YpBusinessUsersQuotes->general_id = $g_id;
            $YpBusinessUsersQuotes->quote_id = $YpGeneralUsersQuotes->id;
            $YpBusinessUsersQuotes->status = 1;
            $YpBusinessUsersQuotes->save();


            $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id =".$b_id));

            if(!empty($getEmails) && !empty($getEmails[0])){

                if(!empty($getEmails[0]->emails)){

                    $emails = explode(',',$getEmails[0]->emails);

                    $send_email_from = $_ENV['send_email_from'];
                    $data ='';

                    Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                        $message->from($send_email_from, 'Yes Please'); 

                        $message->to($emails)->subject('Yes Please Quote Request');

                    });
                }
            }

           // return Redirect::back();
           // return redirect()->intended('general_user/public_profile/'.$b_id.'/status');
            return redirect('general_user/public_profile/'.$b_id.'/status');
        }

    }/***send quote ends here***/


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
