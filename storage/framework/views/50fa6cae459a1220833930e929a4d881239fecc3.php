    <?php $__env->startSection('content'); ?>
        <form id="sign_in_adm" method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
            <?php echo e(csrf_field()); ?>

        
            <?php if(Session::has('success_message')): ?>
            <span class="fill_fields" role="alert"><?php echo e(Session::get('success_message')); ?></span>
            <?php endif; ?>
            <div class="form-group">
                <input type="email" class="form-control<?php echo e($errors->has('email') ? ' error_border' : ''); ?>" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" autofocus>
                <?php if($errors->has('email')): ?>
                <span class="fill_fields" role="alert"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>

                <?php if(Session::has('message')): ?>
                <span class="fill_fields" role="alert"><?php echo e(Session::get('message')); ?></span>
                <?php endif; ?>
                
            </div>   
            
            <div class="form-group">
                <input type="password" class="form-control<?php echo e($errors->has('password') ? ' error_border' : ''); ?>" name="password" placeholder="Password">
                <?php if($errors->has('password')): ?>
                <span class="fill_fields" role="alert"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> id="rememberme"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="<?php echo e(url('/forgot_password')); ?>">Forgotten Password?</a>
                        </label>

            </div>

            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <!-- <button type="submit" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</button> -->
                  
        </form>

    <?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>