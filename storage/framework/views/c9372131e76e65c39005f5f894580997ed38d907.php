

<?php $__env->startSection('content'); ?>
      		<div class="main__container__fluid">      	
				<!-- slider__banner -->
				<section class="slider slider__banner__wrapper">
					<div class="slider__wrapper">
						<ul class="bxslider slider__banner"> <!-- hide__all -->
						  	<li class="slider__banner--li">
						  		<img class="slider__banner--img molt" 
						  		data-molt-0w="front/images/slider__banner/img--slider__banner2--320.jpg"
						  		data-molt-480w="front/images/slider__banner/img--slider__banner2--768.jpg"
						  		data-molt-1024w="front/images/slider__banner/img--slider__banner2--1360.jpg" 
						  		data-molt-1400w="front/images/slider__banner/img--slider__banner2--1920.jpg" alt="">
						  	</li>
						  	<li class="slider__banner--li">
						  		<img class="slider__banner--img molt" 
						  		data-molt-0w="front/images/slider__banner/img--slider__banner3--320.jpg"
						  		data-molt-480w="front/images/slider__banner/img--slider__banner3--768.jpg"
						  		data-molt-1024w="front/images/slider__banner/img--slider__banner3--1360.jpg" 
						  		data-molt-1400w="front/images/slider__banner/img--slider__banner3--1920.jpg" alt="">
						  	</li>
						</ul>
					</div>
				</section>
				
				<!-- slider the best seller -->
				<section class="slider slider__bestseller__wrapper">
					<span class="slider__bestseller--title"><h1>The Best Seller</h1></span>
				   <div class="slider__bestseller">
				   	  <div>
					    	<a href="">
						        <h5 class="slider__bestseller--name">Best</h5>
							  	<h5 class="slider__bestseller--type">Seller</h5>
					    	</a>					        
					    </div>
					  
					</div>
				</section>
      		</div>

      		<div class="main__container main__container__full">
            	<!-- Sidebar Left -->
            	<?php echo $__env->make('layout.home.sidebar_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      			

            	<!-- slider center wrapper -->
            	<?php echo $__env->make('layout.home.slider_middle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	      		

	      		<!-- sidebar right wrapper -->
	      		<?php echo $__env->make('layout.home.sidebar_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	      	
            </div>
	
<?php $__env->stopSection(); ?>
		
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/front/home.blade.php ENDPATH**/ ?>