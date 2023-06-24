    
        <div class="row">
          <div class="col-12 my-5">
            <p style="font-size: 22px;">Dashboard</p>
          </div>
          <div class="col-md-4 col-12  mb-4">
            <div class="card card-custom">
              <div class="card-body">
                <p class="card-text">Active Subscription</p>
                <h3 class="card-title">1</h3>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12  mb-4">
            <div class="card card-custom">
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <p class="card-text">Upcoming Payment</p>
                  <h3 class="card-title">&#8358;<?php echo number_format(@$rss_transaction['amount']); ?></h3>
                </div>
    
                <div class="text-right">
                  <a href="#" class="btn btn-light">pay now</a>
                </div>
    
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12  mb-4">
            <div class="card card-custom">
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <p class="card-text">Wallet Balance</p>
                  <h3 class="card-title">&#8358;<?php echo (@$balance['account_balance'])? number_format(@$balance['account_balance']) : 0; ?></h3>
                </div>
    
                <div class="text-right">
                  <a href="#" class="btn btn-light">pay now</a>
                </div>
    
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 mb-4">
            <div class="card card-custom">
              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <p class="card-text">Subscription Debt</p>
                  <h3 class="card-title">&#8358;<?php echo (@$debt['amount_owed'])? number_format($debt['amount_owed']) : 0.00 ; ?></h3>
                </div>
                <div>
                  <p class="card-text">Slate fee</p>
                  <h3 class="card-title">&#8358;0.00</h3>
                </div>
              </div>
            </div>
          </div>
    
        </div>
    
      </main>