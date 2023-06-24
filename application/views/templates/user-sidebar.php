                    <!--- Sidebar starts here---->
                    <div class="dash-items">
                        <div class="side-pocket-container">
                            <div class="side-pocket solid-green">
                                <div class="referral-head">Referral Code</div>
                                <div class="referral-code"><?php echo @$refCode; ?></div>
                            </div>
    
                            <div class="side-pocket web-pocket white-bg">
                                
                                <?php
                                
    						        $disp = "Unverified";
    						        
    							    if($verification_status == 'yes'){
    							        $disp = "Verified"; 
    							    }
    							    
    							?>
							
							    
                                <div class="ver-icon <?php echo strtolower($disp);  ?>"></div>
                                <div class="ver-txt"><?php echo $disp; ?></div>
                            </div>
                            
                            <div class="side-pocket white-bg">
                                <div class="rating-box">
    								<!-- Progress bar 1 -->
    								<div class="rating-progress mx-auto" data-value='0'>
    									<span class="progress-lft">
    										<span class="progress-bar"></span>
    									</span>
    									<span class="progress-rght">
    										<span class="progress-bar"></span>
    									</span>
    									<div class="progress-value">
    										<div class="font-weight-bold">0</div>
    									</div>
    								</div>
    								<!-- END -->								
    							</div>
                            </div>
                            
                            <div class="side-pocket white-bg">
                                <div class="sub-head red-txt">Subscription debt</div>
                                <div class="debt-amount"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format($debt['amount_owed']); ?></div>
                                <div class="sub-btn"><a href="#">Pay now</a></div>
                            </div>
    
                        </div>
                    </div>
                    <!---- Sidebar ends here ---->
                </div>
            </div>
            <!---dash pane ends here --->
            <script src="assets/js/dashboard-menu.js"></script>