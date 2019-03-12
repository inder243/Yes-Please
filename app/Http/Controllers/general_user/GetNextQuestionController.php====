<?php

namespace App\Http\Controllers\general_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\YpFormQuestions;
use App\Models\YpQuesJumps;
use App\Models\YpGeneralUsersQuotes;

class GetNextQuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:general_user');
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
            $catid = $request->catid;//get question id

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

                $getNextQuestion = YpQuesJumps::where('q_id.doctor_id',$qid)->where('value','"'.$operatorToApply.'"',$value)->where('operator',$operator)->get();
                //get jump_to question
                if(!empty($getNextQuestion))
                {
                    $jumpToQuestionId = $getNextQuestion['jump_to'];

                    if($jumpToQuestionId!="0")
                    {
                        $getJumpQuestion = YpFormQuestions::where(array('id'=>$jumpToQuestionId))->first();


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
                                    $html.='<li><div class="formcheck"><label><input class="radio-inline" name=radios'.$getJumpQuestion['id'].'[] value='.$option->option_value.' type="radio"><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';
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
                                $html.='<li><div class="formcheck"><label><input class="radio-inline" name=radios'.$id.'[] value='.$option->option_value.' type="radio"><span class="outside"><span class="inside"></span></span><p>'.$option->option_name.'</p></label></div></li>';
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
                $general_userid = Auth::user()->user_id;
                $g_id = Auth::user()->id;
               
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
                }
                $allAnswers = json_encode($request->answers);

                $quote_id = str_shuffle(rand(1,1000).strtotime("now"));

                $YpGeneralUsersQuotes = new YpGeneralUsersQuotes;
                $YpGeneralUsersQuotes->quote_id = $quote_id;
                $YpGeneralUsersQuotes->filter_data = $dataToFilter;
                $YpGeneralUsersQuotes->dynamic_formdata = $allAnswers;
                $YpGeneralUsersQuotes->general_id = $g_id;
                $YpGeneralUsersQuotes->work_description = $request->desc;
                $YpGeneralUsersQuotes->phone_number = $request->phone;
                $YpGeneralUsersQuotes->quote_count = $request->quotecount;
                $YpGeneralUsersQuotes->save();



                //send email to 5 random business users
               $getEmails =  DB::select(DB::raw("select group_concat(email) from yp_business_users where id in (SELECT DISTINCT business_id FROM yp_business_selected_services where service_text in QUOTE(".$dataToFilter.") ORDER BY RAND() )LIMIT 5"));

               echo "<pre>";
               print_r($getEmails);
              // exit;
               
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
  

}
