<?php $arr = json_decode($categories); ?>
<?php if(!empty($arr)): ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="javascript:;" inc_id="<?php echo e($value['id']); ?>" id="<?php echo e($value['category_id']); ?>" data-cat="sub" onclick="categoriesselect(this)" data-cat="parent" class="categories"><?php echo e($value['category_name']); ?></a>


         
        </li>

        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <li>No category found.</li>
<?php endif; ?>