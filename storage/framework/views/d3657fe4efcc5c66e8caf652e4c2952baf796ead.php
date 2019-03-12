<?php $__env->startSection('content'); ?>
<?php $userDetails =  $userDetails[0]; ?>
<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span>Registration</span></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="registration_main">
          <h1>Registration</h1>
          <div class="registration_steps">
            <ul>
              <li><span class="completed">1</span></li>
              <li><span class="completed">2</span></li>
              <li><span class="completed">3</span></li>
              <li><span class="completed">4</span></li>
              <li><span class="activespan">5</span></li>
              <li><span>6</span></li>
              <li><span>7</span></li>
            </ul>
          </div>
          <form method="POST" class="dropzone" id="my-awesome-dropzone" action="<?php echo e(url('/business_user/register_five/'.$id)); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?> 
            <div class="registration_filed">
                <h1>Business profile</h1>
                <p>Tell your clients about your business, you can also do it by uploading photos/videos</p>
                <div class="registrationform">
                  <div class="description_optional row">
                    <div class="form-group col-md-12 col-12">
                        <label for="inputEmail4">Description (optional)</label>
                        <textarea name="descripton"><?php if(isset($userDetails['business_profile'])){ echo $userDetails['business_profile']; } ?></textarea>
                    </div>
                  </div>
                  <div class="add_photo_video">
                    <p>Add photos / Videos (optional)</p>
                    <div class="upload_file_section">
                      <div class="drag_file" id="myId">  
                      <input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" />
                      <a href="javascript:;">Drag and drop files here to upload</a>
                      </div>

                      <span>OR</span>
                      <div class="file_to_upload">
                        <div class="upload-btn-wrapper">                        
                        <button class="btn">Select files to upload</button>
                        <input type="file" name="myfile[]" class="select_reg_img" multiple accept="image/x-png,image/gif,image/jpeg"/>
                        <span id="msg" class="reg_img_msg"></span>
                      </div>
                      </div>

                    </div>
                  </div>
                  <!-- <label href="javascript:;" for="multiple_file">Drag and drop files here to upload</label> -->
                  <!-- <div class="dropZoneContainer">
                          <input type="file" id="drop_zone" class="FileUpload" accept=".jpg,.png,.gif" onchange="handleFileSelect(this) " />
                          <div class="dropZoneOverlay">Drag and drop your image <br />or<br />Click to add</div>
                      </div> -->
                  <div class="ques_ans pt-4">
                    <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <div class="formcheck forcheckbox">
                                  <label>
                                    <?php if(isset($userDetails['send_question']) && $userDetails['send_question'] == 1){ 
                                        $checked = 'checked';
                                    }else{
                                        $checked = '';
                                    }
                                    ?>
                                    <input type="checkbox" class="radio-inline" name="send_question" value="" <?php echo e($checked); ?> >
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                    <p>Send me questions to answer</p><img class="info" src="<?php echo e(asset('img/ing.png')); ?>" title="Check this checkbox if you want to send question.">
                                  </label>
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <div class="formcheck forcheckbox">
                              <label>
                                <?php if(isset($userDetails['send_schedule']) && $userDetails['send_schedule'] == 1){ 
                                        $checked = 'checked';
                                    }else{
                                        $checked = '';
                                    }
                                ?>
                                <input type="checkbox" class="radio-inline" name="send_schedule" value="" <?php echo e($checked); ?>>
                                <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                <p> Send me schedule requests</p><img class="info" src="<?php echo e(asset('img/ing.png')); ?>" title="Check this checkbox if you want to send schedule requests.">
                              </label>
                          </div>
                        </div>
                      </div>
                  </div>
                  <span class="fill_fields text-center" role="alert"></span>
                </div>

                <div class="next_back_button">
                  <div class="back"><a href="<?php echo e(url('/business_user/register_four/'.$id)); ?>">< Back</a></div>
                 <!--  <div class="next"><a href="<?php echo e(url('/business_user/register_six/'.$id)); ?>">Skip</a></div> -->
                  <div class="next"><input type="submit" class="business_step_5_submit" id="next_submit" value="Next >"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</section>
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.ypapp_inner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>