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
            
            if($b_id != null){

                if(!is_numeric($b_id)){
                    return response()->json(['success'=>'0','message'=>'No business user found']);
                    exit;
                }

                $check_business_exists = YpBusinessUsers::where('id',$b_id)->first();

                if(!empty($check_business_exists)){

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
                    $YpGeneralUsersQuestions->save();


                    /*** save in anothe table***/
                    $YpBusinessUsersQuestions                   = new YpBusinessUsersQuestions;
                    $YpBusinessUsersQuestions->business_id      = $b_id;
                    $YpBusinessUsersQuestions->general_id       = $g_id;
                    $YpBusinessUsersQuestions->question_id      = $YpGeneralUsersQuestions->id;
                    $YpBusinessUsersQuestions->status           = 1;
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

                                $message->to($emails)->subject('Yes Please Quote Request');

                            });
                        }
                    }
                    /*****send email ends here*****/

                    return response()->json(['success'=>'1','message'=>'Question Send Successfully']);
                    exit;


                }else{ /**if no bu found in db**/
                    return response()->json(['success'=>'0','message'=>'No business user found']);
                    exit;
                }

            }else{ /***business id null***/
                return response()->json(['success'=>'0','message'=>'No business user found']);
                exit;
            }

            
        }

    }/****fn ends to ask questions***/

}