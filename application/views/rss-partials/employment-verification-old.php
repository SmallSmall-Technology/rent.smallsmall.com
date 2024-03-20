    <div class="other-content">
        <div class="verification-container">
            <div class="ver-page">Verify Me</div>
            <div class="ver-note">Before you can subscribe with us we need to know who you are since this will be a long partnership. We do not share data with any 3rd party or government agency.</div>
            <div class="ver-curr">Employment History</div>
            <div class="progress" style="height: 9px; width: 100%;">
                <div class="progress-bar" role="progressbar" style="width: 40%; background: #007DC1 !important;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <ul id="progressbar">
                <li class="active verification"></li>
                <li class="active verification"></li>
                <li class="active verification"></li>
                <li class="verification"></li>
            </ul>
            <div class="ver-form-container">
                <form id="employmentForm" method="POST" autocomplete="off">
                    <div class="form-input-cont">
                        <div class="input-holder">
                            <label>Employment status</label>
                            <div class="select light-blue-bg">
                                <select class="employment_status verify-txt-f" id="employment-status" name="employment-status">
                                    <option value="Employed">Employed</option>
						            <option value="Unemployed" >Unemployed</option>
						            <option value="Self employed" >Self employed</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="input-holder">
                            <label>Occupation/Job title</label>                        
                            <input type="text" class="rss-text-f light-blue-bg job_title verify-txt-f" id="" />
                        </div>
                    </div>
                    <div class="form-input-cont">
                        <div class="input-holder">
                            <label>Company name</label>                        
                            <input type="text" class="rss-text-f light-blue-bg company_name verify-txt-f" id="" />
                        </div>
                        <div class="input-holder">  
                            <label>HR's full name</label>                                              
                            <input type="text" class="rss-text-f light-blue-bg manager_hr_name verify-txt-f" id="" />
                        </div>
                    </div>
                    <div class="form-input-cont">
                        <div class="input-holder">
                            <label>HR's email address</label>                        
                            <input type="text" class="rss-text-f light-blue-bg manager_hr_email verify-txt-f" id="" />
                        </div>
                        <div class="input-holder"> 
                            <label>HR's phone</label>                         
                            <input type="text" class="rss-text-f light-blue-bg manager_hr_phone verify-txt-f" id="" />
                        </div>
                    </div>
                    <div class="form-input-cont">
                        <div class="input-holder">
                            <label>Company's address</label>                        
                            <input type="text" class="rss-text-f light-blue-bg company_address verify-txt-f" id="" />
                        </div>
                        
                    </div>
                    <div class="form-title-separator">Guarantor's details</div>
                    <div class="form-input-cont">
                        <div class="input-holder">
                            <label>Full name/Relationship</label>                        
                            <input type="text" class="rss-text-f light-blue-bg guarantor_name verify-txt-f" id="" />
                        </div>
                        <div class="input-holder">  
                            <label>Email</label>                        
                            <input type="text" class="rss-text-f light-blue-bg guarantor_email verify-txt-f" id="" />
                        </div>
                    </div>
                    <div class="form-input-cont">
                        <div class="input-holder"> 
                            <label>Phone</label>                        
                            <input type="text" class="rss-text-f light-blue-bg guarantor_phone verify-txt-f" id="" />
                        </div>
                        <div class="input-holder"> 
                            <label>Occupation/Job title</label>                        
                            <input type="text" class="rss-text-f light-blue-bg guarantor_job_title verify-txt-f" id="" />
                        </div>
                    </div>
                    <div class="form-input-cont"> 
                        <div class="input-holder">                                
                            <label>Full address</label>                      
                            <input type="text" class="rss-text-f light-blue-bg guarantor_address verify-txt-f" id="" />
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
