
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


