<?php $__env->startSection('content'); ?>
<?php $home_url = URL::to('/'); 
//echo '<pre>';print_r($categories);die;
?>
<input type="hidden" id="home_url" value="<?=$home_url;?>" />
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="yes_please_logo wow swing" data-wow-duration="1.5s">
                        <img src="<?php echo e(asset('img/logo.png')); ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="search-section">
            <div class="yesplease_search-section">
                <h1 class="wow fadeInUp" data-wow-duration=".5s">הבוט העצהמ ליחתמ לכה</h1>
                <div class="search-input wow fadeInUp" data-wow-duration="1s">
                    <input type="search" placeholder="Search...">
                    <span>in Tel Aviv</span>
                    <img src="<?php echo e(asset('img/search.png')); ?>" class="img-fluid">
                </div>
            </div>

        </div>
        <div class="small_icons wow fadeIn" data-wow-duration="2s"><img src="<?php echo e(asset('img/banner_icon.jpg')); ?>" class="img-fluid"></div>
        <div class="bannerlogo wow zoomIn" data-wow-duration=".5s"><img src="<?php echo e(asset('img/banner-logo.png')); ?>" class="img-fluid"></div>
        <div class="down_errow bounce">
            <a href="javascript:;" id="button"><img src="<?php echo e(asset('img/down.png')); ?>"></a>
        </div>
    </section>

    <section class="second_tabbar">
        <div class="second_header">
            <div class="menu_search">
                <div class="second_menu">
                    <a href="javascript:;" onclick="openNav()"><img src="<?php echo e(asset('img/menu.png')); ?>" / class="img-fluid"></a>
                </div>
                <div class="search-input1">
                    <input type="search" placeholder="Search...">
                    <span>in Tel Aviv</span>
                    <img src="<?php echo e(asset('img/search.png')); ?>" class="img-fluid">
                </div>
            </div>
            <div class="second_header_logo wow zoomIn" data-wow-duration="1s"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>" class="img-fluid" /></a></div>
             <div class="second_header_links for_main_page_header_link">

                <?php if(Auth::guard('general_user')->check()): ?>
                <!-- <p><?php echo e(Auth::guard('general_user')->user()->first_name); ?> <?php echo e(Auth::guard('general_user')->user()->last_name); ?></p> -->
                <?php elseif(Auth::guard('business_user')->check()): ?>
               <!--  <p><?php echo e(Auth::guard('business_user')->user()->first_name); ?> <?php echo e(Auth::guard('business_user')->user()->last_name); ?></p> -->
                <?php else: ?>
                <a href="javascript:;" data-toggle="modal" data-target="#login_business" data-backdrop="static" data-keyboard="false" class="signin_tab for_business_tab for_min_pagebusiness">Business</a>
                <a href="javascript:;" data-toggle="modal" data-target="#general_login" data-backdrop="static" data-keyboard="false" class="add_budiness for_min_user">Users</a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="yep_section">
        <div class="yep_section_bg">

          <a href="javascript:;" class="back_to_super" /></span><span class="more_name"><< Back</span></a>

            <div class="product_detail" data-skip="7">
                <div class="mian_logo wow zoomInDown" data-wow-duration="1.5s"><img src="<?php echo e(asset('img/yep_color.png')); ?>" /></div>
                <?php if(isset($categories[0])): ?>
                <div class="finance wow flipInX super_cat_icon" data-id="<?php echo e($categories[0]['super_cat_id']); ?>" data-wow-duration="1.5s">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[0]['cat_name']); ?>" data-original-title="<?php echo e($categories[0]['cat_name']); ?>"/><span class="fiance_icon"><img src="<?php echo e(asset('img/finance.png')); ?>" class="img-fluid finance_img"/><img src="<?php echo e(asset('img/finance_active.png')); ?>" class="img-fluid finance_active"/> </span><span class="catagory_name cat_text"><?php echo e($categories[0]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[1])): ?>
                <div class="energy super_cat_icon" data-id="<?php echo e($categories[1]['super_cat_id']); ?>">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[1]['cat_name']); ?>" data-original-title="<?php echo e($categories[1]['cat_name']); ?>"/><span class="energy_icon"><img src="<?php echo e(asset('img/energy.png')); ?>" class="img-fluid energy_img"/><img src="<?php echo e(asset('img/energy_active.png')); ?>" class="img-fluid energy_active"/> </span><span class="energy_name cat_text"><?php echo e($categories[1]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[2])): ?>
                <div class="travel wow zoomIn super_cat_icon" data-id="<?php echo e($categories[2]['super_cat_id']); ?>" data-wow-duration="1s">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[2]['cat_name']); ?>" data-original-title="<?php echo e($categories[2]['cat_name']); ?>" /><span class="travel_icon"><img src="<?php echo e(asset('img/travel.png')); ?>" class="img-fluid travel_img"/><img src="<?php echo e(asset('img/travel_active.png')); ?>" class="img-fluid travel_active"/> </span><span class="travel_name cat_text"><?php echo e($categories[2]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[3])): ?>
                <div class="telco super_cat_icon" data-id="<?php echo e($categories[3]['super_cat_id']); ?>">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[3]['cat_name']); ?>" data-original-title="<?php echo e($categories[3]['cat_name']); ?>" /><span class="telco_icon"><img src="<?php echo e(asset('img/telco.png')); ?>" class="img-fluid telco_img"/><img src="<?php echo e(asset('img/telco_active.png')); ?>" class="img-fluid telco_active"/> </span><span class="telco_name cat_text"><?php echo e($categories[3]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(count($categories) >= 7): ?>
                <div class="more wow flipInX" data-wow-duration="1.5s">
                    <a href="javascript:;" /><span class="more_icon"><img src="<?php echo e(asset('img/more.png')); ?>" class="img-fluid more_img"/><img src="<?php echo e(asset('img/more_active.png')); ?>" class="img-fluid more_active"/> </span><span class="more_name">More</span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[4])): ?>
                <div class="eNews super_cat_icon" data-id="<?php echo e($categories[4]['super_cat_id']); ?>">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[4]['cat_name']); ?>" data-original-title="<?php echo e($categories[4]['cat_name']); ?>" /><span class="eNews_icon"><img src="<?php echo e(asset('img/enews.png')); ?>" class="img-fluid eNews_img"/><img src="<?php echo e(asset('img/enews_active.png')); ?>" class="img-fluid eNews_active"/> </span><span class="eNews_name cat_text"><?php echo e($categories[4]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[5])): ?>
                <div class="entertainment wow zoomIn super_cat_icon" data-id="<?php echo e($categories[5]['super_cat_id']); ?>" data-wow-duration="1s">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[5]['cat_name']); ?>" data-original-title="<?php echo e($categories[5]['cat_name']); ?>" /><span class="entertainment_icon"><img src="<?php echo e(asset('img/entertainment.png')); ?>" class="img-fluid entertainment_img"/><img src="<?php echo e(asset('img/entertainment_active.png')); ?>" class="img-fluid entertainment_active"/> </span><span class="entertainment_name cat_text"><?php echo e($categories[5]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
                <?php if(isset($categories[6])): ?>
                <div class="category super_cat_icon" data-id="<?php echo e($categories[6]['super_cat_id']); ?>">
                    <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="<?php echo e($categories[6]['cat_name']); ?>" data-original-title="<?php echo e($categories[6]['cat_name']); ?>" /><span class="category_icon"><img src="<?php echo e(asset('img/category.png')); ?>" class="img-fluid category_img"/><img src="<?php echo e(asset('img/category_active.png')); ?>" class="img-fluid category_active"/> </span><span class="category_name cat_text"><?php echo e($categories[6]['cat_name']); ?></span></a>
                </div>
                <?php endif; ?>
            </div>

            <div class="product_detail categories_ajax" style="display: none;" data-skip="7">
                <div class="mian_logo wow zoomInDown" data-wow-duration="1.5s"><img src="<?php echo e(asset('img/yep_color.png')); ?>" /></div>
                <div class="finance wow flipInX" data-wow-duration="1.5s">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="fiance_icon"><img src="<?php echo e(asset('img/finance.png')); ?>" class="img-fluid finance_img"/><img src="<?php echo e(asset('img/finance_active.png')); ?>" class="img-fluid finance_active"/> </span><span class="catagory_name cat_text"></span></a>
                </div>
                <div class="energy">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="energy_icon"><img src="<?php echo e(asset('img/energy.png')); ?>" class="img-fluid energy_img"/><img src="<?php echo e(asset('img/energy_active.png')); ?>" class="img-fluid energy_active"/> </span><span class="energy_name cat_text"></span></a>
                </div>
                <div class="travel wow zoomIn" data-wow-duration="1s">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="travel_icon"><img src="<?php echo e(asset('img/travel.png')); ?>" class="img-fluid travel_img"/><img src="<?php echo e(asset('img/travel_active.png')); ?>" class="img-fluid travel_active"/> </span><span class="travel_name cat_text"></span></a>
                </div>
                <div class="telco">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="telco_icon"><img src="<?php echo e(asset('img/telco.png')); ?>" class="img-fluid telco_img"/><img src="<?php echo e(asset('img/telco_active.png')); ?>" class="img-fluid telco_active"/> </span><span class="telco_name cat_text"></span></a>
                </div>
                <div class="cat_more wow flipInX" style="display:none" data-wow-duration="1.5s">
                    <a href="javascript:;" /><span class="more_icon"><img src="<?php echo e(asset('img/more.png')); ?>" class="img-fluid more_img"/><img src="<?php echo e(asset('img/more_active.png')); ?>" class="img-fluid more_active"/> </span><span class="more_name">More</span></a>
                </div>
                <div class="eNews">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="eNews_icon"><img src="<?php echo e(asset('img/enews.png')); ?>" class="img-fluid eNews_img"/><img src="<?php echo e(asset('img/enews_active.png')); ?>" class="img-fluid eNews_active"/> </span><span class="eNews_name cat_text"></span></a>
                </div>
                <div class="entertainment wow zoomIn" data-wow-duration="1s">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="entertainment_icon"><img src="<?php echo e(asset('img/entertainment.png')); ?>" class="img-fluid entertainment_img"/><img src="<?php echo e(asset('img/entertainment_active.png')); ?>" class="img-fluid entertainment_active"/> </span><span class="entertainment_name cat_text"></span></a>
                </div>
                <div class="category">
                    <a href="" data-toggle="tooltip" data-placement="top" /><span class="category_icon"><img src="<?php echo e(asset('img/category.png')); ?>" class="img-fluid category_img"/><img src="<?php echo e(asset('img/category_active.png')); ?>" class="img-fluid category_active"/> </span><span class="category_name cat_text"></span></a>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ypapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>