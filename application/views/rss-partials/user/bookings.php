				    <div class="card-container">
				        
                        <?php if(isset($bookings) && !empty($bookings)){ ?>
        					<?php
    
								//$CI =& get_instance();

								//$property = $CI->get_property($bookings[0]['propertyID']);

								//$user = $CI->get_user($bookings[0]['userID']);

								//$transaction = $CI->get_transaction($bookings[0]['bookingID']);
								
						        //$next_rental = strtotime($rss_transaction['rent_expiration']);

							?>
    					    <div class="dash-top-booking">
                                <table class="bookings-tbl" width="100%" cellpadding="5">
                                    <tr>
                                        <td class="bookings-tbl-td" width="50px" valign="top"><div class="top-booking-icon rss-icon"></div></td>
                                        <td class="bookings-tbl-td">
                                            <div class="dash-bt-header blue-txt">Rentsmallsmall Subscription</div>
                                            <div class="dash-bt-subheader">Home Subscription</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bookings-tbl-td">&nbsp;</td>
                                        <td class="bookings-tbl-td">
                                            <span class="dash-bt-details"><?php echo $bookings['propertyTitle'] ?></span>
                                            
                                            <span class="dash-bt-details"><?php echo $bookings['city'].', '.$bookings['state_name']; ?></span>
                                            <span class="dash-bt-details"><?php echo $bookings['payment_plan']; ?></span>
                                            
                                            <span class="dash-bt-details"><?php echo date('d M, Y', strtotime($bookings['move_in_date'])); ?> - <?php echo date('d M, Y', strtotime($bookings['rent_expiration'])); ?></span>
                                            
                                            <span class="dash-bt-details"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format($bookings['price'] + $bookings['serviceCharge']); ?></span>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bookings-tbl-td">&nbsp;</td>
                                        <td class="bookings-tbl-td">
                                            <?php if($bookings['verified'] == 'yes'){ ?>
    									        <?php if($bookings['transaction_status'] != 'approved'){ ?>
    									    
    										        <div class="action-btns renew-button blue-bg"><a style="text-decoration:none;" href="<?php echo base_url().'pay-now/'.$bookings['bookingID'].'/'.$bookings['payment_type']; ?>">Pay now</a></div>
            							    <div class="action-btns deep-blue-bg">Renew Subscription</div>
            							        <?php }else{ ?>
            							    
            							            <!---<div class="deactivated-renew-button" >Renew Rent</div>--->
            							            <div class="action-btns deep-blue-bg">Renew Subscription</div>
            							            
            							        <?php } ?>
            							    <?php } ?>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        
    					<?php } ?>
    					<?php if(isset($stayone_bookings) && !empty($stayone_bookings)){ ?>
        					<?php
    
								/*$CI =& get_instance();

								$stayone_apt = $CI->get_property($stayone_bookings[0]['propertyID']);

								$user = $CI->get_user($stayone_bookings[0]['userID']);

								$transaction = $CI->get_transaction($stayone_bookings[0]['bookingID']);*/
								
						        //$next_rental = strtotime($rss_transaction['rent_expiration']);

							?>
                            <div class="dash-top-booking">
                                <table class="bookings-tbl" width="100%">                            
                                    <tr>
                                        <td class="bookings-tbl-td" width="50px" valign="top"><div class="top-booking-icon stayone-icon"></div></td>
                                        <td class="bookings-tbl-td">
                                            <div class="dash-bt-header red-txt">Stayone Subscription</div>
                                            <div class="dash-bt-subheader">Nightly Subscription</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bookings-tbl-td">&nbsp;</td>
                                        <td class="bookings-tbl-td">
                                            <span class="dash-bt-details"><?php echo $stayone_bookings['apartmentName']; ?></span>
                                            
                                            <span class="dash-bt-details"><?php echo $stayone_bookings['city'].', '.$stayone_bookings['state_name']; ?></span>
                                            
                                            <span class="dash-bt-details">Nightly</span>
                                            
                                            <span class="dash-bt-details"><?php echo date('d M, Y', strtotime($stayone_bookings['checkin'])); ?> - <?php echo date('d M, Y', strtotime($stayone_bookings['checkout'])); ?></span>
                                            
                                            <span class="dash-bt-details"><span style="font-family:helvetica">&#x20A6;</span><?php echo number_format($stayone_bookings['price']); ?></span>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bookings-tbl-td">&nbsp;</td>
                                        <td class="bookings-tbl-td">
                                            <div class="action-btns red-bg">Extend stay</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>  
                        <?php } ?>
                    </div>

                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active" id="subscription">Subscription history</li>
                        <li class="rental-option-tab nightly-subscription-activate" id="stayone">Nightly stay History</li>
                    </ul>

                    <div class="subscription-list-container rss-subscription-pane" id="rss-subscription-pane">
                        <!--- RSS ---->
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Property</th>
                                <th class="td-head green-txt">Location</th>
                                <th class="td-head green-txt">Payment plan</th>
                                <th class="td-head green-txt">Amount</th>
                                <th class="td-head green-txt">Subscription Period</th>
                            </tr>
                            <tbody id="subscription-data">
                                
                            </tbody>
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="subscription-data-loading"></div>
                        <div class="load-more-bar" id="load-rss-subscription">
                            <div class="load-more-img"></div>
                        </div>
                    </div>

                    <div class="subscription-list-container stayone-subscription-pane" id="stayone-subscription-pane">
                        <!--- stayone --->
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Property</th>
                                <th class="td-head green-txt">Location</th>
                                <th class="td-head green-txt">Payment plan</th>
                                <th class="td-head green-txt">Amount</th>
                                <th class="td-head green-txt">Subscription Period</th>
                            </tr>
                            <tbody id="stayone-data">
                                
                            </tbody>
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="stayone-data-loading"> </div>
                        <div class="load-more-bar" id="load-stayone-subscription">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                    
                </div>
                <!---- Main pane ends here ---->
				
    <script src="<?php echo base_url(); ?>assets/js/booking-switch.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/user.js"></script>
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
                
                $('#subscription-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchBookings",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#subscription-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#subscription-data').append(data);
                            
                            $('#subscription-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-rss-subscription').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
    <script>
        //$('.nightly-subscription-activate').click(function(){
        
        $(document).ready(function(){
        
            var limit = 10;
            
            var start = 0;
            
            var action = 'inactive';
        
            function so_lazzy_loader(limit){
                
                var output = '';
              
                for(var count=0; count<limit; count++){
                  
                    output += '<div class="post-data">';
                    output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                    output += '</div>';
                    
                }
                
                $('#stayone-data-loading').html(output);
                
            }
        
            so_lazzy_loader(limit);
        
            function load_stayone_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchStayoneBookings",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#stayone-data-loading').html('No more result found');
                            
                            action = 'active';
                            
                        }else{
                            
                            $('#stayone-data').append(data);
                            
                            $('#stayone-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_stayone_data(limit, start);
                
            }
            
            $('#load-stayone-subscription').click(function(){
                
                so_lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_stayone_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>