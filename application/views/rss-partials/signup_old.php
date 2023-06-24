    <div class="reg-login-container">
            <div class="rl-item reg-form-part">
                <div class="rl-form-container">
                    <div class="reg-back-to-home"><a href="<?php echo base_url(); ?>"><i class="fa fa-angle-left"></i> Home</a></div>
                    <div class="teaser">Let your joy begin</div>
                    <div class="reg-sub-teaser">Create your account.</div>
                    <form class="register-form" id="regForm">
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="form-report" style="padding:5px;border-radius:4px;" ></div>
                        <div class="final-signup-msg">
                            You have successfully registered. Check your email for confirmation mail to complete your registration.
                        </div>
                        <fieldset>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg reg-fields" id="fname" placeholder="Firstname" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg reg-fields" id="lname" placeholder="Lastname" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg reg-fields" id="email" placeholder="Email address" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg reg-fields" id="phone" placeholder="Phone number" name="" />
                            </div>
                            <input type="button" class="rss-form-button next" value="Next">
                            
                        </fieldset>
                        <fieldset>
                            <div class="form-el-container">
                                <input type="password" class="rss-text-f light-blue-bg reg-fields" id="password" placeholder="Password" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="password" class="rss-text-f light-blue-bg reg-fields" id="password_2" placeholder="Confirm password" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="number" class="rss-text-f light-blue-bg reg-fields" id="age" placeholder="Age" name="" />
                            </div>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg reg-fields income" id="income" placeholder="Monthly income" name="income" />
                            </div>
                            
                            <input type="button" class="rss-form-buttons previous" value="Previous">
                            <input type="button" class="rss-form-buttons next" value="Next">
                            
                        </fieldset>
                        <fieldset>
                            <div class="form-el-container">
                                <div class="select light-blue-bg">
                                    <select class="gender" id="gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-el-container">
                                <div class="select light-blue-bg">
                                    <select class="standard-select referral" id="referral">
                                        <option value="TV">TV</option>
                                        <option value="Radio">Radio</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Word of mouth">Word of mouth</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-el-container">
                                <input type="text" class="rss-text-f light-blue-bg" id="referral_code" placeholder="Referral code (Optional)" name="" />
                            </div>
                            <div class="form-el-container">
                                <div class="select light-blue-bg">
                                    <select class="standard-select interest reg-fields" id="interest">
                                        <option selected value="">What is your interest?</option>
                                        <option value="RSS">Renting a home</option>
                                        <option value="Buy2let">Buying a home</option>
                                        <option value="Stayone">Short stays</option>
                                    </select>
                                </div>
                                <input type="hidden" id="clicked" val="0" />
                            </div>
                            <div class="form-txt">By Signing up you have agreed to our<a href="<?php echo base_url('terms-of-use'); ?>"> Terms of service</a> and <a href="<?php echo base_url('privacy-policy'); ?>">Privacy policy</a></div>
                            
                            <input type="button" class="rss-form-buttons previous" value="Previous">
                            <input type="submit" class="rss-form-buttons finish-btn" value="Finish">
                            
                        </fieldset>
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
            <div class="rl-item image-part register">
                <div class="image-overlay">
                    <div class="rl-logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-white.png" alt="White RSS Logo" /></a></div>
                    <div class="rl-directions">Already have an account? <a href="<?php echo base_url('login'); ?>">Sign in</a></div>
                    <div class="rl-app-directions">Download the app</div>
                    <ul class="app-link-container">
                        <li class="app-links"><a href="https://apps.apple.com/us/app/smallsmall/id1643608622"><img style="float:left" src="<?php echo base_url(); ?>assets/img/store-logo/apple.svg" width="14px" /> on the App store</a></li>
                        <li class="app-links"><a href="https://play.google.com/store/apps/details?id=com.JustifiedTech.smallsmall"><img style="float:left" src="<?php echo base_url(); ?>assets/img/store-logo/google-play.svg" width="12px" /> on the Google play</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
        <script src="<?php echo base_url(); ?>assets/js/user-registration.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>
        <script>
            $(document).ready(function(){
                
                //jQuery time
                var current_fs, next_fs, previous_fs; //fieldsets
    
                $(".next").click(function(){
                                        
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    
                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show(); 
                    //hide the current fieldset with style
    
                    current_fs.hide();
                    
                });
    
                $(".previous").click(function(){
                                        
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    
                    //de-activate current step on progressbar
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    
                    //show the previous fieldset
                    previous_fs.show(); 
                    //hide the current fieldset with style
                    current_fs.hide();
                });
    
            });
        </script>