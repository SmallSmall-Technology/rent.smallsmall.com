<?php include('navless-header.php'); ?>
        <section class="login">
            <div class="login-container">
                <div class="login-box">
                    <div class="login-box-head">Welcome back! Login to SmallSmall</div>
                    <form id="ssLoginForm">
                        <div class="login-element-container">
                            <input type="text" class="text-field" placeholder="Email" />
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="login-element-container">
                            <input type="password" class="text-field pass" placeholder="Password" />
                            <i id="show-password" class="fas fa-eye"></i>
                        </div>
                        <div class="login-element-container">
                            <input type="submit" class="login-btn" value="Login" >
                        </div>
                    </form>
                </div>
                <div class="forgot-password-box">
                    <a href="/forget-password">Forgot password?</a>
                </div>
                <div class="login-register-box">
                    <div class="text-head">Don't have an account?</div>
                    <div class="text-note"><a href="/small-small-new/register">Sign up</a>  to enjoy all our products</div>
                </div>
            </div>
        </section>    
<?php include('flat-footer.php'); ?>