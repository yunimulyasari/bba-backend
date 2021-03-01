<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<!DOCTYPE html PUBLIC "-//WAPFOLUM//DTD XHTML Mobile 1.0//EN" "http://www.wapfolum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w?.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<title> 
		<?php if(isset($title)): ?>
		<?php echo e($title); ?>

		<?php else: ?>
		Online Shop
		<?php endif; ?>
	</title>
	<!-- Variabel meta tag -->	
	<meta name="author" content="Online Shop" />
	<?php if(isset($description) && $description !='.' && !empty($description)): ?>
	<meta name="description" content="<?php echo e($description); ?>">
	<?php elseif(isset($description) && $description =='.'): ?>
	<meta name="description" content="Online shop. You can order by telephone or shop online and have arrangement delivered to your desired location.">
	<?php else: ?>
	<meta name="description" content="Online shop. You can order by telephone or shop online and have arrangement delivered to your desired location.">
	<?php endif; ?>
	
	<meta name="keywords" content="Online Shop, Laptop, Indonesia, Mac, Apple" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	
	<!-- Social: Twitter -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@onlineshop">
	<meta name="twitter:creator" content="Online Shop">
	<meta name="twitter:title" content="Online Shop">
	<meta name="twitter:description" content="Creating the most excellent contemporary  arrangement to meet the expectations of the customers is our mission.">
	<meta name="twitter:image:src" content="<?php echo e(asset('front/images/og__onlineshop.jpg')); ?>">

	<!-- Social: Facebook / Open Graph -->
	<meta property="og:url" content="https://www.facebook.com/pages/Online-Shop-Indonesia/501098263257949">
	<meta property="og:title" content="Online Shop">
	<meta property="og:image" content="<?php echo e(asset('front/images/og__onlineshop.jpg')); ?>"/>
	<meta property="og:description" content="Online Shop. Creating the most excellent contemporary floral arrangement to meet the expectations of the customers is our mission.">
	<meta property="og:site_name" content="Online Shop">
	<meta property="article:author" content="https://www.facebook.com/pages/Online-Shop-Indonesia/501098263257949">
	<meta property="article:publisher" content="https://www.facebook.com/pages/Online-Shop-Indonesia/501098263257949">
	<link rel="icon" type="image/png" href="">
	<!-- Variabel google plus -->
	<meta itemprop="name" content="Online Shop">
	<meta itemprop="description" content="Online Shop. Creating the most excellent contemporary floral arrangement to meet the expectations of the customers is our mission.">
	<meta itemprop="image" content="<?php echo e(asset('front/images/og__onlineshop.jpg')); ?>">

	<!-- Webmaster verification -->
	<meta name="google-site-verification" content="RkJtC7ImUCeM3Bg4aiK0j1F6_4w212CswujW87q5XZE" />

	<!-- Custom css -->
	<!-- <?php echo e(asset('/front/css/styles.css')); ?> -->
	<link rel="stylesheet" href="<?php echo e(asset('front/css/styles.css')); ?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>

<div class="container">

<!-- header -->
<section class="header"> <!-- bg--blur -->
	<div class="header__menu__wrapper">
		<a href="<?php echo e(route('frontProduct')); ?>"><div class="header__menu--logo logo--flowerstudio"></div></a>
		<div class="header__menu--menu">
			<nav class="menu__account">
				<ul class="menu__account--ul">
					<li class="menu__account--li"><a href="<?php echo e(route('frontShoppingCart')); ?>" title="Cart"><div class="icons__cart cart--cart"><span class="cart--nmr"><?php echo e(Cart::getContent()->count()); ?></span></div></a></li>
				</ul>
			</nav>
			<hr>
		
			<nav class="menu__page">
				<ul class="menu__page--ul">
					<li class="menu__page--li"><a href="<?php echo e(route('frontProduct')); ?>" title="banner">Home</a></li>
					<li class="menu__page--li"><a href="<?php echo e(route('frontProduct')); ?>" title="banner">Products</a></li>
				</ul>
			</nav>
			<div class="logo--menu"></div>					
		</div><div style="clear:both;"></div>
		<nav class="menu__responsive">
			<ul class="menu__responsive--ul">
				<li class="menu__responsive--li"><a class="" href="<?php echo e(url('/')); ?>" title="banner">Home</a></li>
				<li class="menu__responsive--li"><a class="" href="" title="banner">About Us</a></li>
				<li class="menu__responsive--li"><a class="" href="" title="banner">Products</a></li>
				<li class="menu__responsive--li"><a class="" href="" title="banner">Terms &amp; Conditions</a></li>
				<li class="menu__responsive--li"><a class="" href="" title="banner">Contact Us</a></li>
			</ul>
		</nav>
	</div>
</section><?php /**PATH C:\xampp\htdocs\bba-yunimulyasari\resources\views/layout/header.blade.php ENDPATH**/ ?>