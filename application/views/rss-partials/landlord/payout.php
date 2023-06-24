                    <div class="page-det-container">
                        <div class="page-icn payout-icn"></div>
                        <div class="page-name">Payouts</div>
                    </div>
                    <div class="my-prop-container">
                        <div class="payout-summary-container">
                            <div class="payout-summary-head">Payout Summary</div>
                            <table width="100%">
                                
                                <tr>
                                    <td width="50%">
                                        <div class="payout-schedule-box">Next payout</div>
                                        <div class="payout-price-box"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php if(@$next_payout['amount_paid']){ echo number_format($next_payout['amount_paid']); }else{ echo 0; } ?></div>
                                        <div class="payout-date-box"><?php if(@$last_payout['paid_on']){echo date('d M, Y', strtotime($last_payout['paid_on']));}else{ echo "--:--:----"; } ?></div>
                                    </td>
                                    <td width="50%">
                                        <div class="payout-schedule-box">Recent payout</div>
                                        <div class="payout-price-box"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$last_payout['amount_paid']); ?></div>
                                        <div class="payout-date-box"><?php if(@$last_payout['paid_on']){ echo date('d M, Y', strtotime(@$last_payout['paid_on'])); } ?></div>
                                    </td>
                                </tr>
                            </table>
                            <table style="margin-top:30px" width="100%">
                                <tr>
                                    <td width="50%">
                                        <div class="payout-schedule-box">Total payouts</div>
                                        <div class="payout-price-box"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format($paid_sum['amount_paid']); ?></div>
                                    </td>
                                    <td width="50%">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <div class="filter-container">
                            <table width="100%">
                                <tr>
                                    <td width="35%">
                                        <select class="property" id="customSelect">
                                            <option value="">Select property</option>
                                            <?php if(!empty($properties) && isset($properties)){ ?>
                                                <?php foreach($properties as $property => $prop){ ?>
                                                <option value="<?php echo $prop['propertyID']; ?>"><?php echo $prop['propertyTitle']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td width="25%">                                        
                                        <div class="filter-controls-container">
                                            <input type="text" class="dash-txt-f" id="from-date" placeholder="From" onfocus="(this.type='date')" />
                                            <div class="date-icn"></div>
                                        </div>
                                    </td>
                                    <td width="25%">
                                        <div class="filter-controls-container">
                                            <input type="text" class="dash-txt-f" id="to-date" placeholder="To" onfocus="(this.type='date')" />
                                            <div class="date-icn"></div>
                                        </div>
                                    </td>                                    
                                    <td width="15%">
                                        <div class="payout-filter filter-btns lemon-bg">Filter</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <!----Transaction table begins here---->
                        <ul class="rental-option-tab-container">
                            <li class="rental-option-tab active">Payout History</li>
                        </ul>
                        <div class="transaction-list-container">
                            <table class="dash-booking-list">
                                <tr class="tr-content">
                                    <th class="td-head lemon-txt">Amount</th>
                                    <th class="td-head lemon-txt">Date</th>
                                    <th class="td-head lemon-txt">Status</th>
                                    <th class="td-head lemon-txt">&nbsp;</th>
                                </tr>
                                
                                <tbody id="payout-data">
                                    
                                </tbody>
                                
                            </table>
                            <div style="text-align:center;width:100%;font-size:14px;color:#96CF24" id="payout-data-loading"> </div>
                            <div class="load-more-bar" id="load-payouts">
                                <div class="load-more-img"></div>
                            </div>
                        </div>
                        <!----Transaction table ends here ---->
                    </div>
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
                
                $('#payout-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                var date_from = $('#from-date').val();
            
                var date_to = $('#to-date').val();
                
                //alert(date_from+' - '+date_to+' - '+property);
                
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchPayouts",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start, date_from:date_from, date_to:date_to},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#payout-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#payout-data').append(data);
                            
                            $('#payout-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-payouts').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
            $('.payout-filter').click(function(){
                
                lazzy_loader(limit);
                
                action = 'inactive';
                
                setTimeout(function(){
                    
                    load_search_data(limit, start);
                    
                }, 1000);
            });
            
            function load_search_data(limit, start)
            {
                $('#payout-data').html("");
                
                var date_from = $('#from-date').val();
            
                var date_to = $('#to-date').val();
                
                
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchPayouts",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start, date_from:date_from, date_to:date_to},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#payout-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#payout-data').html(data);
                            
                            $('#payout-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
        });
    </script>