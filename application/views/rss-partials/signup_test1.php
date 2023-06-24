
<!-- End Header -->

<!-- Main Body 1-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/signup.css" />
<!-- MAIN SECTION -->
<main class="m-auto p-md-0 p-3">
    <div class="signup-section">
      <div class="mt-4">
        <a class="navbar-brand logo-link mr-4 d-md-block d-none" href="<?php echo base_url(); ?>">
          <img class="logo-img img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logo.png" alt="" />
        </a>
      </div>
      <div class="create-account my-md-5 my-1">
        <p class=" font-weight-bold ">Create your account</p>
      </div>

      <div class="progress progress-custom ">
        <div class="progress-bar primary-background " role="progressbar" style="width: 33.33%" aria-valuenow="25"
          aria-valuemin="0" aria-valuemax="100"></div>

      </div>
      <div class="m-auto progress-number">

        <p class="font-weight-bold text-left">1 of 3</p>
      </div>

      <div class="signup-container  m-auto">
        <div class="mb-5">
          <p class="signup-container-title">Let your joy begin</p>
        </div>


        <!-- first signup -->
        <form class="register-form" id="regForm">

        <div class="form-report" style="padding:5px;border-radius:4px;" ></div>
              <div class="final-signup-msg">
                You have successfully registered. Check your email for confirmation mail to complete your registration.
              </div>

          <fieldset>
          <div class="form-group">
            <input type="text" class="form-control p-4 reg-fields" id="fname"  name="" placeholder="Firstname">
          </div>
          <div class="form-group">
            <input type="text" class="form-control p-4 reg-fields" id="lname"  name="" placeholder="Lastname">
          </div>
          <div class="form-group">
            <input type="text" class="form-control p-4 reg-fields" id="email" name="" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control p-4 reg-fields" id="phone" name="" placeholder="Phone number">
          </div>

          <!--<input type="button" class="rss-form-button next" id="" value="Next">-->

           <input type="button" class="btn w-100 primary-background my-md-5 my-5 p-3 next" id="" value="Next">
          <!--</input> -->

          </fieldset>
          <!-- End of first signup field -->

          <!-- Second Signup -->

          <fieldset>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" class="form-control p-4 reg-fields" id="password" placeholder="Password" aria-label="Recipient's username"
                aria-describedby="basic-addon2" name="">
              <div class="input-group-append">
                <span class="input-group-text bg-white" id="basic-addon2">
                  <i class="fa fa-eye-slash primary-text-color-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" class="form-control p-4 reg-fields" id="password_2" placeholder="Confirm password"
                aria-label="Recipient's username" aria-describedby="basic-addon2" name="">
              <div class="input-group-append">
                <span class="input-group-text bg-white" id="basic-addon2">
                  <i class="fa fa-eye-slash primary-text-color-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="number" class="form-control p-4 reg-fields" id="age" aria-describedby="emailHelp"
              placeholder="Age" name="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control p-4 reg-fields income" id="income" aria-describedby="emailHelp"
              placeholder="Monthly income" name="">
          </div>

          <div class="d-flex justify-content-between">

             <input type="button" class="btn w-25 primary-background my-md-5 my-5 p-3 text-dark previous"
              style="background: #E6EBF1;" value="Previous">
            <!--</input>-->
            <input type="button" class="btn ml-5 w-75 primary-background my-md-5 my-5 p-3 next" value="Next">
            <!--</input> -->

            <!--<input type="button" class="btn w-25 primary-background my-md-5 my-5 p-3 text-dark rss-form-buttons previous" style="background: #E6EBF1;" value="Previous">-->
            <!--<input type="button" class="btn ml-5 w-75 primary-background my-md-5 my-5 p-3 rss-form-buttons next" value="Next">-->

          </div>
        </fieldset>

        
        <fieldset>

          <div class="form-group">
            <select class="form-control gender" id="exampleFormControlSelect1 gender" name="gender">
              <option>Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>other</option>
            </select>
          </div>


          <div class="form-group">
            <select class="form-control standard-select referral" id="referral">
              <option>How did you hear about us</option>
              <option>Facebook</option>
              <option>Twitter</option>
              <option>Instagram</option>
              <option>Friends</option>
              <option>other</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control rss-text-f p-4" id="referral_code" aria-describedby="emailHelp"
              placeholder="Referral code (optional)" name="">
          </div>

          <div class="form-group">
            <select class="form-control interest reg-fields" id="interest">
            <option selected value="">What is your interest?</option>
                                        <option value="RSS">Renting a home</option>
                                        <option value="Buy2let">Buying a home</option>
                                        <option value="Stayone">Short stays</option>
            </select>
            
            <input type="hidden" id="clicked" val="0" />
          </div>

          <div class="d-flex justify-content-between">


          <input type="button" class="rss-form-buttons previous" value="Back">
          <input type="submit" class="rss-form-buttons finish-btn" id="" value="Sign up">


            <!-- <input type="button" class="btn w-25 primary-background my-md-5 my-5 p-3 text-dark previous"-->
            <!--  style="background: #E6EBF1;" value="Back">-->
            <!--</input>-->
            <!--<input type="submit" class="btn ml-5 w-75 primary-background my-md-5 my-5 p-3 finish-btn" id="" value="Sign up">-->
            <!--</input> -->

          </div>

        </fieldset>

        </form>
        <div class="mb-2 d-md-block d-none">
          <p>Signing up for a Rentsmallsmall account means you agree to the <a href="http://">Privacy Policy</a> and <a
              href="http://"> Terms
              and Conditions.</a></p>
        </div>
      </div>
      <div class="my-4 d-md-none d-block">
        <p>Signing up for a Rentsmallsmall account means you agree to the <a href="http://">Privacy Policy</a> and <a
            href="http://"> Terms
            and

      </div>
  </main>

<!-- End Main Body -->

<script src="<?php echo base_url(); ?>assets/js/user-registration.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>
        <script>
            $(document).ready(function(){
                
                //jQuery time
                var current_fs, next_fs, previous_fs; //fieldsets
    
                $(".next").click(function(){
                                        
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    
                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show(); 
                    //hide the current fieldset with style
    
                    current_fs.hide();
                    
                });
    
                $(".previous").click(function(){
                                        
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    
                    //de-activate current step on progressbar
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    
                    //show the previous fieldset
                    previous_fs.show(); 
                    //hide the current fieldset with style
                    current_fs.hide();
                });
    
            });
        </script>