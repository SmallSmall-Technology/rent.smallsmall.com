<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-css2/bootstrap.min.css"/>

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="<?php echo base_url(); ?>assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/fontawesome/css/solid.css" rel="stylesheet" />

  <!-- custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/header.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/footer.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/booking.css" />

  <title>Subscriber | profile</title>
</head>

<body>
  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/rss-logo.svg" alt="logo" />
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
                  <p class="m-0">JD</p>
                  <div class="active-user"></div>
                </div>
                <div class="user-name">
                  <p>John Doe</p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/dashboard-icon.svg" alt="" />
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center  mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('landlord/index'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="<?php echo base_url('landlord/inbox'); ?>" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2 position-relative">
                <div class="notification-circle d-md-flex d-none justify-content-center align-items-center">2</div>
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/inbox-icon.svg" alt="" />
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('landlord/inbox'); ?>" class=" text-dark" style="text-decoration: none;">Notification</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/myProperty-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center dashboard-active mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('landlord/property'); ?>" class=" text-dark" style="text-decoration: none;">My property</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="wallet.html" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/payout-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('landlord/wallet'); ?>" class=" text-dark" style="text-decoration: none;">Payout</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/profile-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('landlord/profile'); ?>" class=" text-dark" style="text-decoration: none;">Profile</a>
            </div>
          </li>
        </ul>
        <a href="#">
          <span class="navbar-text text-dark mr-5">
            Log out
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/logout.svg" alt="" />
          </span>
        </a>
      </div>
    </nav>

    <!-- mobile menu bar -->
    <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/menu-burger.svg" alt="">
      </button>
      <a href="#" style="width: 33%" class="flex-grow-1 text-center">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/rss-logo.svg" alt="logo">
      </a>
      <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0">JD</p>
          <div class="active-user"></div>
        </div>

      </div>
      <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/user-mobile2.svg" alt="">
      </div>


      <div class="dropdown-menu menu_icon--dropdown p-0  logout-dropdown">
        <!-- Menu mobile view -->
        <div class=" menu-desktop py-2 px-4 d-flex flex-column">
          <a href="#">
            <span class="navbar-text text-dark mr-5">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/logout.svg" alt="">
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
        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/index'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/inbox'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/inbox-icon.svg" alt="">
              &nbsp;&nbsp; Notification
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2 dashboard-active">
          <p>
            <a href="<?php echo base_url('landlord/property'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/myProperty-icon.svg" alt="">
              &nbsp;&nbsp; MyProperty
            </a>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/wallet'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/payout-icon.svg" alt="">
              &nbsp;&nbsp; Payout
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/profile'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/profile-icon.svg" alt="">
              &nbsp;&nbsp; Profile
            </a>
          </p>
        </div>

      </div>
    </nav>

  </header>

  <!-- Sub menu for property section starts here -->
  <div class="container-fluid d-md-flex d-none nav-bottom-color sub-menu ">
    <div class="sub-nav d-flex flex-wrap">
      <a class="text-decoration-none secondary-text-color mr-4 py-3  sub-menu--"
        href="<?php echo base_url('landlord/property'); ?>">
        <div class="sub-menu-link">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 dashboard-active" href="<?php echo base_url('landlord/subscriber'); ?>">
        <div class="sub-menu-link">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('landlord/repair'); ?>">
        <div class="sub-menu-link  ">
          Repair
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('landlord/agreement'); ?>">
        <div class="sub-menu-link  ">
          Property Agreement
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('landlord/transactions'); ?>">
        <div class="sub-menu-link  ">
          Transactions
        </div>
      </a>
    </div>
  </div>

  <!-- Sub menu mobile view for property section starts here -->
  <div class="container-fluid d-block d-md-none nav-bottom-color sub-menu">
    <div class="sub-nav d-flex justify-content-between ">
      <a class="text-decoration-none secondary-text-color py-3  " href="<?php echo base_url('landlord/property'); ?>">
        <div class="sub-menu-link  ">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3 dashboard-active" href="<?php echo base_url('landlord/subscriber'); ?>">
        <div class="sub-menu-link  ">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3" href="<?php echo base_url('landlord/repair'); ?>">
        <div class="sub-menu-link  ">
          Repair
        </div>
      </a>
      <div class="dropdown align-self-center py-3 sub-menu--">
        <a class="text-decoration-none secondary-text-color" href="#" role="button" data-toggle="dropdown"
          aria-expanded="false">
          More
          <i class="fa-solid fa-caret-down"></i>
        </a>

        <div class="dropdown-menu custom-dropdown-menu primary-background border-0 ">
          <a class="dropdown-item secondary-text-color custom-dropdown-active" href="<?php echo base_url('landlord/agreement'); ?>">Property
            Agreement</a>
          <a class="dropdown-item secondary-text-color" href="transactions.html">Transactions</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Main body content starts here -->
  <main class="container-fluid">
    <div class="row mt-5">
      <div class="col-1 d-none d-md-block ml-4">
        <a class="text-dark text-decoration-none" href="#">&larr; Back</a>
      </div>
      <div class="col-md-10 col-12">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <div style="color: #7d8993; font-size: 13px" class="font-weight-lighter">
              <span>Rentsmallsmall</span>
              <span>></span>
              <span>Dashboard</span>
              <span>></span>
              <span>Property</span>
              <span>></span>
              <span>2 br Maisonette B2 Olivia Court Lekki</span>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-12 mt-5">
            <p style="font-size: 22px">Subscriber Profile</p>
            </div>
            <div class="col-12 sub-nav">
              <nav class="nav">
              <li class="nav-item mr-3">
                <a class="nav-link primary-text-color sub-menu--dashboard-active px-0" id="currentBookingBtn" href="#"
                  role="button">Profile</a>
              </li>
              </nav>
              </div>

          <!-- Subscriber profile  -->
          <div class="col-12 mt-5 collapse show" id="currentBooking">
            <div class="primary-background p-md-5 p-3">
              <div class="row">
                <div class="col-12">
                  <p>Subscriber name</p>
                  <h3 class="address-title"><?php echo $userdata['firstName'] .' '. $userdata['lastName']?></h3>
                </div>
              </div>
              <div class="row my-5">
                <div class="col-12">
                  <p class="font-weight-light custom-font-size-14">Property</p>
                  <p class="custom-font-size-26"><?php echo $userdata['propertyTitle'];?></p>
                </div>
                </div>
                <div class="row my-5">
                <div class="col-md-2 col-6 mb-3">
                  <p class="font-weight-light custom-font-size-14">Gender</p>
                  <p class="custom-font-size-26"><?php echo $userdata['gender'];?></p>
                </div>
                <div class="col-md-2 col-6 mb-3">
                  <p class="font-weight-light">Marital status</p>
                  <p class="custom-font-size-26"><?php echo $userdata['marital_status'];?></p>
                </div>
                <div class="col-md-2 col-6 mb-3">
                  <p class="font-weight-light custom-font-size-14">Occupation</p>
                  <p class="custom-font-size-26"><?php echo $userdata['occupation'];?></p>
                </div>
                <div class="col-md-3 col-6 mb-3">
                  <p class="font-weight-light custom-font-size-14">DOB</p>
                  <p class="custom-font-size-26"><?php $date = strtotime($userdata['dob']); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date); echo $day.' '.$month.', '.$year; ?></p>
                </div>
                <div class="col-md-3 col-12 mb-3">
                  <p class="font-weight-light custom-font-size-14">Contract start / Move-in date</p>
                  <p class="custom-font-size-26"><?php $date = strtotime($userdata['moveInDate']); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date); echo $day.' '.$month.', '.$year; ?></p>
                </div>
                </div>
                <div class="row my-md-3">
                <div class="col-12">
                  <p class="font-weight-light custom-font-size-14">Company</p>
                  <p class="custom-font-size-26"><?php echo $userdata['company_name'];?></p>
                </div>
                </div>
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
          <a class="mr-3" href="#">Rentsmallsmall FAQ</a>
          <a class="mr-3" href="#">Buysmallsmall FAQ</a>
          <a class="mr-3" href="#">About Us</a>
          <a class="" href="#">Blog</a>
        </div>
      </nav>
    </div>
  </footer>

  <!-- Jquery js -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"
    crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"
    crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-js/bootstrap.min.js"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#tenantHistory").removeClass("show");
        $("#inspections").removeClass("show");
        $("#payoutHistory").removeClass("show");

        $("#tenantHistoryBtn").addClass("secondary-text-color");
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#inspectionsBtn").addClass("secondary-text-color");
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#payoutHistoryBtn").addClass("secondary-text-color");
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#currentBookingBtn").addClass("primary-text-color sub-menu--dashboard-active");
        $("#currentBookingBtn").removeClass("secondary-text-color");
      });

      $("#tenantHistoryBtn").click(function () {
        $("#tenantHistory").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#inspections").removeClass("show");
        $("#payoutHistory").removeClass("show");

        $("#tenantHistoryBtn").addClass("primary-text-color sub-menu--dashboard-active");
        $("#tenantHistoryBtn").removeClass("secondary-text-color");
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#currentBookingBtn").addClass("secondary-text-color");
        $("#payoutHistoryBtn").addClass("secondary-text-color");
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#inspectionsBtn").addClass("secondary-text-color");
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active");
      });

      $("#inspectionsBtn").click(function () {
        $("#inspections").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#tenantHistory").removeClass("show");
        $("#payoutHistory").removeClass("show");

        $("#tenantHistoryBtn").addClass("secondary-text-color");
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#currentBookingBtn").addClass("secondary-text-color");
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#payoutHistoryBtn").addClass("secondary-text-color");
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#inspectionsBtn").removeClass("secondary-text-color");
        $("#inspectionsBtn").addClass("primary-text-color sub-menu--dashboard-active");
      });

      $("#payoutHistoryBtn").click(function () {
        $("#payoutHistory").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#tenantHistory").removeClass("show");
        $("#inspections").removeClass("show");

        $("#tenantHistoryBtn").addClass("secondary-text-color");
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#currentBookingBtn").addClass("secondary-text-color");
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        $("#inspectionsBtn").addClass("secondary-text-color");
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active");

        $("#payoutHistoryBtn").removeClass("secondary-text-color");
        $("#payoutHistoryBtn").addClass("primary-text-color sub-menu--dashboard-active");
      });
    });
</script>
</body>

</html>