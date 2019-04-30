<?php $__env->startSection('content'); ?>
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
    <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard</a>/<a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>">Advertisement Dashboard</a>/<span class="q_breadcrumb">Top ads</span></div>
    <div class="setup_things adv-add"><a href="javascript:;" data-toggle="modal" data-target="#topad">Add</a></p></div>
    </div>
  </section>
  <section class="advertisment_section">
    <div class="advtisment_main">
      <h1>Click on top ad</h1>
      <h2>Campaigns</h2>
    </div>
    <div class="container pro-module-feature">
      <div class="row">
        <div class="col-12">
          <?php if(!isset($campaigns)): ?>
          <?php if(count($campaigns)<=0): ?>
          <div class="no-data">
            <h2>You don't have any Campaigns yet, please add Campaign</h2>
            <div class="add_c_btn adv-add">
             <a href="javascript:;" data-toggle="modal" data-target="#topad">Add</a>
            </div>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <?php if(isset($campaigns) && (!empty($campaigns)) && (count($campaigns)>0)): ?>
          <div class="campagin_table">

            <table role="table" id="comp_table">
              <thead role="rowgroup">
                <tr role="row" class="table_heading">
                  <th role="columnheader">Name</th>
                  <th role="columnheader">Budget spent</th>
                  <th role="columnheader">Impressions</th>
                  <th role="columnheader">Clicks </th>
                  <th role="columnheader">Status</th>
                  <th role="columnheader">Actions</th>
                </tr>
              </thead>
              <?php $sumofspent = 0; ?>
              <?php if(isset($campaigns) && (!empty($campaigns))): ?>
              <tbody role="rowgroup">

                <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <?php $sumofspent = $sumofspent+$campaign['trans_count']; ?>
                <tr role="row">
                  <td role="cell"><?php echo e($campaign['name']); ?></td>
                  <td data-Name="Budget spent" role="cell"><?php echo e($campaign['trans_count']); ?></td>
                  <td data-Name="Impressions" role="cell"><?php echo e($campaign['impressions_count']); ?></td>
                  <td data-Name="Clicks" role="cell"><?php echo e($campaign['clicks_count']); ?></td>
                  <?php $today = date('Y-m-d'); ?>
                  <?php $todayc = strtotime($today); ?>
                  <?php $end = strtotime($campaign['end_date']); ?>

                  <?php if($campaign['status']==1 ): ?> 
                  <?php $status="running"; ?>
                  <?php elseif($campaign['status']==2 ): ?> 
                  <?php $status="paused"; ?>
                  <?php elseif($campaign['status']==3): ?> 
                  <?php $status="ended"; ?>
                  <?php endif; ?>
                 
                 <?php if($today > $campaign['end_date'] || $campaign['status']==3)
                 {
                    $status="ended";
                  echo '<td data-Name="Status" role="cell" class="ended"><a href="javascript:;">ended</a></td>';
                 }
                 else if($campaign['status']==1)
                 {
                  $status="running";
                  echo '<td data-Name="Status" role="cell" class="running"><a href="javascript:;">running</a></td>';
                 }
                 else if($campaign['status']==2)
                 {
                  $status="paused";
                  echo '<td data-Name="Status" role="cell" class="paused"><a href="javascript:;">paused</a></td>';
                 }
                  
                 ?>
                  
                  <?php if($status=="ended"): ?> 
                  <td data-Name="Actions" class="ended-red"><a href="javascript:;">Ended</a></td>
                  <?php elseif($status=="running" || $status=="paused"): ?> 
                  <td dd="<?php echo e($todayc); ?>" ddd="<?php echo e($end); ?>" data-Name="Actions" class="edit"><a href="<?php echo e(url('/business_user/camp_detail/'.$campaign['id'].'')); ?>">Edit</a></td>

                 
                  <?php endif; ?>
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <?php endif; ?>
              </table>
          </div>
          <div class="capaign_analysis">
            <div class="total-campaign">
              <h1><?php echo e(count($campaigns)); ?> campaigns </h1>
            </div>
            <div class="total-ins">
              <h1><?php echo e($sumofspent); ?> NIS</h1>
            </div>
          </div>
          <?php endif; ?>
          <div class="month-clicks">
            <h1>Clicks</h1>
            <div class="month_view">
              
              <div class="month_main">
                <?php $dateObj   = DateTime::createFromFormat('!m', $currentMonth);?>
                <?php $currentMonth = $dateObj->format('F');?>
                <?php $nextfulldate = date('Y-m-d', strtotime('+1 day', strtotime($fulldate))) ?>
                <?php $prevfulldate = date('Y-m-d', strtotime('-1 day', strtotime($fulldate))) ?>
               
                <a href="javascript:;" onclick="getOtherMonthClicks('<?php echo e($prevfulldate); ?>')"><img src="<?php echo e(asset('img/arrow-left.png')); ?>"/></a>
                <h1>
                  <?php echo e($currentMonth); ?> <?php echo e($currentDay); ?>, <?php echo e($currentYear); ?>

                </h1>
                <a href="javascript:;" onclick="getOtherMonthClicks('<?php echo e($nextfulldate); ?>')"><img src="<?php echo e(asset('img/arrow-right.png')); ?>"/></a>
              </div>
            </div>
            <?php if((count($clicks)<=0)): ?>
            <div class="no-data_month">
                  <h2>No Clicks on this day.</h2>
            </div>
            <?php endif; ?>
                <?php if(isset($clicks) && (!empty($clicks)) && (count($clicks)>0)): ?>
                <div class="campagin_table time-month">
                  <table role="table" id="clicks_table">
                    <thead role="rowgroup">
                      <tr role="row" class="table_heading">
                        <th role="columnheader">Time</th>
                        <th role="columnheader"> Campaign name</th>
                        <th role="columnheader">Category</th>
                        <th role="columnheader"> Search term (if available) </th>
                        <th role="columnheader">Cost</th>
                      </tr>
                    </thead>
                    <?php $sumofcost = 0; ?>
                    <?php if(isset($clicks) && (!empty($clicks))): ?>
                    <tbody role="rowgroup">
                       <?php $__currentLoopData = $clicks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $click): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php $sumofcost = $sumofcost+$click['amount']; ?>
                      <tr role="row">
                        <?php $time = $click['created_at']->format('H:i'); ?>
                        <td data-Name="Time" role="cell"><?php echo e($time); ?></td>
                        <td data-Name="Campaign name" role="cell"><?php echo e($click['camp_det_click']['name']); ?></td>
                        <td data-Name="Category" role="cell"><?php echo e($click['cat_det_click']['category_name']); ?></td>
                        <td data-Name="Search term " role="cell">----</td>
                        <td data-Name="Cost" ><?php echo e($click['amount']); ?> NIS</td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <?php endif; ?>
                    </table>
                </div>

                <div class="clicks_ins">
                  <h1><?php echo e(count($clicks)); ?> clicks </h1>
                <h1><?php echo e($sumofcost); ?> NIS</h1>
                </div>
               <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
        <!-- Modal -->
