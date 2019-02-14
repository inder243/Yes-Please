@extends('layouts.inner_general')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb category_breadcrumb">
            <div class="breadcrumb_header"><a href="JavaScript:;">Home</a>/<a href="javascript">Category</a>/<span>@if(!empty($user_details)){{$user_details['first_name']}} {{$user_details['last_name']}}@endif</span></div>
            <div class="share_fb"><a href="javascript:;"/><img src="img/icon_F.png"/>Share</a></div>
         </div>
      </section>
      <div class="container-fluid">
        <div class="user_name_sec">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="u_profile_detail">
                <div class="user_i"><img src="{{ asset('img/user-img.png') }}"/></div>
                <div class="u_detail">
                  <div class="u_detail_h">
                    <h1>@if(!empty($user_details)){{$user_details['first_name']}} {{$user_details['last_name']}}@endif</h1>
                    <a href="javascript:;" class="u_chat"><img src="{{ asset('img/text.png') }}"/></a>
                    <a href="javascript:;" class="u_call"><img src="{{ asset('img/call.png') }}"/></a>
                  </div>
                  <span>Category</span>
                  <p class="u_distance">@if(!empty($user_details)){{$user_details['full_address']}}@endif | <span>Distance <b>@if(!empty($user_details)) @if(!empty($user_details['bu_details'])){{$user_details['bu_details'][0]['distance_kms']}}@endif @endif km</b></span></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="s_btn">
                <span class="u_rating">
                  <a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a>
                  <div class="rating_btns">
                    <a href="javascript:;">Ask for quote</a>
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
                <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
              </ul>
              <p>306 reviews</p>
            </div>
            <div class="work_area">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="G-map">
                    <img src="{{ asset('img/map.png') }}"/>
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
                            $value_to = $userSchedule->sunday_to;}else{$value = '';}
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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras porttitor fermentum tellus, at vehicula magna porttitor sit amet. Nulla dapibus nisi nec faucibus porttitor. Morbi id velit vel sapien eleifend tempus ut eget augue. Phasellus pharetra blandit diam, id sollicitudin odio sollicitudin non. Curabitur in venenatis augue, quis maximus sem. Phasellus faucibus eros vitae rutrum pellentesque. Sed neque ex, auctor sed sollicitudin et, sollicitudin eget arcu. Maecenas id lectus vulputate diam lobortis tristique. Nam mattis sed odio nec mollis.</p>
              <p>Donec lacinia ultrices ante non vulputate. Curabitur nec massa felis. Sed congue, eros et hendrerit convallis, ipsum erat posuere lorem, eget congue tellus tellus ac neque. Integer quis odio lectus. Vivamus ac mattis augue. Aenean facilisis sit amet massa et volutpat. Aliquam sagittis, dui at blandit vestibulum, dui odio aliquam sem, porta laoreet dolor lacus at tortor.</p>
            </div>
            <div class="slider_cont">
              <div class="swiper-container swiper-wrapper_p swiper2">
                     <div class="swiper-wrapper">
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
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>
                       <div class="swiper-slide total_pics_img"><img src="{{ asset('img/Untitled-2.png') }}"/></div>

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