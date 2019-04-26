@extends('layouts.inner_general')

@section('content')


<section class="register_step_1">
  <input type="hidden" id="hidden_catId" name="catIdhidd" value="{{$categoryId}}">
  <div class="breadcrumb register_breadcrumb category_breadcrumb">
    
    <div class="breadcrumb_header"><a href="{{ url('/') }}">Home </a>/<span>@if(!empty($catName)) {{$catName}} @endif <span></span></span></div>
    <div class="share_fb">
      <a href="javascript:;">
      <img src="{{ asset('img/icon_F.png') }}"/>Share</a></div>
  </div>
      <div class="container-fluid">
        <div class="category_sec_main">
          <div class="row">
              <div class="col-12">
                <div class="category_heading">
                  <h1>@if(!empty($catName)) {{$catName}} @endif</h1>
                </div>
              </div>
          </div>
                <div class="search_filter_sec ">
                    <div class="search_heading col-12">
                      <h1>Search filter</h1>
                    </div>
                    <div class="row filter_this">
                    <div class="form-group col-md-4 col-12">
                      <label for="inputPassword4">Location</label>
                      <input type="text" onFocus="geolocate_dash()" class="form-control autocomplete_dash" id="autocomplete" value="@if(!empty($address)) {{$address}} @endif" required="">
                      <!-- <input type="text" class="form-control" id="inputPassword4" value="@if(!empty($address)) {{$address}} @endif" required=""> -->
                      <span class="input_icons"><img src="{{ asset('img/location.png') }}"/></span>
                    </div>
                    <div class="form-group custom_errow col-md-4 col-12">
                      <label for="inputPassword4">Radius (km)</label>
                      <select class="form-control" id="dashboard_radious_general">
                        <option value="" selected="" disabled="">Select Radius</option>
                        <option value="10" @if($selected_radious == '10') selected @endif>10</option>
                        <option value="20" @if($selected_radious == '20') selected @endif>20</option>
                        <option value="30" @if($selected_radious == '30') selected @endif>30</option>
                        <option value="40" @if($selected_radious == '40') selected @endif>40</option>
                        <option value="50" @if($selected_radious == '50') selected @endif>50</option>
                      </select>
                     <span class="select_arrow1"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label for="keyword">Keyword</label>
                      <input type="text" class="form-control" id="keyword" onkeyup="searchFilter()">
                      <span class="input_icons"><img src="{{ asset('img/input_search.png') }}"/></span>
                    </div>
                  </div>
                  <!-- <div class="language_section row">
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
                  </div> -->

                  <div class="more_options_data" style="display:none;">
                  <div class="language_section row for_more_option">
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
                    <div class="ask_for_q" onclick="show_ask_quote(); return false;">
                     <!--  <a href="javascript:;" data-toggle="modal" data-target="#ask_quote" data-backdrop="static" data-keyboard="false">Ask for quote</a> -->
                      <a href="javascript:;">Ask for quote</a>
                    </div>
                    <div class="ask_for_q">
                      <a href="javascript:;">Set appointment</a>
                    </div>
                    <div class="ask_for_q">
                      <a href="javascript:;" class="ask_question_catpage" data-toggle="modal" data-target="#ask_question" data-backdrop="static" data-keyboard="false">Ask question</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="category_second_sec user_dashbord_cat">
                <input type="hidden" class="hidden_default_longitude" value="@if(isset($longitude)){{ $longitude}}@endif">
                <input type="hidden" class="hidden_default_latitude" value="@if(isset($latitude)){{ $latitude}}@endif">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="business_name_sec">
                      @if(isset($adsToShow) && !empty($adsToShow))
                        <ul class="all_bus_by_cat" id="all_busBy_cat_ads">

                            @foreach($adsToShow as $key=>$adToShow)
                              <li class="all_business_bycat_li"  data-cat-id="{{$categoryId}}" data-camp-id="{{$adToShow['campid']}}" style="border-color: #ffcb08 !important;">
                                <input type="hidden" class="hidden_longitude" value="{{ $adToShow['logitude']}}">
                                <input type="hidden" class="hidden_latitude" value="{{ $adToShow['latitude']}}">
                                <input type="hidden" class="hidden_address" value="{{ $adToShow['full_address']}}">
                                <input type="hidden" class="hidden_buname" value="{{ $adToShow['business_name']}}">
                              <div class="business_sec">
                                 <div class="b-detail">
                                    <span class="business_img">

                                      @if($adToShow['image_name'])
                                      @php
                                      $bus_user_id = $adToShow['business_userid'];
                                      $img_url = $adToShow['image_name'];
                                      @endphp
                                      <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}"/>
                                      @else
                                      <img src="{{ asset('img/img_placeholder.png') }}"/>
                                      @endif

                                    </span>
                                    <div class="sec_t">
                                       <span class="addtoshowspan" onclick="countClickOfAd('{{$categoryId}}','{{$adToShow['buid']}}','{{$adToShow['campid']}}')"><h1 datacamp="{{$adToShow['campid']}}">{{$adToShow['business_name']}}  {{$adToShow['camp_name']}}<span><img src="{{ asset('img/verified.png') }}"/></span></h1></span>
                                       <p>{{$adToShow['category_name']}}</p>
                                    </div>
                                 </div>
                                 <div class="select_this">
                                    <div class="formcheck forcheckbox langcheck">
                                       <label>
                                          <input type="checkbox" class="radio-inline check_bus" id="addtoshow_{{$key}}" name="radios" value="" data-title="{{$adToShow['id']}}">
                                          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                          <p></p>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <p class="des">{{ $adToShow['full_address']}}</p>
                              <div class="distance_rating">
                                 <div class="rate_review">
                                  @php $new_num = number_format($adToShow['distance'], 1, '.', ''); @endphp
                                    <a href="javascript:;" class="distance">Distance <span>{{ $new_num}}km</span></a>


                                    @if(!empty($adToShow['tot_rating']))

                                    @php
                                      $rating_num = number_format($adToShow['tot_rating'], 1, '.', '');

                                    @endphp

                                    @else

                                    @php $rating_num = 0;@endphp

                                    @endif

                                    <a href="javascript:;" class="rating">Rating <span>{{$rating_num}}/5</span></a>
                                    <a href="javascript:;" class="review">Reviews <span>@if(!empty($adToShow['tot_review'])) {{$adToShow['tot_review']}} @else 0 @endif</span></a>
                                 </div>
                                 <div class="call_chat">
                                    <a href="javascript:;" class="text"><img/src="{{ asset('img/text.png') }}"/></a>
                                    <a href="javascript:;" class="call" data-toggle="tooltip" data-placement="top" title="{{ $adToShow['phone_number']}}" data-original-title="{{ $adToShow['phone_number']}}"><img/src="{{ asset('img/call.png') }}"/>
                                    </a>
                                 </div>
                              </div>
                           </li>    
                            @endforeach

                        </ul>
                        @endif
                      @if(isset($all_business) && !empty($all_business))
                        <ul class="all_bus_by_cat" id="all_busBy_cat">
                            @foreach($all_business as $key=>$allbus)
                              <li class="all_business_bycat_li">
                                <input type="hidden" class="hidden_longitude" value="{{ $allbus->logitude}}">
                                <input type="hidden" class="hidden_latitude" value="{{ $allbus->latitude}}">
                                <input type="hidden" class="hidden_address" value="{{ $allbus->full_address}}">
                                <input type="hidden" class="hidden_buname" value="{{ $allbus->business_name}}">
                              <div class="business_sec">
                                 <div class="b-detail">
                                    <span class="business_img">

                                      @if($allbus->image_name)
                                      @php
                                      $bus_user_id = $allbus->business_userid;
                                      $img_url = $allbus->image_name;
                                      @endphp
                                      <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}"/>
                                      @else
                                      <img src="{{ asset('img/img_placeholder.png') }}"/>
                                      @endif

                                    </span>
                                    <div class="sec_t">
                                       <a href="{{ url('general_user/public_profile/'.$allbus->id.'/'.$categoryId) }}"><h1>{{$allbus->business_name}}<span><img src="{{ asset('img/verified.png') }}"/></span></h1></a>
                                       <p>{{$allbus->category_name}}</p>
                                    </div>
                                 </div>
                                 <div class="select_this">
                                    <div class="formcheck forcheckbox langcheck">
                                       <label>
                                          <input type="checkbox" class="radio-inline check_bus" id="hmm_{{$key}}" name="radios" value="" data-title="{{$allbus->id}}">
                                          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                          <p></p>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <p class="des">{{ $allbus->full_address}}</p>
                              <div class="distance_rating">
                                 <div class="rate_review">
                                  @php $new_num = number_format($allbus->distance, 1, '.', ''); @endphp
                                    <a href="javascript:;" class="distance">Distance <span>{{ $new_num}}km</span></a>


                                    @if(!empty($allbus->tot_rating))

                                    @php
                                      $rating_num = number_format($allbus->tot_rating, 1, '.', '');

                                    @endphp

                                    @else

                                    @php $rating_num = 0;@endphp

                                    @endif

                                    <a href="javascript:;" class="rating">Rating <span>{{$rating_num}}/5</span></a>
                                    <a href="javascript:;" class="review">Reviews <span>@if(!empty($allbus->tot_review)) {{$allbus->tot_review}} @else 0 @endif</span></a>
                                 </div>
                                 <div class="call_chat">
                                    <a href="javascript:;" class="text"><img/src="{{ asset('img/text.png') }}"/></a>
                                    <a href="javascript:;" class="call" data-toggle="tooltip" data-placement="top" title="{{ $allbus->phone_number}}" data-original-title="{{ $allbus->phone_number}}"><img/src="{{ asset('img/call.png') }}"/>
                                    </a>
                                 </div>
                              </div>
                           </li>    
                            @endforeach

                        </ul>
                        <div class="no_data_found" id="no_data_found" style="display:none"> No Results Found!</div>
                        @else
                        <div class="no_data_found"> No Results Found!</div>
                        @endif
                        <div class="col-12">
                           <div class="load_more"><a href="JavaScript:;">Load more</a></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12">
                     <div class="category_second_bar_sec">
                        <div class="google_map_sec" id="mapDiv">
                          
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
                        @if(isset($get_products) && !empty($get_products))
                        @foreach($get_products as $p_key=>$p_value)
                        <div class="article_sec1">
                           @if($p_key == 0)
                           <h1>Promoted products </h1>
                           @endif
                           <div class="most_ask_question_section">
                              <div class="cat_business_name">
                                 <a href="{{ url('general_user/public_profile/'.$p_value['get_business']['id'].'/'.$categoryId)}}"><h1>{{$p_value['get_business']['business_name']}}</h1></a>
                                 <div class="p-name-price">
                                    <h1>{{$p_value['get_product']['name']}}</h1>
                                    <div class="p_price">
                                      @if($p_value['get_product']['price_type'] == 'fix')
                                       <h1>${{$p_value['get_product']['price']}}</h1>
                                       @elseif($p_value['get_product']['price_type'] == 'range')
                                       <h1>${{$p_value['get_product']['price_from']}} - ${{$p_value['get_product']['price_to']}}</h1>
                                       @php $price_per = $p_value['get_product']['price_per'];@endphp
                                       @if($price_per == '1')
                                       <span>/hr</span>
                                       @elseif($price_per == '2')
                                       <span>/min</span>
                                       @endif
                                      @endif
                                    </div>
                                 </div>
                                 <p>{{$p_value['get_product']['product_description']}}</p>
                                <?php 
                                  $uploads = json_decode($p_value['get_product']['product_images'],true);
                                ?>
                                 <ul>
                                  @if(!empty($uploads))
                                    @foreach($uploads['pic'] as $img)
                                     <?php $img_name = explode( '.', $img );?>
                                      <li data-image="{{url('/images/business_products/'.$p_value['get_business']['business_userid'].'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImageUser(this);return false;">
                                        <img src="{{url('/images/business_products/'.$p_value['get_business']['business_userid'].'/'.$img)}}"/>
                                      </li>
                                    @endforeach
                                  @else

                                  @endif
                                   <!--  <li>
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
                                    </li> -->
                                 </ul>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        @endif
                       <!--  <div class="article_sec1">
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
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
      </div>
       <!-------- Login Modal for general user------->
    <div class="modal fade" id="general_login1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup ask_quote_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Login or register</h1>
                    <div class="login_section">
                      <div class="login_with_social">
                        <a href="javascript:;" class="phonelogin"><img src="{{ asset('img/icon_ph.png') }}" class="img-fluid"/> Login with <b>Phone number</b></a>
                        <a href="{{url('general_user/redirectfb')}}" class="fblogin"><img src="{{ asset('img/icon_F.pn') }}g" class="img-fluid"/> Login with <b>Facebook</b></a>
                        <a href="{{url('general_user/redirect')}}" class="googlelogin"><img src="{{ asset('img/google_plus.png') }}" class="img-fluid"/> Login with <b>Google+</b></a>
                      </div>
                      <div class="login_fields">
                        <!-- <form id="sign_in_general" method="POST" action="{{ route('general_user.login.submit') }}"> -->
                          <form id="sign_in_general1" method="POST" action="">
                            {{ csrf_field() }}

                              <span class="fill_fields gen_error" role="alert" style="display:none;">
                              </span> 

                             <input type="hidden" class="action_general" value="{{ route('general_user.login.submit') }}">
                              <input type="hidden" class="website_url" value="{{ url('') }}">


                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="email">Email</label>
                              <input type="email" class="form-control email_gen" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                              <span class="fill_fields email_gen_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <div class="form-group col-md-12 col-12 padding_none">
                              <label for="password">Password</label>
                              <input type="password" class="form-control password_gen" name="password" placeholder="Password">
                              <span class="fill_fields password_gen_error" role="alert" style="display:none;">
                              </span>
                            </div>
                            <p class="forgot_pass"><a href="javascript:;">Forgot your password?</a></p>
                            <div class="login_btn"><a><input type="button" value="Login" onclick="testsubmit(this);"></a></div>
                            <div class="register_page"><a href="{{ route('general_user.register') }}" target="_blank">Register</a></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>

    </div>
    <!-------- Login Modal end ----->
    <div class="modal fade" id="ask_quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header quote_header">
                  <button type="button" class="close ask_quote_close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form class="dynmic_quoteform">

                 <input type="hidden" class="hiddencatId" name="hiddencatId" value="{{$categoryId}}">
                 <div class="modal-body quote_body">

                 </div>
               </form>
            </div>
         </div>
      </div>

    </section>
    <!------------------------  Category  Modal -------------->
      


<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>
<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>

@endsection