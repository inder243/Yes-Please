<?php $__env->startSection('content'); ?>

  <section class="register_step_1">
         <div class="breadcrumb register_breadcrumb g_quote_breadcrumb">
           <div><a href="<?php echo e(url('/')); ?>">Home</a>/<a href="<?php echo e(url('/general_user/quote_questions')); ?>"> Quotes and questions </a>/<span class="q_breadcrumb">  Quote</span></div>
         <div class="cancel_quote"><a href="<?php echo e(url('general_user/quote_questions')); ?>">Cancel</a></div>
         </div>
      </section>
      <section>
         <div class="quote_req_main">
            <h1>Quote in Car</h1>
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
                  <div class="contact_user">
                     <a href="tel:<?php echo e(Auth::user()->phone_number); ?>" class="user_call"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                     <a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
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
                     <div class="Q_detail">
                        <span class="Q_detail_heading">Mobile Number:</span>
                        <span><?php echo e($allquotes['phone_number']); ?></span>
                     </div>
                     
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
                        <div class="swiper-button-next for_next_arrow"></div>
                        <div class="swiper-button-prev for_back_arrow"></div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
            <div class="cancel_quote cancel_for_mobile"><a href="javascript:;">Cancel</a></div>
            <div class="list_quotes">
              <h1>Quotes</h1>
              <div class="show_quote">
                <a href="JavaScript:;">Show latest first<img src="<?php echo e(asset('img/custom_arrow.png')); ?>"/></a>
                <div class="total_list_quote">
                  <ul class="all_bus_by_cat">

                    <?php if(!empty($all_data)): ?>
                    <?php $__currentLoopData = $all_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$quote_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                      <?php if(isset($getquoteStsBusinessUser) && !empty($getquoteStsBusinessUser) && $getquoteStsBusinessUser['business_id']==$quote_data['business_id']): ?>
                      <li class="border-accept">
                      <h1>ACCEPTED</h1>
                      <?php else: ?>
                      <li>
                      <?php endif; ?>

                          <div class="b_name_list">
                          <div class="user_quote_img">
                            <?php
                            $bus_user_id = $quote_data['get_bus_user']['business_userid'];
                            $img_url = $quote_data['get_bus_user']['image_name'];
                            ?>

                            <?php if($img_url): ?>
                            <img src="<?php echo e(url('/images/business_profile/'.$bus_user_id.'/'.$img_url)); ?>">
                            <?php else: ?>
                            <img src="<?php echo e(asset('img/user_placeholder.png')); ?>">
                            <?php endif; ?>
                          </div>
                          <div class="other_details_quote">
                            
                            <a href="<?php echo e(url('general_user/quotesrequest/'.$quote_data['quote_id'].'/'.$quote_data['business_id'])); ?>">
                              
                            <h1><?php echo e($quote_data['get_bus_user']['first_name']); ?> <?php echo e($quote_data['get_bus_user']['last_name']); ?></h1></a>
                            <p><span>$ <?php echo e($quote_data['price_quotes']); ?></span> for everything</p>
                          </div>

                          <?php if(isset($getquoteStsBusinessUser) && !empty($getquoteStsBusinessUser) && $getquoteStsBusinessUser['business_id']==$quote_data['business_id']): ?>
                          <div class="for_discount_pt">
                            <span>Entitled for discount for points</span>
                          </div>
                          <?php else: ?>
                          
                          <?php endif; ?>
                        </div>
                    </li>
                    <!-- <li>
                      <div class="user_quote_img">
                        <img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/>
                      </div>
                      <div class="other_details_quote">
                        <a href="<?php echo e(url('general_user/quotesrequest/'.$quote_data['quote_id'].'/'.$quote_data['business_id'])); ?>"><h1><?php echo e($quote_data['get_bus_user']['first_name']); ?> <?php echo e($quote_data['get_bus_user']['last_name']); ?></h1></a>
                        <p><span>$ <?php echo e($quote_data['price_quotes']); ?></span> for everything</p>
                      </div>
                    </li> -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </ul>
                  <div class="load_more load_new"><a href="JavaScript:;">Load more</a></div>
                </div>
              </div>
            </div>
         </div>
      </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>