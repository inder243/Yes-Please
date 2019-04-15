<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsers;
use App\Models\YpGeneralUsersQuestions;
use App\Models\YpBusinessUsersQuestions;
use App\Models\YpBusinessUserCategories;
use Mail;

class GeneralQuestionsController extends Controller
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

    /*****
    ** fn to save ask qustions
    *****/
    public function sendQuestions(Request $request,$b_id = null){

        if(isset($_POST)){

            if(isset($request->question_title)){
                $question_title = $request->question_title;
            }else{
                $question_title = '';
            }

            if(isset($request->question_description)){
                $question_description = $request->question_description;
            }else{
                $question_description = '';
            }

            if(isset($request->hidden_cat_name)){
                $hidden_cat_name = $request->hidden_cat_name;
            }else{
                $hidden_cat_name = '';
            }

            if(isset($request->hidden_cat_id)){
                $hidden_cat_id = $request->hidden_cat_id;
            }else{
                $hidden_cat_id = '';
            }

            if(isset($request->validate_mob_check)){
                if($request->validate_mob_check == 'validate'){
                    if(isset($request->phone_number) && !empty($request->phone_number)){
                        $phone_number = $request->phone_number;
                    }else{
                        $phone_number = '';
                    }
                    
                }else{
                   $phone_number = ''; 
                }
                
            }else{
                $phone_number = '';
            }

            $general_userid = Auth::user()->user_id;
            $g_id = Auth::user()->id;

            $YpGeneralUsersQuestions = new YpGeneralUsersQuestions;

            /***create random question id***/
            $question_id = str_shuffle(rand(1,1000).strtotime("now"));

            $YpGeneralUsersQuestions->question_id      = $question_id;
            $YpGeneralUsersQuestions->general_id       = $g_id;
            $YpGeneralUsersQuestions->q_title          = $question_title;
            $YpGeneralUsersQuestions->q_description    = $question_description;
            $YpGeneralUsersQuestions->cat_id           = $hidden_cat_id;
            $YpGeneralUsersQuestions->cat_name         = $hidden_cat_name;
            $YpGeneralUsersQuestions->phone_number     = $phone_number;
            $YpGeneralUsersQuestions->save();


            /*****upload images******/

            /****check selected files from button****/
            if ($request->hasFile('files')) {
                foreach($request->file('files') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/general_questions/'.$general_userid.'/', $filename)){                
                       
                        $pic_vid_arr['pic'][] = $filename;
                        
                        $pic_vid_json = json_encode($pic_vid_arr);
                        $YpGeneralUsersQuestions->uploaded_files = $pic_vid_json;
                        $YpGeneralUsersQuestions->save();
                    }
                }
                
            }/*********code ends to upload selected files********/

            /*****upload images ends******/


            /*****Check question type and then save accordingly****/
            if(isset($request->question_type) && $request->question_type == 'single'){

                if($b_id != null){

                    if(!is_numeric($b_id)){
                        return response()->json(['success'=>'0','message'=>'No business user found']);
                        exit;
                    }

                    $check_business_exists = YpBusinessUsers::where('id',$b_id)->first();

                    if(!empty($check_business_exists)){

                        /*** save in anothe table***/
                        $YpBusinessUsersQuestions               = new YpBusinessUsersQuestions;
                        $YpBusinessUsersQuestions->business_id  = $b_id;
                        $YpBusinessUsersQuestions->general_id   = $g_id;
                        $YpBusinessUsersQuestions->question_id  = $YpGeneralUsersQuestions->id;
                        $YpBusinessUsersQuestions->status_bus   = 1;
                        $YpBusinessUsersQuestions->save();

                        /*****send email to business users*****/
                        $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id =".$b_id));

                        if(!empty($getEmails) && !empty($getEmails[0])){

                            if(!empty($getEmails[0]->emails)){

                                $emails = explode(',',$getEmails[0]->emails);

                                $send_email_from = $_ENV['send_email_from'];
                                $data ='';

                                Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                                    $message->from($send_email_from, 'Yes Please'); 

                                    $message->to($emails)->subject('Yes Please Question Request');

                                });
                            }
                        }/*****send email ends here*****/

                    }else{
                        return response()->json(['success'=>'0','message'=>'No business user found']);
                        exit;
                    }
                    
                }else{
                    return response()->json(['success'=>'0','message'=>'No business user found']);
                        exit;
                }


            }else if(isset($request->question_type) && $request->question_type == 'multiple'){

                /***check if multiple business selected***/
                if(!empty($request->multipleBusiness)){

                    $businessUserIds = $request->multipleBusiness;
                    $businessUserIdsString = explode(',',$request->multipleBusiness);

                    foreach($businessUserIdsString as $businessUser){

                        $YpBusinessUsersQuestions               = new YpBusinessUsersQuestions;
                        $YpBusinessUsersQuestions->business_id  = $businessUser;
                        $YpBusinessUsersQuestions->general_id   = $g_id;
                        $YpBusinessUsersQuestions->question_id  = $YpGeneralUsersQuestions->id;
                        $YpBusinessUsersQuestions->status_bus       = 1;
                        $YpBusinessUsersQuestions->save();

                    }/** end foreach**/

                    //send email to selected business users
                    $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (".$businessUserIds.")"));

                    if(!empty($getEmails) && !empty($getEmails[0])){

                        if(!empty($getEmails[0]->emails)){
                            //send email
                            $emails = explode(',',$getEmails[0]->emails);
                              
                            $send_email_from = $_ENV['send_email_from'];
                            $data ='';
                            
                            Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                                    $message->from($send_email_from, 'Yes Please'); 

                                    $message->to($emails)->subject('Yes Please Question Request');

                            });/**Mail ends**/
                        }
                    }/** end if $getEmails**/

                }else{

                    //Here :: code to send questions for random 20 business users
        
                    //$get_business_ids = YpBusinessUserCategories::select('business_userid')->where('category_id','=',$request->hidden_cat_id)->orderby()->take(20)->get()->toArray();

                    //  echo "<pre>";print_r($get_business_ids);die;
                   // $businessUserIdss = DB::select(DB::raw("SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_user_categories.business_userid) order by rand() SEPARATOR ','), ',',20) as businessUserIds FROM `yp_business_user_categories` where yp_business_user_categories.category_id=".$request->hidden_cat_id));


                   // $businessUserIdss = DB::select(DB::raw("SELECT yp_business_user_categories.business_userid as businessUserIds,yp_business_users.points FROM `yp_business_user_categories` INNER JOIN  yp_business_users on yp_business_user_categories.business_userid = yp_business_users.id where yp_business_user_categories.category_id=".$request->hidden_cat_id." ORDER BY yp_business_users.points DESC"));

                  
                    $businessUserIdss = DB::select(DB::raw("select GROUP_CONCAT(businesspoints.business_userid) as businessUserIds FROM (SELECT yp_business_user_categories.business_userid ,yp_business_users.points FROM `yp_business_user_categories` INNER JOIN  yp_business_users on yp_business_user_categories.business_userid = yp_business_users.id where yp_business_user_categories.category_id=".$request->hidden_cat_id." ORDER BY yp_business_users.points DESC LIMIT 20 )as businesspoints"));
                    
                    $businessUserId = $businessUserIdss[0]->businessUserIds;

                    $businessUserIdsStrng = explode(',',$businessUserId);

                    if(!empty($businessUserIdsStrng)){

                        foreach($businessUserIdsStrng as $businessUsers){

                            $YpBusinessUsersQuestions               = new YpBusinessUsersQuestions;
                            $YpBusinessUsersQuestions->business_id  = $businessUsers;
                            $YpBusinessUsersQuestions->general_id   = $g_id;
                            $YpBusinessUsersQuestions->question_id  = $YpGeneralUsersQuestions->id;
                            $YpBusinessUsersQuestions->status_bus   = 1;
                            $YpBusinessUsersQuestions->save();

                        }/** end foreach**/

                        //send email to selected business users
                        $getEmailss =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (".$businessUserId.")"));

                        if(!empty($getEmailss) && !empty($getEmailss[0])){

                            if(!empty($getEmailss[0]->emails)){
                                //send email
                                $emails = explode(',',$getEmailss[0]->emails);
                                  
                                $send_email_from = $_ENV['send_email_from'];
                                $data ='';
                                
                                Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                                        $message->from($send_email_from, 'Yes Please'); 

                                        $message->to($emails)->subject('Yes Please Question Request');

                                });/**Mail ends**/
                            }
                        }/** end if $getEmailss**/
                    }else{
                        return response()->json(['success'=>'0','message'=>'Sorry No Business Found For Selected Service.']);
                        exit;
                    }

                    
                }/***else ends***/

            }/***end if for multiple business page***/

            return response()->json(['success'=>'1','message'=>'Question Send Successfully']);
            exit;

        }

    }/****fn ends to ask questions***/

    /*****
    **fn to see question replies
    ****/
    public function questionReplies($question_id = null){

        if(!is_numeric($question_id)){
            return abort(404);
        }

        $allquestions = YpGeneralUsersQuestions::where('id',$question_id)->first();
        if(empty($allquestions)){
            
            return abort(404);

        }else{

            $g_id = Auth::id();

            if($allquestions->status_gen == '1'){

                /***update status to read ***/
                YpGeneralUsersQuestions::where(array('id'=>$question_id))->update(['status_gen'=>2]);
            }

            $question_data = YpBusinessUsersQuestions::with('get_gen_user','get_bus_user','get_ques')->where(['general_id'=>$g_id,'question_id'=>$question_id])->where('status_bus','!=',0)->where('status_bus','=','3')->where('business_answer','!=','')->get()->toArray();


            /*********code to get similar questions********/
            $question = $allquestions->q_title;
    
            $exclude_values = array('what','is','the','how','hence','while','do','does','where','when','did','about','there','their','these','this','that','get','to','is','am','the','a','an','of','from','could','would','need','all','any','i','just',' ','had','?','those','for');

            $array_question = explode(' ',$question);

            $result = array_diff($array_question,$exclude_values);
        
            $related_ques = YpGeneralUsersQuestions::with('avgAnswer');
            foreach($result as $key=>$value){
                $related_ques->orWhere('q_title', 'like', '%' . $value . '%');
            }
            $related_ques = $related_ques->distinct()->get()->toArray();

            /***code to unset the same question which is opened now***/
            $key = array_search($question_id, array_column($related_ques, 'id'));
            if ($key !== false) {
                unset($related_ques[$key]);
            }
            //echo "<pre>";print_r($related_ques);die;
            /*******end code to get similar questions******/

            return view('user.quotes_questions.question_reply')->with(['g_id'=>$g_id,'allquestions'=>$allquestions,'all_data'=>$question_data,'related_question'=>$related_ques,'question_id'=>$question_id]);
        }
        
    }/***question reply fn ends here***/

    /***
    **Mark as answered fn
    ***/
    public function markAnswered(Request $request){

        $business_id    = $request->business_id;
        $question_id    = $request->question_id;
        $g_id           = Auth::id();

        YpGeneralUsersQuestions::where(array('id'=>$question_id))->update(['status_gen'=>3]);

        YpBusinessUsersQuestions::where(array('question_id'=>$question_id,'general_id'=>$g_id))->update(['mark_answered'=>0]);

        $mark_answered = YpBusinessUsersQuestions::where(array('business_id'=>$business_id,'question_id'=>$question_id,'general_id'=>$g_id))->update(['mark_answered'=>1]);

        if($mark_answered == 1){
            return response()->json(['success'=>'1','message'=>'Marked as Answered']);
        }else{
            return response()->json(['success'=>'0','message'=>'Please try again!']);
        }

    }/**mark answered fn ends here**/


}