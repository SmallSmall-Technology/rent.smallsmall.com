<?php 

$acc_name = @$account_details['account_name'];

$acc_name = explode("(",$acc_name);

$acc_name = $acc_name[1];

$acc_name = explode(")",$acc_name);

$acc_name = $acc_name[0];

$fname = $fname[0];

$lname = $lname[0];

if($verification_status == 'yes'){
    $disp = '<button style="color:#DADADA" type="button" class="btn secondary-background text-white">Verified</button>'; 
}

else{
    $disp = '<button style="color:#DADADA" type="button" class="btn btn-light">Verified</button>';
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
    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css"
         crossorigin="anonymous" />

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
    <link rel="stylesheet" href="../assets/css/custom-css/header.css" />
    <link rel="stylesheet" href="../assets/css/custom-css/footer.css" />
    <link rel="stylesheet" href="../assets/css/custom-css/wallet.css" />


    <title>Wallet</title>
</head>

<body>

    <header>
        <!-- desktop menu bar -->
        <nav
            class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
            <a class="navbar-brand">
                <img class="img-fluid" src="../assets/images/rss-logo.svg" alt="logo">
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
                    <li class="nav-item d-flex align-items-center mr-4">
                        <div class="menu-text">
                            <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link p-0" href="notification.html" tabindex="-1" aria-disabled="true">
                            <div class="menu-logo mr-2 position-relative">
                                
                                <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="" />
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
                    <li class="nav-item d-flex align-items-center mr-4 ">
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
                    <li class="nav-item d-flex align-items-center mr-4 dashboard-active ">
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
                            <a href="<?php echo base_url('dashboard/profile'); ?>" class=" text-dark" style="text-decoration: none;">Profile</a>
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

        <!-- mobile menu bar -->
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
                    <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
                        <small style="font-size: 10px; line-height: 14px;">Referral
                            code
                        </small><br>
                        <?php echo @$refCode; ?>
                    </button>
                </div>

            </div>

            <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
                <div class="mb-5 pl-2 ">
                    <p>
                        <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/dashboard-icon.svg" alt="">
                            &nbsp;&nbsp; Dashboard
                        </a>
                    </p>
                </div>

                <div class="mb-5 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/inbox'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="">
                            &nbsp;&nbsp; Notification
                        </a>
                    </p>
                </div>

                <div class="mb-5 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/booking'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/calendar-icon.svg" alt="">
                            &nbsp;&nbsp; Booking
                        </a>
                </div>

                <div class="mb-5 pl-2  dashboard-active">
                    <p>
                        <a href="<?php echo base_url('dashboard/wallet'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/wallet-icon.svg" alt="">
                            &nbsp;&nbsp; Wallet
                        </a>
                    </p>
                </div>

                <div class="mb-5 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/profile'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/profile-icon.svg" alt="">
                            &nbsp;&nbsp; Profile
                        </a>
                    </p>
                </div>

                <div class="mb-5 pl-2">
                    <p>
                        <a href="#" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/nativeSquare-icon.svg" alt="">
                            &nbsp;&nbsp; Native square
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
                    <span>Wallet</span>
                </div>
                <div class="d-md-block d-none">
                    <?php echo $disp; ?>
                    <!--<button style="color:#DADADA" type="button" class="btn btn-light">Verified</button>-->
                    <!--<button type="button" class="btn secondary-background d-none">Verified</button>-->
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
            <div class="col-12 mt-5">
                <p style="font-size: 22px;">Wallet</p>
            </div>
            <div class="col-12 sub-nav">
                <nav class="nav">
                    <li class="nav-item mr-3 ">
                        <a class="nav-link primary-text-color sub-menu--dashboard-active px-0" id="currentBookingBtn"
                            href="#" role="button">Wallet Balance</a>
                    </li>

                    <li class="nav-item mr-3">
                        <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">History</a>
                    </li>
                </nav>
            </div>


            <?php if(@!$account_details){ ?>
            <!-- default Wallet balance -->
            <div class="col-12 mt-5 collapse show " id="currentBooking">
                <div class="primary-background p-5 d-flex justify-content-center align-content-center">
                    <div class="text-center">
                        <img class="mb-4" style="width: 100px;" src="../assets/images/wallet.gif" alt="">
                        <p class="mb-2" style="font-size: 22px;">You haven’t created a wallet yet</p>
                        <p class="mb-4" style="font-size: 13px;">You will need to provide your BVN to create a wallet on
                            our
                            platform</p>
                        <button type="button" class="btn btn-dark py-3 btn-custom-primary px-5" data-toggle="modal"
                            data-target="#createWallet">Create Wallet</button>
                    </div>
                </div>


                <!-- Modal -->
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Provide bvn</label>
                                        <input type="text" class="form-control p-4" name="bvn" id="bvn"
                                            aria-describedby="emailHelp" placeholder="BVN">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Custom account name</label>
                                        <input type="text" class="form-control p-4" name="account_name"
                                            id="account_name" placeholder="Account name">
                                    </div>
                                    <div class="form-check text-center">
                                        <input type="checkbox" class="form-check-input " id="loan-agreement" name="loan-agreement">
                                        <label class="form-check-label " for="exampleCheck1">Agree to our <a href="#"
                                                style="color: #138E3D">terms
                                                and conditions</a> </label>
                                    </div>

                                    <div class="my-4 text-center">

                                        <?php if($verification_status == 'yes'){ ?>
                                
                                            <button type="submit" class="btn btn-dark update-bvn-btn py-2 btn-custom-primary px-5">Create</button>
                                    
                                        <?php }else{ ?>
                                        
                                            <button type="submit" class="btn btn-dark py-2 update-bvn-btn btn-custom-primary px-5" >Create</button>
                                        
                                        <?php } ?>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <?php }else{ ?>

            <!-- Wallet balance -->
            <div class="col-12 mt-5 collapse show" id="currentBooking">
                <div class="current-booking">
                    <div class="row">
                        <div class="col-12">
                            <p>Balance</p>
                            <h3 style="font-size: 40px;">&#8358;<?php echo number_format(@$account_details['account_balance']); ?></h3>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-3 col-12 mb-3">
                            <p style="font-size: 14px;" class="font-weight-light">Account Name</p>
                            <p style="font-size: 26px;"><?php echo $acc_name; ?></p>
                        </div>
                        <div class="col-md-3 col-12 mb-3">
                            <p style="font-size: 14px;" class="font-weight-light">Account number</p>
                            <p style="font-size: 26px;"><?php echo @$account_details['account_number']; ?></p>
                        </div>
                        <div class="col-md-3 col-12 mb-3">
                            <p style="font-size: 14px;" class="font-weight-light">Bank name</p>
                            <p style="font-size: 26px;"><?php echo @$account_details['bank_name']; ?></p>
                        </div>
                        <div class="col-md-2 col-12 mb-3">
                            <p style="font-size: 14px;" class="font-weight-light">Created</p>
                            <p style="font-size: 26px;" class="d-flex align-items-center"><?php echo date('m/y',strtotime($account_details['date_created'])); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <button class="btn font-weight-light subscription-btn  p-md-3 p-1 secondary-background"
                                type="button" data-target="#fundWallet" data-toggle="modal">Fund
                                Wallet</button>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <button class="btn font-weight-light subscription-btn  p-md-3 p-1 secondary-background btn-custom-primary wallet-transaction"
                                type="button" id="wallet-transaction-<?php echo (@$new_subscription['price'] + @$new_subscription['serviceCharge']).'-'.@$new_subscription['bookingID']; ?>">Pay
                                Subscription</button>
                        </div>
                        <div class="col-md-6 col-12">
                            <button class="btn font-weight-light wallet-btn p-3 text-dark" type="button">Subscribe to
                                wallet
                                direct
                                debit</button>
                        </div>
                    </div>
                </div>

                <!-- Fund wallet Modal -->
                <div class="modal fade" id="fundWallet" data-backdrop="static" data-keyboard="false" tabindex="-1"
                      aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header primary-background pl-5">
                            <h5 class="modal-title" id="staticBackdropLabel">Fund Wallet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body px-md-5 px-2 py-2">
                            <div class="secondary-background p-4 my-3 wallet-balance-container">
                              <h5 style="font-size: 13px;">Wallet Balance</h5>
                              <p style="font-size: 30px; font-weight: 600;">&#8358;<?php echo number_format(@$account_details['account_balance']); ?></p>
                            </div>
                            <div class="divider my-2" style="border-width: 0.5px;"></div>
                            <div class="d-flex my-3">
                              <div class="mr-2">
                                <img src="../assets/images/right-up.svg" alt="">
                              </div>
                              <div>
                                <p class="font-weight-light">Bank transfer</p>
                                <div class="d-flex justify-content-between" style="font-weight: 300;">
                                  <p class="mr-3"><?php echo @$account_details['bank_name']; ?></p>
                                  <div class="mr-3">
                                    <p id="accountNumber"><b><?php echo @$account_details['account_number']; ?></b></p>
                                  </div>
                                  <div style="cursor:pointer"
                                    class="col-md-2 d-flex flex-column justify-content-center align-items-center" id="copy">
                                    <img class="img-fluid" src="../assets/images/copy.svg" alt="">
                                    <span class="text-center" id="copy-text"
                                      style="font-size: 8px; display: inline-block;">copy</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                    
                            <div class="divider my-2" style="border-width: 0.5px;"></div>
                    
                            <div class="d-flex my-4">
                              <div class="mr-2">
                                <img src="../assets/images/bank-card.svg" alt="">
                              </div>
                              <div class="w-100">
                                <p class="font-weight-light mb-2">Debit card</p>
                    
                                <form id="walletForm">
                                                                    
                                  <input type="hidden" class="userID" id="userID" value="<?php echo $userID; ?>" required />
                    
                                  <input type="hidden" class="email" id="email" value="<?php echo $email; ?>" required />			  
                    
                                  <input type="hidden" class="amount" id="amount" value="" required />
                    
                                  <input class="fname" type="hidden" id="fname" value="<?php echo $fname; ?>" />
                    
                                  <input class="lname" type="hidden" id="lname" value="<?php echo $lname; ?>" />
                                  
                                  <input class="refID" type="hidden" id="refID" value="<?php echo "wlt_".md5(date('H:i:s')); ?>" />
                    
                                  
                                  <!--<a href="http://">-->
                                  <!--<img class="img-fluid" src="../assets/images/paystack.svg" alt="">-->
                                  <!--</a>-->
                              
                                  <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-size: 12px;">Enter Amount</label>
                                    <div class="d-flex justify-content-between">
                                      <input type="text" class="form-control p-4 wallet-input mr-1" name="amount"
                                      id="funding-amount" aria-describedby="enterAmount" placeholder="Enter amount">
                                      <button style="border-radius: 4px;" type="submit" onclick="payWithPaystack()" class="btn secondary-background w-25">Top
                                        up</button>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                      <a href="http://">
                                        <img class="img-fluid" src="../assets/images/paystack.svg" alt="">
                                      </a>
                                    </div>
                    
                                  </form>
                    
                                  </div>
                    
                                </form>
                    
                              </div>
                            </div>
                    
                          </div>
                    
                        </div>
                      </div>
                    </div>
                <?php } ?>

                <!-- Successfully wallet modal -->
                <div class="modal fade" id="fundWallet" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header primary-background pl-5">
                                <h5 class="modal-title" id="staticBackdropLabel">Fund Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body px-5 py-2">
                                <div class="d-flex flex-column justify-content-center">
                                    <div>
                                        <img src="../assets/images/" alt="">
                                    </div>
                                    <p>Wallet funded successfully</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!-- History Booking -->
            <div class="col-12 mt-5 collapse" id="history">
                <div class="current-booking table-responsive">
                    <table class="table">
                        <thead class="secondary-background">
                            <tr>
                                <th scope="col">Transaction id</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="wallet-data">
                                
                        </tbody>
                            
                        </table>
                        
                        <div class="text-right" id="load-wallet-transactions">
                        <a href="#" class="btn secondary-background">Load more</a>
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
    
    <script src="<?php echo base_url(); ?>assets/js/wallet.js"></script>
    
    
    
    <!-- To triger the Create Wallet Modal  -->
    
    <script>
    $(document).ready(function() {
        // Check if the current URL matches the specified route
        var currentUrl = window.location.href;
        
        var targetRoute = "<?php echo base_url('dashboard/wallet')?>";
        
        var referrer = document.referrer;
  
    if (currentUrl === targetRoute && referrer !== currentUrl && !localStorage.getItem('modalShown')) {
    
        // if (currentUrl === targetRoute && referrer !== currentUrl) {

        
        $('#createWallet').modal('show'); // Show the modal with the specified ID
        }
        
         localStorage.setItem('modalShown', true);
         
         if (!localStorage.getItem('modalShown')){
             
             $('#createWallet').on('hidden.bs.modal'), function () {
        
         window.history.back(); // Redirect the user to the previous page
         }
             
         }
         
        //  $('#createWallet').on('hidden.bs.modal', function () {
        
        //  window.history.back(); // Redirect the user to the previous page
    
    // });
    
    });
    
    </script>

    <!-- To triger the Create Wallet Modal  -->
    
    
    <script>
    
    $('#walletForm').submit(function(e){
    
    	    e.preventDefault();
    
    	    let handler = PaystackPop.setup({
    
        		key: 'pk_live_7741a8fec5bee8102523ef51f19ebb467893d9d2', // Replace with your public key
        
        		email: document.getElementById("email").value,
        
        		amount: document.getElementById("amount").value * 100,
        
        		ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        
        		// label: "Optional string that replaces customer email"
        
        		onClose: function(){
        		    
                    alert('Payment aborted!');
                    
        		},
    
                callback: function(response){
            
                  //let message = 'Payment complete! Reference: ' + response.reference;
                  
                  updateTransaction(response.reference);
            
                }
            });
    
            handler.openIframe();
    
        });
    
    function updateTransaction(reference){
        
        var baseURL = "<?php echo base_url(); ?>";
        
        var userID = document.getElementById('userID').value;
        
        var amount = document.getElementById('amount').value;
        
        var refID = document.getElementById('refID').value;
        
        var email = document.getElementById('email').value;
        
        var paystack_reference = reference;
        
        var data = {"referenceID" : refID, "amount" : amount, "email" : email, "paystack_reference" : paystack_reference, "userID" : userID};
        
        $.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseURL+'loans/walletFunding/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){
				if(data == 1){

					alert("Your wallet has been successully funded!");

					location.reload(true);

				}else{

					alert("Error updating payment.");

				}				

			}

		});
    }
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
	

    <script>
        $(document).ready(function(){
        
            var limit = 10;
            
            var start = 0;
            
            var action = 'inactive';
        
            function lazzy_loader(limit){
                
                var output = '';
              
                for(var count=0; count<limit; count++){
                  
                    output += '<div class="post-data">';
                    output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                    output += '</div>';
                    
                }
                
                $('#wallet-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchWalletTransaction",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#wallet-data-loading').html('No more result found');
                            
                            action = 'active';
                            
                        }else{
                            
                            $('#wallet-data').append(data);
                            
                            $('#wallet-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-wallet-transactions').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $("#currentBookingBtn").click(function() {
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
            $("#checklistBtn").click(function() {
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
            $("#historyBtn").click(function() {
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