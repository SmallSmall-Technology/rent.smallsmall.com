

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/paymentSummary.css" />
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- MAIN SECTION -->
  <main style="margin-bottom: 20em">

    <div class="container-fluid d-md-block d-none">
      <div>
        <a href="<?php echo base_url() . 'property/'. $bookings['propertyID']; ?>" class="text-decoration-none font-weight-bold primary-text-color-alt">&lt; &nbsp;&nbsp;Back</a>
      </div>
    </div>
    
    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
          <h4>Payment Summary</h4>
          <p>This is a breakdown of your payment</p>
          <!--<?php echo $bookingReferenceID ?>-->
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 mb-5">
          <div class="payment-description p-md-4 p-3 ">
            <div class="d-flex justify-content-between">
              <div style="max-width: 60%">
                <div class="mb-3">
                  <p class="m-0">Property info</p>
                  <p class="m-0 special-bold-1"><?php echo @$bookings['propertyTitle'];?></p>
                </div>
                <div class="mb-3">
                  <p class="m-0">Payment plan</p>
                  <p class="m-0 special-bold-2 "><?php echo @$bookings['payment_plan']; ?></p>
                </div>
                <div class="mb-3">
                  <p class="m-0">Date</p>
                  <p class="m-0 special-bold-2 "><?php echo date('M d, Y', strtotime(@$bookings['move_in_date'])); ?></p>
                </div>
              </div>
              <div>
                <div class="mb-3">
                  <p class="m-0">Subscription fee</p>
                  <p class="m-0 special-bold-1">&#8358;<?php echo number_format(@$bookings['subscription_fees']); ?></p>
                </div>
                <div class="mb-3">
                  <p class="m-0">Payment duration</p>
                  <p class="m-0 special-bold-2 "><?php echo @$bookings['duration'] . " months" ; ?></p>
                </div>
              </div>
            </div>
            <div class="divider my-4"></div>
            <div class="">
              <div style="max-width: 100%">
                <div class="mb-3">
                  <p class="m-0 special-bold-1">Recurring payment(<?php echo @$bookings['payment_plan']; ?>)</p>
                  <p class="m-0">This is a breakdown of your recurring payment during your stay with RentSmallsmall.</p>
                </div>

              </div>
              <div class="d-flex justify-content-between">
                <div class="mb-3">
                  <p class="m-0">Subscription fee</p>
                  <p class="m-0 special-bold-1">&#8358;<?php echo number_format(@$bookings['subscription_fees']); ?></p>
                </div>
                <div class="mb-3">
                  <p class="m-0">Service charge deposit</p>
                  <p class="m-0 special-bold-2 ">&#8358;<?php echo number_format(@$bookings['service_charge_deposit']); ?></p>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="col-12 col-md-6">
          <div class="payment-amounts px-md-5  py-md-4 p-3 mb-3">
            <div class="d-flex justify-content-between">
              <p class="">Subscription fee</p>
              <p class="primary-text-color-alt" style="font-size: 18px"><span class="d-md-none d-block"
                  style="font-size: 10px; color: black;">monthly</span>&#8358;<?php echo number_format(@$bookings['subscription_fees']); ?><sup
                  style="font-size: 10px; color: black;" class="font-weight-light d-md-inline d-none"><?php echo @$bookings['payment_plan']; ?></sup>
              </p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="">Security deposit fund</p>
              <p class="primary-text-color-alt" style="font-size: 18px"><span class="d-md-none d-block"
                  style="font-size: 10px; color: black;"><?php echo @$bookings['payment_plan']; ?></span>&#8358;<?php echo number_format(@$bookings['security_deposit_fund']); ?><sup
                  style="font-size: 10px; color: black;" class="font-weight-light d-md-inline d-none"></sup>
              </p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="">Service charge deposit</p>
              <p class="primary-text-color-alt" style="font-size: 18px">&#8358;<?php echo number_format(@$bookings['service_charge_deposit']); ?></p>
            </div>

            <div class="divider my-4"></div>
            <div class="d-flex justify-content-between align-items-center mt-5">
              <div>
                <p class="" style="font-size: 20px">Total</p>
              </div>
              <div>
                <p class="primary-text-color-alt" style="font-size: 30px; font-weight: 600;">&#8358;<?php echo number_format(@$bookings['total']); ?></p>
              </div>
            </div>

          </div>
          <div>
            <button class="btn w-100 primary-background py-3 font-weight-bold" type="button" data-toggle="modal"
              data-target="<?php echo (@!$account_details || $verification_status != 'yes') ? '#emptyWallet' : '#nonEmptyWallet'; ?>">Pay with Wallet</button>


            <!-- MODAL FOR EMPTY WALLET-->
            <div class="modal fade" id="emptyWallet" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">

                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                      <p class="primary-text-color" style="font-size: 28px; font-weight:700">My Wallet</p>
                      <p>You do not have a wallet!!</p>
                      <p>Create a wallet to pay for your subscription and other services during your stay with us.</p>
                      <div>
                        <img class="img-fluid" style="width: 100px" src="<?php echo base_url(); ?>assets/updated-assets/images/wallet.gif" alt="">
                      </div>
                      <a href="<?php echo base_url('dashboard/wallet')?>" class="btn primary-background px-5 mt-3" type="button">Create
                        wallet</a>
                    </div>

                  </div>

                </div>
              </div>
            </div>


            <!-- MODAL FOR NON-EMPTY WALLET-->
            <div class="modal fade " id="nonEmptyWallet" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">

              <!-- MODAL FOR NON-EMPTY WALLET WEB-->
              <div class="modal-dialog modal-dialog-centered d-md-flex d-none" style="max-width: 703px">
                <div class="modal-content flex-row border-0" style="background: none">

                  <div class="modal-body wallet-balance-web pl-5 pr-4 d-flex flex-column justify-content-between">
                    <div>
                      <p style="font-size: 25px; font-weight: 700;">My wallet</p>
                      <p class="m-0">My wallet balance:</p>
                      <p style="font-size: 20px; font-weight: 600;">&#8358;<?php echo number_format(@$balance['account_balance']);?></p>
                    </div>

                    <a href="<?php echo base_url('dashboard/wallet'); ?>"><button class="btn px-4 py-2 w-75" style="background-color: #CBEEFC; color: #007DC1;"
                      type="button">Top
                      up wallet</button>
                    </a>
                  </div>
                  
                 <!--// Pay Now from wallet Directly-->
                 
                  
                  
                  <div class="modal-body wallet-payment-web pr-3 pl-5">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <p style="font-size: 25px; font-weight: 700;">Payment</p>
                    <p class="m-0">Amount to pay:</p>
                    <p style="font-size: 36px; font-weight: 600;">&#8358;<?php echo number_format(@$bookings['total']); ?></p>
                    <button class="btn primary-background px-4 py-2 wallet-transaction" type="button" id="wallet-transaction-<?php echo @$bookings['total'].'-'.@$bookings['bookingID']; ?>">Pay now with wallet</button>

                  </div>
                  
                  
                 
                </div>
              </div>

              <!-- MODAL FOR NON-EMPTY WALLET MOBILE-->
              <div class="modal-dialog modal-dialog-centered d-md-none d-flex">
                <div class="modal-content">

                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="">
                      <p class="primary-text-color text-center" style="font-size: 28px; font-weight:700">My Wallet</p>
                      <div class="wallet-balance px-4 py-2 mb-3">
                        <p class="m-0">Wallet balance:</p>
                        <p class="m-0" style="font-size: 20px;">&#8358;<?php echo number_format(@$balance['account_balance']);?></p>
                      </div>
                      <div class="wallet-payment px-4 py-2 mb-3">
                        <p class="m-0">Amount to pay::</p>
                        <p class="m-0 primary-text-color-alt font-weight-bold" style="font-size: 36px;">&#8358;<?php echo number_format($bookings['total']); ?>
                        </p>
                      </div>
                      
                      
                         <div class="d-flex justify-content-between ">
                        <button class="btn primary-background px-4 py-3 wallet-transaction" type="button" id="wallet-transaction-<?php echo @$bookings['total'].'-'.@$bookings['bookingID']; ?>">Pay now</button>
                        <a href="<?php echo base_url('dashboard/wallet')?>"><button class="btn primary-background px-4 py-3" type="button">Top up wallet</button>
                        </a>
                      </div>


                    </div>


                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </main>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/js/wallet-payment.js" type="application/javascript"></script>

   <!--Bootstrap js and Popper js -->
   <script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous">
   </script>
   
   <script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
