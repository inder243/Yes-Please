<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSuperCategories;

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
        //$categories = YpBusinessCategories::all()->take(7)->toArray();
        $super_categories = YpBusinessSuperCategories::all()->take(7)->toArray();
        //echo '<pre>';print_r($categories); echo '</pre>';
        return view('dashboard')->with(array('categories'=>$super_categories));
    }

    public function moreSuperCatogries(){
        $skip = $_POST['skip'];
        $categories = YpBusinessSuperCategories::skip($skip)->take(7)->select('cat_name AS category_name','super_cat_id AS id')->get()->toArray();
        $next_categories = YpBusinessSuperCategories::skip($skip+7)->take(7)->get()->toArray();
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
        $next_categories = YpBusinessCategories::skip($skip+7)->take(7)->get()->toArray();
        $next = count($next_categories);
        $categories['next'] = $next;
        return json_encode($categories);
    }
}
