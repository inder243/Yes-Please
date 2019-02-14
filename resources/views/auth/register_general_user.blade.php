@extends('layouts.reg_general')

@section('content')

<section class="register_step_1">
      <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>{{ __('Registration') }}</span></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="registration_main">
              <h1>{{ __('Registration') }}</h1>

              <div class="registration_filed_user">
                 <form method="POST" role="form" id="general_user_reg" action="{{ route('general_user.register.submit') }}" enctype="multipart/form-data">
                        @csrf
                <div class="upload_section">
                 <div class="preview">
                   <img src="{{ asset('img/upload_img_placeholder.png') }}" id="blah"/>
                   <span class=""></span>
                 </div>
                <div class="upload_image_profile">
                  <div class="upload_image">
                     <input type="file" name="file" class="form-control-file" id="imgInp" accept="image/*" value="{{ old('file') }}">
                     <button>{{ __('Upload image profile') }}</button>
                  </div>
                </div>
              </div>
 
                <div class="registrationform user_registration_form">

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="first_name">{{ __('First name') }} <span class="mandatery_star">*</span></label>
                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' error_border' : '' }}" name="first_name" value="{{old('first_name')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('first_name'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('first_name') }}
                                </span>
                            @endif

                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="last_name">{{ __('Last name') }} <span class="mandatery_star">*</span></label>
                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' error_border' : '' }}" name="last_name" value="{{old('last_name')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('last_name'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('last_name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="city">{{ __('City') }} <span class="mandatery_star">*</span></label>
                            <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' error_border' : '' }}" name="city" value="{{old('city')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('city'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('city') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="email">{{ __('Email address') }} <span class="mandatery_star">*</span></label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' error_border' : '' }}" name="email" value="{{old('email')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('email'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="password">{{ __('Password') }} <span class="mandatery_star">*</span>
                            </label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' error_border' : '' }}" name="password" value="{{old('password')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('password'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="inputPassword4">{{ __('Phone number') }} <span class="mandatery_star">*</span></label>
                            <input id="phone_number" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control{{ $errors->has('phone_number') ? ' error_border' : '' }}" name="phone_number" value="{{old('phone_number')}}" onkeyup="remove_errormsg(this)" autofocus>

                            @if ($errors->has('phone_number'))
                                <span class="fill_fields" role="alert">
                                    {{ $errors->first('phone_number') }}
                                </span>
                            @endif
                            <span class="notall_business"> {{ __('Not all businesses will send quotes to users without phone number') }}</span>
                        </div>
                    </div>

                    <div class="agree">
                        <div class="terms_agree">
                            <div class="formcheck forcheckbox">
                                <label>
                                    <input type="checkbox" id="option" class="radio-inline" name="checkbox" value="1" {{(old('checkbox') == "1") ? 'checked': ''}}>
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>I agree to <a href="#">Service terms</a> and <a href="#">Privacy policy </a></p>

                                </label>
                            </div>
                        </div>
                        @if ($errors->has('checkbox'))
                            <span class="fill_fields option_accept check-center" role="alert">
                                {{ $errors->first('checkbox') }}
                            </span>
                        @endif

                    </div>
                </div>
            <div class="general_user_register"><button>Register</button></div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>

@endsection

