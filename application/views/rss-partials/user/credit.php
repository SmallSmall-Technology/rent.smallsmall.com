                    <div style="width:100%;display:inline-block">
                        <ul class="wallet-credit-nav">   
                            <li class="wallet-credit-item"><a href="<?php echo base_url('user/wallet'); ?>"><div class="page-switch-icn top-wallet-icon-blk"></div><div class="page-switch-txt">Wallet</div></a></li>
                            <li class="wallet-credit-item"><a class="active" href="<?php echo base_url('user/credit'); ?>"><div class="page-switch-icn top-credit-icon-white"></div>Credit</a></li>
                        </ul>
                    </div>
                    <div class="wallet-credit-container">
                        <div class="wallet-subscription-form">
                            <table>                            
                                <tr>
                                    <td width="50px" valign="top"><div class="top-booking-icon top-credit-icon"></div></td>
                                    <td>
                                        <div class="dash-bt-header">Credit</div>
                                        <div class="dash-wallet-subheader">Top up your wallet with ease.</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px" valign="top"></td>
                                    <td>
                                        <div class="feat-tnx"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format(@$account_details['credit_limit']); ?></div>
                                        <div class="desc-txt">Eligible Amount</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px" valign="top"></td>
                                    <td>
                                        <div style="padding:0" class="form-controls-container">
                                            <div id="credit-request" class="action-btns green-bg">Request Credit <div class="btn-icn credit-request-icn"></div></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>                                   
                        </div>
                        <div class="empty-card-display">
                            <table>                            
                                <tr>
                                    <td width="50px" valign="top"><div class="top-booking-icon credit-in-icon"></div></td>
                                    <td>
                                        <div class="dash-bt-header">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px" valign="top"></td>
                                    <td>
                                        <div class="feat-tnx"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format(@$requested_credit->principal); ?></div>
                                        <div class="desc-txt">Requested Credit</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px" valign="top"></td>
                                    <td>
                                        <div style="padding:0" class="form-controls-container">
                                            <div style="color:#414042" class="action-btns grey-bg">Transfer to Wallet <div class="btn-icn wallet-tnf-icn"></div></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>                        
                        </div>
                    </div>
                    <!----User with BVN ends here ------->

                    <!---Wallet history starts here ----->
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active">Credit history</li>
                    </ul>

                    <div class="subscription-list-container">
                        <!--- RSS ---->
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Credit</th>
                                <th class="td-head green-txt">Repayment</th>
                                <th class="td-head green-txt">Transaction ID</th>
                                <th class="td-head green-txt">Date</th>
                                <th class="td-head green-txt">Status</th>
                            </tr>
                            <tbody id="credit-data">
                                
                            </tbody>
                            
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="credit-data-loading"> </div>
                        <div class="load-more-bar" id="load-credit">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                    <!---Wallet history ends here ------>
                    
                </div>
                <!---- Main pane ends here ---->
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
                
                $('#credit-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchCreditHistory",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#credit-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#credit-data').append(data);
                            
                            $('#credit-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-credit').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/credit-request-modal.js"></script>