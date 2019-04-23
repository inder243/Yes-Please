<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<?php if(!empty(app('request')->input('month')) && !empty(app('request')->input('type'))): ?><a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>"> Advertisement </a>/<?php endif; ?><a href="<?php echo e(url('/business_user/quotes_questions')); ?>"> Quotes and questions </a>/<span class="q_breadcrumb"> <?php if(isset($allquotes)): ?> <?php echo e($allquotes->cat_name); ?><?php endif; ?></span></div>
      </section>
      <section>
         <div class="quote_req_main">
            <h1>Quote request</h1>
            
            <?php if(isset($quote_data[0]['status'])): ?>
              <?php if($quote_data[0]['status'] == '1'): ?>
              <div class="improvement_section_new">
              <?php elseif($quote_data[0]['status'] == '2'): ?>
              <div class="improvement_section_new q_quoted1">
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
                    <a href="JavaScript:;" class="user_text"><img src="<?php echo e(asset('img/text.png')); ?>"/></a>
                     <a href="javascript:;" class="user_call" data-toggle="tooltip" data-placement="top" title="<?php echo e($quote_data[0]['get_gen_user']['phone_number']); ?>" data-original-title="<?php echo e($quote_data[0]['get_gen_user']['phone_number']); ?>"><img src="<?php echo e(asset('img/call.png')); ?>"/></a>
                     
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
                       <?php if($quote_data[0]['status'] == '1'): ?>
                       <div class="new_lable bus_new">NEW</div>
                       <?php elseif($quote_data[0]['status'] == '2'): ?>
                       <div class="new_lable q_quoted_table bus_read">READ</div>
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
            <div class="reply_quote_sec">
            	<form class="dropzone" id="dropzone_form" data-page="quoterequest" method="POST" action="<?php echo e(route('business_user.quotes_request.submit')); ?>" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?> 

              <input type="hidden" name="quote_id" value="<?php echo e($quote_id); ?>"> 
              <input type="hidden" name="month" value="<?php if(!empty(app('request')->input('month'))): ?><?php echo e(app('request')->input('month')); ?><?php endif; ?>"> 
            	<input type="hidden" name="type" value="<?php if(!empty(app('request')->input('type'))): ?><?php echo e(app('request')->input('type')); ?><?php endif; ?>">	
               <div class="reply_quote_main">
                  <h1>Reply to quote</h1>
                  <p>Provide the user with maximum details about your offer</p>
                  <div class="row  searchf_input">
                     <div class="form-group col-md-6 col-12">
                        <label for="quote_price">Price quote</label>
                        <input type="number" onKeyPress="if(this.value.length==7) return false;"  name="quote_price" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control<?php echo e($errors->has('quote_price') ? ' error_border' : ''); ?>" id="quote_price" value="<?php echo e(old('quote_price')); ?>">

                        <?php if($errors->has('quote_price')): ?>
                            <span class="fill_fields" role="alert">
                                <?php echo e($errors->first('quote_price')); ?>

                            </span>
                        <?php endif; ?>

                     </div>
                     <div class="form-group custom_errow col-md-6 col-12">
                        <label for="inputPassword4">Price type</label>
                        <select class="form-control" id="exampleSelect1" name="quote_price_type">
                           <option value="1">Fix price</option>
                           <option value="2">Hourly</option>
                        </select>
                        <span class="select_arrow"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                     </div>
                  </div>
                  <div class="choose_template">
                     <div class="detail_main_content">
                        <div class="detail_left">
                           <div class="choose_detail">
                              <span>Detail</span>
                              <a href="javascript:;" onclick="choose_temp(this);return false;" class="choose_from_templates">Choose from templates</a>
                           </div>
                           <p class="save_template"><a href="javascript:;">Save as template</a></p>
                        </div>
                        <div class="detail_textarea">
                           <textarea name="quote_details" id="template_text" class="quote_details<?php echo e($errors->has('quote_details') ? ' error_border' : ''); ?>"><?php echo e(old('quote_details')); ?></textarea>

                           <?php if($errors->has('quote_details')): ?>
                            <span class="fill_fields" role="alert">
                                <?php echo e($errors->first('quote_details')); ?>

                            </span>
                        <?php endif; ?>
                        
                        </div>
                     </div>
                  </div>
                  <div class="registrationform">
    			        <div class="description_optional row">
    			          
    			        </div>
                  <div class="add_photo_video">
                     <p>Add photos / Videos (optional)</p>
                     <div class="upload_file_section">

                        <div class="drag_file" id="drag_div">
                        	<div class="fallback">
              					<input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" />
              				</div>

                           <a href="javascript:;">Drag and drop files here to upload</a>
                        </div>
                        <span>OR</span>

                        <div class="file_to_upload">
                           <div class="upload-btn-wrapper">
                              <button class="btn select_fileUpload" >Select files to upload</button>
                              <input type="file" name="myfile[]" multiple class="select_quote_rply_img selectQuotImg" accept="image/x-png,image/gif,image/jpeg"/>

                				      <span id="msg" class="BusQuoteRply"></span>
                           </div>
                           
                        </div>
                     </div>
                     <div class="choose_from_pre">
                              <a href="javascript:;">Choose from previous</a>
                           </div>
                  </div>
                  </div>
               </div>
               <div class="send_button_this">
                  <a href="javascript:;"><input type="submit" class="quote_request_submit" value="Send"></a>
               </div>
           		</form>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>