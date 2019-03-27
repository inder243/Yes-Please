@extends('layouts.inner_general')

@section('content')
<?php //echo "<pre>";print_r($user_details);die;?>
<section class="register_step_1">
  <?php if(!empty($status)){ ?>
  <input type="hidden" class="publicprofile_status" value="<?php echo $status;?>">
<?php } ?>
         <div class="breadcrumb register_breadcrumb category_breadcrumb">
            <div class="breadcrumb_header"><a href="{{ url('/') }}">Home</a>/<span>@if(!empty($user_details)){{$user_details['business_name']}}@endif</span></div>
            <div class="share_fb"><a href="javascript:;"/><img src="{{ asset('img/icon_F.png') }}"/>Share</a></div>
         </div>
      </section>
      <div class="container-fluid">
        <div class="user_name_sec">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="u_profile_detail">
                <div class="user_i">
                  @if(!empty($user_details))
                    @if(!empty($user_details['image_name']))
                      @php
                      $bus_user_id = $user_details['business_userid'];
                      $img_url = $user_details['image_name'];
                      @endphp
                    <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}"/>
                    @else
                    <img src="{{ asset('img/user-img.png') }}"/>
                    @endif
                  @else
                  <img src="{{ asset('img/user-img.png') }}"/>
                  @endif
                </div>
                <div class="u_detail">
                  <div class="u_detail_h">
                    <h1>@if(!empty($user_details)){{$user_details['business_name']}}@endif</h1>
                    <a href="javascript:;" class="u_chat"><img src="{{ asset('img/text.png') }}"/></a>
                    <a href="@if(!empty($user_details))tel:{{$user_details['phone_number']}} @else javascript:; @endif" class="u_call"><img src="{{ asset('img/call.png') }}"/></a>
                  </div>
                  <span>{{$cat_name}}</span>
                  <p class="u_distance">@if(!empty($user_details)){{$user_details['full_address']}}@endif | <span>Distance <b>@if(!empty($user_details)) @if(!empty($user_details['bu_details'])){{$user_details['bu_details'][0]['distance_kms']}}@endif @endif km</b></span></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="s_btn">
                <span class="u_rating">
                  <a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a>
                  <div class="rating_btns">
                    <a href="javascript:;" data-toggle="modal" data-target="#work_description" data-backdrop="static" data-keyboard="false">Ask for quote</a>
                    <a href="javascript:;">Ask question</a>
                    <a href="javascript:;">Schedule appointment</a>
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
        <section>
          <div class="user_map_sec">
            <div class="r-star">
              <ul>
                @if(isset($round_rating))
                  @if($round_rating == '5')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                  @elseif($round_rating == '4')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($round_rating == '3')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($round_rating == '2')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @elseif($round_rating == '1')
                    <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                  @else
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                    <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li> 
                  @endif 
                @else
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                @endif
              </ul>
              <p>@if(isset($total_review)) {{$total_review}} @endif reviews</p>
            </div>
            <div class="work_area">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="G-map">
                    @if(!empty($user_details))

                    @php 
                    $longitude = $user_details['logitude'];
                    $latitude = $user_details['latitude'];
                    @endphp

                    @endif

                    <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$latitude}},{{$longitude}}&amp;key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ"></iframe>

                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="w-area">
                  <div class="w-area_1">
                    <h1>Working areas:</h1>
                    <p>Websites, Logo, Application, Icons</p>
                  </div>
                  <div class="hastag_sec">
                    <h1>Hashtags:</h1>
                    <ul>
                      @if(!empty($user_details))
                      @if(isset($user_details['hash_tags']))
                      @foreach($user_details['hash_tags'] as $key=>$hashtags)
                      <li><a href="javascript:;" tag_id="{{$hashtags['tag_id']}}"/>#{{$hashtags['bus_hashtags']['hashtag_name']}}</a></li>
                      @endforeach
                      @endif
                      @endif
                      
                    </ul>
                  </div>
                  <div class="working-hr">
                    <h1>Working hours:</h1>

                    @if(!empty($user_details))
                    @if(isset($user_details['bu_details'][0]['schedule']))
                    <?php $userSchedule = json_decode($user_details['bu_details'][0]['schedule']);?>
                    @endif
                    @endif

                    @if(isset($userSchedule->available))
                    <?php echo "available 24 hours 7 days a week";?>
                    @else
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Sunday</div>
                        <?php if(isset($userSchedule->sunday_from)){ 
                          $value = $userSchedule->sunday_from;}else{$value = '';}
                        if(isset($userSchedule->sunday_to)){ 
                            $value_to = $userSchedule->sunday_to;}else{$value_to = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Thursday</div>
                        <?php if(isset($userSchedule->thursday_from)){ 
                          $value = $userSchedule->thursday_from;}else{$value = '';}
                        if(isset($userSchedule->thursday_to)){ 
                            $value_to = $userSchedule->thursday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <!-- <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Sunday</div>
                        <div class="weekdaytime">09:00 - 18:00</div>
                      </div>
                      </div> -->
                      <!-- <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Thursday</div>
                        <?php if(isset($userSchedule->thursday_from)){ 
                          $value = $userSchedule->thursday_from;}else{$value = '';}
                        if(isset($userSchedule->thursday_to)){ 
                            $value_to = $userSchedule->thursday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Monday</div>
                        <?php if(isset($userSchedule->monday_from)){ 
                          $value = $userSchedule->monday_from;}else{$value = '';}
                        if(isset($userSchedule->monday_to)){ 
                            $value_to = $userSchedule->monday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Tuesday</div>
                        <?php if(isset($userSchedule->tuesday_from)){ 
                          $value = $userSchedule->tuesday_from;}else{$value = '';}
                        if(isset($userSchedule->tuesday_to)){ 
                            $value_to = $userSchedule->tuesday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Friday</div>
                        <?php if(isset($userSchedule->friday_from)){ 
                          $value = $userSchedule->friday_from;}else{$value = '';}
                        if(isset($userSchedule->friday_to)){ 
                            $value_to = $userSchedule->friday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Wednesday</div>
                        <?php if(isset($userSchedule->wednesday_from)){ 
                          $value = $userSchedule->wednesday_from;}else{$value = '';}
                        if(isset($userSchedule->wednesday_to)){ 
                            $value_to = $userSchedule->wednesday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <div class="weekand_time">
                        <div class="weekday">Saturday</div>
                        <?php if(isset($userSchedule->saturday_from)){ 
                          $value = $userSchedule->saturday_from;}else{$value = '';}
                        if(isset($userSchedule->saturday_to)){ 
                            $value_to = $userSchedule->saturday_to;}else{$value = '';}
                        ?>
                        <div class="weekdaytime">{{$value}} - {{$value_to}}</div>
                      </div>
                      </div>
                    </div>
                    @endif
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="text_slider">
            <div class="breif_detail">
              <p>@if(!empty($user_details)) 
                  @if(!empty($user_details['bu_details']))
                    @if($user_details['bu_details'][0]['business_profile'])
                    {{$user_details['bu_details'][0]['business_profile']}}
                    @else
                    No Description Found!
                    @endif
                  @endif 
                @endif
              </p>
            </div>
            <div class="slider_cont">
              <div class="swiper-container swiper-wrapper_p swiper2">
                     <div class="swiper-wrapper">

                      @if(!empty($user_details)) 
                        @if(!empty($user_details['bu_details']))
                          @php
                          $uploads = json_decode($user_details['bu_details'][0]['pic_vid'],true);
                          @endphp

                          @if(!empty($uploads))
                            @foreach($uploads['pic'] as $img)
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="swiper-slide total_pics_img" data-image="{{url('/images/profile/'.$user_details['business_userid'].'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImageUser(this);return false;"><img src="{{url('/images/profile/'.$user_details['business_userid'].'/'.$img)}}"/></div>
                            </div>
                            @endforeach
                            
                          @endif


                        @endif
                      @endif

                       
<!-- 
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div> -->

                     </div>
                     <!-- Add Pagination -->
                     <div class="swiper-pagination1 swiper21"></div>
                     <!-- Add Arrows -->
                     <div class="swiper-button-next swiper2next"></div>
                     <div class="swiper-button-prev swiper2pre"></div>
                  </div>
            </div>
          </div>
        </section>
        <section>
          <div class="price_list">
            <div class="price_list_main">
              <div class="price_list_detail">
                <h1>Pricelist</h1>
                <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod felis accumsan justo suscipit, ac dignissim velit pulvinar. Nullam nisi quam, ultrices a efficitur dapibus, interdum quis lectus.</p>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Logo design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Website design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Business card design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="product-d">
            <div class="p_detail_main">
              <div class="view_pro">
                <a href="javascript:;"><h1>View products</h1><img src="{{ asset('img/custom_arrow.png') }}"/></a>
              </div>
              <div class="c_pr_sec">
                <div class="p_name_dec">
                  <div class="name_price">
                    <h1 class="p-name">Product name</h1>
                    <span><h1>$40</h1><p>/hr</p></span>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar neque neque, ut semper nisl venenatis vitae. Mauris quis risus lacus. Sed cursus urna sed nibh pellentesque tincidunt. Quisque pharetra, dui quis aliquam tempor, orci augue sollicitudin orci, et ornare elit libero eu magna ...</p>
                  <ul>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                  </ul>
                </div>
                <div class="p_name_dec">
                  <div class="name_price">
                    <h1 class="p-name">Product name</h1>
                    <span><h1>$40</h1><p>/hr</p></span>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar neque neque, ut semper nisl venenatis vitae. Mauris quis risus lacus. Sed cursus urna sed nibh pellentesque tincidunt. Quisque pharetra, dui quis aliquam tempor, orci augue sollicitudin orci, et ornare elit libero eu magna ...</p>
                  <ul>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                    <li><img src="{{ asset('img/Untitled-2.png') }}"/></li>
                  </ul>
                </div>
                <div class="load_more"><a href="javascript:;">Load more</a></div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="view-review-main">
            <div class="view_pro">
              <a href="javascript:;"><h1>View products</h1><img src="{{ asset('img/custom_arrow.png') }}"/></a>
            </div>
            <div class="r-detail">
              <div class="star-date">
                <div class="rating_t">
                  <ul>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/inactive_star.png') }}"/></li>
                  </ul>
                  <p>17/07/2018</p>
                </div>
                <div class="comp-detail">
                  <div class="comp-user-pic">
                  <img src="{{ asset('img/user_placeholder.png') }}"/>
                  </div>
                  <div class="c-user-detail">
                    <h1>Firstname Lastname</h1>
                    <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                  </div>
                </div>
              </div>
              <div class="star-date">
                <div class="rating_t">
                  <ul>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/active_star.png') }}"/></li>
                    <li><img src="{{ asset('img/inactive_star.png') }}"/></li>
                  </ul>
                  <p>17/07/2018</p>
                </div>
                <div class="comp-detail">
                  <div class="comp-user-pic">
                  <img src="{{ asset('img/user_placeholder.png') }}"/>
                  </div>
                  <div class="c-user-detail">
                    <h1>Firstname Lastname</h1>
                    <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                  </div>
                </div>
              </div>
              <div class="load_more"><a href="javascript:;">Load more</a></div>
            </div>
          </div>
        </section>
      </div>
@endsection