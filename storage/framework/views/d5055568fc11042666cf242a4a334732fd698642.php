<?php $__env->startSection('content'); ?>

 <section class="register_step_1">
   <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
     <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard</a>/<span class="q_breadcrumb">Advertisement</span></div>
   </div>
</section>
<section class="advertisment_section">
  <div class="advtisment_main">
    <h1>Advertisement</h1>
    <p>You will be able to view how the business rated and reviewed you after both of you will submit your reviews.</p>
  </div>
  <div class="advertisement_mode">
    <div class="row">
      <div class="col-md-6 col-6 p-r">
        <div class="pro_mode">
          <div class="pro_mode_heading">
            <h1>PRO mode</h1>
          </div>
          <div class="pro_mode_list">
            <ul>
              <li><h1>Listing on top of free</h1></li>
              <li>
                <h1>Listing on top of free</h1>
                <p>using budget</p>
              </li>
              <li>
                <h1>Get quotes top priority</h1>
                <p>using budget</p>
              </li>
              <li>
                <h1>Publish photos</h1>
              </li>
              <li>
                <h1>Send newsletters</h1>
              </li>
              <li>
                <h1>Call logs</h1>
              </li>
              <li>
                <h1>Promote to top</h1>
                <p>using budget</p>
              </li>
              <li>
                <h1>Promote pricelist</h1>

              </li>
              <li>
                <h1>Promote products</h1>
                <p>using budget</p>
              </li>
            </ul>
            <div class="switch_top"><a href="<?php echo e(url('/business_user/advertisement_pro_mode')); ?>">Switch to pro</a></div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-6 p-l">
        <div class="free_mode">
          <div class="free_mode_heading">
            <h1>FREE mode</h1>
          </div>
          <div class="pro_mode_list">
            <ul>
              <li><h1>Listing below ads</h1></li>
              <li class="for_li_ht">
                <h1>Get calls low priority</h1>
              </li>
              <li class="for_li_ht">
                <h1>Get quotes low priority</h1>

              </li>
              <li>
                <h1>-</h1>
              </li>
              <li>
                <h1>-</h1>
              </li>
              <li>
                <h1>-</h1>
              </li>
              <li class="for_li_ht">
                <h1>-</h1>

              </li>
              <li>
                <h1>-</h1>

              </li>
              <li class="for_li_ht">
                <h1>-</h1>

              </li>
            </ul>
            <div class="switch_top">
              <p>Your are in free mode now</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>