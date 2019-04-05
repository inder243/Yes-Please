<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpFormQuestions;
use App\Models\YpQuesJumps;
use App\Models\YpGeneralUsersQuotes;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpBusinessCategories;
use App\Http\Traits\BusinessUserProSettingsTrait;
use Mail;


class GetNextQuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use BusinessUserProSettingsTrait;
    public function __construct()
    {
       // $this->middleware('guest:general_user', ['except' => ['getdata']]);
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata(Request $request)
    {
        try
        {
            $infoImg= url('/').'/img/info.png';
            $arrowImg= url('/').'/img/custom_arrow.png';
            $nextId ='';
            $html='';
            $quesId = $request->qid;//get question id
            $qid = $request->qid;//get question id
            $value = $request->value;//get value 
            $catid = $request->catid;//get cat id

            //get logic jump of given question
            $getJumpQuestion = YpQuesJumps::where(array('q_id'=>$quesId))->first();

            if(!empty($getJumpQuestion))
            {
                $operator = $getJumpQuestion['operator'];

               
                //check for = operator
                if($operator==1)
                {
                    $operatorToApply = '=';
                }
                //check for != operator
                else if($operator==2)
                {
                    $operatorToApply = '!=';
                }
                //check for > operator
                else if($operator==3)
                {
                    $operatorToApply = '>';
                }
                //check for< operator
                else if($operator==4)
                {
                    $operatorToApply = '<';
                }

                //make dynamic query

                $getNextQuestion = YpQuesJumps::where('q_id',$qid)->where('value',$value,'"'.$operatorToApply.'"')->where('operator',$operator)->first();
                
                //get jump_to question
                if(!empty($getNextQuestion))
                {
                    $jumpToQuestionId = $getNextQuestion['jump_to'];

                    

                    if($jumpToQuestionId!='')
                    {
                        $getJumpQuestion = YpFormQuestions::where(array('qid'=>$jumpToQuestionId))->first();

                        if(!empty($getJumpQuestion))
                        {
                            $nextId = $getJumpQuestion['id'];
                            //check if question is of textbox type
                            if($getJumpQuestion['type']=='textbox')
                            {
                                $html.='<div class="not_all_business form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'>
                                    <h1 class="questitle">'.$getJumpQuestion['title'].'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$getJumpQuestion['id'].'">'.$getJumpQuestion['title'].'</label><input class="form-control" id="inputEmail'.$getJumpQuestion['id'].'" type="text"></div>';

                                if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                                    
                            }
                           /* else if($getJumpQuestion['type']=='datepicker')
                            {
                                $html.='<div class="not_all_business form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'>
                                    <h1 class="questitle">'.$getJumpQuestion['title'].'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$getJumpQuestion['id'].'">'.$getJumpQuestion['title'].'</label><input class="form-control dpicker datetimepicker" id="inputEmail'.$getJumpQuestion['id'].'" type="text"></div>';

                                if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                                    
                            }
                            else if($getJumpQuestion['type']=='timepicker')
                            {
                                $html.='<div class="not_all_business form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'>
                                    <h1 class="questitle">'.$getJumpQuestion['title'].'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$getJumpQuestion['id'].'">'.$getJumpQuestion['title'].'</label><input class="form-control tpicker datetimepicker" id="inputEmail'.$getJumpQuestion['id'].'" type="text"></div>';

                                if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                                    
                            }*/
                            elseif($getJumpQuestion['type']=='textarea')
                            {

                             $html.='<div class="describe_work form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'><h1 class="questitle">'.$getJumpQuestion['title'].'</h1><p>(0/2000 letters minimum 100)</p><div class="describe_work_sec"><div class="des_area"><textarea cols="30" placeholder="Input description"></textarea></div>';
                               if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']) && $getJumpQuestion['description']!=NULL && $getJumpQuestion['description']!='NULL')
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                $html.='<div class="describe_work_btn"><div class="ele_pre" onclick="getPrevQuesButton('.$quesId.');"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                               
                            }
                            elseif($getJumpQuestion['type']=='radio')//check if question is of radio type
                            {
                                $options = json_decode($getJumpQuestion['options']); //get options and decode

                                $html.='<div class="quote_recieve form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'><h1 class="questitle">'.$getJumpQuestion['title'].'</h1>';
                               
                                if(isset($options) && !empty($options))
                                {
                                    $html.='<div class="total_quote dynamic_rad"><ul>';
                                    foreach($options as $option)
                                    {
                                        $html.='<li><div class="formcheck"><label><input class="radio-inline dynamicradio_button" name=radios'.$getJumpQuestion['id'].'[] value='.$option->option_value.' type="radio"><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';

                                    }
                                }
                               $html.='</ul></div>';
                                  
                               if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                            }
                            elseif($getJumpQuestion['type']=='dropdown')//check if question is of dropdown type
                            {
                                
                                $options = json_decode($getJumpQuestion['options']); //get options and decode

                                $html.='<div class="quote_recieve form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'><h1 class="questitle">'.$getJumpQuestion['title'].'</h1>';
                                if(isset($options) && !empty($options))
                                {
                                    $html.='<div class="total_quote"><div class="form-group custom_errow"><label>'.$getJumpQuestion['title'].'</label><select class="form-control">';
                                    foreach($options as $option)
                                    {
                                        $html.= '<option value='.$option->option_value.'>'.$option->option_name.'</option>';
                                    }
                                    $html.='</select><span class="select_arrow1"><img img src="'.$arrowImg.'" class="img-fluid"></span></div>';
                                }
                               $html.='</ul></div>';
                               if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                               
                            }
                            elseif($getJumpQuestion['type']=='checkbox')//check if question is of checkbox type
                            {
                                $html.='<div class="what_design form-ques dynamicQues_'.$getJumpQuestion['id'].'" data-id='.$getJumpQuestion['id'].' data-type='.$getJumpQuestion['type'].' data-filter='.$getJumpQuestion['filter'].'><h1 class="questitle">'.$getJumpQuestion['title'].'</h1><div class="d_cat">';
                                $options = json_decode($getJumpQuestion['options']);
                                if(isset($options) && !empty($options))
                                {
                                    $html.='<ul>';
                                    foreach($options as $option)
                                    {
                                        $html.='<li><div class="formcheck forcheckbox langcheck"><label><input class="radio-inline" name=radios'.$getJumpQuestion['id'].'[] value='.$option->option_value.' type="checkbox"><span class="outside checkbox"><span class="inside inside_checkbox"></span></span><p>'.$option->option_name.'</p></label></div></li>';

                                    }
                                }
                               $html.='</ul>';
                              
                                if(isset($getJumpQuestion['description']) && !empty($getJumpQuestion['description']))
                                {

                                    $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$getJumpQuestion['description'].'</p></div>';
                                }
                                
                                $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                            }
                        }
                        
                       
                    }

                    
                }

                
               
            }
            else
            {
                $getJumpQuestion = DB::select(DB::raw('select * from yp_form_questions where id = (select min(id) from yp_form_questions where id > '.$quesId.') and cat_id='.$catid.''));

                //echo "<pre>";
                //print_r($getJumpQuestion);
                //check if question is of textbox type
               if(!empty($getJumpQuestion) && isset($getJumpQuestion[0]) && !empty($getJumpQuestion[0]))
               {
                    $type = $getJumpQuestion[0]->type;
                    $id = $getJumpQuestion[0]->id;
                    $nextId = $getJumpQuestion[0]->id;
                    $title = $getJumpQuestion[0]->title;
                    $description = $getJumpQuestion[0]->description;
                    $options =  $getJumpQuestion[0]->options;
                    $filter =  $getJumpQuestion[0]->filter;

                    if($type=='textbox')
                    {
                        $html.='<div class="not_all_business form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'>
                            <h1 class="questitle">'.$title.'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$id.'">'.$title.'</label><input class="form-control" id="inputEmail'.$id.'" type="text"></div>';

                        if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                      $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                            
                    }
                    elseif($type=='textarea')
                    {
                        
                     $html.='<div class="describe_work form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'><h1 class="questitle">'.$title.'</h1><p>(0/2000 letters minimum 100)</p><div class="describe_work_sec"><div class="des_area"><textarea cols="30" placeholder="Input description"></textarea></div>';
                       if(isset($description) && !empty($description) && $description!=NULL && $description!='NULL')
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                        $html.='<div class="describe_work_btn"><div class="ele_pre" onclick="getPrevQuesButton('.$quesId.');"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                       
                    }
                    /*else if($type=='datepicker')
                    {
                        
                        $html.='<div class="not_all_business form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'>
                            <h1 class="questitle">'.$title.'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$id.'">'.$title.'</label><input class="form-control dpicker datetimepicker" id="inputEmail'.$id.'" type="text"></div>';

                        if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                        $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                       
                    }
                    else if($type=='timepicker')
                    {
                        $html.='<div class="not_all_business form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'>
                            <h1 class="questitle">'.$title.'</h1><div class="ph_detail"><div class="form-group "><label for="inputEmail'.$id.'">'.$title.'</label><input class="form-control tpicker datetimepicker" id="inputEmail'.$id.'" type="text"></div>';

                        if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                        $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                       
                    }*/
                    elseif($type=='radio')//check if question is of radio type
                    {
                        $options = json_decode($options); //get options and decode

                        $html.='<div class="quote_recieve form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'><h1 class="questitle">'.$title.'</h1>';
                        
                        if(isset($options) && !empty($options))
                        {
                            $html.='<div class="total_quote dynamic_rad"><ul>';
                            foreach($options as $option)
                            {
                                $html.='<li><div class="formcheck"><label><input class="radio-inline dynamicradio_button" name=radios'.$id.'[] value='.$option->option_value.' type="radio" data-text='.$option->option_name.'><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';

                            }
                        }
                       $html.='</ul>';
                          
                       if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                      $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                    }
                    elseif($type=='checkbox')//check if question is of checkbox type
                    {
                        $html.='<div class="what_design form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'><h1 class="questitle">'.$title.'</h1><div class="d_cat">';
                        $options = json_decode($options);
                        if(isset($options) && !empty($options))
                        {
                            $html.='<ul>';
                            foreach($options as $option)
                            {
                                $html.='<li><div class="formcheck forcheckbox langcheck"><label><input class="radio-inline" name=radios'.$id.'[] value='.$option->option_value.' type="checkbox" data-text='.$option->option_name.'><span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>'.$option->option_name.'</p></label></div></li>';

                            }
                        }
                       $html.='</ul>';
                      
                        if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                        $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                    }
                    elseif($type=='dropdown')//check if question is of dropdown type
                    {
                        
                        $options = json_decode($options); //get options and decode

                        $html.='<div class="quote_recieve form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'><h1 class="questitle">'.$title.'</h1>';
                        if(isset($options) && !empty($options))
                        {
                            $html.='<div class="total_quote"><div class="form-group custom_errow"><label>'.$title.'</label><select class="form-control">';
                            foreach($options as $option)
                            {
                                
                                $html.= '<option data-text='.$option->option_name.' value='.$option->option_value.'>'.$option->option_name.'</option>';

                            }
                            $html.='</select><span class="select_arrow1"><img img src="'.$arrowImg.'" class="img-fluid"></span></div>';
                        }
                       $html.='</ul></div>';
                       if(isset($description) && !empty($description))
                        {

                            $html.='<div class="t_detail"><p><img src="'.$infoImg.'">'.$description.'</p></div>';
                        }
                        
                        $html.='<div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>';
                       
                    }
               }
               
               
                
            }

            return response()->json(['success'=>1,'data'=>$html,'message'=>'data got successfully','nextid'=>$nextId],200);
        }
        catch(Exception $e)
        {
            return response()->json(['success'=>0,'message'=>$e->getMessage()],200);
        }
        
        
    }   

    
    //function to save data of send quote dynamic form
    public function saveQuoteData(Request $request)
    {

        try
        {
           

           //echo "<pre>2111111111111";
           //print_r($request->files);
            /****check selected files from button****/
           $Allimages = array();
           if (!empty($_FILES['files'])) {
                foreach($request->files as $images)
                {
                     $Allimages = $images;
                }
           }

                
          
            $answers = json_decode($_POST['answers']);
            
            if($request->desc!='' && $request->quotecount!='')
            {

                //check if multiple business have been selected

                $g_id = Auth::guard('general_user')->user()->id;
                $g_user_id = Auth::guard('general_user')->user()->user_id;

                $filteredData = array();
                if(!empty($answers))
                {
                    foreach($answers as $ans)
                    {
                        if($ans->filter==1 || $ans->filter=='1')
                        {
                           if ($ans->type=='checkbox' || $ans->type=='radio' || $ans->type=='dropdown')
                           {
                                $options = $ans->options;
                                
                                foreach($options as $option)
                                {
                                    $filteredData[]= $option->label;
                                }
                           }
                           else{
                                $filteredData[] =$ans->value;
                           } 
                            
                        }
                    }
                }
                
                
               

                if(is_array($filteredData))
                {
                    $dataToFilter = implode(',',$filteredData);
                    $dataToFilterQuotes = "'".implode("','", $filteredData)."'";
                }

                $allAnswers = json_encode($answers);

                /******get cat name*****/
                $get_cat_name = YpBusinessCategories::select('category_name')->where('id',$request->hiddencatId)->first();
                $cat_name = $get_cat_name->category_name;

                $quote_id = str_shuffle(rand(1,1000).strtotime("now"));
                //save quote data 
                $YpGeneralUsersQuotes                   = new YpGeneralUsersQuotes;
                $YpGeneralUsersQuotes->quote_id         = $quote_id;
                $YpGeneralUsersQuotes->filter_data      = $dataToFilter;
                $YpGeneralUsersQuotes->dynamic_formdata = $allAnswers;
                $YpGeneralUsersQuotes->general_id       = $g_id;
                $YpGeneralUsersQuotes->work_description = $request->desc;
                $YpGeneralUsersQuotes->phone_number     = $request->phone;
                $YpGeneralUsersQuotes->quote_count      = $request->quotecount;
                $YpGeneralUsersQuotes->cat_id           = $request->hiddencatId;
                $YpGeneralUsersQuotes->cat_name         = $cat_name;
                $YpGeneralUsersQuotes->save();

                if (!empty($_FILES['files'])) {
                    foreach($Allimages as $fils){
                        $file = $fils; 
                                 
                        $extension = $file->getClientOriginalExtension(); // getting image extension  
                                
                        $filename = rand(10,100).time().'.'.$extension;
                        
                        if($file->move(public_path().'/images/general_quotes/'.$g_user_id.'/', $filename)){                
                           
                            $pic_vid_arr['pic'][] = $filename;
                            
                            $pic_vid_json = json_encode($pic_vid_arr);
                            $YpGeneralUsersQuotes->uploaded_files = $pic_vid_json;
                           $YpGeneralUsersQuotes->save();
                        }
                    }
                    
                }
                
                

                //save business user ids and general user id.

               if(!empty($request->multipleBusiness))
               {
                    $businessUserIds = $request->multipleBusiness;
                   
                   $businessUserIdsString = explode(',',$request->multipleBusiness);

                    foreach($businessUserIdsString as $businessUser)
                    {
                        $YpBusinessUsersQuotes = new YpBusinessUsersQuotes;
                        $YpBusinessUsersQuotes->business_id = $businessUser;
                        $YpBusinessUsersQuotes->general_id = $g_id;
                        $YpBusinessUsersQuotes->quote_id = $YpGeneralUsersQuotes->id;
                        $YpBusinessUsersQuotes->status = 1;
                        $YpBusinessUsersQuotes->save();
                    }

                    //send email to selected business users
                   $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (".$businessUserIds.")"));

                   if(!empty($getEmails) && !empty($getEmails[0]))
                   {
                        if(!empty($getEmails[0]->emails))
                        {
                            //send email
                            $emails = explode(',',$getEmails[0]->emails);
                              
                            $send_email_from = $_ENV['send_email_from'];
                             $data ='';
                            
                            Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                                    $message->from($send_email_from, 'Yes Please'); 

                                    $message->to($emails)->subject('Yes Please Quote Request');

                            });
                        }
                   }
               }
               else
               {
                    //get minimum bidamount of category set by admin

                    if($request->phone=='')
                    {
                        $getBidAmount = YpBusinessCategories::select("quote_without_ph")->where('id',$request->hiddencatId)->first();
                        if($getBidAmount!='')
                        {
                            $bidAmount = $getBidAmount['quote_without_ph'];
                            $columNameForBid = 'quote_without_ph'; //get column for query
                        }
                    }
                    else
                    {
                        $getBidAmount = YpBusinessCategories::select("quote_with_ph")->where('id',$request->hiddencatId)->first();
                        if($getBidAmount!='')
                        {
                            $bidAmount = $getBidAmount['quote_with_ph'];
                            $columNameForBid = 'quote_with_ph'; //get column for query
                        }
                    }
                    //get minimum bidamount of category set by admin
                    
                    $countOfmembersToSendBid = 5;
                    $countTotalOfmembersToSendBid = 5;

                    //get 5 pro members which have wallet amount equal to or greater than category bid amount given by them and they have checked option for request accept for every bid

                    

                    $businessUserIds = DB::select(DB::raw("SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_user_categories.business_userid) order by rand() SEPARATOR ','), ',',5) as businessUserIds FROM `yp_business_user_categories`
                    inner join yp_business_user_cc_details on yp_business_user_categories.business_userid = yp_business_user_cc_details.b_id
                    inner join yp_business_selected_services on yp_business_user_categories.business_userid = yp_business_selected_services.business_id
                    where yp_business_user_categories.category_id=".$request->hiddencatId." and yp_business_user_categories.".$columNameForBid.">0 and yp_business_user_cc_details.updated_wallet_amount>=yp_business_user_categories.".$columNameForBid." and accept_request=1 and yp_business_selected_services.cat_id=".$request->hiddencatId." and yp_business_selected_services.service_text in (".$dataToFilterQuotes.")"));

                    $businessUserIds = $businessUserIds[0]->businessUserIds;



                    if(!empty($businessUserIds))
                    {
                        $buserids = explode(',',$businessUserIds);
                        $countOfProMembers = count($buserids);
                        $countOfmembersToSendBid = $countOfmembersToSendBid-$countOfProMembers;
                           //if from above calculations members are less than 5 then get remaining  pro members which have wallet amount equal to or greater than category bid amount given by them and they have unchecked option for request accept for every bid

                        if($countOfmembersToSendBid>0)
                        {
                           
                            $businessUserIdsUncheked = DB::select(DB::raw("SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_user_categories.business_userid) order by rand() SEPARATOR ','), ',',".$countOfmembersToSendBid.") as buids FROM `yp_business_user_categories`
                        inner join yp_business_user_cc_details on yp_business_user_categories.business_userid = yp_business_user_cc_details.b_id
                        inner join yp_business_selected_services on yp_business_user_categories.business_userid = yp_business_selected_services.business_id
                        where yp_business_user_categories.category_id=".$request->hiddencatId." and yp_business_user_categories.".$columNameForBid.">0 and yp_business_user_cc_details.updated_wallet_amount>=yp_business_user_categories.".$columNameForBid." and accept_request=0 and yp_business_selected_services.cat_id=".$request->hiddencatId." and yp_business_selected_services.service_text in (".$dataToFilterQuotes.")"));

                           

                            //merge both pro and free members
                            if(!empty($businessUserIdsUncheked[0]->buids))
                            {
                                $buserids = array_merge($buserids,explode(',',$businessUserIdsUncheked[0]->buids));
                            }
                        }

                        
                        if(count($buserids)<5)
                        {
                            $countTotalOfmembersToSendBid = $countTotalOfmembersToSendBid-count($buserids);

                            $businessUserIdsFree = DB::select(DB::raw("SELECT DISTINCT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_selected_services.business_id) ORDER BY RAND() SEPARATOR ','), ',',".$countTotalOfmembersToSendBid.") as buids FROM yp_business_selected_services 
                            inner join yp_business_users on yp_business_selected_services.business_id = yp_business_users.id
                            where yp_business_selected_services.service_text in (".$dataToFilterQuotes.") and yp_business_selected_services.cat_id=".$request->hiddencatId." and  yp_business_users.advertise_mode=0"));

                            //merge both pro and free members
                            if(!empty($businessUserIdsFree[0]->buids))
                            {
                                $buserids = array_merge($buserids,explode(',',$businessUserIdsFree[0]->buids));
                            }

                        }
                    }
                    else
                    {
                        $businessUserIds = DB::select(DB::raw("SELECT DISTINCT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_selected_services.business_id) ORDER BY RAND() SEPARATOR ','), ',',5) as buids FROM yp_business_selected_services 
                            inner join yp_business_users on yp_business_selected_services.business_id = yp_business_users.id
                        where yp_business_selected_services.service_text in (".$dataToFilterQuotes.") and yp_business_selected_services.cat_id=".$request->hiddencatId." and  yp_business_users.advertise_mode=0"));

                            if(!empty($businessUserIds[0]->buids))
                            {
                                $buserids = explode(',',$businessUserIds[0]->buids);
                            }
                    }

                    if(!empty($buserids))
                    {
                        $deductAmountFromWallet = $this->deductAmountFromWallet($buserids,$request->hiddencatId,$columNameForBid);

                        foreach($buserids as $businessUser)
                        {

                            $YpBusinessUsersQuotes = new YpBusinessUsersQuotes;
                            $YpBusinessUsersQuotes->business_id = $businessUser;
                            $YpBusinessUsersQuotes->general_id = $g_id;
                            $YpBusinessUsersQuotes->quote_id = $YpGeneralUsersQuotes->id;
                            $YpBusinessUsersQuotes->status = 1;
                            $YpBusinessUsersQuotes->save();

                            $buseridsToSendEmail[] = $businessUser;
                        }
                    }


                    //get 5 pro members which have wallet amount equal to or greater than category bid amount given by admin 
                    /*$businessUserIds = DB::select(DB::raw("SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_selected_services.business_id) SEPARATOR ','), ',',5) as businessUserIds FROM yp_business_selected_services inner join yp_business_user_cc_details on yp_business_selected_services.business_id = yp_business_user_cc_details.b_id 
                        where yp_business_selected_services.service_text in (".$dataToFilterQuotes.") and yp_business_selected_services.cat_id=".$request->hiddencatId." and  yp_business_user_cc_details.updated_wallet_amount>=".$bidAmount." ORDER BY RAND()"));
                   

                    $businessUserIds = $businessUserIds[0]->businessUserIds;

                   if(!empty($businessUserIds))
                   {
                        $ProbusinessUserIds = explode(',',$businessUserIds);

                        //check if each business user has amount in wallet set by them as min bid amount for category
                       foreach($ProbusinessUserIds as $ProbusinessUserId)
                       {
                       
                            $businessWithMinAmountUserIds = DB::select(DB::raw("SELECT yp_business_user_categories.business_userid FROM yp_business_user_categories where yp_business_user_categories.category_id=".$request->hiddencatId." and business_userid=".$ProbusinessUserId." and ".$columNameForBid."<=(SELECT updated_wallet_amount  FROM `yp_business_user_cc_details` WHERE `b_id` = ".$ProbusinessUserId.")"));

                            if(!empty($businessWithMinAmountUserIds[0]->business_userid))
                            {
                                $businessUsersToSendBid[] = $businessWithMinAmountUserIds[0]->business_userid;
                                
                                $buserids[] = $businessWithMinAmountUserIds[0]->business_userid;
                            }
                            
                       }
                       
                        
               
                        $countOfProMembers = count($businessUsersToSendBid);
                       $countOfmembersToSendBid = $countOfmembersToSendBid-$countOfProMembers;
                       //if from above calculations members are less than 5 then get remaining free business users


                       if($countOfmembersToSendBid>0)
                       {

                            $businessUserIdsFree = DB::select(DB::raw("SELECT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_selected_services.business_id) SEPARATOR ','), ',',".$countOfmembersToSendBid.") as buids FROM yp_business_selected_services where yp_business_selected_services.service_text in (".$dataToFilterQuotes.") and yp_business_selected_services.cat_id=".$request->hiddencatId."  and yp_business_selected_services.business_id not in (".implode(',',$ProbusinessUserIds).")  ORDER BY RAND()"));

                            //merge both pro and free members
                            if(!empty($businessUserIdsFree[0]->buids))
                            {
                                $buserids = array_merge($buserids,explode(',',$businessUserIdsFree[0]->buids));
                            }
                       }
                      

                   }
                   else//if no pro member has wallet amount set by admin then get 5 free members
                   {
                        $businessUserIds = DB::select(DB::raw("SELECT DISTINCT SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT(yp_business_selected_services.business_id) SEPARATOR ','), ',',5) as buids FROM yp_business_selected_services 
                        where yp_business_selected_services.service_text in (".$dataToFilterQuotes.") and yp_business_selected_services.cat_id=".$request->hiddencatId."  ORDER BY RAND()"));

                        if(!empty($businessUserIds[0]->buids))
                        {
                            $buserids = explode(',',$businessUserIds[0]->buids);
                            
                        }
                   }

                
                    */

                   //deduct amount from wallet 
                   if(empty($buseridsToSendEmail))
                   {
                        return response()->json(['success'=>2,'message'=>'Sorry No Business Found For Selected Service.'],200);
                   }
                  

                    //send email to 5 random business users
                   $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (".implode(',',$buseridsToSendEmail).")"));

                   if(!empty($getEmails) && !empty($getEmails[0]) && $getEmails[0]->emails!='')
                   {
                        if(!empty($getEmails[0]->emails))
                        {
                            //send email
                            $emails = explode(',',$getEmails[0]->emails);
                              
                            $send_email_from = $_ENV['send_email_from'];
                             $data ='';
                            
                            Mail::send('emails.send_quote_email', ['data'=>$data], function ($message) use ($emails,$send_email_from) {

                                    $message->from($send_email_from, 'Yes Please'); 

                                    $message->to($emails)->subject('Yes Please Quote Request');

                            });
                        }
                   }
                   else
                   {
                         return response()->json(['success'=>2,'message'=>'Sorry No Business Found For Selected Service.'],200);
                   }
               }

                return response()->json(['success'=>1,'message'=>'Data saved successfully.','emails'=>$getEmails[0]->emails],200);
            }
            // else if($request->phone=='')
            // {
            //     return response()->json(['success'=>0,'message'=>'Phone number is missing.'],200);
            // }
            else if($request->desc=='')
            {
                return response()->json(['success'=>0,'message'=>'Describe your work.'],200);
            }
            else if($request->quotecount=='')
            {
                return response()->json(['success'=>0,'message'=>'How many quotes you want to recieve.'],200);
            }
            
        }
        catch(Exception $e)
        {
            $msg = $e->getMessage();
            return response()->json(['success'=>0,'message'=>$msg],200);
        }

    }



    /***
    ** fn to check user login or not on ask quote
    ***/
    public function checkLogin(Request $request){
       
        if(\Auth::guard('general_user')->check()){
            return response()->json(['success'=>1,'message'=>'login'],200);
        }else{
            return response()->json(['success'=>0,'message'=>'logout'],200);
        }
    }/***fn ends here***/

    
  

}
