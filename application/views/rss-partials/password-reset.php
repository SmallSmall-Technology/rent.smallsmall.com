
  <div class="container-fluid d-md-block d-none mt-5">
    <div>
      <a href="<?php echo base_url('login'); ?>" class="text-decoration-none font-weight-bold primary-text-color-alt">&lt;
        &nbsp;&nbsp;Back</a>
    </div>
  </div>

  <!-- MAIN SECTION -->
  <main class="m-auto p-md-0 p-3">
    <div class="login-section">
      <div class="my-5">
        <a class="navbar-brand logo-link mr-4 d-md-block d-none" href="<?php echo base_url(); ?>">
          <img class="logo-img img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/logo.png" alt="" />
        </a>
      </div>

      <div class="login-container p-md-5 p-3 m-auto">
        <div>
          <p>Password reset</p>
          <p style="font-size: 14px;">We will email the instructions to reset your password</p>
        </div>
        <form id="pwdResetForm" method="post">
          <div class="form-report alert"></div>
          <div class="form-group">
            <input type="email" class="form-control email mand-f" id="username" name="email" aria-describedby="emailHelp"
              placeholder="Email address">
          </div>

          <button type="submit" name="login" class="btn w-100 primary-background mb-md-3 mb-5 loginButton">Reset password</button>
        </form>

      </div>
      <div class="my-5 d-md-none d-block">
        <p><i class="fa-solid fa-less-than"></i>&nbsp;<a href="<?php echo base_url('login'); ?>"><span
              class="text-dark font-weight-bold">Go back to Login</span></a> </p>
      </div>
    </div>
  </main>



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
    <!--<script src="<?php echo base_url(); ?>assets/front/js/script.js"></script>-->
    
</body>

</html>