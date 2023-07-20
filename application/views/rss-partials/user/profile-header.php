	<!--<div class="dash-user">
		<div class="dash-user-inner">
		    <?php
		        //$link = "";
				//(@$profile_pic['profile_picture']) ? $link = $userID.'/'.$profile_pic['profile_picture'] : $link = "profile-img.png";
			?>

			<div class="dash-profile-pic">
                <img src="<?php //echo base_url(); ?>uploads/users/<?php //echo $link; ?>" alt="RSS User picture" />
			</div>
			<div class="dash-profile-name">Hi, <?php //echo $fname.' '.$lname ?></div>
		</div>
	</div>--->
	
    					
    <!--- dash pane starts here ---->
        <div class="dash-item-pane">
            <div class="dash-item-pane-inner">
                <!---Side Navigation Begins Here ---->
                <div class="dash-items white-bg">
                    <div class="dash-mobile-menu-link">
                        <div id="dash-mobile-menu" class="dash-menu-bars">
                            <span class="dash-bar"></span>
                            <span class="dash-bar"></span>
                            <span class="dash-bar"></span>
                        </div>
                    </div>
                    <?php 
                        $pref_dash = ''; 
                        $pref_chat = ''; 
                        $pref_book = ''; 
                        $pref_wallet = ''; 
                        $pref_rating = ''; 
                        $pref_repairs = ''; 
                        $pref_profile = ''; 
                        $pref_trans = ''; 
                        $pref_square = ''; 
                        $pref_feedback = ''; 
                    ?>
                    <div class="dash-menu-container">
                        <div class="dash-item-link">
                            <a class="globe" href="<?php echo base_url(); ?>"><span class="link-icon filled-icn"></span><span class="link-txt">Go to site</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="dashboard <?php if($profile_title == 'Dashboard'){ echo "active"; $pref_dash = 'un'; } ?>" href="<?php echo base_url('user/dashboard'); ?>"><span class="link-icon <?php echo $pref_dash; ?>filled-icn"></span><span class="link-txt">Dashboard</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="chat <?php if($profile_title == 'Messages'){ echo "active"; $pref_chat = 'un'; } ?>" href="<?php echo base_url('user/messages'); ?>"><span class="link-icon <?php echo $pref_chat; ?>filled-icn"></span><span class="link-txt">Inbox</span></a>
                        </div>
                        <div class="dash-link-category">Main Menu</div>
                        <div class="dash-item-link">
                            <a class="booking <?php if($profile_title == 'Bookings'){ echo "active"; $pref_book = 'un'; } ?>" href="<?php echo base_url('user/bookings'); ?>"><span class="link-icon <?php echo $pref_book; ?>filled-icn"></span><span class="link-txt">Booking</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="wallet-credit <?php if($profile_title == 'Wallet'){ echo "active"; $pref_wallet = 'un'; } ?>" href="<?php echo base_url('user/wallet'); ?>"><span class="link-icon <?php echo $pref_wallet; ?>filled-icn"></span><span class="link-txt">Wallet & Credit</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="inspections <?php if($profile_title == 'Inspections'){ echo "active"; $pref_wallet = 'un'; } ?>" href="<?php echo base_url('user/my-inspections'); ?>"><span class="link-icon <?php echo $pref_wallet; ?>filled-icn"></span><span class="link-txt">My Inspections</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="prop-rating <?php if($profile_title == 'Rating'){ echo "active"; $pref_rating = 'un'; } ?>" href="<?php echo base_url('user/property-rating'); ?>"><span class="link-icon <?php echo $pref_rating; ?>filled-icn"></span><span class="link-txt">Property Rating</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="repair <?php if($profile_title == 'Repairs'){ echo "active"; $pref_repairs = 'un'; } ?>" href="<?php echo base_url('user/repairs'); ?>"><span class="link-icon <?php echo $pref_repairs; ?>filled-icn"></span><span class="link-txt">Repair Request</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="user-profile <?php if($profile_title == 'Profile'){ echo "active"; $pref_profile = 'un'; } ?>" href="<?php echo base_url('user/profile'); ?>"><span class="link-icon <?php echo $pref_profile; ?>filled-icn"></span><span class="link-txt">Profile</span></a>
                        </div>
                        <?php if(@$bss_request_count > 0 || @$bss_inspection_count > 0){ ?>
                            <div class="dash-item-link">
                                <a class="ll-bss <?php if($profile_title == 'Buysmallsmall'){ echo "active"; $pref_profile = 'un'; } ?>" href="https://dev-buy.smallsmall.com/user/dashboard"><span class="link-icon <?php echo $pref_profile; ?>filled-icn"></span><span class="link-txt">Buy Small Small</span></a>
                            </div>
                        <?php } ?>
                        <div class="dash-link-category">General</div>
                        <div class="dash-item-link">
                            <a class="transactions <?php if($profile_title == 'Transactions'){ echo "active"; $pref_trans = 'un'; } ?>" href="<?php echo base_url('user/transactions'); ?>"><span class="link-icon <?php echo $pref_trans; ?>filled-icn"></span><span class="link-txt">Transactions</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="ecommerce <?php if($profile_title == 'Square'){ echo "active"; $pref_square = 'un'; } ?>" href="<?php echo base_url('user/native-square'); ?>"><span class="link-icon <?php echo $pref_square; ?>filled-icn"></span><span class="link-txt">Native Square</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="feedback <?php if($profile_title == 'Feedback'){ echo "active"; $pref_feedback = 'un'; } ?>" href="<?php echo base_url('user/feedback'); ?>"><span class="link-icon <?php echo $pref_feedback; ?>filled-icn"></span><span class="link-txt">Feedback</span></a>
                        </div>
                        <div class="dash-item-link">
                            <a class="logout" href="<?php echo base_url('logout'); ?>"><span class="link-icon filled-icn"></span><span class="link-txt">Logout</span></a>
                        </div>
                    </div>
                    <!---- Mobile view verification---->
                    <div class="side-pocket mobile-pocket white-bg">
                        <?php
    				        $disp = "Unverified";
    				        
    					    if($verification_status == 'yes'){
    					        $disp = "Verified"; 
    					    }
    					?>
                        <div class="ver-icon <?php echo strtolower($disp);  ?>"></div>
                        <div class="ver-txt"><?php echo $disp; ?></div>
                    </div>
                    <!---- Mobile view verification---->
                    <div class="acct-manager-spc solid-green">
                        <span class="mgr-title">Account Manager</span>
                        <p><?php echo $profile['ad_fname'].' '.$profile['ad_lname'];  ?></p>
                        <p><a href="tel:+234<?php echo $profile['ad_phone']; ?>"><?php echo $profile['ad_phone']; ?></a></p>
                        <p><a href="mailto:<?php echo $profile['ad_email']; ?>"><?php echo $profile['ad_email']; ?></a></p>
                    </div>
                </div>
                <!---Side Navigation Ends Here ---->
                
                
                
                <div class="dash-items">
                    <div class="user-welcome">
                        <div class="dash-page-title green-txt"><?php echo $profile_title; ?> <span>(Subscriber)</span></div>
                        <div class="dash-page-username">Welcome back, <?php echo $fname.' '.$lname ?>! </div> 
                    </div>