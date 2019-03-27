<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div><a href="<?php echo e(url('/')); ?>">Home</a>/<a href="<?php echo e(url('/general_user/quote_questions')); ?>">Quotes and Questions</a>/<a href="<?php echo e(url('/general_user/dashboard/catid/'.$quote_data['get_quotes']['cat_id'])); ?>"><?php if(isset($quote_data)): ?> <?php echo e($quote_data['get_quotes']['cat_name']); ?><?php endif; ?></a>/<span class="q_breadcrumb">Review <?php echo e($quote_data['get_bus_user']['business_name']); ?></span></div>

         </div>
      </section>
      <section>
         <div class="quote_req_main_finsih">
          <?php if(isset($quote_data)): ?>
          <?php if(isset($quote_data['get_bus_user'])): ?>
            <h1><?php echo e($quote_data['get_bus_user']['business_name']); ?></h1>
          <?php else: ?>
          <h1>Business name</h1>
          <?php endif; ?>
          <?php endif; ?>
            <p>You will be able to view how the business rated and reviewed you after both of you will submit your reviews.</p>
            <div class="quote_req_main finish_re">
            <div class="improvement_section_new quote_border ">
               <div class="user_profile_sec">

                <?php if(isset($quote_data)): ?>
                  <?php 
                  $image = $quote_data['get_bus_user']['image_name'];
                  $business_id = $quote_data['get_bus_user']['business_userid'];
                  ?>
                  <?php if($image): ?>
                  <div class="user_img qhome_improvmentimg"><img src="<?php echo e(url('/images/business_profile/'.$business_id.'/'.$image)); ?>"/></div>
                  <?php else: ?>
                  <div class="user_img qhome_improvmentimg"><img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/></div>
                  <?php endif; ?>
                <?php endif; ?>
                
                  <div class="otheruser_detail">
                     <?php if(isset($quote_data)): ?>
                       <h1><a href="<?php echo e(url('/general_user/public_profile/'.$quote_data['get_bus_user']['id'])); ?>"><?php echo e($quote_data['get_bus_user']['business_name']); ?></a></h1>
                       <p><?php echo e($quote_data['get_bus_user']['full_address']); ?></p>
                       
                        <?php
                        $created_date = $quote_data['get_bus_user']['created_at'];

                        $splitTimeStamp = explode(" ",$created_date);
                        $date = date('M Y',strtotime($splitTimeStamp[0]));
                        $time = date('H:i',strtotime($splitTimeStamp[1]));
                        ?>
                       <span>Member since <?php echo e($date); ?></span>
                       <?php else: ?>
                       <h1>Moshe</h1>
                       <p>test</p>
                       <span>Member since Feb 2019</span>
                     <?php endif; ?>
                  </div>
                  <div class="contact_user">
                    <?php if(isset($quote_data)): ?>
                     <a href="tel:<?php echo e($quote_data['get_bus_user']['phone_number']); ?>" class="user_call"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
                     <?php endif; ?>
                  </div>
                  <div class="review_section">

                     <ul>
                        <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'general','business_id'=>$quote_data['business_id']])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>Auth::user()->id,'user_type'=>'general','business_id'=>$quote_data['business_id']])->where('review','!=','')->count('review');
                    
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

                <form id="general_review_submit" action="<?php echo e(route('general_user.quote_review_submit')); ?>" method="POST">
                     <?php echo csrf_field(); ?>

                     <input type="hidden" name="review_gen_id" value="<?php echo e($quote_data['general_id']); ?>">
                     <input type="hidden" name="review_quote_id" value="<?php echo e($quote_data['quote_id']); ?>">
                     <input type="hidden" name="review_bus_id" value="<?php echo e($quote_data['business_id']); ?>">
                     <input type="hidden" name="review_type" value="general">

                 <div class="write_reviews">
                   <p>Write your review<span><img src="<?php echo e(asset('img/question_img.png')); ?>"/></span></p>
                   <div class="write_sec">
                     <textarea name="review_text" onkeyup="remove_errmsg(this)" class="gen_review_text" id="gen_reviewtext"></textarea>
                     <span class="fill_fields" style="display:none;"></span>
                   </div>
                 </div>
                 <div class="rate_business">
                   <h1>Rate this business</h1>
                   <ul class="gen_review_ul">
                     <li id="star_1" data-id="1" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="star_2" data-id="2" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="star_3" data-id="3" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="star_4" data-id="4" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                     <li id="star_5" data-id="5" data-status="inactive" onClick="gen_change_review(this); return false;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                   </ul>

                   <span class="fill_fields" style="display:none;text-align: center;"></span>

                   <input type="hidden" name="gen_star_active" class="gen_hidden_star_active" value="">
                   <div class="review_later">
                     <a href ="<?php echo e(url('general_user/quote_questions')); ?>" class="review_later1">Review later</a>
                     <a href ="JavaScript:;" class="submit_reviewr"><input type="submit" value="Submit review"></a>
                   </div>
                 </div>
                  </form>
               </div>
            </div>
         </div>
      </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>