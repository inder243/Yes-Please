<?php $__env->startSection('content'); ?>

<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Dashboard </a>/<span class="q_breadcrumb">Verification</span></div>
</section>

<section>
  <div class="quote_req_main">
    <h1>Verification</h1>
    <form method="POST" class="dropzone" id="dropzone_form" data-page="verifyuser" action="<?php echo e(url('/business_user/verify')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <p class="verification_sub">Your business is not verified yet</p>
    <div class="verfication_pts">
      <h1>Why to verify?</h1>
      <ul>
        <li><b>1.</b>When verified you'll have a verified badge on business list. <img src="<?php echo e(asset('img/info.png')); ?>"/></li>
        <li><b>2.</b> When verified your listing will be avobe any other unverified business.</li>
        <li><b>3.</b>When verified you give your customers a sense of security and therfor gain more customers.</li>
      </ul>
    </div>
  <div class="verfication_pts">
    <h1>How to verify?</h1>
    <ul>
      <li><b>1.</b>Simply upload business certification you have which includes your business id on it. You can and should upload more then one document if you have.</li>
      <li><b>2.</b> Once verified by our team you will recive the verified badge.</li>
    </ul>
  </div>
  <div class="profile_section_main">
    <div class="ph_video">
      <div class="registrationform">
        <div class="description_optional row">
          
        </div>
      <div class="add_photo_video">
        <p>Add photos / Videos (optional)</p>
        <div class="upload_file_section">
          <div class="drag_file" id="drag_div">
            <div class="fallback">
              <input name="file" class="disp_none" type="file" multiple style="width:1px;border:0px" /></div>
            <a href="javascript:;">DRAG AND DROP FILES HERE TO UPLOAD</a>
          </div>
          <span>OR</span>
          <div class="file_to_upload">
            <div class="upload-btn-wrapper">
              <button class="btn">Select files to upload</button>
              <input type="file" name="myfile[]" multiple class="select_verify_img" accept="image/x-png,image/gif,image/jpeg"/>

                <span id="msg"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="businessid">
      <div class="form-group col-md-12 col-12">
        <label for="inputEmail4">Business ID</label>
        <input type="text" class="form-control" id="inputEmail4" required="" placeholder="" name="businessid">
      </div>
      <div class="verify-btn">
        <a href="javascript:;"><input type="submit" class="verify_submit" id="verify-submit" value="Verify"></a>
      </div>
    </div>
  </div>
  </form>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>