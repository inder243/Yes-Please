<?php $__env->startSection('content'); ?>

<section class="register_step_1">
    <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Home</a>/<span><?php echo e(__('Registration')); ?></span></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="registration_main">
                    <h1><?php echo e(__('Registration')); ?></h1>
                        <div class="registration_steps">
                            <ul>
                                <li><span class="completed">1</span></li>
                                <li><span class="completed">2</span></li>
                                <li><span class="activespan">3</span></li>
                                <li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
                            </ul>
                        </div>
                    <form method="POST" id="stepthree_bu_reg" action="<?php echo e(url('/business_user/register_three/'.$id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="registration_filed">
                <h1>Categories</h1>
                <p>Choose up to 10 categories relevant for your business</p>
                <div class="registrationform">
                  <div class="category_secton">
                      <div class="category_list_heading">
                        <p>Categories</p>
                        <div class="category_list category_list_dynamic">
                        <div class="search_category">
                          <input type="text" placeholder="Search..." class="category_search"/>
                        </div>
                        <ul>
                          <?php 
                            // echo '<pre>'; print_r($categories); echo '</pre>';die;
                            // echo '<pre>'; print_r($business_categories); echo '</pre>';die;
                            if(!empty($business_categories)){
                              foreach($business_categories AS $cat){
                                $bids[] = $cat['id'];
                              }
                            }else{
                              $bids = array();
                            }
                          ?>

                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <li><a href="javascript:;" inc_id="<?php echo e($value['id']); ?>" id="<?php echo e($value['category_id']); ?>" data-cat="sub" onclick="categoriesselect(this)"><?php echo e($value['category_name']); ?></a>

                          <?php if(in_array($value['id'],$bids)): ?>
                              <span class="checked_category" style="display: block;"><img src="<?php echo e(asset('img/category_check.png')); ?>"/></span>
                          <?php else: ?>
                            <span class="checked_category"><img src="<?php echo e(asset('img/category_check.png')); ?>"/></span>
                          </li>
                          <?php endif; ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                      </div>
                    </div>
                      <div class="arrow_cat"><img src="<?php echo e(asset('img/arrow.png')); ?>" class="img-fluid"/></div>
                      <div class="added_category_list_heading">
                        <p class="forerror addcategory">Add categories (up to 10)</p>
                        <div class="added_category_list">
                        <div class="added_category category_list add_cat_list">
                          
                            <?php if(!empty($business_categories)): ?>
                                <ul class="added_category_ul">
                                <?php $__currentLoopData = $business_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li>
                                        <a href="javascript:;" id="<?php echo e($parent_category['cat_id']); ?>" data-cat="parent" class="categories"><?php echo e($parent_category['name']); ?></a>
                                        <span class="cross_category_reg">
                                          <img src="<?php echo e(asset('img/category_cancel.png')); ?>" class="img-fluid">
                                        </span>
                                        <ul class="subcategories">
                                          <?php $__currentLoopData = $parent_category['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li>
                                            <a href="javascript:;" id="<?php echo e($sub_category->sub_cat_id); ?>" data-cat="sub"><?php echo e($sub_category->sub_category_name); ?></a>
                                            <span class="cross_category_reg">
                                            <img src="<?php echo e(asset('img/category_cancel.png')); ?>" class="img-fluid">
                                            </span>
                                          </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                      </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                          <?php else: ?>
                          <p id="no_categories">No Categories Added</p>
                          <ul class="added_category_ul">
                                                   
                          </ul>
                          <?php endif; ?>
                        </div>

                      </div>

                        <span class="fill_fields disp_none">Fill this field</span>
                    </div>
                  </div>
                </div>
                <div class="next_back_button">
                  <div class="back"><a href="<?php echo e(url('/business_user/register_two/'.$id)); ?>">< Back</a></div>
                  <div class="next"><input type="button" class="reg_step3_submit" id="next_submit" value="Next >"></div>
                </div>
              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-------- Login Modal for business user------->
    <div class="modal fade" id="question_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog custom_model_width modal-dialog-centered" role="document">
            <div class="modal-content question_model">
                <div class="modal-header">
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body question_body">
                  
                </div>
            </div>
        </div>
    </div>
<!-------- Login Modal end ----->


 <div id="openPopUpForQuestion" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        
            <div class="modal-content">
              <div class="modal-header quote_header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 
              </div>
              <div class="modal-body">
                  
              </div>
              
            </div>
        
      </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.ypapp_inner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>