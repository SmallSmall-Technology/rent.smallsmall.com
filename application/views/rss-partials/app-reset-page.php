			<div class="pane">

		<div class="pane-inner">

			

		</div>

	</div>

	<div class="item-pane">

		<div class="item-pane-inner">

			<form id="appPwdForm" autocomplete="off" class="loginForm" method="POST">

				<div class="loginFormHead">New Password</div>
				<div class="reset-dir" style="text-align:center">
					You need to change your password to proceed.
				</div>

				<div class="form-report"></div>

				<label><span>*</span> Password</label>
				<div class="pass-dir" style="font-family:avenir-regular;color:red;font-size:10px;text-align:left;min-height:10px;overflow:auto;display:none">Password should be more than 6 characters, have at least a capital letter, a number, and a special character</div>
				<input type="password" class="mand-f loginTxt" id="password" />
				
				
				<label><span>*</span>Confirm Password</label>

				<input type="password" class="mand-f loginTxt" id="password_2" />

				<button class="loginButton"><!--<i class="fa fa-lock"></i>--> Submit</button>
				
				<input type="hidden" class="user_id" value="<?php echo @$tempID; ?>" /> 

			</form>

		</div>

	</div>