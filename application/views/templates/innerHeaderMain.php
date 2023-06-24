<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/responsive_index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>
<body>
    
    <!-- hero -->
    <div class="container-fluid hero">
        <div class="top-menu navbar navbar-expand-lg">

            <button class="btn offcanvas-btn navbar-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon custom-toggler sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                  </button>
                  <div class="top-list top-list-img"><img src="<?php echo base_url(); ?>assets/front/images/logo.png" alt="" class="logo"></div>
                  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    
                    <div class="offcanvas-body">

            <ul class="navbar-nav">
                
                <li class="top-list dropdown"><a class="active black-menu" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#">Subscribe<i class="bx bx-chevron-down arrowbtn"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Subscribe to a home</a></li>
                        <li><a class="dropdown-item" href="#">Upcoming homes</a></li>
                    </ul>
                </li>
                <li class="top-list"><a href="https://buy2let.ng" class="black-menu">Buy2let</a></li>
                <li class="top-list"><a href="#nogo" class="black-menu">Stayone</a></li>
                <li class="top-list"><a href="#" class="black-menu">Property owner</a></li>
                <li class="top-list dropdown"><a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="" class="black-menu">Company<i class="bx bx-chevron-down arrowbtn"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">About us</a></li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                        <li><a class="dropdown-item" href="#">Blog </a></li>
                    </ul>
                </li>
                <li class="top-list"><a href="<?php echo base_url(); ?>login" class="loginbtn">Login</a></li>
                <li class="top-list"><a href="<?php echo base_url(); ?>signup" class="createbtn">Create Account</a></li>
              </ul>
        </div>
    </div>
</div>
     

    </div>
