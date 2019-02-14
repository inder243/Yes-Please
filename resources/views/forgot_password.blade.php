@extends('layouts.admin')

    @section('content')
        <form  method="POST" action="{{ route('check_email') }}"> 
        	 {{ csrf_field() }}
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="admin_email" class="form-control" placeholder="Email" required>
                @if (Session::has('error_message'))
                <span class="fill_fields" role="alert">{{ Session::get('error_message') }}</span>
                @endif
                @if (Session::has('success_message'))
                <span class="fill_fields" role="alert">{{ Session::get('success_message') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
        </form>
    @endsection    