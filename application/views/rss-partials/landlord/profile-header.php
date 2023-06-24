<!--- dash pane starts here ---->
        <div class="dash-item-pane">
            <div class="dash-item-pane-inner">
                <!---Side Navigation Begins Here ---->
                <div class="dash-items white-bg">
                    <div class="dash-mobile-menu-link">
                        <div class="dash-menu-bars">
                            <span class="dash-bar"></span>
                            <span class="dash-bar"></span>
                            <span class="dash-bar"></span>
                        </div>
                    </div>
                    <?php 
                        $pref_dash = ''; 
                        $pref_chat = ''; 
                        $pref_props = ''; 
                        $pref_subs = ''; 
                        $pref_payouts = ''; 
                        $pref_repairs = ''; 
                        $pref_profile = ''; 
                        $pref_reports = ''; 
                        $pref_feedback = ''; 
                    ?>
                    <div class="dash-menu-container">
                        <div class="dash-ll-item-link">
                            <a class="" href="<?php echo base_url(); ?>"><span class="link-icon filled-icn"></span><span class="link-txt">Go to site</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="ll-dashboard <?php if($profile_title == 'Dashboard'){ echo "active"; $pref_dash = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/dashboard"><span class="link-icon <?php echo $pref_dash; ?>filled-icn"></span><span class="link-txt">Dashboard</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="ll-chat <?php if($profile_title == 'Messages'){ echo "active"; $pref_chat = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/messages"><span class="link-icon <?php echo $pref_chat; ?>filled-icn"></span><span class="link-txt">Inbox</span></a>
                        </div>
                        <div class="dash-link-category">Main Menu</div>
                        <div class="dash-ll-item-link">
                            <a class="property <?php if($profile_title == 'Properties'){ echo "active"; $pref_props = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/properties"><span class="link-icon <?php echo $pref_props; ?>filled-icn"></span><span class="link-txt">My Properties</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="subscribers <?php if($profile_title == 'Subscribers'){ echo "active"; $pref_subs = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/subscribers"><span class="link-icon <?php echo $pref_subs; ?>filled-icn"></span><span class="link-txt">My Subscribers</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="payout <?php if($profile_title == 'Payouts'){ echo "active"; $pref_payouts = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/payouts"><span class="link-icon <?php echo $pref_payouts; ?>filled-icn"></span><span class="link-txt">Payouts</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="ll-repair <?php if($profile_title == 'Repairs'){ echo "active"; $pref_repairs = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/repairs"><span class="link-icon <?php echo $pref_repairs; ?>filled-icn"></span><span class="link-txt">Repairs</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="landlord-profile <?php if($profile_title == 'Profile'){ echo "active"; $pref_profile = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/profile"><span class="link-icon <?php echo $pref_profile; ?>filled-icn"></span><span class="link-txt">Profile</span></a>
                        </div>
                        <?php if(@$bss_request_count > 0 || @$bss_inspection_count > 0){ ?>
                            <div class="dash-ll-item-link">
                                <a class="ll-bss <?php if($profile_title == 'Buysmallsmall'){ echo "active"; $pref_profile = 'un'; } ?>" href="<?php echo base_url(); ?>landlord/bss-requests"><span class="link-icon <?php echo $pref_profile; ?>filled-icn"></span><span class="link-txt">BuySmallSmall</span></a>
                            </div>
                        <?php } ?>
                        <div class="dash-link-category">General</div>
                        <div class="dash-ll-item-link">
                            <a class="landlord-reports <?php if($profile_title == 'Reports'){ echo "active"; $pref_reports = 'un'; } ?>" href="<?php echo base_url(); ?>"><span class="link-icon <?php echo $pref_reports; ?>filled-icn"></span><span class="link-txt">Reports</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="ll-feedback <?php if($profile_title == 'Feedback'){ echo "active"; $pref_feedback = 'un'; } ?>" href="<?php echo base_url(); ?>"><span class="link-icon <?php echo $pref_feedback; ?>filled-icn"></span><span class="link-txt">Feedback</span></a>
                        </div>
                        <div class="dash-ll-item-link">
                            <a class="" href="<?php echo base_url('logout'); ?>"><span class="link-icon filled-icn"></span><span class="link-txt">Logout</span></a>
                        </div>
                    </div>
                    <div class="acct-manager-spc solid-lemon">
                        <span class="mgr-title">Account Manager</span>
                        <p><?php echo $profile['ad_fname'].' '.$profile['ad_lname'];  ?></p>
                        <p><a href="tel:+234<?php echo $profile['ad_phone']; ?>"><?php echo $profile['ad_phone']; ?></a></p>
                        <p><a href="mailto:<?php echo $profile['ad_email']; ?>"><?php echo $profile['ad_email']; ?></a></p>
                    </div>
                </div>
                <!---Side Navigation Ends Here ---->
                <div class="dash-items">
                    <div class="user-welcome">
                        <div class="dash-page-title lemon-txt"><?php echo $profile_title; ?><span>(Landlord)</span></div>
                        <div class="dash-page-username">Welcome back, <?php echo $fname.' '.$lname; ?>! </div> 
                    </div>