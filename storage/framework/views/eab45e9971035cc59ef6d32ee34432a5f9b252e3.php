<?php $__env->startSection('content'); ?>

<section class="register_step_1">
 <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?><a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>"> Advertisement </a>/<?php endif; ?><a href="<?php echo e(url('/business_user/quotes_questions')); ?>">  Quotes and questions</a>/<span class="q_breadcrumb">Question</span></div>
</section>
<section>
 	<div class="quote_req_main">
    	<h1><?php echo e($allquestions['cat_name']); ?> Question : <?php echo e($allquestions['question_id']); ?></h1>
    	<div class="improvement_section_new quoted_question">
       		<div class="user_profile_sec">
	       		<?php if(isset($question_data)): ?>
		       		<?php $image = $question_data['get_gen_user']['image_url'];
						$general_id = $question_data['get_gen_user']['user_id'];
					?>
					<?php if($image): ?>
		          	<div class="user_img for_q_detail"><img src="<?php echo e(url('/images/users/'.$general_id.'/'.$image)); ?>"/></div>
		          	<?php else: ?>
					<div class="user_img"><img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/></div>
					<?php endif; ?>
	          	<?php endif; ?>
	          	<div class="otheruser_detail">
		            <?php if(isset($question_data)): ?>
					<h1><?php echo e($question_data['get_gen_user']['first_name']); ?> <?php echo e($question_data['get_gen_user']['last_name']); ?></h1>
					<p><?php echo e($question_data['get_gen_user']['city']); ?>, <?php echo e($question_data[0]['get_gen_user']['country']); ?></p>
					<?php else: ?>
					<h1>Moshe</h1>
					<p>test</p>
					<?php endif; ?>
		            <?php if(isset($question_data)): ?>
						<?php
						$created_date = $question_data['get_gen_user']['created_at'];

						$splitTimeStamp = explode(" ",$created_date);
						$date = date('M Y',strtotime($splitTimeStamp[0]));
						$time = date('H:i',strtotime($splitTimeStamp[1]));
						?>
						<span>Member since <?php echo e($date); ?></span>
					<?php endif; ?>
	          	</div>
	          	<div class="contact_user">
	             	<a href="JavaScript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="<?php echo e($question_data['get_gen_user']['phone_number']); ?>" data-original-title="<?php echo e($question_data['get_gen_user']['phone_number']); ?>"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
	             	<a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
	          	</div>
	          	<div class="review_section">
	             	<ul>
						<?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$question_data['get_gen_user']['id'],'user_type'=>'business'])->avg('rating');

						$get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$question_data['get_gen_user']['id'],'user_type'=>'business'])->where('review','!=','')->count('review');

						$total_rating = round($get_total_rating);
						?>
						<?php if(isset($total_rating)): ?>
							<?php if($total_rating == '5'): ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<?php elseif($total_rating == '4'): ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<?php elseif($total_rating == '3'): ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<?php elseif($total_rating == '2'): ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<?php elseif($total_rating == '1'): ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<?php else: ?>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
							<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li> 
							<?php endif; ?> 
						<?php else: ?>
						<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
						<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
						<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
						<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
						<li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
						<?php endif; ?>
	            	</ul>
	            	<p class="total_review"><?php echo e($get_total_reviews); ?> reviews</p>
	         	</div>
       		</div>
       		<?php if(!empty($allquestions)): ?>
       		<div class="user_quote_second_section position-relative">
	          	<h1><?php echo e($allquestions['q_title']); ?></h1>
	          	<?php $datetime = $allquestions['created_at'];
					$splitTimeStamp = explode(" ",$datetime);
					// $date = $splitTimeStamp[0];
					// $time = $splitTimeStamp[1];
					$date = date('d/m/Y',strtotime($splitTimeStamp[0]));
					$time = date('H:i',strtotime($splitTimeStamp[1]));
				?>
	          	<div class="created_dated"><?php echo e($date); ?></div>
          		<div class="Q_description">
             		<p><?php echo e($allquestions['q_description']); ?></p>
          		</div>
       		</div>
       		<?php endif; ?>
    	</div>
    	<?php if(isset($question_data)): ?>
    		<?php if(empty($question_data['business_answer'])): ?>
	    	<div class="your_answer_section question_answer">
	       		<div class="form-group your_answer col-md-12 col-12">
	          		<label for="inputPassword4">Your answer</label>
	          		<textarea name="question_answer_text" id="qus_answer" class="question_answer_text" onkeyup="removeErrorMsgs(this)"></textarea>
	          		<span class="fill_fields" role="alert" style="display:none;"></span>
	       		</div>
	       		<div class="finish_job ans_btn">
	          		<a href="javascript:;" data-question_id="<?php echo e($question_data['question_id']); ?>" data-business_id="<?php echo e($question_data['business_id']); ?>" onclick="submitQuestionAnswer(this)">Answer</a>
	       		</div>
	    	</div>
	    	<?php else: ?>
	    	<div class="your_answer_section question_answer">
	       		<div class="form-group your_answer col-md-12 col-12">
	          		<label for="inputPassword4">Your answer</label>
	          		<textarea name="question_answer_text" class="question_answer_text" readonly=""><?php echo e($question_data['business_answer']); ?></textarea>
	       		</div>
	       		<!-- <div class="finish_job ans_btn">
	          		<a href="javascript:;" data-question_id="<?php echo e($question_data['question_id']); ?>" data-business_id="<?php echo e($question_data['business_id']); ?>" onclick="submitQuestionAnswer(this)">Answer</a>
	       		</div> -->
	    	</div>
	    	<?php endif; ?>
    	<?php endif; ?>
 	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>