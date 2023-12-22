 <!-- MAIN SECTION -->

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/verification.css" />

 <main class="container-fluid">
     <div class="row">
         <div class="col-md-3 verify-container">
             <div class="d-flex align-items-center">
                 <p class="mr-md-4 mr-0 verify-me">Verify me</p>
                 <p class="verify-number d-md-block d-none">1 of 4</p>
             </div>
             <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
                 partnership. Please
                 <a href="<?php echo base_url('privacy-policy'); ?>">read</a> our policy on data sharing.
             </p>
             <p class="verify-number d-md-none d-block">1 of 4</p>
         </div>
         <div class="col-md-6">
             <div class="text-center mt-md-5">
                 <h2 class="verify-title">Personal details</h2>
                 <p class="verify-body">Provide your personal details.</p>
             </div>
             <div class="form-container mt-5">
                 <form class="px-md-5" id="profileVerification" method="POST" autocomplete="off">
                     <div class="row">

                         <!-- first name -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="first-name" placeholder="<?php echo !empty($fname) ? $fname : 'Firstname'; ?>" readonly>
                                 </div>
                             </div>
                         </div>

                         <!-- Last Name -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="last-name" placeholder="<?php echo !empty($lname) ? $lname : 'Lastname'; ?>" readonly>
                                 </div>
                             </div>
                         </div>

                         <!-- Email -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="email" placeholder="<?php echo !empty($email) ? $email : 'Email'; ?>" readonly>
                                 </div>
                             </div>
                         </div>

                         <!-- Phone Number -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="phone" placeholder="<?php echo !empty($phone) ? $phone : 'Phone Number'; ?>" readonly>
                                 </div>
                             </div>
                         </div>

                         <!-- Net Monthly Income -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="gross-pay" placeholder="Net Monthly Income" />
                                 </div>
                             </div>
                         </div>

                         <!-- Gender -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <select id="inputState standard-select gender verify-txt-f" class="form-control" id="gender">
                                         <option selected>Gender</option>
                                         <option>Male</option>
                                         <option>Female</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <!-- Marital Status -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <select id="inputState standard-select marital-status verify-txt-f" class="form-control" id="marital-status">
                                         <option selected>Marital status</option>
                                         <option>Single</option>
                                         <option>Married</option>
                                         <option>Divorced</option>
                                         <option>widowed</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <!-- Date of birth -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" onclick="(this.type='date')" class="form-control verify-txt-f" id="dob" placeholder="Date of birth" />
                                 </div>
                             </div>
                         </div>

                         <!-- Country -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <select id="country" class="form-control standard-select country verify-txt-f">
                                         <option value="" selected="selected">Country</option>

                                         <?php
                                            $CI = &get_instance();

                                            $countries = $CI->get_countries();

                                            foreach ($countries as $country => $value) {

                                                echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                            }

                                            ?>

                                     </select>
                                 </div>
                             </div>
                         </div>

                         <!-- State -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <select class="form-control standard-select states verify-txt-f">
                                         <option value="" selected="selected">State</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <!-- City -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" disabled class="form-control verify-txt-f" id="city" placeholder="City" />
                                 </div>
                             </div>
                         </div>


                         <!-- ID Number -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control verify-txt-f" id="passport-number" placeholder="ID Number (Driver's License, NIN, International Passport)" />
                                 </div>
                             </div>
                         </div>

                         <!-- Linkedin Url -->
                         <div class="col-md-6 col-12">
                             <div class="form-group">
                                 <div class="customized-select">
                                     <input type="text" class="form-control" id="linkedin-url" placeholder="Linkedin URL (optional)" />
                                 </div>
                             </div>
                         </div>



                         <div class="col-12 mt-5 text-center">
                             <button type="submit" class="btn verify-btn px-5 py-2 rss-form-button verifyBut" id="verifyBut">Next
                         </div>
                     </div>
             </div>
             </form>
         </div>
     </div>
     </div>
 </main>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script src="<?php echo base_url() . 'assets/js/verification.js' ?>"></script>

 <script src="<?php echo base_url() . 'assets/js/country-picker.js' ?>"></script>

 <script src="<?php echo base_url() . 'assets/js/state-picker.js' ?>" type="text/html"></script>


 <!--Bootstrap js and Popper js -->
 <script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
 </script>

 <script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


 </body>

 </html>