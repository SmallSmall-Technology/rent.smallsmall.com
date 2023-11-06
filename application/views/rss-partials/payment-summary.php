<?php 

  $edits = array("amount" => @$bookings['total']);
        
  $this->db->where("transaction_id", $dets['bookingID']);

  $this->db->update("transaction_tbl", $edits);
?>

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
            <!-- <button class="btn w-100 primary-background py-3 font-weight-bold" type="button" data-toggle="modal"
              data-target="<?php echo (@!$account_details || $verification_status != 'yes') ? '#emptyWallet' : '#nonEmptyWallet'; ?>">Pay with Wallet</button> -->

              <!-- <div class="d-flex justify-content-center my-2">
              <p class=" m-0">or</p> -->
            </div>

                      <form id="paymentForm">
        
                        <input type="hidden" class="email" id="email" value="<?php echo $dets['email']; ?>" required />			  

                        <input type="hidden" class="amount" id="amount" value="<?php echo @$bookings['total']; ?>" required />

                        <input class="fname" type="hidden" id="fname" value="<?php echo $dets['firstName']; ?>" />

                        <input class="lname" type="hidden" id="lname" value="<?php echo $dets['lastName']; ?>" />
                        
                        <input class="refID" type="hidden" id="refID" value="<?php echo $dets['refID']; ?>" />

                        <input class="userID" type="hidden" id="userID" value="<?php echo $dets['usersID']; ?>" />
                        
                        <input type="hidden" class="booking_id" id="booking_id" value="<?php echo $dets['bookingID']; ?>" required />
                        
                        <input type="hidden" class="rent_exp" id="rent_exp" value="<?php echo $dets['rent_expiration']; ?>" required />
                        
                        <input type="hidden" class="duration" id="duration" value="<?php echo $dets['duration']; ?>" required />
                        
                        <input type="hidden" class="payment_plan" id="payment_plan" value="<?php echo $dets['payment_plan']; ?>" required />
                        
                        <input type="hidden" class="propID" id="propID" value="<?php echo $dets['propertyID']; ?>" required />
                        
                        <!-- <button type="submit" class="green-bg pay-now-btn" onclick="payWithPaystack()"> Pay now </button> -->

                        <button type="submit" onclick="pay()"> Test </button>
                        

                        <!-- <button
                        type="submit"  onclick="payWithPaystack()" style="border: 1px solid black; padding: 1em; width: 100%; border-radius: 5px; background: none;">Pay with
                          <svg xmlns="http://www.w3.org/2000/svg" width="136" height="20" viewBox="0 0 136 25" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M19.4411 2.28491H1.24935C0.638454 2.28491 0.118164 2.8052 0.118164 3.43906V5.49808C0.118164 6.13153 0.638454 6.65223 1.24935 6.65223H19.4411C20.0745 6.65223 20.5722 6.13194 20.5952 5.49808V3.46161C20.5952 2.8052 20.0749 2.28491 19.4411 2.28491ZM19.4411 13.7116H1.24935C0.954974 13.7116 0.661004 13.8248 0.457644 14.0511C0.231324 14.2774 0.118164 14.5488 0.118164 14.8658V16.9248C0.118164 17.5582 0.638454 18.0789 1.24935 18.0789H19.4411C20.0745 18.0789 20.5722 17.5812 20.5952 16.9248V14.8658C20.5727 14.2098 20.0749 13.7116 19.4411 13.7116ZM11.4994 19.4135H1.24935C0.954974 19.4135 0.661004 19.5266 0.457644 19.753C0.253874 19.9793 0.118164 20.2507 0.118164 20.5676V22.6266C0.118164 23.2601 0.638454 23.7808 1.24935 23.7808H11.4768C12.1103 23.7808 12.608 23.2605 12.608 22.6496V20.5906C12.6305 19.9116 12.1328 19.4143 11.4994 19.4143V19.4135ZM20.5952 7.98678H1.24935C0.954974 7.98678 0.661004 8.09994 0.457644 8.32626C0.253874 8.55258 0.118164 8.824 0.118164 9.14093V11.2C0.118164 11.8334 0.638454 12.3541 1.24935 12.3541H20.5727C21.2061 12.3541 21.7038 11.8338 21.7038 11.2V9.14093C21.7264 8.53003 21.2061 8.00974 20.5952 7.98678Z"
                              fill="#2DBDEF" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M41.751 6.90112C41.1852 6.31277 40.5292 5.86013 39.7826 5.54361C39.036 5.22668 38.2439 5.06842 37.4296 5.06842C36.6379 5.04587 35.8683 5.22668 35.1443 5.56616C34.6691 5.79248 34.2394 6.109 33.877 6.49399V6.13196C33.877 5.95115 33.8093 5.76993 33.6962 5.63422C33.583 5.49851 33.4022 5.4079 33.1984 5.4079H30.6868C30.5059 5.4079 30.3247 5.47596 30.2116 5.63422C30.0759 5.76993 30.0078 5.95074 30.0308 6.13196V23.0568C30.0308 23.2376 30.0984 23.4188 30.2116 23.5545C30.3473 23.6902 30.5059 23.7583 30.6868 23.7583H33.2665C33.4473 23.7583 33.606 23.6906 33.7417 23.5549C33.8774 23.4418 33.968 23.2605 33.9454 23.0568V17.2643C34.3075 17.6714 34.7827 17.9658 35.3029 18.1466C35.9819 18.3955 36.6834 18.5312 37.4075 18.5312C38.2221 18.5312 39.0364 18.3725 39.7834 18.056C40.53 17.7395 41.2086 17.2868 41.7744 16.6985C42.3627 16.0876 42.8154 15.3635 43.1319 14.5714C43.4939 13.6891 43.6522 12.7387 43.63 11.7883C43.6526 10.8379 43.4714 9.88756 43.1319 8.98269C42.7924 8.23608 42.3402 7.51202 41.7514 6.90112H41.751ZM39.4431 13.0331C39.3074 13.3951 39.1036 13.712 38.8322 14.006C38.3119 14.5718 37.5649 14.8883 36.7958 14.8883C36.4112 14.8883 36.0266 14.8203 35.6646 14.6395C35.3251 14.4812 35.0086 14.2774 34.7367 14.006C34.4653 13.7346 34.2615 13.3951 34.1258 13.0331C33.8315 12.2639 33.8315 11.4263 34.1258 10.6571C34.2615 10.2951 34.4879 9.97817 34.7367 9.70675C35.0082 9.43533 35.3251 9.20901 35.6646 9.05075C36.0266 8.89249 36.4112 8.80188 36.7958 8.80188C37.2029 8.80188 37.5649 8.86953 37.9499 9.05075C38.2894 9.20901 38.6059 9.41278 38.8548 9.6842C39.1262 9.95562 39.3074 10.2726 39.4657 10.6346C39.7371 11.4263 39.7145 12.2639 39.4431 13.0331ZM57.454 5.43045H54.8973C54.7164 5.43045 54.5352 5.49851 54.4221 5.63422C54.2864 5.76993 54.2187 5.95074 54.2187 6.15451V6.47103C53.9018 6.08645 53.4946 5.79207 53.0646 5.58871C52.363 5.24923 51.5939 5.09056 50.8243 5.09056C49.1724 5.09056 47.6111 5.74697 46.4349 6.90071C45.824 7.51161 45.3488 8.23567 45.0318 9.02738C44.6698 9.9097 44.489 10.8601 44.5115 11.833C44.489 12.7834 44.6698 13.7338 45.0318 14.6386C45.3713 15.4304 45.8235 16.1548 46.4349 16.7653C47.589 17.942 49.1728 18.598 50.8018 18.598C51.5709 18.6206 52.3405 18.4393 53.0416 18.0999C53.4713 17.8735 53.9014 17.5796 54.2183 17.2175V17.557C54.2183 17.7378 54.2859 17.919 54.4217 18.0548C54.5574 18.1679 54.716 18.2581 54.8968 18.2581H57.4536C57.6344 18.2581 57.8156 18.1905 57.9288 18.0548C58.0645 17.919 58.1322 17.7378 58.1322 17.557V6.17583C58.1322 5.99502 58.0645 5.8138 57.9513 5.67809C57.8156 5.51983 57.6344 5.42922 57.4536 5.42922L57.454 5.43045ZM53.992 13.0331C53.8563 13.3951 53.6525 13.712 53.3811 14.006C53.1097 14.2774 52.8153 14.5037 52.4762 14.662C51.7521 15.0015 50.9149 15.0015 50.1909 14.662C49.8514 14.5037 49.5349 14.2774 49.263 14.006C48.9916 13.7346 48.7878 13.3951 48.6521 13.0331C48.3807 12.2639 48.3807 11.4263 48.6521 10.6571C48.7878 10.2951 48.9916 10.0011 49.263 9.70675C49.5345 9.43533 49.8288 9.20901 50.1909 9.05075C50.9149 8.71127 51.7521 8.71127 52.4537 9.05075C52.7931 9.20901 53.1101 9.41278 53.3585 9.6842C53.6074 9.95562 53.8112 10.2726 53.9694 10.6346C54.2859 11.4263 54.2859 12.2639 53.992 13.0331ZM82.9318 11.4944C82.5698 11.1774 82.1401 10.906 81.6875 10.7252C81.2123 10.5214 80.692 10.3857 80.1943 10.2725L78.2484 9.88797C77.7507 9.79736 77.3886 9.66165 77.2074 9.50339C77.0492 9.39023 76.936 9.20942 76.936 9.00565C76.936 8.80229 77.0492 8.62107 77.298 8.46281C77.6375 8.282 77.9995 8.19139 78.3841 8.21394C78.8819 8.21394 79.3796 8.3271 79.8322 8.50832C80.2849 8.71168 80.7146 8.91545 81.1221 9.18728C81.6879 9.54931 82.1856 9.48125 82.5251 9.07412L83.4529 8.01058C83.6337 7.82977 83.7244 7.60345 83.7469 7.35458C83.7244 7.08316 83.5886 6.85684 83.3849 6.67562C83.0003 6.33614 82.3669 5.97411 81.5296 5.61208C80.6924 5.25005 79.6289 5.06924 78.3845 5.06924C77.6154 5.04669 76.8683 5.15944 76.1447 5.38576C75.5338 5.58953 74.9454 5.8835 74.4251 6.26808C73.95 6.63011 73.5879 7.08275 73.3165 7.62559C73.0676 8.14588 72.9319 8.71168 72.9319 9.27748C72.9319 10.341 73.2489 11.2008 73.8823 11.8342C74.5158 12.4677 75.353 12.8978 76.394 13.1015L78.4304 13.5542C78.8601 13.6218 79.3128 13.7576 79.7203 13.9613C79.9466 14.0519 80.0823 14.2778 80.0823 14.5271C80.0823 14.7534 79.9692 14.9568 79.7203 15.138C79.4714 15.3192 79.0639 15.4324 78.5211 15.4324C77.9782 15.4324 77.4124 15.3192 76.9147 15.0704C76.4395 14.8441 76.0098 14.5501 75.6023 14.2106C75.4214 14.0749 75.2402 13.9617 75.0139 13.8711C74.7876 13.8035 74.4936 13.8711 74.1992 14.12L73.0906 14.9572C72.7741 15.1835 72.6154 15.5681 72.706 15.9301C72.7737 16.3147 73.068 16.6768 73.6338 17.1068C75.0369 18.0572 76.7113 18.555 78.4079 18.5095C79.1996 18.5095 79.9917 18.4193 80.7383 18.1929C81.3947 17.9892 82.0056 17.6952 82.5485 17.2881C83.0462 16.926 83.4534 16.4508 83.7252 15.885C83.9966 15.3422 84.1323 14.7538 84.1323 14.1425C84.1549 13.5997 84.0417 13.0564 83.8158 12.5587C83.5895 12.1967 83.2951 11.8117 82.9331 11.4952L82.9318 11.4944ZM94.1097 14.5944C93.9965 14.3906 93.7927 14.2549 93.5439 14.2098C93.3175 14.2098 93.0687 14.2778 92.8879 14.4136C92.5713 14.6173 92.2089 14.7301 91.8469 14.753C91.7337 14.753 91.598 14.7305 91.4848 14.7075C91.3491 14.685 91.236 14.6173 91.1454 14.5267C91.0322 14.4136 90.9416 14.2778 90.8739 14.1421C90.7833 13.9158 90.7382 13.6895 90.7608 13.4632V8.82484H94.0641C94.2679 8.82484 94.4487 8.73423 94.5844 8.59852C94.7201 8.46281 94.8108 8.30414 94.8108 8.10037V6.13196C94.8108 5.92819 94.7431 5.74738 94.5844 5.63422C94.4487 5.49851 94.2679 5.43045 94.0867 5.43045H90.7604V2.26279C90.7604 2.08198 90.6927 1.87821 90.557 1.76505C90.4213 1.65189 90.2626 1.58383 90.0818 1.56128H87.5025C87.3217 1.56128 87.1405 1.62934 87.0048 1.76505C86.8691 1.90076 86.7785 2.08198 86.7785 2.26279V5.43045H85.3078C85.127 5.43045 84.9458 5.49851 84.81 5.65677C84.6969 5.79248 84.6292 5.97329 84.6292 6.15451V8.12292C84.6292 8.30414 84.6969 8.48495 84.81 8.62107C84.9232 8.77933 85.104 8.84739 85.3078 8.84739H86.7785V14.3685C86.7559 15.0244 86.8916 15.6809 87.163 16.2692C87.4119 16.767 87.7288 17.197 88.1585 17.5591C88.5656 17.8986 89.0408 18.1474 89.5611 18.2831C90.0818 18.4414 90.6247 18.532 91.1679 18.532C91.8694 18.532 92.5935 18.4188 93.2724 18.1925C93.9059 17.9888 94.4717 17.6267 94.9243 17.1515C95.2183 16.8572 95.2408 16.3824 95.0149 16.0429L94.1101 14.5948L94.1097 14.5944ZM108.093 5.43045H105.536C105.356 5.43045 105.197 5.49851 105.061 5.63422C104.925 5.76993 104.857 5.95074 104.857 6.15451V6.47103C104.541 6.08645 104.156 5.79207 103.704 5.58871C103.002 5.24923 102.233 5.09056 101.463 5.09056C99.8115 5.09056 98.2502 5.74697 97.074 6.90071C96.4631 7.51161 95.9879 8.23567 95.6709 9.02738C95.3089 9.9097 95.1281 10.8601 95.1507 11.8105C95.1281 12.7608 95.3089 13.7112 95.6709 14.6161C95.9875 15.4078 96.4856 16.1323 97.074 16.7432C98.2281 17.9199 99.789 18.5759 101.441 18.5759C102.21 18.5984 102.98 18.4172 103.681 18.1007C104.133 17.8744 104.54 17.5804 104.857 17.2184V17.5578C104.857 17.7387 104.925 17.9199 105.061 18.033C105.197 18.1687 105.356 18.2364 105.536 18.2364H108.093C108.478 18.2364 108.772 17.9424 108.772 17.5574V6.17624C108.772 5.99502 108.704 5.81421 108.591 5.67809C108.478 5.51983 108.297 5.42922 108.093 5.42922V5.43045ZM104.654 13.0556C104.518 13.4177 104.315 13.7346 104.043 14.0286C103.772 14.3 103.477 14.5263 103.138 14.6846C102.776 14.8428 102.392 14.9334 101.984 14.9334C101.577 14.9334 101.215 14.8428 100.853 14.6846C100.513 14.5263 100.197 14.3 99.9251 14.0286C99.6537 13.7567 99.4499 13.4177 99.3368 13.0556C99.0653 12.2865 99.0653 11.4488 99.3368 10.6797C99.4725 10.3177 99.6762 10.0007 99.9251 9.7293C100.197 9.45788 100.513 9.23156 100.853 9.0733C101.215 8.91463 101.6 8.82443 101.984 8.82443C102.369 8.82443 102.753 8.89208 103.138 9.0733C103.478 9.23156 103.772 9.43533 104.043 9.70675C104.315 9.97817 104.518 10.2951 104.654 10.6571C104.948 11.4037 104.948 12.2865 104.654 13.0556ZM122.122 14.4361L120.651 13.3049C120.38 13.0786 120.109 13.0105 119.882 13.1011C119.679 13.1917 119.498 13.3275 119.339 13.4857C119.023 13.8703 118.638 14.2098 118.231 14.5038C117.778 14.7526 117.303 14.8883 116.805 14.8432C116.217 14.8432 115.674 14.685 115.198 14.3455C114.723 14.006 114.361 13.5538 114.18 12.988C114.045 12.6034 113.977 12.2188 113.977 11.8342C113.977 11.4267 114.045 11.0425 114.18 10.635C114.316 10.273 114.497 9.95603 114.769 9.68461C115.04 9.41319 115.335 9.18687 115.674 9.05116C116.036 8.8929 116.42 8.80229 116.827 8.80229C117.325 8.77974 117.823 8.91545 118.253 9.16432C118.683 9.43574 119.045 9.77522 119.362 10.1824C119.497 10.3406 119.678 10.4767 119.882 10.5669C120.108 10.6575 120.38 10.5895 120.651 10.3632L122.122 9.25452C122.302 9.14136 122.439 8.96014 122.506 8.75678C122.597 8.53046 122.574 8.28159 122.439 8.07782C121.873 7.1955 121.104 6.47103 120.176 5.95074C119.203 5.4079 118.049 5.11352 116.759 5.11352C115.854 5.11352 114.949 5.29433 114.089 5.63381C113.275 5.97329 112.551 6.44848 111.94 7.05897C111.329 7.66987 110.831 8.39393 110.492 9.2086C109.79 10.9056 109.79 12.8064 110.492 14.5033C110.831 15.2951 111.306 16.0421 111.94 16.6304C113.23 17.8973 114.949 18.5763 116.759 18.5763C118.049 18.5763 119.203 18.2819 120.176 17.7391C121.104 17.2188 121.895 16.4947 122.461 15.5894C122.574 15.3857 122.597 15.1368 122.529 14.933C122.439 14.7522 122.302 14.571 122.122 14.4353L122.122 14.4361ZM135.744 17.0835L131.693 11.1553L135.155 6.5846C135.313 6.38083 135.381 6.08686 135.291 5.83799C135.223 5.65718 135.065 5.47596 134.635 5.47596H131.897C131.738 5.47596 131.58 5.52106 131.444 5.58912C131.263 5.67932 131.128 5.81544 131.037 5.9737L128.277 9.84287H127.621V0.701509C127.621 0.520289 127.553 0.339478 127.417 0.203358C127.281 0.0676484 127.122 0 126.942 0H124.385C124.204 0 124.023 0.0680588 123.887 0.203769C123.751 0.339479 123.683 0.497739 123.683 0.701509V17.5587C123.683 17.762 123.751 17.9207 123.887 18.0564C124.022 18.1921 124.204 18.2598 124.385 18.2598H126.942C127.122 18.2598 127.304 18.1921 127.417 18.0564C127.553 17.9207 127.621 17.7395 127.621 17.5587V13.1011H128.345L131.354 17.7169C131.535 18.0564 131.874 18.2598 132.236 18.2598H135.11C135.54 18.2598 135.721 18.0564 135.812 17.8752C135.925 17.5812 135.902 17.2868 135.744 17.0835ZM71.9807 5.45341H69.107C68.8807 5.45341 68.6769 5.52106 68.5187 5.67973C68.383 5.81544 68.2924 5.97411 68.2473 6.15492L66.1206 14.0294H65.5999L63.3371 6.15492C63.292 5.99666 63.2239 5.8384 63.1108 5.67973C62.9751 5.52147 62.7939 5.43086 62.5905 5.43086H59.6717C59.2871 5.43086 59.0608 5.54402 58.9476 5.81544C58.88 6.04176 58.88 6.29063 58.9476 6.51695L62.5679 17.6042C62.6356 17.7628 62.7037 17.9436 62.8394 18.0568C62.9751 18.1925 63.1788 18.2606 63.3822 18.2606H64.9209L64.7852 18.6226L64.4457 19.6406C64.3326 19.9576 64.1514 20.229 63.8799 20.4323C63.6311 20.6132 63.3371 20.7267 63.0202 20.7038C62.7488 20.7038 62.4999 20.6361 62.251 20.5455C62.0021 20.4323 61.7758 20.2966 61.5721 20.1384C61.3912 20.0027 61.1649 19.9346 60.9161 19.9346H60.8935C60.6221 19.9572 60.3732 20.0929 60.2371 20.3417L59.3322 21.6767C58.9702 22.2651 59.1736 22.6271 59.3999 22.8304C59.8976 23.2831 60.4634 23.6221 61.0969 23.8259C61.7984 24.0748 62.5224 24.188 63.2465 24.188C64.5589 24.188 65.645 23.8259 66.4822 23.1244C67.342 22.3553 67.9984 21.3594 68.3149 20.2282L72.5236 6.51613C72.6142 6.26726 72.6367 6.01839 72.5461 5.79207C72.5236 5.6334 72.3653 5.43004 71.9803 5.45259L71.9807 5.45341Z"
                              fill="#131E32" />
                          </svg></button> -->

                        </form>            

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


    <!-- Modal Schedule success -->
    <button type="button" id = "modalSuccess" class="btn btn-danger d-none" data-toggle="modal" data-target="#success" >Test success</button>
    <div class="modal fade schedule-visit-modal" id="success" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="close-modal-custom">
                <i class="fa-solid fa-circle-xmark fa-2x close-modal" data-dismiss="modal"></i>
            </div>

            <div class="modal-body p-5 text-center">
                <div>
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/success.svg" alt="successful">
                </div>
                <h5 class="text-center font-weight-bold my-4">Hurray!!!</h5>
                <h6>Payment successfully!!</h6>

                <a href = "<?php echo base_url('dashboard/paymentSummary'); ?>">OK</a>
                
            </div>

            </div>
        </div>
    </div>
    <!-- success modal for payment ends here-->
  </main>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/js/wallet-payment.js" type="application/javascript"></script>

   <!--Bootstrap js and Popper js -->
   <script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js"
    crossorigin="anonymous">
   </script>
   
   <script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js"
    crossorigin="anonymous"></script>

    <script>

        	const paymentForm = document.getElementById('paymentForm');
        	
        	var bID = document.getElementById('booking_id').value;

          var link = document.getElementById('modalSuccess');
        	
        	var refID = document.getElementById("refID").value;
        
        	//paymentForm.addEventListener("submit", payWithPaystack, false);


          function pay() 
          {
            //window.location.href= baseURL+"dashboard/booking";
            link.click();
            //recurringTransaction(bID, refID);
            updateTransaction(bID, refID);
            //alert('Your Payment Was Successful');
          }

        	// function payWithPaystack(e) {
        
          //   var link = document.getElementById('modalSuccess');

        	//     e.preventDefault();
        
        	//     let handler = PaystackPop.setup({
        
          //   		key: 'pk_live_7741a8fec5bee8102523ef51f19ebb467893d9d2', // Replace with your public key
            
          //   		email: document.getElementById("email").value,
            
          //   		amount: document.getElementById("amount").value * 100,
            
          //   		ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            
          //   		// label: "Optional string that replaces customer email"
            
          //   		onClose: function(){
            
          //   		},
            
          //           callback: function(response){
                
          //               let message = 'Payment complete! Reference: ' + response.reference;
                        
          //               link.click();
          //               updateTransaction(bID, refID);
          //           }
          //       });
        
          //       handler.openIframe();
            
          //   }

              function recurringTransaction(bookingID, refID){
                //alert(bookingID+' - '+refID);
                //var baseURL = "https://rent.smallsmall.com/";
                
                var baseURL = "<?php echo base_url(); ?>";
                
                var rent_exp = document.getElementById('rent_exp').value;
                
                var duration = document.getElementById('duration').value;
                
                var pplan = document.getElementById('payment_plan').value;
                
                var amount = document.getElementById('amount').value;
                
                var propID = document.getElementById('propID').value;

                var userID = document.getElementById('userID').value;
                
                var data = {"bookingID" : bookingID, "referenceID" : refID, "rent_exp" : rent_exp, "duration" : duration, "pplan" : pplan, "amount" : amount, "userID" : userID, "propertyID" : propID};
                
                $.ajaxSetup ({ cache: false });
    
                $.ajax({
            
                  url : baseURL+'rss/recurringTransaction/',
            
                  type: "POST",
            
                  async: true,
            
                  data: data,
            
                  success	: function (data){
                    
                    alert(data);

                    alert('yes');
                  }
            
                });
              }
            
              function updateTransaction(bookingID, refID){
                //alert(bookingID+' - '+refID);
                //var baseURL = "https://rent.smallsmall.com/";
                
                var baseURL = "<?php echo base_url(); ?>";
                
                var rent_exp = document.getElementById('rent_exp').value;
                
                var duration = document.getElementById('duration').value;
                
                var pplan = document.getElementById('payment_plan').value;
                
                var amount = document.getElementById('amount').value;
                
                var propID = document.getElementById('propID').value;

                var userID = document.getElementById('userID').value;
                
                var data = {"bookingID" : bookingID, "referenceID" : refID, "rent_exp" : rent_exp, "duration" : duration, "pplan" : pplan, "amount" : amount, "userID" : userID, "propertyID" : propID};
                
                $.ajaxSetup ({ cache: false });
    
                $.ajax({
            
                  url : baseURL+'rss/updateTransaction/',
            
                  type: "POST",
            
                  async: true,
            
                  data: data,
            
                  success	: function (data){
                    if(data == 1){
                      alert('Your Payment Was Successful');
                      window.location.href = baseURL+"dashboard/paymentSummary";
                    }else{                 
                      alert('Your Payment Was not Successful');      
                    }				
            
                  }
            
                });
              }
        </script>
        <script>
            const amountInput = document.querySelector(".amountInput");
            const payButton = document.querySelector(".payButton");
            const emailInput = document.querySelector(".emailInput");
            const descriptionInput = document.querySelector(".descriptionInput");
            const publicKeyInput = document.querySelector(".publicKeyInput");
            const currencyInput = document.querySelector(".currencyInput");
            const refInput = document.querySelector(".refNum");
            const bookingInput = document.querySelector(".bookingNum");
        
            payButton.addEventListener("click", () => {
                const amount = amountInput.value;
                const email = emailInput.value;
                const publicKey = publicKeyInput.value;
                const description = descriptionInput.value;
                const currency = currencyInput.value;
                const refID = refInput.value;
                const bookingID = bookingInput.value;
            
                window.payWithBasqet({
                    amount,
                    email,
                    ...(description && { description }),
                    currency: currency,
                    public_key: publicKey,
                    meta: {
                        transaction_reference: "REF56768798"
                    },
                    onSuccess: (ref) => {
                        alert(`Transaction successful: ${ref}`);
                    },
                    onError: (error) => {
                        alert(`Transaction failed ${error}`);
                    },
                    onClose: () => {
                        alert("Checkout closed");
                    },
                    onAbandoned: () => {
                        alert("Checkout Abandoned");
                    }
                });
            });
        </script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="https://checkout.basqet.com/static/prod/basqet.js"></script> 


    
