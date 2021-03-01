<!-- sidebar left -->
<section class="products__sidebar__left">
    <div class="sidebar__left__box choose__by__price">
        <span class="sidebar__left__box--title collapse__link--price"><h4>Product</h4><span class="icon--collapse--price icon--collapse--min"></span></span>
        <form class="sidebar__left__box--form collapse__container--price" action="">
            <ul class="sidebar__left__box--ul">
                <?php if(isset($products)): ?>
                   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('frontDetail', $product->id)); ?>">
                    <li class="sidebar__left__box--li"><label class="custom--label" for="price--4"><?php echo e($product->name); ?></label></li>
                </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </form>
    </div>

</section><?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/layout/product/sidebar_left.blade.php ENDPATH**/ ?>