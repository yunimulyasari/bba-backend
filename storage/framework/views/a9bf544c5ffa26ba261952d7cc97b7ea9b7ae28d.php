
<?php $__env->startSection('content'); ?>

<center>
    <img class="molt banner--article"
    data-molt-600w="<?php echo e(URL::asset('front/images/img__banner__page/banner--products--1360.jpg')); ?>" 
    data-molt-1400w="<?php echo e(URL::asset('front/images/img__banner__page/banner--products--1920.jpg')); ?>" alt="">
</center>
    <div class="main__container__3 main__container__full">
      <p class="breadscrumbs"><a href="<?php echo e(URL::to('/')); ?>" class="breadscrumbs--a">Home </a> / <a class="breadscrumbs--a"> Products</a></p>

        <!-- Sidebar Left -->
        <?php echo $__env->make('layout.product.sidebar_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
        <!-- product wrapper -->
        <section class="product__wrapper">
          <ul class="product--ul" id="filter">
              <!-- list product -->
              <?php if(isset($products)): ?>
                   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="product--li">
                      <a href="<?php echo e(route('frontDetail', $product->id)); ?>" class="product--a">
                        <img src="<?php echo e(asset('front/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>"> </a>
                          <h3 class="product--title"><?php echo e($product->name); ?></h3>
                          <?php if($product->price == 0): ?>
                          <h4 class="product--price">Price upon request</h4>
                          <?php elseif($product->price !== 0): ?>
                          <h4 class="product--price"><?php echo e('$' . number_format($product->price, 0, '.', 0)); ?></h4>
                          
                          <?php endif; ?>
                        
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?> 
          </ul>

        <div>

    </section>
    
</div>

<script>

    //When DOM loaded we attach click event to button
    $(document).ready(function() {
        
        //attach keypress to input
        $('.qtyvalue').keydown(function(event) {
            // Allow special chars + arrows 
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                || event.keyCode == 27 || event.keyCode == 13 
                || (event.keyCode == 65 && event.ctrlKey === true) 
                || (event.keyCode >= 35 && event.keyCode <= 39)){
                    return;
            }else {
                // If it's not a number stop the keypress
                if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault(); 
                }   
            }
        });
     

     

     $("#product_detail_add_to_cart").click(function()
     {
        $("#popup__product_detail").removeClass("popup--hide");
            $("#popup__product_detail").addClass("popup--show");
     });

     $("#popup_product_detail_cancel").click(function()
        {
            $("#popup__product_detail").removeClass("popup--show");
            $("#popup__product_detail").addClass("popup--hide");
             
        });

     $("#popup_product_detail_next").click(function()
    {
        $("#product_detail_add_to_cart_submit").click();
       
    });

    });


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/front/inventory.blade.php ENDPATH**/ ?>