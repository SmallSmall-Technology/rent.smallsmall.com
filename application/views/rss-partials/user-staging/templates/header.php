<!DOCTYPE html>
<html lang="en">

<head> 
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/user-assets/fontawesome/css/solid.css" rel="stylesheet" />


  <!-- custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/header.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/footer.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/index.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/inbox.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/booking.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/requestRepair.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user-assets/css/custom-css/wallet.css" />

  <!--- JQuery CDN --->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/AjaxFileUpload.js"></script>
  
  <title><?php echo $title; ?></title>
</head>

<body>

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light bg-light px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/rss-logo.svg" alt="logo">
      </a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active mr-5">
            <a class="nav-link" href="#">
              <div class="d-flex user-container">
                <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
                  <p class="m-0"><?php echo substr($fname, 0, 1).''.substr($lname, 0, 1); ?></p>
                  <div class="active-user"></div>
                </div>
                <div class="user-name">
                  <p><?php echo substr($fname, 0, 1).'. '.$lname; ?></p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/dashboard-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center <?php echo ($profile_title == 'Dashboard')? 'dashboard-active' : '' ; ?> mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('user-staging/dashboard'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/inbox-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex <?php echo ($profile_title == 'Messages')? 'dashboard-active' : '' ; ?> align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('user-staging/messages'); ?>" class=" text-dark" style="text-decoration: none;">inbox</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/calendar-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex <?php echo ($profile_title == 'Bookings' ||$profile_title == 'Inspections' || $profile_title == 'Transactions' || $profile_title == 'Repairs' || $profile_title == 'Ratings')? 'dashboard-active' : '' ; ?> align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('user-staging/bookings'); ?>" class=" text-dark" style="text-decoration: none;">Booking</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="wallet.html" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/wallet-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex <?php echo ($profile_title == 'Wallet')? 'dashboard-active' : '' ; ?> align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('user-staging/wallet'); ?>" class=" text-dark" style="text-decoration: none;">Wallet</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/profile-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="#" class=" text-dark" style="text-decoration: none;">Profile</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/nativeSquare-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="#" class=" text-dark" style="text-decoration: none;">Native Square</a>
            </div>
          </li>
        </ul>
        <a href="#">
          <span class="navbar-text text-dark mr-5">
            Log out
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/logout.svg" alt="">
          </span>
        </a>


      </div>
    </nav>

    <!-- mobile menu bar -->
    <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/menu-burger.svg" alt="">
      </button>
      <a href="#" style="width: 33%" class="flex-grow-1 text-center">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/rss-logo.svg" alt="logo">
      </a>
      <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0">JD</p>
          <div class="active-user"></div>
        </div>

      </div>
      <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/user-mobile.svg" alt="">
      </div>


      <div class="dropdown-menu menu_icon--dropdown p-0  logout-dropdown">
        <!-- Menu mobile view -->
        <div class=" menu-desktop py-2 px-4 d-flex flex-column">
          <a href="#">
            <span class="navbar-text text-dark mr-5">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/logout.svg" alt="">
              Log out
            </span>
          </a>
          <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
            <small style="font-size: 10px; line-height: 14px;">Referral
              code
            </small><br>
            Tna2301
          </button>
        </div>

      </div>

      <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
        <div class="mb-5 pl-2 dashboard-active">
          <p>
            <a href="index.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="inbox.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/inbox-icon.svg" alt="">
              &nbsp;&nbsp; inbox
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="booking.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/calendar-icon.svg" alt="">
              &nbsp;&nbsp; Booking
            </a>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="wallet.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/wallet-icon.svg" alt="">
              &nbsp;&nbsp; Wallet
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="#" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/profile-icon.svg" alt="">
              &nbsp;&nbsp; Profile
            </a>
          </p>
        </div>

        <div class="mb-5 pl-2">
          <p>
            <a href="#" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/nativeSquare-icon.svg" alt="">
              &nbsp;&nbsp; Native square
            </a>
          </p>
        </div>
      </div>
    </nav>

  </header>