<div class="container-fluid d-md-block d-none mt-5">
    <div>
        <a href="<?php echo base_url(); ?>" class="text-decoration-none font-weight-bold primary-text-color-alt">&lt;
            &nbsp;&nbsp;Back</a>
    </div>
</div>
<!-- MAIN SECTION -->
<main class="m-auto p-md-0 p-3">
    <div class="login-section">
        <div>
            <a class="navbar-brand logo-link mr-4 d-md-block d-none" href="<?php echo base_url(); ?>">
                <img class="logo-img img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logo.png" alt="" />
            </a>
            <p>Welcome back!</p>
        </div>

        <div class="login-container p-md-5 p-3 m-auto">
            <form id="loginForm" method="post">

                <div class="form-report alert"></div>

                <div class="form-group">
                    <input type="text" class="form-control email mand-f" id="username" aria-describedby="emailHelp" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-password mand-f" id="pass" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2" name="password">

                        <div class="input-group-append toggle-password">
                            <span class="input-group-text bg-white" id="basic-addon2">
                                <i class="fa fa-eye-slash primary-text-color-alt" id="unleashPass" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check text-md-center text-right">
                    <a href="<?php echo base_url('reset-password'); ?>" class="form-check-a primary-text-color-alt" style="font-size: 14px">Forgot
                        password?</a>
                </div>

                <input type="hidden" class="current-page" id="current-page" value="<?php if (@$_SERVER['HTTP_REFERER']) {
                        echo $_SERVER['HTTP_REFERER'];
                    
                            } else {
                                echo $this->session->userdata('page_link'); } ?>" />

                <button type="submit" id="" class="btn w-100 primary-background mb-md-3 mb-5 loginButton">Login</button>
            </form>

        </div>
        <div class="my-5">
            <p>Don’t have an account? <br class="d-md-none d-block"> <a href="<?php echo base_url('signup'); ?>"><span class="text-dark font-weight-bold">Create account</span></a> </p>
        </div>
    </div>
</main>


<!-- Mixpanel script -->
<script>
    // // Initialize Mixpanel with your project token
    // mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

    var userID = '<?php echo $this->session->userdata('userID'); ?>';
    // var userEmail = '<?php echo $this->session->userdata('email'); ?>';
    // var userName = '<?php echo $this->session->userdata('fname').' '.$this->session->userdata('lname'); ?>';


    // Track the user visiting the page
    // <!--mixpanel.track('Page Visit');-->

    // Identify the user by their ID and set user properties
    // <!--mixpanel.identify(userID);-->
    // <!--mixpanel.identify(userEmail);-->
    // <!--mixpanel.identify(userName);-->

    // mixpanel.people.set({
    //     '$email': userEmail,
    //     '$name': userName
    // });

    // Track the signup event
    // <!--mixpanel.track('Signed Up', {-->
    // <!--    'Signup Type': 'Referral'-->
    <!--});-->
</script>


<!--<script>-->
        <!--// Initialize Mixpanel with your project token-->
<!--        mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');-->
        
         <!--// Track the user visiting the page-->
<!--            mixpanel.track('Page Visit');-->

        <!--// Identify the user by their email from the database-->
<!--        mixpanel.identify('bwitlawalyusuf@gmail.com');-->

        <!--// Track the signup event-->
<!--        mixpanel.track('Signed Up', {-->
<!--            'Signup Type': 'Referral'-->
<!--        });-->
<!--</script>-->



<script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>

  <!-- Jquery js -->
  <script src="<?php echo base_url(); ?>assets/updated-assets/js/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->

  <script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
    
    <!--<script src="<?php echo base_url(); ?>assets/js/script.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/login.js?version=<?php echo rand(1, 99999999); ?>.10.<?php echo rand(1, 4050); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {



        $('#unleashPass').on('click', function() {



            var passInput = $("#pass");



            if (passInput.attr('type') === 'password')

            {



                passInput.attr('type', 'text');



            } else {



                passInput.attr('type', 'password');



            }

        });

    });
</script>

