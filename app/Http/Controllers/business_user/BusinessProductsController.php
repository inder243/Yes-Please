<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\BusinessProducts;
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


    /********************
    Show quote request page
    **********************/
    public function showProducts(Request $request){

            
            return view('business.products.products');

    }/*****end of show quote request fn******/

    

}