<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\BusinessProducts;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessProductPromote;
use App\Models\YpBusinessUserCategories;
use File;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class BusinessProductsController extends Controller
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


    /****
    **Show quote request page
    ****/
    public function showProducts(Request $request){

            $b_id            = Auth::user()->id;

            $get_allproducts = BusinessProducts::with('get_cat_name')->where('business_id',$b_id)->get()->toArray();
            
            return view('business.products.products')->with(['all_products'=>$get_allproducts]);

    }/*****end of show quote request fn******/


    /***
    **fn to get categories to display on add product popup
    ****/
    public function getCategories(){
        $b_id            = Auth::user()->id;
      
        $allCategories = YpBusinessUserCategories::with('get_category')->where('business_userid',$b_id)->get()->toArray();
        
        /***make html for all category list***/
        $cat_html = '<option value="" selected disabled>Choose Category</option>';

        if(!empty($allCategories)){
            foreach($allCategories as $cat_key=>$cat_value){
                $cat_html .= '<option data-supercat_id ="'.$cat_value['get_category']['super_cat_id'].'" data-cat_id = "'.$cat_value['get_category']['category_id'].'" value="'.$cat_value['category_id'].'">'.$cat_value['get_category']['category_name'].'</option>';
            }

            return response()->json(['success'=>'1','message'=>'Success','cat_html'=>$cat_html]);

        }else{
            return response()->json(['success'=>'2','message'=>'No Category Found']);
        }

    }/**fn ends here to get catehories**/

    /***************
    remove images from quote request
    ***************/
    public function removeImagesProducts(){
        $id = Auth::user()->business_userid;
        if(isset($_POST['id'])){
            $filename = $_POST['id'];
            $image_path = public_path().'/images/business_products/'.$id.'/'.$filename;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
                echo "yes";die;
            }else{
                echo "no";die;
            }
        }/****end of isset****/
    }/******remove images fn ends*******/

    /*******
    function to upload multiple files for verify user
    *******/
    public function uploadUserMultipleFilesProducts(Request $request){
        $id = Auth::user()->business_userid;
        if ($request->hasFile('file')) {
            $file = $request->file('file');             
            $extension = $file->getClientOriginalExtension(); // getting image extension  
            $originalName = $file->getClientOriginalName();
            $name=explode('.',$originalName)[0];
            $filename = $name.'_'.rand().'.'.$extension;
            if($file->move(public_path().'/images/business_products/'.$id.'/', $filename)){
                echo $filename;
            }else{
                echo 'false';
            }
        }
    }

    /****
    **Fn to save products- add products
    *****/
    public function saveProducts(Request $request){

        $business_user_id   = Auth::user()->business_userid;
        $b_id               = Auth::user()->id;

        if(isset($_POST)){

            if(isset($request->product_name)){
                $name = $request->product_name;
            }else{
                $name = '';
            }

            if(isset($request->allCategoryList)){
                $category_id = $request->allCategoryList;
            }else{
                $category_id = '';
            }

            if(isset($request->radios)){
                $price_type = $request->radios;
            }else{
                $price_type = '';
            }

            if(isset($request->product_price)){
                $price = $request->product_price;
            }else{
                $price = '';
            }

            if(isset($request->product_price_from)){
                $price_from = $request->product_price_from;
            }else{
                $price_from = '';
            }

            if(isset($request->product_price_to)){
                $price_to = $request->product_price_to;
            }else{
                $price_to = '';
            }

            if(isset($request->product_price_per)){
                $price_per = $request->product_price_per;
            }else{
                $price_per = '';
            }

            if(isset($request->product_description)){
                $product_description = $request->product_description;
            }else{
                $product_description = '';
            }

            /***create product id***/
            $product_id = str_shuffle(rand(1,1000).strtotime("now"));
            $ypBusinessProducts = new BusinessProducts;

            $ypBusinessProducts->product_id             = $product_id;
            $ypBusinessProducts->business_id            = $b_id;
            $ypBusinessProducts->name                   = $name;
            $ypBusinessProducts->category_id            = $category_id;
            $ypBusinessProducts->price_type             = $price_type;
            $ypBusinessProducts->price                  = $price;
            $ypBusinessProducts->price_from             = $price_from;
            $ypBusinessProducts->price_to               = $price_to;
            $ypBusinessProducts->price_per              = $price_per;
            $ypBusinessProducts->product_description    = $product_description;
            $ypBusinessProducts->save();

            $pic_vid = BusinessProducts::select('product_images')->where('product_id', '=',  $product_id)->get()->toArray();

            /****check selected files from button****/
            if ($request->hasFile('myfile')) {
                foreach($request->file('myfile') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/business_products/'.$business_user_id.'/', $filename)){                
                        if(!empty($pic_vid[0]['product_images'])){
                            $pic_vid_arr = json_decode($pic_vid[0]['product_images']);
                            $pic_vid_arr->pic[] = $filename;
                        }else{
                            $pic_vid_arr['pic'][] = $filename;
                        }
                        
                        
                        
                    }
                }

                $pic_vid_json = json_encode($pic_vid_arr);
                $ypBusinessProducts->product_images = $pic_vid_json;
                $ypBusinessProducts->save();
                
            }/*********code ends to upload selected files********/

            

            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                foreach ($_POST['dropzone_file'] as $filenames) {

                   $pic_vid1 = BusinessProducts::select('product_images')->where('product_id', '=',  $product_id)->get()->toArray();
                    if(!empty($pic_vid1[0]['product_images'])){
                        $pic_vid_arr = json_decode($pic_vid1[0]['product_images']);
                        $pic_vid_arr->pic[] = $filenames;
                    }else{
                        $pic_vid_arr['pic'][] = $filenames;
                    }

                    $pic_vid_json = json_encode($pic_vid_arr);
                    
                    $ypBusinessProducts->product_images = $pic_vid_json;
                    $ypBusinessProducts->save();
                }

                
            }/*****drag and drop ends*****/

            return redirect('business_user/products');
        }/**isset post ends**/


    }/***fn ends add products save products***/


    /*****
    **get product detail edit product
    *****/ 
    public function getProductDetail(Request $request){

        $product_id = $request->product_id;
        $b_id       = Auth::user()->id;
        $business_user_id   = Auth::user()->business_userid;

        $get_product_detail = BusinessProducts::where(['product_id'=>$product_id,'business_id'=>$b_id])->first();

        $name = $get_product_detail->name;
        $category_id = $get_product_detail->category_id;
        $price_type = $get_product_detail->price_type;
        $price = $get_product_detail->price;
        $price_from = $get_product_detail->price_from;
        $price_to = $get_product_detail->price_to;
        $price_per = $get_product_detail->price_per;
        $product_description = $get_product_detail->product_description;
        $product_images = $get_product_detail->product_images;


        /*****selected images html****/
        if(!empty($product_images)){
            $uploads = json_decode($product_images,true);
        }

        $selectImgHtml = '';
        if(!empty($uploads)){
            foreach($uploads['pic'] as $img){
                $img_name = explode( '.', $img );

                $selectImgHtml .= '<li class="imguploaded" id="img_'.$img_name[0].'"><div class="image"><img src="'.url('/').'/images/business_products/'.$business_user_id.'/'.$img.'"></div><div class="input_des product_img_des"><textarea placeholder="Input description"></textarea></div><a href="javascript:;" data-img="'.$img.'" data-product_id="'.$product_id.'" onclick="deleteProductSelectedImg(this);" class="product_imgcross"><img src="'.url('/').'/img/line_cross.png"></a></li>';
            }
        }

        $allCategories = YpBusinessUserCategories::with('get_category')->where('business_userid',$b_id)->get()->toArray();
        
        /***make html for all category list***/
        $cat_html = '<option value="" selected disabled>Choose Category</option>';

        if(!empty($allCategories)){
            foreach($allCategories as $cat_key=>$cat_value){
                if($category_id == $cat_value['category_id']){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                $cat_html .= '<option data-supercat_id ="'.$cat_value['get_category']['super_cat_id'].'" data-cat_id = "'.$cat_value['get_category']['category_id'].'" value="'.$cat_value['category_id'].'" '.$selected.'>'.$cat_value['get_category']['category_name'].'</option>';
            }

            return response()->json(['success'=>'1','message'=>'Success','cat_html'=>$cat_html,'name'=>$name,'price_type'=>$price_type,'price'=>$price,'price_from'=>$price_from,'price_to'=>$price_to,'price_per'=>$price_per,'product_description'=>$product_description,'product_id'=>$product_id,'selectImgHtml'=>$selectImgHtml]);

        }else{
            return response()->json(['success'=>'2','message'=>'No Category Found','name'=>$name,'price_type'=>$price_type,'price'=>$price,'price_from'=>$price_from,'price_to'=>$price_to,'price_per'=>$price_per,'product_description'=>$product_description,'product_id'=>$product_id,'selectImgHtml'=>$selectImgHtml]);
        }

        //echo "<pre>";print_r(->id);die;
    }/**end fn**/

    /******
    fn to edit products
    ******/
    public function editProducts(Request $request){
        
        if(isset($_POST)){
            $product_id = $request->hidden_product_id;
            $b_id       = Auth::user()->id;
            $business_user_id   = Auth::user()->business_userid;

            if(isset($request->product_name)){
                $name = $request->product_name;
            }else{
                $name = '';
            }

            if(isset($request->allCategoryList)){
                $category_id = $request->allCategoryList;
            }else{
                $category_id = '';
            }

            if(isset($request->radios)){
                $price_type = $request->radios;
            }else{
                $price_type = '';
            }

            if(isset($request->product_price)){
                $price = $request->product_price;
            }else{
                $price = '';
            }

            if(isset($request->product_price_from)){
                $price_from = $request->product_price_from;
            }else{
                $price_from = '';
            }

            if(isset($request->product_price_to)){
                $price_to = $request->product_price_to;
            }else{
                $price_to = '';
            }

            if(isset($request->product_price_per)){
                $price_per = $request->product_price_per;
            }else{
                $price_per = '';
            }

            if(isset($request->product_description)){
                $product_description = $request->product_description;
            }else{
                $product_description = '';
            }

            $update = array('name' => $name,'category_id' => $category_id,'price_type'=>$price_type,'price'=>$price,'price_from'=>$price_from,'price_to'=>$price_to,'price_per'=>$price_per,'product_description'=>$product_description);
            BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);


            $pic_vid = BusinessProducts::select('product_images')->where('product_id', '=',  $product_id)->get()->toArray();

            /****check selected files from button****/
            if ($request->hasFile('myfile')) {
                foreach($request->file('myfile') as $files){
                    $file = $files;             
                    $extension = $file->getClientOriginalExtension(); // getting image extension            
                    $filename = rand(10,100).time().'.'.$extension;
                    
                    if($file->move(public_path().'/images/business_products/'.$business_user_id.'/', $filename)){                
                        if(!empty($pic_vid[0]['product_images'])){
                            $pic_vid_arr = json_decode($pic_vid[0]['product_images']);
                            $pic_vid_arr->pic[] = $filename;
                        }else{
                            $pic_vid_arr['pic'][] = $filename;
                        }
                        
                        
                        
                    }
                }

                $pic_vid_json = json_encode($pic_vid_arr);

                $update = array('product_images' => $pic_vid_json);
                BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);

                
            }/*********code ends to upload selected files********/

            

            /*******check drag and drop files********/
            if(isset($_POST['dropzone_file']) && !empty($_POST['dropzone_file'])){
                foreach ($_POST['dropzone_file'] as $filenames) {

                   $pic_vid1 = BusinessProducts::select('product_images')->where('product_id', '=',  $product_id)->get()->toArray();
                    if(!empty($pic_vid1[0]['product_images'])){
                        $pic_vid_arr = json_decode($pic_vid1[0]['product_images']);
                        $pic_vid_arr->pic[] = $filenames;
                    }else{
                        $pic_vid_arr['pic'][] = $filenames;
                    }

                    $pic_vid_json = json_encode($pic_vid_arr);
                    
                    $update = array('product_images' => $pic_vid_json);
                    BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);
                   
                }

                
            }/*****drag and drop ends*****/

            return redirect('business_user/products');
        }
    }/****fn ends***/

    /********
    **fn to delete products
    ***********/
    public function deleteProduct(Request $request){
        $product_id = $request->product_id;

        $check_product = BusinessProducts::where('product_id', $product_id)->get()->toArray();

        if(!empty($check_product)){

            $deletedRows = BusinessProducts::where('product_id', $product_id)->delete();
            return response()->json(['success'=>'1','message'=>'Success']);

        }else{
            return response()->json(['success'=>'0','message'=>'Error']);
        }
        
    }/***fn ends**/

    /******
    **Fn to delete selected product images
    *****/
    public function removeProductelectedImages(){
        $business_user_id = Auth::user()->business_userid;
        $b_id = Auth::user()->id;

        if(isset($_POST)){
            $filename = $_POST['img_name'];
            $product_id = $_POST['product_id'];
            $image_path = public_path().'/images/business_products/'.$business_user_id.'/'.$filename;  // Value is not URL but directory file path

            $check_img_json = BusinessProducts::select('product_images')->where(['business_id'=>$b_id,'product_id'=>$product_id])->get()->toArray();
            
            if(!empty($check_img_json)){
                $img_json = json_decode($check_img_json[0]['product_images'],true);
                $new_images = array_diff($img_json['pic'], [$filename]);

                if(!empty($new_images)){
                    foreach($new_images as $key=>$img){
                        $pic_vid_arr['pic'][] = $img;
                    }
                    
                    $new_json_pics = json_encode($pic_vid_arr);
                    $update = array(
                        'product_images'       => $new_json_pics
                    );
                    BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);
                }else{
                    $update = array(
                        'product_images'       => null
                    );
                    BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);
                }
                   
            } /***end if not empty***/ 

            if(File::exists($image_path)) {

                File::delete($image_path);

                return response()->json(['success'=>'1','message'=>'Image deleted successfully']);
            }else{
                return response()->json(['success'=>'0','message'=>'Please try again later!']);
            }

        }/****end of isset****/
    }/***remove selected product images ends here**/

    /*******
    ***Open promote products popup
    ******/
    public function openProductelectedImages(Request $request){
        if(isset($_POST)){
            $b_id           = Auth::user()->id;
            $product_id     = $request->product_id;

            $check_promoteProductData = YpBusinessProductPromote::where(['product_id'=>$product_id,'business_id'=>$b_id])->first();

            if(!empty($check_promoteProductData)){
                $pay_per_click  = $check_promoteProductData->pay_per_click;
                $daily_budget   = $check_promoteProductData->daily_budget;
                $end_date       = $check_promoteProductData->end_date;

                return response()->json(['success'=>'1','message'=>'Successfully Added','pay_per_click'=>$pay_per_click,'daily_budget'=>$daily_budget,'end_date'=>$end_date]);
            }else{
                return response()->json(['success'=>'2','message'=>'No data Found']);
            }

        }/***if isset ends here***/
    }/**open promote products ends**/

    /********
    ***Add promote products
    ********/
    public function addPromoteProducts(Request $request){
        if(isset($_POST)){
            $b_id           = Auth::user()->id;
            $pay_per_click  = $request->pay_per_click;
            $daily_budget   = $request->daily_budget;
            $end_date       = $request->end_date;
            $product_id     = $request->product_id;
            
            $check_promoteProductData = YpBusinessProductPromote::where(['product_id'=>$product_id,'business_id'=>$b_id])->first();

            if(empty($check_promoteProductData)){
                $YpBusinessProductPromote = new YpBusinessProductPromote;

                $YpBusinessProductPromote->product_id       = $product_id;
                $YpBusinessProductPromote->business_id      = $b_id;
                $YpBusinessProductPromote->pay_per_click    = $pay_per_click;
                $YpBusinessProductPromote->daily_budget     = $daily_budget;
                $YpBusinessProductPromote->end_date         = $end_date;
                $YpBusinessProductPromote->save();

                return response()->json(['success'=>'1','message'=>'Successfully Added']);
            }else{
                $update = array('pay_per_click' => $pay_per_click,'daily_budget' => $daily_budget,'end_date'=>$end_date);
                YpBusinessProductPromote::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);
                return response()->json(['success'=>'1','message'=>'Successfully updated']);
            }

        }/**if isset ends here**/
    }/****add promote products ends here****/

    /*********
    **Show product data
    *********/
    public function showProductData(Request $request){
        if(isset($_POST)){ 
            $product_id = $request->product_id;
            $get_product_detail = BusinessProducts::with('get_business')->where('product_id',$product_id)->first();
            
            $product_name           = $get_product_detail->name;
            $price_type             = $get_product_detail->price_type;
            $price                  = $get_product_detail->price;
            $price_from             = $get_product_detail->price_from;
            $price_to               = $get_product_detail->price_to;
            $price_per              = $get_product_detail->price_per;
            $product_description    = $get_product_detail->product_description;
            $product_images         = $get_product_detail->product_images;
            $business_name          = $get_product_detail->get_business->business_name;
            $business_user_id       = $get_product_detail->get_business->business_userid;

            if($price_type == 'fix'){
                $final_price = '$'.$price;
                $final_price_per = '';
            }else if($price_type == 'range'){
                $final_price = '$'.$price_from.' - $'.$price_to;
                if($price_per == "1"){
                    $price_perr = "hr";
                }else if($price_per == "2"){
                    $price_perr = 'min';
                }else if($price_per == "3"){
                    $price_perr = 'sec';
                }else{
                    $price_perr = 'day';
                }

                $final_price_per = '/'.$price_perr;
            }

            /*****selected images html****/
            if(!empty($product_images)){
                $uploads = json_decode($product_images,true);
            }

            $selectImgHtml = '';
            if(!empty($uploads)){
                foreach($uploads['pic'] as $img){
                    $img_name = explode( '.', $img );

                    $selectImgHtml .= '<li class="imguploaded" id="img_'.$img_name[0].'" data-image="'.url('/').'/images/business_products/'.$business_user_id.'/'.$img.'" onclick="openBigImage(this);return false;"><img src="'.url('/').'/images/business_products/'.$business_user_id.'/'.$img.'"></li>';
                }
            }


            $modal_html = '<div class="p-heading"><h1>'.$business_name.'</h1></div><div class="upper-catergory"><div class="row"><div class="col-md-12 col-12"><div class="pr-name"><div class="p-name"><h1>'.$product_name.'</h1></div><div class="p_price"><h1>'.$final_price.'</h1><span>'.$final_price_per.'</span></div></div><div class="product-lorem-text"><p>'.$product_description.'</p></div><div class="cat_business_name"><ul>'.$selectImgHtml.'</ul></div></div></div>
                </div>';


            return response()->json(['success'=>'1','message'=>'success','modal_html'=>$modal_html,'price_type']);

        }/*** isset code ends here ***/
    }/***show product ends here***/

    /*******
    **fn to stop product
    ********/
    public function stopProduct(Request $request){
        $product_id         = $request->product_id;
        $productStatus      = $request->productStatus;
        $get_product_detail = BusinessProducts::with('get_business')->where('product_id',$product_id)->first();
        $b_id               = Auth::user()->id;

        if(!empty($get_product_detail)){

            if($productStatus == 1){
                $update = array('status' => 0);

                $businessProduct_update = BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update);

                if($businessProduct_update){
                    return response()->json(['success'=>'1','message'=>'successfully updated']); 
                }else{
                    return response()->json(['success'=>'0','message'=>'Please try again!']); 
                }
                
            }else if($productStatus == 0){
                $update1 = array('status' => 1);

                $businessProduct_update1 = BusinessProducts::where(['business_id'=>$b_id,'product_id'=>$product_id])->update($update1);

                if($businessProduct_update1){
                    return response()->json(['success'=>'3','message'=>'successfully updated']); 
                }else{
                    return response()->json(['success'=>'0','message'=>'Please try again!']); 
                }
            }


        }else{
            return response()->json(['success'=>'2','message'=>'No user found']); 
        }
        
    }/****fn ends to stop product****/

}