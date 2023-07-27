<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width">
<meta name="description" content="Pay monthly rent when you rent an apartment, we made it easy and flexible for affordable houses for rent in Lagos Nigeria ">

<meta name="keywords" content="Monthly rent in Lagos Nigeria,Real Estate,Realtor,monthly rent payment,Home rental in Lagos Nigeria,home">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">

<link href="<?php echo base_url(); ?>assets/css/custom-select.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/css/progress-bar.css" rel="stylesheet" type="text/css" />

<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/css/style.css?version=<?php echo rand(19857, 99857376343); ?>" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/font.awesome.min.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/side-nav.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- remove this if you use Modernizr -->

<script>(function(e,t,n){var r=e.querySelectorAll("dropzone")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

<title><?php echo $title; ?></title>

</head>

<body> 
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo base_url('partner-with-us'); ?>">Property owner</a>
        <a href="<?php echo base_url('properties'); ?>">Rent</a>
        <a href="https://dev-stay.smallsmall.com">Nightly stay</a>
        <a href="https://dev-buy.smallsmall.com">Buy</a>
        <a href="<?php echo base_url('blog'); ?>">Blog</a>
    </div>
    <div class="mobile-navigation-header mobile-header <?php echo @$mob_color; ?>">
        <div class="navigation-header-inner">
            <div class="mobile-logo <?php echo @$logo; ?>"><a href="<?php echo base_url(); ?>"></a></div>
            <div class="mobile-navigation">
                <div onclick="openNav()" class="hamburger-menu <?php echo @$mob_icons; ?>">
                    <div class="hamburger-bars"></div>
                    <div class="hamburger-bars"></div>
                    <div class="hamburger-bars"></div>
                </div>
                <?php if(@$userID && !@$ongod && @$user_type == 'tenant' ){ ?>
                        <!--- Tenant button ---->
                        <li class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('user/dashboard'); ?>"><span></span><span>Dashboard</span></a></li>
                
                <?php }else if(@$userID && !@$ongod && @$user_type == 'landlord' ){ ?>
                        <!--- Landlord button ---->
                        <li class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('landlord/dashboard'); ?>"><span></span><span>Dashboard</span></a></li>
                
                <?php }else{ ?>
                        <div class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('signup'); ?>">Create account</a></div>
                        <div class="mob-top-btn login-btn-mobile <?php echo @$mob_icons; ?>"><a href="<?php echo base_url('login'); ?>"></a></div>
                <?php } ?>
            </div>
        </div>
    </div>