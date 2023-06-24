                <div class="bss-button-container">
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn landlord"><a href="#">Property Portfolio</a></div>
                    </div>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn landlord"><a href="<?php echo base_url().''.$user_type.'/finance-details/'.$unit['propertyID']; ?>">Financing</a></div>
                    </div>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn landlord"><a class="active" href="<?php echo base_url().''.$user_type.'/payment-details/'.$unit['propertyID']; ?>">Payments</a></div>
                    </div>
                </div>
                <!----Transaction table ends here ---->
                    
                <div class="unit-details-container">
                    <!----Transaction table begins here---->
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active">Transaction Details</li>
                    </ul>
                    <div class="transaction-list-container">
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Property name</th>
                                <th class="td-head green-txt">Amount</th>
                                <th class="td-head green-txt">Payment Date</th>
                                <th class="td-head green-txt">Status</th>
                            </tr>
                            <tbody id="payment-data">
                                
                            </tbody>
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="payment-data-loading"></div>
                        <div class="load-more-bar" id="load-payments">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                    <input type="hidden" id="property_id" value="<?php echo $propertyID; ?>" />
                    <input type="hidden" id="ref_id" value="<?php echo $unit['refID']; ?>" />
                    <!----Transaction table ends here ---->
                </div>

            </div>
            <!---- Main pane ends here ---->
<script>
    $(document).ready(function(){
    
        var limit = 10;
        
        var start = 0;
        
        var action = 'inactive';
        
        var propertyID = $('#property_id').val();
        
        var refID = $('#ref_id').val();
        
        //alert(refID);
    
        function lazzy_loader(limit){
            
            var output = '';
          
            for(var count=0; count<limit; count++){
              
                output += '<div class="post-data">';
                output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                
            }
            
            $('#payment-data-loading').html(output);
            
        }
    
        lazzy_loader(limit);
    
        function load_data(limit, start)
        {
            $.ajax({
                
                url:"<?php echo base_url(); ?>buytolet/fetchUnitPayment",
                
                method:"POST",
                
                data:{limit:limit, start:start, 'refID' : refID, propertyID : propertyID},
                
                cache: false,
                
                success:function(data){
                    
                    if(data == ''){
                        
                        $('#payment-data-loading').html('No more result found');
                        action = 'active';
                        
                    }else{
                        
                        $('#payment-data').append(data);
                        
                        $('#payment-data-loading').html("");
                        
                        action = 'inactive';
                    }
                }
            })
        }
        
        if(action == 'inactive'){
            
            action = 'active';
            
            load_data(limit, start);
            
        }
        
        $('#load-payments').click(function(){
            
            lazzy_loader(limit);
            
            action = 'active';
            
            start = start + limit;
            
            setTimeout(function(){
                
                load_data(limit, start);
                
            }, 1000);
            
        });
        
    });
</script>