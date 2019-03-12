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
      
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);
     
      // Attempt to log the user in
      if (Auth::guard('business_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {


        if(Auth::guard('business_user')->user()->admin_approve == '1'){
            return response()->json(['success'=>'1','message'=>'Login Successfull', 'url'=>'/business_user/business_dashboard']);
        }else{
            Auth::guard('business_user')->logout();
            return response()->json(['success'=>'0','message'=>'Account is not Approved by admin !']);
        }
      	
        // if successful, then redirect to their intended location
       // return redirect()->intended(route('business_user.dashboard'));
        
      } 
      // if unsuccessful, then redirect back to the login with the form data
      //return redirect()->back()->withInput($request->only('email', 'remember'));
      return response()->json(['success'=>'0','message'=>'Credentials do not match!']);
    }
    
    public function logout()
    {
        Auth::guard('business_user')->logout();
        //return redirect()->intended('/');
        return redirect('/');
    }
    public function beforeLogin(){
      return view('/business/business_index');
    }
}
