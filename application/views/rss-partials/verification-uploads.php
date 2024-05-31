<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/verification.css" />

<style>
  /* Add this CSS to your stylesheet to override the d-none class */
  .show-verified {
    display: block !important;
  }
</style>

<!-- MAIN SECTION -->
<main class="container-fluid ">
  <div class="row">
    <div class="col-md-4 col-12 col-lg-3 verify-container">
      <div class="d-flex align-items-center">
        <p class="mr-md-4 mr-0 verify-me">Verify me</p>
        <p class="verify-number d-md-block d-none">4 of 4</p>
      </div>
      <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
        partnership. Please
        <a href="<?php echo base_url('privacy-policy'); ?>">read</a> our policy on data sharing.
      </p>
      <p class="verify-number d-md-none d-block">4 of 4</p>
    </div>
    <div class="col-md-8 col-12 col-lg-6">

      <!-- <form id="uploadForm" class="verificationForm regForm" method="POST" enctype="multipart/form-data"> -->

      <div class="text-center mt-md-5">
        <h2 class="verify-title">Verify ID & Income</h2>
        <p class="verify-body">Click the buttons to verify</p>
      </div>
      <div class="row mt-5 justify-content-center">
        <div class="col-md-6 col-12 mb-4">
          <div class="d-flex flex-column align-items-center">
            <div class="verify-icon mb-4">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/bank-icon.svg" alt="">
            </div>
            <div>

              <!-- File upload input for Verify income -->
              <input type="file" class="input statement-inp" id="verify-income-upload" hidden />

              <input type="hidden" id="userID" value="<?php echo @$userID; ?>" />

              <input type="hidden" id="statement" value="" />

              <!-- File submit button -->
              <input type="submit" id="verify-income-submit" hidden />

              <!-- Show this button when not verified and make it trigger the file input -->
              <button class="btn verify-btn px-5 py-2" onclick="verifyIncome()">Verify income</button>

              <!-- Show this button when verified -->
              <button class="btn verified-btn px-5 py-2 d-none" id="verified-button">Verified <i class="fa-solid fa-check" style="color:#00CD2D"></i></button>

            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 col-12"> -->
          <div class="d-flex flex-column align-items-center">
            <div class="verify-icon mb-4">
              <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/face-scanner.svg" alt="">
            </div>
            <div>
              <!-- show this when not verified -->
              <!-- <button class="btn verify-btn px-5 py-2" id="verify-id-btn">Verify ID</button>
              <!-- show this when verified -->
              <!-- <button class="btn verified-btn px-5 py-2 d-none">verified <i class="fa-solid fa-check" style="color:#00CD2D"></i></button> -->
            </div>
          </div>
        <!-- </div> --> 
      </div>
      <div class="row mb-5">
        <div class="col-12 mt-5 text-center">

          <a href="https://rent.smallsmall.com/rss/verification/employment-verification" class="text-dark mr-4 text-decoration-none">&lt; &nbsp;back</a>

          <button type="submit" class="btn verify-btn px-5 py-2 finishVerifyBut" id="finishVerifyBut">next</button>
        </div>
      </div>
    </div>

    <!-- </form> -->
  </div>
  </div>


</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/dojah-widget.js"></script>

<script src="<?php echo base_url() . 'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/js/upload-verification-file.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/js/custom-file-input.js' ?>"></script>

<!-- JavaScript code for configuring and implementing the widget for DOJAH -->

<script>

  const options = {

    // app_id: 'DJ-1F372D61F5', //Sand box
    app_id: '63c924ce0ce227002edc2dd9', //App_id for live key

    // p_key: 'test_pk_2dzyWJ41YbFm5JdRssH3aRbxA', //sand box
    p_key: 'prod_pk_5W84Vldx275cJbL23wVArdGnX', //Prod Key

    type: 'custom',

    metadata: {

      user_id: '12xxxxsxsxsxssx1',

    },

    config: {

      debug: true,

      aml: false,

      // widget_id: "63c923dc32f9ee002cbf9dff", // Sand box
      widget_id: "6523c8e3afc4e500390c2d94", // Prod key

      webhook: false, //Before you set webhook to true, Ensure you are subscribed to the webhook here https://api-docs.dojah.io/docs/subscribe-to-services

      review_process: 'Automatic',

      strictness_level: 'high',

      pages: [

        {
          page: 'selfie'
        },
        {
          page: 'id',

          config: {

            passport: true,

            dl: true,

            vnin: true,

            voter: true,

            custom: true
          }
        },
      ],
    },
    onSuccess: function(response) {

      console.log('Success', response);

    },
    onError: function(err) {

      console.log('Error', err);

    },
    onClose: function() {

      console.log('Widget closed');

    }
  };

  const connect = new Connect(options);

  const button = document.querySelector('#verify-id-btn');

  button.addEventListener('click', function() {

    connect.setup();

    connect.open();

  });
</script>


<script>
  var baseUrl = "https://rent.smallsmall.com/";

  // Added to reference the verify button
  let input = document.getElementById('verify-income-upload');

  let incomeButton = document.getElementById('verify-income-button');

  let verifyButton = document.getElementById('verify-income-button');

  let verifiedButton = document.getElementById('verified-button');

  // console.log('input:', input);
  // console.log('incomeButton:', incomeButton);
  // console.log('verifyButton:', verifyButton);
  // console.log('verifiedButton:', verifiedButton);

  incomeButton.onclick = () => {

    input.click();

  };

  input.addEventListener('change', function() {

    "use strict";

    var fd = new FormData();

    var files = $(this)[0].files[0];
    // var files = this.files[0];

    var folderName = document.getElementById('userID').value;

    var filepath = "";

    // console.log('files:', files); // burgs test

    fd.append('files', files);

    $.ajax({
      url: baseUrl + 'rss/uploadIdentification/' + folderName,

      type: 'post',

      data: fd,

      contentType: false,

      processData: false,

      beforeSend: function() {

        // Actions before upload here if needed
      },
      success: function(data, folder, pictures) {

        filepath = folderName + '/' + files.name.replace(/\s+/g, '_');

        $('#statement').val(filepath);

        // console.log('filepath:', filepath);

        // Hide the verifyButton and show the verifiedButton

        verifyButton.style.display = 'none';

        verifiedButton.classList.remove('d-none');

      }
    });
  });


  function verifyIncome() {

    var baseURL = "<?php echo base_url(); ?>";
        
    var userID = document.getElementById('userID').value;
    
    var data = {"userID" : userID};
    
    $.ajaxSetup ({ cache: false });

    $.ajax({

        url : baseURL+'rss/verifyIncome/',

        type: "POST",

        async: true,

        data: data,

        success	: function (data){        
        window.location.href= data
      }

    });
}

</script>


<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>