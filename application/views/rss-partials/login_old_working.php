<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css?version=<?php echo rand(1, 999999999); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>
<body>

    <div class="container login-container">
        <div class="row login-row">
            <div class="col-lg-4 col-md-4 col-sm-12 form-section">
                <p class="login-header">Welcome back!</p>
                <p class="login-title">Login to your Smallsmall account</p>

                <div class="form">
                <form id="loginForm" method="post">
                    
                    <div class="form-report"></div>
                    
                    <!-- <div class="input-group"> -->
                        <input class="form-control mand-f" type="email" id="username" name="email" placeholder="Email address">
                    <!-- </div> -->

                    <div class="input-group">
                        <input class="form-control form-password mand-f" id="pass" type="password" name="password" placeholder="Password">
                        
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="#" class="toggle_hide_password">
                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                </a>
                                </span>
                            </div>
                        </div>
                        
                        <input type="hidden" class="current-page" id="current-page" value="<?php if(@$_SERVER['HTTP_REFERER']){ echo $_SERVER['HTTP_REFERER']; }else{ echo $this->session->userdata('page_link'); } ?>" />


                    <p class="reset-btn">Forgot Password?<a href="<?php echo base_url(); ?>reset-password">Reset password</a></p>

                    <div class="form-btn">
                        <button type="submit"  name="login" class="submit-btn loginButton">Login</button>
                    </div>
                    
                </form>
            </div>
            </div>

            <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 login-background">
                <a class="img-a" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/RSS-H-1.png" alt=""></a>
                <p class="create-p">Don't have an account? <a href="<?php echo base_url(); ?>signup">Create account</a></p>
                <p class="text-p">Download the App</p>

                <div class="button">
                    <button> <a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><img src="<?php echo base_url(); ?>assets/images/apple.png" alt="apple-icon"> on the App store</a></button>
                    <button> <a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><img src="<?php echo base_url(); ?>assets/images/google-play.png" alt="google-play-icon"> on Google play</a></button>
                </div>
            </div>
        </div>

    </div>


    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>
 
</body>
</html>