@extends('layouts.inner_general')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div> <a href="{{ url('/') }}">Home</a>/<a href="{{ url('/general_user/quote_questions') }}"> Quotes and questions </a>/<span class="q_breadcrumb">  Quote request</span></div>

           <div class="for_accepted_quote">
            <div class="finish_quote">

              @if(!empty($get_user_data['quotes']) && $get_user_data['quotes']['status']== 6)
                @if(!empty($get_user_data['get_reviewss']))
                  @if(array_search('general', array_column($get_user_data['get_reviewss'], 'user_type')) > -1)
                  <a href="{{ url('/general_user/quote_questions') }}" data-quoteid="{{$get_user_data['quote_id']}}" class="finish_job_quotes">Job Completed</a>
                  @else
                  <a href="{{ url('/general_user/user_quotereviews/'.$get_user_data['quote_id'].'/'.$get_user_data['business_id']) }}" data-quoteid="{{$get_user_data['quote_id']}}" class="finish_job_quotes">Finish job</a>
                  @endif
                @else
                <a href="{{ url('/general_user/user_quotereviews/'.$get_user_data['quote_id'].'/'.$get_user_data['business_id']) }}" data-quoteid="{{$get_user_data['quote_id']}}" class="finish_job_quotes">Finish job</a>
                @endif
              @endif
            </div>
            <div class="cancel_quote">

              <a href="{{url('general_user/quote_questions')}}">Cancel</a></div> 
          </div>

         </div>
      </section>
      <section>
         <div class="quote_req_main">
            <h1>Quote request</h1>
            <div class="improvement_section_new quote_border">
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
                  <div class="contact_user">
                     <a href="tel:{{Auth::user()->phone_number}}" class="user_call"><img src="{{ asset('img/call.png') }}"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
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
                 <div class="g_quote_section">
                  <div class="g_quote_section_headings">
                        <h1>Quote id : {{ $allquotes['quote_id']}}</h1>
                        <!-- <p>Quotes <span>32</span></p> -->
                  </div>
                  <div class="g_quote_section_datetime">
                    <?php $datetime = $allquotes['created_at'];
                          $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                          $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                          $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
                    <span class="g_quote_section_time">{{$time}} </span>
                    <span>{{$date}}</span>
                  </div>
                </div>
                  <div class="quote_basic_detail">
                     <div class="Q_detail">
                        <span class="Q_detail_heading">Mobile Number:</span>
                        <span>{{ $allquotes['phone_number']}}</span>
                     </div>
                     <!-- <div class="Q_detail">
                        <span class="Q_detail_heading">Required task:</span>
                        <span>Design house</span>
                     </div>
                     <div class="Q_detail">
                        <span class="Q_detail_heading">Design type: </span>
                        <span>Modern</span>
                     </div> -->
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
            <div class="cancel_quote cancel_for_mobile"><a href="javascript:;">Cancel</a></div>
            <div class="list_quotes">

              <div class="show_quote">

                <div class="total_list_quote">
                  <ul>
                    <li>
                      <div class="user_quote_img">
                        @php
                        $bus_user_id = $get_user_data['get_bus_user']['business_userid'];
                        $img_url = $get_user_data['get_bus_user']['image_name'];
                        @endphp

                        @if($img_url)
                        <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}">
                        @else
                        <img src="{{ asset('img/user_placeholder.png') }}">
                        @endif
                      </div>
                      <div class="other_details_quote">
                        <h1>@if(isset($get_user_data['get_bus_user'])){{$get_user_data['get_bus_user']['first_name']}} {{$get_user_data['get_bus_user']['last_name']}} @endif</h1>
                        <p><span>$ {{$get_user_data['price_quotes']}}</span> for everything</p>
                      </div>
                    </li>
                  </ul>
                  
                </div>
              </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="your_quote">

               <div class="doller_hr">
                  <h1>$ {{$get_user_data['price_quotes']}} </h1>
                  <p>/hour</p>
               </div>
               <div class="accept_ignore">
                @if(isset($quoteSts) && $quoteSts!=6)
                  <a href="" class="accept_by_gen" data-quote_id="{{$get_user_data['quote_id']}}" data-business_id="{{$get_user_data['business_id']}}">Accept</a> 
                  <a href="" class="ignore_by_gen" data-quote_id="{{$get_user_data['quote_id']}}" data-business_id="{{$get_user_data['business_id']}}">Ignore</a>
                  @endif
               </div>
               <p class="your_quote_des">{{$get_user_data['details']}}
               </p>
               <div class="total_pics">
               	<div class="swiper-container swiper-wrapper_p swiper2">
                       <div class="swiper-wrapper">
                        @if(isset($get_user_data))
                        <?php
                        $uploads = json_decode($get_user_data['uploaded_files'],true);
                         ?>

                        @if(!empty($uploads))
                          @foreach($uploads['pic'] as $img)
                          <?php $img_name = explode( '.', $img );?>
                          <div class="swiper-slide total_pics_img" data-image="{{url('/images/quotes_request/'.$get_user_data['get_bus_user']['business_userid'].'/'.$img)}}" id="img_{{$img_name[0]}}" onclick="openBigImageUser(this);return false;"><img src="{{url('/images/quotes_request/'.$get_user_data['get_bus_user']['business_userid'].'/'.$img)}}"/></div>
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

         </div>
      </section>
@endsection