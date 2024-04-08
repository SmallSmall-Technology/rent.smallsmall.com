<main class="m-auto p-md-0 p-3">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-toggle="modal" id="btnmodal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check your email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-auto text-center">
                        <div class="mb-4">
                            <img src="../assets/images/email-icon.svg" alt="">
                        </div>
                        <div class="sent-email-content ">
                            <p class="font-weight-light" style="font-size: 18px;">We've sent a verification email to</p>
                            <p class="" style="font-size: 24px;">james.gunn@gmail.com</p>
                            <p class="font-weight-light" style="font-size: 14px;">Click the button in your email to activate your
                                account.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- To trigger the button use this code -> document.getElementById('btnmodal').click() -->

    <!-- end of modal -->

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
            <div class="progress-bar primary-background" role="progressbar" style="width: 33.33%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="m-auto progress-number">
            <p class="font-weight-bold text-left">1 of 3</p>
        </div>

        <div class="signup-container  m-auto">
            <div class="mb-5">
                <p class="signup-container-title">Let your joy begin</p>
            </div>


            <form class="register-form" id="regForm">

                <div class="form-report" style="padding:5px;border-radius:4px;"></div>
                <div class="final-signup-msg">
                    You have successfully registered. Check your email for confirmation mail to complete your registration.
                </div>

                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control p-4 reg-fields" id="fname" placeholder="Firstname" name="" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control p-4 reg-fields" id="lname" placeholder="Lastname" name="" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control p-4 reg-fields" id="email" placeholder="Email address" name="" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control p-4 reg-fields" id="phone" placeholder="Phone number" name="" required />
                    </div>
                    <div>
                        <input type="button" class="btn w-100 primary-background my-md-5 my-5 p-3 next finish-btn" value="Next">
                    </div>

                </fieldset>

                <fieldset>
                    <div class="form-group">

                        <div class="input-group mb-3">
                            <input type="password" class="form-control p-4 reg-fields newPasswordInput" id="password" placeholder="Password" name="" required />

                            <div class="input-group-append toggle-password">
                                <span class="input-group-text bg-white" id="basic-addon2">
                                    <i class="fa fa-eye-slash primary-text-color-alt" id="newPassword" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="input-group mb-3">
                            <input type="password" class="form-control p-4 reg-fields confirmPasswordInput" id="password_2" placeholder="Confirm password" name="" required>
                            <div class="input-group-append toggle-password2">
                                <span class="input-group-text bg-white" id="basic-addon2">
                                    <i class="fa fa-eye-slash primary-text-color-alt" id="confirmPassword" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control p-4 reg-fields" id="age" placeholder="Age" name="" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control p-4 reg-fields income" id="income" placeholder="Monthly income" name="income" required />
                    </div>

                    <div class="d-flex justify-content-between">
                        <input type="button" class="btn w-25 primary-background my-md-5 my-5 p-3 text-dark previous" style="background: #E6EBF1;" value="Back">
                        <input type="button" class="btn ml-5 w-75 primary-background my-md-5 my-5 p-3 next" value="Next">
                    </div>

                </fieldset>

                <fieldset class="next-line">
                    <div class="form-group">
                        <select class="form-control gender" id="gender" name="gender" required>
                            <option value="Gender">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <!--<option value="Other">other</option>-->
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control referral" id="referral" required>
                            <option value="TV">How did you hear about us</option>
                            <option value="Radio">Radio</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Friends">Friends</option>
                            <option value="Other">other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control p-4" id="referral_code" placeholder="Referral code (Optional)" name="" />
                    </div>
                    <div class="form-group">
                        <select class="form-control interest reg-fields" id="interest" required>
                            <option selected value="">What is your interest?</option>
                            <option value="RSS">Renting a home</option>
                            <option value="Buy2let">Buying a home</option>
                            <option value="Stayone">Short stays</option>
                        </select>
                        <input type="hidden" id="clicked" val="0" />
                    </div>

                    <div class="d-flex justify-content-between">

                        <input type="button" class="btn w-25 primary-background my-md-5 my-5 p-3 text-dark previous" style="background: #E6EBF1;" value="Back">
                        <input type="submit" class="btn ml-5 w-75 primary-background my-md-5 my-5 p-3 finish-btn" value="Sign Up">

                    </div>

                </fieldset>

            </form>

            <div class="mb-2 d-md-block d-none">
                <p>Signing up for a Rentsmallsmall account means you agree to the <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a> and <a href="<?php echo base_url('terms-of-use'); ?>"> Terms Of Use.</a></p>
            </div>

        </div>
        <div class="my-4 d-md-none d-block">
            <p>Signing up for a Rentsmallsmall account means you agree to the <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a> and <a href="<?php echo base_url('terms-of-use'); ?>"> Terms Of Use.</a></p>
        </div>

