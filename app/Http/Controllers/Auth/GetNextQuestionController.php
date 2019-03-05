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
use Mail;


class GetNextQuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
                                    $html.='<div class="total_quote"><ul>';
                                    foreach($options as $option)
                                    {
                                        $html.='<li><div class="formcheck"><label><input class="radio-inline" name=radios'.$getJumpQuestion['id'].'[] value='.$option->option_value.' type="radio"><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';

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
                                    $html.='<div class="total_quote"><div class="form-group custom_errow"><label>Radius (km)</label><select class="form-control">';
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
                                        $html.='<li><div class="formcheck forcheckbox langcheck"><label><input class="radio-inline" name=radios'.$getJumpQuestion['id'].'[] value='.$option->option_value.' type="checkbox"><span class="outside"><span class="inside inside_checkbox"></span></span><p>'.$option->option_name.'</p></label></div></li>';

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
                    elseif($type=='radio')//check if question is of radio type
                    {
                        $options = json_decode($options); //get options and decode

                        $html.='<div class="quote_recieve form-ques dynamicQues_'.$id.'" data-id='.$id.' data-type='.$type.' data-filter='.$filter.'><h1 class="questitle">'.$title.'</h1>';
                        
                        if(isset($options) && !empty($options))
                        {
                            $html.='<div class="total_quote"><ul>';
                            foreach($options as $option)
                            {
                                $html.='<li><div class="formcheck"><label><input class="radio-inline" name=radios'.$id.'[] value='.$option->option_value.' type="radio" data-text='.$option->option_name.'><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';

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
                                $html.='<li><div class="formcheck forcheckbox langcheck"><label><input class="radio-inline" name=radios'.$id.'[] value='.$option->option_value.' type="checkbox" data-text='.$option->option_name.'><span class="outside"><span class="inside inside_checkbox"></span></span><p>'.$option->option_name.'</p></label></div></li>';

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
                            $html.='<div class="total_quote"><div class="form-group custom_errow"><label>Radius (km)</label><select class="form-control">';
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
    public function saveDynamicData(Request $request)
    {
        try
        {
            echo "<pre>";
            print_r($request->answers);
            return response()->json(['success'=>1,'message'=>$e->getMessage()],200);
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
            if($request->phone!='' && $request->desc!='' && $request->quotecount!='')
            {

                //check if multiple business have been selected

                $g_id = Auth::guard('general_user')->user()->id;

                $filteredData = array();
                foreach($request->answers as $ans)
                {
                    if($ans['filter']==1 || $ans['filter']=='1')
                    {
                       if ($ans['type']=='checkbox' || $ans['type']=='radio' || $ans['type']=='dropdown')
                       {
                            $options = $ans['options'];
                            
                            foreach($options as $option)
                            {
                                $filteredData[]= $option['label'];
                            }
                       }
                       else{
                            $filteredData[] = $ans['value'];
                       } 
                        
                    }
                }
                
                if(is_array($filteredData))
                {
                    $dataToFilter = implode(',',$filteredData);
                    $dataToFilterQuotes = "'".implode("','", $filteredData)."'";
                }

                $allAnswers = json_encode($request->answers);

                $quote_id = str_shuffle(rand(1,1000).strtotime("now"));
                //save quote data 
                $YpGeneralUsersQuotes = new YpGeneralUsersQuotes;
                $YpGeneralUsersQuotes->quote_id = $quote_id;
                $YpGeneralUsersQuotes->filter_data = $dataToFilter;
                $YpGeneralUsersQuotes->dynamic_formdata = $allAnswers;
                $YpGeneralUsersQuotes->general_id = $g_id;
                $YpGeneralUsersQuotes->work_description = $request->desc;
                $YpGeneralUsersQuotes->phone_number = $request->phone;
                $YpGeneralUsersQuotes->quote_count = $request->quotecount;
                $YpGeneralUsersQuotes->save();

                //save business user ids and general user id.

               if(!empty($request->multipleBusiness))
               {
                   $businessUserIds = $request->multipleBusiness;
                   $businessUserIdsString = implode(',',$request->multipleBusiness);
                    foreach($businessUserIds as $businessUser)
                    {
                        $YpBusinessUsersQuotes = new YpBusinessUsersQuotes;
                        $YpBusinessUsersQuotes->business_id = $businessUser;
                        $YpBusinessUsersQuotes->general_id = $g_id;
                        $YpBusinessUsersQuotes->quote_id = $YpGeneralUsersQuotes->id;
                        $YpBusinessUsersQuotes->status = 1;
                        $YpBusinessUsersQuotes->save();
                    }

                    //send email to selected business users
                   $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (".$businessUserIdsString.")"));

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
                    $businessUserIds =  DB::select(DB::raw("SELECT DISTINCT business_id FROM yp_business_selected_services where service_text in (".$dataToFilterQuotes.") ORDER BY RAND() LIMIT 5"));

                    if(!empty($businessUserIds))
                    {
                        foreach($businessUserIds as $businessUser)
                        {

                            $YpBusinessUsersQuotes = new YpBusinessUsersQuotes;
                            $YpBusinessUsersQuotes->business_id = $businessUser->business_id;
                            $YpBusinessUsersQuotes->general_id = $g_id;
                            $YpBusinessUsersQuotes->quote_id = $YpGeneralUsersQuotes->id;
                            $YpBusinessUsersQuotes->status = 1;
                            $YpBusinessUsersQuotes->save();
                        }
                    }

                    //send email to 5 random business users
                   $getEmails =  DB::select(DB::raw("select group_concat(email) as emails from yp_business_users where id in (SELECT DISTINCT business_id FROM yp_business_selected_services where service_text in (".$dataToFilterQuotes.") ORDER BY RAND() )LIMIT 5"));
                   

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

               
              
               
                return response()->json(['success'=>1,'message'=>'Dat saved successfully.'],200);
            }
            else if($request->phone=='')
            {
                return response()->json(['success'=>0,'message'=>'Phone number is missing.'],200);
            }
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
