<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap-css2/bootstrap.min.css"
    
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />


  <!-- custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom-css2/header.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/footer.css" />
  <link rel="stylesheet" href="../assets/css/custom-css2/requestRepair.css" />


  <title>My property | Repairs</title>
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
      <a class="text-decoration-none secondary-text-color mr-4 py-3 " href="<?php echo base_url('landlord/subscriber'); ?>">
        <div class="sub-menu-link">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 dashboard-active" href="<?php echo base_url('landlord/repair'); ?>">
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
      <a class="text-decoration-none secondary-text-color py-3 " href="<?php echo base_url('landlord/subscriber'); ?>">
        <div class="sub-menu-link  ">
          Subscriber
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color py-3  dashboard-active" href="<?php echo base_url('landlord/repair'); ?>">
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
        <div class="row ">
          <div class="col-12 d-flex justify-content-between">
            <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
              <span>Rentsmallsmall</span>
              <span>></span>
              <span>Dashboard</span>
              <span>></span>
              <span>Repairs</span>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-12 mt-5">
            <p style="font-size: 22px;">Repairs</p>
          </div>
          <div class="col-12">
            <nav class="nav sub-nav">
              <li class="nav-item mr-3 ">
                <a class="nav-link primary-text-color   sub-menu--dashboard-active px-0" id="currentBookingBtn" href="#"
                  role="button">Current Repair Request</a>
              </li>

              <li class="nav-item mr-3">
                <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">Repair History</a>
              </li>
            </nav>
          </div>

          <!-- Current Repair Request -->
          <div class="col-12 mt-5 collapse show " id="currentBooking">
            <div class="primary-background p-5 ">
              <div class="row">

              <?php

              foreach($proptys as $propty => $value)
              {
                    $propId = $value['propertyID'];

                    $data =  $this->landlord_model->get_repairs($propId);

                    foreach ($data->result() as $row) 
                    {
                      $date = strtotime($row->entry_date); $year = date("Y", $date); $month = date("F", strtotime("+1 month", $date)); $day = date("d", $date);

                      if($row->repair_status == 'waiting')
                      {
                        echo '
                        <div class="col-md-4 col-12  mb-4">
                          <div class="card default-background border-0">
                            <div class="card-body pb-5">
                              <div class="d-flex justify-content-between mb-2">
                                <!-- <img class="img-fluid" src="../assets/images2/agreement2.svg" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                  <g clip-path="url(#clip0_4897_470)">
                                    <path
                                      d="M4.60982 30.0005C4.56982 30.0005 4.53107 30.0005 4.49107 30.0005C3.21357 29.9668 2.03732 29.423 1.17982 28.4705C-0.406434 26.7093 -0.266434 23.7405 1.48482 21.9893L8.81982 14.6555C9.13607 14.338 9.24982 13.8668 9.12107 13.3943C8.67357 11.7468 8.62982 10.0493 8.99357 8.34926C9.87857 4.20551 13.2823 0.919258 17.4648 0.171758C18.7223 -0.0532415 19.9836 -0.0582415 21.2173 0.163008C22.1311 0.324258 22.8411 0.944259 23.1173 1.81926C23.4311 2.81801 23.1136 3.92051 22.2648 4.76801L19.4561 7.53926C18.6336 8.36176 18.5086 9.65176 19.1786 10.4705C19.5636 10.943 20.1061 11.218 20.7061 11.248C21.2961 11.273 21.8761 11.0543 22.2948 10.6368L25.5198 7.44926C26.1936 6.77551 27.1848 6.53051 28.1073 6.82301C29.0111 7.10676 29.6748 7.85801 29.8386 8.78176C30.0573 10.0155 30.0536 11.2793 29.8298 12.5355C29.0798 16.7193 25.7936 20.123 21.6498 21.0068C19.9461 21.3705 18.2486 21.3268 16.6048 20.878C16.1336 20.748 15.6623 20.863 15.3448 21.1793L7.87482 28.648C7.01232 29.5105 5.82857 30.0005 4.60982 30.0005ZM19.5123 2.49176C18.9848 2.49176 18.4448 2.53551 17.9048 2.63176C14.7123 3.20301 12.1123 5.71051 11.4373 8.87051C11.1573 10.1768 11.1898 11.478 11.5323 12.7368C11.8948 14.0643 11.5323 15.4755 10.5873 16.4218L3.25232 23.7555C2.43982 24.568 2.33732 26.018 3.03857 26.7968C3.43232 27.2343 3.97232 27.4843 4.55732 27.4993C5.13357 27.523 5.69357 27.2955 6.10857 26.8818L13.5773 19.413C14.5211 18.4693 15.9336 18.1043 17.2623 18.4668C18.5173 18.8093 19.8186 18.8418 21.1286 18.5618C24.2886 17.888 26.7961 15.2893 27.3686 12.0943C27.5411 11.1293 27.5436 10.1605 27.3761 9.21801V9.20926L24.0573 12.408C23.1461 13.3193 21.8773 13.828 20.5811 13.743C19.2861 13.678 18.0698 13.0618 17.2448 12.0518C15.7711 10.253 15.9686 7.49051 17.6961 5.76426L20.5048 2.99301C20.7286 2.76801 20.7436 2.60051 20.7348 2.56676C20.3411 2.51801 19.9311 2.48926 19.5148 2.48926L19.5123 2.49176Z"
                                      fill="#222224" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_4897_470">
                                      <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                                <p class="custom-font-size-14 font-weight-light">'.$month.' '.$day.', '.$year.';</p>
                              </div>
                              <div class="mt-3">
                                <p class="card-text" style="font-size: 18px; font-weight: 500;">'.$row->repair_category.'</p>
                                <p class="card-text" style="font-size: 12px">'.$row->propertyTitle.'</p>
        
                                <div class="mt-3">
                                  <a href="single-property.html" class="btn secondary-background  px-3"
                                    style="border-radius: 17px;">Waiting your approval</a>
                                </div>
        
                                <div class="mt-3">
                                  <a href="single-property.html" class="btn secondary-background px-3">View details</a>
                                </div>
                              </div>
        
                            </div>
                          </div>
                        </div>';
                      }

                      else
                      {
                        echo '
                        <div class="col-md-4 col-12  mb-4">
                          <div class="card default-background border-0">
                            <div class="card-body pb-5">
                              <div class="d-flex justify-content-between mb-2">
                                <!-- <img class="img-fluid" src="../assets/images2/agreement2.svg" alt=""> -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                  <g clip-path="url(#clip0_4897_470)">
                                    <path
                                      d="M4.60982 30.0005C4.56982 30.0005 4.53107 30.0005 4.49107 30.0005C3.21357 29.9668 2.03732 29.423 1.17982 28.4705C-0.406434 26.7093 -0.266434 23.7405 1.48482 21.9893L8.81982 14.6555C9.13607 14.338 9.24982 13.8668 9.12107 13.3943C8.67357 11.7468 8.62982 10.0493 8.99357 8.34926C9.87857 4.20551 13.2823 0.919258 17.4648 0.171758C18.7223 -0.0532415 19.9836 -0.0582415 21.2173 0.163008C22.1311 0.324258 22.8411 0.944259 23.1173 1.81926C23.4311 2.81801 23.1136 3.92051 22.2648 4.76801L19.4561 7.53926C18.6336 8.36176 18.5086 9.65176 19.1786 10.4705C19.5636 10.943 20.1061 11.218 20.7061 11.248C21.2961 11.273 21.8761 11.0543 22.2948 10.6368L25.5198 7.44926C26.1936 6.77551 27.1848 6.53051 28.1073 6.82301C29.0111 7.10676 29.6748 7.85801 29.8386 8.78176C30.0573 10.0155 30.0536 11.2793 29.8298 12.5355C29.0798 16.7193 25.7936 20.123 21.6498 21.0068C19.9461 21.3705 18.2486 21.3268 16.6048 20.878C16.1336 20.748 15.6623 20.863 15.3448 21.1793L7.87482 28.648C7.01232 29.5105 5.82857 30.0005 4.60982 30.0005ZM19.5123 2.49176C18.9848 2.49176 18.4448 2.53551 17.9048 2.63176C14.7123 3.20301 12.1123 5.71051 11.4373 8.87051C11.1573 10.1768 11.1898 11.478 11.5323 12.7368C11.8948 14.0643 11.5323 15.4755 10.5873 16.4218L3.25232 23.7555C2.43982 24.568 2.33732 26.018 3.03857 26.7968C3.43232 27.2343 3.97232 27.4843 4.55732 27.4993C5.13357 27.523 5.69357 27.2955 6.10857 26.8818L13.5773 19.413C14.5211 18.4693 15.9336 18.1043 17.2623 18.4668C18.5173 18.8093 19.8186 18.8418 21.1286 18.5618C24.2886 17.888 26.7961 15.2893 27.3686 12.0943C27.5411 11.1293 27.5436 10.1605 27.3761 9.21801V9.20926L24.0573 12.408C23.1461 13.3193 21.8773 13.828 20.5811 13.743C19.2861 13.678 18.0698 13.0618 17.2448 12.0518C15.7711 10.253 15.9686 7.49051 17.6961 5.76426L20.5048 2.99301C20.7286 2.76801 20.7436 2.60051 20.7348 2.56676C20.3411 2.51801 19.9311 2.48926 19.5148 2.48926L19.5123 2.49176Z"
                                      fill="#222224" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_4897_470">
                                      <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                                <p class="custom-font-size-14 font-weight-light">'.$month.' '.$day.', '.$year.'</p>
                              </div>
                              <div class="mt-3">
                                <p class="card-text" style="font-size: 18px; font-weight: 500;">'.$row->repair_category.'</p>
                                <p class="card-text" style="font-size: 12px">'.$row->propertyTitle.'</p>

                                <div class="mt-3">
                                  <a href="single-property.html" class="btn secondary-background px-3">View details</a>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>';
                      }
                      
                    }
                }?>
              </div>
            </div>

          </div>


          <!-- Repair History -->
          <div class="col-12 mt-5 collapse" id="history">
            <div class="primary-background table-responsive p-md-5">
              <p>This is the history of all repairs carried out on your property.</p>
              <table class="table mt-4">
                <thead class="secondary-background">
                  <tr>
                    <th scope="col">Property name</th>
                    <th scope="col">Type of repair</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach($history as $histry => $value){ ?>
                  <tr>
                    <td><?php echo  $value['propertyTitle']?></td>
                    <td><?php echo  $value['repair_type']?></td>
                    <td><?php echo  $value['cost']?></td>
                    <td><?php $date = strtotime($value['Date']); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date); echo $day.' '.$month.', '.$year; ?></td>
                    <td><?php echo  $value['status']?> <a href="#" class="btn secondary-background px-2">View</a></td>
                  </tr>
                <?php } ?>

                </tbody>
              </table>
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
  <script src="../assets/js/jquery.min.js"
    crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="../assets/js/popper.min.js"
    crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap-js/bootstrap.min.js"
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