<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>
<body>

    <div class="container login-container">
        <div class="row login-row">
            <div class="col-lg-4 col-md-4 col-sm-12 form-section">
                <p class="login-header">Password Reset</p>
                <p class="login-title">Enter your new password in the fields below.</p>

                <div class="form">
                <form id="pwdForm" autocomplete="off" method="POST">
                    
                    <div class="form-report"></div>
                    
                    <div class="input-group">
                        <input class="form-control mand-f" type="password" id="password" placeholder="Password">
                        <div class="pass-dir" style="font-family:gotham;color:red;font-size:10px;text-align:left;min-height:10px;overflow:auto;display:none">Password should be more than 6 characters, have at least a capital letter, a number, and a special character</div>
                    </div>
                    
                    <div class="input-group">
                        <input class="form-control mand-f" type="password" id="password_2" placeholder="Confirm password">
                    </div>
                        
                    <input type="hidden" class="user_id" value="<?php  echo @$tempID; ?>" /> 
                        
                    <div class="form-btn">
                        <button type="submit"  name="login" class="submit-btn loginButton">Reset</button>
                    </div>
                    
                </form>
            </div>
            </div>

            <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 login-background">
                <img src="images/RSS-H-1.png" alt="">
                <p class="create-p">Don’t have an account? <a href="<?php echo base_url(); ?>signup">Create account</a></p>
                <p class="text-p">Download the App</p>

                <div class="button">
                    <button> <img src="<?php echo base_url(); ?>assets/images/apple.png" alt="apple-icon"> on the App store</button>
                    <button> <img src="<?php echo base_url(); ?>assets/images/google-play.png" alt="google-play-icon"> on Google play</button>
                </div>
            </div>
        </div>

    </div>


    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
 
</body>
</html>