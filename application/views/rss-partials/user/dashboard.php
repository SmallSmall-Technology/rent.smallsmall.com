
                    <div class="card-container">
                        <div class="dash-top-cards">
                            <div class="dash-card-header">Current Subscription</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-wallet-icon"></div>
                                <div class="subscription-txt"><?php echo @$rss_transaction['propertyTitle']; ?></div>
                                <div class="subscription-address"><?php echo @$rss_transaction['city']; ?></div>
                                <div class="subscription-address"><?php if(@$rss_transaction['move_in_date']){ echo date('d, M Y', strtotime($rss_transaction['move_in_date'])); }else{ echo "--:--:----"; } ?> - <?php if(@$rss_transaction['rent_expiration']){ echo date('d, M Y', strtotime($rss_transaction['rent_expiration'])); }else{ echo "--:--:----"; } ?></div>
                            </div>
                        </div>
                        <div class="dash-top-cards">
                            <div class="dash-card-header">Upcoming Payment</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-wallet-icon"></div>
                                <div class="txt"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format(@$rss_transaction['amount']); ?> <?php if(@$rss_transaction['bookingID'] && @$rss_transaction['payment_type']){ ?><div class="dash-card-btn"><a href="<?php echo base_url(); ?>pay-now/<?php echo @$rss_transaction['bookingID'].'/'.@$rss_transaction['payment_type']; ?>">Pay now</a></div> <?php } ?></div>
                                <div class="subscription-address"><?php if(@$rss_transaction['next_rental']){ echo date('d, M Y', strtotime($rss_transaction['next_rental'])); }else{ echo "--:--:----"; } ?></div>
                            </div>
                        </div>
                        <div class="dash-top-cards">
                            <div class="dash-card-header">Wallet Balance</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-wallet-icon"></div>
                                <div class="txt"><span style="font-family:helvetica">&#x20A6;</span><?php if(@$balance['account_balance']){ echo number_format(@$balance['account_balance']); } else { echo "0"; } ?><div class="dash-card-btn"><a href="<?php echo base_url('user/wallet'); ?>">Top up wallet</a></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-container">
                        <div class="dash-mid-container">
                            <div class="dash-card-header">Accumulated points</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-token-icon"></div>
                                <div class="txt"><?php echo @$profile['points']; ?> Points</div>
                            </div>
                        </div>
                        <div class="dash-mid-container">
                            <div class="dash-mid-title">
                                Your dashboard allows you to manage your subscription with Rent Smallsmall for the duration of your stay in any of our homes.
                            </div>
                            <div class="dash-mid-txt">&bullet; Pay and renew your rent securely online</div>
                            <div class="dash-mid-txt">&bullet; Save towards your next rent by funding your wallet</div>
                            <div class="dash-mid-txt">&bullet; Rate and review the property you live in</div>
                            <div class="dash-mid-txt">&bullet; View details about your tenancy</div>
                        </div>
                    </div>

                    <div class="card-container">
                        <div class="dash-onboarding-card">
                            <div class="onboarding-title">
                                <div class="onboarding-icn tenant"></div>
                                <div class="onboarding-txt">Onboarding status</div>
                            </div>
                            <!---- Verification process bar starts--->
                            <div class="verification-breadcrumb">
                                <div class="verification-breadcrumb-inner">
                                    
                                    <div class="verification-box"><span class="point-cover <?php if(@$verification_status == 'received' || @$verification_status == 'yes' || @$verification_status == 'processing' ){ echo 'colored'; }else{ echo 'uncolored'; } ?>"><i class="fa fa-check-circle-o"></i></span><span class="point-line <?php if(@$verification_status == 'yes' || @$verification_status == 'processing' ){ echo 'colored'; }else{ echo 'uncolored'; } ?>"></span></div>
    								<div class="verification-box"><span class="point-cover <?php if(@$verification_status == 'yes' || @$verification_status == 'processing' ){ echo 'colored'; }else{ echo 'uncolored'; } ?>"><i class="fa fa-check-circle-o"></i></span><span class="point-line <?php if(@$verification_status == 'yes' ){ echo 'colored'; }else{ echo 'uncolored'; } ?>"></div>
    								<div class="verification-box"><span class="point-cover <?php if(@$verification_status == 'yes'){ echo 'colored'; }else{ echo 'uncolored'; } ?>"><i class="fa fa-check-circle-o"></i></span><span class="point-line <?php if(@$verification_status == 'yes'){ echo 'colored'; }else{ echo 'uncolored'; } ?>"><div class="verification-crumb-icn <?php if(@$verification_status == 'yes'){ echo 'verified-crumb'; }else{ echo 'pending-verification-crumb'; } ?>"></div></div>
    								<div class="verification-box-txt">
    									<div class="verification-txt">Verification Received</div>	
    								</div>
    								<div class="verification-box-txt">
    									<div class="verification-txt">Verification In Process</div>	
    								</div>
    								<div class="verification-box-txt">
    									<div class="verification-txt">Successfully Verified</div>
    									<div class="verification-txt">Start Renting</div>		
    								</div>
    								
                                </div>
                            </div>						
                            <!---- Verification process bar ends--->
                        </div>
                    </div>  

                </div>
					