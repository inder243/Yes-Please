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
    public function showQuotesQuestions($id = null){
        $b_id = Auth::id();
        
        if($id !== null){
            $quotes = YpBusinessUsersQuotes::with('get_gen_user')->where(array('business_id'=>$b_id, 'status'=>$id))->where('status','!=',0)->orderBy("id",'desc')->get()->toArray();
        }else{
            $quotes = YpBusinessUsersQuotes::with('get_gen_user')->where('business_id',$b_id)->where('status','!=',0)->orderBy('id','desc')->get()->toArray();
        }
        
    	return view('business.quotes_questions.quotes_questions')->with(['quotes'=>$quotes,'quote_status'=>$id]);
    }

    /********************
    Show quote request page
    **********************/
    public function showQuotesRequest($quote_id){
        $b_id = Auth::id();
        $quotes = YpBusinessUsersQuotes::where(array('business_id'=>$b_id, 'quote_id'=>$quote_id))->update(['status'=>2]);

        $quote_data = YpBusinessUsersQuotes::with('get_gen_user')->where(['business_id'=>$b_id,'quote_id'=>$quote_id])->where('status','!=',0)->get()->toArray();

        return view('business.quotes_questions.quotes_request')->with(['quote_id'=>$quote_id,'quote_data'=>$quote_data]);
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
                'quote_details' => ['string', 'min:30','max:255'],
            ]);

        if($validator->fails()) {
           
            return Redirect::to('/business_user/quotes_request/'.$quote_id)->withInput()->withErrors($validator);
            
        }else{

            $uploaded_files = YpBusinessUsersQuotesReply::select('uploaded_files')->where('business_id', '=',  $b_id)->get()->toArray();

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
                       
                        if(!empty($uploaded_files[0]['uploaded_files'])){
                            $pic_vid_arr = json_decode($uploaded_files[0]['uploaded_files']);
                            $pic_vid_arr->pic[] = $filename;
                            
                        }else{
                            $pic_vid_arr['pic'][] = $filename;
                        }
                        
                        $pic_vid_json = json_encode($pic_vid_arr);
                        $quoteRequestData->uploaded_files = $pic_vid_json;
                        $quoteRequestData->save();
                    }
                }
                
            }

            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                foreach ($_POST['dropzone_file'] as $filenames) {
                    if(!empty($uploaded_files[0]['uploaded_files'])){
                        $pic_vid_arr = json_decode($uploaded_files[0]['uploaded_files']);
                        $pic_vid_arr->pic[] = $filenames;
                    }else{
                        $pic_vid_arr['pic'][] = $filenames;
                    }
                    
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

            return redirect()->intended('business_user/quotes_questions');
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
        $b_id = Auth::user()->id;
        $business_userid = Auth::user()->business_userid;

        $quote_data = YpBusinessUsersQuotes::with(['get_gen_user','quote_reply'])->where(['business_id'=>$b_id, 'quote_id'=>$quote_id])->get()->toArray();

        return view('business.quotes_questions.quoted_accepted')->with(['quote_data'=>$quote_data,'business_userid'=>$business_userid]);
    }/*******end of quote accepted******/

    /********************
    show user review page
    **********************/
    public function showUserQuoteReview($quote_id){
        $b_id = Auth::user()->id;
        $business_userid = Auth::user()->business_userid;

        $quote_data = YpBusinessUsersQuotes::with(['get_gen_user','quote_reply'])->where(['business_id'=>$b_id, 'quote_id'=>$quote_id])->get()->toArray();

        return view('business.quotes_questions.userquote_review')->with(['quote_data'=>$quote_data,'business_userid'=>$business_userid]);
    }

    /*************************
    fn to submit business reviews
    **************************/
    public function submitUserQuoteReview(){

        $quoteReview = YpUserReviews::where(['business_id'=> $_POST['review_bus_id'],'quote_id'=>$_POST['review_quote_id'],'general_id'=>$_POST['review_gen_id']])->first();

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

        return redirect()->intended('business_user/quotes_questions');

    }/*******fn ends here*******/
    
}