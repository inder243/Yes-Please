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
                  <div class="user_img qhome_improvmentimg"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                  <div class="otheruser_detail">
                     @if(isset($quote_data))
                     <h1>{{$quote_data[0]['get_gen_user']['first_name']}} {{$quote_data[0]['get_gen_user']['last_name']}}</h1>
                     <p>{{$quote_data[0]['get_gen_user']['city']}}, {{$quote_data[0]['get_gen_user']['country']}}</p>
                     @else
                     <h1>Moshe</h1>
                     <p>test</p>
                     @endif
                     <span>Member since Aug 2016</span>
                  </div>
                  <div class="contact_user">
                     <a href="JavaScript:;" class="user_call"><img src="{{ asset('img/call.png') }}"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
                  </div>
                  <div class="review_section">
                     <ul>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/active_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                        <li><a href="javascript:;"><img src="{{ asset('img/inactive_star.png') }}"/></a></li>
                     </ul>
                     <p class="total_review">306 reviews</p>
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
                     <a href ="JavaScript:;" class="review_later1">Review later</a>
                     <a href ="JavaScript:;" class="submit_reviewr"><input type="submit" value="Submit review"></a>
                   </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
@endsection