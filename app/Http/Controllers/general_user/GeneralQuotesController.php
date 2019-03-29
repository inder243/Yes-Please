<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessUsersQuotesReply;
use App\Models\YpUserReviews;
use App\Models\YpGeneralUsersQuotes;
use App\Models\YpBusinessUsers;
use App\Models\YpFormQuestions;
use Mail;
use File;
Use Redirect;

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

    /**********
    *****fn to send quotes
    ***********/
    public function sendQuotes(Request $request,$b_id = null){

        $general_userid = Auth::user()->user_id;
        $g_id = Auth::user()->id;

        $YpGeneralUsersQuotes = new YpGeneralUsersQuotes;

        if(isset($_POST)){

            if(isset($_POST['hidden_catid'])){
                $cat_id = $_POST['hidden_catid'];
            }else{
                $cat_id = '';
            }

            if(isset($_POST['hidden_catname'])){
                $cat_name = $_POST['hidden_catname'];
            }else{
                $cat_name = '';
            }


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

            if(isset($_POST['validate'])){
                $mobile_phone = $mobile_phone;
            }else if(isset($_POST['dont_want'])){
                $mobile_phone = '';
            }else{
                $mobile_phone = '';
            }

            $quote_id = str_shuffle(rand(1,1000).strtotime("now"));

            $YpGeneralUsersQuotes->quote_id         = $quote_id;
            $YpGeneralUsersQuotes->general_id       = $g_id;
            $YpGeneralUsersQuotes->work_description = $work_description;
            $YpGeneralUsersQuotes->phone_number     = $mobile_phone;
            $YpGeneralUsersQuotes->cat_id           = $cat_id;
            $YpGeneralUsersQuotes->cat_name         = $cat_name;
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
            return redirect('general_user/public_profile/'.$b_id.'/'.$cat_id.'/status');
        }

    }/***send quote ends here***/

    /***
    *get all quotes and questions
    ***/
    public function showQuoteQuestions($quote_status = null, $quote_keyword = null){
    	$g_id = Auth::id();

        if($quote_status == null && $quote_keyword == null){
            try{
               $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where('general_id',$g_id)->where('status','!=',0)->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }

            if(empty($quotes)){
                $hide_sorting = '1';
            }else{
                $hide_sorting = '0';
            }
        }else if($quote_status != null && $quote_status == 'all'){
            if($quote_keyword !== null){

                try{
                   $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where('general_id',$g_id)->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%'.$quote_keyword.'%');})->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
                }catch(\Exception $e){
                    return $e->getMessage();
                }
            }else{
                try{
                   $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where('general_id',$g_id)->where('status','!=',0)->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
                }catch(\Exception $e){
                    return $e->getMessage();
                }
            }

            $hide_sorting = '0';
        }else if($quote_status !== 'all' && $quote_status !== null){
            if($quote_keyword !== null){
                try{
                   $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where(array('general_id'=>$g_id, 'status'=>$quote_status))->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%' . $quote_keyword . '%');})->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
                }catch(\Exception $e){
                    return $e->getMessage();
                }
            }else{
                try{
                   $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where(array('general_id'=>$g_id, 'status'=>$quote_status))->where('status','!=',0)->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
                }catch(\Exception $e){
                    return $e->getMessage();
                }
            }
            $hide_sorting = '0';
        }else{
            try{
               $quotes = YpBusinessUsersQuotes::with('get_bus_user','get_quotes')->where('general_id',$g_id)->where('status','!=',0)->orderBy('id','desc')->get()->groupBy('quote_id')->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }
            $hide_sorting = '0';
        }
       

        /***ignored status***/
        try{
            $quotes_ignored = YpBusinessUsersQuotes::with('get_bus_user','quote_reply','get_quotes')->where('general_id',$g_id)->where('status','=',5)->orderBy('id','desc')->get()->toArray();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        //echo '<pre>';print_r($quotes); echo '</pre>';die;
    	return view('user.quotes_questions.quotes_questions')->with(['quotes'=>$quotes,'quote_status'=>$quote_status,'quote_keyword'=>$quote_keyword,'quotes_ignored'=>$quotes_ignored,'hide_sorting'=>$hide_sorting]);
    }/*****fn ends here****/

    /****
    **get all replies by business users on any quote
    ****/
    public function quoteReplies($quote_id){

        if(!is_numeric($quote_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();

        if(empty($check_quoteId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;
            $general_id = Auth::user()->user_id;

            try{
               $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();
               $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user'])->where(['quote_id'=>$quote_id])->get()->toArray();

               $getquoteSts = YpBusinessUsersQuotes::where(['quote_id'=>$quote_id,'status'=>4])->first();
               $getquoteStsBusinessUser = YpBusinessUsersQuotes::where(['quote_id'=>$quote_id,'status'=>4])->first();

                if(!empty($getquoteSts))
                {
                    $quoteSts = 4;
                }
                else
                {
                    $quoteSts = 0;
                }

            }catch(\Exception $e){
                return $e->getMessage();
            }

            //return view('user.quotes_questions.quotes_reply')
            return view('user/quotes_questions/quotes_reply')->with(['all_data'=>$get_user_data,'quoteSts'=>$quoteSts,'getquoteStsBusinessUser'=>$getquoteStsBusinessUser,'allquotes'=>$allquotes,'general_id'=>$general_id]);

        }/****else to 404 page ends***/

        

    }/****quotes reply ends here***/

    /***
    *show quote accepted page
    ***/
    public function quoteAccepted($quote_id){

        if(!is_numeric($quote_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();

        if(empty($check_quoteId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;

            try{
                $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();
                $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user','get_reviewss'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                },'quotes'=> function($q) use($g_id,$quote_id) {
                    $q->where(['status'=> '4','general_id'=>$g_id,'quote_id'=>$quote_id]); 
                }])->where(['quote_id'=>$quote_id])->get()->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }

            if(empty($get_user_data)){
            
                return abort(404);

            }
            
            //return view('user.quotes_questions.quotes_reply')
            return view('user/quotes_questions/quotes_accepted')->with(['all_data'=>$get_user_data,'allquotes'=>$allquotes]);

        }/****404 else ends****/
    }

    /***
    *show quote completed page
    ***/
    public function quoteCompleted($quote_id){

        if(!is_numeric($quote_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();

        if(empty($check_quoteId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;

            try{
                $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();
                $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user','get_reviews'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                },'quotes'=> function($q) use($g_id,$quote_id) {
                    $q->where(['status'=> '6','general_id'=>$g_id,'quote_id'=>$quote_id]); 
                }])->where(['quote_id'=>$quote_id])->get()->toArray();
            }catch(\Exception $e){
                return $e->getMessage();
            }
            
            if(empty($get_user_data)){
            
                return abort(404);

            }

            //return view('user.quotes_questions.quotes_reply')
            return view('user/quotes_questions/quotes_completed')->with(['all_data'=>$get_user_data,'allquotes'=>$allquotes]);

        }/*****404 else ends****/
        
    }


    /***
    *show quote request page
    ***/
    public function showQuoteRequest($quote_id,$business_id ){

        if(!is_numeric($quote_id) || !is_numeric($business_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();
        $check_businessId = YpBusinessUsers::where('id',$business_id)->get()->toArray();

        if(empty($check_quoteId) || empty($check_businessId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;
            try{

                $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user','get_reviewss'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                },'quotes'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                }])->where(['quote_id'=>$quote_id,'business_id'=>$business_id])->first()->toArray();

                $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();

                $getquoteSts = YpBusinessUsersQuotes::where(['quote_id'=>$quote_id,'status'=>4])->first();

                if(empty($get_user_data)){
            
                    return abort(404);

                }

                if(!empty($getquoteSts))
                {
                    $quoteSts = 4;
                }
                else
                {
                    $quoteSts = 0;
                }

            }catch(\Exception $e){
                return $e->getMessage();
            }
            
            //return view('user/quotes_questions/quotes_request')->with('get_user_data',$get_user_data);
            return view('user/quotes_questions/quotes_request')->with(['get_user_data'=>$get_user_data,'quoteSts'=>$quoteSts,'allquotes'=>$allquotes]);

        }/*****404 else ends*****/


    }/***show quote request ends***/

    /***
    *show quote request page
    ***/
    public function showQuoteRequestCompleted($quote_id,$business_id ){

        if(!is_numeric($quote_id) || !is_numeric($business_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();
        $check_businessId = YpBusinessUsers::where('id',$business_id)->get()->toArray();

        if(empty($check_quoteId) || empty($check_businessId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;
            try{

                $get_user_data = YpBusinessUsersQuotesReply::with(['get_bus_user','get_reviewss'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                },'quotes'=> function($q) use($g_id,$quote_id) {
                    $q->where(['general_id'=>$g_id,'quote_id'=>$quote_id]); 
                }])->where(['quote_id'=>$quote_id,'business_id'=>$business_id])->first()->toArray();

                if(empty($get_user_data)){
            
                    return abort(404);

                }

                $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();

                $getquoteSts = YpBusinessUsersQuotes::where(['quote_id'=>$quote_id,'status'=>6])->first();

                if(!empty($getquoteSts))
                {
                    $quoteSts = 6;
                }
                else
                {
                    $quoteSts = 0;
                }

            }catch(\Exception $e){
                return $e->getMessage();
            }
            
          // echo "<pre>";print_r($get_user_data);die;
            //return view('user/quotes_questions/quotes_request')->with('get_user_data',$get_user_data);
            return view('user/quotes_questions/quotes_reqcompleted')->with(['get_user_data'=>$get_user_data,'quoteSts'=>$quoteSts,'allquotes'=>$allquotes]);

        }/***404 else ends***/
        

    }/***show quote request ends***/

    /***
    *fn to accept quote by general user
    ***/
    public function quoteRequestAccept(){

        if(isset($_POST)){
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
        }
        
    }/***fn ends here***/

    
    /***
    *fn to accept quote by general user
    ***/
    public function quoteRequestIgnore(){

        if(isset($_POST)){
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
        }
        
    }/***fn ends here***/

    /********************
    show user review page
    **********************/
    public function showUserQuotesReview($quote_id,$business_id){

        if(!is_numeric($quote_id) || !is_numeric($business_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();
        $check_businessId = YpBusinessUsers::where('id',$business_id)->get()->toArray();

        if(empty($check_quoteId) || empty($check_businessId)){
            
            return abort(404);

        }else{

            $g_id = Auth::user()->id;
            $general_userid = Auth::user()->user_id;

            $quote_data = YpBusinessUsersQuotes::with(['get_bus_user','get_quotes'])->where(['general_id'=>$g_id, 'quote_id'=>$quote_id,'business_id'=>$business_id])->first()->toArray();

            if(empty($quote_data)){
            
                return abort(404);

            }


            return view('user.quotes_questions.quotes_review')->with(['quote_data'=>$quote_data,'general_userid'=>$general_userid]);

        }/***404 else ends***/

    }

    /*************************
    fn to submit business reviews
    **************************/
    public function submitUserQuotesReview(){

        if(isset($_POST)){

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

           // return redirect()->intended('general_user/quote_questions');
            return redirect('general_user/quote_questions');

        }

    }/*******fn ends here*******/

}