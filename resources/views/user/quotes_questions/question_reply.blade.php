@extends('layouts.inner_general')

@section('content')
<section class="register_step_1">
	<div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
		<div><a href="{{ url('/') }}">Home</a>/<a href="{{ url('/general_user/quote_questions?tab=ques') }}"> Quotes and questions </a>/<a href="{{ url('/general_user/dashboard/catid/'.$allquestions->cat_id) }}">@if(isset($allquestions)) {{$allquestions->cat_name}}@endif</a>/<span class="q_breadcrumb">Question</span></div>
		<div class="cancel_quote mark_answred"><a href="javascript:;" class="mark_asnwered">Mark as answered</a></div>
	</div>
</section>
<section>
	<div class="quote_req_main">
		<h1>Question in @if(!empty($allquestions)){{$allquestions->cat_name}}@endif</h1>
		<div class="improvement_section_new quote_border qhome_improvment">
			<div class="user_profile_sec">
				<div class="user_img qhome_improvmentimg">
					<?php $image = Auth::user()->image_url;
	                    $general_id = Auth::user()->user_id;
	                ?>
	                @if($image)
	                <img src="{{url('/images/users/'.$general_id.'/'.$image)}}"/>
	                @else
					<img src="{{ asset('img/user_placeholder.png') }}"/>
					@endif

				</div>
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

			@if(!empty($allquestions))
			<div class="user_quote_second_section">
				<div class="g_quote_section">
					<div class="g_quote_section_headings">
						<h1>{{ $allquestions['q_title']}}</h1>
					</div>

					<?php $datetime = $allquestions['created_at'];
                        $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                        $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                        $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
					<div class="g_quote_section_datetime">
						<span class="g_quote_section_time">{{$time}} </span>
						<span>{{$date}}</span>
					</div>
				</div>
				<div class="Q_description">
					<p>{{ $allquestions['q_description']}}</p>
				</div>
			</div>
			@endif

		</div>
		<div class="cancel_quote cancel_for_mobile mark_ans_width"><a href="javascript:;">Mark as answered</a></div>
		<div class="list_quotes">
			@if(!empty($all_data))
			<h1>Answers</h1>
			@else
			<div class="no_data_found">No Answer Found For this Question!</div>
			@endif
			<div class="show_quote">
				@if(!empty($all_data))
				<a href="JavaScript:;">Show latest first<img src="{{ asset('img/custom_arrow.png') }}"/></a>
				@endif
				<div class="showing_answer">
					<ul class="all_answers_bus">
						@if(!empty($all_data))
                    	@foreach($all_data as $key=>$ques_data)
                    	
						<li>
							<div class="main_ans_Sec">
								<div class="main_ans_Sec_container">
									<div class="ans_img">
										@php
			                            $bus_user_id = $ques_data['get_bus_user']['business_userid'];
			                            $img_url = $ques_data['get_bus_user']['image_name'];
			                            @endphp

			                            @if($img_url)
			                            <img src="{{url('/images/business_profile/'.$bus_user_id.'/'.$img_url)}}">
			                            @else
										<img src="{{ asset('img/user_placeholder.png') }}">
										@endif
									</div>
									<div class="main_ans_sec_detail">
										<div class="heading_dec">
											<a class="business_answer" href="{{ url('general_user/public_profile/'.$ques_data['business_id'].'/'.$ques_data['get_ques']['cat_id']) }}" target="_blank"><h1>{{$ques_data['get_bus_user']['business_name']}}</h1></a>
											<p class="complete_detail">{{$ques_data['business_answer']}}</p>
										</div>

										<div class="chat_call_sec">
											@if($ques_data['mark_answered'] == 1)
											<a href="javascript:;" data-business_id="{{$ques_data['business_id']}}" data-question_id="{{$ques_data['question_id']}}" data-status="active" class="rate_this" onclick="markAnswered(this);">
												<img src="{{ asset('img/active_star.png') }}">
											</a>
											@else
											<a href="javascript:;" data-business_id="{{$ques_data['business_id']}}" data-question_id="{{$ques_data['question_id']}}" data-status="inactive" class="rate_this" onclick="markAnswered(this);">
												<img src="{{ asset('img/best.png') }}">
											</a>
											@endif
											
											<a href="javascript:;" class="chat_this">
												<img src="{{ asset('img/text.png') }}">
											</a>
											<a href="javascript:;" data-toggle="tooltip" data-placement="top" title="{{ $ques_data['get_bus_user']['phone_number']}}" data-original-title="{{ $ques_data['get_bus_user']['phone_number']}}" class="call_this">
												<img src="{{ asset('img/call.png') }}"/>
											</a>
			                            </div>
									</div>
								</div>
							</div>
						</li>
						@endforeach
                    	@endif
						
					</ul>
				</div>
				<div class="load_more load_new"><a href="JavaScript:;">Load more</a></div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="related_q"><p>Related questions</p></div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="related_q_main">
					<div class="heading_and_time">
						<h1>Home improvement question</h1>
						<span class="imp_time">17/07/2018</span>
					</div>
					<span class="t_ans">Answers <b>5</b></span>
					<p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="related_q_main">
					<div class="heading_and_time">
						<h1>Home improvement question</h1>
						<span class="imp_time">17/07/2018</span>
					</div>
					<span class="t_ans">Answers <b>5</b></span>
					<p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection