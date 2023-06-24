				<div class="top-transaction-container"> 
                        <table>                            
                            <tr>
                                <td width="50px" valign="top"><div class="top-booking-icon top-transaction-icon"></div></td>
                                <td>
                                    <div class="dash-bt-header">Recent Transaction</div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="50px" valign="top"></td>
                                <td>
                                    <div class="feat-tnx"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format(@$transactions['amount']); ?></div>                                    
                                </td>
                            </tr>
                        </table>                 
                    </div> 
                    
                    <!----Transaction table begins here---->
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active">Transaction History</li>
                    </ul>
                    <div class="transaction-list-container">
                        <table width="100%" class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Payment Method</th>
                                <th class="td-head green-txt">Transaction ID</th>
                                <th class="td-head green-txt">Date</th>
                                <th class="td-head green-txt">Amount</th>
                                <th class="td-head green-txt">Status</th>
                                <th class="td-head green-txt">&nbsp;</th>
                            </tr>
                            <tbody id="transaction-data">
                                
                            </tbody>
                        </table>
                        <!---<table width="100%" id="transaction-data">--->
                            
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="transaction-data-loading"> </div>
                        <div class="load-more-bar" id="load-transactions">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                    <!----Transaction table ends here ---->

                </div>
                <!---- Main pane ends here ---->
				
				
<script src="<?php echo base_url(); ?>assets/js/transaction-opener.js" type="text/javascript"></script>
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
                
                $('#transaction-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchTransactions",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#transaction-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#transaction-data').append(data);
                            
                            $('#transaction-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-transactions').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>