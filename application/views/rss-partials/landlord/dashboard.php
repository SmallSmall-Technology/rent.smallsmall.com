                    <div class="card-container">
                        <div class="dash-top-cards">
                            <div class="dash-card-header"><div class="card-icn prop-icn"></div>Property Status</div>
                            <div class="dash-card-txt-container">
                                <table width="100%">
                                    <?php $rent_stat = ''; ?>
                                    <tr>
                                        <td class="card-td"><div class="txt-shortner"><?php if(!empty(@$properties) && @$properties[0]['propertyTitle']){ echo $properties[0]['propertyTitle']; }else{ echo "No Property yet"; } ?></div></td>
                                        <td class="card-td">
                                            <?php if(!empty(@$properties) && @$properties[0]['available_date'] > date('Y-m-d')){ echo "Rented"; $rent_stat = 'rented'; }else if(!empty(@$properties) && @$properties[0]['available_date'] < date('Y-m-d')){ echo "Vacant"; $rent_stat = 'vacant'; }else{ echo "N/A"; $rent_stat = 'no-stat'; } ?>
                                        </td>
                                        <td width="20px">
                                            <div class="rent-stat">
                                    
                                                <div class="rent-stat-ball <?php echo $rent_stat; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="card-td"><div class="txt-shortner"><?php if(!empty(@$properties) && @$properties[1]['propertyTitle']){ echo $properties[1]['propertyTitle']; }else{ echo "No Property yet"; } ?></div></td>
                                        <td class="card-td">
                                            <?php if(!empty(@$properties) && @$properties[1]['available_date'] > date('Y-m-d')){ echo "Rented"; $rent_stat = 'rented'; }else if(!empty(@$properties) && @$properties[1]['available_date'] < date('Y-m-d')){ echo "Vacant"; $rent_stat = 'vacant'; }else{ echo "N/A"; $rent_stat = 'no-stat'; } ?>
                                        </td>
                                        <td>
                                            <div class="rent-stat">
                                                <div class="rent-stat-ball  <?php echo $rent_stat; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="landlord-btns"><a href="<?php echo base_url(); ?>landlord/properties">Goto my properties</a></div>
                            </div>
                        </div>
                        <div class="dash-top-cards">
                            <div class="dash-card-header"><div class="card-icn payout-icn"></div>Payouts</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-wallet-icon"></div>
                                <div class="txt"><span style="font-family:helvetica">&#x20A6;</span><?php if(@$last_payout['amount_paid']){ echo number_format($last_payout['amount_paid']); }else{ echo 0; } ?></div>
                                <div class="subscription-address"><?php if(@$last_payout['payout_date']){echo date('d M, Y', strtotime($last_payout['payout_date']));}else{ echo "--:--:----"; } ?></div>
                                
                                <div class="landlord-btns top-30"><a href="<?php echo base_url(); ?>landlord/payouts">Goto payouts</a></div>
                            </div>
                        </div>
                        <div class="dash-top-cards">
                            <div class="dash-card-header"><div class="card-icn repair-icn"></div>Repair Requests</div>
                            <div class="dash-card-txt-container">
                                <table width="100%">
                                    <tr>
                                        <td class="card-td"><div class="txt-shortner"><?php if(!empty(@$repairs) && @$repairs[0]['repair_category']){ echo $repairs[0]['repair_category']; }else{ echo "No Repair"; } ?></div></td>
                                        <td class="card-td">
                                            <?php if(!empty(@$repairs) && @$repairs[0]['status']){ echo $repairs[0]['status']; }else{ echo "N/A"; } ?>
                                        </td>
                                        <?php 
                                            $stat1 = '';
                                            $stat2 = '';
                                        
                                            if(!empty(@$repairs) && @$repairs[0]['repair_category']){
                                                if($repairs[0]['repair_category'] == 'Logged'){
                                                    $stat1 = 'no-stat';
                                                }else if($repairs[0]['repair_category'] == 'Processing'){
                                                    $stat1 = 'in-progress';
                                                }else if($repairs[0]['repair_category'] == 'Completed'){
                                                    $stat1 = 'finished';
                                                }
                                        }else{
                                            
                                            $stat1 = 'no-stat';
                                            
                                        } 
                                        ?>
                                        <td width="20px">
                                            <div class="rent-stat">
                                                <div class="rent-stat-ball <?php echo $stat1; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="card-td"><div class="txt-shortner"><?php if(!empty(@$repairs) && @$repairs[1]['repair_category']){ echo $repairs[1]['repair_category']; }else{ echo "No Repair"; } ?></div></td>
                                        <td class="card-td"><?php if(!empty(@$repairs) && @$repairs[1]['status']){ echo $repairs[1]['status']; }else{ echo "N/A"; } ?></td>
                                        <?php 
                                        
                                            if(!empty(@$repairs) && @$repairs[1]['repair_category']){
                                                if($repairs[1]['repair_category'] == 'Logged'){
                                                    $stat2 = 'no-stat';
                                                }else if($repairs[1]['repair_category'] == 'Processing'){
                                                    $stat2 = 'in-progress';
                                                }else if($repairs[1]['repair_category'] == 'Completed'){
                                                    $stat2 = 'finished';
                                                }
                                        }else{
                                            
                                            $stat2 = 'no-stat';
                                            
                                        } 
                                        ?>
                                        <td>
                                            <div class="rent-stat">
                                                <div class="rent-stat-ball <?php echo $stat2; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="landlord-btns"><a href="<?php echo base_url(); ?>landlord/repairs">Goto my repairs</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-container">
                        <!---<div class="dash-mid-container">
                            <div class="dash-card-header">Accumulated points</div>
                            <div class="dash-card-txt-container">
                                <div class="icon dash-card-token-icon"></div>
                                <div class="txt">200 Points</div>
                            </div>
                        </div>--->
                        <div class="dash-mid-container">
                            <div class="dash-mid-title">
                                Your dashboard allows you to manage your subscription with Rent Smallsmall for the duration of your stay in any of our homes.
                            </div>
                            <div class="dash-mid-txt">Pay and renew your rent securely online</div>
                            <div class="dash-mid-txt">Save towards your next rent by funding your wallet</div>
                            <div class="dash-mid-txt">Rate and review the property you live in</div>
                            <div class="dash-mid-txt">View details about your tenancy</div>
                        </div>
                    </div>

                    <div class="card-container">
                        <div class="dash-onboarding-card">
                            <div class="onboarding-title">
                                <div class="onboarding-icn landlord"></div>
                                <div class="onboarding-txt">Onboarding status</div>
                            </div>
                            <!---- Verification process bar starts--->
                            <div class="verification-breadcrumb">
                                <div class="verification-breadcrumb-inner">
                                    
                                    <div class="verification-box"><span class="point-cover ll-colored"><i class="fa fa-check-circle-o"></i></span><span class="point-line ll-colored"></span></div>
                                    <div class="verification-box"><span class="point-cover ll-colored"><i class="fa fa-check-circle-o"></i></span><span class="point-line ll-colored"></div>
                                    <div class="verification-box"><span class="point-cover ll-colored"><i class="fa fa-check-circle-o"></i></span><span class="point-line ll-colored"><div class="verification-crumb-icn verified-crumb"></div></div>
                                    <div class="verification-box-txt">
                                        <div class="verification-txt">Property inspected</div>	
                                    </div>
                                    <div class="verification-box-txt">
                                        <div class="verification-txt">Verification In Process</div>	
                                    </div>
                                    <div class="verification-box-txt">
                                        <div class="verification-txt">Successfully Verified</div>
                                        <div class="verification-txt">Verified</div>		
                                    </div>
                                </div>
                            </div>						
                            <!---- Verification process bar ends--->
                        </div>
                    </div>  

                </div>