<!doctype html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    
    <meta name="viewport" content="width=device-width">
    
    <meta name="description" content="Pay monthly rent when you rent an apartment, we made it easy and flexible for affordable houses for rent in Lagos Nigeria ">
    
    <meta name="keywords" content="Monthly rent in Lagos Nigeria,Real Estate,Realtor,monthly rent payment,Home rental in Lagos Nigeria,home">
    
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    
    <link rel="canonical" href="<?php echo base_url(); ?>" />
    
    <meta property="og:locale" content="en_US" />
    
    <meta property="og:type" content="website" />
    
    <meta property="og:title" content="Home - Rent apartment in Lagos with flexible monthly payment Rent apartment in Lagos with flexible monthly payment" />
    
    <meta property="og:description" content="Pay monthly rent when you rent an apartment, we made it easy and flexible for affordable houses for rent in Lagos Nigeria" />
    
    <meta property="og:url" content="<?php echo base_url(); ?>" />
    
    <meta property="og:site_name" content="Rent apartment in Lagos with flexible monthly payment" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/faq.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">

    <link href="<?php echo base_url(); ?>assets/css/dash-css.css?version=<?php echo rand(1, 99); ?>.10.<?php echo rand(1, 50); ?>" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/css/font.awesome.min.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/css/tool-tip.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/css/rating-meter.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/css/testimonial-carousel.css?version=<?php echo rand(1, 99); ?>.10.<?php echo rand(1, 70); ?>" rel="stylesheet" />
    
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/AjaxFileUpload.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/multi-animated-counter.js"></script>
    
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- remove this if you use Modernizr -->
    
    <script>(function(e,t,n){var r=e.querySelectorAll("dropzone")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

    <title>Rent apartment in Lagos with flexible monthly payment</title>
    
</head>

<body>
    <!-- hero -->
    <div class="container hero no-image-hero">
        <div class="top-menu">
            <ul>
                <li class="top-list"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" class="logo"></li>
                <li class="top-list dropdown"><a class="active" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#">Subscribe<i class="bx bx-chevron-down arrowbtn"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Subscribe to a home</a></li>
                        <li><a class="dropdown-item" href="#">Upcoming homes</a></li>
                    </ul>
                </li>
                <li class="top-list"><a href="#buy">Buy</a></li>
                <li class="top-list"><a href="#">Nightly Stay</a></li>
                <li class="top-list"><a href="#">Property owner</a></li>
                <li class="top-list dropdown"><a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="">Company<i class="bx bx-chevron-down arrowbtn"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">About us</a></li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                        <li><a class="dropdown-item" href="#">Blog </a></li>
                    </ul>
                </li>
                <?php if(@$userID && !@$ongod && @$user_type == 'tenant' ){ ?>
                
                        <li class="top-list"><a href="<?php echo base_url(); ?>user/dashboard" class="createbtn">Go to Dashboard</a></li>
                    
                <?php }else if(@$userID && !@$ongod && @$user_type == 'landlord' ){ ?>
                
                        <li class="top-list"><a href="<?php echo base_url(); ?>landlord/dashboard" class="createbtn">Go to Dashboard</a></li>
                    
                <?php }else{ ?>
                    
                        <li class="top-list"><a href="<?php echo base_url(); ?>login" class="loginbtn">Login</a></li>
                        
                        <li class="top-list"><a href="<?php echo base_url(); ?>signup" class="createbtn">Create Account</a></li>
                    
                <?php } ?>
              </ul>
        </div>

        <?php
        
        	$CI =& get_instance();
        
        	$property = $CI->insert_stats(); 	
        ?>
	