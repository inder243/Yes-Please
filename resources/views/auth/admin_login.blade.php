@extends('layouts.admin')

    @section('content')
        <form id="sign_in_adm" method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
        
            @if (Session::has('success_message'))
            <span class="fill_fields" role="alert">{{ Session::get('success_message') }}</span>
            @endif
            <div class="form-group">
                <input type="email" class="form-control{{ $errors->has('email') ? ' error_border' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                <span class="fill_fields" role="alert">{{ $errors->first('email') }}</span>
                @endif

                @if (Session::has('message'))
                <span class="fill_fields" role="alert">{{ Session::get('message') }}</span>
                @endif
                
            </div>   
            
            <div class="form-group">
                <input type="password" class="form-control{{ $errors->has('password') ? ' error_border' : '' }}" name="password" placeholder="Password">
                @if ($errors->has('password'))
                <span class="fill_fields" role="alert">{{ $errors->first('password') }}</span>
                @endif
            </div>
            
            <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberme"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="{{ url('/forgot_password') }}">Forgotten Password?</a>
                        </label>

            </div>

            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <!-- <button type="submit" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</button> -->
                  
        </form>

    @endsection    