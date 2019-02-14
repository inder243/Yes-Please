@extends('layouts.ypapp_inner')

@section('content')

<section class="register_step_1">
    <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>{{ __('Registration') }}</span></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="registration_main">
                    <h1>{{ __('Registration') }}</h1>
                        <div class="registration_steps">
                            <ul>
                                <li><span class="completed">1</span></li>
                                <li><span class="activespan">2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
                            </ul>
                        </div>
                    <form method="POST" id="stepone_bu_reg" action="{{ url('/business_user/register_two/'.$id) }}">
                        @csrf
                        <div class="registration_filed">
                            <h1>Online presence</h1>
                            <p>Are you social? Connect your facebook profile and add your website with your
                            facebook group/page</p>
                            <div class="registrationform">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="url">{{ __('URL') }}</label>
                                        <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' error_border' : '' }}" name="url" value="@if(!empty($get_register_val)){{$get_register_val[0]['website_url'] }}@else{{old('url')}}@endif" autofocus>

                                        @if ($errors->has('url'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('url') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="fb_url">{{ __('Facebook group URL') }}</label>
                                        <input id="fb_url" type="text" class="form-control{{ $errors->has('fb_url') ? ' error_border' : '' }}" name="fb_url" value="@if(!empty($get_register_val)){{$get_register_val[0]['facebook_url']}}@else{{old('fb_url')}}@endif" autofocus>

                                        @if ($errors->has('fb_url'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('fb_url') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <div class="connect_facebook"><a href="javascript:;">Connect facebook profile</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="next_back_button">
                                <div class="back"><a href="{{ url('/business_user/register/'.$id) }}">< Back</a></div>
                                <div class="next"><input type="submit" id="next_submit" value="Next >"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

