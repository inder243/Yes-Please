<?php $__env->startSection('content'); ?>

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="<?php echo e(url('/')); ?>">Home </a>/<span class="q_breadcrumb"> Quotes and questions</span></div>
      </section>
      <section>
         <div class="container-fluid">
                <div class="qq_main">
               <h1>Quotes and Questions</h1>
             </div>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                    <div class="qq_main">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                   </div>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane active" id="Quotes">
                            <div class="qq_main">
                            <form id="search_quotes" action="" method="POST">
                            <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Type</label>
                                    <select <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> disabled="" <?php endif; ?> <?php endif; ?> name="select_status" class="form-control " id="exampleSelect1" required>
                                      <option value="all" selected="">All</option>
                                      <option value="1" <?php if($quote_status == 1): ?> selected <?php endif; ?>>New</option>
                                      <!-- <option value="2" <?php if($quote_status == 2): ?> selected <?php endif; ?>>Read</option>
                                      <option value="3" <?php if($quote_status == 3): ?> selected <?php endif; ?>>Quoted</option> -->
                                      <option value="4" <?php if($quote_status == 4): ?> selected <?php endif; ?>>Accepted</option>
                                      <option value="6" <?php if($quote_status == 6): ?> selected <?php endif; ?>>Completed</option>
                                      <!-- <option value="5" <?php if($quote_status == 5): ?> selected <?php endif; ?>>Rejected/Ignored</option> -->
                                    </select>
                                    <span class="select_arrow"><img src="<?php echo e(asset('img/custom_arrow.png')); ?>" class="img-fluid"></span>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> readonly="" <?php endif; ?> <?php endif; ?> type="text" class="form-control gen_quote_keyword" name="gen_quote_keyword" value="<?php if(!empty($quote_keyword)): ?><?php echo e($quote_keyword); ?> <?php endif; ?>" id="inputPassword4">
                                 </div>
                              </div>
                              <div class="search_btn">
                                 <input <?php if(isset($hide_sorting)): ?> <?php if($hide_sorting == '1'): ?> disabled="" <?php endif; ?> <?php endif; ?> type="submit" name="search_submt" value="Search" class="quotes_srch">
                              </div>
                           	</div>
                       		</form>
                           <div class="all_quote_section">
                            <?php if(!empty($quotes)): ?>
                            <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php $acceptedSts = ''; ?>
                              <?php $newSts = ''; ?>
                              <?php $compltSts = ''; ?>
                              
                              <?php $__currentLoopData = $quote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sQuote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sQuote['status']==4): ?>
                                  <?php $acceptedSts = 1; ?>
                                <?php endif; ?>
                                <?php if($sQuote['status']==1): ?>
                                  <?php $newSts = 1; ?>
                                <?php endif; ?>
                                <?php if($sQuote['status']==6): ?>
                                  <?php $compltSts = 1; ?>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                          <!--  <div class="quote_section" style="display:none;"> -->
                           <div class="quote_section">
                              <?php
                              $quote_id = $quote[0]['quote_id'];
                              ?>

                              <?php if(isset($acceptedSts) && $acceptedSts==1): ?>
                              <a href="<?php echo e(url('/general_user/quoteaccepted/'.$quote_id)); ?>" class="new_quote q_accepted">
                              <?php elseif(isset($newSts) && $newSts==1): ?>
                              <a href="<?php echo e(url('/general_user/quotesrply/'.$quote_id)); ?>" class="new_quote">
                              <?php elseif(isset($compltSts) && $compltSts==1): ?>
                              <a href="<?php echo e(url('/general_user/quotecompleted/'.$quote_id)); ?>" class="new_quote">
                              <?php else: ?>
                              <a href="<?php echo e(url('/general_user/quotesrply/'.$quote_id)); ?>" class="new_quote">
                              <?php endif; ?>

                              <!-- <?php if($quote[0]['status'] == 1): ?>
                              <a href="<?php echo e(url('/general_user/quotesrply/'.$quote_id)); ?>" class="new_quote">
                              <?php elseif($quote[0]['status'] == 2): ?>
                              <a href="<?php echo e(url('/general_user/quotesrply/'.$quote_id)); ?>" class="new_quote q_quoted">
                              <?php elseif($quote[0]['status'] == 3): ?>
                              <a href="<?php echo e(url('/general_user/quotesrply/'.$quote_id)); ?>" class="new_quote q_quoted">
                              <?php elseif($quote[0]['status'] == 4): ?>
                              <a href="<?php echo e(url('/general_user/quoteaccepted/'.$quote_id)); ?>" class="new_quote q_accepted">
                                <?php elseif($quote[0]['status'] == 5): ?>
                              <a href="<?php echo e(url('/general_user/quoteaccepted/'.$quote_id)); ?>" class="new_quote">
                              <?php else: ?>
                              <a href="" class="new_quote">
                              <?php endif; ?> -->
                              
                                 <div class="quote_detail">
                                    <h1>Quote id : <?php echo e($quote[0]['get_quotes']['quote_id']); ?></h1>
                                    <div class="created_date_for_mobile">

                                      <?php $datetime = $quote[0]['get_quotes']['created_at'];
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
                                      
                                      <?php if(isset($acceptedSts) && $acceptedSts==1): ?>
                                      <div class="new_lable q_accepted_table gen_accepted">ACCEPTED</div>
                                      <?php elseif(isset($newSts) && $newSts==1): ?>
                                      <div class="new_lable gen_new">NEW</div>
                                      <?php elseif(isset($compltSts) && $compltSts==1): ?>
                                      <div class="new_lable gen_completed">Completed</div>
                                      <?php endif; ?> 
                                       <div class="created_date"><?php echo e($date); ?></div>
                                    </div>
                                    <div class="quote_basic_detail">
                                      <?php $dynamic_formdata = json_decode($quote[0]['get_quotes']['dynamic_formdata'],true); ?>

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

                                      <?php if(!empty($quote[0]['get_quotes']['phone_number'])): ?>
                                      <div class="Q_detail">
                                        <span class="Q_detail_heading">Mobile Number:</span>
                                        <span><?php echo e($quote[0]['get_quotes']['phone_number']); ?></span>
                                      </div>
                                      <?php endif; ?>
                                       <!-- <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div> -->
                                    </div>
                                    <div class="Q_description">
                                      <?php $descriptn = mb_strimwidth($quote[0]['get_quotes']['work_description'], 0, 150, "..."); ?>
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

                           <!-- <div class="loadMore"><a href="JavaScript:;">Load more</a></div> -->
                           <div class="ignored_proposals"><p>Ignored proposals</p></div>
                         </div>
                        <div class="ignore_p_section">
                          <div class="row">
                            <?php if(isset($quotes_ignored)): ?>
                              <?php if(!empty($quotes_ignored)): ?>
                                <?php $__currentLoopData = $quotes_ignored; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ignored_quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="col-lg-6 col-12">
                                    <div class="ignore_section">
                                      <div class="Q_tag">
                                             <div class="new_lable ignore_table gen_ignore">IGNORED</div>
                                      </div>
                                      <div class="content_image">
                                        <div class="userPic"><img src="<?php echo e(asset('img/user_placeholder.png')); ?>"/></div>
                                        <div class="contect_detail">
                                          <h1><?php echo e($ignored_quote['get_bus_user']['business_name']); ?>, Quote id : <?php echo e($ignored_quote['get_quotes']['quote_id']); ?></h1>

                                          <?php $details = mb_strimwidth($ignored_quote['quote_reply']['details'], 0, 30, "..."); ?>

                                          <?php if($ignored_quote['quote_reply']['price_type'] == 2): ?>
                                          <?php $price_type = '/hour'; ?>
                                          <?php else: ?>
                                          <?php $price_type = ''; ?>
                                          <?php endif; ?>

                                          <p><span>$ <?php echo e($ignored_quote['quote_reply']['price_quotes'].$price_type); ?></span>for <?php echo e($details); ?></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            <?php endif; ?>
                            
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane container fade" id="Questions">
                            <div class="qq_main">
                           <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">

                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input type="text" class="form-control" id="inputPassword4" required="">
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                   <div class="search_btn for_search">
                                      <input type="submit" value="Search" class="question_srch">
                                   </div>
                                 </div>
                              </div>

                           </div>
                           <div class="quote_section">
                              <a href="question_review.html" class="new_quote">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                      <span>Replies <b>5</b></span>
                                      <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="Q_tag">
                                       <div class="new_lable">NEW</div>
                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                      <span>Replies <b>5</b></span>

                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote border-transparent">
                                 <div class="quote_detail">
                                    <h1>Car question</h1>
                                      <span>Replies <b>5</b></span>

                                    <div class="Q_tag">

                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="load_more"><a href="JavaScript:;">Load more</a></div>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>

         </div>
      </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_general', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>