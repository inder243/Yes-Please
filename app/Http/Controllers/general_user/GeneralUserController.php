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
        $categories = YpBusinessCategories::all()->take(7)->toArray();
        $super_categories = DB::table('yp_business_super_categories')
            ->join('yp_business_categories', 'yp_business_super_categories.super_cat_id', '=', 'yp_business_categories.super_cat_id')
            ->select('yp_business_super_categories.*')
            ->distinct('yp_business_categories.super_cat_id')
            ->take(7)
            ->get()->toArray();

         //echo '<pre>';print_r($super_categories); echo '</pre>';
         foreach($super_categories AS $super_cat){
            $arr['id'] = $super_cat->id;
            $arr['super_cat_id'] = $super_cat->super_cat_id;
            $arr['cat_name'] = $super_cat->cat_name;
            $arr['category_status'] = $super_cat->category_status;
            $arr['created_at'] = $super_cat->created_at;
            $arr['updated_at'] = $super_cat->updated_at;
            $final[] = $arr;
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
