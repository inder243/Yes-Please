<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessCategories;


class BusinessUserController extends Controller{

	public function get_categories(Request $header_request){
		// $decodedArray = json_decode( file_get_contents('php://input'),true);			
		// $_POST = $decodedArray;

		// $this->app_version      = $header_request->header('app-version');
  //       $this->device_type      = strtoupper($header_request->header('device-type'));
  //       $this->device_token     = $header_request->header('device-token');
  //       $this->time_zone        = $header_request->header('time-zone');
  //       $this->header_api_token = $header_request->header('api-token');

  //       if($this->app_version=='' || $this->device_type =='' || $this->device_token=='' || $this->time_zone =='' || $this->header_api_token==''){        	 
  //           return response()->json(['success' => 0,'message'=>'Insufficient data in headers'],200);
  //           exit;
  //       }   

		// $get_cat = "SELECT cat.category_id,cat.category_name, sub_cat.sub_category_id,sub_cat.sub_category_name FROM `yp_business_categories` as cat INNER JOIN `yp_business_sub_categories` as sub_cat ON cat.id=sub_cat.cat_id"
		
		//$all_categories = YpBusinessCategories::select ('category_id', 'category_name')->get()->toArray();
		$all_categories = YpBusinessCategories::with('sub_category')->get();

		return response()->json(['success'=>1,'data'=>$all_categories],200);
		//print'<pre>';print_r($all_categories);die;
	}
}
?>