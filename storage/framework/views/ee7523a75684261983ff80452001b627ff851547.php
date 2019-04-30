<?php $__env->startSection('content'); ?>
<?php //echo "<pre>";print_r($user_details);die;?>
<section class="register_step_1">
  <?php if(!empty($status)){ ?>
  <input type="hidden" class="publicprofile_status" value="<?php echo $status;?>">
<?php } ?>
         <div class="breadcrumb register_breadcrumb category_breadcrumb">
            <div class="breadcrumb_header"><a href="<?php echo e(url('/')); ?>">Home </a>/<span><?php if(!empty($user_details)): ?> <?php echo e($user_details['business_name']); ?> <?php endif; ?></span></div>
            <div class="share_fb"><a href="javascript:;"/><img src="<?php echo e(asset('img/icon_F.png')); ?>"/> Share</a></div>
         </div>
      </section>
      <div class="container-fluid">
        <div class="user_name_sec">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="u_profile_detail">
                <div class="user_i">
                  <?php if(!empty($user_details)): ?>
                    <?php if(!empty($user_details['image_name'])): ?>
                      <?php
                      $bus_user_id = $user_details['business_userid'];
                      $img_url = $user_details['image_name'];
                      ?>
                    <img src="<?php echo e(url('/images/business_profile/'.$bus_user_id.'/'.$img_url)); ?>"/>
                    <?php else: ?>
                    <img src="<?php echo e(asset('img/user-img.png')); ?>"/>
                    <?php endif; ?>
                  <?php else: ?>
                  <img src="<?php echo e(asset('img/user-img.png')); ?>"/>
                  <?php endif; ?>
                </div>
                <div class="u_detail">
                  <div class="u_detail_h">
                    <h1><?php if(!empty($user_details)): ?><?php echo e($user_details['business_name']); ?><?php endif; ?></h1>
                    <a href="javascript:;" class="u_chat"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
                    <a href="javascript:;" class="u_call" data-toggle="tooltip" data-placement="top" title="<?php echo e($user_details['phone_number']); ?>" data-original-title="<?php echo e($user_details['phone_number']); ?>"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                  </div>
                  <span><?php echo e($cat_name); ?></span>
                  <p class="u_distance"><?php if(!empty($user_details)): ?><?php echo e($user_details['full_address']); ?><?php endif; ?> | <span>Distance <b><?php if(!empty($user_details)): ?> <?php if(!empty($user_details['bu_details'])): ?><?php echo e($user_details['bu_details'][0]['distance_kms']); ?><?php endif; ?> <?php endif; ?> km</b></span></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="s_btn">
                <span class="u_rating">
                  <a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a>
                  <div class="rating_btns">
                    <a href="javascript:;" data-toggle="modal" data-target="#work_description" data-backdrop="static" data-keyboard="false">Ask for quote</a>
                    <a href="javascript:;" data-toggle="modal" data-target="#ask_question" data-backdrop="static" data-keyboard="false">Ask question</a>
                    <a href="javascript:;" data-toggle="modal" data-target="#add_appointment" data-backdrop="static" data-keyboard="false">Schedule appointment</a>
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
        <section>
          <div class="user_map_sec">
            <div class="r-star">
              <ul>
                <?php if(isset($round_rating)): ?>
                  <?php if($round_rating == '5'): ?>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                  <?php elseif($round_rating == '4'): ?>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                  <?php elseif($round_rating == '3'): ?>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                  <?php elseif($round_rating == '2'): ?>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/active_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                    <li><a href="javascript:;"><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></a></li>
                  <?php elseif($round_rating == '1'): ?>
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
              <p><?php if(isset($total_review)): ?> <?php echo e($total_review); ?> <?php endif; ?> reviews</p>
            </div>
            <div class="work_area">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="G-map">
                    <?php if(!empty($user_details)): ?>

                    <?php 
                    $longitude = $user_details['logitude'];
                    $latitude = $user_details['latitude'];
                    ?>

                    <?php endif; ?>

                    <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo e($latitude); ?>,<?php echo e($longitude); ?>&amp;key=AIzaSyCqlzdmRasNAVLVYfUb26BiOjkSvny4YHQ"></iframe>

                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="w-area">
                  <div class="w-area_1">
                    <h1>Working areas:</h1>
                    <p>Websites, Logo, Application, Icons</p>
                  </div>
                  <div class="hastag_sec">
                    <h1>Hashtags:</h1>
                    <ul>
                      <?php if(!empty($user_details)): ?>
                        <?php if(isset($user_details['hash_tags'])): ?>
                          <?php if(!empty($user_details['hash_tags'])): ?>
                            <?php $__currentLoopData = $user_details['hash_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$hashtags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="javascript:;" tag_id="<?php echo e($hashtags['tag_id']); ?>"/>#<?php echo e($hashtags['bus_hashtags']['hashtag_name']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                          No Hashtag Found!
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                      
                    </ul>
                  </div>
                  <div class="working-hr">
                    <h1>Working hours:</h1>

                    <?php if(!empty($user_details)): ?>
                    <?php if(isset($user_details['bu_details'][0]['schedule'])): ?>
                    <?php $userSchedule = json_decode($user_details['bu_details'][0]['schedule']);?>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(!empty($userSchedule)): ?>
                      <?php if(isset($userSchedule->available)): ?>
                      <?php echo "available 24 hours 7 days a week";?>
                      <?php else: ?>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Sunday</div>
                          <?php if(isset($userSchedule->sunday_from)){ 
                            $value = $userSchedule->sunday_from;}else{$value = '';}
                          if(isset($userSchedule->sunday_to)){ 
                              $value_to = $userSchedule->sunday_to;}else{$value_to = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Thursday</div>
                          <?php if(isset($userSchedule->thursday_from)){ 
                            $value = $userSchedule->thursday_from;}else{$value = '';}
                          if(isset($userSchedule->thursday_to)){ 
                              $value_to = $userSchedule->thursday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <!-- <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Sunday</div>
                          <div class="weekdaytime">09:00 - 18:00</div>
                        </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Thursday</div>
                          <?php if(isset($userSchedule->thursday_from)){ 
                            $value = $userSchedule->thursday_from;}else{$value = '';}
                          if(isset($userSchedule->thursday_to)){ 
                              $value_to = $userSchedule->thursday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div> -->
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Monday</div>
                          <?php if(isset($userSchedule->monday_from)){ 
                            $value = $userSchedule->monday_from;}else{$value = '';}
                          if(isset($userSchedule->monday_to)){ 
                              $value_to = $userSchedule->monday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Tuesday</div>
                          <?php if(isset($userSchedule->tuesday_from)){ 
                            $value = $userSchedule->tuesday_from;}else{$value = '';}
                          if(isset($userSchedule->tuesday_to)){ 
                              $value_to = $userSchedule->tuesday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Friday</div>
                          <?php if(isset($userSchedule->friday_from)){ 
                            $value = $userSchedule->friday_from;}else{$value = '';}
                          if(isset($userSchedule->friday_to)){ 
                              $value_to = $userSchedule->friday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Wednesday</div>
                          <?php if(isset($userSchedule->wednesday_from)){ 
                            $value = $userSchedule->wednesday_from;}else{$value = '';}
                          if(isset($userSchedule->wednesday_to)){ 
                              $value_to = $userSchedule->wednesday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="weekand_time">
                          <div class="weekday">Saturday</div>
                          <?php if(isset($userSchedule->saturday_from)){ 
                            $value = $userSchedule->saturday_from;}else{$value = '';}
                          if(isset($userSchedule->saturday_to)){ 
                              $value_to = $userSchedule->saturday_to;}else{$value = '';}
                          ?>
                          <div class="weekdaytime"><?php echo e($value); ?> - <?php echo e($value_to); ?></div>
                        </div>
                        </div>
                      </div>
                      <?php endif; ?>
                    <?php else: ?>
                    No working hour selected.
                    <?php endif; ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="text_slider">
            <div class="breif_detail">
              <p><?php if(!empty($user_details)): ?> 
                  <?php if(!empty($user_details['bu_details'])): ?>
                    <?php if($user_details['bu_details'][0]['business_profile']): ?>
                    <?php echo e($user_details['bu_details'][0]['business_profile']); ?>

                    <?php else: ?>
                    No Description Found!
                    <?php endif; ?>
                  <?php endif; ?> 
                <?php endif; ?>
              </p>
            </div>
            <div class="slider_cont">
              <div class="swiper-container swiper-wrapper_p swiper2">
                     <div class="swiper-wrapper">

                      <?php if(!empty($user_details)): ?> 
                        <?php if(!empty($user_details['bu_details'])): ?>
                          <?php
                          $uploads = json_decode($user_details['bu_details'][0]['pic_vid'],true);
                          ?>

                          <?php if(!empty($uploads)): ?>
                            <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $img_name = explode( '.', $img );?>
                            <div class="swiper-slide">
                              <div class="swiper-slide total_pics_img" data-image="<?php echo e(url('/images/profile/'.$user_details['business_userid'].'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImageUser(this);return false;"><img src="<?php echo e(url('/images/profile/'.$user_details['business_userid'].'/'.$img)); ?>"/></div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          <?php endif; ?>


                        <?php endif; ?>
                      <?php endif; ?>

                       
<!-- 
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div>
                       <div class="swiper-slide total_pics_img"><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></div> -->

                     </div>
                     <!-- Add Pagination -->
                     <div class="swiper-pagination1 swiper21"></div>
                     <!-- Add Arrows -->
                     <div class="swiper-button-next swiper2next"></div>
                     <div class="swiper-button-prev swiper2pre"></div>
                  </div>
            </div>
          </div>
        </section>
        <section>
          <div class="price_list">
            <div class="price_list_main">
              <div class="price_list_detail">
                <h1>Pricelist</h1>
                <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod felis accumsan justo suscipit, ac dignissim velit pulvinar. Nullam nisi quam, ultrices a efficitur dapibus, interdum quis lectus.</p>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Logo design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Website design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
              <div class="pro_detail">
                <div class="p_detail_main1">
                  <h1>Business card design</h1>
                  <p>Description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="t_price">
                  <h1>$30-200</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="product-d">
            <div class="p_detail_main">
              <div class="view_pro">
                <a href="javascript:;"><h1>View products</h1><img src="<?php echo e(asset('img/custom_arrow.png')); ?>"/></a>
              </div>
              <div class="c_pr_sec">

                <?php if(isset($get_products) && !empty($get_products)): ?>
                <?php $__currentLoopData = $get_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_key=>$p_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p_name_dec">
                  <div class="name_price">
                    <h1 class="p-name"><?php echo e($p_value['get_product']['name']); ?></h1>
                    <span>
                      <?php if($p_value['get_product']['price_type'] == 'fix'): ?>
                      <h1>$<?php echo e($p_value['get_product']['price']); ?></h1>
                      <?php elseif($p_value['get_product']['price_type'] == 'range'): ?>
                      <h1>$<?php echo e($p_value['get_product']['price_from']); ?> - $<?php echo e($p_value['get_product']['price_to']); ?></h1>
                      <?php $price_per = $p_value['get_product']['price_per'];?>
                      <?php if($price_per == '1'): ?>
                      <p>/hr</p>
                      <?php elseif($price_per == '2'): ?>
                      <p>/min</p>
                      <?php endif; ?>
                      <?php endif; ?>
                    </span>
                  </div>
                  <p><?php echo e($p_value['get_product']['product_description']); ?>.</p>
                  <ul>
                    <?php 
                      $uploads = json_decode($p_value['get_product']['product_images'],true);
                    ?>

                    <?php if(!empty($uploads)): ?>
                      <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $img_name = explode( '.', $img );?>
                      <li data-image="<?php echo e(url('/images/business_products/'.$p_value['get_business']['business_userid'].'/'.$img)); ?>" id="img_<?php echo e($img_name[0]); ?>" onclick="openBigImageUser(this);return false;">
                        <img src="<?php echo e(url('/images/business_products/'.$p_value['get_business']['business_userid'].'/'.$img)); ?>"/>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </ul>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
               <!--  <div class="p_name_dec">
                  <div class="name_price">
                    <h1 class="p-name">Product name</h1>
                    <span><h1>$40</h1><p>/hr</p></span>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar neque neque, ut semper nisl venenatis vitae. Mauris quis risus lacus. Sed cursus urna sed nibh pellentesque tincidunt. Quisque pharetra, dui quis aliquam tempor, orci augue sollicitudin orci, et ornare elit libero eu magna ...</p>
                  <ul>
                    <li><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/Untitled-2.png')); ?>"/></li>
                  </ul>
                </div> -->
                <div class="load_more"><a href="javascript:;">Load more</a></div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="view-review-main">
            <div class="view_pro">
              <a href="javascript:;"><h1>View products</h1><img src="<?php echo e(asset('img/custom_arrow.png')); ?>"/></a>
            </div>
            <div class="r-detail">
              <div class="star-date">
                <div class="rating_t">
                  <ul>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                  </ul>
                  <p>17/07/2018</p>
                </div>
                <div class="comp-detail">
                  <div class="comp-user-pic">
                  <img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/>
                  </div>
                  <div class="c-user-detail">
                    <h1>Firstname Lastname</h1>
                    <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                  </div>
                </div>
              </div>
              <div class="star-date">
                <div class="rating_t">
                  <ul>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/active_star.png')); ?>"/></li>
                    <li><img src="<?php echo e(asset('img/inactive_star.png')); ?>"/></li>
                  </ul>
                  <p>17/07/2018</p>
                </div>
                <div class="comp-detail">
                  <div class="comp-user-pic">
                  <img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/>
                  </div>
                  <div class="c-user-detail">
                    <h1>Firstname Lastname</h1>
                    <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                  </div>
                </div>
              </div>
              <div class="load_more"><a href="javascript:;">Load more</a></div>
            </div>
          </div>
        </section>
      </div>

        <!-- Modal -->
<div class="modal fade" id="add_appointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header ad_header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add_appointment_form" method="POST">
        <input type="hidden" id="buid" name="b_id" value="<?php echo e($user_details['id']); ?>">
        <div class="modal-body ad-header-body">
          <div class="p-heading"><h1>When?</h1></div>
          <div class="upper-catergory">
          <div class="row">
            <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required="" maxlength="50">
                </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="fix-price-range">
                <div class="formcheck">
                      <label>
                        <input type="radio" class="radio-inline pickup_sch" name="radios" value="1" id="sch_now">
                        <span class="outside"><span class="inside"></span></span><p class="now-color">Now</p>
                      </label>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-12 mt-2">
              <div class="fix-price-range">
                <div class="formcheck">
                  <label>
                    <input type="radio" class="radio-inline pickup_sch" name="radios"  value="2" id="sch_later">
                    <span class="outside"><span class="inside"></span></span><p class="now-color">Other time</p>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mt-2 later-grp" style="display:none">
              <div class="form-group">
                  <label for="otherdate">Date</label>
                  <input type="text" class="form-control datepicker" name="gotherdate" id="gotherdate" required=""  readonly>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-2 later-grp" style="display:none">
              <div class="form-group position-relative">
                  <label for="othertime">Time</label>
                  <input type="text" class="form-control timepicker" name="gothertime" id="gothertime" required="" readonly>
                </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="fix-price-range">
                <div class="formcheck">
                      <label>
                        <input type="radio" class="radio-inline pickup_sch" name="radios" value="3" id="sch_flex">
                        <span class="outside"><span class="inside"></span></span><p class="now-color">Flexible hours</p>
                      </label>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mt-2 flex-grp" style="display:none">
              <div class="form-group">
                  <label for="datefrom">Date from</label>
                  <input type="text" class="form-control datepicker" name="gdatefrom" id="gdatefrom" required="" readonly>

                </div>
            </div>
            <div class="col-md-6 col-12 mt-2 flex-grp" style="display:none">
              <div class="form-group position-relative">
                  <label for="dateto">Date to</label>
                  <input type="text" class="form-control datepicker" name="gdateto"  id="gdateto" required="" readonly>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-2 flex-grp" style="display:none">
              <div class="form-group">
                  <label for="timefrom">Time from</label>
                  <input type="text" class="form-control timepicker" name="gtimefrom" id="gtimefrom" required="" readonly>

                </div>
            </div>
            <div class="col-md-6 col-12 mt-2 flex-grp" style="display:none">
              <div class="form-group position-relative">
                  <label for="timeto">Time to</label>
                  <input type="text" class="form-control timepicker" name="gimeto" id="gimeto" required="" readonly>
                </div>
            </div>
          </div>
          </div>
            <div class="start-btn"><input type="button" id="add_appointment_button" value="Add"></div>
        </div>
      </form> 
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>