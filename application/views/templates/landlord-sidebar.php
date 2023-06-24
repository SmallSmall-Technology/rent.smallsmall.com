                <!----Sidebar starts here ---->
                <div class="dash-items">
                    <div class="side-pocket-container">
                        <div class="side-pocket solid-lemon">
                            <div class="referral-head">Referral Code</div>
                            <div class="referral-code"><?php echo @$refCode; ?></div>
                        </div>

                        <div class="side-pocket white-bg">
                            <?php
                                
    						        $disp = "unverified";
    						        
    							    if($verification_status == 'yes'){
    							        $disp = "verified"; 
    							    }
    							    
    							?>
							
							    
                                <div class="ver-icon <?php echo strtolower($disp);  ?>-landlord"></div>
                                <div class="ver-txt"><?php echo ucfirst($disp); ?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
	