<?php $__env->startSection('content'); ?>
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard</a>/<a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>">Advertisement Dashboard</a>/<a href="<?php echo e(url('/business_user/advertisement_top_ads')); ?>">Top ads</a> / <span class="q_breadcrumb"><?php if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0]['name'])): ?><?php echo e($campaigns[0]['name']); ?><?php endif; ?></span></div>
      <div class="setup_things test-campign">
        <a href="JavaScript:;" onclick="startCampaign('<?php echo e($campaigns[0]['id']); ?>')"><img src="<?php echo e(asset('img/start.png')); ?>"/>Start</a>
        <a href="JavaScript:;" onclick="endCampaign('<?php echo e($campaigns[0]['id']); ?>')"><img src="<?php echo e(asset('img/find.png')); ?>"/>End</a>
        <a href="JavaScript:;"  onclick="pauseCampaign('<?php echo e($campaigns[0]['id']); ?>')" class="pause_btn"><img src="<?php echo e(asset('img/pause.png')); ?>"/>Pause</a></div>
      </div>
  </section>
  <section class="advertisment_section">
        <div class="advtisment_main">
          <h1><?php if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0]['name'])): ?><?php echo e($campaigns[0]['name']); ?><?php endif; ?></h1>
        </div>
        <div class="container pro-module-feature">
          <div class="row">
            <div class="col-12">
              <div class="campagin_table">
                <table role="table">
                  <thead role="rowgroup">
                    <tr role="row" class="table_heading">
                      <th role="columnheader">Status</th>
                      <th role="columnheader">Budget spent</th>
                      <th role="columnheader">Impressions</th>
                      <th role="columnheader">Clicks </th>
                      <th role="columnheader">Start date</th>
                      <th role="columnheader">End date </th>
                      <th role="columnheader">PPC bid</th>
                      <th role="columnheader">Daily budget</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <?php if(isset($campaigns) && !empty($campaigns) && !empty($campaigns[0])): ?>
                    <tr role="row">
                      <?php if($campaigns[0]['status']==1): ?>
                      <?php $sts = "running"; ?> 
                      <?php elseif($campaigns[0]['status']==2): ?>
                      <?php $sts = "paused"; ?> 
                      <?php else: ?> 
                      <?php $sts = "ended"; ?> 
                      <?php endif; ?>
                      <?php $time = $campaigns[0]['created_at']->format('Y-m-d'); ?>
                      <td data-Name="Status" role="cell"><?php echo e($sts); ?></td>
                      <td data-Name="Budget spent" role="cell"><?php echo e($campaigns[0]['trans_count']); ?></td>
                      <td data-Name="Impressions" role="cell"><?php echo e($campaigns[0]['impressions_count']); ?></td>
                      <td data-Name="Clicks" role="cell"><?php echo e($campaigns[0]['clicks_count']); ?></td>
                      <td data-Name="Start date" role="cell"><?php echo e($time); ?></td>
                      <td data-Name="End date" ><?php echo e($campaigns[0]['end_date']); ?></td>
                      <td data-Name="PPC bid"><?php echo e($campaigns[0]['pay_per_click']); ?></td>
                      <td data-Name="Daily budget" ><?php echo e($campaigns[0]['daily_budget']); ?></td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                  </table>
              </div>
              <div class="capaign_analysis">

              </div>
              <div class="month-clicks">
                <h1>Clicks</h1>

                    <div class="campagin_table time-month">
                      <table role="table" id="single_click_table">
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
                        <?php if(isset($clicks) && (!empty($clicks)) && (count($clicks)>0)): ?>
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
                  <input type="text" class="form-control" id="inputEmail4" required="" name="campname">
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
                  <input type="text" class="form-control" id="edate" required="" name="enddate">
                  
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