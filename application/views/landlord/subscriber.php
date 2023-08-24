<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap-css2/bootstrap.min.css" crossorigin="anonymous" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />


  <!-- custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom-css2/header.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/footer.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/booking.css" />


  <title>My property | Subscriber</title>
</head>

<body>

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
      <a class="navbar-brand">
        <img class="img-fluid" src="../assets/images2/rss-logo.svg" alt="logo">
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
                <img class="img-fluid" src="../assets/images2/dashboard-icon.svg" alt="">
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
                <img class="img-fluid" src="../assets/images2/inbox-icon.svg" alt="" />
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
                <img class="img-fluid" src="../assets/images2/myProperty-icon.svg" alt="">
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
                <img class="img-fluid" src="../assets/images2/payout-icon.svg" alt="">
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
                <img class="img-fluid" src="../assets/images2/profile-icon.svg" alt="">
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
            <img class="img-fluid" src="../assets/images2/logout.svg" alt="">
          </span>
        </a>


      </div>
    </nav>

    <!-- mobile menu bar -->
    <nav class="navbar d-flex menu-navbar-bg nav-mobile d-flex d-lg-none">
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="../assets/images2/menu-burger.svg" alt="">
      </button>
      <a href="#" style="width: 33%" class="flex-grow-1 text-center">
        <img class="img-fluid" src="../assets/images2/rss-logo.svg" alt="logo">
      </a>
      <div class="d-flex user-container">
        <div class="user-shorthand d-flex justify-content-center align-items-center mr-2">
          <p class="m-0">JD</p>
          <div class="active-user"></div>
        </div>

      </div>
      <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
        data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <img class="img-fluid" src="../assets/images2/user-mobile2.svg" alt="">
      </div>


      <div class="dropdown-menu menu_icon--dropdown p-0  logout-dropdown">
        <!-- Menu mobile view -->
        <div class=" menu-desktop py-2 px-4 d-flex flex-column">
          <a href="#">
            <span class="navbar-text text-dark mr-5">
              <img class="img-fluid" src="../assets/images2/logout.svg" alt="">
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
              <img class="img-fluid" src="../assets/images2/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/inbox'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images2/inbox-icon.svg" alt="">
              &nbsp;&nbsp; Notification
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2 dashboard-active">
          <p>
            <a href="<?php echo base_url('landlord/property'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images2/myProperty-icon.svg" alt="">
              &nbsp;&nbsp; MyProperty
            </a>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/wallet'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images2/payout-icon.svg" alt="">
              &nbsp;&nbsp; Payout
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/profile'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images2/profile-icon.svg" alt="">
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
  <main class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-between">
        <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
          <span>Rentsmallsmall</span>
          <span>></span>
          <span>Dashboard</span>
          <span>></span>
          <span>Subscriber</span>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Subscriber</p>
      </div>
      <div class="col-12 sub-nav">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active  px-0" id="currentBookingBtn" href="#"
              role="button">Subscriber list</a>
          </li>
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color px-0" id="currentBookingBtn" href="#" role="button">History</a>
          </li>

        </nav>
      </div>

      <div class="col-12 mt-5 collapse show" id="gift">
        <div class="p-md-5 p-4 primary-background">
          <div class="row">

          <?php foreach($usersdata as $propty => $value){ ?>
            <div class="col-md-4 col-12  mb-4">
              <div class="card default-background border-0">
                <div class="card-body">
                  <div class="d-flex justify-content-between mb-2">
                    <!-- <img class="img-fluid" src="../assets/images2/agreement2.svg" alt=""> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                      <path
                        d="M27.2463 6.92371L18.4963 1.01871C16.3725 -0.413789 13.6275 -0.413789 11.5037 1.01871L2.75375 6.92371C1.02875 8.08871 0 10.025 0 12.1062V23.75C0 27.1962 2.80375 30 6.25 30H23.75C27.1963 30 30 27.1962 30 23.75V12.1062C30 10.0262 28.9713 8.08871 27.2463 6.92371ZM10 27.5C10 24.7425 12.2425 22.5 15 22.5C17.7575 22.5 20 24.7425 20 27.5H10ZM27.5 23.75C27.5 25.8175 25.8175 27.5 23.75 27.5H22.5C22.5 23.3637 19.1362 20 15 20C10.8638 20 7.5 23.3637 7.5 27.5H6.25C4.1825 27.5 2.5 25.8175 2.5 23.75V12.1062C2.5 10.8575 3.1175 9.69496 4.1525 8.99746L12.9025 3.09246C13.54 2.66246 14.27 2.44746 15 2.44746C15.73 2.44746 16.46 2.66246 17.0975 3.09246L25.8475 8.99746C26.8825 9.69621 27.5 10.8575 27.5 12.1062V23.75ZM15 8.74996C12.2425 8.74996 10 10.9925 10 13.75C10 16.5075 12.2425 18.75 15 18.75C17.7575 18.75 20 16.5075 20 13.75C20 10.9925 17.7575 8.74996 15 8.74996ZM15 16.25C13.6213 16.25 12.5 15.1287 12.5 13.75C12.5 12.3712 13.6213 11.25 15 11.25C16.3787 11.25 17.5 12.3712 17.5 13.75C17.5 15.1287 16.3787 16.25 15 16.25Z"
                        fill="#222224" />
                    </svg>
                    <p class="custom-font-size-14 font-weight-light"><?php $date = strtotime($value['transaction_date']); $year = date("Y", $date); $month = date("F", $date);  echo $month.' '.$year; ?></p>
                  </div>
                  <div class="mt-3">
                    <P class="custom-font-size-18"><?php if($value['gender'] == 'Male'){ $mr = 'Mr'; echo $mr .' '.$value['firstName'].' '.$value['lastName'];} elseif($value['gender'] == 'female'){$mrs = 'Miss'; echo $mrs .' '.$value['firstName'].' '.$value['lastName'];} ?></P>
                    <p class="custom-font-size-14"><?php echo $value['propertyTitle']; ?> </p>

                    <div class="mt-4">
                      <a href="<?php echo base_url('landlord/subscriber_profile/'.$value['tenant_id']); ?>" class="btn secondary-background px-5">View</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <?php } ?>


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
  <script src="../assets/js/jquery.min.js" crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="../assets/js/popper.min.js" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap-js/bootstrap.min.js" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#checklist").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });
      $("#checklistBtn").click(function () {
        $("#checklist").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#checklistBtn").removeClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

      });
      $("#historyBtn").click(function () {
        $("#history").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#checklist").removeClass("show");

        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#historyBtn").removeClass("secondary-text-color")
        $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
      });

    });
  </script>


</body>

</html>