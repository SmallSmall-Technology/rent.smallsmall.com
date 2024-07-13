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
                            <button class="login-btn next-btn">Next<i class="fa fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="forgot-password-box">
                By signing up for an account you agree to our <a href="">Privacy Policy</a> and <a href="">Terms of use</a>.
                </div>
            </div>
        </section>    
<?php include('footer.php'); ?>  