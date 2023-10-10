  <!-- <div class="container-fluid">

    <a href="https://buy.smallsmall.com/user/dashboard" class="btn special-link-button mt-3 d-md-inline-block d-none">
      <div>
        <p class="text-left" style="font-size: 10px;">Go to</p>
        <p class="text-right" style="font-size: 11px;">BuySmallsmall<br>dashboard</p>
      </div>
    </a>

  </div> -->

  <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap-css2/bootstrap.min.css" crossorigin="anonymous" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />


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
  <link rel="stylesheet" href="../assets/css/custom-css2/index.css" />


  <title>Dashboard Home</title>
</head>

<body>
  <!-- Preloader starts here -->
  <!-- <div id="preloader">
    <div class="loader"></div>
  </div> -->
  <!-- Preloader ends here -->

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
          <li class="nav-item d-flex align-items-center dashboard-active mr-4">
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
          <li class="nav-item d-flex align-items-center mr-4">
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
        <div class="mb-4 pl-2 dashboard-active">
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

        <div class="mb-4 pl-2">
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

  <main class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-between">
        <div style="color: #7D8993; font-size: 13px; font-weight: 300;" class="font-weight-lighter">
          <span>Rentsmallsmall</span>
          <span>></span>
          <span>Dashboard</span>
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
            <div class="d-flex justify-content-between">
              <p class="card-text">Property Occupancy Status</p>
              <div>
                <!-- <img src="./assets/images2/property-db-icon.svg" alt=""> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                  <g clip-path="url(#clip0_4869_321)">
                    <path
                      d="M17.5 22.4998H12.5C11.1213 22.4998 10 21.3785 10 19.9998V14.9998C10 13.621 11.1213 12.4998 12.5 12.4998H17.5C18.8787 12.4998 20 13.621 20 14.9998V19.9998C20 21.3785 18.8787 22.4998 17.5 22.4998ZM12.5 14.9998V19.9998H17.5025L17.5 14.9998H12.5ZM23.75 29.9998H6.25C2.80375 29.9998 0 27.196 0 23.7498V12.1548C0 10.0735 1.03 8.13602 2.755 6.97352L11.5037 1.06852C13.6275 -0.363984 16.3725 -0.363984 18.4963 1.06852L27.2463 6.97352C28.97 8.13602 30 10.0723 30 12.1548V23.7498C30 27.196 27.1963 29.9998 23.75 29.9998ZM15 2.49602C14.27 2.49602 13.54 2.71102 12.9025 3.14227L4.1525 9.04602C3.1175 9.74352 2.5 10.9048 2.5 12.1535V23.7485C2.5 25.816 4.1825 27.4985 6.25 27.4985H23.75C25.8175 27.4985 27.5 25.816 27.5 23.7485V12.1548C27.5 10.906 26.8825 9.74352 25.8488 9.04727L17.0975 3.14227C16.46 2.71102 15.73 2.49602 15 2.49602Z"
                      fill="#9BD7F6" />
                  </g>
                  <defs>
                    <clipPath id="clip0_4869_321">
                      <rect width="30" height="30" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </div>
            </div>
            <div class="mt-3">
              
            <?php 
                
              foreach($proptys as $propty => $value)
              {
                $propTitle = $value['propertyTitle'];

                if(date('Y-m-d') < $value['available_date'])
                {
                  echo '<div class="custom-font-size-14 d-flex justify-content-between w-100"><p>'.$propTitle.'</p>
                  <p class="success-color d-flex justify-content-between"><span class="mr-1"> <img src="../assets/images2/rented-circle.svg" alt=""> </span>rented</p></div>';
                } 

                else
                {
                  echo '<div class="custom-font-size-14 d-flex justify-content-between w-100"><p>'.$propTitle.'</p>
                  <p class="danger-color d-flex justify-content-between"><span class="mr-1"> <img src="../assets/images2/vacant-circle.svg" alt=""> </span>vacant</p></div>';
                }
              }

            ?>

            </div>

            <div class="text-right mt-5">
              <a href="my-property.html" class="btn secondary-background">View property</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-12  mb-4">
        <div class="card card-custom">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between">
                <p class="card-text">Payout</p>
                <div>
                  <!-- <img src="./assets/images2/payout-db-icon.svg" alt=""> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path
                      d="M16.25 18.75L15.5429 19.4571L14.8358 18.75L15.5429 18.0429L16.25 18.75ZM27.5 17.75C28.0523 17.75 28.5 18.1977 28.5 18.75C28.5 19.3023 28.0523 19.75 27.5 19.75L27.5 17.75ZM21.7929 25.7071L15.5429 19.4571L16.9571 18.0429L23.2071 24.2929L21.7929 25.7071ZM15.5429 18.0429L21.7929 11.7929L23.2071 13.2071L16.9571 19.4571L15.5429 18.0429ZM16.25 17.75L27.5 17.75L27.5 19.75L16.25 19.75L16.25 17.75Z"
                      fill="#9BD7F6" />
                    <path
                      d="M13.75 11.25L14.4571 11.9571L15.1642 11.25L14.4571 10.5429L13.75 11.25ZM2.5 10.25C1.94771 10.25 1.5 10.6977 1.5 11.25C1.5 11.8023 1.94771 12.25 2.5 12.25V10.25ZM8.20711 18.2071L14.4571 11.9571L13.0429 10.5429L6.79289 16.7929L8.20711 18.2071ZM14.4571 10.5429L8.20711 4.29289L6.79289 5.70711L13.0429 11.9571L14.4571 10.5429ZM13.75 10.25H2.5V12.25H13.75V10.25Z"
                      fill="#9BD7F6" />
                  </svg>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <h3 class="card-title mb-0 mr-3">&#8358;250,000</h3><small class="success-color">Paid</small>
              </div>

              <div class="d-flex justify-content-between mt-3">
                <div>
                  <p class="custom-font-size-14">Next payout</p>
                  <p></p>July 30, 2023</p>
                </div>
                <div class="custom-font-size-14 mr-md-5 mr-3">
                  <p class="custom-font-size-14">Total revenue</p>
                  <p>&#8358;10m</p>
                </div>

              </div>
            </div>

            <div class="text-right mt-4">
              <a href="#" class="btn secondary-background">View more</a>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 col-12  mb-4">
        <div class="card card-custom">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between">
                <p class="card-text">Repair request</p>
                <div>
                  <!-- <img src="./assets/images2/repair-db-icon.svg" alt=""> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <g clip-path="url(#clip0_4869_317)">
                      <path
                        d="M4.60982 30.0005C4.56982 30.0005 4.53107 30.0005 4.49107 30.0005C3.21357 29.9668 2.03732 29.423 1.17982 28.4705C-0.406434 26.7093 -0.266434 23.7405 1.48482 21.9893L8.81982 14.6555C9.13607 14.338 9.24982 13.8668 9.12107 13.3943C8.67357 11.7468 8.62982 10.0493 8.99357 8.34926C9.87857 4.20551 13.2823 0.919258 17.4648 0.171758C18.7223 -0.0532415 19.9836 -0.0582415 21.2173 0.163008C22.1311 0.324258 22.8411 0.944259 23.1173 1.81926C23.4311 2.81801 23.1136 3.92051 22.2648 4.76801L19.4561 7.53926C18.6336 8.36176 18.5086 9.65176 19.1786 10.4705C19.5636 10.943 20.1061 11.218 20.7061 11.248C21.2961 11.273 21.8761 11.0543 22.2948 10.6368L25.5198 7.44926C26.1936 6.77551 27.1848 6.53051 28.1073 6.82301C29.0111 7.10676 29.6748 7.85801 29.8386 8.78176C30.0573 10.0155 30.0536 11.2793 29.8298 12.5355C29.0798 16.7193 25.7936 20.123 21.6498 21.0068C19.9461 21.3705 18.2486 21.3268 16.6048 20.878C16.1336 20.748 15.6623 20.863 15.3448 21.1793L7.87482 28.648C7.01232 29.5105 5.82857 30.0005 4.60982 30.0005ZM19.5123 2.49176C18.9848 2.49176 18.4448 2.53551 17.9048 2.63176C14.7123 3.20301 12.1123 5.71051 11.4373 8.87051C11.1573 10.1768 11.1898 11.478 11.5323 12.7368C11.8948 14.0643 11.5323 15.4755 10.5873 16.4218L3.25232 23.7555C2.43982 24.568 2.33732 26.018 3.03857 26.7968C3.43232 27.2343 3.97232 27.4843 4.55732 27.4993C5.13357 27.523 5.69357 27.2955 6.10857 26.8818L13.5773 19.413C14.5211 18.4693 15.9336 18.1043 17.2623 18.4668C18.5173 18.8093 19.8186 18.8418 21.1286 18.5618C24.2886 17.888 26.7961 15.2893 27.3686 12.0943C27.5411 11.1293 27.5436 10.1605 27.3761 9.21801V9.20926L24.0573 12.408C23.1461 13.3193 21.8773 13.828 20.5811 13.743C19.2861 13.678 18.0698 13.0618 17.2448 12.0518C15.7711 10.253 15.9686 7.49051 17.6961 5.76426L20.5048 2.99301C20.7286 2.76801 20.7436 2.60051 20.7348 2.56676C20.3411 2.51801 19.9311 2.48926 19.5148 2.48926L19.5123 2.49176Z"
                        fill="#9BD7F6" />
                    </g>
                    <defs>
                      <clipPath id="clip0_4869_317">
                        <rect width="30" height="30" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </div>
              </div>
              <div class="mt-3">
                <?php 
                
                  foreach($proptys as $propty => $value)
                  {
                    $propId = $value['propertyID'];

                    $data =  $this->landlord_model->get_repairs($propId);

                    foreach ($data->result() as $row) 
                    {
                      if($row->repair_status == 'waiting')
                      {
                          echo '<p class="d-flex justify-content-between "><span class="custom-font-size-14">'.$row->repair_type.'</span><span
                          class="custom-font-size-12 danger-color">Waiting
                          for your
                          approval</span></p>';
                      }

                      elseif($row->repair_status == 'Processing')
                      {
                          echo '<p class="d-flex justify-content-between "><span class="custom-font-size-14">'.$row->repair_type.'</span><span
                          class="custom-font-size-12 in-progress-color">In
                          progress</span></p>';
                      }

                      elseif($row->repair_status == 'completed')
                      {
                          echo '<p class="d-flex justify-content-between "><span class="custom-font-size-14">'.$row->repair_type.'</span><span
                          class="custom-font-size-12 in-progress-color">Completed</span></p>';
                      }
                      
                    }

                  }

                ?>
                
              </div>
            </div>

            <div class="text-right mt-4">
              <a href="#" class="btn secondary-background">View</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-4 col-12 mb-4">
        <div class="card card-custom">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between">
                <p class="card-text">Subscribers</p>
                <div>
                  <!-- <img src="./assets/images2/subscriber-db-icon.svg" alt=""> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <g clip-path="url(#clip0_4869_319)">
                      <path
                        d="M27.2463 6.92371L18.4963 1.01871C16.3725 -0.413789 13.6275 -0.413789 11.5037 1.01871L2.75375 6.92371C1.02875 8.08871 0 10.025 0 12.1062V23.75C0 27.1962 2.80375 30 6.25 30H23.75C27.1963 30 30 27.1962 30 23.75V12.1062C30 10.0262 28.9713 8.08871 27.2463 6.92371ZM10 27.5C10 24.7425 12.2425 22.5 15 22.5C17.7575 22.5 20 24.7425 20 27.5H10ZM27.5 23.75C27.5 25.8175 25.8175 27.5 23.75 27.5H22.5C22.5 23.3637 19.1362 20 15 20C10.8638 20 7.5 23.3637 7.5 27.5H6.25C4.1825 27.5 2.5 25.8175 2.5 23.75V12.1062C2.5 10.8575 3.1175 9.69496 4.1525 8.99746L12.9025 3.09246C13.54 2.66246 14.27 2.44746 15 2.44746C15.73 2.44746 16.46 2.66246 17.0975 3.09246L25.8475 8.99746C26.8825 9.69621 27.5 10.8575 27.5 12.1062V23.75ZM15 8.74996C12.2425 8.74996 10 10.9925 10 13.75C10 16.5075 12.2425 18.75 15 18.75C17.7575 18.75 20 16.5075 20 13.75C20 10.9925 17.7575 8.74996 15 8.74996ZM15 16.25C13.6213 16.25 12.5 15.1287 12.5 13.75C12.5 12.3712 13.6213 11.25 15 11.25C16.3787 11.25 17.5 12.3712 17.5 13.75C17.5 15.1287 16.3787 16.25 15 16.25Z"
                        fill="#9BD7F6" />
                    </g>
                    <defs>
                      <clipPath id="clip0_4869_319">
                        <rect width="30" height="30" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </div>
              </div>
              <h3 class="card-title">
              <?php  
                $num = 0;

                foreach($proptys as $propty => $value)
                {
                  $propId = $value['propertyID'];

                  $data =  $this->landlord_model->get_subscriber($propId);

                  foreach ($data->result() as $row) 
                  {
                    if(date('Y-m-d') <= $row->available_date)
                    {
                      $num += 1;
                    }          
                  }
                }

                echo $num;
              ?></h3>
            </div>
            <div class="text-right mt-4">
              <a href="#" class="btn secondary-background">View</a>
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
          <a class="mr-3" href="#">Blog</a>
          <a class="mr-3" href="#">Withdraw Data Consent</a>
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
    // $(document).ready(function () {
    const preloader = $("#preloader");
    window.addEventListener("load", function () {
      preloader.css("display", "none");
    });
        // });
  </script>


</body>

</html>