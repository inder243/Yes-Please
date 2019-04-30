<?php $__env->startSection('content'); ?>

<section class="register_step_1">
  <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
  <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>">Advertisement</a>/<span class="q_breadcrumb">Edit budget</span></div>
  <div class="setup_things"><a href="javascript:;">How to set things up?</a></p></div>
  </div>
</section>

<section class="advertisment_section">
  <div class="advtisment_main">
    <h1>Edit budget</h1>
  </div>
  <div class="container pro-module-feature">
    <div class="row">
      
        <div class="edit_budget_main">
          <form method="POST" id="edit_budget_form" action="<?php echo e(route('business_user.editBudget')); ?>">
          <div class="pro_mode_setting">
            <div class="mode_setting_main">
              <p>Pro mode settings</p>
              <?php if(Session::has('error_message')): ?>
              <div class="pro_mode_error">
                <p><?php echo e(Session::get('error_message')); ?></p>
              </div>
               <?php endif; ?>
              <?php if(Session::has('success_message')): ?>
              <div class="pro_mode_success">
                <p><?php echo e(Session::get('success_message')); ?></p>
              </div>
              <?php endif; ?>
              <div class="mode_settings">
                <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                <div class="row">
                  <div class="col-md-3 col-12">
                    <div class="mode_setting_heading">
                     <?php if(isset($getSelectedCats) && !empty($getSelectedCats)): ?>
                        <ul>
                          <li></li>
                          <?php $__currentLoopData = $getSelectedCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSelectedCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><h1><?php echo e($getSelectedCat['buser_cat']['category_name']); ?></h1></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="quote_ph_no">
                       <ul>
                        <li>
                          <h1>Quote with phone number <img src="<?php echo e(asset('img/info.png')); ?>"/></h1>
                          <p>(bid in ILS)</p>
                        </li>
                        <?php if(isset($getSelectedCats) && !empty($getSelectedCats)): ?>
                          <?php $__currentLoopData = $getSelectedCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSelectedCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="home_imp_list">
                            <h1><?php echo e($getSelectedCat['buser_cat']['category_name']); ?></h1>
                            <div class="text-input">
                            <input type="number" value="<?php if($getSelectedCat['quote_with_ph']!=0): ?><?php echo e($getSelectedCat['quote_with_ph']); ?><?php else: ?><?php echo e($getSelectedCat['buser_cat']['quote_with_ph']); ?><?php endif; ?>" name="<?php echo e($getSelectedCat['category_id']); ?>[]" required>
                            <span>5 NIS minimum</span>
                            </div>
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="quote_ph_no">
                      <ul>
                        <li>
                          <h1>Quote without phone number <img src="<?php echo e(asset('img/info.png')); ?>"/></h1>
                          <p>(bid in ILS)</p>
                        </li>
                        <?php if(isset($getSelectedCats) && !empty($getSelectedCats)): ?>
                          <?php $__currentLoopData = $getSelectedCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSelectedCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="home_imp_list">
                            <h1><?php echo e($getSelectedCat['buser_cat']['category_name']); ?></h1>
                            <div class="text-input">
                            <input type="number" value="<?php if($getSelectedCat['quote_without_ph']!=0): ?><?php echo e($getSelectedCat['quote_without_ph']); ?><?php else: ?><?php echo e($getSelectedCat['buser_cat']['quote_without_ph']); ?><?php endif; ?>" name="<?php echo e($getSelectedCat['category_id']); ?>[]" required>
                            <span>1 NIS minimum</span>
                          </div>
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="accept_every_no">
                     <ul>
                      <li>
                        <h1>Accept every <br>quote request <img src="<?php echo e(asset('img/info.png')); ?>"/></h1>
                      </li>
                       <?php if(isset($getSelectedCats) && !empty($getSelectedCats)): ?>
                        <?php $__currentLoopData = $getSelectedCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getSelectedCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="home_imp_list1">
                            <h1><?php echo e($getSelectedCat['buser_cat']['category_name']); ?></h1>
                            <div class="text-input">
                              <div class="text-input">
                                <div class="formcheck forcheckbox">
                                  <label>
                                    <input type="checkbox" class="radio-inline" name="<?php echo e($getSelectedCat['category_id']); ?>[]" <?php if($getSelectedCat['accept_request']==1): ?>checked value="<?php echo e($getSelectedCat['accept_request']); ?>" <?php endif; ?>>
                                    <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                                 </label>
                                </div>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="income_call_bid">
              <div class="row">
                <div class="col-md-3 col-6">
                  <ul class="call_bid">
                    <li><h1> Incoming call bid <img src="<?php echo e(asset('img/info.png')); ?>"></h1></li>
                  </ul>
                </div>
                <div class="col-md-3 col-6">
                  <ul class="call_bid_input">
                    <li><input type="text">
                        <span>1 NIS minimum</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="income_call_budget">
              <div class="row">
                <div class="col-md-3 col-6">
                  <ul class="call_bid">
                    <li><h1> Maximum monthly budget<img src="<?php echo e(asset('img/info.png')); ?>"></h1></li>
                  </ul>
                </div>
                <div class="col-md-3 col-6">
                  <ul class="call_bid_input">
                    <li>
                      <input type="number" id="monthly_budget" name="monthly_budget" value="<?php if(isset($monthlyBudget['wallet_amount']) && !empty($monthlyBudget['wallet_amount'])): ?><?php echo e($monthlyBudget['wallet_amount']); ?><?php endif; ?>" required>
                    </li>
                  </ul>
                </div>
                <div class="col-12">
                  <div class="monthly-des">
                    <p>Your account will be charged with the amount you bid according to this table. You can change these bids any time using your advertisment dashboard. You can set montly maximum once reached your account will switched to free mode until new month begin. Your will be charged in minimum of 39 NIS even if your interactions is less then this amount.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="edit_details_main">


        <div class="edit-switch_pro">
          <input type="submit" value="Save">
        </div>
        </div>
        </form>
        </div>
    
    </div>
  </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>