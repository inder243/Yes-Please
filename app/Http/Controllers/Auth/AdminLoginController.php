<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.admin_login');
    }
    
    public function login(Request $request)
    {

      // Validate the form data
      // $this->validate($request, [
      //   'email'   => 'required|email',
      //   'password' => 'required'
      // ]);

      $validator = Validator::make($_POST, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return redirect()->route('admin.login')->withInput()->withErrors($validator);
        }

      
      // echo '<pre>'; print_r($request->email); 
      // echo '<pre>'; print_r($request->password); die;
      
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
      	// if successful, then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      } 
      else
      {
        Session::flash('message', 'Credentials do not match');
        return redirect()->back()->withInput($request->only('email', 'password'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'password'));
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
