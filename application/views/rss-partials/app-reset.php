		<div class="pane">

		<div class="pane-inner">

			

		</div>

	</div>

	<div class="item-pane">

		<div class="item-pane-inner">
            <?php //echo md5(trim('Pidahtnadah01')); ?>
			<form id="appPwdResetForm" autocomplete="off" class="loginForm" method="POST">

				<div class="loginFormHead">Reset Password</div>
				<div class="reset-dir">
					Enter your email address below and we will email you instructions for setting up a new password.
				</div>

				<div class="form-report"></div>

				<label><span>*</span> Email Address</label>

				<input type="text" class="mand-f loginTxt" id="username" />

				<button class="loginButton"><!--<i class="fa fa-lock"></i>--> Submit</button>


			</form>

		</div>

	</div>
<div class="sendAgainOverlay">
	<div class="sendAgainModal">
		<div class="s_modal_close"><i class="fa fa-times"></i></div>
		<div class="s_modal_title">Password Reset</div>
		<div class="s_modal_note">
			Password reset instructions has been sent to your email.  
		</div>
		<div class="s_modal_icon">
			<img src="<?php echo base_url().'assets/img/lock-icn.png'; ?>" />
		</div>
		<div class="s_modal_do" id="close_modal">Close</div>
	</div>
</div>