</main>


<!-- Tracking code for rss - Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/143441522.js"></script>
<!-- End of HubSpot Embed Code -->


<script>
    // Added To track Users signup using Mixpanel Platform 

    // Initialize Mixpanel with your project token
    // mixpanel.init("86e1f301cd45debd226a5a82ad553d5c");

    var userID = "<?php echo $this->session->userdata('userID'); ?>";
    // var userEmail = "<?php echo $this->session->userdata('email'); ?>";

    // console.log(userID,userEmail );

    // Track the user visiting the page
    // mixpanel.track("Page Visit");

    // Identify the user by their ID and set user properties
    // mixpanel.identify(userID);
    // mixpanel.identify(userID);
    // mixpanel.identify(userEmail);
    // mixpanel.identify(userName);

    // mixpanel.people.set({
    //     "$email": userEmail
    // });

    // Track the signup event
    // <!--mixpanel.track("Signed Up", {-->
    // <!--    "Signup Type": "Referral"-->
    // <!--});-->
</script>



<script src="<?php echo base_url(); ?>assets/js/user-registration.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>

<!-- Jquery js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap js and Popper js -->

<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const progressBar = $('.progress-bar');
        const progressNumber = $('.progress-number p');
        const fieldsets = $('fieldset');

        let currentFieldset = 1;

        $(".next").click(function() {
            var current_fs = $(this).parent().parent();
            var next_fs = $(this).parent().parent().next();

            // Check if all mandatory fields in the current fieldset are filled
            var mandatoryFields = current_fs.find('.reg-fields[required]');
            var isValid = true;

            mandatoryFields.each(function() {
                if ($(this).val().trim() === '') {
                    $(this).css('border', '1px solid red');
                    isValid = false;
                } else {
                    $(this).css('border', '');
                }
            });

            if (isValid) {
                currentFieldset++;

                // Update progress bar
                const progressPercentage = (currentFieldset / fieldsets.length) * 100;
                progressBar.css('width', `${progressPercentage}%`);
                progressBar.attr('aria-valuenow', progressPercentage);

                // Update progress number
                progressNumber.text(`${currentFieldset} of ${fieldsets.length}`);

                // Show the next fieldset
                next_fs.show();
                // Hide the current fieldset with style
                current_fs.hide();
            } else {
                // Display an error message if the current fieldset is incomplete
                $(".form-report").html("Please fill in all mandatory fields");
                $(".form-report").css("background", "red");
                $(".form-report").css("color", "#FFFFFF");
                $(".form-report").show();
            }
        });

        $(".previous").click(function() {
            var current_fs = $(this).parent().parent();
            var previous_fs = $(this).parent().parent().prev();

            currentFieldset--;

            // Update progress bar
            const progressPercentage = (currentFieldset / fieldsets.length) * 100;
            progressBar.css('width', `${progressPercentage}%`);
            progressBar.attr('aria-valuenow', progressPercentage);

            // Update progress number
            progressNumber.text(`${currentFieldset} of ${fieldsets.length}`);

            // Show the previous fieldset
            previous_fs.show();
            // Hide the current fieldset with style
            current_fs.hide();
        });
    });
</script>

<script>
    function showAndHidePassword(parentInput, inputEl, eyeIcon) {
        $(document).ready(function() {
            $(parentInput).click(function() {
                // Find the password input field
                let passwordInput = $(this).prev('input[type="password"]');
                let input = $(inputEl);
                let eyeEl = $(eyeIcon);

                // Toggle the type attribute of the password input
                if (passwordInput.attr("type") === "password") {
                    input.attr("type", "text");
                    eyeEl.removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    input.attr("type", "password");
                    eyeEl.removeClass("fa-eye").addClass("fa-eye-slash");
                }
            });
        });
    }
    showAndHidePassword(".toggle-password", ".newPasswordInput", "#newPassword");

    showAndHidePassword(".toggle-password2", ".confirmPasswordInput", "#confirmPassword");
</script>