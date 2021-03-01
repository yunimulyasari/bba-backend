
<?php $__env->startSection('content'); ?>

 <div class="main__container__2">
      <p class="breadscrumbs"><a href="<?php echo e(URL::to('/')); ?>" class="breadscrumbs--a">Home </a> / <a href="<?php echo e(url('product')); ?>" class="breadscrumbs--a"> Products</a> / <a class="breadscrumbs--a"> <?php echo e($product->name); ?></a></p>

          <!-- product wrapper -->
      <section class="products__detail__wrapper">

                <!-- products detail -->
                <div itemscope itemtype="http://schema.org/Product" class="products__detail">
                      <div class="products__detail__left">
                           
                             <img src="<?php echo e(asset('front/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>" class="products__detail--img">
        
                      </div>
                      <div class="products__detail__right">
                            <h2 itemprop="name" class="product__detail--name"><?php echo e($product->name); ?></h2> 
                            <?php if($product->price == 0): ?>
                            <h3 class="product__detail--price"></h3>
                            <?php elseif($product->price !== 0): ?>
                            <h3 itemprop="lowPrice" class="product__detail--price"><?php echo e('$' . $product->price); ?></h3>
                            <?php endif; ?>
                         <meta itemprop="priceCurrency" content="IDR" />
                        </span>

                            <ul class="product__detail--ul">
                                  <!-- twitter -->
                                  <li class="product__detail--li">
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-text="Flower Studio is home of the skilled and the talented floral artists." data-via="flowerstudioid" data-count="none">Tweet</a>
                                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                  </li>
                            </ul>
                            <hr class="product__detail--hr">
                            <form action="<?php echo e(route('frontCart')); ?>" method="POST" style="position:relative;" id="form_product_detail">
                            	    <?php echo e(csrf_field()); ?>

                                  <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                                  <?php if($product->qty < 1): ?>
                                  <input type="submit" id="product_detail_add_to_cart_submit"  class="button--cart " name="submit" value="OUT OF STOCK" disabled/>
                                  <?php else: ?>
                                  <input type="submit" id="product_detail_add_to_cart_submit"  class="button--cart " name="submit" value="ADD TO CART" />
                                  <span class="product__detail--span"></span>
                                  <input class="add__tocart--input del-cart" name="qty" type="text" maxlength = "2" placeholder="" value="1">
                                  <?php endif; ?>
                            </form>
                            <hr class="product__detail--hr">
                            <article>
                                  <p>
                                       <?php echo e($product->name); ?>- <?php echo e($product->code); ?><br>
                                  </p>
                            </article>
                      </div>
                </div>
                <hr class="line__double--hr">
                
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

    $(".del-cart").on("submit", function(){
        return confirm("Are you sure?");
    });


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/front/inventory_detail.blade.php ENDPATH**/ ?>