
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Wallet</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  dashboard-active px-0" id="currentBookingBtn" href="#"
              role="button">Wallet Balance</a>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">History</a>
          </li>
        </nav>
      </div>
    <?php if(@!$account_details || $verification_status != 'yes'){ ?>
      <!-- default Wallet balance -->
      <div class="col-12 mt-5 collapse show " id="currentBooking">
        <div class="primary-background p-5 d-flex justify-content-center align-content-center">
          <div class="text-center">
            <img class="mb-4" style="width: 100px;" src="<?php echo base_url(); ?>assets/user-assets/images/wallet.gif" alt="">
            <p class="mb-2" style="font-size: 22px;">You haven’t created a wallet yet</p>
            <p class="mb-4" style="font-size: 13px;">You will need to provide your BVN to create a wallet on our
              platform</p>
            <button type="button" class="btn btn-dark py-3 btn-custom-primary px-5" data-toggle="modal"
              data-target="#createWallet">Create Wallet</button>
          </div>
        </div>
    <?php }else{ ?>
    
      <!----Wallet balance display ---->
      <div class="col-12 mt-5 collapse show" id="currentBookingSigned">
        <div class="current-booking">
          <div class="row">
            <div class="col-12">
              <p>Balance</p>
              <h3 style="font-size: 40px;">&#8358;<?php echo number_format(@$account_details['account_balance']); ?></h3>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-md-3 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Account Name</p>
              <p style="font-size: 26px;"><?php echo @$account_details['account_name']; ?></p>
            </div>
            <div class="col-md-3 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Account number</p>
              <p style="font-size: 26px;"><?php echo @$account_details['account_number']; ?></p>
            </div>
            <div class="col-md-3 col-6 ">
              <p style="font-size: 14px;" class="font-weight-light">Bank name</p>
              <p style="font-size: 26px;">Providus Bank</p>
            </div>
            <div class="col-md-2 col-12 ">
              <p style="font-size: 14px;" class="font-weight-light">Created</p>
              <p style="font-size: 26px;" class="d-flex align-items-center"><?php echo date('d M, y', strtotime($account_details['date_created'])); ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <button class="btn font-weight-light subscription-btn p-3 btn-custom-primary" type="button">Fund
                Wallet</button>
            </div>
            <div class="col-md-3">
              <button class="btn font-weight-light subscription-btn p-3 btn-custom-primary" type="button">Pay
                Subscription</button>
            </div>
            <div class="col-md-6">
              <button class="btn font-weight-light wallet-btn p-3 text-dark" type="button">Subscribe to wallet direct
                debit</button>
            </div>
          </div>
        </div>

      </div>
    
    <?php } ?>

        <!-- Modal -->
        <div class="modal fade" id="createWallet" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">
                <h5 class="modal-title font-weight-light" id="staticBackdropLabel">Create Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-5">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Provide bvn</label>
                    <input type="text" class="form-control p-4" name="bvn" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="BVN">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Custom account name</label>
                    <input type="text" class="form-control p-4" name="account-name" id="exampleInputPassword1"
                      placeholder="Account name">
                  </div>
                  <div class="form-check text-center">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1">
                    <label class="form-check-label " for="exampleCheck1">Agree to our <a href="#"
                        style="color: #138E3D">terms
                        and conditions</a> </label>
                  </div>

                  <div class="my-4 text-center">
                    <button type="submit" class="btn btn-dark py-2 btn-custom-primary px-5" data-toggle="modal"
                      data-target="#createWallet">Create</button>
                  </div>
                </form>
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
                <th scope="col">Transaction id</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="wallet-data">
              
            </tbody>
          </table>
        </div>

      </div>


    </div>

  </main>
  <!-- Jquery js -->
  <!---<script src="<?php //echo base_url(); ?>assets/user-assets/js/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>--->
  <!-- Bootstrap js and Popper js -->
  <script src="<?php echo base_url(); ?>assets/user-assets/js/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/user-assets/js/bootstrap-js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#checklist").removeClass("show");
        $("#history").removeClass("show");
        $("#currentBookingSigned").addClass("show");
        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });
      $("#checklistBtn").click(function () {
        $("#checklist").addClass("show");
        $("#currentBookingSigned").addClass("show");
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
        $("#currentBookingSigned").removeClass("show");

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
                
                $('#wallet-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                //$.noConflict();
                $.ajax({
                    
                    url:"<?php echo base_url(); ?>user/fetchWalletTransactions",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#wallet-data-loading').html('No more result found');
                            
                            action = 'active';
                            
                        }else{
                            
                            $('#wallet-data').append(data);
                            
                            $('#wallet-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-wallet-transactions').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
<!--- Here is the end ----> 