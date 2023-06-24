 <div class="container-fluid d-md-block d-none mt-5">
    <div>
      <a href="<?php echo base_url('login'); ?>" class="text-decoration-none font-weight-bold primary-text-color-alt">&lt;
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
        <p class="my-5">Enter your new password in the fields below</p>
      </div>

      <div class="login-container p-md-5 p-3 m-auto">
          
        <form id="pwdForm" autocomplete="off" method="POST">
            
            <div class="form-report"></div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" class="form-control newPasswordInput mand-f" id="password" placeholder="New Password"
                aria-label="new password" aria-describedby="basic-addon2">
                
              <div class="input-group-append toggle-password" id="passwordIconContainer">
                  
                <span class="input-group-text bg-white" id="basic-addon2">
                  <i class="fa fa-eye-slash primary-text-color-alt" aria-hidden="true" id="newPassword"></i>
                </span>
                
              </div>
              
              <div class="pass-dir" style="color:red;font-size:10px;text-align:centre;min-height:10px;overflow:auto;display:none">Password should be more than 6 characters, have at least a capital letter, a number, and a special character
              </div>
              
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group mb-3">
                
              <input type="password" class="form-control confirmPasswordInput mand-f" id="password_2" placeholder="Confirm Password"
                aria-label="confirm password" aria-describedby="basic-addon2">
                
              <div class="input-group-append toggle-password2">
                  
                <span class="input-group-text bg-white" id="basic-addon2">
                  <i class="fa fa-eye-slash primary-text-color-alt" aria-hidden="true" id="confirmPassword"></i>
                </span>
                
              </div>
              
              <input type="hidden" class="user_id" value="<?php  echo @$tempID; ?>" /> 
              
            </div>
          </div>

          <button type="submit" name="login" class="btn w-100 primary-background mb-md-3 mb-5 loginButton">Reset</button>
        </form>

      </div>

    </div>
  </main>
  
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
