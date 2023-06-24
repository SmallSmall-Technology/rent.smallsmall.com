  

    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">My Bookings</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  dashboard-active px-0" id="currentBookingBtn" href="#"
              role="button">Current Booking</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0 " id="checklistBtn" href="#" role="button">Move-in
              Checklist</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">History</a>
          </li>
        </nav>
      </div>

      <!-- current booking -->
      <div class="col-12 mt-5 collapse show" id="currentBooking">
        <div class="current-booking">
          <div class="row">
            <div class="col-12">
              <h3 style="font-size: 40px;">2 bed, Trinity Apartments</h3>
              <p>Agungi, Lekki, Lagos</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-md-2 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Subscription fee</p>
              <p style="font-size: 26px;">&#8358;<?php echo number_format($rss_transaction['price']); ?></p>
            </div>
            <div class="col-md-2 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Service charge</p>
              <p style="font-size: 26px;">&#8358;<?php echo number_format($rss_transaction['serviceCharge']); ?></p>
            </div>
            <div class="col-md-2 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Payment plan</p>
              <p style="font-size: 26px;"><?php echo $rss_transaction['payment_plan']; ?></p>
            </div>
            <div class="col-md-6 col-12 ">
              <p style="font-size: 14px;" class="font-weight-light">Subscription date</p>
              <p style="font-size: 26px;" class="d-flex align-items-center"><?php echo date('d M, Y', strtotime($rss_transaction['move_in_date'])); ?> <i style="font-size: 13px;"
                  class="mx-2 fa-solid fa-arrow-right"></i>
                <?php echo date('d M, Y', strtotime($rss_transaction['rent_expiration'])); ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <button class="btn font-weight-light subscription-btn p-3 btn-custom-primary" type="button">Renew
                Subscription</button>
            </div>
            <div class="col-md-3">
              <button class="btn font-weight-light subscription-btn p-3 btn-custom-primary" type="button">Cancel
                Subscription</button>
            </div>
            <div class="col-md-6">
              <button class="btn font-weight-light wallet-btn p-3 text-dark" type="button">Subscribe to wallet direct
                debit</button>
            </div>
          </div>
        </div>

      </div>

      <!-- move in Checklist -->
      <div class="col-12 mt-5 collapse" id="checklist">
        <div class="row">
          <div class="col-md-4">
            <div class="secondary-background p-4 mb-3">
              <p>Penthouse 1 br A13 Olivia Court Lekki</p>
            </div>
            <div class="secondary-background p-4 mb-3">
              <p>Premium furnished 2 br Maisonette B2 Olivia Court Lekki</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="primary-background  p-4">
              <div class="row">
                <div class="col-md-12">
                  <p>Premium furnished 2 br Maisonette B2 Olivia Court Lekki</p>
                </div>
                <div class="col-md-12 my-3">
                  <p class="d-inline-block border-bottom border-dark">Video</p>
                </div>
                <div class="col-md-12">
                  <div class="checkin-videos"></div>
                </div>
                <div class="col-md-12 my-3">
                  <p class="d-inline-block border-bottom border-dark">Pictures</p>
                </div>
                <div class="col-md-12">
                  <div class="checkin-pictures d-flex">

                  </div>
                </div>
                <div class="col-md-12 my-3">
                  <p class="d-inline-block border-bottom border-dark">Checklist</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- History Booking -->
      <div class="col-12 mt-5 collapse" id="history">
        <div class="current-booking">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Property</th>
                <th scope="col">Location</th>
                <th scope="col">Plan</th>
                <th scope="col">Subscription</th>
                <th scope="col">Subscription date</th>
              </tr>
            </thead>
            <tbody id="subscription-data">
              
            </tbody>
          </table>
        </div>

      </div>


    </div>

  </main>
  
  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#checklist").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });
      $("#checklistBtn").click(function () {
        $("#checklist").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("primary-text-color dashboard-active")
        $("#checklistBtn").removeClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color dashboard-active")

      });
      $("#historyBtn").click(function () {
        $("#history").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#checklist").removeClass("show");

        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color dashboard-active")
        $("#historyBtn").removeClass("secondary-text-color")
        $("#historyBtn").addClass("primary-text-color dashboard-active")
      });

    });
  </script>
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
                //$.noConflict();
                
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>user/fetchBookings",
                    
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
