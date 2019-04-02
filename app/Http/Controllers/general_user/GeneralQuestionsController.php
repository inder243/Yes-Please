<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsers;
use App\Models\YpGeneralUsersQuestions;
use App\Models\YpBusinessUsersQuestions;
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
                        $YpBusinessUsersQuestions->status       = 1;
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
                        }
                        /*****send email ends here*****/
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
                        $YpBusinessUsersQuestions->status       = 1;
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

                            });/**mail ends**/
                        }
                    }/** end if $getEmails**/

                }else{

                    //Here :: code to send questions for random 20 business users

                }

            }/***end if for multiple business page***/

            return response()->json(['success'=>'1','message'=>'Question Send Successfully']);
            exit;

        }

    }/****fn ends to ask questions***/

}