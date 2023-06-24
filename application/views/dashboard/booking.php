<?php 

$fname = $fname[0];

$lname = $lname[0];

if($verification_status == 'yes'){
    $disp = '<span style="color:#DADADA"  class="btn secondary-background text-white">Verified</span>'; 
}

else{
    $disp = '<span style="color:#DADADA"  class="btn btn-light">Verified</span>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css" crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" /> -->

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
    <link rel="stylesheet" href="../assets/css/custom-css/booking.css" />


    <title>Booking</title>
</head>

<body>

    <header>
        <!-- desktop menu bar -->
        <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background  px-4 py-0 d-lg-flex d-none">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img class="img-fluid" src="../assets/images/rss-logo.svg" alt="logo">
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-5">
                        <a class="nav-link">
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
                    <li class="nav-item d-flex align-items-center dashboard-active mr-4">
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
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <img class="img-fluid" src="../../assets/images/menu-burger.svg" alt="">
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
            <div class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img class="img-fluid" src="../../assets/images/user-mobile2.svg" alt="">
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
                    <span style="line-height: 14px;"  class="btn btn-outline">
                        <small style="font-size: 10px; line-height: 14px;">Referral
                            code
                        </small><br>
                        <?php echo @$refCode; ?>
                    </span>
                </div>

            </div>

            <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
                <div class="mb-4 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/dashboard-icon.svg" alt="">
                            &nbsp;&nbsp; Dashboard
                        </a>
                    </p>
                </div>

                <div class="mb-4 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/inbox'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="">
                            &nbsp;&nbsp; Notification
                        </a>
                    </p>
                </div>

                <div class="mb-4 pl-2" dashboard-active>
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
                            <img class="text-dark" src="../assets/images/profile-icon.svg" alt="">
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
            </div>
        </nav>

    </header>

    <!-- Sub menu for booking section starts here -->
    <div class="container-fluid d-md-flex d-none nav-bottom-color sub-menu ">
        <div class="sub-nav d-flex flex-wrap">
            <a class="text-decoration-none secondary-text-color mr-4 py-3  sub-menu--dashboard-active" href="<?php echo base_url('dashboard/booking'); ?>">
                <div class="sub-menu-link  ">
                    My Bookings
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('dashboard/inspection'); ?>">
                <div class="sub-menu-link  ">
                    Inspections
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('dashboard/request-repair'); ?>">
                <div class="sub-menu-link">
                    Request Repair
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="#">
                <div class="sub-menu-link  ">
                    Property Rating
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('dashboard/subscription-agreement'); ?>">
                <div class="sub-menu-link">
                    Subscription Agreement
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color mr-4 py-3" href="<?php echo base_url('dashboard/transaction'); ?>">
                <div class="sub-menu-link  ">
                    Transactions
                </div>
            </a>
        </div>
    </div>

    <!-- Sub menu mobile view for booking section starts here -->
    <div class="container-fluid d-block d-md-none nav-bottom-color sub-menu">
        <div class="sub-nav d-flex justify-content-between ">
            <a class="text-decoration-none secondary-text-color py-3  sub-menu--dashboard-active" href="<?php echo base_url('dashboard/booking'); ?>">
                <div class="sub-menu-link  ">
                    My Bookings
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color py-3" href="<?php echo base_url('dashboard/inspection'); ?>">
                <div class="sub-menu-link  ">
                    Inspections
                </div>
            </a>
            <a class="text-decoration-none secondary-text-color py-3" href="<?php echo base_url('dashboard/request-repair'); ?>">
                <div class="sub-menu-link  ">
                    Request Repair
                </div>
            </a>
            <div class="dropdown align-self-center">
                <a class="text-decoration-none secondary-text-color" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    More
                    <i class="fa-solid fa-caret-down"></i>
                </a>

                <div class="dropdown-menu custom-dropdown-menu primary-background border-0 ">
                    <a class="dropdown-item secondary-text-color" href="#">Property Rating</a>
                    <a class="dropdown-item secondary-text-color" href="<?php echo base_url('dashboard/subscription-agreement'); ?>">Subscription Agreement</a>
                    <a class="dropdown-item secondary-text-color" href="<?php echo base_url('dashboard/transaction'); ?>">Transactions</a>
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
                    <span>Booking</span>
                </div>
                <div class="d-md-block d-none">
                    <?php echo $disp; ?>
                    <span class="btn secondary-background d-none">Verified</span>
                    <span style="line-height: 14px;"  class="btn btn-outline-dark">
                        <small style="font-size: 10px; line-height: 14px;">Referral
                            code
                        </small><br>
                        <?php echo @$refCode; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <p style="font-size: 22px;">My Bookings</p>
            </div>
            <div class="col-12 sub-nav">
                <nav class="nav">
                    <li class="nav-item mr-3 ">
                        <a class="nav-link primary-text-color  sub-menu--dashboard-active  px-0" id="currentBookingBtn" href="#" role="button">Current
                            Booking</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link secondary-text-color px-0 " id="checklistBtn" href="#" role="button">Move-in
                            Checklist</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">History</a>
                    </li>
                </nav>
            </div>

            <!-- current booking -->
            <div class="col-12 mt-5 collapse show " id="currentBooking">
                <div class="primary-background p-md-5 p-3">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="address-title"><?php echo $bookings['propertyTitle'] ?></h3>
                            <p><?php echo $bookings['city'] . ', ' . $bookings['state_name']; ?></p>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-2 col-6 ">
                            <p class="font-weight-light custom-font-size-14">Subscription fee</p>
                            <p class="custom-font-size-26">&#8358;<?php echo number_format($bookings['price'] + $bookings['serviceCharge']); ?></p>
                        </div>
                        <div class="col-md-2 col-6 ">
                            <p class="font-weight-light">Service charge</p>
                            <p class="custom-font-size-26">&#8358;<?php echo number_format($bookings['serviceCharge']); ?></p>
                        </div>
                        <div class="col-md-2 col-6 ">
                            <p class="font-weight-light custom-font-size-14">Payment plan</p>
                            <p class="custom-font-size-26"><?php echo $bookings['payment_plan']; ?></p>
                        </div>
                        <div class="col-md-6 col-12 ">
                            <p class="font-weight-light custom-font-size-14">Subscription date</p>
                            <p class="d-flex align-items-center custom-font-size-26 subscription-date"><?php echo date('d M, Y', strtotime($bookings['move_in_date'])); ?> <i style="font-size: 13px;" class="mx-2 fa-solid fa-arrow-right"></i>
                               <?php echo date('d M, Y', strtotime($bookings['rent_expiration'])); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12 custom-btn mb-2">
                            <a href = "<?php echo base_url('dashboard/wallet'); ?>"><button class="btn font-weight-light  p-3 secondary-background w-100" type="button">Pay
                                Subscription</button></a>
                        </div>
                        <div class="col-md-3 col-12 custom-btn mb-2">
                            <button class="btn font-weight-light  p-3 secondary-background w-100" type="button">Cancel
                                Subscription</button>
                        </div>
                        <div class="col-md-4 col-12 custom-btn mb-2">
                            <div style = "margin-top: -24px;"><b>Coming soon</b></div>
                            <button class="btn font-weight-light  p-3 secondary-background w-100" type="button">Subscribe to
                                wallet
                                direct
                                debit</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- move in Checklist -->
            <div class="col-12 mt-5 collapse" id="checklist">
                <div class="row">
                    <div class="col-md-4 col-12 mb-4">
                        <div class="row">
                            <div class="col-md-12 col-6 mb-2">
                                <div class="secondary-background h-100 p-md-4 p-3 mb-3">
                                    <p>Penthouse 1 br A13 Olivia Court Lekki</p>
                                </div>
                            </div>
                            <div class="col-md-12 col-6 mb-2">
                                <div class="secondary-background h-100 p-md-4 p-3 mb-3">
                                    <p>Premium furnished 2 br Maisonette B2 Olivia Court Lekki</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-8">
                        <div class="primary-background  p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Premium furnished 2 br Maisonette B2 Olivia Court Lekki</p>
                                </div>


                                <!-- videos -->
                                <div class="col-md-12 my-3">
                                    <p class="d-inline-block border-bottom border-dark">Video</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkin-videos d-flex flex-wrap">
                                        <div class="checkin-videos-item  mr-3 mb-3">
                                            <video width="100%" height="" controls>
                                                <source src="../movie.mp4" type="video/mp4">
                                                <source src="../movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of videos -->


                                <!-- pictures -->
                                <div class="col-md-12 my-3">
                                    <p class="d-inline-block border-bottom border-dark">Pictures</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkin-pictures d-flex flex-wrap">
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-1.png" alt="">
                                        </div>
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-2.png" alt="">
                                        </div>
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-1.png" alt="">
                                        </div>
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-2.png" alt="">
                                        </div>
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-1.png" alt="">
                                        </div>
                                        <div class="checkin-pictures-item  mr-3 mb-3">
                                            <img class="img-fluid" src="../assets/images/pic-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- end of pictures -->


                                <div class="col-md-12 my-3">
                                    <p class="d-inline-block border-bottom border-dark">Checklist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- History Booking -->
            <div class="col-12 mt-5 collapse" id="history">
                <div class="primary-background table-responsive p-md-5">
                    <table class="table">
                        <thead class="secondary-background">
                            <tr>
                                <th scope="col">Property</th>
                                <th scope="col">Location</th>
                                <th scope="col">Payment plan</th>
                                <th scope="col">Subscription fee</th>
                                <th scope="col">Subscription date</th>
                            </tr>
                        </thead>
                        
                            <tbody id="subscription-data">
                                    
                            </tbody>
                        </table>
                        
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="subscription-data-loading"></div>
                        
                        <div class="text-right" id="load-rss-subscription">
                            <a href="#" class="btn secondary-background">Load more</a>
                        </div>

                        <!--<button id="load-rss-subscription" style="background-color: #007DC1; text-align:center;">Load more</button>-->

                        <!-- <div class="load-more-bar" id="load-rss-subscription">
                            <div class="load-more-img"></div>
                        </div> -->
                        
                        <!-- <tr>
                            <td>2 bed, castle condo</td>
                            <td>Ikoyi</td>
                            <td>Monthly</td>
                            <td>&#8358;53,000</td>
                            <td>
                                <p class="d-flex align-items-center">15 May, 2021 <i style="font-size: 13px;" class="mx-2 fa-solid fa-arrow-right"></i>
                                    15 May, 2022</p>
                            </td>
                        </tr>
                        <tr>
                            <td>2 bed, castle condo</td>
                            <td>Ikoyi</td>
                            <td>Monthly</td>
                            <td>&#8358;53,000</td>
                            <td>
                                <p class="d-flex align-items-center">15 May, 2021 <i style="font-size: 13px;" class="mx-2 fa-solid fa-arrow-right"></i>
                                    15 May, 2022</p>
                            </td>
                        </tr> -->
                    </table>

                <!--    <div class="pagination-section my-5">-->
                <!--        <div class="row">-->
                <!--            <div class="col-12">-->
                <!--            <nav aria-label="Page navigation example" class="d-flex d-md-block justify-content-center">-->
                <!--                <ul class="pagination">-->
                <!--                    <?php echo $this->pagination->create_links(); ?>-->
                <!--                </ul>-->
                <!--            </nav>-->
                <!--        </div>-->
                <!--</div>-->

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


<style>

    .pagination {
        width: 100%;
        display: inline-block;
        margin: 15px 0;
        text-align: center;
    }

    .pagination span {
        font-family: sans-serif;
        float: left;
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        /*background-color: #007bff; */
        /* Updated background color */
        border: 1px solid #dee2e6;
    }

    .pagination span:not(:has(a)) {
        background-color: #007bff; /* Background color for spans without an 'a' link */
        color: #fff; /* Text color for spans without an 'a' link */
    }

    .pagination span a {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: 0;
        font-family: sans-serif;
        text-decoration: none;
        color: #007bff; /* Added color for links */
    }

    .pagination span a:hover {
        /*color: #fff;*/
        background-color: #007bff;
        /*border-color: #007bff;*/
        z-index: 2;
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

</style>



    <!-- Jquery js -->
    <!-- <script src="../assets/js/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     Bootstrap js and Popper js -->
    <!-- <script src="../assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> -->

    <script src="../assets/js/jquery.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap js and Popper js -->
    <script src="../assets/js/popper.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap-js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="../assets/js/booking-switch.js"></script>
    <script src="../assets/js/user.js"></script>
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
                
                $('#subscription-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchBookings",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#subscription-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#subscription-data').append(data);
                            
                            $('#subscription-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
            }
            
            $('#load-rss-subscription').click(function(){
                
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