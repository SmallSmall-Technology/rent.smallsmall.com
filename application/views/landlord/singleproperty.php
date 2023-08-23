<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-css2/bootstrap.min.css" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="<?php echo base_url(); ?>assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/fontawesome/css/solid.css" rel="stylesheet" />


  <!-- custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/header.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/footer.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/booking.css" />


  <title>Single property</title>
</head>

<body>

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/rss-logo.svg" alt="logo">
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
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/dashboard-icon.svg" alt="">
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
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/logout.svg" alt="">
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
      <a class="text-decoration-none secondary-text-color mr-4 py-3 dashboard-active sub-menu--"
        href="<?php echo base_url('landlord/property'); ?>">
        <div class="sub-menu-link">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 " href="<?php echo base_url('landlord/subscriber'); ?>">
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
      <a class="text-decoration-none secondary-text-color py-3 dashboard-active" href="<?php echo base_url('landlord/property'); ?>">
        <div class="sub-menu-link  ">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3 " href="<?php echo base_url('landlord/subscriber'); ?>">
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
  <main class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-between">
        <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
          <span>Rentsmallsmall</span>
          <span>></span>
          <span>Dashboard</span>
          <span>></span>
          <span>Property</span>
          <span>></span>
          <span><?php echo $userdata['propertyTitle'] ?></span>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Property Info</p>
      </div>
      <div class="col-12 sub-nav">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active  px-0" id="currentBookingBtn" href="#"
              role="button">Property Info</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0 " id="tenantHistoryBtn" href="#" role="button">Tenant
              history</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0" id="inspectionsBtn" href="#" role="button">Inspections</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0 " id="payoutHistoryBtn" href="#" role="button">Payout
              History</a>
          </li>
        </nav>
      </div>

      <!-- Property info  -->
      <div class="col-12 mt-5 collapse show " id="currentBooking">
        <div class="primary-background p-md-5 p-3">
          <div class="row">
            <div class="col-12">
              <h3 class="address-title"><?php echo $userdata['propertyTitle'] ?></h3>
              <p><?php echo $userdata['address'] .','. $userdata['state_name']?></p>
            </div>
          </div>
          <div class="row my-5">
            <div class=" col-12 ">
              <p class="font-weight-light custom-font-size-14">Current Tenant</p>
              <div class="d-flex">
                <p class="custom-font-size-30 mr-3"><?php echo $userdata['firstName'] .','. $userdata['lastName']?></p>
                <a href="subscriber-profile.html" class="btn secondary-background px-3">View profile</a>
              </div>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-md-2 col-6 ">
              <p class="font-weight-light custom-font-size-14">Payout Amount</p>
              <p class="custom-font-size-26">&#8358;153,000</p>
            </div>
            <div class="col-md-2 col-6 ">
              <p class="font-weight-light">Service charge</p>
              <p class="custom-font-size-26">&#8358;<?php echo $userdata['serviceCharge']; ?></p>
            </div>
            <div class="col-md-2 col-6 ">
              <p class="font-weight-light custom-font-size-14">Payment plan</p>
              <p class="custom-font-size-26">Monthly</p>
            </div>
            <div class="col-md-2 col-6 ">
              <p class="font-weight-light custom-font-size-14">Tenancy Status</p>
              <p class="custom-font-size-26"><?php if(date('Y-m-d') < $userdata['available_date']){ echo 'Tenanted'; } else {echo 'Vacant';} ?></p>
            </div>
            <div class="col-md-3 col-6 ">
              <p class="font-weight-light custom-font-size-14">Listed date</p>
              <p class="custom-font-size-26">15 May, 2021<?php $date = strtotime($userdata['dateOfEntry']); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date);  echo $day.' '.$month.', '.$year; ?></p>
            </div>
          </div>
          <div class="row my-md-3">
            <div class="col-md-3 col-6 ">
              <p class="font-weight-light custom-font-size-14">Next Payout Date</p>
              <p class="custom-font-size-26"><?php $date = strtotime($userdata['available_date']); $year = date("Y", $date); $month = date("F", strtotime("+1 month", $date)); $day = date("d", $date); echo $month.' '.$day.', '.$year; ?></p>
            </div>
            <div class="col-md-3 col-6 ">
              <p class="font-weight-light custom-font-size-14">Total Payout Received</p>
              <p class="custom-font-size-26">&#8358;13,000,000</p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-3 col-12 custom-btn mb-2">
              <button class="btn font-weight-light  p-3 secondary-background w-100" type="button">Review Rent</button>
            </div>
            <div class="col-md-3 col-12 custom-btn mb-2">
              <button class="btn font-weight-light  p-3 secondary-background w-100" type="button">Request
                Termination</button>
            </div>

          </div>
        </div>

      </div>

      <!-- Tenant history-->
      <div class="col-12 mt-5 collapse" id="tenantHistory">
        <div class="primary-background table-responsive p-md-5">
          <p>This is the history of Subscribers who have rented this property in the past.</p>
          <table class="table mt-4">
            <thead class="secondary-background">
              <tr>
                <th scope="col">Subscription Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Marital Status</th>
                <th scope="col">Move in date <i style="font-size: 13px;" class="mx-2 fa-solid fa-arrow-right"></i>Move
                  out date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John Doe</td>
                <td>Male</td>
                <td>Married</td>
                <td>
                  <p class="d-flex align-items-center">15 May, 2021 <i style="font-size: 13px;"
                      class="mx-2 fa-solid fa-arrow-right"></i>
                    15 May, 2022</p>
                </td>
              </tr>
              <tr>
                <td>Mary John</td>
                <td>Female</td>
                <td>Married</td>
                <td>
                  <p class="d-flex align-items-center">15 May, 2021 <i style="font-size: 13px;"
                      class="mx-2 fa-solid fa-arrow-right"></i>
                    15 May, 2022</p>
                </td>
              </tr>
              <tr>
                <td>Sade Doe</td>
                <td>Female</td>
                <td>Single</td>
                <td>
                  <p class="d-flex align-items-center">15 May, 2021 <i style="font-size: 13px;"
                      class="mx-2 fa-solid fa-arrow-right"></i>
                    15 May, 2022</p>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>

      <!-- Inspections-->
      <div class="col-12 mt-5 collapse" id="inspections">
        <div class="primary-background table-responsive p-md-5">
          <div class="d-flex justify-content-between mb-4">
            <p>This is the history of Subscribers who have rented this property in the past.</p>
            <p>Total inspection: 200</p>
          </div>
          <table class="table">
            <thead class="secondary-background">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Comment</th>
      
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>20 May, 2021</td>
                <td>Interested</td>
                <td>Too dirty</td>
      
              </tr>
              <tr>
                <td>20 May, 2021</td>
                <td>Non Interested</td>
                <td>Too dirty</td>
      
              </tr>
              <tr>
                <td>20 May, 2021</td>
                <td>Interested</td>
                <td>Too dirty</td>
      
              </tr>
      
            </tbody>
          </table>
        </div>
      
      </div>
      
      <!-- Payout History-->
      <div class="col-12 mt-5 collapse" id="payoutHistory">
        <div class="primary-background table-responsive p-md-5">
          <div class="mb-4">
            <p>This is the history of payouts on this property.</p>
          </div>
          <table class="table">
            <thead class="secondary-background">
              <tr>
                <th scope="col">Amount</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Move in date</th>
      
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>&#8358;153,000</td>
                <td>er355479032039034</td>
                <td>20 May, 2021</td>
      
              </tr>
              <tr>
                <td>&#8358;153,000</td>
                <td>er355479032039034</td>
                <td>20 May, 2021</td>
      
              </tr>
              <tr>
                <td>&#8358;153,000</td>
                <td>er355479032039034</td>
                <td>20 May, 2021</td>
      
              </tr>
      
            </tbody>
          </table>
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
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" crossorigin="anonymous"></script>
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

        $("#tenantHistoryBtn").addClass("secondary-text-color")
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#inspectionsBtn").addClass("secondary-text-color")
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#payoutHistoryBtn").addClass("secondary-text-color")
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });

      $("#tenantHistoryBtn").click(function () {
        $("#tenantHistory").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#inspections").removeClass("show");
        $("#payoutHistory").removeClass("show");

        $("#tenantHistoryBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#tenantHistoryBtn").removeClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#payoutHistoryBtn").addClass("secondary-text-color")
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#inspectionsBtn").addClass("secondary-text-color")
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active")

      });

      $("#inspectionsBtn").click(function () {
        $("#inspections").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#tenantHistory").removeClass("show");
        $("#payoutHistory").removeClass("show");

        $("#tenantHistoryBtn").addClass("secondary-text-color")
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#payoutHistoryBtn").addClass("secondary-text-color")
        $("#payoutHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#inspectionsBtn").removeClass("secondary-text-color")
        $("#inspectionsBtn").addClass("primary-text-color sub-menu--dashboard-active")
      });

      $("#payoutHistoryBtn").click(function () {
        $("#payoutHistory").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#tenantHistory").removeClass("show");
        $("#inspections").removeClass("show");

        $("#tenantHistoryBtn").addClass("secondary-text-color")
        $("#tenantHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#inspectionsBtn").addClass("secondary-text-color")
        $("#inspectionsBtn").removeClass("primary-text-color sub-menu--dashboard-active")

        $("#payoutHistoryBtn").removeClass("secondary-text-color")
        $("#payoutHistoryBtn").addClass("primary-text-color sub-menu--dashboard-active")
      });

    });
  </script>


</body>

</html>