
<!DOCTYPE html>
<html lang="en">

<head>

     <!--Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!--Mixpanel Doc-->
   <!-- Paste this right before your closing </head> tag -->
<script type="text/javascript">
(function(f,b){if(!b.__SV){var e,g,i,h;window.mixpanel=b;b._i=[];b.init=function(e,f,c){function g(a,d){var b=d.split(".");2==b.length&&(a=a[b[0]],d=b[1]);a[d]=function(){a.push([d].concat(Array.prototype.slice.call(arguments,0)))}}var a=b;"undefined"!==typeof c?a=b[c]=[]:c="mixpanel";a.people=a.people||[];a.toString=function(a){var d="mixpanel";"mixpanel"!==c&&(d+="."+c);a||(d+=" (stub)");return d};a.people.toString=function(){return a.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking start_batch_senders people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
for(h=0;h<i.length;h++)g(a,i[h]);var j="set set_once union unset remove delete".split(" ");a.get_group=function(){function b(c){d[c]=function(){call2_args=arguments;call2=[c].concat(Array.prototype.slice.call(call2_args,0));a.push([e,call2])}}for(var d={},e=["get_group"].concat(Array.prototype.slice.call(arguments,0)),c=0;c<j.length;c++)b(j[c]);return d};b._i.push([e,f,c])};b.__SV=1.2;e=f.createElement("script");e.type="text/javascript";e.async=!0;e.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?nMIXPANEL_CUSTOM_LIB_URL:"file:"===f.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";g=f.getElementsByTagName("script")[0];g.parentNode.insertBefore(e,g)}})(document,window.mixpanel||[]);
</script>


 <!--Mixpanel Doc-->


    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Pay monthly rent when you rent an apartment, we made it easy and flexible for affordable houses for rent in Lagos Nigeria ">

    <meta name="keywords" content="Monthly rent in Lagos Nigeria,Real Estate,Realtor,monthly rent payment,Home rental in Lagos Nigeria,home">

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="<?php echo base_url(); ?>assets/css/style.css?version=<?php echo rand(19857, 99857376343); ?>" rel="stylesheet" />

     <!--Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/bootstrap-css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

     <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

     <!--font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!--font-awesome -->
    <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/solid.css" rel="stylesheet" />

     <!--Animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

     <!--custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/header.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/footer.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/subscriberLogin.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/signup.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/passwordReset.css" />



  <title><?php echo $title; ?></title>
</head>

<body>

  <header class="container-fluid d-md-none d-block  header-section">
    <!-- <nav class="mb-3 navbar navbar-dark navbar-expand-md text-black fixed-top"> -->
    <nav class="mb-3 navbar navbar-dark navbar-expand-lg text-black">
      <!-- Brand -->
      <div class="logo-container">
        <a class="navbar-brand logo-link mr-4" href="<?php echo base_url(); ?>">
          <img class="logo-img img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logo.png" alt="" />
        </a>
      </div>
      <div class="login-btn">
        <div class="user_icon nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle--custom p-0 d-md-block d-none" data-toggle="dropdown"
            href="#" role="button" aria-expanded="false">
            <img src="<?php echo base_url(); ?>assets/updated-assets/images/users.svg" alt="users" />
          </a>
          <a class="nav-link dropdown-toggle dropdown-toggle--custom p-0 d-md-none d-block" data-toggle="dropdown"
            role="button" aria-expanded="false">
            <img src="<?php echo base_url(); ?>assets/updated-assets/images/users.svg" alt="users" />
          </a>
          <div class="dropdown-menu user_icon--dropdown desktopDropdown p-0">
              
            <!-- Desktop view for login and logout -->
            <div class="d-md-block d-none">
                
            <?php if (@$userID && !@$ongod && @$user_type == 'tenant') { ?>
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('user/dashboard'); ?>">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/dashboard-icon.svg" alt="">
                  &nbsp;&nbsp;Dashboard
                </a>
              </div>
              
              <div class="dropdown-divider"></div>
              
              <div class="px-3 py-4">
            <?php if ((empty($balance['account_balance']) || is_null($balance['account_balance']))) { ?>
                <a class="dropdown-item" href="signup.html">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                  <i class="fa-solid fa-user-plus"></i>
                  &nbsp;&nbsp;Create wallet
                </a>
            
            <?php } else { ?>
                <div class="dropdown-item d-flex align-items-start ">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                        &nbsp;&nbsp;
                        <div class="d-flex align-items-start">
                          <div class="mr-2">Wallet balance<br>&#8358;<?php echo number_format(@$balance['account_balance']); ?></div>
                          <a href="#" class="btn primary-background">Top up</a>
                        </div>
                </div>
            <?php }  ?>
            
              </div>
              
              <div class="dropdown-divider"></div>
              
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logout-icon.svg" alt="">
                  &nbsp;&nbsp;Logout
                </a>
              </div>
              
              
              <?php } else if (@$userID && !@$ongod && @$user_type == 'landlord') { ?>
              
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('user/landlord'); ?>">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/dashboard-icon.svg" alt="">
                  &nbsp;&nbsp;Dashboard
                </a>
              </div>
              
              
              <div class="dropdown-divider"></div>
              
              
              <div class="px-3 py-4">
            <?php if ((empty($balance['account_balance']) || is_null($balance['account_balance']))) { ?>
                <a class="dropdown-item" href="#">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                  <i class="fa-solid fa-user-plus"></i>
                  &nbsp;&nbsp;Create wallet
                </a>
            
            <?php } else { ?>
                <div class="dropdown-item d-flex align-items-start ">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                        &nbsp;&nbsp;
                        <div class="d-flex align-items-start">
                          <div class="mr-2">Wallet balance<br>&#8358;<?php echo number_format(@$balance['account_balance']); ?></div>
                          <a href="#" class="btn primary-background">Top up</a>
                        </div>
                </div>
            <?php }  ?>
            
              </div>
              
              <div class="dropdown-divider"></div>
              
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logout-icon.svg" alt="">
                  &nbsp;&nbsp;Logout
                </a>
              </div>
              
              
              <?php } else { ?>
              
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('login'); ?>">
                  <!--<i class="fa-solid fa-right-to-bracket"></i>-->
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/login-icon.svg" alt="">
                  &nbsp;&nbsp;Login
                </a>
              </div>
              
              
              <div class="dropdown-divider"></div>
              
              
              <div class="px-3 py-4">
                <a class="dropdown-item" href="<?php echo base_url('signup'); ?>">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/create-icon.svg" alt="">
                  <!--<i class="fa-solid fa-user-plus"></i>-->
                  &nbsp;&nbsp;Create Account
                </a>
              </div>
              
              <?php } ?>
              
              
            </div>



            <!-- mobile view for login and logout -->
            
            <?php if (@$userID && !@$ongod && @$user_type == 'tenant') { ?>
            <div class="d-md-none d-block">
              <div class="mobileDropdown">
                  
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('user/dashboard'); ?>">
                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/dashboard-icon.svg" alt="">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    &nbsp;&nbsp;Dashboard
                  </a>
                </div>
                
                
                <div style="background-color: #ffffff; height: 1px;"></div>
                
                <?php if ((empty($balance['account_balance']) || is_null($balance['account_balance']))) { ?>
                
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="#">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                    <i class="fa-solid fa-user-plus"></i>
                    &nbsp;&nbsp;Create Wallet
                  </a>
                </div>
                <?php } else { ?>
                <div class="px-3 py-4">
                  <div class="dropdown-item d-flex align-items-end flex-wrap" href="#">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                    &nbsp;&nbsp;
                    <span class="font-weight-light">Wallet balance: &#8358;<?php echo number_format(@$balance['account_balance']); ?></span>
                    <a href="#" class="btn primary-background ml-1 py-1 px-1">Top up</a>
                  </div>
                </div>
                
                <?php } ?>
                
                <div style="background-color: #ffffff; height: 1px;"></div>
                
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                      <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logout-icon.svg" alt="">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    &nbsp;&nbsp;Logout
                  </a>
                </div>
                
              </div>
            </div>
            
            <?php } else if (@$userID && !@$ongod && @$user_type == 'landlord') { ?>

            <div class="d-md-none d-block">
              <div class="mobileDropdown">
                  
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('user/landlord'); ?>">
                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/dashboard-icon.svg" alt="">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    &nbsp;&nbsp;Dashboard
                  </a>
                </div>
                
                
                <div style="background-color: #ffffff; height: 1px;"></div>
                
                <?php if ((empty($balance['account_balance']) || is_null($balance['account_balance']))) { ?>
                
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="#">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                    <i class="fa-solid fa-user-plus"></i>
                    &nbsp;&nbsp;Create Wallet
                  </a>
                </div>
                <?php } else { ?>
                <div class="px-3 py-4">
                  <div class="dropdown-item d-flex align-items-end flex-wrap" href="#">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/walltet-dropdown-icon.svg" alt="">
                    &nbsp;&nbsp;
                    <span class="font-weight-light">Wallet balance: &#8358;<?php echo number_format(@$balance['account_balance']); ?></span>
                    <a href="#" class="btn primary-background ml-1 py-1 px-1">Top up</a>
                  </div>
                </div>
                
                <?php } ?>
                
                <div style="background-color: #ffffff; height: 1px;"></div>
                
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                      <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logout-icon.svg" alt="">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    &nbsp;&nbsp;Logout
                  </a>
                </div>
                
              </div>
            </div>

            
            <?php } else { ?>
            
            <div class="d-md-none d-block">
              <div class="mobileDropdown">
                  
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('login'); ?>">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/login-icon.svg" alt="">
                    <!--<i class="fa-solid fa-right-to-bracket"></i>-->
                    &nbsp;&nbsp;Login
                  </a>
                </div>
                
                
                <div style="background-color: #ffffff; height: 1px;"></div>
                
                
                <div class="px-3 py-4">
                  <a class="dropdown-item" href="<?php echo base_url('signup'); ?>">
                    <img class="img-fluid img-icon" src="<?php echo base_url(); ?>assets/updated-assets/images/create-icon.svg" alt="">
                    <!--<i class="fa-solid fa-user-plus"></i>-->
                    &nbsp;&nbsp;Create Account
                  </a>
                </div>
                
              </div>
            </div>
            
            <?php } ?>

            

          </div>

        </div>

        <div class="menu_icon">
          <a class="d-md-block d-none nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
            data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <span class="menu_icon--text">Menu</span>
          </a>
          <a class="d-md-none d-block  nav-link text-dark dropdown-toggle dropdown-toggle--custom p-0"
            data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <span class="menu_icon--text">Menu</span>
          </a>
          <div class="dropdown-menu menu_icon--dropdown p-0">
            <div class=" menu-desktop d-md-block d-none">
              <a class="dropdown-item mb-3" href="<?php echo base_url('properties'); ?>">Properties</a>
              <a class="dropdown-item mb-3" href="<?php echo base_url('landlord-landing'); ?>">Property Owner</a>
              <a class="dropdown-item" href="<?php echo base_url('faq'); ?>">FAQ</a>
              <!-- <div class="dropdown-divider"></div> -->
              <!-- <a class="dropdown-item my-4" href="#"> -->
              <p class="pl-4 font-weight-lighter my-4">
                <i class="fa-solid fa-envelope mr-3"></i>
                rent@smallsmall.com
              </p>
              <!-- </a> -->
              <!-- <a class="dropdown-item" href="#"> -->
              <p class="pl-4 font-weight-lighter m-0">
                <i class="fa-solid fa-phone mr-3"></i>
                0903 633 9800
              </p>
              <!-- </a> -->
              <!-- <a class="dropdown-item" href="#"> -->
              <p class="pl-4 font-weight-lighter m-0">
                <i class="fa-solid fa-phone mr-3"></i>
                0903 722 2669
              </p>
              <!-- </a> -->
            </div>

            <div class="menu-mobile p-4 d-md-none d-block">
              <div class="mb-4">
                <i class="fa-solid fa-xmark fa-3x"></i>
              </div>
              <div class="mb-5">
                <p class="mb-3">
                  <a class="text-white mb-3" href="<?php echo base_url('properties'); ?>">Subcribe</a>
                </p>
                <p class="mb-3">
                  <a class="text-white mb-3" href="<?php echo base_url('landlord-landing'); ?>">Property Owner</a>
                </p>
                <p class="mb-3">
                  <a class="text-white" href="<?php echo base_url('faq'); ?>">FAQ</a>
                </p>
              </div>
              <div>
                <p><a class="text-white" href="https://dev-stay.smallsmall.com"><small class="font-weight-light" style="font-size:10px">Nightly
                      stay</small><br>StayOne</a> </p>
                <p><a class="text-white" href="https://dev-buy.smallsmall.com"><small class="font-weight-light"
                      style="font-size:10px">Invest</small><br>BuySmallsmall</a> </p>
              </div>
              <div>
                <p class="font-weight-lighter m-0">
                  <i class="fa-solid fa-envelope mr-3"></i>
                  rent@smallsmall.com
                </p>
                <p class="font-weight-lighter m-0">
                  <i class="fa-solid fa-phone mr-3"></i>
                  0903 633 9800
                </p>
                <p class="font-weight-lighter m-0">
                  <i class="fa-solid fa-phone mr-3"></i>
                  0903 722 2669
                </p>
              </div>
            </div>

          </div>

        </div>

        <!-- MENU MOBILE VIEW DROPDOWN -->

        <!-- <img id="toggle_menu" src="image/menulogo.svg" id="menu" alt="search" /> -->
        <i class="fa-solid fa-bars"></i>

      </div>
    </nav>
    <!-- Button trigger modal -->

  </header>
