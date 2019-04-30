<?php $__env->startSection('content'); ?>

<section class="register_step_1">
	<div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
		<div><a href="<?php echo e(url('/business_user/business_dashboard')); ?>">Dashboard</a> / <span class="q_breadcrumb">My products</span></div>
		<div class="setup_things test-campign">
			<a href="JavaScript:;" class="adde_btn" onclick="openAddProducts(this);return false;">Add</a>
		</div>
	</div>
</section>

<section class="advertisment_section">
	<div class="advtisment_main">
		<h1>My products</h1>
	</div>
	<div class="container pro-module-feature">
		<div class="row">
			<div class="col-12">
				<div class="call-table">
					<div class="campagin_table1 table-responsive product-table">
						<table role="table" id="product_table">
							<thead>
								<tr  class="table_heading">
									<th>Name</th>
									<th> Category</th>
									<th>Price</th>
									<th>Photos</th>
									<th>Actions</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($all_products)): ?>
									<?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php 
									$product_imgs = json_decode($product['product_images'],true);

									if(!empty($product_imgs)){
										$count_imgs = count($product_imgs['pic']);
									}else{
										$count_imgs = 0;
									}
									?>
									<!--- data-toggle="modal" data-target="#promote-popup"-->
									<tr class="product_<?php echo e($key); ?>">
										<td><?php echo e($product['name']); ?></td>
										<td><?php echo e($product['get_cat_name']['category_name']); ?></td>
										<?php if($product['price_type'] == 'fix'): ?>
										<td>$<?php echo e($product['price']); ?></td>
										<?php elseif($product['price_type'] == 'range'): ?>
										<td>$<?php echo e($product['price_from']); ?> - $<?php echo e($product['price_to']); ?></td>
										<?php endif; ?>
										<td><?php echo e($count_imgs); ?></td>
										<td><a href="javascript:;" class="add-sechdule promote_products" data-product_id="<?php echo e($product['id']); ?>" data-product_name="<?php echo e($product['name']); ?>" onclick="openPromoteModal(this);">Promote</a></td>
										<td><a href="javascript:;" data-product_mainid="<?php echo e($product['product_id']); ?>" data-product_id="<?php echo e($product['id']); ?>" data-product_name="<?php echo e($product['name']); ?>" onclick="openShowProductModal(this);" class="add-sechdule show_product">Show</a></td>
										<?php if($product['status'] == 0): ?>
										<td><a href="javascript:;" data-product_mainid="<?php echo e($product['product_id']); ?>" data-product_id="<?php echo e($product['id']); ?>" data-product_name="<?php echo e($product['name']); ?>" data-status="0" onclick="stopProduct(this);" class="add-sechdule stop_product">Start</a></td>
										<?php elseif($product['status']==1): ?>
										<td><a href="javascript:;" data-product_mainid="<?php echo e($product['product_id']); ?>" data-product_id="<?php echo e($product['id']); ?>" data-product_name="<?php echo e($product['name']); ?>" data-status="1" onclick="stopProduct(this);" class="add-sechdule stop_product">Stop</a></td>
										<?php endif; ?>
										<td>
											<div class="diff-icons-del">
												<a href="javascript:;" data-product_id="<?php echo e($product['product_id']); ?>" onclick="openEditProductModal(this);"><img src="<?php echo e(asset('img/edit-green.png')); ?>"/></a>
												<a href="javascript:;" data-product_num="<?php echo e($key); ?>" data-product_id="<?php echo e($product['product_id']); ?>" onclick="deleteProduct(this);"><img src="<?php echo e(asset('img/line_cross.png')); ?>"/></a>
											</div>
										</td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									<tr><td colspan="5">No product Found!</td></tr>
								<?php endif; ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_business', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>