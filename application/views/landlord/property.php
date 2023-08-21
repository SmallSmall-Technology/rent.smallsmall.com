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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />


  <!-- custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom-css2/header.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/footer.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/booking.css" />


  <title>My property</title>
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
      <a class="text-decoration-none secondary-text-color mr-4 py-3  sub-menu--dashboard-active"
        href="<?php echo base_url('landlord/property'); ?>">
        <div class="sub-menu-link">
          Property
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('landlord/subscriber'); ?>">
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
      <a class="text-decoration-none secondary-text-color py-3" href="<?php echo base_url('landlord/subscriber'); ?>">
        <div class="sub-menu-link  ">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3" href="<?php echo base_url('landlord/repair'); ?>">
        <div class="sub-menu-link  ">
          Repair
        </div>
      </a>
      <div class="dropdown align-self-center py-3 sub-menu--dashboard-active">
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
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">All property</p>
      </div>
      <div class="col-12 sub-nav">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active  px-0" id="currentBookingBtn" href="#"
              role="button">Property list</a>
          </li>

        </nav>
      </div>

      <div class="col-12 mt-5 collapse show" id="gift">
        <div class="p-md-5 p-4 primary-background">
          <div class="row">

            <?php foreach($proptys as $propty => $value){ ?>

            <div class="col-md-4 col-12  mb-4">
              <div class="card default-background border-0">
                <div class="card-body pb-5">
                  <div class="d-flex justify-content-between mb-2">
                    <!-- <img class="img-fluid" src="../assets/images2/agreement2.svg" alt=""> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                      <g clip-path="url(#clip0_4862_265)">
                        <path
                          d="M8.33333 27.0833H14.5833V31.25H8.33333V27.0833ZM18.75 31.25H25V27.0833H18.75V31.25ZM8.33333 39.5833H14.5833V35.4167H8.33333V39.5833ZM18.75 39.5833H25V35.4167H18.75V39.5833ZM8.33333 14.5833H14.5833V10.4167H8.33333V14.5833ZM18.75 14.5833H25V10.4167H18.75V14.5833ZM8.33333 22.9167H14.5833V18.75H8.33333V22.9167ZM18.75 22.9167H25V18.75H18.75V22.9167ZM50 16.6667V50H0V6.25C0 4.5924 0.65848 3.00268 1.83058 1.83058C3.00268 0.65848 4.5924 0 6.25 0L27.0833 0C28.7409 0 30.3306 0.65848 31.5028 1.83058C32.6749 3.00268 33.3333 4.5924 33.3333 6.25V10.4167H43.75C45.4076 10.4167 46.9973 11.0751 48.1694 12.2472C49.3415 13.4194 50 15.0091 50 16.6667ZM29.1667 6.25C29.1667 5.69747 28.9472 5.16756 28.5565 4.77686C28.1658 4.38616 27.6359 4.16667 27.0833 4.16667H6.25C5.69747 4.16667 5.16756 4.38616 4.77686 4.77686C4.38616 5.16756 4.16667 5.69747 4.16667 6.25V45.8333H29.1667V6.25ZM45.8333 16.6667C45.8333 16.1141 45.6138 15.5842 45.2231 15.1935C44.8324 14.8028 44.3025 14.5833 43.75 14.5833H33.3333V45.8333H45.8333V16.6667ZM37.5 31.25H41.6667V27.0833H37.5V31.25ZM37.5 39.5833H41.6667V35.4167H37.5V39.5833ZM37.5 22.9167H41.6667V18.75H37.5V22.9167Z"
                          fill="#222224" />
                      </g>
                      <defs>
                        <clipPath id="clip0_4862_265">
                          <rect width="50" height="50" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                    <p class="custom-font-size-14 font-weight-light">Listed <?php $date = strtotime($value['dateOfEntry']); $date = date('Y-m-d', $date); echo $date; ?><br><?php if(date('Y-m-d') < $value['available_date']){ echo 'rented'; } else{ echo 'vacant'; }
                    ?>
                   </p>
                  </div>
                  <div class="mt-3">
                    <p class="card-text"><?php echo $value['propertyTitle'];?></p>

                    <div class="mt-3">
                      <a href="<?php echo base_url('landlord/single_property'); ?>" class="btn secondary-background px-5">View</a>
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