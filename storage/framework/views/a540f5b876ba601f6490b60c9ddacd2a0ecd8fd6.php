  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<span class="q_breadcrumb">Advertisement</span></div>
      <div class="edit_budgets">
      <h1> <?php if(isset($monthlyBudget['updated_wallet_amount'])): ?><?php echo e($monthlyBudget['updated_wallet_amount']); ?><?php endif; ?> NIS left</h1>
      <a href="javascript:;">Edit budget</a>
      </div>
    </div>
  </section>
  <section class="dashboard_grid">
    <div class="container-fluid">
      <div class="dashboard_section">
        <h1>Advertisement</h1>
        <div class="month_view">
          <div class="month_main">
            <?php $dateObj   = DateTime::createFromFormat('!m', $monthlyBudget['m']);?>
            <?php $currentMonth = $dateObj->format('F');?>
            <?php $year = $monthlyBudget['y']; ?>
            <?php $fulldate = $monthlyBudget['y'].'-'.$monthlyBudget['m']; ?>
            <?php $nextMonthTs = strtotime($fulldate.' +1 month');?>
            <?php $prevMonthTs = strtotime($fulldate.' -1 month');?>
            <?php $nextMonth = date('m', $nextMonthTs);?>
            <?php $prevMonth = date('m', $prevMonthTs);?>
            <?php $nextYear = date('Y', $nextMonthTs);?>
            <?php $prevYear = date('Y', $prevMonthTs);?>
            <a href="javascript:;" onclick="getOtherMonthData('<?php echo e($prevMonth); ?>','<?php echo e($prevYear); ?>')"><img src="<?php echo e(asset('img/arrow-left.png')); ?>"/></a>
              <h1>
                <?php echo e($currentMonth); ?> <?php echo e($year); ?>

            </h1>
            <a href="javascript:;" onclick="getOtherMonthData('<?php echo e($nextMonth); ?>','<?php echo e($nextYear); ?>')"><img src="<?php echo e(asset('img/arrow-right.png')); ?>"/></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-6 padding_rt">
              <div class="dashboard_box">
                
                <a href="<?php echo e(url('/business_user/quotes_questions?month='.$monthlyBudget['month'].'&type=1')); ?>" class="quote_requestbg">
                  <div class="box_heading">
                    <h2>Quotes requests</h2>
                    <h1>Quotes requests</h1>
                    <p>with phone</p>
                  </div>
                  <div class="total_number">
                    <h1><?php if(isset($monthlyBudget['countOfBidWithPh'])): ?><?php echo e($monthlyBudget['countOfBidWithPh']); ?><?php endif; ?></h1>
                  </div>
                  <div class="Qlink-nis"><p><?php if(isset($monthlyBudget['sumOfbidWithPh'])): ?><?php echo e($monthlyBudget['sumOfbidWithPh']); ?><?php endif; ?> NIS</p></div>
                  <div class="quote_req_img"><img src="<?php echo e(asset('img/quote_req.png')); ?>"/></div>
               </a>
              </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
              <a href="<?php echo e(url('/business_user/quotes_questions?month='.$monthlyBudget['month'].'&type=2')); ?>" class="question_waiting_bg">
                <div class="box_heading">
                  <h2>Quotes requests</h2>
                  <h1>Quotes requests</h1>
                  <p>without phone</p>
                </div>
                <div class="total_number">
                  <h1><?php if(isset($monthlyBudget['countOfBidWithoutPh'])): ?><?php echo e($monthlyBudget['countOfBidWithoutPh']); ?><?php endif; ?></h1>
                </div>
                <div class="Qlink-nis"><p><?php if(isset($monthlyBudget['sumOfbidWithoutPh'])): ?><?php echo e($monthlyBudget['sumOfbidWithoutPh']); ?><?php endif; ?> NIS</p></div>
                <div class="quote_req_img"><img src="<?php echo e(asset('img/question_waiting.png')); ?>"/></div>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-6 padding_rt">
          <div class="dashboard_box">
            <a href="javascript:;" class="budget_left_bg">
              <div class="box_heading">
                <h2>Phone calls</h2>
                <h1>Phone calls</h1>
              </div>
              <div class="total_number">
                <h1>5</h1>
              </div>
              <div class="Qlink-nis"><p>21 NIS</p></div>
              <div class="quote_req_img"><img src="<?php echo e(asset('img/phone-icon.png')); ?>"/></div>
            </a>
          </div>
          </div>
          <div class="col-md-3 col-6 padding_lt">
            <div class="dashboard_box">
                <a href="<?php echo e(url('/business_user/advertisement_top_ads')); ?>" class="interactions_today_bg">
                  <div class="box_heading">
                    <h2>Clicks on top ad</h2>
                    <h1>Clicks on top ad</h1>
                  </div>
                  <div class="total_number">
                    <h1>28</h1>
                  </div>
                    <div class="Qlink-nis"><p>28 NIS</p>
                      <span>Start campaign</span>
                    </div>
                  <div class="quote_req_img"><img src="<?php echo e(asset('img/tap-addicon.png')); ?>"/></div>
                </a>
            </div>
          </div>
      </div>
      <div class="row second_row">
        <div class="col-md-3 col-6 padding_rt">
          <div class="dashboard_box">
            <a href="javascript:;" class="member_bg">
              <div class="box_heading">
                <h2>Clicks on products</h2>
                <h1>Clicks on products</h1>
              </div>
              <div class="total_number">
                <h1>28</h1>
              </div>
              <div class="Qlink-nis"><p>28 NIS</p>
                <span>Promote product</span>
              </div>
              <div class="quote_req_img sec_row_img"><img src="<?php echo e(asset('img/tap-addicon.png')); ?>"/></div>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="t-detail">
            <h1>In <?php echo e($currentMonth); ?> <?php echo e($year); ?> you spent <span><?php if(isset($monthlyBudget['totalSpent'])): ?><?php echo e($monthlyBudget['totalSpent']); ?><?php endif; ?> NIS</span> and closed <span><?php if(isset($monthlyBudget['closedDeals'])): ?><?php echo e($monthlyBudget['closedDeals']); ?><?php endif; ?> deals.</span></h1>
            <p>Keep up the good work!</p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="cookies">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <div class="cookies_main"><!-- This website use cookies to provide better service. You can read about it in our <a href="javascript:;"> Privacy policy.</a> <span class="close_cookie"><img src="<?php echo e(asset('img/cookie_close.png')); ?>"/></span> --><?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
          </div>
        </div>
      </div>
    </section>
