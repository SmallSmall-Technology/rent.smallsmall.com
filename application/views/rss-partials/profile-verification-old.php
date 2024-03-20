        <div class="other-content">
            <div class="verification-container">
                <div class="ver-page">Verify Me</div>
                <div class="ver-note">Before you can subscribe with us we need to know who you are since this will be a long partnership. We do not share data with any 3rd party or government agency.</div>
                <div class="ver-curr">Personal profile</div>
                
                <ul id="progressbar">
                    <li class="active verification"></li>
                    <li class="verification"></li>
                    <li class="verification"></li>
                    <li class="verification"></li>
                </ul>
                <div class="ver-form-container">
                    <form id="profileVerification" method="POST" autocomplete="off">
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Firstname</label>
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="first-name" />
                            </div>
                            <div class="input-holder">
                                <label>Lastname</label>                        
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="last-name" />
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Email</label>
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="email" />
                            </div>
                            <div class="input-holder">  
                                <label>Phone</label>                      
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="phone" />
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Net Monthly Income</label>
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="gross-pay" />
                            </div>
                            <div class="input-holder"> 
                                <label>Date Of Birth</label>                       
                                <input type="text" onclick="(this.type='date')" class="rss-text-f light-blue-bg verify-txt-f" id="dob" />
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Marital Status</label>
                                <div class="select light-blue-bg">
                                    <select class="standard-select marital-status verify-txt-f" id="marital-status">
                                        <option value="single">Single</option>

            							<option value="married">Married</option>
            
            							<option value="divorced">Divorced</option>
            
            							<option value="widowed">widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder"> 
                                <label>Gender</label>                       
                                <div class="select light-blue-bg">
                                    <select class="standard-select gender verify-txt-f" id="gender">
                                        
                                        <option value="Male">Male</option>

            							<option value="Female">Female</option>
            							
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Country</label>
                                <div class="select light-blue-bg">
                                    <select class="standard-select country verify-txt-f" id="country">
                                        <option value="" selected="selected">Country</option>
        							    <?php
        
        									$CI =& get_instance();
        
        									$countries = $CI->get_countries();
        
        									foreach($countries as $country => $value){
        
        										echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
        
        									}
        
        							    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-holder">  
                                <label>State</label>                      
                                <div class="select light-blue-bg">
                                    <select class="standard-select states verify-txt-f">
                                        <option value="" selected="selected">State</option>
        							    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>City</label>
                                <input type="text" disabled class="rss-text-f light-blue-bg verify-txt-f" id="city" />
                            </div>
                            <div class="input-holder"> 
                                <label>ID Number (Driver's License, NIN, International Passport)</label>                       
                                <input type="text" class="rss-text-f light-blue-bg verify-txt-f" id="passport-number" />
                            </div>
                        </div>
                        <div class="form-input-cont"> 
                            <div class="input-holder">                           
                                <label>Linkedin URL (optional)</label>
                                <input type="text" class="rss-text-f light-blue-bg" id="linkedin-url" />
                            </div>
                        </div>
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <button type="submit" class="rss-form-button verifyBut" id="verifyBut">Next</div>
                            </div>
                            <div class="input-holder">                        
                                &nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>