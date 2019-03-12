    <?php $__env->startSection('content'); ?>
        <form  method="POST" action="<?php echo e(route('check_email')); ?>"> 
        	 <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="admin_email" class="form-control" placeholder="Email" required>
                <?php if(Session::has('error_message')): ?>
                <span class="fill_fields" role="alert"><?php echo e(Session::get('error_message')); ?></span>
                <?php endif; ?>
                <?php if(Session::has('success_message')): ?>
                <span class="fill_fields" role="alert"><?php echo e(Session::get('success_message')); ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
        </form>
    <?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>