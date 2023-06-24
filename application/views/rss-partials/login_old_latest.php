       
    <div class="reg-login-container">
        <div class="rl-item form-part">
            <div class="rl-form-container">
                <div class="back-to-home"><a href="index.php"><i class="fa fa-angle-left"></i> Home</a></div>
                <div class="teaser">Welcome back!</div>
                <div class="sub-teaser">Login to your SmallSmall account.</div>
                <form id="loginForm" method="post">
                    <div class="form-report alert"></div>
                    <div class="form-el-container">
                        <input type="text" class="rss-text-f light-blue-bg email mand-f" id="username" placeholder="Email address" name="email" />
                    </div>
                    <div class="form-el-container">
                        <input type="password" class="rss-text-f light-blue-bg form-password mand-f" id="pass" placeholder="Password" name="password" />
                        <span class="field-icns"><i class="fa fa-eye-slash" id="unleashPass"></i></span>
                    </div>
                    <div class="form-txt">Forgot password? <a href="<?php echo base_url('reset-password'); ?>">Reset password</a></div>
                    
                    <input type="hidden" class="current-page" id="current-page" value="<?php if(@$_SERVER['HTTP_REFERER']){ echo $_SERVER['HTTP_REFERER']; }else{ echo $this->session->userdata('page_link'); } ?>" />

                    <div class="form-el-container">
                        <button class="rss-form-button loginButton" id="" >Login</button>
                    </div>
                </form>
                <div class="rl-mobile-disp">
                    <div class="rl-app-directions dark align-center">Download the app</div>
                    <ul class="app-link-container">
                        <li class="app-links"><a class="border-round" href="https://apps.apple.com/us/app/smallsmall/id1643608622"><img style="float:left" src="<?php echo base_url(); ?>assets/img/store-logo/apple.svg" width="14px" /> on the App store</a></li>
                        <li class="app-links"><a class="border-round" href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><img style="float:left" src="<?php echo base_url(); ?>assets/img/store-logo/google-play.svg" width="12px" /> on the Google play</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rl-item image-part login">
            <div class="image-overlay">
                <div class="rl-logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-white.png" alt="White RSS Logo" /></a></div>
                <div class="rl-directions">Don't have an account? <a href="<?php echo base_url('signup'); ?>">Sign up</a></div>
                <div class="rl-app-directions">Download the app</div>
                <ul class="app-link-container">
                    <li class="app-links"><a href="https://apps.apple.com/us/app/smallsmall/id1643608622"><img style="float:left" src="assets/img/store-logo/apple.svg" width="14px" /> on the App store</a></li>
                    <li class="app-links"><a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><img style="float:left" src="assets/img/store-logo/google-play.svg" width="12px" /> on the Google play</a></li>
                </ul>
            </div>
        </div>
    </div> 

    <script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>

    <script>
        $(document).ready(function(){

            $('#unleashPass').on('click', function(){
    
                var passInput = $("#pass");
    
                if(passInput.attr('type')==='password')
                {
    
                    passInput.attr('type','text');
    
                }else{
    
                    passInput.attr('type','password');
    
                }
            });
        });
    </script>
