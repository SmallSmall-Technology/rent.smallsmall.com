<?php 

$fname = $fname[0];

$lname = $lname[0];


if($verification_status == 'yes'){
    $disp = '<span style="color:#DADADA" class="btn secondary-background text-white">Verified</span>'; 
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

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

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
    <link rel="stylesheet" href="../assets/css/custom-css/profile.css" />


    <title>Dashboard - Profile</title>
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
                    <li class="nav-item d-flex align-items-center mr-4">
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
                    <li class="nav-item d-flex align-items-center  dashboard-active mr-4">
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
                    <span style="line-height: 14px;" class="btn btn-outline-dark">
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

                <div class="mb-4 pl-2">
                    <p>
                        <a href="<?php echo base_url('dashboard/booking'); ?>" class=" text-dark" style="text-decoration: none;">
                            <img class="img-fluid" src="../assets/images/calendar-icon.svg" alt="">
                            &nbsp;&nbsp; Booking
                        </a>
                </div>

                <div class="mb-4 pl-2" dashboard-active>
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
                            <img class="img-fluid" src="../assets/images/profile-icon.svg" alt="">
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


    <div class="container-fluid">



    </div>


    <!-- Main body content starts here -->
    <main class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-between">
                <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
                    <span>Buysmallsmall</span>
                    <span>></span>
                    <span>Dashboard</span>
                    <span>></span>
                    <span>Profile</span>
                </div>
                <div class="d-md-block d-none">
                    <?php echo $disp; ?>
                    <button type="button" class="btn btn-dark d-none">Verified</button>
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
                <p style="font-size: 22px;">Profile</p>
            </div>
            <div class="col-12">
                <nav class="nav sub-nav">
                    <li class="nav-item mr-3 ">
                        <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="manageProfileBtn" href="#" role="button">Manage Profile</a>
                    </li>
                    <li class="nav-item mr-3 ">
                        <a class="nav-link secondary-text-color  px-0" id="managerBtn" href="#" role="button">Relationship
                            Manager</a>
                    </li>

                </nav>
            </div>

            <!-- Manage Profile  -->
            <div class="col-12 mt-5 collapse show" id="manageProfile">
                <div class="p-md-5 p-2 primary-background">
                    <div class="row">
                        <div class="col-md-8">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="fullName">First name</label>
                                        <input type="text" class="form-control form-control-lg" value="<?php echo $profile['firstName'] ?>" id="firstNames" name = "firstName" placeholder="Enter full name">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="email">Last name</label>
                                        <input type="text" class="form-control form-control-lg" value="<?php echo $profile['lastName'] ?>" id="lastNames" name = "lastName" placeholder="Enter email">
                                    </div>
                                    <div class="col-md-2 col-12 align-self-end mb-3">
                                        <div role = "button" class="btn secondary-background px-4" style="height: calc(1.5em + 1.4rem + 2px); border-radius: 4px;" onclick = "saveNames()">Save</div>
                                    </div>

                                </div>
                            </form>

                            <form>
                                <div class="divider my-5"></div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-lg" value="<?php echo $profile['email'] ?>" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                            </form>

                            <div class="divider my-5"></div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <button class="btn  btn-outline-secondary" type="button" data-target="#changePassword" data-toggle="modal">Change
                                        Password</button>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Add change password modal -->
                    <div class="modal fade" id="changePassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header primary-background pl-5">
                                    <h5>Change Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">

                                    <form>
                                        <div class="form-group m-2">
                                            <label style="font-size: 12px;" for="numberOfShares">New Password</label>
                                            <input type="password" class="form-control p-3" id="numberOfShares" placeholder="Enter new password">
                                        </div>


                                        <div class=" my-4 text-center mt-5">
                                            <button type="submit" class="btn py-2 secondary-background px-5" data-toggle="modal" data-target="#createWallet">Update password</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <!-- Manager relationship  -->
            <div class="col-12 mt-5 collapse show" id="manager">
                <div class="p-5 primary-background">
                    <div class="row">
                        <div class="col-md-3 col-12 mb-3">
                            <p>Name</p>
                            <p></p>
                        </div>
                        <div class="col-md-3 col-12 mb-3">
                            <p>Email</p>
                            <p></p>
                        </div>
                        <div class="col-md-3 col-12 mb-3">
                            <p>Phone number</p>
                            <p></p>
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


    <script>
        $(document).ready(function() {
            $("#manageProfileBtn").click(function() {
                $("#manageProfile").addClass("show");
                $("#manager").removeClass("show");
                $("#history").removeClass("show");
                $("#managerBtn").addClass("secondary-text-color")
                $("#managerBtn").removeClass("primary-text-color sub-menu--dashboard-active")
                $("#historyBtn").addClass("secondary-text-color")
                $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
                $("#manageProfileBtn").addClass("primary-text-color sub-menu--dashboard-active")
                $("#manageProfileBtn").removeClass("secondary-text-color")

            });
            $("#managerBtn").click(function() {
                $("#manager").addClass("show");
                $("#manageProfile").removeClass("show");
                $("#history").removeClass("show");
                $("#managerBtn").addClass("primary-text-color sub-menu--dashboard-active")
                $("#managerBtn").removeClass("secondary-text-color")
                $("#manageProfileBtn").removeClass("primary-text-color sub-menu--dashboard-active")
                $("#manageProfileBtn").addClass("secondary-text-color")
                $("#historyBtn").addClass("secondary-text-color")
                $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

            });
            $("#historyBtn").click(function() {
                $("#history").addClass("show");
                $("#manageProfile").removeClass("show");
                $("#manager").removeClass("show");

                $("#managerBtn").addClass("secondary-text-color")
                $("#managerBtn").removeClass("primary-text-color sub-menu--dashboard-active")
                $("#manageProfileBtn").addClass("secondary-text-color")
                $("#manageProfileBtn").removeClass("primary-text-color sub-menu--dashboard-active")
                $("#historyBtn").removeClass("secondary-text-color")
                $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
            });

        });
    </script>


<script>

    function saveNames(){

        var baseURL = "<?php echo base_url(); ?>";
        
        var firstName = document.getElementById('firstNames').value;
        
        var lastName = document.getElementById('lastNames').value;
        
        var data = {"firstName" : firstName, "lastName" : lastName};
        
        $.ajaxSetup ({ cache: false });

        $.ajax({

            url : baseURL+'rss/userProfile/',

            type: "POST",

            async: true,

            data: data,

            success	: function (data){
                if(data == 1){
                    alert('Your Details Was Successful changed');
                    window.location.href = baseURL+"dashboard/profile";
                }else{                 
                    alert('Something went wrong. Please try again');      
                }
            }

        });
    }

</script>

</body>

</html>