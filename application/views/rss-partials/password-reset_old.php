<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title>Login page</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/responsive_index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css?version=<?php echo rand(1, 999999999); ?>">-->
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>
<body>

    <div class="container login-container">
      <img src="<?php echo base_url(); ?>assets/front/images/login-image.png" alt="">
      <div class="row login-mobile-top">
        <div class="col mobile-logo"><img src="<?php echo base_url(); ?>assets/front/images/mobile-logo.png" alt=""></div>
        <div class="col"><a href="<?php echo base_url(); ?>signup"><button type="submit"  name="login" class="create-account-mobile-btn">Create Account</button></a></div>
      </div>
      
        <div class="row login-row">
            <div class="col-lg-4 col-md-4 col-sm-12 form-section">
                <p class="login-header">Password Reset</p>
                <p class="login-title"> We will email the instructions to reset your password </p>

                <div class="form">
                <form id="pwdResetForm" method="post">
                    <div class="form-report alert"></div>
                     <div class="input-group"> 
                        <input class="form-control email mand-f" id="username" type="email" placeholder="Email address">
                     </div> 

                  <div class="form-btn" style="margin-top:60px">
                    <button type="submit"  name="login" class="submit-btn loginButton">Send reset email</button>
                  </div>
                    
                </form>
            </div>
            </div>

             

            <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 login-background">
                <img src="<?php echo base_url(); ?>assets/front/images/RSS-H-1.png" class="login-logo" alt="">
                 
                
                <p class="create-p">Don’t have an account? <a href="">Create account</a></p>
                <p class="text-p">Download the App</p>

                <div class="button">
                  <button type="button" class="btn btn-dark btn-lg"><a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><i class="fab fa-apple"></i> on the App store</a> </button>
                  <button type="button" class="btn btn-outline-dark btn-lg"><a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><i class="fab fa-google-play"></i> on Google play </a></button>

                </div>
            </div>
        </div>

    </div>

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>

    <script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/script.js"></script>
    
    
    
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>
 
</body>
</html> 