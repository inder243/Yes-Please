@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
 <div class="breadcrumb register_breadcrumb"><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/@if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))<a href="{{ url('/business_user/advertisement_dashboard') }}"> Advertisement </a>/@endif<a href="{{ url('/business_user/quotes_questions?tab=ques') }}">  Quotes and questions</a>/<span class="q_breadcrumb">Question</span></div>
</section>
<section>
 	<div class="quote_req_main">
    	<h1>{{$allquestions['cat_name']}} Question</h1>
    	<div class="improvement_section_new quoted_question">
       		<div class="user_profile_sec">
	       		@if(isset($question_data))
		       		<?php $image = $question_data['get_gen_user']['image_url'];
						$general_id = $question_data['get_gen_user']['user_id'];
					?>
					@if($image)
		          	<div class="user_img for_q_detail"><img src="{{url('/images/users/'.$general_id.'/'.$image)}}"/></div>
		          	@else
					<div class="user_img"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
					@endif
	          	@endif
	          	<div class="otheruser_detail">
		            @if(isset($question_data))
					<h1>{{$question_data['get_gen_user']['first_name']}} {{$question_data['get_gen_user']['last_name']}}</h1>
					<p>{{$question_data['get_gen_user']['city']}}, {{$question_data[0]['get_gen_user']['country']}}</p>
					@else
					<h1>Moshe</h1>
					<p>test</p>
					@endif
		            @if(isset($question_data))
						<?php
						$created_date = $question_data['get_gen_user']['created_at'];

						$splitTimeStamp = explode(" ",$created_date);
						$date = date('M Y',strtotime($splitTimeStamp[0]));
						$time = date('H:i',strtotime($splitTimeStamp[1]));
						?>
						<span>Member since {{$date}}</span>
					@endif
	          	</div>
	          	<div class="contact_user">
	             	<a href="JavaScript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="{{ $question_data['get_gen_user']['phone_number']}}" data-original-title="{{ $question_data['get_gen_user']['phone_number']}}"><img src="{{ asset('img/call.png') }}"/></a>
	             	<a href="JavaScript:;" class="user_text"><img src="{{ asset('img/text.png') }}"/></a>
	          	</div>
	          	<div class="review_section">
	             	<ul>
						<?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$question_data['get_gen_user']['id'],'user_type'=>'business'])->avg('rating');

						$get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$question_data['get_gen_user']['id'],'user_type'=>'business'])->where('review','!=','')->count('review');

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
       		<div class="user_quote_second_section position-relative">
	          	<h1>{{ $allquestions['q_title']}}</h1>
	          	<?php $datetime = $allquestions['created_at'];
					$splitTimeStamp = explode(" ",$datetime);
					// $date = $splitTimeStamp[0];
					// $time = $splitTimeStamp[1];
					$date = date('d/m/Y',strtotime($splitTimeStamp[0]));
					$time = date('H:i',strtotime($splitTimeStamp[1]));
				?>
	          	<div class="created_dated">{{$date}}</div>
          		<div class="Q_description">
             		<p>{{ $allquestions['q_description']}}</p>
          		</div>
       		</div>
       		@endif
    	</div>
    	@if(isset($question_data))
    		@if(empty($question_data['business_answer']))
	    	<div class="your_answer_section question_answer">
	       		<div class="form-group your_answer col-md-12 col-12">
	          		<label for="inputPassword4">Your answer</label>
	          		<textarea name="question_answer_text" id="qus_answer" class="question_answer_text" onkeyup="removeErrorMsgs(this)"></textarea>
	          		<span class="fill_fields" role="alert" style="display:none;"></span>
	       		</div>
	       		<div class="finish_job ans_btn">
	          		<a href="javascript:;" data-question_id="{{$question_data['question_id']}}" data-business_id="{{$question_data['business_id']}}" onclick="submitQuestionAnswer(this)">Answer</a>
	       		</div>
	    	</div>
	    	@else
	    	<div class="your_answer_section question_answer">
	       		<div class="form-group your_answer col-md-12 col-12">
	          		<label for="inputPassword4">Your answer</label>
	          		<textarea name="question_answer_text" id="qus_answer" class="question_answer_text" onkeyup="removeErrorMsgs(this)">{{$question_data['business_answer']}}</textarea>
	          		<span class="fill_fields" role="alert" style="display:none;"></span>
	       		</div>
	       		<div class="finish_job ans_btn">
	          		<a href="javascript:;" data-question_id="{{$question_data['question_id']}}" data-business_id="{{$question_data['business_id']}}" onclick="submitQuestionAnswer(this)">Edit Answer</a>
	       		</div>
	    	</div>
	    	@endif
    	@endif
 	</div>
</section>

@endsection