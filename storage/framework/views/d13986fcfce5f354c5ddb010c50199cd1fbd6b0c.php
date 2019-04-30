<div class="ask_for_quote_section">
                      
<?php if(isset($data) && !empty($data)): ?>
 <?php if($data['type']=='textbox'): ?>

  <div class="not_all_business form-ques dynamicQues_<?php echo e($data['id']); ?>" data-id="<?php echo e($data['id']); ?>" data-type="<?php echo e($data['type']); ?>" data-filter="<?php echo e($data['filter']); ?>">
    <h1 class="questitle"><?php echo e($data['title']); ?></h1>
    <div class="ph_detail">
      <div class="form-group ">
      <label for="inputEmail<?php echo e($data['id']); ?>"><?php echo e($data['title']); ?></label>
      <input class="form-control" id="inputEmail<?php echo e($data['id']); ?>" type="text">
    </div>

     <?php if(isset($data['description']) && !empty($data['description'])): ?>
       <div class="t_detail">
          <p><img src="<?php echo e(asset('img/info.png')); ?>"/> <?php echo e($data['description']); ?>  </p>
       </div>
      <?php endif; ?>
    
     <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
      </div>
    </div>
  <?php elseif($data['type']=='checkbox'): ?>
    <div class="what_design form-ques dynamicQues_<?php echo e($data['id']); ?>" data-id="<?php echo e($data['id']); ?>" data-type="<?php echo e($data['type']); ?>" data-filter="<?php echo e($data['filter']); ?>">
      <h1 class="questitle"><?php echo e($data['title']); ?></h1>
      <div class="d_cat">
        <?php if(isset($data['options']) && !empty($data['options'])): ?>
         <ul>
          <?php $__currentLoopData = json_decode($data['options']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
               <div class="formcheck forcheckbox langcheck">
                  <label>
                     <input type="checkbox" class="radio-inline" name="radios<?php echo e($data['id']); ?>[]" value="<?php echo e($option->option_value); ?>" data-text="<?php echo e($option->option_name); ?>">
                     <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                     <p><?php echo e($option->option_name); ?></p>
                  </label>
               </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
         <?php endif; ?>
         <?php if(isset($data['description']) && !empty($data['description'])): ?>
         <div class="t_detail">
            <p><img src="<?php echo e(asset('img/info.png')); ?>"/> <?php echo e($data['description']); ?>  </p>
         </div>
         <?php endif; ?>
         
         <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
      </div>
    </div>
     <?php elseif($data['type']=='dropdown'): ?>
     <div class="quote_recieve form-quesdynamicQues_<?php echo e($data['id']); ?>" data-id="<?php echo e($data['id']); ?>" data-type="<?php echo e($data['type']); ?>" data-filter="<?php echo e($data['filter']); ?>">
      <h1 class="questitle"><?php echo e($data['title']); ?></h1>

    <?php if(isset($data['options']) && !empty($data['options'])): ?>
    
       <div class="total_quote"><div class="form-group custom_errow"><label><?php echo e($data['title']); ?></label>
        <select class="form-control">
        <?php $__currentLoopData = json_decode($data['options']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value='.$option->option_value.'><?php echo e($option->option_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span class="select_arrow1"><img img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span></div>
    <?php endif; ?>
   </ul></div>
    <?php if(isset($data['description']) && !empty($data['description'])): ?>
    <div class="t_detail">
      <p><img src="<?php echo e(asset('img/info.png')); ?>"/> <?php echo e($data['description']); ?>  </p>
    </div>
     <?php endif; ?>
    <div class="q_nex_btns"><div onclick="getPrevQuesButton('.$quesId.');" class="ele_pre"><a href="javascript:;">&lt; Previous</a></div><div class="ele_next" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div></div></div></div>
   <?php elseif($data['type']=='radio'): ?>
    <div class="quote_recieve form-ques dynamicQues_<?php echo e($data['id']); ?>"  data-id="<?php echo e($data['id']); ?>" data-type="<?php echo e($data['type']); ?>" data-filter="<?php echo e($data['filter']); ?>">
      <h1><?php echo e($data['title']); ?></h1>
      <?php if(isset($data['options']) && !empty($data['options'])): ?>
      <div class="total_quote dynamic_rad">
        <ul>
          <?php $__currentLoopData = json_decode($data['options']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
            <li>
                 <div class="formcheck">
                    <label>
                       <input type="radio" class="radio-inline dynamicradio_button" name="radios<?php echo e($data['id']); ?>[]" value="<?php echo e($option->option_value); ?>" data-text="<?php echo e($option->option_name); ?>">
                       <span class="outside"><span class="inside"></span></span>
                       <p><?php echo e($option->option_name); ?></p>
                    </label>
                 </div>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>  
        <?php endif; ?>
      <?php if(isset($data['description']) && !empty($data['description'])): ?>
        <div class="t_detail">
          <p><img src="<?php echo e(asset('img/info.png')); ?>"/> <?php echo e($data['description']); ?>  </p>
        </div>
      <?php endif; ?>
     <div class="next_btn" onclick="getNextQuesButton();"><a href="javascript:;">Next &gt;</a></div>
  </div>
</div>
  <?php endif; ?>
<?php else: ?>
<div class="next_btn buttonForOnlyStaticQues" onclick="getOnlyStaticQuestions();"><a href="javascript:;">Please Proceed</a></div>
<?php endif; ?>
<div class="quote_recieve static_ques_1 static_ques" style="display:none">
  <h1>How many quotes you want to receive?</h1>
  <div class="total_quote">
     <ul>
        <li>
           <div class="formcheck">
              <label>
                 <input class="radio-inline" name="radios" value="1" type="radio">
                 <span class="outside"><span class="inside"></span></span>
                 <p>1</p>
              </label>
           </div>
        </li>
        <li>
           <div class="formcheck">
              <label>
                 <input class="radio-inline" name="radios" value="2" type="radio">
                 <span class="outside"><span class="inside"></span></span>
                 <p>2</p>
              </label>
           </div>
        </li>
        <li>
           <div class="formcheck">
              <label>
                 <input class="radio-inline" name="radios" value="3" type="radio">
                 <span class="outside"><span class="inside"></span></span>
                 <p>3</p>
              </label>
           </div>
        </li>
        <li>
           <div class="formcheck">
              <label>
                 <input class="radio-inline" name="radios" value="4" type="radio">
                 <span class="outside"><span class="inside"></span></span>
                 <p>4</p>
              </label>
           </div>
        </li>
        <li>
           <div class="formcheck">
              <label>
                 <input class="radio-inline" name="radios" value="5" type="radio">
                 <span class="outside"><span class="inside"></span></span>
                 <p>5</p>
              </label>
           </div>
        </li>
     </ul>
     <div class="t_detail">
        <p><img src="<?php echo e(asset('img/info.png')); ?>">Choose how many quotes you want to receive.</p>
     </div>
     <div class="q_nex_btns">
        <div class="ele_pre"  data_nxt_id="" onclick="getStaticQuestion(this);"><a href="javascript:;" >&lt; Previous</a></div>
        <div class="ele_next" id="dynamicquote_chk_login" data_nxt_id="static_ques_2" onclick="getStaticQuestionNext(this);"><a href="javascript:;">Next &gt;</a></div>
     </div>
  </div>
</div>
<div class="describe_work static_ques_2 static_ques" style="display:none">
  <h1>Describe your work</h1>
  <p>(0/2000 letters minimum 100)</p>
  <div class="describe_work_sec">
     <div class="des_area">
        <textarea cols="30" class="work_description_modal" name="work_description_text" id="dynamic_description" placeholder="Input description" onkeyup="remove_errmsg(this)"></textarea>
        <span class="fill_fields" role="alert"></span>
     </div>
     <div class="t_detail">
        <p><img src="<?php echo e(asset('img/info.png')); ?>">Please add your work description.</p>
     </div>
     <div class="describe_work_btn">
        <div class="ele_pre" data_nxt_id="static_ques_1" onclick="getStaticQuestion(this);"><a href="javascript:;">&lt; Previous</a></div>
        <div class="ele_next" id="static_ques_descriptionn" data_nxt_id="static_ques_3" onclick="getStaticQuestionNext(this);">
          <a href="javascript:;">Next &gt;</a>
        </div>
     </div>
  </div>
</div>
<div class="registrationform static_ques_3 static_ques" style="display:none">
  <div class="description_optional row">
    
  </div>
  <div class="D_main">
    <h1>Add photos, videos or documents that can help the business understand your needs.</h1>
    <div class="drag_option_main">
      <div class="select_upload">
        <div class="upload_file_section">
          <!-- <div class="drag_file dz-clickable" id="drag_div">
         
            <a href="javascript:;">Drag and drop files here to upload</a>
          </div>
          <span>OR</span> -->
          <div class="file_to_upload gen_quote_img">
            <div class="upload-btn-wrapper">
              <button class="btn">Select files to upload</button>
                <input name="myfile[]" id="dynamic_vid_img" multiple="" class="select_gen_quote_img" accept="image/x-png,image/gif,image/jpeg" type="file">
            <span id="msg" class="genrl_quote_imgs"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="describe_work_btn">
        <div class="ele_pre" data_nxt_id="static_ques_2" onclick="getStaticQuestion(this);"><a href="javascript:;">&lt; Previous</a></div>
        <div class="ele_next" data_nxt_id="static_ques_4" onclick="getStaticQuestionNext(this);"><a href="javascript:;" class="skip_pic_vid" >Skip &gt;</a></div>
     </div>
  </div>
</div>
<div class="not_all_business static_ques_4 static_ques" style="display:none">
  <h1>You can add your phone number to increase answer ratio. Enter your phone number
     to get more offers.
  </h1>
  <div class="ph_detail">
     <div class="form-group ">
        <label for="inputEmail4">Phone number</label>
        <input onkeydown="javascript: return event.keyCode == 69 ? false : true" name="mobile_phone" class="form-control mobl_phn" id="dynamic_mobile_phone" value="<?php if(Auth::guard('general_user')->check() && !empty(Auth::guard('general_user')->user()->phone_number)): ?><?php echo e(Auth::guard('general_user')->user()->phone_number); ?><?php endif; ?>" onkeyup="remove_errmsg(this)" type="number">
        <span class="fill_fields" role="alert"></span>
     </div>
     <div class="all_business_ph">
        <div class="ele_pre" onclick="validate_quote_dynamicandstatic(this)"><a href="javascript:;" class="mobile_validate_submit">Validate</a></div>
        <div class="ele_next" onclick="validate_quote_dynamicandstatic(this)"><a href="javascript:;" class="mobile_dont_want">Don’t want</a></div>
     </div>
     <div class="t_detail">
        <p><img src="<?php echo e(asset('img/info.png')); ?>">Add your phone number.</p>
     </div>
  </div>
</div>
<div class="not_all_business final_ques_thanks static_ques" style="display:none;">
<h1>Your quote request was sent</h1>
<div class="ph_detail">
   <div class="requ_quote_sent">
      <h1>Your request was sent to relevant business. Whenever business wil reply to your quote request you’ll receive a notification.</h1>
      <h1>You can go to quotes page to view your quotes.</h1>
   </div>
   <div class="all_business_ph">
      <div class="ele_pre" ><a href="<?php echo e(url('general_user/quote_questions')); ?>">See quotes</a></div>
      <div class="ele_next" onclick="closdynamicemodal();"><a href="javascript:;">Close</a></div>
   </div>
</div>
</div>