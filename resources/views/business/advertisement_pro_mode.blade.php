@extends('layouts.dashboard_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
           <div><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/<a href="JavaScript:;">Advertisement</a>/<span class="q_breadcrumb">Start pro mode</span></div>
           <div class="setup_things"><a href="javascript:;">How to set things up?</a></p></div>
         </div>
      </section>
      <section class="advertisment_section">
        <div class="advtisment_main">
          <h1>Advertisement</h1>
        </div>
        <div class="container pro-module-feature">
          <div class="row">
            <div class="col-md-3 ">
              <div class="pro_mode">
                <div class="pro_mode_heading pro_mode_feature">
                  <h1>PRO mode features </h1>
                </div>
                <div class="pro_mode_list pro_mode_list_feature">
                  <ul>
                    <li><h1>Listing on top of free</h1></li>
                    <li>
                      <h1>Listing on top of free</h1>
                      <p>using budget</p>
                    </li>
                    <li>
                      <h1>Get quotes top priority</h1>
                      <p>using budget</p>
                    </li>
                    <li>
                      <h1>Publish photos</h1>
                    </li>
                    <li>
                      <h1>Send newsletters</h1>
                    </li>
                    <li>
                      <h1>Call logs</h1>
                    </li>
                    <li>
                      <h1>Promote to top</h1>
                      <p>using budget</p>
                    </li>
                    <li>
                      <h1>Promote pricelist</h1>

                    </li>
                    <li class="p_pro">
                      <h1>Promote products</h1>
                      <p>using budget</p>
                    </li>
                  </ul>

                </div>
              </div>
            </div>
            <div class="col-md-9">
             <form method="POST" id="pro_mode_form" action="{{ route('business_user.saveProModeSettings') }}">
                <div class="pro_mode_setting">
                  <div class="mode_setting_main">
                    <p>Pro mode settings</p>
                    @if (Session::has('error_message'))
                    <div class="pro_mode_error">
                      <p>{{ Session::get('error_message') }}</p>
                    </div>
                     @endif
                    @if (Session::has('success_message'))
                    <div class="pro_mode_success">
                      <p>{{ Session::get('success_message')}}</p>
                    </div>
                    @endif
                    <div class="mode_settings">
                      
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="row">
                          <div class="col-md-3 col-12">
                            <div class="mode_setting_heading">
                              @if(isset($getSelectedCats) && !empty($getSelectedCats))
                                <ul>
                                  <li></li>

                                  @foreach($getSelectedCats as $getSelectedCat)
                                    <li><h1>{{$getSelectedCat['buser_cat']['category_name']}}</h1></li>
                                  @endforeach
                                </ul>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-3 col-12">
                            <div class="quote_ph_no">
                              <ul>
                                <li>
                                  <h1>Quote with phone number <img src="{{ asset('img/info.png') }}"/></h1>
                                  <p>(bid in ILS)</p>
                                </li>
                                @if(isset($getSelectedCats) && !empty($getSelectedCats))
                                  @foreach($getSelectedCats as $getSelectedCat)
                                  <li class="home_imp_list">
                                    <h1>{{$getSelectedCat['buser_cat']['category_name']}}</h1>
                                    <div class="text-input">
                                    <input type="number" value="@if($getSelectedCat['quote_with_ph']!=0){{$getSelectedCat['quote_with_ph']}}@else{{$getSelectedCat['buser_cat']['quote_with_ph']}}@endif" name="{{$getSelectedCat['category_id']}}[]" required>
                                    <span>5 NIS minimum</span>
                                    </div>
                                  </li>
                                  @endforeach
                                @endif
                              </ul>
                            </div>
                          </div>
                          <div class="col-md-3 col-12">
                            <div class="quote_ph_no">
                              
                              <ul>
                                <li>
                                  <h1>Quote without phone number <img src="{{ asset('img/info.png') }}"/></h1>
                                  <p>(bid in ILS)</p>
                                </li>
                                @if(isset($getSelectedCats) && !empty($getSelectedCats))
                                  @foreach($getSelectedCats as $getSelectedCat)
                                  <li class="home_imp_list">
                                    <h1>{{$getSelectedCat['buser_cat']['category_name']}}</h1>
                                    <div class="text-input">
                                    <input type="number" value="@if($getSelectedCat['quote_without_ph']!=0){{$getSelectedCat['quote_without_ph']}}@else{{$getSelectedCat['buser_cat']['quote_without_ph']}}@endif" name="{{$getSelectedCat['category_id']}}[]" required>
                                    <span>1 NIS minimum</span>
                                  </div>
                                  </li>
                                  @endforeach
                                @endif
                              </ul>
                            </div>
                          </div>
                          <div class="col-md-3 col-12">
                            <div class="accept_every_no">
                              <ul>
                                <li>
                                  <h1>Accept every <br>quote request <img src="{{ asset('img/info.png') }}"/></h1>
                                </li>
                                 @if(isset($getSelectedCats) && !empty($getSelectedCats))
                                  @foreach($getSelectedCats as $getSelectedCat)
                                    <li class="home_imp_list1">
                                      <h1>{{$getSelectedCat['buser_cat']['category_name']}}</h1>
                                      <div class="text-input">
                                        <div class="text-input">
                                          <div class="formcheck forcheckbox">
                                            <label>
                                              <input type="checkbox" class="radio-inline" name="{{$getSelectedCat['category_id']}}[]" @if($getSelectedCat['accept_request']==1)checked value="{{$getSelectedCat['accept_request']}}" @endif>
                                              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                           </label>
                                          </div>
                                        </div>
                                      </div>
                                    </li>
                                  @endforeach
                                @endif
                              </ul>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                  <div class="income_call_bid">
                    <div class="row">
                      <div class="col-md-3 col-6">
                        <ul class="call_bid">
                          <li><h1> Incoming call bid <img src="{{ asset('img/info.png') }}"></h1></li>
                        </ul>
                      </div>
                      <div class="col-md-3 col-6">
                        <ul class="call_bid_input">
                          <li><input type="text">
                              <span>1 NIS minimum</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="income_call_budget">
                    <div class="row">
                      <div class="col-md-3 col-6">
                        <ul class="call_bid">
                          <li><h1> Maximum monthly budget<img src="{{ asset('img/info.png') }}"></h1></li>
                        </ul>
                      </div>
                      <div class="col-md-3 col-6">
                        <ul class="call_bid_input">
                          <li>
                            <input type="number" id="monthly_budget" name="monthly_budget" value="@if(isset($monthlyBudget['wallet_amount']) && !empty($monthlyBudget['wallet_amount'])){{$monthlyBudget['wallet_amount']}}@endif" required>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12">
                        <div class="monthly-des">
                          <p>Your account will be charged with the amount you bid according to this table. You can change these bids any time using your advertisment dashboard. You can set montly maximum once reached your account will switched to free mode until new month begin. Your will be charged in minimum of 39 NIS even if your interactions is less then this amount.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="payment_details_main">
                  <div class="payment_details">
                    <h1>Payment details</h1>
                    <div class="payment_input_fields row">
                      <div class="card_number">
                        <input type="text"/>
                        <span>Card number</span>
                      </div>
                      <div class="card_detail_main">
                        <div class="expiry_month">
                          <div class="month">
                            <select>
                              <option>MM</option>
                              <option>01</option>
                              <option>02</option>
                              <option>03 </option>
                            </select>
                            <span>Expires</span>
                          </div>
                          <p>/</p>
                          <div class="Year">
                            <select>
                              <option>YY</option>
                              <option>2018</option>
                              <option>2019</option>
                            </select>
                          </div>
                        </div>
                        <div class="expiry_cvc">
                          <div class="cvc_no">
                            <input type="text"/>
                            <span>CVC</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="terms_agree">
                    <div class="formcheck forcheckbox payment_agree">
                      <label>
                        <input type="checkbox" class="radio-inline" name="radios" value="">
                        <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                        <p>I agree to <a href="#">Service terms</a> and <a href="#">Privacy policy </a></p>
                      </label>
                    </div>
                  </div>
                  <div class="switch_pro">
                    <input type="submit" value="Switch to pro mode">
                  </div>

                </div>
            </form>
            </div>
          </div>
        </div>
      </section>
     
@endsection