@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div><a href="JavaScript:;">Home</a>/<a href="JavaScript:;"> Category </a>/<span class="q_breadcrumb">Review</span></div>

         </div>
      </section>
      <section>
         <div class="quote_req_main_finsih">
            <h1>Business name</h1>
            <p>You will be able to view how the business rated and reviewed you after both of you will submit your reviews.</p>
            <div class="quote_req_main finish_re">
            <div class="improvement_section_new quote_border ">
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
                     <a href="tel:{{$quote_data[0]['get_gen_user']['phone_number']}}" class="user_call"><img src="{{ asset('img/call.png') }}"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
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
               <div class="user_quote_second_section">
                  <form id="business_review_submit" action="{{ route('business_user.quote_review_submit') }}" method="POST">
                     @csrf

                     <input type="hidden" name="review_gen_id" value="{{$quote_data[0]['general_id']}}">
                     <input type="hidden" name="review_quote_id" value="{{$quote_data[0]['quote_id']}}">
                     <input type="hidden" name="review_bus_id" value="{{$quote_data[0]['business_id']}}">
                     <input type="hidden" name="review_type" value="business">
                 <div class="write_reviews">
                   <p>Write your review<span><img src="{{ asset('img/question_img.png') }}"/></span></p>
                   <div class="write_sec">
                     <textarea name="review_text" class="review_text"></textarea>
                   </div>
                 </div>
                 <div class="rate_business">
                   <h1>Rate this business</h1>
                   <ul class="review_ul">
                     <li id="start_1" data-id="1" data-status="inactive" onClick="change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="start_2" data-id="2" data-status="inactive" onClick="change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="start_3" data-id="3" data-status="inactive" onClick="change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="start_4" data-id="4" data-status="inactive" onClick="change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                     <li id="start_5" data-id="5" data-status="inactive" onClick="change_review(this); return false;"><img src="{{ asset('img/inactive_star.png') }}"/></li>
                   </ul>
                   <input type="hidden" name="star_active" class="hidden_star_active" value="">
                   <div class="review_later">
                     <a href ="{{ url('business_user/quotes_questions') }}" class="review_later1">Review later</a>
                     <a href ="JavaScript:;" class="submit_reviewr"><input type="submit" value="Submit review"></a>
                   </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
@endsection