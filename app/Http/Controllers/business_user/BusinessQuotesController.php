<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use File;
use Illuminate\Support\Facades\DB;
use Session;

class BusinessQuotesController extends Controller
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


    /*********************************
	Display quotes and questions pages
    *********************************/
    public function showQuotesQuestions(){
    	return view('business.quotes_questions.quotes_questions');
    }

    /*****************
    submit quotes page
    *****************/
    public function quotesSubmit(Request $request){
    	echo "<pre>";print_r('test quotes page');
    }/******quotes submit ends******/

}