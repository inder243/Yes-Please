<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<a href="<?php echo e(url('/business_user/quotes_questions')); ?>"> Quotes and questions</a>/<span class="q_breadcrumb"> <?php if(isset($allquotes)): ?> <?php echo e($allquotes->cat_name); ?><?php endif; ?></span></div>
      </section>
        <section>
          <div class="quote_req_main">
            <?php if(isset($quote_data[0]['status'])): ?>
              <?php if($quote_data[0]['status'] == '4'): ?>
              <h1>Quote accepted by <?php if(isset($quote_data[0]['get_gen_user'])): ?><?php echo e($quote_data[0]['get_gen_user']['first_name']); ?> <?php echo e($quote_data[0]['get_gen_user']['last_name']); ?><?php endif; ?></h1>
              <?php elseif($quote_data[0]['status'] == '3'): ?>
              <h1>Quote is Quoted</h1>
              <?php elseif($quote_data[0]['status'] == '6'): ?>
              <h1>Quote Completed</h1>
              <?php endif; ?>
            <?php endif; ?>
            
            <?php if(isset($quote_data[0]['status'])): ?>
              <?php if($quote_data[0]['status'] == '4'): ?>
              <div class="improvement_section_new accepted-quote">
              <?php elseif($quote_data[0]['status'] == '3'): ?>
              <div class="improvement_section_new new_quote q_quoted1">
              <?php elseif($quote_data[0]['status'] == '6'): ?>
              <div class="improvement_section_new new_quote">
              <?php endif; ?>
            <?php endif; ?>  
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
                  <a href="javascript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="<?php echo e($quote_data[0]['get_gen_user']['phone_number']); ?>" data-original-title="<?php echo e($quote_data[0]['get_gen_user']['phone_number']); ?>"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                  <a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
                </div>
                <div class="review_section">
                  <ul>
                    <?php $get_total_rating = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->avg('rating');

                    $get_total_reviews = DB::table('yp_user_reviews')->where(['general_id'=>$quote_data[0]['get_gen_user']['id'],'user_type'=>'business'])->where('review','!=','')->count('review');
                    
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
             <?php if(!empty($allquotes)): ?>
               <div class="user_quote_second_section">
                  <h1>Quote id : <?php echo e($allquotes['quote_id']); ?></h1>
                  <!-- <p>Quotes <span>32</span></p> -->
                <div class="Q_tag">
                  <?php if(isset($quote_data[0]['status'])): ?>
                    <?php if($quote_data[0]['status'] == '4'): ?>
                    <div class="new_lable q_accepted_table bus_accepted">ACCEPTED</div>
                    <?php elseif($quote_data[0]['status'] == '3'): ?>
                    <div class="new_lable q_quoted_table bus_quoted">QUOTED</div>
                    <?php elseif($quote_data[0]['status'] == '6'): ?>
                    <div class="new_lable bus_completed">COMPLETED</div>
                    <?php endif; ?>
                  <?php endif; ?>
                    <?php $datetime = $allquotes['created_at'];
                          $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                          $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                          $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
                     <div class="created_date"><?php echo e($date); ?></div>
                  </div>
                  <div class="quote_basic_detail">

                    <?php $dynamic_formdata = json_decode($allquotes['dynamic_formdata'],true); ?>

                    <?php if(!empty($dynamic_formdata )): ?>
                    <?php $__currentLoopData = $dynamic_formdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dynami_key=>$dyanamic_values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($dyanamic_values['filter']==1): ?>
                      <?php if($dyanamic_values['type'] == 'textbox'): ?>
                        <?php if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['value'])): ?>
                        <div class="Q_detail">
                          <span class="Q_detail_heading"><?php echo e($dyanamic_values['title']); ?> :</span>
                          <span><?php echo e($dyanamic_values['value']); ?></span>
                        </div>
                        <?php endif; ?>
                      <?php else: ?>
                        <?php if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['options'])): ?>
                        <div class="Q_detail">
                          <span class="Q_detail_heading"><?php echo e($dyanamic_values['title']); ?> :</span>

                          <?php $get_labels = ''; ?>
                          <?php $__currentLoopData = $dyanamic_values['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkbox_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $get_labels .= $checkbox_data['label'] . ','; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <span><?php echo e($get_labels); ?></span>
                        </div>
                        <?php endif; ?>
                      <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(!empty($allquotes['phone_number'])): ?>
                    <div class="Q_detail">
                      <span class="Q_detail_heading">Mobile Number:</span>
                      <span><?php echo e($allquotes['phone_number']); ?></span>
                    </div>
                    <?php endif; ?>

                  </div>
                  <div class="Q_description">
                     <p><?php echo e($allquotes['work_description']); ?></p>
                  </div>
                  <div class="uploaded_content">
                     <div class="swiper-container swiper-wrapper_p">
                        <div class="swiper-wrapper ">
                           <?php 
                              $uploads = json_decode($allquotes['uploaded_files'],true);
                            ?>

                          <?php if(!empty($uploads)): ?>
                            <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="uploaded_img" data-image="<?php echo e(url('/images/general_quotes/'.$general_id.'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImage(this);return false;">
                                 <img src="<?php echo e(url('/images/general_quotes/'.$general_id.'/'.$img)); ?>"/>
                              </div>
                           </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          <?php endif; ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next for_next_arrow"></div>
                        <div class="swiper-button-prev for_back_arrow"></div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>

          </div>
          <div class="container-fluid">
            <div class="your_quote">
              <h1>Your quote</h1>

              <?php if(isset($quote_data[0]['quote_reply'])): ?>
                <?php if($quote_data[0]['quote_reply']['price_type'] == 2): ?>
                  <?php $price_type = '/hour'; ?>
                <?php else: ?>
                  <?php $price_type = ''; ?>
                <?php endif; ?>
              <?php else: ?>
              <?php $price_type = ''; ?>
              <?php endif; ?>

              <div class="doller_hr"><h1>$ <?php if(isset($quote_data[0]['quote_reply'])): ?><?php echo e($quote_data[0]['quote_reply']['price_quotes']); ?> <?php else: ?> 100 <?php endif; ?> </h1><p><?php echo e($price_type); ?></p></div>
              <p class="your_quote_des"><?php if(isset($quote_data[0]['quote_reply'])): ?> <?php echo e($quote_data[0]['quote_reply']['details']); ?> <?php endif; ?>
              </p>
              <div class="total_pics">
                <div class="swiper-container swiper-wrapper_p swiper2">
                       <div class="swiper-wrapper">
                        <?php if(isset($quote_data[0]['quote_reply'])): ?>
                        <?php
                        $uploads = json_decode($quote_data[0]['quote_reply']['uploaded_files'],true);
                         ?>

                        <?php if(!empty($uploads)): ?>
                          <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $img_name = explode( '.', $img );?>
                          <div class="swiper-slide total_pics_img" data-image="<?php echo e(url('/images/quotes_request/'.$business_userid.'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImage(this);return false;"><img src="<?php echo e(url('/images/quotes_request/'.$business_userid.'/'.$img)); ?>"/></div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        <?php endif; ?>

                        <?php endif; ?>
                       </div>
                       <!-- Add Pagination -->
                       <div class="swiper-pagination1 swiper21"></div>
                       <!-- Add Arrows -->
                       <div class="swiper-button-next swiper2next"></div>
                       <div class="swiper-button-prev swiper2pre"></div>
                    </div>
              </div>
            </div>
            <div class="finish_job">
              
            
                
              <?php if(!empty($quote_data[0]['get_review'])): ?>
                <?php if(array_search('general', array_column($quote_data[0]['get_review'], 'user_type')) > -1): ?>
                  <?php if(array_search('business', array_column($quote_data[0]['get_review'], 'user_type')) > -1): ?>
                    <a href="<?php echo e(url('/business_user/quotes_questions')); ?>" data-quoteid="<?php echo e($quote_data[0]['quote_id']); ?>" class="finish_job_quotes">Job Completed</a>
                  <?php else: ?>
                    <a href="<?php echo e(url('/business_user/user_quotereviews/'.$quote_data[0]['quote_id'])); ?>" data-quoteid="<?php echo e($quote_data[0]['quote_id']); ?>" class="finish_job_quotes">Finish job</a>
                  <?php endif; ?>
                <?php endif; ?>
              
              
              <?php endif; ?>
              
            </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>