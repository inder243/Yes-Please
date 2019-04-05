<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpBusinessUsersQuestions;
use App\Models\YpUserReviews;
use App\Models\YpBusinessUserQuoteTemplates;
use App\Models\YpGeneralUsersQuestions;
use File;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class BusinessQuestionsController extends Controller
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


    /********************
    Show quote request page
    **********************/
    public function showQuestionDetail(Request $request,$question_id = null){

        if(!is_numeric($question_id)){
            return abort(404);
        }
        $check_questionId = YpGeneralUsersQuestions::where('id',$question_id)->get()->toArray();
        if(empty($check_questionId)){
            
            return abort(404);

        }else{
            $b_id = Auth::id();
            $allquestions = YpGeneralUsersQuestions::where('id',$question_id)->first();
            
            $check_status = YpBusinessUsersQuestions::where(array('business_id'=>$b_id, 'question_id'=>$question_id))->first();
            
            if($check_status->status_bus == '1'){

                /***update status to read ***/
                YpBusinessUsersQuestions::where(array('business_id'=>$b_id, 'question_id'=>$question_id))->update(['status_bus'=>2]);
            }
            
            $question_data = YpBusinessUsersQuestions::with('get_gen_user')->where(['business_id'=>$b_id,'question_id'=>$question_id])->where('status_bus','!=',0)->first();

            return view('business.quotes_questions.question_detail')->with(['question_id'=>$question_id,'question_data'=>$question_data,'allquestions'=>$allquestions]);
        }/****404 else ends***/

        
    }/*****end of show quote request fn******/

    /****
    **fn to submit question answer
    *****/
    public function questionAnswerSubmit(Request $request){

        $question_id = $request->question_id;
        $business_id = $request->business_id;
        $ques_answer = $request->get_answer;

        if($ques_answer != ''){
            $update_status = YpBusinessUsersQuestions::where(['question_id'=>$question_id,'business_id'=>$business_id])->update(['status'=>3,'business_answer'=>$ques_answer]);

            if($update_status == '1'){
                return response()->json(['success'=>'1','message'=>'Answer Sent','url'=>'business_user/quotes_questions?tab=ques']);
            }else{
                return response()->json(['success'=>'0','message'=>'Error Occured!']);
            }
        }else{
            return response()->json(['success'=>'0','message'=>'Please add text!']);
        }
        

    }/***questin answer ends here***/

}