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
  <link rel="stylesheet" href="../assets/css/custom-css/payout.css" />

  <title>Inbox</title>
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
              <a href="<?php echo base_url('landlord/index'); ?>" class="text-dark" style="text-decoration: none;">Dashboard</a>
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
          <li class="nav-item d-flex align-items-center  mr-4">
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
          <li class="nav-item d-flex dashboard-active align-items-center mr-4">
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
        <a href="<?php echo base_url(); ?>/logout">
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

        <div class="mb-4 pl-2">
          <p>
            <a href="<?php echo base_url('landlord/property'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images2/myProperty-icon.svg" alt="">
              &nbsp;&nbsp; MyProperty
            </a>
        </div>

        <div class="mb-4 pl-2" dashboard-active>
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

  <!-- Main body content starts here -->
  <main class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-between">
        <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
          <span>Rentsmallsmall</span>
          <span>></span>
          <span>Dashboard</span>
          <span>></span>
          <span>Payout</span>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Payments</p>
      </div>
      <div class="col-12">
        <nav class="nav sub-nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color   sub-menu--dashboard-active px-0" id="currentBookingBtn" href="#"
              role="button">All Payout</a>
          </li>
          <li class="nav-item mr-3 ">
            <a class="nav-link secondary-text-color px-0" id="checklistBtn" href="#" role="button">Filter Payout</a>
          </li>

        </nav>
      </div>

      <!-- default Payout -->
      <div class="col-12 mt-5 collapse " id="currentBookingDefautl">
        <div class="primary-background p-5 d-flex justify-content-center align-content-center">
          <div class="text-center">
            <img class="mb-4" style="width: 100px;" src="../assets/images2/wallet.gif" alt="">
            <p class="mb-2" style="font-size: 22px;">You haven’t created a wallet yet</p>
            <p class="mb-4" style="font-size: 13px;">Create wallet to receive your quarterly rent payout
              You will need to provide your BVN to create a wallet on our platform</p>
            <button type="button" class="btn btn-dark py-3 btn-custom-primary px-5" data-toggle="modal"
              data-target="#createWallet">Create Wallet</button>
          </div>
        </div>


        <!-- create wallet Modal -->
        <div class="modal fade" id="createWallet" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">
                <h5 class="modal-title font-weight-light" id="staticBackdropLabel">Create Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-5">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Provide bvn</label>
                    <input type="text" class="form-control p-4" name="bvn" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="BVN">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Custom account name</label>
                    <input type="text" class="form-control p-4" name="account-name" id="exampleInputPassword1"
                      placeholder="Account name">
                  </div>
                  <div class="form-check text-center">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1">
                    <label class="form-check-label " for="exampleCheck1">Agree to our <a href="#"
                        style="color: #138E3D">terms
                        and conditions</a> </label>
                  </div>

                  <div class="my-4 text-center">
                    <button type="submit" class="btn btn-dark py-2 btn-custom-primary px-5" data-toggle="modal"
                      data-target="#createWallet">Create</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>

      <!-- Payout -->
      <div class="col-12 mt-5 collapse  show" id="currentBooking">

        <!-- payout section -->
        <div class="secondary-background payout p-5 mb-4">
          <div class="row mb-4">
            <div class="col-12">
              <p style="font-size: 32px;">Payout</p>
            </div>
          </div>
          <div class="certificate-container d-flex flex-wrap">
            <div class="certificate-item  pr-md-5 mr-md-5 mb-md-5">
              <p style="font-size: 12px;">Total Payout received</p>
              <div class="d-flex">
                <P style="font-size: 25px" class="mr-3"></P>

              </div>
            </div>
            <div class="certificate-item  pr-md-5 mr-md-5 mb-md-5">
              <p style="font-size: 12px;">Next Payout</p>
              <div class="d-flex">
                <P style="font-size: 25px" class="mr-3"></P>
                <div class="d-flex align-items-end">
                  <!-- <p class="font-weight-light" style="font-size: 12px;">Pending</p> -->
                  <p class="font-weight-light" style="font-size: 13px;"></p>
                </div>
              </div>
            </div>


          </div>

        </div>

        <!-- payout history -->
        <div class="primary-background p-md-5 p-2">
          <div class="mb-3">
            <p>Payout History</p>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="secondary-background">
                <tr>
                  <th scope="col">Sender</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Transaction id</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>



      </div>

      <!--Filer payout -->
      <div class="col-12 mt-5 collapse " id="checklist">

        <div class="primary-background payout p-5 mb-4">
          <form action="">

            <div class="row mb-4">
              <div class="col-12 mb-5">
                <p style="font-size: 32px;">Filter Payout</p>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-md-4 col-12 mb-3">
                    <label for="">Property</label>
                    <div class="ss-custom-select">
                      <select name="" id="">
                        <option value="">Choose property</option>
                        <option value="">Choose property</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5 col-12 ">
                    <div class="row">
                      <div class="col-md-6 col-12 mb-3">
                        <label for="">Date(from)</label>
                        <div class="ss-custom-input">
                          <input type="date" value="From" placeholder="From">
                        </div>
                      </div>
                      <span></span>
                      <div class="col-md-6 col-12">
                        <label for="">Date(To)</label>
                        <div class="ss-custom-input">
                          <input type="date" value="From" placeholder="From">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-12 d-flex align-items-end mt-md-0 my-3">
                    <button class=" btn filter-btn px-5" id="filter-btn">Filter </button>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>

        <!-- payout history -->
        <div class="primary-background p-md-5 p-2 d-none" id="payoutHistory">
          <div class="mb-3">
            <p>Payout History</p>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="secondary-background">
                <tr>
                  <th scope="col">Sender</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Transaction id</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Rentsmallsmall</td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Rentsmallsmall</td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>

      </div>

      <!-- Transaction History -->
      <div class="col-12 mt-5 collapse" id="history">
        <div class="primary-background p-5">
          <div class="table-responsive">
            <table class="table">
              <thead class="secondary-background">
                <tr>
                  <th scope="col">Transaction type</th>
                  <th scope="col">Transaction id</th>
                  <th scope="col">Date</th>
                  <th scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Buyss financing</td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Withdraw - wallet</td>
                  <td></td>
                  <td>
                    <p class="d-flex align-items-center"></p>
                  </td>
                  <td></td>
                </tr>

              </tbody>
            </table>
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
          <a class="mr-3" href="#">Rentsmallsmall FAQ</a>
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
      // const loadHistory = function () {
      //   $("#history").addClass("show");
      //   $("#currentBooking").removeClass("show");
      //   $("#checklist").removeClass("show");

      //   $("#checklistBtn").addClass("secondary-text-color")
      //   $("#checklistBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      //   $("#currentBookingBtn").addClass("secondary-text-color")
      //   $("#currentBookingBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      //   $("#historyBtn").removeClass("secondary-text-color")
      //   $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
      // }


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

      // $("#historyBtn").click(loadHistory);

      // $(".viewTransaction").click(loadHistory);

      // toggle the payout history when filter button is clicked
      $("#filter-btn").click(function (e) {
        e.preventDefault();
        $("#payoutHistory").toggleClass("d-none");
        console.log(e.target);
      })

    });
  </script>


</body>

</html>