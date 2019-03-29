@extends('layouts.inner_general')

@section('content')


<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb category_breadcrumb">
    
    <div class="breadcrumb_header"><a href="{{ url('/') }}">Home</a>/<span>@if(!empty($catName)) {{$catName}} @endif <span></span></span></div>
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
                    <div class="ask_for_q">
                      <a href="javascript:;" data-toggle="modal" data-target="#ask_quote" data-backdrop="static" data-keyboard="false">Ask for quote</a>
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

              <div class="category_second_sec user_dashbord_cat">
                <input type="hidden" class="hidden_default_longitude" value="@if(isset($longitude)){{ $longitude}}@endif">
                <input type="hidden" class="hidden_default_latitude" value="@if(isset($latitude)){{ $latitude}}@endif">
               <div class="row">
                  <div class="col-md-6 col-12">
                     <div class="business_name_sec">
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
                                       <a href="{{ url('general_user/public_profile/'.$allbus->id) }}"><h1>{{$allbus->business_name}}<span><img src="{{ asset('img/verified.png') }}"/></span></h1></a>
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
       <!-------- Login Modal for general user------->
    <div class="modal fade" id="general_login1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content login_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
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

                 <input type="hidden" class="hiddencatId" value="{{$categoryId}}">
                 <div class="modal-body quote_body">
                    
                      <div class="ask_for_quote_section">
                      
                        @if(isset($data) && !empty($data))
                         @if($data['type']=='textbox')

                          <div class="not_all_business form-ques dynamicQues_{{$data['id']}}" data-id="{{$data['id']}}" data-type="{{$data['type']}}" data-filter="{{$data['filter']}}">
                            <h1 class="questitle">{{$data['title']}}</h1>
                            <div class="ph_detail">
                              <div class="form-group ">
                              <label for="inputEmail{{$data['id']}}">{{$data['title']}}</label>
                              <input class="form-control" id="inputEmail{{$data['id']}}" type="text">
                            </div>

                             @if(isset($data['description']) && !empty($data['description']))
                               <div class="t_detail">
                                  <p><img src="{{asset('img/info.png') }}"/> {{$data['description']}}  </p>
                               </div>
                              @endif
                            
                             <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
                              </div>
                            </div>
                          @elseif($data['type']=='checkbox')
                            <div class="what_design form-ques dynamicQues_{{$data['id']}}" data-id="{{$data['id']}}" data-type="{{$data['type']}}" data-filter="{{$data['filter']}}">
                              <h1 class="questitle">{{$data['title']}}</h1>
                              <div class="d_cat">
                                @if(isset($data['options']) && !empty($data['options']))
                                 <ul>
                                  @foreach(json_decode($data['options']) as $option)
                                    <li>
                                       <div class="formcheck forcheckbox langcheck">
                                          <label>
                                             <input type="checkbox" class="radio-inline" name="radios{{$data['id']}}[]" value="{{$option->option_value}}" data-text="{{$option->option_name}}">
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
                                 
                                 <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
                              </div>
                            </div>
                             @elseif($data['type']=='dropdown')
                             <div class="quote_recieve form-quesdynamicQues_{{$data['id']}}" data-id="{{$data['id']}}" data-type="{{$data['type']}}" data-filter="{{$data['filter']}}">
                              <h1 class="questitle">{{$data['title']}}</h1>

                            @if(isset($data['options']) && !empty($data['options']))
                            
                               <div class="total_quote"><div class="form-group custom_errow"><label>{{$data['title']}}</label>
                                <select class="form-control">
                                @foreach(json_decode($data['options']) as $option)
                                    <option value='.$option->option_value.'>{{$option->option_name}}</option>
                                @endforeach
                                </select>
                                <span class="select_arrow1"><img img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span></div>
                            @endif
                           </ul></div>
                            @if(isset($data['description']) && !empty($data['description']))
                            <div class="t_detail">
                              <p><img src="{{ asset('img/info.png') }}"/> {{$data['description']}}  </p>
                            </div>
                             @endif
                            <div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>
                           @elseif($data['type']=='radio')
                            <div class="quote_recieve form-ques dynamicQues_{{$data['id']}}"  data-id="{{$data['id']}}" data-type="{{$data['type']}}" data-filter="{{$data['filter']}}">
                              <h1>{{$data['title']}}</h1>
                              @if(isset($data['options']) && !empty($data['options']))
                              <div class="total_quote dynamic_rad">
                                <ul>
                                  @foreach(json_decode($data['options']) as $option)
                                  
                                    <li>
                                         <div class="formcheck">
                                            <label>
                                               <input type="radio" class="radio-inline dynamicradio_button" name="radios{{$data['id']}}[]" value="{{$option->option_value}}" data-text="{{$option->option_name}}">
                                               <span class="outside"><span class="inside"></span></span>
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
                             <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
                          </div>
                        </div>
                          @endif
                        @else
                        <div class="next_btn buttonForOnlyStaticQues" onclick="getOnlyStaticQuestions();"><a href="javascript:;">Please Proceed</a></div>
                        @endif
                        <div class="quote_recieve static_ques_1 static_ques" style="display:none">
                          <h1>How many quotes you want to receive?</h1>
                          <div class="total_quote">
                             <ul>
                                <li>
                                   <div class="formcheck">
                                      <label>
                                         <input class="radio-inline" name="radios" value="1" type="radio">
                                         <span class="outside"><span class="inside"></span></span>
                                         <p>1</p>
                                      </label>
                                   </div>
                                </li>
                                <li>
                                   <div class="formcheck">
                                      <label>
                                         <input class="radio-inline" name="radios" value="2" type="radio">
                                         <span class="outside"><span class="inside"></span></span>
                                         <p>2</p>
                                      </label>
                                   </div>
                                </li>
                                <li>
                                   <div class="formcheck">
                                      <label>
                                         <input class="radio-inline" name="radios" value="3" type="radio">
                                         <span class="outside"><span class="inside"></span></span>
                                         <p>3</p>
                                      </label>
                                   </div>
                                </li>
                                <li>
                                   <div class="formcheck">
                                      <label>
                                         <input class="radio-inline" name="radios" value="4" type="radio">
                                         <span class="outside"><span class="inside"></span></span>
                                         <p>4</p>
                                      </label>
                                   </div>
                                </li>
                                <li>
                                   <div class="formcheck">
                                      <label>
                                         <input class="radio-inline" name="radios" value="5" type="radio">
                                         <span class="outside"><span class="inside"></span></span>
                                         <p>5</p>
                                      </label>
                                   </div>
                                </li>
                             </ul>
                             <div class="t_detail">
                                <p><img src="{{ asset('img/info.png') }}">Choose how many quotes you want to receive.</p>
                             </div>
                             <div class="q_nex_btns">
                                <div class="ele_pre"  data_nxt_id="" onclick="getStaticQuestion(this);"><a href="javascript:;" >&lt; Previous</a></div>
                                <div class="ele_next" id="dynamicquote_chk_login" data_nxt_id="static_ques_2" onclick="getStaticQuestionNext(this);"><a href="javascript:;">Next &gt;</a></div>
                             </div>
                          </div>
                        </div>
                        <div class="describe_work static_ques_2 static_ques" style="display:none">
                          <h1>Describe your work</h1>
                          <p>(0/2000 letters minimum 100)</p>
                          <div class="describe_work_sec">
                             <div class="des_area">
                                <textarea cols="30" class="work_description_modal" name="work_description_text" id="dynamic_description" placeholder="Input description" onkeyup="remove_errmsg(this)"></textarea>
                                <span class="fill_fields" role="alert"></span>
                             </div>
                             <div class="t_detail">
                                <p><img src="{{ asset('img/info.png') }}">Please add your work description.</p>
                             </div>
                             <div class="describe_work_btn">
                                <div class="ele_pre" data_nxt_id="static_ques_1" onclick="getStaticQuestion(this);"><a href="javascript:;">&lt; Previous</a></div>
                                <div class="ele_next" id="static_ques_descriptionn" data_nxt_id="static_ques_3" onclick="getStaticQuestionNext(this);"><a href="javascript:;">Next &gt;</a></div>
                             </div>
                          </div>
                        </div>
                        <div class="registrationform static_ques_3 static_ques" style="display:none">
                          <div class="description_optional row">
                            
                          </div>
                          <div class="D_main">
                            <h1>Add photos, videos or documents that can help the business understand your needs.</h1>
                            <div class="drag_option_main">
                              <div class="select_upload">
                                <div class="upload_file_section">
                                  <!-- <div class="drag_file dz-clickable" id="drag_div">
                                 
                                    <a href="javascript:;">Drag and drop files here to upload</a>
                                  </div>
                                  <span>OR</span> -->
                                  <div class="file_to_upload gen_quote_img">
                                    <div class="upload-btn-wrapper">
                                      <button class="btn">Select files to upload</button>
                                        <input name="myfile[]" id="dynamic_vid_img" multiple="" class="select_gen_quote_img" accept="image/x-png,image/gif,image/jpeg" type="file">
                                    <span id="msg" class="genrl_quote_imgs"></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="describe_work_btn">
                                <div class="ele_pre" data_nxt_id="static_ques_2" onclick="getStaticQuestion(this);"><a href="javascript:;">&lt; Previous</a></div>
                                <div class="ele_next" data_nxt_id="static_ques_4" onclick="getStaticQuestionNext(this);"><a href="javascript:;" class="skip_pic_vid" >Skip &gt;</a></div>
                             </div>
                          </div>
                        </div>
                        <div class="not_all_business static_ques_4 static_ques" style="display:none">
                          <h1>Not all businesses reply to quote requests
                             without phone. Enter your phone number
                             to get more offers.
                          </h1>
                          <div class="ph_detail">
                             <div class="form-group ">
                                <label for="inputEmail4">Phone number</label>
                                <input onkeydown="javascript: return event.keyCode == 69 ? false : true" name="mobile_phone" class="form-control mobl_phn" id="dynamic_mobile_phone" value="@if(Auth::guard('general_user')->check() && !empty(Auth::guard('general_user')->user()->phone_number)){{Auth::guard('general_user')->user()->phone_number}}@endif" onkeyup="remove_errmsg(this)" type="number">
                                <span class="fill_fields" role="alert"></span>
                             </div>
                             <div class="all_business_ph">
                                <div class="ele_pre" onclick="validate_quote_dynamicandstatic(validate)"><a href="javascript:;" class="mobile_validate_submit">Validate</a></div>
                                <div class="ele_next" onclick="validate_quote_dynamicandstatic(validate)"><a href="javascript:;" class="mobile_dont_want">Don’t want</a></div>
                             </div>
                             <div class="t_detail">
                                <p><img src="{{ asset('img/info.png') }}">Add your phone number.</p>
                             </div>
                          </div>
                        </div>
                        <div class="not_all_business final_ques_thanks static_ques" style="display:none;">
                        <h1>Your quote request was sent</h1>
                        <div class="ph_detail">
                           <div class="requ_quote_sent">
                              <h1>Your request was sent to relevant business. Whenever business wil reply to your quote request you’ll receive a notification.</h1>
                              <h1>You can go to quotes page to view your quotes.</h1>
                           </div>
                           <div class="all_business_ph">
                              <div class="ele_pre" ><a href="{{url('general_user/quote_questions')}}">See quotes</a></div>
                              <div class="ele_next" onclick="closdynamicemodal();"><a href="javascript:;">Close</a></div>
                           </div>
                        </div>
                      </div>
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