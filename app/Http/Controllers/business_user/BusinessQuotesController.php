<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessUsersQuotesReply;
use App\Models\YpUserReviews;
use App\Models\YpBusinessUserQuoteTemplates;
use App\Models\YpGeneralUsersQuotes;
use File;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class BusinessQuotesController extends Controller
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


    /*********************************
	Display quotes and questions pages
    *********************************/
    public function showQuotesQuestions(Request $request){
        $b_id = Auth::id();

        $month = isset($request->month)?$request->month:'';
        $type = isset($request->type)?$request->type:'';
        $quote_status = isset($request->quote_status)?$request->quote_status:null;
        $quote_keyword = isset($request->quote_keyword)?$request->quote_keyword:null;
        if($quote_status == null && $quote_keyword == null){

            try{
                //code will work if redirection is from advertisement dashboard
                if(!empty($month) && !empty($type))
                {
                    $monthdata = explode('-',$month);
                    $currentMonth = $monthdata[0];
                    $currentYear = $monthdata[1];

                    $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where('business_id',$b_id)->where('status','!=',0)->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);
                   if($type==1)
                    {
                       $quotes = $quotes->whereHas('get_quotes', function($q) {
                        $q->where('phone_number','!=','');
                        });
                    } 
                    else if($type==2)
                    {
                        $quotes = $quotes->whereHas('get_quotes', function($q) {
                        $q->where('phone_number','=',null);
                        });
                    } 
                    
                    $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                    //code will work if redirection is from advertisement dashboard
                }
                else
                {
                    $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where('business_id',$b_id)->where('status','!=',0)->orderBy('id','desc')->get()->toArray();
                }
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

                    //code will work if redirection is from advertisement dashboard
                    if(!empty($month) && !empty($type))
                    {
                        $monthdata = explode('-',$month);
                        $currentMonth = $monthdata[0];
                        $currentYear = $monthdata[1];

                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id))->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%'.$quote_keyword.'%');})->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);
                        
                       if($type==1)
                        {
                           $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','!=','');
                            });
                        } 
                        else if($type==2)
                        {
                            $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','=',null);
                            });
                        } 
                        
                        $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                        //code will work if redirection is from advertisement dashboard
                    }
                    else
                    {
                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id))->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%'.$quote_keyword.'%');})->orderBy("id",'desc')->get()->toArray();
                    }
                    
                }catch(\Exception $e){
                    return $e->getMessage();
                }

            }else{

                try{

                    //code will work if redirection is from advertisement dashboard
                    if(!empty($month) && !empty($type))
                    {
                        $monthdata = explode('-',$month);
                        $currentMonth = $monthdata[0];
                        $currentYear = $monthdata[1];

                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id))->where('status','!=',0)->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);
                        
                       if($type==1)
                        {
                           $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','!=','');
                            });
                        } 
                        else if($type==2)
                        {
                            $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','=',null);
                            });
                        } 
                        
                        $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                        //code will work if redirection is from advertisement dashboard
                    }
                    else
                    {
                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id))->where('status','!=',0)->orderBy("id",'desc')->get()->toArray();
                    }
                    


                }catch(\Exception $e){
                    return $e->getMessage();
                }

            }

            $hide_sorting = '0';

        }else if($quote_status !== 'all' && $quote_status !== null){

            if($quote_keyword !== null){

                try{

                    //code will work if redirection is from advertisement dashboard
                    if(!empty($month) && !empty($type))
                    {
                        $monthdata = explode('-',$month);
                        $currentMonth = $monthdata[0];
                        $currentYear = $monthdata[1];

                         $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id, 'status'=>$quote_status))->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%'.$quote_keyword.'%');})->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);
                       if($type==1)
                        {
                           $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','!=','');
                            });
                        } 
                        else if($type==2)
                        {
                            $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','=',null);
                            });
                        } 
                        
                        $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                        //code will work if redirection is from advertisement dashboard
                    }
                    else
                    {
                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id, 'status'=>$quote_status))->where('status','!=',0)->whereHas('get_quotes', function($q)use($quote_keyword) {$q->where('work_description', 'like', '%'.$quote_keyword.'%');})->orderBy("id",'desc')->get()->toArray();
                    }
                    

                }catch(\Exception $e){
                    return $e->getMessage();
                }

            }else{

                try{

                    //code will work if redirection is from advertisement dashboard
                    if(!empty($month) && !empty($type))
                    {
                        $monthdata = explode('-',$month);
                        $currentMonth = $monthdata[0];
                        $currentYear = $monthdata[1];

                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id, 'status'=>$quote_status))->where('status','!=',0)->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);

                       if($type==1)
                        {
                           $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','!=','');
                            });
                        } 
                        else if($type==2)
                        {
                            $quotes = $quotes->whereHas('get_quotes', function($q) {
                            $q->where('phone_number','=',null);
                            });
                        } 
                        
                        $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                        //code will work if redirection is from advertisement dashboard
                    }
                    else
                    {
                        $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where(array('business_id'=>$b_id, 'status'=>$quote_status))->where('status','!=',0)->orderBy("id",'desc')->get()->toArray();

                    }
                    
                }catch(\Exception $e){
                    return $e->getMessage();
                }

            }

            $hide_sorting = '0';

        }else{

            try{

                if(!empty($month) && !empty($type))
                {
                    $monthdata = explode('-',$month);
                    $currentMonth = $monthdata[0];
                    $currentYear = $monthdata[1];

                    $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where('business_id',$b_id)->where('status','!=',0)->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear);

                    if($type==1)
                    {
                       $quotes = $quotes->whereHas('get_quotes', function($q) {
                        $q->where('phone_number','!=','');
                        });
                    } 
                    else if($type==2)
                    {
                        $quotes = $quotes->whereHas('get_quotes', function($q) {
                        $q->where('phone_number','=',null);
                        });
                    } 
                    
                    $quotes = $quotes->orderBy('id','desc')->get()->toArray();

                    //code will work if redirection is from advertisement dashboard
                }
                else
                {
                    $quotes = YpBusinessUsersQuotes::with('get_gen_user','get_quotes')->where('business_id',$b_id)->where('status','!=',0)->orderBy('id','desc')->get()->toArray();
                }
                

            }catch(\Exception $e){
                return $e->getMessage();
            }

            $hide_sorting = '0';
            
        }
        
    	return view('business.quotes_questions.quotes_questions')->with(['quotes'=>$quotes,'quote_status'=>$quote_status,'quote_keyword'=>$quote_keyword,'hide_sorting'=>$hide_sorting,'month'=>$month,'type'=>$type]);
    }

    /********************
    Show quote request page
    **********************/
    public function showQuotesRequest($quote_id){

        if(!is_numeric($quote_id)){
            return abort(404);
        }
        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();
        if(empty($check_quoteId)){
            
            return abort(404);

        }else{
            $b_id = Auth::id();
            $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();
            $quotes = YpBusinessUsersQuotes::where(array('business_id'=>$b_id, 'quote_id'=>$quote_id))->update(['status'=>2]);

            $quote_data = YpBusinessUsersQuotes::with('get_gen_user')->where(['business_id'=>$b_id,'quote_id'=>$quote_id])->where('status','!=',0)->get()->toArray();


            return view('business.quotes_questions.quotes_request')->with(['quote_id'=>$quote_id,'quote_data'=>$quote_data,'allquotes'=>$allquotes]);
        }/****404 else ends***/

        
    }/*****end of show quote request fn******/

    /*****************
    submit quotes page
    *****************/
    public function quotesRequestSubmit(Request $request){

        $business_user_id = Auth::user()->business_userid;
        $b_id = Auth::user()->id;
        $quote_id = $_POST['quote_id']; 

        $validator = Validator::make($_POST, [
                'quote_price' => ['required', 'numeric', 'digits_between:1,15'],
                'quote_details' => ['string', 'min:30','max:10000'],
            ]);

        if($validator->fails()) {
           
            return Redirect::to('/business_user/quotes_request/'.$quote_id)->withInput()->withErrors($validator);
            
        }else{

            $uploaded_files = YpBusinessUsersQuotesReply::select('uploaded_files')->where(['business_id'=> $b_id,'quote_id'=>$quote_id])->get()->toArray();

            $quoteRequestData = YpBusinessUsersQuotesReply::where(['business_id'=> $b_id,'quote_id'=>$quote_id])->first();

            if(!empty($quoteRequestData)){
                $quoteRequestData = $quoteRequestData;
            }else{
                $quoteRequestData = new YpBusinessUsersQuotesReply;
            }

            $quoteRequestData->business_id  = $b_id;
            $quoteRequestData->quote_id     = $quote_id;
            $quoteRequestData->save();


            /****check selected files from button****/
            if ($request->hasFile('myfile')) {
                foreach($request->file('myfile') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/quotes_request/'.$business_user_id.'/', $filename)){                
                       
                        $pic_vid_arr['pic'][] = $filename;
                        
                        $pic_vid_json = json_encode($pic_vid_arr);
                        
                        $quoteRequestData->uploaded_files = $pic_vid_json;
                        $quoteRequestData->save();
                    }
                }
                
            }

            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                foreach ($_POST['dropzone_file'] as $filenames) {
                    
                    $pic_vid_arr['pic'][] = $filenames;
                    
                    $pic_vid_json = json_encode($pic_vid_arr);
                    
                    $quoteRequestData->uploaded_files = $pic_vid_json;
                    $quoteRequestData->save();
                }
            }

            /*****check value of input field****/
            if(isset($_POST['quote_price']) && !empty($_POST['quote_price'])){
                $quote_price = $_POST['quote_price'];
            }else{
                $quote_price = '';
            }

            if(isset($_POST['quote_price_type']) && !empty($_POST['quote_price_type'])){
                $quote_price_type = $_POST['quote_price_type'];
            }else{
                $quote_price_type = '';
            }


            if(isset($_POST['quote_details']) && !empty($_POST['quote_details'])){
                $quote_details = $_POST['quote_details'];
            }else{
                $quote_details = '';
            }


            $quoteRequestData->price_quotes     = $quote_price;
            $quoteRequestData->price_type       = $quote_price_type;
            $quoteRequestData->details          = $quote_details;
            $quoteRequestData->save();


            /********update status for this quote*******/

            YpBusinessUsersQuotes::where(['business_id'=>$b_id,'quote_id'=>$quote_id])->update(['status'=>'3']);

           // return redirect()->intended('business_user/quotes_questions');
            return redirect('business_user/quotes_questions');
        }


    }/******quotes submit ends******/

    /****************
    upload multiple files 
    *************/
    public function uploadUserMultipleFilesQuotes(Request $request){
        $id = Auth::user()->business_userid;
        if ($request->hasFile('file')) {
            $file = $request->file('file');             
            $extension = $file->getClientOriginalExtension(); // getting image extension  
            $originalName = $file->getClientOriginalName();
            $name=explode('.',$originalName)[0];
            $filename = $name.'_'.rand().'.'.$extension;
            if($file->move(public_path().'/images/quotes_request/'.$id.'/', $filename)){
                echo $filename;
            }else{
                echo 'false';
            }
        }
    }/*******upload files ends*******/

    /***************
    remove images from quote request
    ***************/
    public function removeImagesQuote(){
        $id = Auth::user()->business_userid;
        if(isset($_POST['id'])){
            $filename = $_POST['id'];
            $image_path = public_path().'/images/quotes_request/'.$id.'/'.$filename;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
                echo "yes";die;
            }else{
                echo "no";die;
            }
        }/****end of isset****/
    }/******remove images fn ends*******/

    /*******************************
    fn to display quote accepted page
    *******************************/
    public function showQuoteAccepted($quote_id,$quote_status){

        if(!is_numeric($quote_id) || !is_numeric($quote_status)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();
        
        if(empty($check_quoteId)){

            return abort(404);

        }else{
            // echo $quote_id;
            // echo "<pre>status";echo $quote_status;die;
            $b_id = Auth::user()->id;
            $business_userid = Auth::user()->business_userid;
            $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();

            $quote_data = YpBusinessUsersQuotes::with(['get_gen_user','get_review'=> function($q) use($b_id,$quote_id) {
                    $q->where(['business_id'=>$b_id,'quote_id'=>$quote_id]); 
                },'quote_reply'=> function($q) use($b_id,$quote_id) {
                    $q->where(['business_id'=>$b_id,'quote_id'=>$quote_id]); 
                }])->where(['quote_id'=>$quote_id,'status'=>$quote_status])->get()->toArray();

            if(empty($quote_data)){
            
                return abort(404);

            }
            //$quote_data = YpBusinessUsersQuotes::with(['get_gen_user','quote_reply','get_review'])->where(['business_id'=>$b_id, 'quote_id'=>$quote_id])->get()->toArray();
         
            return view('business.quotes_questions.quoted_accepted')->with(['quote_data'=>$quote_data,'business_userid'=>$business_userid,'allquotes'=>$allquotes]);
        }/***404 else ends***/

        
    }/*******end of quote accepted******/

    /********************
    show user review page
    **********************/
    public function showUserQuoteReview($quote_id){

        if(!is_numeric($quote_id)){
            return abort(404);
        }

        $check_quoteId = YpGeneralUsersQuotes::where('id',$quote_id)->get()->toArray();

        if(empty($check_quoteId)){
            
            return abort(404);

        }else{

            $b_id = Auth::user()->id;
            $business_userid = Auth::user()->business_userid;
            $allquotes = YpGeneralUsersQuotes::where('id',$quote_id)->first();
            $quote_data = YpBusinessUsersQuotes::with(['get_gen_user','quote_reply'])->where(['business_id'=>$b_id, 'quote_id'=>$quote_id])->get()->toArray();

            return view('business.quotes_questions.userquote_review')->with(['quote_data'=>$quote_data,'business_userid'=>$business_userid,'allquotes'=>$allquotes]);

        }/****404 else ends****/
        
    }

    /*************************
    fn to submit business reviews
    **************************/
    public function submitUserQuoteReview(){

        if(isset($_POST)){
            $quoteReview = YpUserReviews::where(['business_id'=> $_POST['review_bus_id'],'quote_id'=>$_POST['review_quote_id'],'general_id'=>$_POST['review_gen_id'],'user_type'=>'business'])->first();

            if(!empty($quoteReview)){
                $quoteReview = $quoteReview;
            }else{
                $quoteReview = new YpUserReviews;
            }

            if(isset($_POST['star_active']) && !empty($_POST['star_active'])){
                $star_active = $_POST['star_active'];
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

            /*****code to update status of the quote after review****/
            $QuoteStatus = YpBusinessUsersQuotes::where(['business_id'=> $_POST['review_bus_id'],'quote_id'=>$_POST['review_quote_id'],'general_id'=>$_POST['review_gen_id']])->first();

            if(!empty($QuoteStatus)){
                $QuoteStatus = $QuoteStatus;

                $QuoteStatus->status   = 6;
                $QuoteStatus->save();
            }
            

           // return redirect()->intended('business_user/quotes_questions');
            return redirect('business_user/quotes_questions');
        }/**isset ends***/
        
    }/*******fn ends here*******/

    /***************************
    fn to submit quote templates
    ***************************/
    public function submitQuoteTemplates(){
        $b_id = Auth::user()->id;

        if(isset($_POST)){

            $template_title = trim($_POST['template_title']);

            $check_temptitle = YpBusinessUserQuoteTemplates::where(['business_id'=>$b_id,'template_title'=>$template_title])->first();

            if(!empty($check_temptitle)){
                //$businessUserQuoteTemplate = $check_temptitle;
                return response()->json(['success'=>'2','message'=>'Template title already exists']);
            }else{
                $businessUserQuoteTemplate = new YpBusinessUserQuoteTemplates;
            }

            $businessUserQuoteTemplate->business_id         = $b_id;
            $businessUserQuoteTemplate->template_title      = $template_title;
            $businessUserQuoteTemplate->template_text       = $_POST['temp_text'];
            $businessUserQuoteTemplate->save();

            return response()->json(['success'=>'1','message'=>'Template saved Successfully']);

        }/****isset ends***/

    }/******quote template submit ends here******/

    /****************************
    fn to get all quote templates
    ******************************/
    public function getAllQuoteTemplates(){
        $b_id = Auth::user()->id;
        /*******get all templates******/
        $quote_templates = YpBusinessUserQuoteTemplates::where('business_id',$b_id)->get()->toArray();

        $html = '<tr class="template_head_tr"><th>S.no</th><th>Template Title</th><th>Template Text</th><th>Action</th></tr>';

        if(!empty($quote_templates)){
            foreach($quote_templates as $key=>$template){
                if($key % 2){
                    $even_odd = 'style="background-color: #ececec;"';
                }else{
                    $even_odd = '';
                }
                $sno = $key+1;
                $html.= '<tr id="'.$template['id'].'" '.$even_odd.'><td>'.$sno.'</td><td>'.$template['template_title'].'</td><td class="td_temp_text">'.$template['template_text'].'</td><td><a href="" onclick="use_template(this);return false;">Use</a> | <a href="javascript:void(0)" data-temp_id="'.$template['id'].'" onclick="delete_template(this);return false;">Delete</a></td></tr>';
            }
        }/****end if***/

        return response()->json(['success'=>'1','message'=>'Get All Templates Successfully','temphtml'=>$html]);

    }/*******get_all_templates ends******/

    /*********************
    delete quote template
    **********************/
    public function deleteQuoteTemplates(){
        $b_id = Auth::user()->id;

        if(isset($_POST)){
            $template_id = $_POST['temp_id'];

            $delete_query = YpBusinessUserQuoteTemplates::where(['business_id'=>$b_id,'id'=>$template_id])->delete();

            if($delete_query){
                return response()->json(['success'=>'1','message'=>'Template Deleted Successfully']);
            }else{
                return response()->json(['success'=>'0','message'=>'Please try again']);
            }

        }/***isset ends here**/
    }/******fn ends here to delete quote template*******/
    
}