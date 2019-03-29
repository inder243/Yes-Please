<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSuperCategories;
use App\Models\YpBusinessSubCategories;
use App\Models\Yphashtag;
use App\Models\YpGeneralUsers;
use App\Models\YpBusinessUsers;
use App\Models\YpVerificationBusinessUsers;
use App\Models\YpQuesJumps;
use App\Models\YpFormQuestions;
use DB;
use Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function category()
    {
        // $category = DB::table('yp_business_categories')->where('category_status','1')->orderBy('id', 'desc')->get();

        $Supercategory = YpBusinessSuperCategories::where('category_status','1')->orderBy('id', 'desc')->get();
       
        $category = YpBusinessCategories::where('category_status','1')->orderBy('id', 'desc')->get();

        return view('category')->with('Supercategory',$Supercategory)->with('category',$category);
    }


    public function add_Super_Category(Request $request)
    {
        $superCategoryName = $request->input('superCategory');
        if($superCategoryName=='')
        {
            Session::flash('error_message', 'Please Provide category name.');
            return back()->withInput();
        }
        
        // $general_categoryid = str_shuffle(rand(1,1000).strtotime("now"));
        $general_categoryid = time();
        //die($general_categoryid);

        $category = YpBusinessSuperCategories::where('cat_name', trim($superCategoryName))->first();
        if($category)
        {
            Session::flash('error_message', 'Parent Category already exists');
            return back()->withInput();
        }   
        $business_category = new YpBusinessSuperCategories;
        $business_category->super_cat_id = $general_categoryid;
        $business_category->cat_name = $superCategoryName;
        $business_category->save();

        Session::flash('success_message', 'Parent Category added successfully.');
        return redirect()->route('admin.category');
    }

    public function add_category(Request $request)
    {

        $superCategory = $request->input('superCategory');

        if($superCategory=='')
        {
            Session::flash('error_message', 'Please Provide SuperCategory.');
            return back()->withInput();
        }
        else if(trim($_POST['category'])=='')
        {
            Session::flash('error_message', 'Please Provide Category.');
            return back()->withInput();
        }
        else if(trim($_POST['q_with_ph'])=='')
        {
            Session::flash('error_message', 'Please Provide quote with phone number.');
            return back()->withInput();
        }
        else if(trim($_POST['q_without_ph'])=='')
        {
            Session::flash('error_message', 'Please Provide quote without phone number.');
            return back()->withInput();
        }
        // $category = DB::table('yp_business_categories')->where('category_name', trim($_POST['category']))->where('category_status','1')->first();



        $category = YpBusinessCategories::where('super_cat_id', $superCategory)->where('category_name', trim($_POST['category']))->where('category_status','1')->first();
        if($category)
        {
            Session::flash('error_message', 'Category already exists');
            return back()->withInput();
        }    

        $general_categoryid = str_shuffle(rand(1,1000).strtotime("now"));

        $business_category = new YpBusinessCategories;
        $business_category->category_id = $general_categoryid;
        $business_category->super_cat_id = $superCategory;
        $business_category->category_name = trim($_POST['category']);
        $business_category->quote_with_ph = trim($_POST['q_with_ph']);
        $business_category->quote_without_ph = trim($_POST['q_without_ph']);
        $business_category->save();

        Session::flash('success_message', 'Category added successfully.');
        return redirect()->route('admin.category');
    }



    public function sub_category()
    {
        // $category = DB::table('yp_business_categories')->where('yp_business_categories.category_status','1')->orderBy('id', 'desc')->get();

        $category = YpBusinessCategories::where('category_status','1')->orderBy('id', 'desc')->get();

        $subcategory = DB::table('yp_business_sub_categories')->select('yp_business_sub_categories.*','yp_business_sub_categories.id as sub_id','yp_business_categories.*')->leftJoin('yp_business_categories', 'yp_business_categories.id', '=', 'yp_business_sub_categories.cat_id')->orderBy('yp_business_sub_categories.id', 'desc')->where('yp_business_sub_categories.sub_category_status','1')->where('yp_business_categories.category_status','1')->get();


//         $subcategory = YpBusinessSubCategories::with(['category' => function ($query) {
//     $query->where('category_status', '=', '1');
// }])->where('sub_category_status','1')->get()->toArray();



        // echo '<pre>'; print_r($subcategory); die('here');
        return view('sub_category')->with(array('category'=>$category,'subcategory'=>$subcategory));
    }



    public function add_subcategory()
    {

        // $subcategory = DB::table('yp_business_sub_categories')->where('sub_category_name', trim($_POST['subcategory']))->where('cat_id', $_POST['category'])->where('sub_category_status','1')->first();


        $subcategory = YpBusinessSubCategories::where('sub_category_name', trim($_POST['subcategory']))->where('cat_id', $_POST['category'])->where('sub_category_status','1')->first();

        if($subcategory)
        {
            Session::flash('error_message', 'Subcategory already exists');
            return back()->withInput();
        }    

        $general_subcategoryid = str_shuffle(rand(1,1000).strtotime("now"));

        $business_subcategory = new YpBusinessSubCategories;
        $business_subcategory->cat_id = $_POST['category'];
        $business_subcategory->sub_category_id = $general_subcategoryid;
        $business_subcategory->sub_category_name = trim($_POST['subcategory']);
        $business_subcategory->save();

         Session::flash('success_message', 'Subcategory added successfully.');
         return redirect()->route('admin.sub_category');
    }


    public function edit_category()
    {
        // $category = DB::table('yp_business_categories')->where('category_name', trim($_POST['name']))->where('id','!=', trim($_POST['id']))->where('category_status','1')->first();
        if(trim($_POST['name'])=='')
        {
            echo "error";
        
        }
        else if(trim($_POST['edit_q_with_ph'])<=0)
        {
            echo "error1";
        
        }
        else if(trim($_POST['edit_q_without_ph'])<=0)
        {
            echo "error2";
        
        }
        
        $category = YpBusinessCategories::where('category_name', trim($_POST['name']))->where('id','!=', trim($_POST['id']))->where('category_status','1')->first();
        
        // echo '<pre>'; print_r($category); die('here');
        if($category)
        {
            echo "error";
        
        }
        else  
        {
            //  DB::table('yp_business_categories')
            // ->where('id', $_POST['id'])
            // ->update(['category_name' => trim($_POST['name'])]);

            YpBusinessCategories::where('id', $_POST['id'])
            ->update(['category_name' => trim($_POST['name']),'quote_with_ph'=>trim($_POST['edit_q_with_ph']),'quote_without_ph'=>trim($_POST['edit_q_without_ph'])]);

            echo "success";
        
        }  
    }




    public function edit_subcategory()
    {

// echo '<pre>'; print_r($_POST); die('here');
        // $subcategory = DB::table('yp_business_sub_categories')->where('sub_category_name', trim($_POST['name']))->where('cat_id','=', trim($_POST['cat_id']))->where('id','!=', trim($_POST['id']))->where('sub_category_status','1')->first();


        $subcategory = YpBusinessSubCategories::where('sub_category_name', trim($_POST['name']))->where('cat_id','=', trim($_POST['cat_id']))->where('id','!=', trim($_POST['id']))->where('sub_category_status','1')->first();

        // echo '<pre>'; print_r($category); die('here');
        if($subcategory)
        {

            // echo '<pre>'; print_r($_POST); die('here123');
            echo "error";
        
        }
        else  
        {
            // echo '<pre>'; print_r($_POST); die('here345');
            //  DB::table('yp_business_sub_categories')
            // ->where('id', $_POST['id'])
            // ->update(['sub_category_name' => trim($_POST['name']),'cat_id'=>trim($_POST['cat_id'])]);

            YpBusinessSubCategories::where('id', $_POST['id'])
            ->update(['sub_category_name' => trim($_POST['name']),'cat_id'=>trim($_POST['cat_id'])]);

            echo "success";
        
        }  
    }


    public function delete_category()
    {

           // YpBusinessCategories::where('id', $_POST['id'])
           //  ->update(['category_status' => '0']);
           // YpBusinessSubCategories::where('cat_id', $_POST['id'])
           //  ->update(['sub_category_status' => '0']);

        YpBusinessCategories::where('id', $_POST['id'])
            ->delete();
        YpBusinessSubCategories::where('cat_id', $_POST['id'])
            ->delete();

    }




    public function delete_subcategory()
    {

        // YpBusinessSubCategories::where('id', $_POST['id'])
        //     ->update(['sub_category_status' => '0']);
        YpBusinessSubCategories::where('id', $_POST['id'])
            ->delete();

    }


    public function hashtag()
    {

        // $hashtag = DB::table('yp_hashtag')->where('hashtag_status','1')->orderBy('id', 'desc')->get();
        // return view('hashtag')->with('hashtag',$hashtag);


        $hashtag = Yphashtag::where('hashtag_status','1')->orderBy('id', 'desc')->get();
        return view('hashtag')->with('hashtag',$hashtag);

    }


    public function add_hashtag()
    {

        // $hashtag = DB::table('yp_hashtag')->where('hashtag_name', trim($_POST['hashtag']))->where('hashtag_status','1')->first();

        if(trim($_POST['hashtag'])=='')
        {
            Session::flash('error_message', 'Please Provide Hashtag');
            return back()->withInput();
        } 

        $hashtag = Yphashtag::where('hashtag_name', trim($_POST['hashtag']))->where('hashtag_status','1')->first();

        if($hashtag)
        {
            Session::flash('error_message', 'Hashtag already exists');
            return back()->withInput();
        }    

        $general_hashtagid = str_shuffle(rand(1,1000).strtotime("now"));

        $business_hashtag = new Yphashtag;
        $business_hashtag->hashtag_id = $general_hashtagid;
        $business_hashtag->hashtag_name = trim($_POST['hashtag']);
        $business_hashtag->save();

         Session::flash('success_message', 'Hashtag added successfully.');
         return redirect()->route('admin.hashtag');
    }



    public function edit_hashtag()
    {
        if(trim($_POST['name'])=='')
        {
            echo "error";
        
        }

        // $hashtag = DB::table('yp_hashtag')->where('hashtag_name', trim($_POST['name']))->where('id','!=', trim($_POST['id']))->where('hashtag_status','1')->first();

        $hashtag = Yphashtag::where('hashtag_name', trim($_POST['name']))->where('id','!=', trim($_POST['id']))->where('hashtag_status','1')->first();

        // echo '<pre>'; print_r($category); die('here');
        if($hashtag)
        {
            echo "error";
        
        }
        else  
        {
            //  DB::table('yp_hashtag')
            // ->where('id', $_POST['id'])
            // ->update(['hashtag_name' => trim($_POST['name'])]);

            Yphashtag::where('id', $_POST['id'])
            ->update(['hashtag_name' => trim($_POST['name'])]);


            echo "success";
        
        }  
    }


    public function delete_hashtag()
    {
        /*Yphashtag::where('id', $_POST['id'])
        ->update(['hashtag_status' => '0']);*/

        Yphashtag::where('id', $_POST['id'])
        ->delete();

    }




    public function business_user()
    {
        $business_user = YpBusinessUsers::orderBy('id', 'desc')->get();
        return view('business_user')->with('business_user',$business_user);

    }


    public function general_user()
    {
        $general_user = YpGeneralUsers::orderBy('id', 'desc')->get();
        return view('general_user')->with('general_user',$general_user);

    }

    /********
    fn to enable the users
    ********/
    public function enable_user(){
        if(isset($_POST)){
            if($_POST['type']=='business'){
                YpBusinessUsers::where('id', $_POST['id'])->update(['admin_approve' => '1']); 
                return response()->json(['success'=>'1','message'=>'Business User Enabled Successfully']);
            }else if($_POST['type']=='general'){
                YpGeneralUsers::where('id', $_POST['id'])->update(['admin_approve' => '1']); 
                return response()->json(['success'=>'1','message'=>'General User Enabled Successfully']);
            }
        }
    }/*****end of enable users***/

    /********
    fn to enable the users
    ********/
    public function disable_user(){
        if(isset($_POST)){
            if($_POST['type']=='business'){
                YpBusinessUsers::where('id', $_POST['id'])->update(['admin_approve' => '0']); 
                return response()->json(['success'=>'1','message'=>'Business User Disabled Successfully']);
            }else if($_POST['type']=='general'){
                YpGeneralUsers::where('id', $_POST['id'])->update(['admin_approve' => '0']); 
                return response()->json(['success'=>'1','message'=>'General User Disabled Successfully']);
            }
        }
    }/*****end of enable users***/

    /*******display page : verify business users******/
    public function showVerifyBu(){
        $verify_bu = YpVerificationBusinessUsers::with('business_user')->get()->toArray();
        return view('admin.verify_bu')->with('verify_bu',$verify_bu);
    }

    /*******change status of business users *******/
    public function changeStatus(){
        if(isset($_POST)){
            if($_POST['status']=='approve'){
                YpVerificationBusinessUsers::where('id', $_POST['id'])->update(['admin_verified_status' => '2']); 
                return response()->json(['success'=>'1','message'=>'Business User Verified Successfully.']);
            }else if($_POST['status']=='disapprove'){
                YpVerificationBusinessUsers::where('id', $_POST['id'])->update(['admin_verified_status' => '0']); 
                return response()->json(['success'=>'1','message'=>'Verification of Business User Disapproved !']);
            }
        }
    }

    //create new form for category
    public function createNewForm(Request $request)
    {
        $data = array();
        $catId = $request->id;
        try
        {

           $formData = YpFormQuestions::where('cat_id',$catId)->get();
         
           
           foreach($formData as $formQues)
           {
                $jumps=array();
                $jumpdata = YpQuesJumps::where('q_id',$formQues['id'])->get();
                $jumps[]= $jumpdata;
                $formQues['jumps'] = $jumps;
           }
           
           $data = $formData;

            return view('category_form')->with(array('id'=>$catId,'data'=>$data));
        }
        catch(Exception $e)
        {
            return view('category_form')->with(array('id'=>$catId,'message'=>$e->getMessage(),'data'=>$data));
        }
        
    }

    public function saveDynamicForm(Request $request)
    {
        try
        {
            $formid= 'f_'.time();

            if(isset($request->formdata) && !empty($request->formdata) && $request->catId!='')
            {
                YpFormQuestions::where('id', 'desc')->get();

               //check if form already exist for given category
                $YpFormQuestionsExist = YpFormQuestions::where(array('cat_id'=>$request->catId))->get();
                if(!empty($YpFormQuestionsExist))
                {
                    //check if form already exist for given category
                    $YpFormQuestionsRemove = YpFormQuestions::where('cat_id', $request->catId)->delete();
                }
                foreach($request->formdata as $data)
                {
                    
                    $is_required=0;
                    $is_filter=0;
                    if($data['type']=='textbox' || $data['type']=='textarea' || $data['type']=='datepicker'|| $data['type']=='timepicker' || $data['type']=='number'|| $data['type']=='range')
                    {
                        $YpFormQuestions = new YpFormQuestions;
                        $YpFormQuestions->formid = $formid;
                        $YpFormQuestions->cat_id = $request->catId;
                        $YpFormQuestions->qid = $data['id'];
                        $YpFormQuestions->filter = 0;
                       
                       if($data['is_required']===true || $data['is_required']==="true")
                        {
                            $is_required = 1;
                        }

                        $YpFormQuestions->required = $is_required;
                        $YpFormQuestions->options = NULL;
                        $YpFormQuestions->title = $data['title'];
                        $YpFormQuestions->type = $data['type'];
                        $YpFormQuestions->placeholder = $data['placeholder']?$data['placeholder']:NULL;
                        $YpFormQuestions->description = $data['description']?$data['description']:NULL;
                        $YpFormQuestions->min = $data['min']?'':NULL;
                        $YpFormQuestions->max =$data['max']?'':NULL;
                        $YpFormQuestions->save();
                    }
                    else
                    {
                        $YpFormQuestions = new YpFormQuestions;
                        $YpFormQuestions->formid = $formid;
                        $YpFormQuestions->cat_id = $request->catId;
                        $YpFormQuestions->qid = $data['id'];

                        if($data['is_filter']===true || $data['is_filter']==="true")
                        {
                            
                            $is_filter=1;
                        }
                         

                       if($data['is_required']===true || $data['is_required']==="true")
                        {
                           
                            $is_required = 1;
                        }
                        
                        

                        $YpFormQuestions->required = $is_required;
                        $YpFormQuestions->filter = $is_filter;
                        $YpFormQuestions->options = json_encode($data['options']);
                        $YpFormQuestions->title =$data['title'];
                        $YpFormQuestions->type =$data['type'];
                        $YpFormQuestions->placeholder = NULL;
                        $YpFormQuestions->description = NULL;
                        $YpFormQuestions->min = NULL;
                        $YpFormQuestions->max = NULL;
                        $YpFormQuestions->save();

                        $questionId = $YpFormQuestions->id; //get last question id
                        if(isset($data['conditions']) && !empty($data['conditions']))//get conditions
                        {
                            foreach($data['conditions'] as $condition)//loop through each condition
                            {
                                $operator = $condition['operator'];
                                $value = $condition['condvalue'];
                                $jumpto = $condition['queslist'];

                                //save jumps in ques_jumps table
                                $YpQuesJumps = new YpQuesJumps;
                                $YpQuesJumps->q_id = $questionId;
                                $YpQuesJumps->operator = $operator;
                                $YpQuesJumps->value = $value;
                                $YpQuesJumps->jump_to = $jumpto;
                                $YpQuesJumps->save();
                            }
                            
                        }
                    }
                    
                    
                }
                return response()->json(['success'=>'1','message'=>'Data Saved Successfully.']);
            }
            else
            {
                return response()->json(['success'=>'0','message'=>'Params Missing.']);
            }

            return response()->json(['success'=>'1','message'=>'done']);
        }
        catch(Exception $e)
        {

        }
    }


}
