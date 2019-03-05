<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessUsersQuotesReply;
use App\Models\YpUserReviews;

class GeneralQuotesController extends Controller
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

    /***
    *get all quotes and questions
    ***/
    public function showQuoteQuestions($quote_status = null){

    	$g_id = Auth::id();
        
        if($quote_status !== null){
            try{
                $quotes = YpBusinessUsersQuotes::with('get_bus_user')->where(array('general_id'=>$g_id, 'status'=>$quote_status))->where('status','!=',0)->orderBy("id",'desc')->get()->groupBy('quote_id')->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }else{
            try{
                $quotes = YpBusinessUsersQuotes::with('get_bus_user')->where('general_id',$g_id)->where('status','!=',0)->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }

        /***ignored status***/
        try{
            $quotes_ignored = YpBusinessUsersQuotes::with('get_bus_user','quote_reply')->where('general_id',$g_id)->where('status','=',5)->orderBy('id','desc')->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
       
    	return view('user.quotes_questions.quotes_questions')->with(['quotes'=>$quotes,'quote_status'=>$quote_status,'quotes_ignored'=>$quotes_ignored]);
    }/*****fn ends here****/

    /****
    **get all replies by business users on any quote
    ****/
    public function quoteReplies($quote_id){
    	$g_id = Auth::user()->id;

        try{
    	   $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user'])->where(['quote_id'=>$quote_id])->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }

    	//return view('user.quotes_questions.quotes_reply')
    	return view('user/quotes_questions/quotes_reply')->with('all_data',$get_user_data);

    }/****quotes reply ends here***/

    /***
    *show quote accepted page
    ***/
    public function quoteAccepted($quote_id){
        $g_id = Auth::user()->id;

        try{
           $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user','get_reviews'=> function($q) use($g_id,$quote_id) {
                $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
            },'quotes'=> function($q) use($g_id,$quote_id) {
                $q->where(['status'=> '4','general_id'=>$g_id,'quote_id'=>$quote_id]); 
            }])->where(['quote_id'=>$quote_id])->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        //return view('user.quotes_questions.quotes_reply')
        return view('user/quotes_questions/quotes_accepted')->with('all_data',$get_user_data);
    }

    /***
    *show quote request page
    ***/
    public function showQuoteRequest($quote_id,$business_id ){

        try{
            $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user'])->where(['quote_id'=>$quote_id,'business_id'=>$business_id])->first()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        return view('user/quotes_questions/quotes_request')->with('get_user_data',$get_user_data);

    }/***show quote request ends***/

    /***
    *fn to accept quote by general user
    ***/
    public function quoteRequestAccept(){
        $g_id = Auth::user()->id;
        
        try{
        $check_data = YpBusinessUsersQuotes::where(['business_id'=>$_POST['business_id'],'quote_id'=>$_POST['quote_id'],'general_id'=>$g_id])->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }

        if(!empty($check_data)){
            $update = YpBusinessUsersQuotes::where(['business_id'=>$_POST['business_id'],'quote_id'=>$_POST['quote_id'],'general_id'=>$g_id])->update(['status'=>4]);

            if($update){
                return response()->json(['success'=>'1','message'=>'Quote Accepted successfully']);
            }else{
                return response()->json(['success'=>'0','message'=>'Please try again !']);
            }
        }else{
            return response()->json(['success'=>'0','message'=>'Please try again !']);
        }
    }/***fn ends here***/

    
    /***
    *fn to accept quote by general user
    ***/
    public function quoteRequestIgnore(){
        $g_id = Auth::user()->id;
        
        try{
        $check_data = YpBusinessUsersQuotes::where(['business_id'=>$_POST['business_id'],'quote_id'=>$_POST['quote_id'],'general_id'=>$g_id])->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }

        if(!empty($check_data)){
            $update = YpBusinessUsersQuotes::where(['business_id'=>$_POST['business_id'],'quote_id'=>$_POST['quote_id'],'general_id'=>$g_id])->update(['status'=>5]);

            if($update){
                return response()->json(['success'=>'1','message'=>'Quote Ignored successfully']);
            }else{
                return response()->json(['success'=>'0','message'=>'Please try again !']);
            }
        }else{
            return response()->json(['success'=>'0','message'=>'Please try again !']);
        }
    }/***fn ends here***/

    /********************
    show user review page
    **********************/
    public function showUserQuotesReview($quote_id){
        $g_id = Auth::user()->id;
        $general_userid = Auth::user()->user_id;

        $quote_data = YpBusinessUsersQuotes::with(['get_bus_user'])->where(['general_id'=>$g_id, 'quote_id'=>$quote_id,'status'=>4])->get()->toArray();

        return view('user.quotes_questions.quotes_review')->with(['quote_data'=>$quote_data,'general_userid'=>$general_userid]);
    }

    /*************************
    fn to submit business reviews
    **************************/
    public function submitUserQuotesReview(){

        $quoteReview = YpUserReviews::where(['business_id'=> $_POST['review_bus_id'],'quote_id'=>$_POST['review_quote_id'],'general_id'=>$_POST['review_gen_id'],'user_type'=>'general'])->first();

        if(!empty($quoteReview)){
            $quoteReview = $quoteReview;
        }else{
            $quoteReview = new YpUserReviews;
        }

        if(isset($_POST['gen_star_active']) && !empty($_POST['gen_star_active'])){
            $star_active = $_POST['gen_star_active'];
        }else{
            $star_active = '0';
        }
        $quoteReview->business_id    = $_POST['review_bus_id'];
        $quoteReview->quote_id       = $_POST['review_quote_id'];
        $quoteReview->general_id     = $_POST['review_gen_id'];
        $quoteReview->review         = $_POST['review_text'];
        $quoteReview->rating         = $star_active;
        $quoteReview->user_type      = $_POST['review_type'];
        $quoteReview->save();

        return redirect()->intended('general_user/quote_questions');

    }/*******fn ends here*******/

}