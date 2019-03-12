<div class="login_body_main">
  <h1>Sign in</h1>
  <div class="login_section">
    <div class="login_with_social">
      <a href="javascript:;" class="fblogin"><img src="img/icon_F.png" class="img-fluid"/> Login with <b>Facebook</b></a>
      <a href="javascript:;" class="googlelogin"><img src="img/google_plus.png" class="img-fluid"/> Login with <b>Google+</b></a>
    </div>
    <div class="login_fields">
      <!-- <form id="sign_in_adm" method="POST" action="{{ route('business_user.login.submit') }}"> -->
           <form id="sign_in_business" method="POST" action="">
          {{ csrf_field() }}
          <span class="fill_fields bu_error" role="alert" style="display:none;">
            </span> 

            <input type="hidden" class="action_business" value="{{ route('business_user.login.submit') }}">
            <input type="hidden" class="website_url_b" value="{{ url('') }}">

          <div class="form-group col-md-12 col-12 padding_none">
            <label for="email">Email</label>
            <input type="email" class="form-control email_bu" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
            <span class="fill_fields email_business_error" role="alert" style="display:none;">
            </span>
          </div>
          <div class="form-group col-md-12 col-12 padding_none">
            <label for="password">Password</label>
            <input type="password" class="form-control password_bu" name="password" placeholder="Password">
            <span class="fill_fields password_business_error" role="alert" style="display:none;">
          </div>
          <p class="forgot_pass"><a href="javascript:;">Forgot your password?</a></p>
          <div class="login_btn"><a><input type="submit" value="Login"></a></div>
          <div class="register_page"><a href="{{ route('business_user.register') }}">Register</a></div>
      </form>
    </div>
  </div>
</div>