<?php $__env->startSection('content'); ?>
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
              <li><span class="completed">5</span></li>
              <li><span class="activespan">6</span></li>
              <li><span>7</span></li>
            </ul>
          </div>
          <form method="POST" class="dropzone" id="my-awesome-dropzone" action="<?php echo e(url('/business_user/register_six/'.$id)); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?> 
            <div class="registration_filed">
              <h1>Business features</h1>
              <p>Select relevant hashtags about your business</p>
              <div class="registrationform">
                <div class="relevent_hastag pt-3 pb-4">
                  <div class="row">
                    <?php if(!empty($hashtags)): ?>
                      <?php $__currentLoopData = $hashtags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hashtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($hashtag['id'], $YpUserHashtags)){
                            $checked = 'checked'; 
                        }else{
                          $checked = '';
                        } ?>
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
                </div>
              </div>
            </div>

              <div class="next_back_button">
                <div class="back"><a href="<?php echo e(url('/business_user/register_five/'.$id)); ?>">< Back</a></div>
                    <div class="next"><input type="submit" id="next_submit" value="Next >"></div>
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