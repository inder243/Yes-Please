@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/@if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))<a href="{{ url('/business_user/advertisement_dashboard') }}"> Advertisement </a>/@endif<a href="{{ url('/business_user/quotes_questions') }}"> Quotes and questions</a>/<span class="q_breadcrumb"> @if(isset($allquotes)) {{$allquotes->cat_name}}@endif</span></div>
      </section>
        <section>
          <div class="quote_req_main">
            @if(isset($quote_data[0]['status']))
              @if($quote_data[0]['status'] == '4')
              <h1>Quote accepted by @if(isset($quote_data[0]['get_gen_user'])){{$quote_data[0]['get_gen_user']['first_name']}} {{$quote_data[0]['get_gen_user']['last_name']}}@endif</h1>
              @elseif($quote_data[0]['status'] == '3')
              <h1>Quote is Quoted</h1>
              @elseif($quote_data[0]['status'] == '6')
              <h1>Quote Completed</h1>
              @endif
            @endif
            
            @if(isset($quote_data[0]['status']))
              @if($quote_data[0]['status'] == '4')
              <div class="improvement_section_new accepted-quote">
              @elseif($quote_data[0]['status'] == '3')
              <div class="improvement_section_new new_quote q_quoted1">
              @elseif($quote_data[0]['status'] == '6')
              <div class="improvement_section_new new_quote">
              @endif
            @endif  
              <div class="user_profile_sec">
                @if(isset($quote_data))
                  <?php $image = $quote_data[0]['get_gen_user']['image_url'];
                        $general_id = $quote_data[0]['get_gen_user']['user_id'];
                  ?>
                  @if($image)
                  <div class="user_img"><img src="{{url('/images/users/'.$general_id.'/'.$image)}}"/></div>
                  @else
                  <div class="user_img"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                  @endif
                @endif

                <div class="otheruser_detail">
                     @if(isset($quote_data))
                     <h1>{{$quote_data[0]['get_gen_user']['first_name']}} {{$quote_data[0]['get_gen_user']['last_name']}}</h1>
                     <p>{{$quote_data[0]['get_gen_user']['city']}}, {{$quote_data[0]['get_gen_user']['country']}}</p>
                     @else
                     <h1>Moshe</h1>
                     <p>test</p>
                     @endif
                     @if(isset($quote_data))
                    <?php
                      $created_date = $quote_data[0]['get_gen_user']['created_at'];

                      $splitTimeStamp = explode(" ",$created_date);
                      $date = date('M Y',strtotime($splitTimeStamp[0]));
                      $time = date('H:i',strtotime($splitTimeStamp[1]));
                     ?>
                     <span>Member since {{$date}}</span>
                     @endif
                  </div>
                
                <div class="contact_user">
                  <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
                  <a href="javascript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="{{ $quote_data[0]['get_gen_user']['phone_number']}}" data-original-title="{{ $quote_data[0]['get_gen_user']['phone_number']}}"><img src="{{ asset('img/call.png') }}"/></a>
                  
                </div>
                <div class="review_section">
                  <ul>
                    <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->where('review','!=','')->count('review');
                    
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
                  @if(isset($quote_data[0]['status']))
                    @if($quote_data[0]['status'] == '4')
                    <div class="new_lable q_accepted_table bus_accepted">ACCEPTED</div>
                    @elseif($quote_data[0]['status'] == '3')
                    <div class="new_lable q_quoted_table bus_quoted">QUOTED</div>
                    @elseif($quote_data[0]['status'] == '6')
                    <div class="new_lable bus_completed">COMPLETED</div>
                    @endif
                  @endif
                    <?php $datetime = $allquotes['created_at'];
                          $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                          $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                          $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
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
                              <div class="uploaded_img" data-image="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImage(this);return false;">
                                 <img src="{{url('/images/general_quotes/'.$general_id.'/'.$img)}}"/>
                              </div>
                           </div>
                            @endforeach
                            
                          @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next for_next_arrow"></div>
                        <div class="swiper-button-prev for_back_arrow"></div>
                     </div>
                  </div>
               </div>
               @endif
            </div>

          </div>
          <div class="container-fluid">
            <div class="your_quote">
              <h1>Your quote</h1>

              @if(isset($quote_data[0]['quote_reply']))
                @if($quote_data[0]['quote_reply']['price_type'] == 2)
                  @php $price_type = '/hour'; @endphp
                @else
                  @php $price_type = ''; @endphp
                @endif
              @else
              @php $price_type = ''; @endphp
              @endif

              <div class="doller_hr"><h1>$ @if(isset($quote_data[0]['quote_reply'])){{$quote_data[0]['quote_reply']['price_quotes']}} @else 100 @endif </h1><p>{{$price_type}}</p></div>
              <p class="your_quote_des">@if(isset($quote_data[0]['quote_reply'])) {{$quote_data[0]['quote_reply']['details']}} @endif
              </p>
              <div class="total_pics">
                <div class="swiper-container swiper-wrapper_p swiper2">
                       <div class="swiper-wrapper">
                        @if(isset($quote_data[0]['quote_reply']))
                        <?php
                        $uploads = json_decode($quote_data[0]['quote_reply']['uploaded_files'],true);
                         ?>

                        @if(!empty($uploads))
                          @foreach($uploads['pic'] as $img)
                          <?php $img_name = explode( '.', $img );?>
                          <div class="swiper-slide total_pics_img" data-image="{{url('/images/quotes_request/'.$business_userid.'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImage(this);return false;"><img src="{{url('/images/quotes_request/'.$business_userid.'/'.$img)}}"/></div>
                          @endforeach
                          
                        @endif

                        @endif
                       </div>
                       <!-- Add Pagination -->
                       <div class="swiper-pagination1 swiper21"></div>
                       <!-- Add Arrows -->
                       <div class="swiper-button-next swiper2next"></div>
                       <div class="swiper-button-prev swiper2pre"></div>
                    </div>
              </div>
            </div>
            <div class="finish_job">
              
            
                
              @if(!empty($quote_data[0]['get_review']))
                @if(array_search('general', array_column($quote_data[0]['get_review'], 'user_type')) > -1)
                  @if(array_search('business', array_column($quote_data[0]['get_review'], 'user_type')) > -1)

                    @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                    <a href="{{ url('/business_user/quotes_questions?month='.app('request')->input('month').'&type='.app('request')->input('type').'') }}" data-quoteid="{{$quote_data[0]['quote_id']}}" class="finish_job_quotes">Job Completed</a>
                    @else 
                    <a href="{{ url('/business_user/quotes_questions') }}" data-quoteid="{{$quote_data[0]['quote_id']}}" class="finish_job_quotes">Job Completed</a>
                    @endif
                    

                  @else

                     @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                      <a href="{{ url('/business_user/user_quotereviews?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_data[0]['quote_id']) }}" data-quoteid="{{$quote_data[0]['quote_id']}}" class="finish_job_quotes">Job Completed</a>
                      @else 
                      <a href="{{ url('/business_user/user_quotereviews?quote_id='.$quote_data[0]['quote_id']) }}" data-quoteid="{{$quote_data[0]['quote_id']}}" class="finish_job_quotes">Finish job</a>
                      @endif
                  @endif
                @endif
              
              
              @endif
              
            </div>
    </div>
  </section>

@endsection