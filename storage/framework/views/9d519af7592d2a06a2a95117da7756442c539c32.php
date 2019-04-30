<?php $__env->startSection('content'); ?>
<section class="register_step_1">
	<div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
		<div><a href="<?php echo e(url('/')); ?>">Home </a>/<a href="<?php echo e(url('/general_user/dashboard/catid/'.$allquestions->cat_id)); ?>"><?php if(isset($allquestions)): ?> <?php echo e($allquestions->cat_name); ?> <?php endif; ?></a>/<a href="<?php echo e(url('/general_user/quote_questions?tab=ques')); ?>"> Quotes and questions </a>/<span class="q_breadcrumb"> Question</span></div>
		<?php if(!empty($all_data)): ?>
		<div class="cancel_quote mark_answred"><a href="javascript:;" class="mark_asnwered">Mark as answered</a></div>
		<?php endif; ?>
	</div>
</section>
<section>
	<div class="quote_req_main">
		<h1>Question in <?php if(!empty($allquestions)): ?><?php echo e($allquestions->cat_name); ?><?php endif; ?></h1>
		<div class="improvement_section_new quote_border qhome_improvment">
			<div class="user_profile_sec">
				<div class="user_img qhome_improvmentimg">
					<?php $image = Auth::user()->image_url;
	                    $general_id = Auth::user()->user_id;
	                ?>
	                <?php if($image): ?>
	                <img src="<?php echo e(url('/images/users/'.$general_id.'/'.$image)); ?>"/>
	                <?php else: ?>
					<img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/>
					<?php endif; ?>

				</div>
				<div class="otheruser_detail">
					<h1><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></h1>
					<p><?php echo e(Auth::user()->city); ?></p>

					<?php
					$created_date = Auth::user()->created_at;

					$splitTimeStamp = explode(" ",$created_date);
					$date = date('M Y',strtotime($splitTimeStamp[0]));
					$time = date('H:i',strtotime($splitTimeStamp[1]));
					?>

					<span>Member since <?php echo e($date); ?></span>
				</div>
				
				<div class="review_section">
					<ul>
					<?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'business'])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'business'])->where('review','!=','')->count('review');
                    
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
			<div class="user_quote_second_section">
				<div class="g_quote_section">
					<div class="g_quote_section_headings">
						<h1><?php echo e($allquestions['q_title']); ?></h1>
					</div>

					<?php $datetime = $allquestions['created_at'];
                        $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                        $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                        $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
					<div class="g_quote_section_datetime">
						<span class="g_quote_section_time"><?php echo e($time); ?> </span>
						<span><?php echo e($date); ?></span>
					</div>
				</div>
				<div class="Q_description">
					<p><?php echo e($allquestions['q_description']); ?></p>
				</div>
				<div class="uploaded_content">
                     <div class="swiper-container swiper-wrapper_p">
                        <div class="swiper-wrapper ">
                           <?php 
                              $uploads = json_decode($allquestions['uploaded_files'],true);
                            ?>

                          <?php if(!empty($uploads)): ?>
                            <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="uploaded_img" data-image="<?php echo e(url('/images/general_questions/'.$general_id.'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImageUser(this);return false;">
                                 <img src="<?php echo e(url('/images/general_questions/'.$general_id.'/'.$img)); ?>"/>
                              </div>
                           </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          <?php endif; ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next for_next_arrow1"></div>
                        <div class="swiper-button-prev for_back_arrow1"></div>
                     </div>
                  </div>
			</div>
			<?php endif; ?>

		</div>
		<?php if(!empty($all_data)): ?>
		<div class="cancel_quote cancel_for_mobile mark_ans_width"><a href="javascript:;">Mark as answered</a></div>
		<?php endif; ?>
		<div class="list_quotes">
			<?php if(!empty($all_data)): ?>
			<h1>Answers</h1>
			<?php else: ?>
			<div class="no_data_found">No Answer Found For this Question!</div>
			<?php endif; ?>
			<div class="show_quote">
				<?php if(!empty($all_data)): ?>
				<a href="JavaScript:;">Show latest first<img src="<?php echo e(asset('img/custom_arrow.png')); ?>"/></a>
				<?php endif; ?>
				<div class="showing_answer">
					<ul class="all_answers_bus">
						<?php if(!empty($all_data)): ?>
                    	<?php $__currentLoopData = $all_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ques_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	
						<li>
							<div class="main_ans_Sec">
								<div class="main_ans_Sec_container">
									<div class="ans_img">
										<?php
			                            $bus_user_id = $ques_data['get_bus_user']['business_userid'];
			                            $img_url = $ques_data['get_bus_user']['image_name'];
			                            ?>

			                            <?php if($img_url): ?>
			                            <img src="<?php echo e(url('/images/business_profile/'.$bus_user_id.'/'.$img_url)); ?>">
			                            <?php else: ?>
										<img src="<?php echo e(asset('img/user_placeholder.png')); ?>">
										<?php endif; ?>
									</div>
									<div class="main_ans_sec_detail">
										<div class="heading_dec">
											<div class="business_detals">
											<a class="business_answer" href="<?php echo e(url('general_user/public_profile/'.$ques_data['business_id'].'/'.$ques_data['get_ques']['cat_id'])); ?>" target="_blank"><h1><?php echo e($ques_data['get_bus_user']['business_name']); ?></h1></a>
											<div class="chat_call_sec">
											<?php if($ques_data['mark_answered'] == 1): ?>
											<a href="javascript:;" data-business_id="<?php echo e($ques_data['business_id']); ?>" data-question_id="<?php echo e($ques_data['question_id']); ?>" data-status="active" class="rate_this" onclick="markAnswered(this);">
												<img src="<?php echo e(asset('img/active_star.png')); ?>">
											</a>
											<?php else: ?>
											<a href="javascript:;" data-business_id="<?php echo e($ques_data['business_id']); ?>" data-question_id="<?php echo e($ques_data['question_id']); ?>" data-status="inactive" class="rate_this" onclick="markAnswered(this);">
												<img src="<?php echo e(asset('img/best.png')); ?>">
											</a>
											<?php endif; ?>
											
											<a href="javascript:;" class="chat_this">
												<img src="<?php echo e(asset('img/text.png')); ?>">
											</a>
											<a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($ques_data['get_bus_user']['phone_number']); ?>" data-original-title="<?php echo e($ques_data['get_bus_user']['phone_number']); ?>" class="call_this call_icon_bu">
												<img src="<?php echo e(asset('img/call.png')); ?>"/>
											</a>
			                            </div>
			                        </div>
											<p class="complete_detail"><?php echo e($ques_data['business_answer']); ?></p>
										</div>

										
									</div>
								</div>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    	<?php endif; ?>
						
					</ul>
				</div>
				<div class="load_more load_new"><a href="JavaScript:;">Load more</a></div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			
			<?php if(!empty($related_question)): ?>

				<div class="col-12">
					<div class="related_q"><p>Related questions</p></div>
				</div>

				<?php $__currentLoopData = $related_question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques_key => $qus_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<?php if($qus_data['id'] != $question_id): ?>

						<?php if(isset($qus_data['avg_answer']) && !empty($qus_data['avg_answer'])): ?>
		                    <?php $avg_answer = $qus_data['avg_answer'][0]['total_answer']; ?> 
		                <?php else: ?>
		                    <?php $avg_answer = 0; ?>   
		                <?php endif; ?>

		                <?php $datetime = $qus_data['created_at']; ?>
		                <?php $splitTimeStamp = explode(" ",$datetime); ?>
		                <?php $date = date('d/m/Y',strtotime($splitTimeStamp[0])); ?>

		                <?php if($avg_answer != 0): ?>
		                	
		                	<div class="col-lg-6 col-12">
								<div class="related_q_main">
									<div class="heading_and_time">
										<a href="javascript:;" onclick="openBusinessRepliesModal(this);" data-cat_id="<?php echo e($qus_data['cat_id']); ?>" data-question_id="<?php echo e($qus_data['id']); ?>">
											<h1><?php echo e($qus_data["q_title"]); ?></h1>
										</a>
										<span class="imp_time"><?php echo e($date); ?></span>
									</div>
									<span class="t_ans">Answers <b><?php echo e($avg_answer); ?></b></span>
									<p><?php echo e($qus_data["q_description"]); ?></p>
								</div>
							</div>
		                <?php endif; ?>
	                <?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php endif; ?>


		</div>
	</div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>