                        <div class="profile-container">
                            <div class="result-bar"></div> 
                            <form id="updateProfile" method="POST">
                                <div class="form-controls-container col-2">
                                    
                                    <div class="dash-form-container">
                                        <label>First Name</label>
                                        <input type="text" class="dash-txt-f first-name" value="<?php echo $profile['firstName'] ?>" />
                                    </div>
                                    <div class="dash-form-container">
                                        <label>Last Name</label>
                                        <input type="text" class="dash-txt-f last-name" value="<?php echo $profile['lastName'] ?>" />
                                    </div>
                                </div> 
                                <div class="form-controls-container">
                                    <label>Email</label>
                                    <input type="text" disabled class="dash-txt-f email" value="<?php echo $profile['email'] ?>" />                            
                                </div> 
                                <div class="form-controls-container">
                                    <label>Phone Number</label>
                                    <input type="text" class="dash-txt-f phone" value="<?php echo $profile['phone'] ?>" />                            
                                </div>
                                <div class="form-controls-container">
                                    <label>Monthly Income (Net)</label>
                                    <input type="text" class="dash-txt-f income_level" value="<?php echo $profile['income'] ?>" />                            
                                </div>
                                <input type="hidden" class="user_id" id="user_id" value="<?php echo $profile['userID']; ?>" />
                                <div class="form-controls-container">                            
                                    <button type="submit" class="profile-btn action-btns green-bg">Save Changes</button>
                                </div>
                            </form>
                        </div>                    
                    </div>
                    <!---- Main pane ends here ---->
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>