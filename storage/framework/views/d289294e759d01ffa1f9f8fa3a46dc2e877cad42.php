<?php $home_url = URL::to('/'); ?>
<div class="mian_logo wow zoomInDown" data-wow-duration="1.5s"><img src="<?php echo e(asset('img/yep_color.png')); ?>" /></div>
<div class="finance wow flipInX" data-wow-duration="1.5s">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[0]['id'];?>" /><span class="fiance_icon"><img src="<?php echo e(asset('img/finance.png')); ?>" class="img-fluid finance_img"/><img src="<?php echo e(asset('img/finance_active.png')); ?>" class="img-fluid finance_active"/> </span><span class="catagory_name"><?php echo e($categories[0]['category_name']); ?></span></a>
</div>
<div class="energy">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[1]['id'];?>" /><span class="energy_icon"><img src="<?php echo e(asset('img/energy.png')); ?>" class="img-fluid energy_img"/><img src="<?php echo e(asset('img/energy_active.png')); ?>" class="img-fluid energy_active"/> </span><span class="energy_name"><?php echo e($categories[1]['category_name']); ?></span></a>
</div>
<div class="travel wow zoomIn" data-wow-duration="1s">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[2]['id'];?>" /><span class="travel_icon"><img src="<?php echo e(asset('img/travel.png')); ?>" class="img-fluid travel_img"/><img src="<?php echo e(asset('img/travel_active.png')); ?>" class="img-fluid travel_active"/> </span><span class="travel_name"><?php echo e($categories[2]['category_name']); ?></span></a>
</div>               

<div class="telco">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[3]['id'];?>" /><span class="telco_icon"><img src="<?php echo e(asset('img/telco.png')); ?>" class="img-fluid telco_img"/><img src="<?php echo e(asset('img/telco_active.png')); ?>" class="img-fluid telco_active"/> </span><span class="telco_name"><?php echo e($categories[3]['category_name']); ?></span></a>
</div>
<div class="more wow flipInX" data-wow-duration="1.5s">
    <a href="javascript:;" /><span class="more_icon"><img src="<?php echo e(asset('img/more.png')); ?>" class="img-fluid more_img"/><img src="<?php echo e(asset('img/more_active.png')); ?>" class="img-fluid more_active"/> </span><span class="more_name">More</span></a>
</div>
<div class="eNews">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[4]['id'];?>" /><span class="eNews_icon"><img src="<?php echo e(asset('img/enews.png')); ?>" class="img-fluid eNews_img"/><img src="<?php echo e(asset('img/enews_active.png')); ?>" class="img-fluid eNews_active"/> </span><span class="eNews_name"><?php echo e($categories[4]['category_name']); ?></span></a>
</div>
<div class="entertainment wow zoomIn" data-wow-duration="1s">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[5]['id'];?>" /><span class="entertainment_icon"><img src="<?php echo e(asset('img/entertainment.png')); ?>" class="img-fluid entertainment_img"/><img src="<?php echo e(asset('img/entertainment_active.png')); ?>" class="img-fluid entertainment_active"/> </span><span class="entertainment_name"><?php echo e($categories[5]['category_name']); ?></span></a>
</div>
<div class="category">
    <a href="<?=$home_url;?>/general_user/dashboard/catid/<?=$categories[6]['id'];?>" /><span class="category_icon"><img src="<?php echo e(asset('img/category.png')); ?>" class="img-fluid category_img"/><img src="<?php echo e(asset('img/category_active.png')); ?>" class="img-fluid category_active"/> </span><span class="category_name"><?php echo e($categories[6]['category_name']); ?></span></a>
</div>