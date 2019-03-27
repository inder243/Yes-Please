<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard</a>/<span class="q_breadcrumb"> <?php if(isset($allquotes)): ?> <?php echo e($allquotes->cat_name); ?><?php endif; ?> </span>/<span class="q_breadcrumb">Review <?php if($quote_data[0]['get_gen_user']): ?><?php echo e($quote_data[0]['get_gen_user']['first_name']); ?> <?php echo e($quote_data[0]['get_gen_user']['last_name']); ?><?php endif; ?></span></div>

         </div>
      </section>
      <section>
         <div class="quote_req_main_finsih">
            <h1><?php if($quote_data[0]['get_gen_user']): ?><?php echo e($quote_data[0]['get_gen_user']['first_name']); ?> <?php echo e($quote_data[0]['get_gen_user']['last_name']); ?><?php endif; ?></h1>
            <p>You will be able to view how the business rated and reviewed you after both of you will submit your reviews.</p>
            <div class="quote_req_main finish_re">
            <div class="improvement_section_new quote_border ">
               <div class="user_profile_sec">

                <?php if(isset($quote_data)): ?>
                  <?php $image = $quote_data[0]['get_gen_user']['image_url'];
                        $general_id = $quote_data[0]['get_gen_user']['user_id'];
                  ?>
                  <?php if($image): ?>
                  <div class="user_img"><img src="<?php echo e(url('/images/users/'.$general_id.'/'.$image)); ?>"/></div>
                  <?php else: ?>
                  <div class="user_img"><img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/></div>
                  <?php endif; ?>
                <?php endif; ?>
                
                  <div class="otheruser_detail">
                     <?php if(isset($quote_data)): ?>
                     <h1><?php echo e($quote_data[0]['get_gen_user']['first_name']); ?> <?php echo e($quote_data[0]['get_gen_user']['last_name']); ?></h1>
                     <p><?php echo e($quote_data[0]['get_gen_user']['city']); ?>, <?php echo e($quote_data[0]['get_gen_user']['country']); ?></p>
                     <?php else: ?>
                     <h1>Moshe</h1>
                     <p>test</p>
                     <?php endif; ?>
                     <?php if(isset($quote_data)): ?>
                      <?php
                      $created_date = $quote_data[0]['get_gen_user']['created_at'];

                      $splitTimeStamp = explode(" ",$created_date);
                      $date = date('M Y',strtotime($splitTimeStamp[0]));
                      $time = date('H:i',strtotime($splitTimeStamp[1]));
                      ?>
                     <span>Member since <?php echo e($date); ?></span>
                     <?php endif; ?>
                  </div>
                  <div class="contact_user">
                     <a href="tel:<?php echo e($quote_data[0]['get_gen_user']['phone_number']); ?>" class="user_call"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
                  </div>
                  <div class="review_section">
                     <ul>
                      
                        <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'business_id'=>$quote_data[0]['business_id'],'user_type'=>'business'])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'business_id'=>$quote_data[0]['business_id'],'user_type'=>'business'])->where('review','!=','')->count('review');
                    
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
               <div class="user_quote_second_section">
                  <form id="business_review_submit" action="<?php echo e(route('business_user.quote_review_submit')); ?>" method="POST">
                     <?php echo csrf_field(); ?>

                     <input type="hidden" name="review_gen_id" value="<?php echo e($quote_data[0]['general_id']); ?>">
                     <input type="hidden" name="review_quote_id" value="<?php echo e($quote_data[0]['quote_id']); ?>">
                     <input type="hidden" name="review_bus_id" value="<?php echo e($quote_data[0]['business_id']); ?>">
                     <input type="hidden" name="review_type" value="business">
                 <div class="write_reviews">
                   <p>Write your review<span><img src="<?php echo e(asset('img/question_img.png')); ?>"/></span></p>
                   <div class="write_sec">
                     <textarea name="review_text" class="bus_review_text" id="bus_reviewtext" onkeyup="remove_errorrmsg(this)"></textarea>
                     <span class="fill_fields" style="display:none;"></span>
                   </div>
                 </div>
                 <div class="rate_business">
                   <h1>Rate this business</h1>
                   <ul class="review_ul">
                     <li id="start_1" data-id="1" data-status="inactive" onClick="change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="start_2" data-id="2" data-status="inactive" onClick="change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="start_3" data-id="3" data-status="inactive" onClick="change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="start_4" data-id="4" data-status="inactive" onClick="change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="start_5" data-id="5" data-status="inactive" onClick="change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                   </ul>
                   <input type="hidden" name="star_active" class="hidden_star_active" value="">
                   <div class="review_later">
                     <a href ="<?php echo e(url('business_user/quotes_questions')); ?>" class="review_later1">Review later</a>
                     <a href ="JavaScript:;" class="submit_reviewr"><input type="submit" value="Submit review"></a>
                   </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>