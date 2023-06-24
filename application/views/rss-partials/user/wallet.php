                <!---- Main pane starts here ---->
                <?php

				    $CI =& get_instance();
				
                ?>
                
                <?php if(@$account_details){ ?>    
                    <div style="width:100%;display:inline-block">
                        <ul class="wallet-credit-nav">   
                            <li class="wallet-credit-item"><a class="active" href="<?php echo base_url('user/wallet'); ?>"><div class="page-switch-icn top-wallet-icon-white"></div><div class="page-switch-txt">Wallet</div></a></li>
                            <li class="wallet-credit-item"><a href="<?php echo base_url('user/credit'); ?>"><div class="page-switch-icn top-credit-icon-blk"></div>Credit</a></li>
                        </ul>
                    </div>
                <?php } ?>
                
                <?php if(@!$account_details || $verification_status != 'yes'){ ?>
                    <!----- User without BVN starts here ---->
                    <div style="width:100%;display:inline-block;background:#FFF;border-radius:5px">
                        <table width="100%" cellpadding="5">                            
                            <tr>
                                <td width="50px" valign="top"><div class="top-booking-icon top-wallet-icon"></div></td>
                                <td>
                                    <div class="dash-bt-header">Create Wallet </div>
                                    <div class="dash-wallet-subheader">To use our wallet feature please provide your <b>BVN</b>. Your <b>BVN</b> will be encrypted and not shared</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="wallet-credit-container">
                        <div class="wallet-subscription-form">
                            
                            <div class="form-controls-container">
                                <label>BVN</label>
                                <input type="text" name="bvn" class="bvn dash-txt-f" id="bvn" />
                            </div>
                            <div class="form-controls-container">
                                <label>Account name</label>
                                <input type="text" name="account_name" class="account_name dash-txt-f" id="account_name" />
                            </div>
                            <div class="form-controls-container">
                                <label for="loan-agreement" class="checkbox-label"><input name="loan-agreement" type="checkbox" class="dash-chk-bx" id="loan-agreement" />By clicking, you agree to our <a href="#">terms and conditions</a></label>
                                
                            </div>
                            <div class="form-controls-container">
                                <?php if($verification_status == 'yes'){ ?>
                                
                                    <div class="action-btns account-create-btn green-bg update-bvn-btn">Create Wallet</div>
                                    
                                <?php }else{ ?>
                                
                                    <div class="action-btns grey-bg ">Create Wallet</div>
                                
                                <?php } ?>
                            </div>
                        </div>
                        <div class="empty-card-display">
                            <div class="empty-card">
                                <div class="card-logo"><img src="<?php echo base_url(); ?>assets/img/card-logo.svg" /></div>
                                <div class="virtual-account-info">Account Name: <span>John Doe</span></div>
                                <div class="virtual-account-info">Virtual Account Number: <span>000 000 0000</span></div>
                                <div class="virtual-account-info">Bank Name: <span>Unknown Bank</span></div>
                                <div class="virtual-account-info">Created On: <span>00/00</span></div>
                            </div>
                            <?php //echo $this->encrypt->encode('92028478394'); ?>
                        </div>
                    </div>
                <!----User without BVN ends here ---->
                <?php }else{ ?>
                    <!----User with BVN starts here ----->
                    <div style="width:100%;display:inline-block;background:#FFF;border-radius:5px">
                        <table width="100%" cellpadding="5">                    
                            <tr>
                                <td width="50px" valign="top"><div class="top-booking-icon top-wallet-icon"></div></td>
                                <td>
                                    <div class="dash-bt-header">Create Wallet</div>
                                    <div class="dash-wallet-subheader">Top up your wallet with ease.</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="wallet-credit-container">
                        <div class="wallet-subscription-form"> 
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-controls-container">
                                            <label>Enter amount</label> 
                                            <input type="text" class="topup-txt-f" id="funding-amount" placeholder="300000" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-controls-container">
                                <div id="top-up-btn" class="action-btns top-up-btn green-bg">Top up</div>
                                
                            </div>
                        </div>
                        <div class="empty-card-display">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-controls-container">
                                            <label>Wallet Balance</label>
                                            <div class="wallet-balance green-txt" style="font-weight:700"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format(@$account_details['account_balance']); ?></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-controls-container">
                                <!---<div id="top-up-btn" class="action-btns green-bg fund-withdrawal-btn">Withdraw</div>--->
                                <?php if($rss_paid){ ?>
                                
                                        <div class="action-btns green-bg wallet-transaction" id="wallet-transaction-<?php echo (@$new_subscription['price'] + @$new_subscription['serviceCharge']).'-'.@$new_subscription['bookingID']; ?>">Pay subscription</div>
                                
                                <?php }else{ ?>
                                
                                        <?php $sec_dep = $rss_transaction['securityDeposit'] * $rss_transaction['securityDepositTerm'];  ?>
                                        
                                        <div class="action-btns green-bg wallet-transaction" id="wallet-transaction-<?php echo @$rss_transaction['amount'].'-'.@$rss_transaction['bookingID']; ?>">Pay subscription</div>
                                        
                                <?php } ?>
                            </div>
                            <!---<div class="empty-card">
                                <div class="card-logo"><img src="<?php //echo base_url(); ?>assets/img/card-logo.png" /></div>
                                <div class="virtual-account-info">Account Name: <span>Oluwaseun Crowther</span></div>
                                <div class="virtual-account-info">Virtual Account Number: <span>201 700 0653</span></div>
                                <div class="virtual-account-info">Bank Name: <span>Providus Bank</span></div>
                                <div class="virtual-account-info">Created On: <span>12/24</span></div>
                            </div>--->                            
                        </div>
                    </div>
                    <!----User with BVN ends here ------->

                    <!---Wallet history starts here ----->
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active">Wallet history</li>
                    </ul>

                    <div class="subscription-list-container">
                        <!--- RSS ---->
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Amount</th>
                                <th class="td-head green-txt">Transaction ID</th>
                                <th class="td-head green-txt">Type</th>
                                <th class="td-head green-txt">Date</th>
                                <th class="td-head green-txt">Status</th>
                            </tr>
                            
                            <tbody id="wallet-data">
                                
                            </tbody>
                            
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="wallet-data-loading"> </div>
                        <div class="load-more-bar" id="load-wallet-transactions">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                <!---Wallet history ends here ------>
                <?php } ?>
            </div>
            
    <script>
        $(document).ready(function(){
        
            var limit = 10;
            
            var start = 0;
            
            var action = 'inactive';
        
            function lazzy_loader(limit){
                
                var output = '';
              
                for(var count=0; count<limit; count++){
                  
                    output += '<div class="post-data">';
                    output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                    output += '</div>';
                    
                }
                
                $('#wallet-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchWalletTransactions",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#wallet-data-loading').html('No more result found');
                            
                            action = 'active';
                            
                        }else{
                            
                            $('#wallet-data').append(data);
                            
                            $('#wallet-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-wallet-transactions').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
<!--- Here is the end ----> 