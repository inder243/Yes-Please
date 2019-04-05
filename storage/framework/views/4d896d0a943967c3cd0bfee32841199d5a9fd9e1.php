<?php $__env->startSection('content'); ?>

<section class="register_step_1">

         <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard </a>/<?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?><a href="<?php echo e(url('/business_user/advertisement_dashboard')); ?>"> Advertisement </a>/<?php endif; ?><span class="q_breadcrumb"> Quotes and questions</span></div>

      </section>
      <section>
         <div class="container">
            <div class="qq_main">
               <h1>Quotes and Questions</h1>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                     <ul class="nav nav-tabs">
                        <li class="nav-item quotes_li">
                           <a class="nav-link quotes_tabb <?php if($tab == 'quotes'): ?>active <?php endif; ?>" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item question_li">
                           <a class="nav-link question_tabb <?php if($tab == 'ques'): ?>active <?php endif; ?>" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane container <?php if($tab == 'quotes'): ?>active <?php endif; ?>" id="Quotes">
                           <form id="bus_search_quotes" action="" method="POST">
                              <div class="search_filter">
                                 <h1>Search filter</h1>
                                 <div class="row searchf_input">
                                    <div class="form-group custom_errow col-md-6 col-12">
                                       <label for="inputPassword4">Status</label>
                                       <select <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> disabled="" <?php endif; ?> <?php endif; ?> name="select_status" class="form-control" id="exampleSelect1" required>
                                          <option value="all" selected="">All</option>
                                          <option value="1" <?php if($quote_status == 1): ?> selected <?php endif; ?>>New</option>
                                          <option value="2" <?php if($quote_status == 2): ?> selected <?php endif; ?>>Read</option>
                                          <option value="3" <?php if($quote_status == 3): ?> selected <?php endif; ?>>Quoted</option>
                                          <option value="4" <?php if($quote_status == 4): ?> selected <?php endif; ?>>Accepted</option>
                                          <option value="5" <?php if($quote_status == 5): ?> selected <?php endif; ?>>Rejected/Ignored</option>
                                          <option value="6" <?php if($quote_status == 6): ?> selected <?php endif; ?>>Completed</option>
                                       </select>
                                       <span class="select_arrow"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label for="inputPassword4">Keyword</label>
                                       <input <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> readonly="" <?php endif; ?> <?php endif; ?> type="text" class="form-control bus_quote_keyword" name="bus_quote_keyword" value="<?php if(!empty($quote_keyword)): ?><?php echo e($quote_keyword); ?> <?php endif; ?>" id="inputPassword4">
                                    </div>
                                 </div>
                                 <div class="search_btn">
                                    <input <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> disabled="" <?php endif; ?> <?php endif; ?> type="submit" name="search_submt" value="Search">
                                 </div>
                              </div>
                           </form>
                           <div class="all_quote_section">
                           <?php if(!empty($quotes)): ?>
                           <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <!-- <div class="quote_section" style="display:none;"> -->
                           <div class="quote_section">
                              <?php
                              $quote_id = $quote['quote_id'];
                              ?>
                              <?php if($quote['status'] == 1): ?>
                                 <?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?>
                                 <a href="<?php echo e(url('/business_user/quotes_request?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id)); ?>" class="new_quote">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/quotes_request?quote_id='.$quote_id)); ?>" class="new_quote">
                                 <?php endif; ?>
                              <?php elseif($quote['status'] == 2): ?>
                                 <?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?>
                                 <a href="<?php echo e(url('/business_user/quotes_request?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id)); ?>" class="new_quote q_quoted">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/quotes_request?quote_id='.$quote_id)); ?>" class="new_quote q_quoted">
                                 <?php endif; ?>
                              
                              <?php elseif($quote['status'] == 3): ?>
                                 <?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=3')); ?>" class="new_quote q_quoted">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=3')); ?>" class="new_quote q_quoted">
                                 <?php endif; ?>
                             
                              <?php elseif($quote['status'] == 4): ?>
                                 <?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=4')); ?>" class="new_quote q_accepted">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=4')); ?>" class="new_quote q_accepted">
                                 <?php endif; ?>
                             
                              <?php elseif($quote['status'] == 6): ?>
                                 <?php if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type'))): ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=6')); ?>" class="new_quote">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=6')); ?>" class="new_quote">
                                 <?php endif; ?>
                              <?php else: ?>
                              <a href="" class="new_quote">
                              <?php endif; ?>
                              
                                 <div class="quote_detail">

                                    <h1><?php echo e($quote['get_quotes']['cat_name']); ?> Quotes : <?php echo e($quote['get_quotes']['quote_id']); ?></h1>
                                    <div class="created_date_for_mobile">
                                       <?php $datetime = $quote['get_quotes']['created_at'];
                                            $splitTimeStamp = explode(" ",$datetime);
                                            // $date = $splitTimeStamp[0];
                                            // $time = $splitTimeStamp[1];
                                            $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                                            $time = date('H:i',strtotime($splitTimeStamp[1]));
                                      ?>

                                       <span class="c_time"><?php echo e($time); ?></span>
                                       <span class="c_date"><?php echo e($date); ?></span>
                                    </div>
                                    <div class="Q_tag">
                                       <?php if($quote['status'] == 1): ?>
                                       <div class="new_lable bus_new">NEW</div>
                                       <?php elseif($quote['status'] == 2): ?>
                                       <div class="new_lable q_quoted_table bus_read">READ</div>
                                       <?php elseif($quote['status'] == 3): ?>
                                       <div class="new_lable q_quoted_table bus_quoted">QUOTED</div>
                                       <?php elseif($quote['status'] == 4): ?>
                                       <div class="new_lable q_accepted_table bus_accepted">ACCEPTED</div>
                                       <?php elseif($quote['status'] == 5): ?>
                                       <div class="new_lable bus_rejected">REJECTED</div>
                                       <?php else: ?>
                                       <div class="new_lable bus_completed">Completed</div>
                                       <?php endif; ?>
                                       <div class="created_date"><?php echo e($date); ?></div>
                                    </div>
                                    <div class="quote_basic_detail">

                                       <?php $dynamic_formdata = json_decode($quote['get_quotes']['dynamic_formdata'],true); ?>

                                       <?php if(!empty($dynamic_formdata )): ?>
                                       <?php $__currentLoopData = $dynamic_formdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dynami_key=>$dyanamic_values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($dyanamic_values['filter']==1): ?>
                                          <?php if($dyanamic_values['type'] == 'textbox'): ?>
                                             <?php if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['value'])): ?>
                                             <div class="Q_detail">
                                               <span class="Q_detail_heading"><?php echo e($dyanamic_values['title']); ?> :</span>
                                               <span><?php echo e($dyanamic_values['value']); ?></span>
                                             </div>
                                             <?php endif; ?>
                                          <?php else: ?>

                                             <?php if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['options'])): ?>
                                             <div class="Q_detail">
                                               <span class="Q_detail_heading"><?php echo e($dyanamic_values['title']); ?> :</span>

                                               <?php $get_labels = ''; ?>
                                               <?php $__currentLoopData = $dyanamic_values['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkbox_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php $get_labels .= $checkbox_data['label'] . ','; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               <span><?php echo e($get_labels); ?></span>
                                             </div>
                                             <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>

                                       
                                       <?php if(!empty($quote['get_quotes']['phone_number'])): ?>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Mobile Number:</span>
                                          <span><?php echo e($quote['get_quotes']['phone_number']); ?></span>
                                       </div>
                                       <?php endif; ?>

                                    </div>
                                    <div class="Q_description">
                                       <?php $descriptn = mb_strimwidth($quote['get_quotes']['work_description'], 0, 150, "..."); ?>
                                       <p><?php echo e($descriptn); ?></p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                           <?php else: ?>
                           <div class="no_result_quotes">No Results Found!</div>
                           <?php endif; ?>
                          
                           </div>
                           <!-- <div class="load_more"><a href="JavaScript:;">Load more</a></div> -->
                        </div>
                        <div class="tab-pane container  <?php if($tab == 'ques'): ?>active <?php else: ?> fade <?php endif; ?>" id="Questions">
                           <form method="POST" name="ques_keyword_form" id="bus_search_questions" action="">
                              <div class="search_filter">
                                 <h1>Search filter</h1>
                                 <div class="row  searchf_input">
                                    <div class="form-group custom_errow col-md-6 col-12">
                                       <label for="inputPassword4">Status</label>
                                       <select class="form-control" id="exampleSelect1">
                                          <option value="all" <?php if($ques_status == 'all'): ?> selected <?php endif; ?>>All</option>
                                          <option value="1" <?php if($ques_status == 1): ?> selected <?php endif; ?>>New</option>
                                          <option value="2" <?php if($ques_status == 2): ?> selected <?php endif; ?>>Read</option>
                                          <option value="2" <?php if($ques_status == 3): ?> selected <?php endif; ?>>Answered</option>
                                       </select>
                                       <span class="select_arrow"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label for="inputPassword4">Keyword</label>
                                       <input type="text" class="form-control bus_ques_keyword" value="<?php if(!empty($ques_keyword)): ?><?php echo e($ques_keyword); ?><?php endif; ?>" id="inputPassword4">
                                    </div>
                                 </div>
                                 <div class="search_btn">
                                    <input type="submit" value="Search">
                                 </div> 
                              </div>
                           </form>

                           <?php if(!empty($questions)): ?>
                              <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_qus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="quote_section">
                                 <?php $question_id = $all_qus[0]['question_id']; ?>

                                 <?php $answerdSts = ''; ?>
                                 <?php $newSts = ''; ?>
                                 <?php $readSts = ''; ?>

                                 <?php $__currentLoopData = $all_qus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sQuote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sQuote['status_bus']==3): ?>
                                       <?php $answerdSts = 1; ?>
                                    <?php endif; ?>
                                    <?php if($sQuote['status_bus']==1): ?>
                                       <?php $newSts = 1; ?>
                                    <?php endif; ?>
                                    <?php if($sQuote['status_bus']==2): ?>
                                       <?php $readSts = 1; ?>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 <?php if(isset($answerdSts) && $answerdSts==1): ?>
                                 <a href="<?php echo e(url('/business_user/question_detail/'.$question_id)); ?>" class="new_quote q_accepted">
                                 <?php elseif(isset($readSts) && $readSts==1): ?>
                                 <a href="<?php echo e(url('/business_user/question_detail/'.$question_id)); ?>" class="new_quote q_quoted">
                                 <?php elseif(isset($newSts) && $newSts==1): ?>
                                 <a href="<?php echo e(url('/business_user/question_detail/'.$question_id)); ?>" class="new_quote">
                                 <?php else: ?>
                                 <a href="<?php echo e(url('/business_user/question_detail/'.$question_id)); ?>" class="new_quote">
                                 <?php endif; ?>
                                    <div class="quote_detail">
                                       <h1><?php echo e($all_qus[0]['get_ques']['cat_name']); ?> Question</h1>
                                       <?php $datetim = $all_qus[0]['get_ques']['created_at'];
                                          $splitTimeStmp = explode(" ",$datetim);
                                           
                                          $date = date('d/m/Y',strtotime($splitTimeStmp[0]));
                                          $time = date('H:i',strtotime($splitTimeStmp[1]));
                                         ?>
                                       <div class="created_date_for_mobile">
                                          <span class="c_time"><?php echo e($time); ?></span>
                                          <span class="c_date"><?php echo e($date); ?></span>
                                       </div>
                                       <div class="Q_tag">
                                          <?php if(isset($answerdSts) && $answerdSts==1): ?>
                                           <div class="new_lable q_accepted_table gen_accepted">ANSWER</div>
                                           <?php elseif(isset($readSts) && $readSts==1): ?>
                                           <div class="new_lable q_quoted_table gen_new">READ</div>
                                           <?php elseif(isset($newSts) && $newSts==1): ?>
                                           <div class="new_lable gen_new">NEW</div>
                                           <?php endif; ?>
                                           
                                          <div class="created_date"><?php echo e($date); ?></div>
                                       </div>
                                       <div class="quote_basic_detail">
                                          <div class="Q_detail">
                                             <span class="Q_detail_heading1">Question : </span>
                                             <span><?php echo e($all_qus[0]['get_ques']['q_title']); ?></span>
                                          </div>
                                       </div>
                                       <div class="Q_description">
                                          <?php $q_descriptn = mb_strimwidth($all_qus[0]['get_ques']['q_description'], 0, 150, "..."); ?>
                                          <p><?php echo e($q_descriptn); ?></p>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php else: ?>
                           <div class="no_result_quotes">No Results Found!</div>
                           <?php endif; ?>
                           
                           <!-- <div class="load_more"><a href="JavaScript:;">Load more</a></div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>