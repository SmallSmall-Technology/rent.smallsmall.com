   
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Inspections</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  dashboard-active px-0" id="currentBookingBtn" href="#"
              role="button">All</a>
          </li>
        </nav>
      </div>



      <!-- History Booking -->
      <div class="col-12 mt-5" id="history">
        <div class="current-booking">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Property</th>
                <th scope="col">Location</th>
                <th scope="col">Subscription fee</th>
                <th scope="col">Inspecrtion date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="inspection-data">
              
            </tbody>
          </table>
        </div>

      </div>


    </div>

  </main>
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
                //$.noConflict();
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>user/fetchInspections",
                    
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