<div class="modal fade" id="topad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ad_header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(url('business_user/save_campaign')); ?>" id="form_add_topad">
        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
        <div class="modal-body ad-header-body">
            <div class="alert alert-success" role="alert" style="display:none">
            
            </div>
            <div class="alert alert-danger" role="alert" style="display:none">
            
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="inputEmail4">Name</label>
                  <input type="text" class="form-control" id="inputEmail4" required="" name="campname" maxlength="50">
                </div>
            </div>
            <div class="categories-list">

              <label for="inputEmail4">Categories</label>
              <?php if(isset($selectedcats) && !empty($selectedcats)): ?>
              <ul class="categorylist" id="catlist">
                <?php $__currentLoopData = $selectedcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <div class="formcheck forcheckbox langcheck">
                      <label>
                         <input type="checkbox" class="radio-inline" name="selected_cats[]" value="<?php echo e($selectedcat['category_id']); ?>">
                          <span class="outside outside_checkbox"><span class="inside inside_checkbox"></span></span>
                          <p><?php echo e($selectedcat['buser_cat']['category_name']); ?></p>
                      </label>
                  </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="payperclick">Pay per click bid (NIS)</label>
                  <input type="number" class="form-control" id="payperclick" required="" name="payperclick">
                  <span>Suggested bid - 1.3 NIS</span>
                </div>
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="dbudget">Daily budget</label>
                  <input type="number" class="form-control" id="dbudget" required="" name="dbudget">
                  <span>Minimum - 10 NIS</span>
                </div>
            </div>
            <div class="name-field">
              <div class="form-group ">
                  <label for="edate">End date</label>
                  <input type="text" readonly='true' class="form-control" id="edate" required="" name="enddate">
                  
                </div>
            </div>
            <div class="start-btn"><input type="submit" value="Start" id="form_add_topad_submit"></div>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>