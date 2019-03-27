<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSuperCategories;
use DB;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = YpBusinessCategories::all()->take(7)->toArray();
        $super_categories = DB::table('yp_business_super_categories')
            ->join('yp_business_categories', 'yp_business_super_categories.super_cat_id', '=', 'yp_business_categories.super_cat_id')
            ->select('yp_business_super_categories.*')
            ->distinct('yp_business_categories.super_cat_id')
            ->take(7)
            ->get()->toArray();

         //echo '<pre>';print_r($super_categories); echo '</pre>';
         foreach($super_categories AS $super_cat){
            $arr['id'] = $super_cat->id;
            $arr['super_cat_id'] = $super_cat->super_cat_id;
            $arr['cat_name'] = $super_cat->cat_name;
            $arr['category_status'] = $super_cat->category_status;
            $arr['created_at'] = $super_cat->created_at;
            $arr['updated_at'] = $super_cat->updated_at;
            $final[] = $arr;
         }

        return view('dashboard')->with(array('categories'=>$final));
    }

    public function moreSuperCatogries(){
        $skip = $_POST['skip'];
        //$categories = YpBusinessSuperCategories::skip($skip)->take(7)->select('cat_name AS category_name','super_cat_id AS id')->get()->toArray();

        $super_categories = DB::table('yp_business_super_categories')
            ->join('yp_business_categories', 'yp_business_super_categories.super_cat_id', '=', 'yp_business_categories.super_cat_id')
            ->select('yp_business_super_categories.cat_name AS category_name','yp_business_super_categories.super_cat_id AS id')
            ->distinct('yp_business_categories.super_cat_id')
            ->skip($skip)
            ->take(7)
            ->get()->toArray();

        foreach($super_categories AS $super_cat){
            $arr['id'] = $super_cat->id;
            $arr['category_name'] = $super_cat->category_name;
            $categories[] = $arr;
         }
        //echo '<pre>';print_r($final); echo '</pre>';die;

        //$next_categories = YpBusinessSuperCategories::skip($skip+7)->take(7)->get()->toArray();
         $next_categories = DB::table('yp_business_super_categories')
            ->join('yp_business_categories', 'yp_business_super_categories.super_cat_id', '=', 'yp_business_categories.super_cat_id')
            ->select('yp_business_super_categories.cat_name AS category_name','yp_business_super_categories.super_cat_id AS id')
            ->distinct('yp_business_categories.super_cat_id')
            ->skip($skip+7)
            ->take(7)
            ->get()->toArray();


        $next = count($next_categories);
        $categories['next'] = $next;
        return json_encode($categories);
    }

    
    
    public function getCategories($id = null){
        $categories = YpBusinessCategories::where('super_cat_id',$id)->get()->toArray();
        //$super_categories = YpBusinessSuperCategories::all()->take(7)->toArray();
        if($id == '' || count($categories) == 0){
            return abort(404);
        }else{
            return view('dashboard_categories')->with(array('categories'=>$categories));
        }
    }
    public function moreCatogries(){
        $skip = $_POST['skip'];
        $super_id = $_POST['super_id'];
        $categories = YpBusinessCategories::skip($skip)->take(7)->where('super_cat_id',$super_id)->get()->toArray();
        $next_categories = YpBusinessCategories::skip($skip+7)->take(7)->where('super_cat_id',$super_id)->get()->toArray();
        $next = count($next_categories);
        $categories['next'] = $next;
        return json_encode($categories);
    }
}
