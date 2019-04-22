@extends('layouts.inner_general')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div><a href="{{ url('/') }}">Home </a>/<a href="{{ url('/general_user/dashboard/catid/'.$quote_data['get_quotes']['cat_id']) }}">@if(isset($quote_data)) {{$quote_data['get_quotes']['cat_name']}} @endif</a>/<a href="{{ url('/general_user/quote_questions') }}"> Quotes and Questions </a>/<span class="q_breadcrumb"> Review {{$quote_data['get_bus_user']['business_name']}}</span></div>

         </div>
      </section>
      <section>
         <div class="quote_req_main_finsih">
          @if(isset($quote_data))
          @if(isset($quote_data['get_bus_user']))
            <h1>{{$quote_data['get_bus_user']['business_name']}}</h1>
          @else
          <h1>Business name</h1>
          @endif
          @endif
            <p>You will be able to view how the business rated and reviewed you after both of you will submit your reviews.</p>
            <div class="quote_req_main finish_re">
            <div class="improvement_section_new quote_border ">
               <div class="user_profile_sec">

                @if(isset($quote_data))
                  @php 
                  $image = $quote_data['get_bus_user']['image_name'];
                  $business_id = $quote_data['get_bus_user']['business_userid'];
                  @endphp
                  @if($image)
                  <div class="user_img qhome_improvmentimg"><img src="{{url('/images/business_profile/'.$business_id.'/'.$image)}}"/></div>
                  @else
                  <div class="user_img qhome_improvmentimg"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                  @endif
                @endif
                
                  <div class="otheruser_detail">
                     @if(isset($quote_data))
                       <h1><a href="{{url('/general_user/public_profile/'.$quote_data['get_bus_user']['id'].'/'.$quote_data['get_quotes']['cat_id'])}}">{{$quote_data['get_bus_user']['business_name']}}</a></h1>
                       <p>{{$quote_data['get_bus_user']['full_address']}}</p>
                       
                        @php
                        $created_date = $quote_data['get_bus_user']['created_at'];

                        $splitTimeStamp = explode(" ",$created_date);
                        $date = date('M Y',strtotime($splitTimeStamp[0]));
                        $time = date('H:i',strtotime($splitTimeStamp[1]));
                        @endphp
                       <span>Member since {{$date}}</span>
                       @else
                       <h1>Moshe</h1>
                       <p>test</p>
                       <span>Member since Feb 2019</span>
                     @endif
                  </div>
                  <div class="contact_user">
                    @if(isset($quote_data))
                    <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
                     <a href="javascript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="{{ $quote_data['get_bus_user']['phone_number']}}" data-original-title="{{ $quote_data['get_bus_user']['phone_number']}}"><img src="{{ asset('img/call.png') }}"/></a>
                     
                     @endif
                  </div>
                  <div class="review_section">

                     <ul>
                        <?php $get_total_rating = DB::table('yp_user_reviews')->where(['user_type'=>'general','business_id'=>$quote_data['business_id']])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['user_type'=>'general','business_id'=>$quote_data['business_id']])->where('review','!=','')->count('review');
                    
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
               <div class="user_quote_second_section">

                <form id="general_review_submit" action="{{ route('general_user.quote_review_submit') }}" method="POST">
                     @csrf

                     <input type="hidden" name="review_gen_id" value="{{$quote_data['general_id']}}">
                     <input type="hidden" name="review_quote_id" value="{{$quote_data['quote_id']}}">
                     <input type="hidden" name="review_bus_id" value="{{$quote_data['business_id']}}">
                     <input type="hidden" name="review_type" value="general">

                 <div class="write_reviews">
                   <p>Write your review<span><img src="{{ asset('img/question_img.png') }}"/></span></p>
                   <div class="write_sec">
                     <textarea name="review_text" onkeyup="remove_errmsg(this)" class="gen_review_text" id="gen_reviewtext"></textarea>
                     <span class="fill_fields" style="display:none;"></span>
                   </div>
                 </div>
                 <div class="rate_business">
                   <h1>Rate this business</h1>
                   <ul class="gen_review_ul">
                     <li id="star_1" data-id="1" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="star_2" data-id="2" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="star_3" data-id="3" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="star_4" data-id="4" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="star_5" data-id="5" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                   </ul>

                   <span class="fill_fields" style="display:none;text-align: center;"></span>

                   <input type="hidden" name="gen_star_active" class="gen_hidden_star_active" value="">
                   <div class="review_later">
                     <a href ="{{ url('general_user/quote_questions') }}" class="review_later1">Review later</a>
                     <a href ="JavaScript:;" class="submit_reviewr"><input type="submit" value="Submit review"></a>
                   </div>
                 </div>
                  </form>
               </div>
            </div>
         </div>
      </section>


@endsection