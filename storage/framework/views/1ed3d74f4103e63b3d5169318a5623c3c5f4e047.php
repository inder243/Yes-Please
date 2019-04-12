<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div> <a href="<?php echo e(url('/')); ?>">Home</a>/<a href="<?php echo e(url('/general_user/dashboard/catid/'.$allquotes->cat_id)); ?>"><?php if(isset($allquotes)): ?> <?php echo e($allquotes->cat_name); ?><?php endif; ?></a>/<a href="<?php echo e(url('/general_user/quote_questions')); ?>"> Quotes and questions </a>/<span class="q_breadcrumb">  Quote request</span></div>

           <div class="for_accepted_quote">
            <div class="finish_quote">

              <?php if(!empty($get_user_data['quotes']) && $get_user_data['quotes']['status']== 4): ?>
                <?php if(!empty($get_user_data['get_reviewss'])): ?>
                  <?php if(array_search('general', array_column($get_user_data['get_reviewss'], 'user_type')) > -1): ?>
                  <a href="<?php echo e(url('/general_user/quote_questions')); ?>" data-quoteid="<?php echo e($get_user_data['quote_id']); ?>" class="finish_job_quotes">Job Completed</a>
                  <?php else: ?>
                  <a href="<?php echo e(url('/general_user/user_quotereviews/'.$get_user_data['quote_id'].'/'.$get_user_data['business_id'])); ?>" data-quoteid="<?php echo e($get_user_data['quote_id']); ?>" class="finish_job_quotes">Finish job</a>
                  <?php endif; ?>
                <?php else: ?>
                <a href="<?php echo e(url('/general_user/user_quotereviews/'.$get_user_data['quote_id'].'/'.$get_user_data['business_id'])); ?>" data-quoteid="<?php echo e($get_user_data['quote_id']); ?>" class="finish_job_quotes">Finish job</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="cancel_quote">

              <a href="<?php echo e(url('general_user/quote_questions')); ?>">Cancel</a></div> 
          </div>

         </div>
      </section>
      <section>
         <div class="quote_req_main">
            <h1>Quote request</h1>
            <div class="improvement_section_new quote_border">
               <div class="user_profile_sec">
                  <?php $image = Auth::user()->image_url;
                      $general_id = Auth::user()->user_id;
                  ?>
                <?php if($image): ?>
                <div class="user_img"><img src="<?php echo e(url('/images/users/'.$general_id.'/'.$image)); ?>"/></div>
                <?php else: ?>
                <div class="user_img"><img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/></div>
                <?php endif; ?>
                
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
               <?php if(!empty($allquotes)): ?>
               <div class="user_quote_second_section">
                 <div class="g_quote_section">
                  <div class="g_quote_section_headings">
                        <h1>Quote id : <?php echo e($allquotes['quote_id']); ?></h1>
                        <!-- <p>Quotes <span>32</span></p> -->
                  </div>
                  <div class="g_quote_section_datetime">
                    <?php $datetime = $allquotes['created_at'];
                          $splitTimeStamp = explode(" ",$datetime);
                          // $date = $splitTimeStamp[0];
                          // $time = $splitTimeStamp[1];
                          $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                          $time = date('H:i',strtotime($splitTimeStamp[1]));
                    ?>
                    <span class="g_quote_section_time"><?php echo e($time); ?> </span>
                    <span><?php echo e($date); ?></span>
                  </div>
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
                              <div class="uploaded_img" data-image="<?php echo e(url('/images/general_quotes/'.$general_id.'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImageUser(this);return false;">
                                 <img src="<?php echo e(url('/images/general_quotes/'.$general_id.'/'.$img)); ?>"/>
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
            <div class="cancel_quote cancel_for_mobile"><a href="javascript:;">Cancel</a></div>
            <div class="list_quotes">

              <div class="show_quote">

                <div class="showing_answer">
                  <ul>
                    <li>
                      <div class="main_ans_Sec">
                      <div class="main_ans_Sec_container">
                      <div class="ans_img">
                        <?php
                        $bus_user_id = $get_user_data['get_bus_user']['business_userid'];
                        $img_url = $get_user_data['get_bus_user']['image_name'];
                        ?>

                        <?php if($img_url): ?>
                        <img src="<?php echo e(url('/images/business_profile/'.$bus_user_id.'/'.$img_url)); ?>">
                        <?php else: ?>
                        <img src="<?php echo e(asset('img/user_placeholder.png')); ?>">
                        <?php endif; ?>
                      </div>
                      <div class="main_ans_sec_detail">
                        <div class="heading_dec">
                          <h1><?php if(isset($get_user_data['get_bus_user'])): ?><?php echo e($get_user_data['get_bus_user']['business_name']); ?> <?php endif; ?></h1>

                          <?php $details = mb_strimwidth($get_user_data['details'], 0, 30, "..."); ?>

                          <?php if($get_user_data['price_type'] == 2): ?>
                          <?php $price_type = '/hour'; ?>
                          <?php else: ?>
                          <?php $price_type = ''; ?>
                          <?php endif; ?>

                          <div class="rate_hours"><h2>$<?php echo e($get_user_data['price_quotes']); ?></h2><p class="complete_detail"></p><?php echo e($price_type); ?></div>

                        </div>
                            <div class="chat_call_sec star-sec">

                        <?php $get_total_rating = DB::table('yp_user_reviews')->where(['user_type'=>'general','business_id'=>$get_user_data['business_id']])->avg('rating');

                        $get_total_reviews = DB::table('yp_user_reviews')->where(['user_type'=>'general','business_id'=>$get_user_data['business_id']])->where('review','!=','')->count('review');
                        
                        $total_rating = round($get_total_rating);
                        ?>
                        <?php if(isset($total_rating)): ?>
                          <?php if($total_rating == '5'): ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                          <?php elseif($total_rating == '4'): ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                          <?php elseif($total_rating == '3'): ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                          <?php elseif($total_rating == '2'): ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                          <?php elseif($total_rating == '1'): ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                          <?php else: ?>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                            <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a> 
                          <?php endif; ?> 
                        <?php else: ?>
                        <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                        <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                        <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                        <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                        <a href="javascript:;" class="rate_str"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                        <?php endif; ?>
                        
                        <p><?php echo e($get_total_reviews); ?> </p>
                        <p>reviews</p>
                        <a href="javascript:;" class="chat_this">
                          <img src="<?php echo e(asset('img/text.png')); ?>"/>
                        </a>
                        <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($get_user_data['get_bus_user']['phone_number']); ?>" data-original-title="<?php echo e($get_user_data['get_bus_user']['phone_number']); ?>" class="call_this">
                          <img src="<?php echo e(asset('img/call.png')); ?>"/>
                        </a>
                      </div>
                      </div>
                    </div>
                    </div>

                    </li>
                  </ul>
                  
                </div>
              </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="your_quote">

               <div class="doller_hr">
                  <h1>$ <?php echo e($get_user_data['price_quotes']); ?> </h1>
                  <p>/hour</p>
               </div>
               <div class="accept_ignore">
                <?php if(isset($quoteSts) && $quoteSts!=4): ?>
                  <a href="" class="accept_by_gen" data-quote_id="<?php echo e($get_user_data['quote_id']); ?>" data-business_id="<?php echo e($get_user_data['business_id']); ?>">Accept</a> 
                  <a href="" class="ignore_by_gen" data-quote_id="<?php echo e($get_user_data['quote_id']); ?>" data-business_id="<?php echo e($get_user_data['business_id']); ?>">Ignore</a>
                  <?php endif; ?>
               </div>
               <p class="your_quote_des"><?php echo e($get_user_data['details']); ?>

               </p>
               <div class="total_pics">
               	<div class="swiper-container swiper-wrapper_p swiper2">
                       <div class="swiper-wrapper">
                        <?php if(isset($get_user_data)): ?>
                        <?php
                        $uploads = json_decode($get_user_data['uploaded_files'],true);
                         ?>

                        <?php if(!empty($uploads)): ?>
                          <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $img_name = explode( '.', $img );?>
                          <div class="swiper-slide total_pics_img" data-image="<?php echo e(url('/images/quotes_request/'.$get_user_data['get_bus_user']['business_userid'].'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImageUser(this);return false;"><img src="<?php echo e(url('/images/quotes_request/'.$get_user_data['get_bus_user']['business_userid'].'/'.$img)); ?>"/></div>
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

         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>