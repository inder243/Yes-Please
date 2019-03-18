<?php $__env->startSection('content'); ?>       
            

<!-- <div class="breadcrumbs">
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
                                <strong class="card-title">Basic Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Mobile number</th>
                                          <th scope="col">Certificates</th>
                                          <th scope="col">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php if(!empty($verify_bu) && count($verify_bu)>0): ?>
                                    <?php $count=1; ?>
                                    <?php $__currentLoopData = $verify_bu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                    $uploads = json_decode($user['uploaded_files'],true);
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo e($count); ?></th>
                                        <td><?php echo e($user['business_user']['first_name'] .$user['business_user']['last_name']); ?></td>
                                        <td><?php echo e($user['business_user']['email']); ?></td>
                                        <td><?php echo e($user['business_user']['phone_number']); ?></td>
                                        <td>
                                          
                                            <ul class="uploadedimg">
                                             <?php $__currentLoopData = $uploads['pic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="imguploaded">
                                             <a href="javascript:void(0);"  data-image="<?php echo e(url('/images/verify_certificate/'.$user['business_user_id'].'/'.$img)); ?>" onclick="openImage(this);return false;" >
                                                  <img src="<?php echo e(url('/images/verify_certificate/'.$user['business_user_id'].'/'.$img)); ?>" class="rounded-circle">
                                                 </a>
                                              </li>   
                                             
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                             </ul>   
                                        
                                        </td>
                                        <td><a href="javascript:void(0);" data-url="<?php echo e(route('admin.changestatus')); ?>" data-status="approve" data-id="<?php echo e($user['id']); ?>" class="enable_business_user" onclick="approveBusinessUser(this);">Approve</a>
                                            <a href="javascript:void(0);" data-status="disapprove" data-url="<?php echo e(route('admin.changestatus')); ?>" data-id="<?php echo e($user['id']); ?>" class="disbale_business_user" onclick="approveBusinessUser(this);">Disapprove</a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr>
                                         <td scope="row"></td>
                                        <td>
                                             No Data Found
                                        </td>
                                   
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>

               

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->


    <div class="modal fade" id="showUserImageGallery" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                         
                     </div>
                    
                    <div class="modal-body">
                     <img style="width:100%" src=""/>
                    </div>
                    
            </div>
        </div>
    </div>  
      


<?php $__env->stopSection(); ?>  
      
<?php echo $__env->make('layouts.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>