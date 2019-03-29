@extends('layouts.inner_general')

@section('content')

 <section class="register_step_1">
        <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
          <div><a href="{{ url('/') }}">Home</a>/<a href="{{ url('/general_user/quote_questions') }}"> Quotes and questions </a>/<a href="{{ url('/general_user/dashboard/catid/'.$allquotes->cat_id) }}">@if(isset($allquotes)) {{$allquotes->cat_name}}@endif</a>/<span class="q_breadcrumb">  Quote</span></div>
          <div class="for_accepted_quote">
            <div class="finish_quote">
                <!-- @if(!empty($all_data[0]['get_reviews']))
                  @if(array_search('general', array_column($all_data[0]['get_reviews'], 'user_type')) > -1)
                  <a href="{{ url('/general_user/quote_questions') }}" data-quoteid="{{$all_data[0]['quote_id']}}" class="finish_job_quotes">This job has been finished</a>
                  @else
                  <a href="{{ url('/general_user/user_quotereviews/'.$all_data[0]['quote_id'].'/'.$all_data[0]['business_id']) }}" data-quoteid="{{$all_data[0]['quote_id']}}" class="finish_job_quotes">Finish job</a>
                  @endif
                @else
                <a href="{{ url('/general_user/user_quotereviews/'.$all_data[0]['quote_id'].'/'.$all_data[0]['business_id']) }}" data-quoteid="{{$all_data[0]['quote_id']}}" class="finish_job_quotes">Finish job</a>
                @endif -->
              
            </div>
            <div class="cancel_quote"><a href="{{ url('general_user/quote_questions') }}">Cancel</a></div>
          </div>
        </div>
      </section>
        <section>
          <div class="quote_req_main">
            <h1>Quote in @if(!empty($allquotes)){{$allquotes->cat_name}}@endif</h1>
            <div class="improvement_section_new new_quote">
              <div class="user_profile_sec">
                <?php $image = Auth::user()->image_url;
                      $general_id = Auth::user()->user_id;
                ?>
                @if($image)
                <div class="user_img"><img src="{{url('/images/users/'.$general_id.'/'.$image)}}"/></div>
                @else
                <div class="user_img"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                @endif
                
                <div class="otheruser_detail">
                  <h1>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                     <p>{{Auth::user()->city}}</p>
                    <?php
                      $created_date = Auth::user()->created_at;

                      $splitTimeStamp = explode(" ",$created_date);
                      $date = date('M Y',strtotime($splitTimeStamp[0]));
                      $time = date('H:i',strtotime($splitTimeStamp[1]));
                     ?>
                     <span>Member since {{$date}}</span>
                </div>
                
                <div class="review_section">
                  <ul>
                      <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'business'])->avg('rating');

                      $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'business'])->where('review','!=','')->count('review');
                      
                      $total_rating = round($get_total_rating);
                      ?>
                      @if(isset($total_rating))
                      @if($total_rating == '5')
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                      @elseif($total_rating == '4')
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                      @elseif($total_rating == '3')
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                      @elseif($total_rating == '2')
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                      @elseif($total_rating == '1')
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
                  <p class="total_review">{{$get_total_reviews}} reviews</p>
                </div>
              </div>
              @if(!empty($allquotes))
              <div class="user_quote_second_section">
                <h1>Quote id : {{ $allquotes['quote_id']}}</h1>
                <!-- <p>Quotes <span>32</span></p> -->
                <div class="Q_tag">
                  <?php $datetime = $allquotes['created_at'];
                      $splitTimeStamp = explode(" ",$datetime);
                      // $date = $splitTimeStamp[0];
                      // $time = $splitTimeStamp[1];
                      $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                      $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>

                   <div class="new_lable gen_completed">COMPLETED</div>
                   <div class="created_date">{{$date}}</div>
                </div>
                <div class="quote_basic_detail">

                  @php $dynamic_formdata = json_decode($allquotes['dynamic_formdata'],true); @endphp

                  @if(!empty($dynamic_formdata ))
                  @foreach($dynamic_formdata as $dynami_key=>$dyanamic_values)
                    @if($dyanamic_values['filter']==1)
                    @if($dyanamic_values['type'] == 'textbox')
                      @if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['value']))
                      <div class="Q_detail">
                        <span class="Q_detail_heading">{{$dyanamic_values['title']}} :</span>
                        <span>{{$dyanamic_values['value']}}</span>
                      </div>
                      @endif
                    @else
                      @if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['options']))
                      <div class="Q_detail">
                        <span class="Q_detail_heading">{{$dyanamic_values['title']}} :</span>

                        @php $get_labels = ''; @endphp
                        @foreach($dyanamic_values['options'] as $checkbox_data)
                          @php $get_labels .= $checkbox_data['label'] . ','; @endphp
                        @endforeach
                        <span>{{$get_labels}}</span>
                      </div>
                      @endif
                    @endif
                    @endif
                  @endforeach
                  @endif

                  @if(!empty($allquotes['phone_number']))
                  <div class="Q_detail">
                    <span class="Q_detail_heading">Mobile Number:</span>
                    <span>{{$allquotes['phone_number']}}</span>
                  </div>
                  @endif

                </div>
                <div class="Q_description">
                  <p>{{ $allquotes['work_description']}}</p>
                  </div>
                <div class="uploaded_content">
                     <div class="swiper-container swiper-wrapper_p">
                        <div class="swiper-wrapper ">
                            <?php 
                              $uploads = json_decode($allquotes['uploaded_files'],true);
                            ?>

                          @if(!empty($uploads))
                            @foreach($uploads['pic'] as $img)
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="uploaded_img" data-image="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImageUser(this);return false;">
                                 <img src="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}"/>
                              </div>
                           </div>
                            @endforeach
                            
                          @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next for_next_arrow1"></div>
                        <div class="swiper-button-prev for_back_arrow1"></div>
                     </div>
                  </div>
              </div>
              @endif
            </div>
            <div class="some_btns_for_mobile">
              <div class="cancel_quote cancel_for_mobile"><a href="javascript:;">Cancel</a></div>
             <!--  <div class="finish_quote finish_for_mobile"><a href="javascript:;">Finish</a></div> -->
            </div>
            <div class="list_quotes">
            <h1>Quotes</h1>
            <div class="show_quote">
              <a href="JavaScript:;">Show latest first<img src="{{ asset('img/custom_arrow.png') }}"/></a>
              <div class="total_list_quote">
                <ul class="all_bus_by_cat">

                  @if(!empty($all_data))
                    @foreach($all_data as $key=>$quote_data)
                      @if(!empty($quote_data['quotes']))
                        <li class="border-complete">
                          <a href="{{ url('general_user/quotesreqcompleted/'.$quote_data['quote_id'].'/'.$quote_data['business_id']) }}" class="gen_req_link">
                          <h1>COMPLETED</h1>
                          <div class="b_name_list">
                          <div class="user_quote_img">
                            @php
                            $bus_user_id = $quote_data['get_bus_user']['business_userid'];
                            $img_url = $quote_data['get_bus_user']['image_name'];
                            @endphp

                            @if($img_url)
                            <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}">
                            @else
                            <img src="{{ asset('img/user_placeholder.png') }}">
                            @endif

                          </div>
                          <div class="other_details_quote">
                            
                            <h1>{{$quote_data['get_bus_user']['business_name']}}</h1>

                            @php $details = mb_strimwidth($quote_data['details'], 0, 30, "..."); @endphp

                            @if($quote_data['price_type'] == 2)
                            @php $price_type = '/hour'; @endphp
                            @else
                            @php $price_type = ''; @endphp
                            @endif

                            <p><span>$ {{$quote_data['price_quotes'].$price_type}}</span>for {{$details}}</p>
                          </div>
                          <div class="for_discount_pt">
                            <span>Entitled for discount for points</span>
                          </div>
                        </div>
                      </a>
                        </li>

                      @else
                        <li>
                          <a href="{{ url('general_user/quotesreqcompleted/'.$quote_data['quote_id'].'/'.$quote_data['business_id']) }}" class="gen_req_link">
                          <div class="b_name_list">
                          <div class="user_quote_img">
                            @php
                            $bus_user_id = $quote_data['get_bus_user']['business_userid'];
                            $img_url = $quote_data['get_bus_user']['image_name'];
                            @endphp

                            @if($img_url)
                            <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}">
                            @else
                            <img src="{{ asset('img/user_placeholder.png') }}">
                            @endif
                          </div>
                          <div class="other_details_quote">
                            <h1>{{$quote_data['get_bus_user']['business_name']}}</h1>

                            @php $details = mb_strimwidth($quote_data['details'], 0, 30, "..."); @endphp

                            @if($quote_data['price_type'] == 2)
                            @php $price_type = '/hour'; @endphp
                            @else
                            @php $price_type = ''; @endphp
                            @endif

                            <p><span>$ {{$quote_data['price_quotes'].$price_type}}</span>for {{$details}}</p>
                          </div>
                        </div>
                        </a>
                        </li>
                      @endif
                      
                    @endforeach
                    @endif
                </ul>
                <div class="load_more load_new"><a href="JavaScript:;">Load more</a></div>
              </div>
            </div>
          </div>

          </div>
        </section>

@endsection