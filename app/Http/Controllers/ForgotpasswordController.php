<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotMail;
use App\Models\YpAdmins;
use DB;
use Session;

class ForgotpasswordController extends Controller
{
    
    public function forgot_password_admin()
    {
        return view('forgot_password');
    }

    public function check_email_admin(Request $request)
    {

    	if($_POST)
    	{
           
    		$check_email = DB::table('yp_admins')->where('email', $_POST['admin_email'])->first();
		
			if(!empty($check_email->id))
			{
				   $data=$check_email->id;	
				   $toEmail = $_POST['admin_email'];
				   Mail::to($toEmail)->send(new ForgotMail($data));
				   Session::flash('success_message', 'Email sent successfully.');
	        	   return redirect()->back()->withInput($request->only('admin_email'));
			}
			else
			{
				Session::flash('error_message', 'Email does not exist');
	        	return redirect()->back()->withInput($request->only('admin_email'));
			}
    	
    	}
    
        return view('forgot_password');
    }

    public function reset_password($id)
    {

    	// echo '<pre>'; print_r($id); die('here');
    	$data = DB::table('yp_admins')->where('id', $id)->first();

    	return view('reset_password')->with('data', $data);

    }


    public function update_password()
    {
    		// echo '<pre>'; print_r($_POST); die('here');
    		if($_POST['new_pass']==$_POST['confirm_pass'])
			{
				DB::table('yp_admins')
                ->where('id', $_POST['hidden_id'])
                ->update(['password' => bcrypt($_POST['confirm_pass'])]);

				   Session::flash('success_message', 'Password changed successfully.');
	        	   return redirect()->route('admin.login.submit');
			}
			else
			{
				Session::flash('error_message', 'Password did not matched');
	        	return back()->withInput();
			}

    }

}
