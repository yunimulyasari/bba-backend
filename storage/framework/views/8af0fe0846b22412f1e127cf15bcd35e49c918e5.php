<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <section class="main__container__wrapper">
     <?php echo $__env->yieldContent('content'); ?>
   </section>

 <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/layout/master.blade.php ENDPATH**/ ?>