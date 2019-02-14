@extends('layouts.ypapp_inner')

@section('content')
<style>
  #locationField, #controls {
    position: relative;
    width: 480px;
  }
  #autocomplete {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 99%;
  }
  .label {
    text-align: right;
    font-weight: bold;
    width: 100px;
    color: #303030;
  }
  #address {
    border: 1px solid #000090;
    background-color: #f0f0ff;
    width: 480px;
    padding-right: 2px;
  }
  #address td {
    font-size: 10pt;
  }
  .field {
    width: 99%;
  }
  .slimField {
    width: 80px;
  }
  .wideField {
    width: 200px;
  }
  #locationField {
    height: 20px;
    margin-bottom: 2px;
  }
</style>

<section class="register_step_1">
    <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>{{ __('Registration') }}</span></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="registration_main">
                    <h1>{{ __('Registration') }}</h1>
                        <div class="registration_steps">
                            <ul>
                                <li><span class="activespan">1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
                            </ul>
                        </div>
                    <form method="POST" id="stepone_bu_reg" action="{{ url('/business_user/register/'.$id) }}">
                        @csrf
                    <div class="registration_filed">
                        <h1>Business details</h1>
                        <p>Please enter some basic details about you and your business</p>
                        <div class="registrationform">
                            <!-- <form method="POST" action="{{ route('business_user.register.submit') }}"> -->
                           
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="business_name">{{ __('Business name') }}</label>
                                        <input id="business_name" type="text" class="form-control{{ $errors->has('business_name') ? ' error_border' : '' }}" name="business_name" value="@if(!empty($get_register_val)){{$get_register_val[0]['business_name']}}@else{{old('business_name')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('business_name'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('business_name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="first_name">{{ __('First name') }}</label>
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' error_border' : '' }}" name="first_name" value="@if(!empty($get_register_val)){{$get_register_val[0]['first_name']}}@else{{old('first_name')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('first_name') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="last_name">{{ __('Last name') }}</label>
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' error_border' : '' }}" name="last_name" value="@if(!empty($get_register_val)){{$get_register_val[0]['last_name']}}@else{{old('last_name')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('last_name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="mobile_phone">{{ __('Mobile phone') }}</label>
                                        <input id="mobile_phone" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control{{ $errors->has('mobile_phone') ? ' error_border' : '' }}" name="mobile_phone" value="@if(!empty($get_register_val)){{$get_register_val[0]['phone_number']}}@else{{old('mobile_phone')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('mobile_phone'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('mobile_phone') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' error_border' : '' }}" name="email" value="@if(!empty($get_register_val)){{$get_register_val[0]['email']}}@else{{old('email')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('email'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="full_address">{{ __('Full address') }}</label>
                                        <input id="autocomplete" onFocus="geolocate()" type="text" class="form-control{{ $errors->has('full_address') ? ' error_border' : '' }}" name="full_address" value="@if(!empty($get_register_val)){{ $get_register_val[0]['full_address']}}@else{{old('full_address')}}@endif" onkeyup="remove_errmsg(this)" autofocus>

                                        @if ($errors->has('full_address'))
                                            <span class="fill_fields" role="alert">
                                                {{ $errors->first('full_address') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            

                        </div>
                        <div class="next_back_button">
                            <!-- <div class="next"><a href="register_step2.html">{{ __('Next') }} ></a></div> -->
                            <div class="next"><input type="submit" id="next_submit" value="Next >"></div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
      document.getElementById(component).value = '';
      document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ&libraries=places&callback=initAutocomplete"></script>
@endsection

