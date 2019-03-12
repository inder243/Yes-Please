<?php $__env->startSection('content'); ?>
<input type="hidden" class="hidden_error_msg" data-id="<?php echo e($errors->first('id')); ?>" value="<?php echo e($errors->first('message')); ?>">
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
            <div class="second_header_links">
                <a href="<?php echo e(route('general_user.register')); ?>" class="regidter_tab">Register</a>
                <a href="javascript:;" class="signin_tab">Sign in</a>
                <a href="javascript:;" class="add_budiness">Add business</a>
            </div>
        </div>
    </section>
    <section class="yep_section">
        <div class="yep_section_bg">
            
                        <div class="product_detail">
                            <div class="mian_logo wow zoomInDown" data-wow-duration="1.5s"><img src="<?php echo e(asset('img/yep_color.png')); ?>" /></div>
                            <div class="finance wow flipInX" data-wow-duration="1.5s">
                                <a href="javascript:;" /><span class="fiance_icon"><img src="<?php echo e(asset('img/finance.png')); ?>" class="img-fluid finance_img"/><img src="<?php echo e(asset('img/finance_active.png')); ?>" class="img-fluid finance_active"/> </span><span class="catagory_name">Finance</span></a>
                            </div>
                            <div class="energy">
                                <a href="javascript:;" /><span class="energy_icon"><img src="<?php echo e(asset('img/energy.png')); ?>" class="img-fluid energy_img"/><img src="<?php echo e(asset('img/energy_active.png')); ?>" class="img-fluid energy_active"/> </span><span class="energy_name">Energy</span></a>
                            </div>
                            <div class="travel wow zoomIn" data-wow-duration="1s">
                                <a href="javascript:;" /><span class="travel_icon"><img src="<?php echo e(asset('img/travel.png')); ?>" class="img-fluid travel_img"/><img src="<?php echo e(asset('img/travel_active.png')); ?>" class="img-fluid travel_active"/> </span><span class="travel_name">Travel</span></a>
                            </div>
                            <div class="telco">
                                <a href="javascript:;" /><span class="telco_icon"><img src="<?php echo e(asset('img/telco.png')); ?>" class="img-fluid telco_img"/><img src="<?php echo e(asset('img/telco_active.png')); ?>" class="img-fluid telco_active"/> </span><span class="telco_name">Telco</span></a>
                            </div>
                            <div class="more wow flipInX" data-wow-duration="1.5s">
                                <a href="javascript:;" /><span class="more_icon"><img src="<?php echo e(asset('img/more.png')); ?>" class="img-fluid more_img"/><img src="<?php echo e(asset('img/more_active.png')); ?>" class="img-fluid more_active"/> </span><span class="more_name">More</span></a>
                            </div>
                            <div class="eNews">
                                <a href="javascript:;" /><span class="eNews_icon"><img src="<?php echo e(asset('img/enews.png')); ?>" class="img-fluid eNews_img"/><img src="<?php echo e(asset('img/enews_active.png')); ?>" class="img-fluid eNews_active"/> </span><span class="eNews_name">eNews</span></a>
                            </div>
                            <div class="entertainment wow zoomIn" data-wow-duration="1s">
                                <a href="javascript:;" /><span class="entertainment_icon"><img src="<?php echo e(asset('img/entertainment.png')); ?>" class="img-fluid entertainment_img"/><img src="<?php echo e(asset('img/entertainment_active.png')); ?>" class="img-fluid entertainment_active"/> </span><span class="entertainment_name">Entertain-<br>ment</span></a>
                            </div>
                            <div class="category">
                                <a href="javascript:;" /><span class="category_icon"><img src="<?php echo e(asset('img/category.png')); ?>" class="img-fluid category_img"/><img src="<?php echo e(asset('img/category_active.png')); ?>" class="img-fluid category_active"/> </span><span class="category_name">Category</span></a>
                            </div>
                        </div>
                    </div>
               
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.ypapp_generaluser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>