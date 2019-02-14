<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\YpBusinessUsers;

class BusinessUserLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:business_user', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.business_user_login');
    }
    
    public function login(Request $request)
    {
      // $get_data = YpBusinessUsers::where('email',$request->email)->get()->toArray();
      // //echo '<pre>';print_r($get_data); die;
      // $completed_steps = $get_data[0]['completed_steps'];
      // $business_user_id = $get_data[0]['business_userid'];
      // $arr = array('1'=>'one','2'=>'two','3'=>'three','4'=>'four','5'=>'five','6'=>'six','7'=>'seven');
      // if($completed_steps != 7){
      //   //echo $arr[$completed_steps+1].' '.$business_user_id; die;
      //   return response()->json(['success'=>'0','message'=>'pending', 'url'=>'business_user/register_'.$arr[$completed_steps+1].'/'.$business_user_id]);
      //   //return redirect()->intended('business_user/register_'.$arr[$completed_steps+1].'/'.$business_user_id);
      // }
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('business_user')->attempt(['email' => $request->email, 'password' => $request->password,'admin_approve'=>'1'], $request->remember)) {
      	
        // if successful, then redirect to their intended location
       // return redirect()->intended(route('business_user.dashboard'));
        return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/business_user/business_dashboard']);
      } 
      // if unsuccessful, then redirect back to the login with the form data
      //return redirect()->back()->withInput($request->only('email', 'remember'));
      return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
    }
    
    public function logout()
    {
        Auth::guard('business_user')->logout();
        return redirect()->intended('/');
    }
    public function beforeLogin(){
      return view('/business/business_index');
    }
}
