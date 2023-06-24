    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Transactions</p>
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
            <thead class="thead-dark" >
              <tr>
                <th scope="col">Payment method</th>
                <th scope="col">Transaction id</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="transaction-data">
              
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
                    
                    url:"<?php echo base_url(); ?>user/fetchTransactions",
                    
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
