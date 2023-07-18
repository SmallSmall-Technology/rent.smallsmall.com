
<?php 

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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.min.css" crossorigin="anonymous" />

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
  <link rel="stylesheet" href="../assets/css/custom-css/inbox.css" />


  <title>Inbox</title>
</head>

<body>

  <header>
    <!-- desktop menu bar -->
    <nav class="navbar navbar-expand-lg nav-bottom-color navbar-light primary-background px-4 py-0 d-lg-flex d-none">
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
          <li class="nav-item d-flex align-items-center  mr-4">
            <div class="menu-text">
              <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">Dashboard</a>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-0" href="notification.html" tabindex="-1" aria-disabled="true">
              <div class="menu-logo mr-2 position-relative">
                <div class="notification-circle d-md-flex d-none justify-content-center align-items-center"><?php echo @$count; ?></div>
                <img class="img-fluid" src="../assets/images/inbox-icon.svg" alt="" />
              </div>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center dashboard-active mr-4">
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
            <a class="nav-link p-0" href="<?php echo base_url('dashboard/wallet'); ?>" tabindex="-1" aria-disabled="true">
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
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
        aria-expanded="false" aria-label="Toggle navigation">
        <img class="img-fluid" src="../assets/images/menu-burger.svg" alt="">
      </button>
      <a href="#" style="width: 33%" class="flex-grow-1 text-center">
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
          
          <?php echo $disp; ?>
          <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
            <small style="font-size: 10px; line-height: 14px;">Referral
              code
            </small><br>
            <?php echo @$refCode; ?>
          </button>
        </div>

      </div>

      <div id="my-nav" class="collapse navbar-collapse mobile-menu-collapse pl-0 pt-4">
        <div class="mb-4 pl-2 ">
          <p>
            <a href="<?php echo base_url('dashboard/index'); ?>" class=" text-dark" style="text-decoration: none;">
              <img class="img-fluid" src="../assets/images/dashboard-icon.svg" alt="">
              &nbsp;&nbsp; Dashboard
            </a>
          </p>
        </div>

        <div class="mb-4 pl-2 dashboard-active">
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

        <div class="mb-4 pl-2">
          <a href="https://buy.smallsmall.com/user/dashboard" class="btn special-link-button mt-3">
            <div>
              <p class="text-left" style="font-size: 10px;">Go to</p>
              <p class="text-right" style="font-size: 11px;">RentSmallsmall<br>dashboard</p>
            </div>
          </a>
        </div>
      </div>
    </nav>

  </header>

  <div class="container-fluid">
    <div>

    </div>
  </div>

  <main class="container">
    <div class="row mt-5">
      <div class="col-12 d-flex justify-content-between">
        <div style="color: #7D8993; font-size: 13px;" class="font-weight-lighter">
          <span>Rentsmallsmall</span>
          <span>></span>
          <span>Dashboard</span>
          <span>></span>
          <span>Notification</span>
        </div>
        <div class="d-md-block d-none">
            <?php echo $disp; ?>
          <!-- <button style="color:#DADADA" type="button" class="btn btn-light">Verified</button> -->
          <!-- <button type="button" class="btn btn-dark d-none">Verified</button> -->
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
      <div class="col-12 my-5">
        <p style="font-size: 22px;">Notification</p>
      </div>


    </div>
    <div class="row mb-5">
      <div class="col-md-12 d-md-flex   d-none justify-content-between mb-4">
        <p><span style="border-bottom: 2px solid black">All</span> notification</p>
      </div>
      <div class="col-12">
        <p>Latest Notification <span class="secondary-text-color">(<?php echo @$count; ?>)</span></p>
      </div>
    </div>
    <!-- latest message -->
    
    <div id="inbox-messages">
                                
    </div>
        
    
    
    <div class="row mb-4">

        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inbox-data-loading"> </div><br></br>
        <div class="text-right load-more-bar" id="load-inbox-messages">
            <a href="#" class="btn secondary-background">Load more</a>
        </div>
    </div>
      
    <!-- Older messages -->
    <!--<div class="row mb-4">-->
    <!--  <div class="col-12 mb-3">-->
    <!--    <p class="secondary-text-color">March 10,2023</p>-->
    <!--  </div>-->
    <!--  <div class="col-12 mb-3">-->
    <!--    <div class="message-container px-3 py-4 justify-content-between d-flex">-->
    <!--      <div class="d-flex align-items-center">-->
    <!--        <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-block">-->
    <!--          Rentsmallsmall-->
    <!--        </div>-->
    <!--        <div class="bss-btn p-2  mr-2 d-md-none d-block">-->
    <!--          RSS-->
    <!--        </div>-->
    <!--        <div class="msg-intro">-->
    <!--          <p>Property shares notification</p>-->
    <!--          <p style="font-size: 13px;">Dear John, Your shares are....</p>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="align-self-center mr-md-4 mr-1">-->
    <!--        <i class="fa-solid fa-greater-than"></i>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="col-12 mb-3">-->
    <!--    <div class="message-container px-3 py-4 justify-content-between d-flex">-->
    <!--      <div class="d-flex align-items-center">-->
    <!--        <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-block">-->
    <!--          Rentsmallsmall-->
    <!--        </div>-->
    <!--        <div class="bss-btn p-2  mr-2 d-md-none d-block">-->
    <!--          BSS-->
    <!--        </div>-->
    <!--        <div class="msg-intro">-->
    <!--          <p>Property shares notification</p>-->
    <!--          <p style="font-size: 13px;">Dear John, Your shares are....</p>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="align-self-center mr-md-4 mr-1">-->
    <!--        <i class="fa-solid fa-greater-than"></i>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--</div>-->

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


    <script src="<?php echo base_url(); ?>assets/js/message-opener.js" type="text/javascript"></script>
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
                output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                output += '</div>';
                
            }
            
            $('#inbox-data-loading').html(output);
            
        }
    
        lazzy_loader(limit);
    
        function load_data(limit, start)
        {
            $.ajax({
                
                url:"<?php echo base_url(); ?>rss/fetchMessage",
                
                method:"POST",
                
                data:{limit:limit, start:start},
                
                cache: false,
                
                success:function(data){
                    
                    if(data == ''){
                        
                        $('#inbox-data-loading').html('No more result found');
                        action = 'active';
                        
                    }else{
                        
                        $('#inbox-messages').append(data);
                        
                        $('#inbox-data-loading').html("");
                        
                        action = 'inactive';
                    }
                }
            })
        }
        
        if(action == 'inactive'){
            
            action = 'active';
            
            load_data(limit, start);         
        }
        
        $('#load-inbox-messages').click(function(){
            
            lazzy_loader(limit);
            
            action = 'active';
            
            start = start + limit;
            
            setTimeout(function(){
                
                load_data(limit, start);
                
            }, 1000);
            
        });
        
    });
    
    function insVal(val)
    {
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url('dashboard/mark_as_read'); ?>',
        data: {
          notification_id: val
        },
        success: function(response) {
          console.log(response); // Debugging purposes
        },
        error: function(xhr, status, error) {
        //   console.log(error); // Debugging purposes
        }
      });
    }
</script>


</body>

</html>