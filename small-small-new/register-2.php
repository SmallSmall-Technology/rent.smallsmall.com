<?php include('navless-header.php'); ?>
        <section class="login">
            <div class="login-container">
                <div class="login-box">
                    <div class="login-box-head">Create your account </div>
                    <form id="regForm">
                        <div class="login-element-container double-fields">
                            <label class="select">
                                <select>
                                    <option>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </label> 
                        </div>
                        <div class="login-element-container double-fields">
                            <label class="select">
                                <select>
                                    <option>How did you hear about us?</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Female">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="WOM">Word Of Mouth</option>
                                    <option value="Other">Other</option>
                                </select>
                            </label> 
                        </div>
                        <div class="login-element-container">
                            <input type="text" class="text-field" placeholder="Referral Code (Optional)" />
                        </div> 
                        <div class="login-element-container">
                            <input type="submit" class="reg-btn" value="Sign up" />
                        </div>
                    </form>
                </div>
                <div class="forgot-password-box">
                By signing up for an account you agree to our <a href="/privacy-policy">Privacy Policy</a> and <a href="terms-and-conditions">Terms of use</a>.
                </div>
            </div>
        </section>    
<?php include('flat-footer.php'); ?>