                    <div class="prop-rating-top"> 
                        
                        <table>                            
                            <tr>
                                <td width="50px" valign="top"><div class="top-booking-icon repairs-icon"></div></td>
                                <td>
                                    <div class="dash-bt-header white-txt">Repair requests</div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="50px" valign="top"></td>
                                <td>
                                    <div class="dash-bt-subheader white-txt">Hello, this is where repair details are logged by subscribers</div>                                     
                                </td>
                            </tr>
                        </table>                 
                    </div> 
                    
                    
                    <!----Transaction table ends here ---->
                    
                    <ul class="rental-option-tab-container">
                        <li class="rental-option-tab active" id="repair-tab">Repair history</li>
                    </ul>

                    <div class="subscription-list-container" >
                        <!--- RSS ---->
                        <table class="dash-booking-list">
                            <tr class="tr-content">
                                <th class="td-head lemon-txt">Repair category</th>
                                <th class="td-head lemon-txt">Logged on</th>
                                <th class="td-head lemon-txt">Fixed on</th>
                                <th class="td-head lemon-txt">Status</th>
                            </tr>
                            <tbody id="repair-data">
                                
                            </tbody>
                        </table>
                        <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="repair-data-loading"></div>
                        <div class="load-more-bar" id="load-repairs">
                            <div class="load-more-img"></div>
                        </div>
                    </div>

                </div>
                <!---- Main pane ends here ---->
<script src="<?php echo base_url(); ?>assets/js/repair.js"></script>
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
            
            $('#repair-data-loading').html(output);
            
        }
    
        lazzy_loader(limit);
    
        function load_data(limit, start)
        {
            $.ajax({
                
                url:"<?php echo base_url(); ?>rss/fetchRepairs",
                
                method:"POST",
                
                data:{limit:limit, start:start},
                
                cache: false,
                
                success:function(data){
                    
                    if(data == ''){
                        
                        $('#repair-data-loading').html('No more result found');
                        action = 'active';
                        
                    }else{
                        
                        $('#repair-data').append(data);
                        
                        $('#repair-data-loading').html("");
                        
                        action = 'inactive';
                    }
                }
            })
        }
        
        if(action == 'inactive'){
            
            action = 'active';
            
            load_data(limit, start);
            
        }
        
        $('#load-repairs').click(function(){
            
            lazzy_loader(limit);
            
            action = 'active';
            
            start = start + limit;
            
            setTimeout(function(){
                
                load_data(limit, start);
                
            }, 1000);
            
        });
        
    });
</script>