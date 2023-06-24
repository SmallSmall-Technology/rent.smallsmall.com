<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width">
<meta name="description" content="Pay monthly rent when you rent an apartment, we made it easy and flexible for affordable houses for rent in Lagos Nigeria ">

<meta name="keywords" content="Monthly rent in Lagos Nigeria,Real Estate,Realtor,monthly rent payment,Home rental in Lagos Nigeria,home">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/furnisure-favicon.png">

<link href="<?php echo base_url(); ?>assets/css/style-furnisure.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/font.awesome.min.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/side-nav.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/custom-drop-down.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/custom-drop-down-2.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/custom-checkbox.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/custom-uploader.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/tool-tip.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/testimonial-carousel.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js" type="application/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/header-animate.js" type="application/javascript"></script>

<title><?php echo $title; ?></title>

</head>



<body>

	<div class="header">

		<div class="header-inner">

			<div class="logo"><a href="#"><img src="<?php echo base_url(); ?>assets/img/furnisure-logo.png" /></a></div>

			<div class="mobile-menu">

				<i class="hamburger fa fa-bars"></i>

				<div onClick="openNav()" class="mobile-cart"><i class="fa fa-shopping-cart" id="shopping-cart"></i><span class="cart-counter">0</span><i class="angle fa fa-angle-right"></i></div>

			</div>

			<ul class="menu">

				<li class="menu-item"><a href="<?php echo base_url(); ?>properties">RentSmallSmall</a></li>

				<li class="menu-item"><a href="<?php echo base_url(); ?>furnisure/appliances">Appliances</a></li>

				<li class="menu-item"><a href="<?php echo base_url(); ?>furnisure/furnitures">Furniture</a></li>

				

				<?php if(@$userID){ ?>					

					<li class="menu-item"><a href="<?php echo base_url(); ?>dashboard"><?php echo $fname ?></a>

						<ul class="sub-menu">

							<div id="pointer"></div>

							<!---<li class="menu-item">

								<div class="profile-pic"><i class="user-icon fa fa-user"></i></div>

								<div class="profile-name"><?php //echo substr($fname, 0, 1).". ".$lname; ?></div>						

							</li>--->	

							<li class="menu-item"><a href="<?php echo base_url(); ?>user/dashboard">Dashboard</a></li>						

							<li class="menu-item"><a href="<?php echo base_url(); ?>user/bookings">My Bookings</a></li>

							<li class="menu-item"><a href="<?php echo base_url(); ?>user/messages">Messages</a></li>

							<!---<li class="menu-item"><a href="<?php //echo base_url(); ?>user/favorites">Favorites</a></li>--->

							<li class="menu-item"><a href="<?php echo base_url(); ?>logout">Logout</a></li>

						</ul>

					</li>

				<?php }else{ ?>

					<li class="menu-item"><a href="<?php echo base_url(); ?>login">Login</a></li>

					<li class="menu-item"><a href="<?php echo base_url(); ?>signup">Sign Up</a></li>

				<?php } ?>

				<!---<li class="menu-item"><a href="">What is rent to own?</a></li>--->

				<li onClick="openNav()" class="desktop-menu-item menu-item"><i class="fa fa-shopping-cart" id="shopping-cart"></i><span id="cart-counter" class="cart-counter">0</span><i class="menu-bars fa fa-angle-right"></i></li>

			</ul>

		</div>

	</div>

	<div id="mySidenav" class="sidenav mobileNav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <ul id="float-product-container" class="float-product-container">

         

      	</ul>

		<div id="pay-property" class="pay-property checkout-but">Checkout</div>
		
		<input type="hidden" class="verified" id="verified" value="<?php echo @$verified; ?>" />

    </div> 

	 