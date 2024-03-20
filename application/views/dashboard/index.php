<?php 

$fname = $fname[0];

$lname = $lname[0];

if($verification_status == 'yes'){
    $disp = '<span style="color:#DADADA"  class="btn secondary-background text-white">Verified</span>'; 
}

else{
    $disp = '<span style="color:#DADADA" class="btn btn-light">Verified</span>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css" crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" /> -->

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />


    <!-- custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom-css/header.css" />
    <link rel="stylesheet" href="../assets/css/custom-css/footer.css" />
    <link rel="stylesheet" href="../assets/css/custom-css/index.css" />


    <title>Dashboard Home</title>
</head>

<body>

    <header>
        <!-- desktop menu bar -->
        <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img class="img-fluid" src="../assets/images/rss-logo.svg" alt="logo">
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-5">
                        <a class="nav-link" href="#">
                            <div class="d-flex user-container">
                                <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
                                    <p class="m-0"><?php echo $fname.'.'.$lname ?></p>
                                    <div class="active-user"></div>
                                </div>
                                <div class="user-name">
                                    <p></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/dashboard-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center dashboard-active mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/inbox'); ?>" class=" text-dark" style="text-decoration: none;">Notification</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/calendar-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/booking'); ?>" class=" text-dark" style="text-decoration: none;">Booking</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="wallet.html" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/wallet-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/wallet'); ?>" class=" text-dark" style="text-decoration: none;">Wallet</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/profile-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/profile'); ?>" class="text-dark" style="text-decoration: none;">Profile</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2">
                                <img class="img-fluid" src="../assets/images/nativeSquare-icon.svg" alt="">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="#" class=" text-dark" style="text-decoration: none;">Native Square</a>
                        </div>
                    </li>
                </ul>
                <a href="<?php echo base_url(); ?>/logout">
                    <span class="navbar-text text-dark mr-5">
                        Log out
                        <img class="img-fluid" src="../assets/images/logout.svg" alt="">
                    </span>
                </a>

            </div>
        </nav>

        <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="../assets/images/menu-burger.svg" alt="">
      </button>
      <a href="<?php echo base_url(); ?>" style="width: 33%" class="flex-grow-1 text-center">
        <img class="img-fluid" src="../assets/images/rss-logo.svg" alt="logo">
      </a>
      <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0"><?php echo $fname.'.'.$lname ?></p>
          <div class="active-user"></div>
        </div>

      </div>
      <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="../assets/images/user-mobile2.svg" alt="">
      </div>


      <div class="dropdown-menu menu_icon--dropdown p-0  logout-dropdown">
        <!-- Menu mobile view -->
        <div class=" menu-desktop py-2 px-4 d-flex flex-column">
          <a href="<?php echo base_url(); ?>/logout">
            <span class="navbar-text text-dark mr-5">
              <img class="img-fluid" src="../assets/images/logout.svg" alt="">
              Log out
            </span>
          </a>
          
          <?php echo $disp; ?>
          <span style="line-height: 14px;" type="" class="btn btn-outline-dark">
            <small style="font-size: 10px; line-height: 14px;">Referral
              code
            </small><br>
            <?php echo @$refCode; ?>
          </span>
        </div>

      </div>

      <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
        <div class="mb-4 pl-2 dashboard-active">
          <p>
            <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2 ">
          <p>
            <a href="<?php echo base_url('dashboard/inbox'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="">
              &nbsp;&nbsp; Notification
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('dashboard/booking'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/calendar-icon.svg" alt="">
              &nbsp;&nbsp; Booking
            </a>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('dashboard/wallet'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/wallet-icon.svg" alt="">
              &nbsp;&nbsp; Wallet
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('dashboard/profile'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/profile-icon.svg" alt="">
              &nbsp;&nbsp; Profile
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="#" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/nativeSquare-icon.svg" alt="">
              &nbsp;&nbsp; Native square
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <a href="https://buy.smallsmall.com/user/dashboard" class="btn special-link-button mt-3">
            <div>
              <p class="text-left" style="font-size: 10px;">Go to</p>
              <p class="text-right" style="font-size: 11px;">BuySmallsmall<br>dashboard</p>
            </div>
          </a>
        </div>
      </div>
    </nav>

    </header>

    <div class="container-fluid">

        <a href="https://buy.smallsmall.com/user/dashboard" class="btn special-link-button mt-3 d-md-inline-block d-none">
            <div>
                <p class="text-left" style="font-size: 10px;">Go to</p>
                <p class="text-right" style="font-size: 11px;">BuySmallsmall<br>dashboard</p>
            </div>
        </a>

    </div>

    <main class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-between">
                <div style="color: #7D8993; font-size: 13px; font-weight: 300;" class="font-weight-lighter">
                    <span>Rentsmallsmall</span>
                    <span>></span>
                    <span>Dashboard</span>
                </div>
                <div class="d-md-block d-none">
                    <?php echo $disp; ?>
                    <button type="button" class="btn secondary-background d-none">Verified</button>
                    <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
                        <small style="font-size: 10px; line-height: 14px;">Referral
                            code
                        </small><br>
                        <?php echo @$refCode; ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-5">
                <p style="font-size: 22px;">Dashboard</p>
            </div>
            <div class="col-md-4 col-12  mb-4">
                <div class="card card-custom">
                    <div class="card-body">
                        <p class="card-text">Active Subscription</p>
                        <h3 class="card-title"> 1 <br></h3>
                        
                        <div class="text-right">
                            <a href="<?php echo base_url(); ?>/dashboard/booking" class="btn secondary-background">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12  mb-4">
                <div class="card card-custom">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <p class="card-text">Next Upcoming Payment</p>
                        <h3 class="card-title">&#8358;<?php echo number_format(@$rss_transaction['amount']); ?></h3>
                        <h3 class="card-title" style = "font-size: 14px;"><?php $time = @$rss_transaction['transaction_date']; echo date('Y-m-d', strtotime($time. ' + 1 months')); ?></h3>
                        </div>

                        <div class="text-right">
                            <a href="<?php echo base_url(); ?>/dashboard/wallet" class="btn secondary-background">pay now</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12  mb-4">
                <div class="card card-custom">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <p class="card-text">Wallet Balance</p>
                            <h3 class="card-title">&#8358;<?php if(@$balance['account_balance']){ echo number_format(@$balance['account_balance']); } else { echo "0"; } ?></h3>
                        </div>

                        <div class="text-right">
                            <a href="<?php echo base_url(); ?>/dashboard/wallet" class="btn secondary-background">Top up</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <div class="card card-custom">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <p class="card-text">Subscription Debt</p>
                            <h3 class="card-title">&#8358;0.00</h3>
                        </div>
                        <div>
                            <p class="card-text">Late fee</p>
                            <h3 class="card-title">&#8358;0.00</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
                <div>
                    <a class="mr-3" href="https://rent.smallsmall.com/faq">Rentsmallsmall FAQ</a>
                    <a class="mr-3" href="https://buy.smallsmall.com/faq">Buysmallsmall FAQ</a>
                    <a class="mr-3" href="https://smallsmall.com/about">About Us</a>
                    <a class="" href="https://rent.smallsmall.com/blog">Blog</a>
                </div>
            </nav>
        </div>
    </footer>





    <!-- Jquery js -->
    <script src="../assets/js/jquery.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap js and Popper js -->
    <script src="../assets/js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap-js/bootstrap.min.js" crossorigin="anonymous"></script>


</body>

</html>