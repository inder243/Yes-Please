@extends('layouts.inner_general')

@section('content')

<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb category_breadcrumb">
    <div class="breadcrumb_header"><a href="JavaScript:;">Home</a>/<span>Category <span>(3,070)</span></span></div>
    <div class="share_fb"><a href="javascript:;"/><img src="{{ asset('img/icon_F.png') }}"/>Share</a></div>
  </div>
      <div class="container-fluid">
        <div class="category_sec_main">
          <div class="row">
              <div class="col-12">
                <div class="category_heading">
                  <h1>Category</h1>
                </div>
              </div>
          </div>
                <div class="search_filter_sec ">
                    <div class="search_heading col-12">
                      <h1>Search filter</h1>
                    </div>
                    <div class="row filter_this">
                    <div class="form-group col-md-3 col-12">
                      <label for="inputPassword4">Location</label>
                      <input type="text" class="form-control" id="inputPassword4" required="">
                      <span class="input_icons"><img src="{{ asset('img/location.png') }}"/></span>
                    </div>
                    <div class="form-group custom_errow col-md-3 col-12">
                      <label for="inputPassword4">Radius (km)</label>
                      <select class="form-control general_radius" id="exampleSelect1">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                      </select>
                     <span class="select_arrow1"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label for="keyword">Keyword</label>
                      <input type="text" class="form-control" id="keyword" required="">
                      <span class="input_icons"><img src="{{ asset('img/input_search.png') }}"/></span>
                    </div>
                  </div>
                  <div class="language_section row">
                    <div class="col-md-6 col-lg-3 col-12">
                      <div class="L_heading">
                        <h1>Languages</h1>
                        </div>
                        <div class="lan_list">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>English</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Chinese</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Hebrew</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Russian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>French</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Ukrainian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>German</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Polish</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12">
                      <div class="L_heading">
                        <h1>Types</h1>
                        </div>
                        <div class="lan_list">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Website</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Banner</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Application</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Bussiness card</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Icons</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Logo</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12">
                      <div class="L_heading">
                        <h1>Another filter</h1>
                        </div>
                        <div class="lan_list">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12">
                      <div class="L_heading">
                        <h1>Another filter</h1>
                        </div>
                        <div class="lan_list">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="more-option">
                      <a href="javascript:;">More options
                      <span class="more_down_arrow"><img src="{{ asset('img/custom_arrow.png') }}"/></span>
                      </a>
                    </div>
                  </div>
                  <div class="language_section row for_more_option" style="display:none;">
                    <div class="col-md-6 col-lg-4 col-12">
                      <div class="L_heading">
                        <h1>Another filter 1</h1>
                        </div>
                        <div class="lan_list more_cat">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>English</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Chinese</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Chinese</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Hebrew</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Russian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Russian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>French</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Ukrainian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Ukrainian</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>German</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Polish</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-12">
                      <div class="L_heading">
                        <h1>Another filter 2</h1>
                        </div>
                        <div class="lan_list more_cat1">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Website</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Banner</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Application</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Bussiness card</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                      <div class="L_heading">
                        <h1>Another filter 3</h1>
                        </div>
                        <div class="lan_list more_cat">
                            <ul>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                              <li>
                                <div class="formcheck forcheckbox langcheck">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="radios" value="">
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Category</p>
                                  </label>
                              </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="another_filter" style="display:none;">
                      <div class="filtername">
                        <p>Another filter 1:<span> 4 Selected</span><a href="javascript:;"/><img src="{{ asset('img/icon_delete.png') }}"/></a></p>
                      </div>
                      <div class="filtername">
                        <p>Another filter 2:<span> English</span><a href="javascript:;"/><img src="{{ asset('img/icon_delete.png') }}"/></a></p>
                      </div>
                      <div class="filtername">
                        <p>Another filter 3:<span> 5 Selected</span><a href="javascript:;"/><img src="{{ asset('img/icon_delete.png') }}"/></a></p>
                      </div>
                    </div>
                  </div>
                  <div class="filters_btn">
                    <div class="ask_for_q">
                      <a href="javascript:;" data-toggle="modal" data-target="#ask_quote">Ask for quote</a>
                    </div>
                    <div class="ask_for_q">
                      <a href="javascript:;">Set appointment</a>
                    </div>
                    <div class="ask_for_q">
                      <a href="javascript:;">Ask question</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="category_second_sec">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="business_name_sec">
                        <ul class="all_bus_by_cat">

                          @if(isset($all_business) && !empty($all_business))
                            @foreach($all_business as $key=>$allbus)
                              <li class="">
                              <div class="business_sec">
                                 <div class="b-detail">
                                    <span class="business_img"><img src="{{ asset('img/img_placeholder.png') }}"/></span>
                                    <div class="sec_t">
                                       <a href="{{ url('general_user/public_profile/'.$allbus['business_userid']) }}"><h1>{{$allbus['get_business_user']['business_name']}}<span><img src="{{ asset('img/verified.png') }}"/></span></h1></a>
                                       <p>{{$allbus['get_category']['category_name']}}</p>
                                    </div>
                                 </div>
                                 <div class="select_this">
                                    <div class="formcheck forcheckbox langcheck">
                                       <label>
                                          <input type="checkbox" class="radio-inline check_bus" id="hmm_{{$key}}" name="radios" value="">
                                          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                          <p></p>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <p class="des">{{ $allbus['get_business_user']['full_address']}}</p>
                              <div class="distance_rating">
                                 <div class="rate_review">
                                    <a href="javascript:;" class="distance">Distance <span>{{ $allbus['get_business_details']['distance_kms']}}km</span></a>
                                    <a href="javascript:;" class="rating">Rating <span>9/10</span></a>
                                    <a href="javascript:;" class="review">Reviews <span>70</span></a>
                                 </div>
                                 <div class="call_chat">
                                    <a href="javascript:;" class="text"><img/src="{{ asset('img/text.png') }}"/></a>
                                    <a href="javascript:;" class="call"><img/src="{{ asset('img/call.png') }}"/></a>
                                 </div>
                              </div>
                           </li>    
                            @endforeach
                          @endif
                          
                        </ul>
                        <div class="col-12">
                           <div class="load_more"><a href="JavaScript:;">Load more</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="category_second_bar_sec">
                        <div class="google_map_sec">
                           <img src="{{ asset('img/map.png') }}"/>
                        </div>
                        <div class="article_sec">
                           <h1>Articles</h1>
                           <p class="show_all">
                              <a href="javascript:;">Show all articles</a>
                           </p>
                           <div class="article_swiper">
                              <div class="swiper-container swiper-wrapper_p">
                                 <div class="swiper-wrapper ">
                                    <div class="swiper-slide">
                                       <div class="article_1">
                                          <h1>Morbi molestie et nisi non scelerisque1.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                    <div class="swiper-slide">
                                       <div class="article_2">
                                          <h1>Morbi molestie et nisi non scelerisque2.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                    <div class="swiper-slide">
                                       <div class="article_1">
                                          <h1>Morbi molestie et nisi non scelerisque3.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Add Arrows -->
                                 <div class="swiper-button-next for_next_arrow"></div>
                                 <div class="swiper-button-prev for_back_arrow"></div>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec">
                           <h1>Articles</h1>
                           <p class="show_all">
                              <a href="javascript:;">Show all tips</a>
                           </p>
                           <div class="article_swiper">
                              <div class="swiper-container swiper-wrapper_p">
                                 <div class="swiper-wrapper ">
                                    <div class="swiper-slide">
                                       <div class="article_1 tips">
                                          <h1>Morbi molestie et nisi non scelerisque1.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                    <div class="swiper-slide">
                                       <div class="article_2">
                                          <h1>Morbi molestie et nisi non scelerisque2.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                    <div class="swiper-slide">
                                       <div class="article_1">
                                          <h1>Morbi molestie et nisi non scelerisque3.</h1>
                                          <p>Duis et nibh sed mauris pulvinar ullamcorper nec a ex. Duis elementum leo eget erat lacinia maximus. Aliquam erat volutpat.</p>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Add Arrows -->
                                 <div class="swiper-button-next for_next_arrow"></div>
                                 <div class="swiper-button-prev for_back_arrow"></div>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec">
                           <h1>Pricelist</h1>
                           <p class="show_all">
                              <a href="javascript:;">Show all Pricelist</a>
                           </p>
                           <div class="priclist">
                              <div class="priclist1">
                                 <table>
                                    <tr>
                                       <td>Logo design</td>
                                       <td class="total_rate">$ 30 - 200</td>
                                    </tr>
                                    <tr>
                                       <td>Website design</td>
                                       <td class="total_rate">$ 150 - 1,200</td>
                                    </tr>
                                    <tr>
                                       <td>Business card design</td>
                                       <td class="total_rate">$ 20 - 300</td>
                                    </tr>
                                    <tr>
                                       <td>Application design</td>
                                       <td class="total_rate">$ 300 - 2,400</td>
                                    </tr>
                                    <tr>
                                       <td>Icons design</td>
                                       <td class="total_rate">$ 100 - 700</td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec">
                           <h1>Most asked questions </h1>
                           <div class="most_ask_question_section">
                              <div class="ask_ques">
                                 <div class="ques_h">
                                    <h1>Home improvement question</h1>
                                    <a href="javascript:;">Show answers</a>
                                 </div>
                                 <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                              </div>
                           </div>
                           <div class="most_ask_question_section">
                              <div class="ask_ques">
                                 <div class="ques_h">
                                    <h1>Home improvement question</h1>
                                    <a href="javascript:;">Show answers</a>
                                 </div>
                                 <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                              </div>
                           </div>
                           <div class="most_ask_question_section">
                              <div class="ask_ques">
                                 <div class="ques_h">
                                    <h1>Home improvement question</h1>
                                    <a href="javascript:;">Show answers</a>
                                 </div>
                                 <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec">
                           <div class="most_ask_question_section">
                              <div class="ask_ques">
                                 <div class="ques_h other_q">
                                    <h1>Aliquam suscipit arcu vel magna consectetur, eu consequat mauris ultrices</h1>
                                 </div>
                                 <p style="text-align:justify";>Aliquam suscipit arcu vel magna consectetur, eu consequat mauris ultrices
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis, justo nec placerat hendrerit, metus libero sagittis turpis, eget tristique neque lacus sit amet dui. Pellentesque nibh arcu, tincidunt non purus eu, molestie rhoncus tortor. Curabitur ultricies elit eu ante auctor imperdiet. Sed fringilla vel mi sed elementum. Etiam consectetur erat ex, in hendrerit ligula blandit non. Donec sed quam aliquet, sodales magna nec, dictum ligula. Cras ligula velit, ultricies quis dapibus et, imperdiet sit amet felis. Nulla feugiat lacus at augue vulputate viverra. Sed luctus sem pelle
                                    ntesque lorem feugiat ultricies. Ut facilisis magna at nibh cursus mollis. Nullam ut semper nunc. Curabitur nibh turpis, tristique vel libero id, feugiat congue urna. Proin varius felis lobortis lorem pharetra accumsan.
                                    Morbi interdum eros ex, at maximus velit congue quis. Aliquam placerat sollicitudin velit nec vestibulum. Nam ullamcorper, nunc eget tempus scelerisque, felis risus finibus lectus, sit amet lacinia felis ligula congue lorem. Quisque luctus erat id metus faucibus fringilla. Etiam ut malesuada risus, ac luctus urna. Sed maximus nec odio vel gravida. Nulla facilisi. Vivamus scelerisque laoreet augue et laoreet. Aliquam suscipit arcu vel magna consectetur, eu consequat mauris ultrices. Ut gravida ultricies ante, sed semper tellus. Nunc bibendum id turpis nec mollis. In eget dui tortor. Maecenas sed pharetra lacus. Sed in eros augue.
                                    In hac habitasse platea dictumst. Aliquam dapibus quam vel posuere pellentesque. Sed malesuada iaculis augue, ut molestie odio congue vel. Fusce ac finibus risus. Sed luctus ante accumsan est imperdiet pulvinar. Vivamus in neque vitae turpis.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec1">
                           <h1>Promoted products </h1>
                           <div class="most_ask_question_section">
                              <div class="cat_business_name">
                                 <h1>Business name</h1>
                                 <div class="p-name-price">
                                    <h1>Product name</h1>
                                    <div class="p_price">
                                       <h1>$40</h1>
                                       <span>/hr</span>
                                    </div>
                                 </div>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar neque neque, ut semper nisl venenatis vitae. Mauris quis risus lacus. Sed cursus urna sed nibh pellentesque tincidunt. Quisque pharetra, dui quis aliquam tempor, orci aollicitudin</p>
                                 <ul>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="article_sec1">
                           <div class="most_ask_question_section">
                              <div class="cat_business_name">
                                 <h1>Business name</h1>
                                 <div class="p-name-price">
                                    <h1>Product name</h1>
                                    <div class="p_price">
                                       <h1>$40</h1>
                                       <span>/hr</span>
                                    </div>
                                 </div>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar neque neque, ut semper nisl venenatis vitae. Mauris quis risus lacus. Sed cursus urna sed nibh pellentesque tincidunt. Quisque pharetra, dui quis aliquam tempor, orci aollicitudin</p>
                                 <ul>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                    <li>
                                       <img src="{{ asset('img/p_image.png') }}"/>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
    </section>
    <!------------------------  Category  Modal -------------->
      <div class="modal fade" id="ask_quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header quote_header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form class="dynmic_quoteform">
                 <div class="modal-body quote_body">
                    
                      <div class="ask_for_quote_section">
                      
                        @if(isset($data) && !empty($data))
                          @if($data['type']=='checkbox')
                            <div class="what_design form-ques dynamicQues_{{$data['id']}}" data-id="{{$data['id']}}" data-type="{{$data['type']}}">
                              <h1>{{$data['title']}}</h1>
                              <div class="d_cat">
                                @if(isset($data['options']) && !empty($data['options']))
                                 <ul>
                                  @foreach(json_decode($data['options']) as $option)
                                    <li>
                                       <div class="formcheck forcheckbox langcheck">
                                          <label>
                                             <input type="checkbox" class="radio-inline" name="radios{{$data['id']}}[]" value="{{$option->option_value}}">
                                             <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                             <p>{{$option->option_name}}</p>
                                          </label>
                                       </div>
                                    </li>
                                    @endforeach
                                 </ul>
                                 @endif
                                 @if(isset($data['description']) && !empty($data['description']))
                                 <div class="t_detail">
                                    <p><img src="{{ asset('img/info.png') }}"/> {{$data['description']}}  </p>
                                 </div>
                                 @endif
                                 <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;"/>Next ></a></div>
                              </div>
                            </div>
                           @elseif($data['type']=='radio')
                            <div class="quote_recieve form-ques dynamicQues_{{$data['id']}}"  data-id="{{$data['id']}}" data-type="{{$data['type']}}">
                              <h1>{{$data['title']}}</h1>
                            @if(isset($data['options']) && !empty($data['options']))
                              <div class="total_quote">
                                <ul>
                                  @foreach(json_decode($data['options']) as $option)
                                  
                                    <li>
                                         <div class="formcheck forcheckbox langcheck">
                                            <label>
                                               <input type="radio" class="radio-inline" name="radios{{$data['id']}}[]" value="{{$option->option_value}}">
                                               <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                               <p>{{$option->option_name}}</p>
                                            </label>
                                         </div>
                                      </li>
                                    @endforeach
                                  </ul>
                                </div>  
                                @endif
                              @if(isset($data['description']) && !empty($data['description']))
                                   <div class="t_detail">
                                      <p><img src="{{ asset('img/info.png') }}"/> {{$data['description']}}  </p>
                                   </div>
                              @endif
                            <div class="q_nex_btns"><div onclick="getPrevQuesButton("{{$data['id']}}");" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>
                          @endif
                        @endif

                        <div class="ele_next " style="display:none;"><input value="submit" type="submit" class="submit_dynamic_from"></div>
                      </div>
                 </div>
               </form>
            </div>
         </div>
      </div>


@endsection