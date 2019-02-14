@extends('layouts.ypapp_inner')

@section('content')
<div class="login_fields">
	<form id="forgot_password_admin" method="POST" action="{{ url('/business_user/forgot_password_submit') }}">
		@csrf
		<input type="email" class="form-control text_email" name="email" placeholder="Email Address" value="" required="" autofocus="">

		<div class="login_btn"><a><input type="button" id="forgot_password" value="Submit"></a></div>
	</form>
</div>

@endsection