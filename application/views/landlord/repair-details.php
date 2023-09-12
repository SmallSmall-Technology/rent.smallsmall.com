<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-css2/bootstrap.min.css" crossorigin="anonymous" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-css2/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />


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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css2/index.css" />


  <title>Dashboard Home</title>
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
          <li class="nav-item d-flex align-items-center dashboard-active mr-4">
            <div class="menu-text">
              <a href="index.html" class=" text-dark" style="text-decoration: none;">Dashboard</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="notification.html" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2 position-relative">
                <div class="notification-circle d-md-flex d-none justify-content-center align-items-center">2</div>
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/inbox-icon.svg" alt="" />
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="notification.html" class=" text-dark" style="text-decoration: none;">Notification</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="#" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/myProperty-icon.svg" alt="">
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mr-4">
            <div class="menu-text">
              <a href="my-property.html" class=" text-dark" style="text-decoration: none;">My property</a>
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
              <a href="payout.html" class=" text-dark" style="text-decoration: none;">Payout</a>
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
              <a href="profile.html" class=" text-dark" style="text-decoration: none;">Profile</a>
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
        <div class="mb-4 pl-2 dashboard-active">
          <p>
            <a href="index.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="notification.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/inbox-icon.svg" alt="">
              &nbsp;&nbsp; Notification
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="booking.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/myProperty-icon.svg" alt="">
              &nbsp;&nbsp; MyProperty
            </a>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="wallet.html" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/images2/payout-icon.svg" alt="">
              &nbsp;&nbsp; Payout
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="profile.html" class=" text-dark" style="text-decoration: none;">
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
      <a class="text-decoration-none secondary-text-color mr-4 py-3  " href="my-property.html">
        <div class="sub-menu-link  ">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="subscriber.html">
        <div class="sub-menu-link  ">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 sub-menu--dashboard-active" href="repair.html">
        <div class="sub-menu-link  ">
          Repair
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="property-agreement.html">
        <div class="sub-menu-link  ">
          Property Agreement
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="transactions.html">
        <div class="sub-menu-link  ">
          Transactions
        </div>
      </a>
    </div>
  </div>

  <!-- Sub menu mobile view for property section starts here -->
  <div class="container-fluid d-block d-md-none nav-bottom-color sub-menu">
    <div class="sub-nav d-flex justify-content-between ">
      <a class="text-decoration-none secondary-text-color py-3  " href="property.html">
        <div class="sub-menu-link  ">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3" href="subscriber.html">
        <div class="sub-menu-link  ">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3 sub-menu--dashboard-active" href="repair.html">
        <div class="sub-menu-link  ">
          Repair
        </div>
      </a>
      <div class="dropdown align-self-center py-3 ">
        <a class="text-decoration-none secondary-text-color" href="#" role="button" data-toggle="dropdown"
          aria-expanded="false">
          More
          <i class="fa-solid fa-caret-down"></i>
        </a>

        <div class="dropdown-menu custom-dropdown-menu primary-background border-0 ">
          <a class="dropdown-item secondary-text-color custom-dropdown-active" href="property-rating.html">Property
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
        <div class="row ">
          <div class="col-12 d-flex justify-content-between">
            <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
              <span>Rentsmallsmall</span>
              <span>></span>
              <span>Dashboard</span>
              <span>></span>
              <span>Repairs</span>
              <span>></span>
              <span>Current repair request</span>
              <span>></span>
              <span><?php echo $repairdata['propertyTitle'] ?></span>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-12 mt-5">
            <p style="font-size: 22px;">Repairs Request</p>
          </div>
          <div class="col-12">
            <nav class="nav sub-nav">
              <li class="nav-item mr-3 ">
                <a class="nav-link primary-text-color   sub-menu--dashboard-active px-0" id="currentBookingBtn" href="#"
                  role="button">Repair Details</a>
              </li>
            </nav>
          </div>

          <!-- Repair request Details -->
          <div class="col-12 mt-5 collapse show " id="currentBooking">
            <div class="primary-background p-5 ">
              <div class="row">
                <div class="col-12 my-4">
                  <p class="property-name"><?php echo $repairdata['propertyTitle'] ?></p>
                  <p class="custom-font-size-18"><?php echo $repairdata['city'] .','. $repairdata['stateName']?></p>
                </div>
                <div class="col-12 my-4">
                  <p class="custom-font-size-14">Type of Issue</p>
                  <p class="custom-font-size-22"><?php echo $repairdata['repair_type'] ?></p>
                </div>
                <div class="col-12 my-4">
                  <p class="custom-font-size-14 mb-3">Details of fix</p>
                  <div class="detail-container">
                    <p><?php echo $repairdata['repairDetails'] ?></p>
                  </div>
                </div>
                <div class="col-md-12 my-4">
                  <p class="d-inline-block custom-font-size-14">Photos</p>
                </div>
                <div class="col-md-12">
                  <div class="checkin-pictures d-flex flex-wrap">
                    <div class="checkin-pictures-item  mr-3 mb-3">
                      <img class="img-fluid" src="<?php echo base_url(); ?>uploads/agreement/<?php echo $repairdata['filename']; ?>" width = "100px" alt="">
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <p>Timeline of resolution</p>
                  <div class="order-track m-4">
                    <div class="order-track-step">
                      <div class="order-track-status">
                        <span class="order-track-status-dot d-flex justify-content-center align-items-center"><i
                            class="fa-solid fa-check text-white"></i></span>
                        <span class="order-track-status-line"></span>
                      </div>
                      <div class="order-track-text">
                        <span class="order-track-text-sub">Waiting for approval</span>
                      </div>
                    </div>

                    <div class="order-track-step">
                      <div class="order-track-status">
                        <span class="order-track-status-dot"></span>
                        <span class="order-track-status-line"></span>
                      </div>
                      <div class="order-track-text">
                        <span class="order-track-text-sub">Approved & paid</span>
                      </div>
                    </div>
                    <div class="order-track-step">
                      <div class="order-track-status">
                        <span class="order-track-status-dot"></span>
                        <!-- <span class="order-track-status-line"></span> -->
                      </div>
                      <div class="order-track-text">
                        <span class="order-track-text-sub">Repair in progress</span>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-3 col-12 my-3">
                  <p class="custom-font-size-14">Cost of repairs</p>
                  <p class="custom-font-size-26">&#8358;<?php echo $repairdata['cost']; ?></p>
                </div>
                <div class="col-md-8 col-12 my-3">
                  <p class="custom-font-size-14">Cost of repairs</p>
                  <p class="custom-font-size-26">RentSmallsmall, Providus Bank, 102388394</p>
                </div>
                <div class="col-12 my-5">
                  <button class="btn secondary-background-btn  px-5 py-3 ">Approve</button>
                  <button class="btn success-color-bg px-4 py-3 d-none">Approved</button>
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
  <script src="./assets/js/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="./assets/js/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="./assets/js/bootstrap-js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#checklist").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color sub-menu--dashboard-active ")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active ")
        $("#currentBookingBtn").addClass("primary-text-color sub-menu--dashboard-active ")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });
      $("#checklistBtn").click(function () {
        $("#checklist").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("primary-text-color sub-menu--dashboard-active ")
        $("#checklistBtn").removeClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active ")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active ")

      });
      $("#historyBtn").click(function () {
        $("#history").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#checklist").removeClass("show");

        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color sub-menu--dashboard-active ")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active ")
        $("#historyBtn").removeClass("secondary-text-color")
        $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active ")
      });

    });
  </script>


</body>

</html>