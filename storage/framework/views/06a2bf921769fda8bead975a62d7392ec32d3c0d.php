<?php $__env->startSection('content'); ?>


<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<span class="q_breadcrumb">Profile and settings</span></div>
</section>
<section>

<div class="quote_req_main">
<h1>Profile and settings</h1>
<form method="POST" class="dropzone profilesetting_form" data-page="profilesetting" id="dropzone_form" action="<?php echo e(url('/business_user/profile_setting')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="profile_section_main">
  <div class="part1">
    <h1 class="part_heading">Part 1</h1>
    <div class="registrationform">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="business_name"><?php echo e(__('Business name')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('business_name') ? ' error_border' : ''); ?>" id="business_name" value="<?php if(!empty($user_details)): ?><?php echo e($user_details['business_name']); ?><?php else: ?><?php echo e(old('business_name')); ?><?php endif; ?>" name="business_name" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('business_name')): ?>
              <span class="fill_fields" role="alert">
                  <?php echo e($errors->first('business_name')); ?>

              </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="first_name"><?php echo e(__('First name')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('first_name') ? ' error_border' : ''); ?>" id="first_name" name="first_name"  value="<?php if(!empty($user_details)): ?><?php echo e($user_details['first_name']); ?><?php else: ?><?php echo e(old('first_name')); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('first_name')): ?>
              <span class="fill_fields" role="alert">
                  <?php echo e($errors->first('first_name')); ?>

              </span>
          <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="last_name"><?php echo e(__('Last name')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('last_name') ? ' error_border' : ''); ?>" id="last_name" name="last_name" value="<?php if(!empty($user_details)): ?><?php echo e($user_details['last_name']); ?><?php else: ?><?php echo e(old('last_name')); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('last_name')): ?>
                <span class="fill_fields" role="alert">
                    <?php echo e($errors->first('last_name')); ?>

                </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="mobile_phone"><?php echo e(__('Mobile phone')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('mobile_phone') ? ' error_border' : ''); ?>" id="mobile_phone" name="mobile_phone" value="<?php if(!empty($user_details)): ?><?php echo e($user_details['phone_number']); ?><?php else: ?><?php echo e(old('mobile_phone')); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('mobile_phone')): ?>
              <span class="fill_fields" role="alert">
                  <?php echo e($errors->first('mobile_phone')); ?>

              </span>
          <?php endif; ?>

          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="email"><?php echo e(__('Email')); ?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($user_details)): ?><?php echo e($user_details['email']); ?><?php else: ?><?php echo e(old('email')); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('email')): ?>
                <span class="fill_fields" role="alert">
                    <?php echo e($errors->first('email')); ?>

                </span>
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="full_address"><?php echo e(__('Full address')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('full_address') ? ' error_border' : ''); ?>" id="full_address" name="full_address" value="<?php if(!empty($user_details)): ?><?php echo e($user_details['full_address']); ?><?php else: ?><?php echo e(old('full_address')); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" autofocus>
            <?php if($errors->has('full_address')): ?>
                <span class="fill_fields" role="alert">
                    <?php echo e($errors->first('full_address')); ?>

                </span>
            <?php endif; ?>
          </div>
        </div>
    </div>
  </div>


  <div class="part2">
    <h1 class="part_heading">Part 2</h1>
    <div class="registrationform">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="url"><?php echo e(__('URL')); ?></label>
            <input type="text" class="form-control<?php echo e($errors->has('url') ? ' error_border' : ''); ?>" id="url" name="url" value="<?php if(!empty($user_details)): ?> <?php if(!empty($user_details['bu_details'])): ?><?php echo e($user_details['bu_details'][0]['website_url']); ?><?php else: ?><?php echo e(old('url')); ?><?php endif; ?> <?php endif; ?>" autofocus>
             <?php if($errors->has('url')): ?>
                <span class="fill_fields" role="alert">
                    <?php echo e($errors->first('url')); ?>

                </span>
            <?php endif; ?>

          </div>
          <div class="form-group col-md-6 col-12">
            <label for="fb_url"><?php echo e(__('Facebook group URL')); ?></label>
            <input type="text" class="form-control" id="fb_url" name="fb_url"" value="<?php if(!empty($user_details)): ?> <?php if(!empty($user_details['bu_details'])): ?><?php echo e($user_details['bu_details'][0]['facebook_url']); ?><?php else: ?><?php echo e(old('fb_url')); ?><?php endif; ?> <?php endif; ?>">

            <?php if($errors->has('fb_url')): ?>
                <span class="fill_fields" role="alert">
                    <?php echo e($errors->first('fb_url')); ?>

                </span>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <div class="connect_facebook"><a href="javascript:;">Connect facebook profile</a></div>
          </div>
          <div class="form-group col-md-6 col-12">
            <div class="upload-btn-wrapper">
                <button class="btn">Select profile image</button>
                <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" onchange="readURLprofile(this);" >
                <span id="msg"></span>
                <?php if(!empty($user_details)): ?>
                <?php if(!empty($user_details['image_name'])): ?>
                <img id="blah" src="<?php echo e(url('/images/business_profile/'.$user_details['business_userid'].'/'.$user_details['image_name'])); ?>" alt="your image" style="height:50px;width:50px;"/>
                <?php else: ?>
                <img id="blah" src="<?php echo e(asset('img/user_placeholder.png')); ?>" alt="your image" />
                <?php endif; ?>
                <?php endif; ?>
            </div>  
          </div>
        </div>

        <!-- <div class="upload_profile_pic">
          <div class="form-group col-md-6 col-12">
            <div class="upload-btn-wrapper">
                <button class="btn">Select profile image</button>
                <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg" onchange="readURLprofile(this);" >
                <span id="msg"></span>
            </div>   
          </div>   

          
          <?php if(!empty($user_details)): ?>
          <?php if(!empty($user_details['image_name'])): ?>
          <img id="blah" src="<?php echo e(url('/images/business_profile/'.$user_details['business_userid'].'/'.$user_details['image_name'])); ?>" alt="your image" style="height:50px;width:50px;"/>
          <?php else: ?>
          <img id="blah" src="<?php echo e(asset('img/user_placeholder.png')); ?>" alt="your image" />
          <?php endif; ?>
          <?php endif; ?>
          
        </div> -->
    </div>
  </div>

  <div class="part3">
    <h1 class="part_heading" id="part_heading_three">Part 3</h1>
    <div class="registrationform">
      <div class="category_secton">
        <div class="category_list_heading">
          <p>Categories</p>
          <div class="category_list category_list_dynamic">
            <div class="search_category">
              <input type="text" placeholder="Search..." class="category_search">
            </div>
            <ul>
              <?php 
              //echo '<pre>'; print_r($categories); echo '</pre>';
              //echo '<pre>'; print_r($business_categories); echo '</pre>';
              foreach($business_categories AS $cat){
                $bids[] = $cat['id'];
              }
              //echo '<pre>'; print_r($bids); echo '</pre>';
              ?>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="javascript:;" inc_id="<?php echo e($value['id']); ?>" id="<?php echo e($value['category_id']); ?>" onclick="categoriesselect(this)" data-cat="parent" class="categories"><?php echo e($value['category_name']); ?></a>
                <?php if(in_array($value['id'],$bids)): ?>
                    <span class="checked_category" style="display: block;"><img src="<?php echo e(asset('img/category_check.png')); ?>"/></span>
                <?php else: ?>
                  <span class="checked_category"><img src="<?php echo e(asset('img/category_check.png')); ?>"/></span>
                <?php endif; ?>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
        <div class="arrow_cat"><img src="<?php echo e(asset('img/arrow.png')); ?>" class="img-fluid"></div>
        <div class="added_category_list_heading">
          <p class="forerror addcategory">Added categories (up to 10)</p>
          <div class="added_category_list error">
            <div class="added_category category_list">
                            <?php if(!empty($business_categories)): ?>
                            <ul class="added_category_ul">
                                <?php $__currentLoopData = $business_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li>
                                        <a href="javascript:;" id="<?php echo e($parent_category['cat_id']); ?>" data-cat="parent" class="categories"><?php echo e($parent_category['name']); ?></a>
                                        <span class="cross_category">
                                          <img src="<?php echo e(asset('img/category_cancel.png')); ?>" class="img-fluid">
                                        </span>
                                        <ul class="subcategories">
                                          <?php $__currentLoopData = $parent_category['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li>
                                            <a href="javascript:;" id="<?php echo e($sub_category->sub_cat_id); ?>" data-cat="sub"><?php echo e($sub_category->sub_category_name); ?></a>
                                            <span class="cross_category">
                                            <img src="<?php echo e(asset('img/category_cancel.png')); ?>" class="img-fluid">
                                            </span>
                                          </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                      </li>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                          <?php else: ?>
                          <p id="no_categories">No Categories Added</p>
                          <ul class="added_category_ul">
                                                   
                          </ul>
                          <?php endif; ?>
                        </div>
          </div>
          <span class="fill_fields disp_none" id="cat_fill">Fill this field</span>
        </div>
      </div>
    </div>
  </div>

  <div class="part4">
  <h1 class="part_heading">Part 4</h1>
    <div class="registrationform">
    <p class="part4p">Where do you want to get quote requests from ?</p>
      <div class="geographic_setting">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <div class="formcheck">
              
              <label>
                <?php  $checked = ''; ?>
                    <?php if(!empty($user_details)): ?>
                      <?php if($user_details['bu_details'][0]['distance_all'] == 1): ?>
                      <?php  $checked = 'checked'; ?>                                  
                      <?php endif; ?>
                    <?php endif; ?>
              <input type="radio" class="radio-inline" name="country" value="all" <?php echo e($checked); ?>>
              <span class="outside"><span class="inside"></span></span><p>All country</p>
              </label>
            </div>
          </div>
          <div class="form-group col-md-6 col-12">
            <div class="formcheck">
              <label>
                <?php  $checked1 = ''; ?>
                    <?php if(!empty($user_details)): ?>
                      <?php if($user_details['bu_details'][0]['distance_all'] == 0): ?>
                        <?php  $checked1 = 'checked'; ?>
                      <?php endif; ?>
                    <?php endif; ?>
              <input type="radio" class="radio-inline" name="country" value="distance" <?php echo e($checked1); ?>>
              <span class="outside"><span class="inside"></span></span><p>Distance from your address</p>
              </label>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="form-group col-md-6 col-12">
        </div>
        <div class="form-group custom_errow col-md-6 col-12">
          <label for="businessradius">Radius (km)</label>
          <?php if(!empty($user_details)): ?>
          <?php if(isset($user_details['bu_details'][0]['distance_kms'])): ?>
            <?php  $distance_kms = $user_details['bu_details'][0]['distance_kms']; ?>
            <?php else: ?>
            <?php  $distance_kms = "1";?>
            <?php endif; ?>
            <?php endif; ?>
            <select class="form-control " name="radius" id="exampleSelect1">
              <?php for($i=10;$i<=100;$i++){
                if($i % 10 == 0){
                if($i == $distance_kms){?>
                  <option value="<?php echo e($i); ?>" selected="selected"><?php echo e($i); ?></option>
              <?php }else{ ?>
                  <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
              <?php } } } ?>
            </select>
          <span class="select_arrow"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="part5">
    <h1 class="part_heading">Part 5</h1>
    <div class="registrationform">
      <div class="description_optional row">
      <div class="form-group col-md-12 col-12">
      <label for="inputEmail4">Description (optional)</label>
      <textarea name="descripton"><?php if(!empty($user_details)): ?><?php echo e($user_details['bu_details'][0]['business_profile']); ?><?php endif; ?></textarea>
      </div>
      </div>
      <div class="add_photo_video">
      <p>Add photos / Videos (optional)</p>
        <div class="upload_file_section">
          <div class="drag_file" id="drag_div">
            <div class="fallback">
              <input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" /></div>
            <a href="javascript:;" class="drag_drop_text">Drag and drop files here to upload</a>
          </div>
          <span>OR</span>
          <div class="file_to_upload">
            <div class="upload-btn-wrapper">
              <button class="btn">Select files to upload</button>
              <input type="file" name="myfile[]" multiple class="select_profile_img" accept="image/x-png,image/gif,image/jpeg"/>

                <span id="msg" class="profileImages"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="photo_video_list">
    <ul>
      <?php if(!empty($user_details)): ?>
      <?php
      $uploads = json_decode($user_details['bu_details'][0]['pic_vid'],true);
      ?>
      <?php if(!empty($uploads)): ?>
      <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php $img_name = explode( '.', $img );?>
        <li class="imguploaded" id="img_<?php echo e($img_name[0]); ?>">
        <div class="image"><img src="<?php echo e(url('/images/profile/'.$user_details['business_userid'].'/'.$img)); ?>"></div>
        <div class="input_des"><textarea placeholder="Input description"></textarea></div>
        <a href="javascript:;" data-img="<?php echo e($img); ?>" class="profile_imgcross"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      <?php endif; ?>
      <!-- <li>
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li>
      <li>
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li>
      <li>
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li>
      <li class="diff_bg_color">
      <div class="image"><img src="<?php echo e(asset('img/img1.png')); ?>"></div>
      <div class="input_des"><textarea placeholder="Input description"></textarea></div>
      <a href="javascript:;"><img src="<?php echo e(asset('img/line_cross.png')); ?>"></a>
      </li> -->
    </ul>
  </div>


  <div class="ques_ans pt-4">
    <div class="row">
      <div class="form-group col-md-6 col-12">
        <div class="formcheck forcheckbox">
          <label>
            <?php
            if(!empty($user_details)){
             if(isset($user_details['bu_details'][0]['send_question']) && $user_details['bu_details'][0]['send_question'] == 1){ 
                  $checked = 'checked';
              }else{
                  $checked = '';
              }
            }
              ?>
          <input type="checkbox" class="radio-inline" name="send_question" value="" <?php echo e($checked); ?> >
          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>Send me questions to answer<span class="info"><img src="<?php echo e(asset('img/info.png')); ?>" title="Check this checkbox if you want to send question."></span>      </p>
          </label>
        </div>
      </div>
      <div class="form-group col-md-6 col-12">
        <div class="formcheck forcheckbox">
          <label>
            <?php
            if(!empty($user_details)){
             if(isset($user_details['bu_details'][0]['send_schedule']) && $user_details['bu_details'][0]['send_schedule'] == 1){ 
                  $checked = 'checked';
              }else{
                  $checked = '';
              }
            }
          ?>
          <input type="checkbox" class="radio-inline" name="send_schedule" value="" <?php echo e($checked); ?>>
          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p> Send me schedule requests   <span class="info"><img src="<?php echo e(asset('img/info.png')); ?>" title="Check this checkbox if you want to send schedule requests."></span> </p>
          </label>
        </div>
      </div>
    </div>
  </div>
<span class="fill_fields text-center" role="alert"></span>
  <div class="part6">
    <h1 class="part_heading">Part 6</h1>
    <div class="registrationform">
      <p class="part6p">Select relevant hashtags about you business</p>
      <div class="relevent_hastag pt-3 pb-4">
        <div class="row">

          <?php if(!empty($hashtags)): ?>
          <?php $__currentLoopData = $hashtags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$hashtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(!empty($user_details)): ?>
          <?php if(isset($user_details['hash_tags'])): ?>
          
            <?php if(array_search($hashtag['id'], array_column($user_details['hash_tags'], 'tag_id')) > -1){
                $checked = 'checked'; 
            }else{
              $checked = '';
            } ?>
            <?php else: ?>
            <?php $checked = '';?>
            <?php endif; ?>
            <?php endif; ?>
            <div class="col-md-3 col-6">
              <div class="formcheck forcheckbox">
                    <label>
                      <input data-id="<?php echo e($hashtag['id']); ?>" type="checkbox" class="radio-inline" name="hashtag[]" value="<?php echo e($hashtag['id']); ?>" <?php echo e($checked); ?>>
                      <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#<?php echo e($hashtag['hashtag_name']); ?> </p>
                    </label>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?> 

<!-- 
          
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#24hours </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#acceptCC </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#acceptcash </p>
              </label>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="formcheck forcheckbox">
              <label>
              <input type="checkbox" class="radio-inline" name="radios" value="">
              <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>#7daysaweek</p>
              </label>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>


  <div class="part7">
    <h1 class="part_heading">Part 7</h1>
    <div class="registrationform" id="register_schedule">
      <p class="part6p">Schedule</p>
      <span class="bu_error bu_error_hours" style="margin: 0px;display: block;"></span>
      <div class="available_time">
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="formcheck forcheckbox">
              <?php if(!empty($user_details)): ?>
              <?php if(isset($user_details['bu_details'][0]['schedule'])): ?>
              <?php $userSchedule = json_decode($user_details['bu_details'][0]['schedule']);?>
              <?php if(isset($userSchedule->available)): ?>
              <?php $checked = 'checked';?>
              <?php else: ?>
              <?php $checked = '';?>
              <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
              <label>
                <input type="checkbox" id="available" class="radio-inline" name="available" value="" <?php echo e($checked); ?>>
                <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span><p>available 24 hours 7 days a week</p>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="total_weekdays">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Sunday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->sunday_from)){ 
                      $value = $userSchedule->sunday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="sunday_from" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>

              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time" >
                  <?php if(isset($userSchedule->sunday_to)){ 
                      $value = $userSchedule->sunday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="sunday_to" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Monday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->monday_from)){ 
                      $value = $userSchedule->monday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="monday_from" value="<?php echo e($value); ?>" value="<?php echo e($value); ?>" />
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->monday_to)){ 
                      $value = $userSchedule->monday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="monday_to" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Tuesday</label>
                  <div class="input-group date" >
                  <?php if(isset($userSchedule->tuesday_from)){ 
                        $value = $userSchedule->tuesday_from;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="tuesday_from" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group">
                  <?php if(isset($userSchedule->tuesday_to)){ 
                        $value = $userSchedule->tuesday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker-input datetimepicker" name="tuesday_to" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Wednesday</label>
                   <div class="input-group date">
                    <?php if(isset($userSchedule->wednesday_from)){ 
                          $value = $userSchedule->wednesday_from;}else{$value = '';}
                      ?>
                    <input type="text" class="form-control datetimepicker" name="wednesday_from" value="<?php echo e($value); ?>"/>
                    <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                    </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->wednesday_to)){ 
                        $value = $userSchedule->wednesday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="wednesday_to" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Thursday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->thursday_from)){ 
                      $value = $userSchedule->thursday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="thursday_from" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->thursday_to)){ 
                      $value = $userSchedule->thursday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="thursday_to" value="<?php echo e($value); ?>"/>
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Friday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->friday_from)){ 
                      $value = $userSchedule->friday_from;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="friday_from"  value="<?php echo e($value); ?>" />
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->friday_to)){ 
                      $value = $userSchedule->friday_to;}else{$value = '';}
                  ?>
                  <input type="text" class="form-control datetimepicker" name="friday_to" value="<?php echo e($value); ?>" />
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="week-section">
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4">Saturday</label>
                  <div class="input-group date">
                  <?php if(isset($userSchedule->saturday_from)){ 
                        $value = $userSchedule->saturday_from;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="saturday_from" value="<?php echo e($value); ?>" />
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
              <span class="divider">-</span>
              <div class="day">
                <div class="form-group">
                  <label for="inputPassword4"></label>
                  <div class="input-group date second_time">
                  <?php if(isset($userSchedule->saturday_to)){ 
                        $value = $userSchedule->saturday_to;}else{$value = '';}
                    ?>
                  <input type="text" class="form-control datetimepicker" name="saturday_to" value="<?php echo e($value); ?>" />
                  <span class="select_arrow for_timer"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="agree">
    <div class="terms_agree">
      <div class="formcheck forcheckbox">
    
        <span class="bu_error bu_error_terms" style="margin: 0px;display: block;"></span>
      </div>
    </div>
  </div>
  <div class="save_agree"><a href="javascript:;"><input type="submit" id="profile_submit" name="profile_submit" value="Save"></a></div>
</form>
</section>
 <div id="openPopUpForQuestion" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        
            <div class="modal-content">
              <div class="modal-header quote_header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 
              </div>
              <div class="modal-body">
                  <div class="login_body_main">
                    <h1>Choose the category filters as main title</h1></br>
                  </div>
                  <div class="cat_html_dataa">
                  </div>
                  <div class="ask_for_quote_section" style="display:none">
                    <div class="next_btn" onclick="saveCategoryData();"><a href="javascript:;">Save Services</a></div>
                    <input type="hidden" id="getBuid">
                    <input type="hidden" id="getcatid">
                  </div>
              </div>
              
            </div>
        
      </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>