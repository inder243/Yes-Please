<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class YpBusinessUserCategories extends Model
{
    protected $fillable = [
       'business_userid','category_id','sub_category_id'
    ];

    public function get_user_categories($user_id)
    { 
        $business_category_ids = DB::table('yp_business_user_categories AS y_b_u_c')->where('y_b_u_c.business_userid',$user_id)
        		->join('yp_business_categories AS y_b_c', 'y_b_u_c.category_id', '=', 'y_b_c.category_id')
        		->distinct()
	        	->select('y_b_u_c.category_id','y_b_c.category_name')
	        	->get()->toArray(); 

	    //echo '<pre>';print_r($business_category_ids); echo '</pre>'; die;
        $i = 0;
        if(!empty($business_category_ids)){
	        foreach($business_category_ids as $value){
	        	$category_id = $value->category_id;
	        	$parent_category_name = $value->category_name;
	        	$result[$i]['id'] = $category_id;
	        	$result[$i]['name'] = $parent_category_name;
	        	$result[$i]['values'] = DB::table('yp_business_user_categories AS y_b_u_c')->where('category_id',$category_id)
	        	->join('yp_business_sub_categories AS y_b_s_c', 'y_b_u_c.sub_category_id', '=', 'y_b_s_c.sub_category_id')        	
	        	->select('y_b_u_c.sub_category_id','y_b_s_c.sub_category_name')
	        	->get()->toArray();         
	        	$i++;
	        }

    	}else{
    		$result = '';
    	}
    	//echo '<pre>';print_r($result); echo '</pre>';
    	return $result;
    }
}
