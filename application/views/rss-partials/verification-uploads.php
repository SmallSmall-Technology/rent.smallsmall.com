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
        <p class="verify-number d-md-block d-none">5 of 5</p>
      </div>
      <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
        partnership. Please
        <a href="<?php echo base_url('privacy-policy'); ?>">read</a> our policy on data sharing.
      </p>
      <p class="verify-number d-md-none d-block">5 of 5</p>
    </div>
    <div class="col-md-8 col-12 col-lg-6">

      <!-- <form id="uploadForm" class="verificationForm regForm" method="POST" enctype="multipart/form-data"> -->

        <div class="text-center mt-md-5">
          <h2 class="verify-title">Verify ID & Income</h2>
          <p class="verify-body">Click the buttons to verify</p>
        </div>
        <div class="row mt-5">
          <div class="col-md-6 col-12 mb-4">
            <div class="d-flex flex-column align-items-center">
              <div class="verify-icon mb-4">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/bank-icon.svg" alt="">
              </div>


              <div>
                <!-- File upload input for Verify income (hidden by default) -->
                <input type="file" class="input statement-inp" id="verify-income-upload" hidden />

                <!-- <input type="file" class="input statement-inp" id="upload" hidden /> -->

                <input type="hidden" id="userID" value="<?php echo @$userID; ?>" />

                <input type="hidden" id="statement" value="" />

                <!-- File submit button (hidden by default) -->
                <input type="submit" id="verify-income-submit" hidden />

                <!-- Show this button when not verified and make it trigger the file input -->
                <a href="#" class="btn verify-btn px-5 py-2" id="verify-income-button">Verify income</a>

                <!-- Show this button when verified -->
                <button class="btn verified-btn px-5 py-2 d-none" id="verified-button">Verified <i class="fa-solid fa-check" style="color:#00CD2D"></i></button>

                <!-- <button class="btn verified-btn px-5 py-2 d-none">Verified <i class="fa-solid fa-check" style="color:#00CD2D"></i></button> -->

              </div>


            </div>

          </div>
          <div class="col-md-6 col-12">
            <div class="d-flex flex-column align-items-center">
              <div class="verify-icon mb-4">
                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/face-scanner.svg" alt="">
              </div>
              <div>
                <!-- show this when not verified -->
                <button class="btn px-5 py-2" id="verify-id-btn">Verify ID</button>
                <!-- show this when verified -->
                <button class="btn verified-btn px-5 py-2 d-none">verified <i class="fa-solid fa-check" style="color:#00CD2D"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-12 mt-5 text-center">
            <a href="https://dev-rent.smallsmall.com/rss/verification/employment-verification" class="text-dark mr-4 text-decoration-none">&lt; &nbsp;back</a>
            <!-- <button type="submit" class="rss-form-button verifyBut" id="verifyBut">Finish</div> -->
            <button type="submit" class="btn verify-btn px-5 py-2 rss-form-button verifyBut" id="verifyBut">Finish</div>
            <!-- <a href="#" type="submit" class="btn verify-btn px-5 py-2 rss-form-button verifyBut" id="verifyBut">Finish</a> -->
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

<!--<script src="https://widget.dojah.io/widget.js"></script>-->


<script>
  // Function to handle the file upload
  const handleFileUpload = () => {
    const fileInput = document.getElementById('verify-income-upload');
    const verifyButton = document.getElementById('verify-income-button');
    const verifiedButton = document.getElementById('verified-button'); // Updated to use the new ID

    verifyButton.addEventListener('click', (event) => {
      event.preventDefault();
      fileInput.click();
    });

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) {
        verifyButton.style.display = 'none';
        verifiedButton.classList.remove('d-none'); // Remove the d-none class
      }
    });
  };

  document.addEventListener('DOMContentLoaded', () => {
    handleFileUpload();
  });
</script>


<script>
  var baseUrl = "https://dev-rent.smallsmall.com/";

  let input = document.getElementById('verify-income-upload');
  let button = document.getElementById('verify-income-button');

  button.onclick = () => {
    input.click();
  };

  input.addEventListener('change', function() {
    "use strict";
    var fd = new FormData();
    var files = this.files[0];
    var folderName = document.getElementById('userID').value;
    var filepath = "";

    fd.append('files', files);

    $.ajax({
      url: baseUrl + 'rss/uploadIdentification/' + folderName,
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      beforeSend: function() {
        // You can add any actions before upload here if needed
      },
      success: function(data, folder, pictures) {
        filepath = folderName + '/' + files.name.replace(/\s+/g, '_');
          $('#statement').val(filepath);
        // You can add any actions after a successful upload here
      }
    });
  });
</script>


<!-- JavaScript code for configuring and implementing the widget -->
<script>
  const options = {
    app_id: 'DJ-1F372D61F5', //your app_id here
    p_key: 'test_pk_2dzyWJ41YbFm5JdRssH3aRbxA', //your production public key here
    type: 'custom',
    //   user_data: {
    //     first_name: 'John', //optional
    //     last_name: 'Doe', //optional
    //     dob: '1982-03-12', //optional
    //     residence_country: 'NG' //optional
    //   },
    //   gov_data: {
    //         bvn: "456789654323",
    //         nin: "234567543233",
    //         dl: "3243546768767453423",
    //         mobile: "08034456679"
    //       },
    metadata: {
      user_id: '12xxxxsxsxsxssx1',
    },

    /** config: {
         
          widget_id: "650020202020220222",
          widget_id: "91281818181919191",
          widget_id: "63c923dc32f9ee002cbf9dff&token=RQFc1C"
     },
     
     **/


    config: {
      debug: true,
      aml: false,
      widget_id: "63c923dc32f9ee002cbf9dff",
      webhook: false, //Before you set webhook to true, Ensure you are subscribed to the webhook here https://api-docs.dojah.io/docs/subscribe-to-services
      review_process: 'Automatic',
      strictness_level: 'high',
      pages: [

        //   { page: 'user-data', config: { enabled: false } },
        //   { page: 'business-data', config: { cac: true, tin: true } },
        //   { page: 'business-id' },
        //   { page: 'email', config: { verification: true }},
        //   { page: 'phone-number', config: { verification: true } },
        //   { page: 'countries', config: { enabled: false } },  
        //   { page: 'government-data', config: { bvn: true, vnin: true, dl: false, mobile: false, otp: true, selfie: false } },
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
        //   { page: 'additional-document', config: {title: string, instruction: string } },
        // { page: 'address', config: { verification: true } }
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





<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>