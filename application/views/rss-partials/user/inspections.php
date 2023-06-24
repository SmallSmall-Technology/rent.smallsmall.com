	   
        <ul class="rental-option-tab-container">
            <li class="rental-option-tab active" id="subscription">Inspection history</li>
        </ul>

        <div class="subscription-list-container rss-subscription-pane" id="rss-subscription-pane">
            <table class="dash-booking-list">
                <tr class="tr-content">
                    <th class="td-head green-txt">Property</th>
                    <th class="td-head green-txt">Location</th>
                    <th class="td-head green-txt">Price</th>
                    <th class="td-head green-txt">Inspection date</th>
                    <!---<th class="td-head green-txt">Subscription Period</th>--->
                </tr>
                <tbody id="inspection-data">
                    
                </tbody>
            </table>
            <div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inspection-data-loading"></div>
            <div class="load-more-bar" id="load-inspection">
                <div class="load-more-img"></div>
            </div>
        </div>
        
    </div>
    <!---- Main pane ends here ---->
				
    <script src="<?php echo base_url(); ?>assets/js/user.js"></script>
   
    <script>
        
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
                
                $('#inspection-data-loading').html(output);
                
            }
        
            so_lazzy_loader(limit);
        
            function load_inspection_data(limit, start)
            {
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>rss/fetchInspections",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#inspection-data-loading').html('No more result found');
                            
                            action = 'active';
                            
                        }else{
                            
                            $('#inspection-data').append(data);
                            
                            $('#inspection-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_inspection_data(limit, start);
                
            }
            
            $('#load-inspection').click(function(){
                
                so_lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_inspection_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>