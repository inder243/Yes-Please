<?php $__env->startSection('content'); ?>
<div class="login_fields div-center">
	<h2 class="text-center">Forgot Password</h2>
	<?php if(isset($error) && !empty($error)){ ?>
		<div class="alert alert-danger">
		  <?php echo e($error); ?>

		</div>
	<?php }else{ 
	 	if(isset($msg)){ ?>
			<div class="alert alert-success">
			  <?php echo e($msg); ?>

			</div>
		<?php } ?>
		<form id="recover_password_admin" method="POST" action="">
			<?php echo csrf_field(); ?>
			<input type="password" class="form-control" name="password" placeholder="Password" value="" required="" autofocus="">
			<input type="password" class="form-control" name="r_password" placeholder="Re-enter Password" value="" required="">

			<div class="login_btn"><a><input type="submit" id="recover_password_submit" value="Submit"></a></div>
		</form>
	<?php } ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ypapp_inner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>