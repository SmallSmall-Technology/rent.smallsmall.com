<?php include('navless-header.php'); ?>  
        <section class="login">
            <div class="login-container">
                <div class="login-box">
                    <div class="login-box-head">Create your account </div>
                    <form id="regForm">
                        <div class="login-element-container double-fields">
                            <div class="elem-container">
                                <input type="text" class="text-field" placeholder="First name" />
                            </div>
                            <div class="elem-container">
                                <input type="text" class="text-field" placeholder="Last Name" />
                            </div> 
                        </div>
                        <div class="login-element-container">
                            <input type="text" class="text-field" placeholder="Email" />
                            <i class="fas fa-envelope"></i>
                        </div>                        
                        <div class="login-element-container">
                            <input type="text" class="text-field" placeholder="Phone" />
                        </div>
                        <div class="login-element-container">
                            <input type="password" class="text-field pass" placeholder="Password" />
                            <i id="show-password" class="fas fa-eye"></i>
                        </div>
                        <div class="login-element-container">
                            <input type="password" class="text-field pass" placeholder="Confirm password" />
                        </div>
                        <div class="login-element-container">
                            <button class="login-btn next-btn"><a href="/small-small-new/register-2">Next<i class="fa fa-chevron-right"></i></a></button>
                        </div>
                    </form>
                </div>
                <div class="forgot-password-box">
                By signing up for an account you agree to our <a href="/small-small-new/privacy-policy">Privacy Policy</a> and <a href="/small-small-new/terms-and-conditions">Terms of use</a>.
                </div>
            </div>
        </section>    
<?php include('footer.php'); ?>  