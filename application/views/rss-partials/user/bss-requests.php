                    
                    <!----Transaction table begins here---->
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active">Request History</li>
                    </ul>
                    <div class="transaction-list-container">
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head green-txt">Property name</th>
                                <th class="td-head green-txt">Plan</th>
                                <th class="td-head green-txt">Cost</th>
                                <th class="td-head green-txt">Status</th>
                            </tr>
                            <tbody id="request-data">
                                
                            </tbody>
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="request-data-loading"></div>
                        <div class="load-more-bar" id="load-requests">
                            <div class="load-more-img"></div>
                        </div>
                    </div>
                    
                    <!----Transaction table ends here ---->

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
            
            $('#request-data-loading').html(output);
            
        }
    
        lazzy_loader(limit);
    
        function load_data(limit, start)
        {
            $.ajax({
                
                url:"<?php echo base_url(); ?>buytolet/fetchBssRequests",
                
                method:"POST",
                
                data:{limit:limit, start:start},
                
                cache: false,
                
                success:function(data){
                    
                    if(data == ''){
                        
                        $('#request-data-loading').html('No more result found');
                        action = 'active';
                        
                    }else{
                        
                        $('#request-data').append(data);
                        
                        $('#request-data-loading').html("");
                        
                        action = 'inactive';
                    }
                }
            })
        }
        
        if(action == 'inactive'){
            
            action = 'active';
            
            load_data(limit, start);
            
        }
        
        $('#load-requests').click(function(){
            
            lazzy_loader(limit);
            
            action = 'active';
            
            start = start + limit;
            
            setTimeout(function(){
                
                load_data(limit, start);
                
            }, 1000);
            
        });
        
    });
</script>