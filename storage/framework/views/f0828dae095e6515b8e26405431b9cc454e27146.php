    

        <?php $__env->startSection('content'); ?>       
            

         <!--  <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                   
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Category</strong> Form
                            </div>
                            <form action="<?php echo e(url('/admin/add_category')); ?>" method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Super Category</label></div>
                                        <div class="col-12 col-md-9"> 
                                            <select name="superCategory" required>
                                                        <option value="">Select Parent Category</option>
                                                     <?php $__currentLoopData = $Supercategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($sCat->super_cat_id); ?>"><?php echo e($sCat->cat_name); ?></option>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <a href="javascript:;" onclick="openPopUpSuperCategory(this);return false">Add Parent category</a>
                                        </div>
                                    </div>
                                   

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="category" placeholder="Enter category..." class="form-control" maxlength="250" value="<?php echo e(old('category')); ?>" required>
                                            <?php if(Session::has('success_message')): ?>
                                            <span class="help-block succ-admin forhide"><?php echo e(Session::get('success_message')); ?></span>
                                            <?php endif; ?>
                                             <?php if(Session::has('error_message')): ?>
                                            <span class="help-block error forhide"><?php echo e(Session::get('error_message')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                              
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button> -->
                            </div>
                              </form>
                        </div>

                       <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Basic Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Action</th>
                                          <th scope="col">Category Form</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $count=1; ?>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <th scope="row"><?php echo e($count); ?></th>
                                        <td><?php echo e($cat->category_name); ?></td>
                                        <td>
                                            <a href='javascript:void(0);' data-toggle="modal" data-target="#mediumModal"  class="fa fa-pencil edit" data-id="<?php echo e($cat->id); ?>" data-name= "<?php echo e($cat->category_name); ?>"></a>
                                            <a href='javascript:void(0);'  data-id="<?php echo e($cat->id); ?>" class="fa fa-times delete_category"></a>
                                        </td>
                                        <td>
                                            
                                            <a href="<?php echo e(url('/admin/create_new_form')); ?>/<?php echo e($cat->id); ?>">create form</a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>

               

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->


      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Category</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="edit_category" name="edit_category" placeholder="Enter category..." class="form-control" maxlength="250"  required>
                                    <span class="help-block" id="help-block"></span>
                                </div>
                            </div>
                            <input type="hidden" name="hidden_id" id="hidden_id">
                            <input type="hidden" name="hidden_url" id="hidden_url" value="<?php echo e(url('/')); ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary submit_category">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="openPopUpSuperCategory" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Parent category.</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo e(url('/admin/add_Super_category')); ?>" method="post" class="form-horizontal">
                    <div class="row form-group">
                         <?php echo e(csrf_field()); ?>

                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" required name="superCategory"></div>
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                </form>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
      </div>
    </div>

        <?php $__env->stopSection(); ?>  
      
<?php echo $__env->make('layouts.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>