	<div class="item-pane">

		<div class="page-inner">

			<div class="sideForm alert-form-text"> 

				Please fill the form and we will reach out to you as soon as we have a property that fits your request.

			</div> 

			<div class="sideForm alert-form">

				<div class="form-report">

				<!--- result pops up here --->

				</div>

				<form id="propAlertForm" autocomplete="off" class="verificationForm regForm" method="POST">
					<div class="regFormHead">Property Alert</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<span>*</span>
							<input type="text" class="signupTxt verify-txt-f" id="first-name" placeholder="First Name">
						</div>
					</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<span>*</span>
							<input type="text" class="signupTxt verify-txt-f" id="last-name" placeholder="Last Name">
						</div>
					</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<span>*</span>
							<input type="text" class="signupTxt verify-txt-f" id="email" placeholder="Email">
						</div>
						
					</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<span>*</span>
							<input type="text" class="signupTxt verify-txt-f" id="phone" placeholder="Phone">
						</div>
						
					</div>
					<div class="form-field-wrapper">
						
						<div class="input-container-full col-2">
						    <label>Price range</label>
						    <select name="from" class="verify-txt-f from" id="soflow">
							  <option value="" selected="selected">From</option>
							   <?php
								for($i = 50000; $i < 1000000; $i = $i + 50000){
									echo '<option value="'.$i.'">'.number_format($i).'</option>';
								}
							   ?>
							</select>
						</div>
						<div class="form-field-wrapper">	 
						   <select name="to" class="to verify-txt-f" id="soflow">
							  <option value="" selected="selected">To</option>
							   <?php
								for($i = 1000000; $i < 10000000; $i = $i + 50000){
									echo '<option value="'.$i.'">'.number_format($i).'</option>';
								}
							   ?>
							</select>
						</div>
					</div>
					
					<div class="form-field-wrapper">
						
						<div class="input-container-full col-2">
						    <label>Rental Plan</label>
						    <select name="from" class="verify-txt-f rent-plan" id="soflow">
							  <option value="Monthly" selected="selected">Monthly</option>
							  <option value="Quarterly" selected="selected">Quarterly</option>
							  <option value="Bi-annually" selected="selected">Bi Annually</option>
							  <option value="Annually" selected="selected">Annually</option>
							</select>
						</div>
					</div>
					
					<div class="form-field-wrapper">
						
						<div class="input-container-full col-2">
						    <label>Renting As</label>
						    <select name="from" class="verify-txt-f renting-as" id="soflow">
							  <option value="Male" selected="selected">Male</option>
							  <option value="Female" selected="selected">Female</option>
							  <option value="Family" selected="selected">Family</option>
							  <option value="Corporate" selected="selected">Corporate</option>
							</select>
						</div>
					</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<label>Property Type</label>
							   <select name="prop_type" class="verify-txt-f prop_type" id="soflow">
								  <option value="" selected="selected">Property Type</option>
								   <?php 
								   	foreach($propTypes as $propType => $pt){
										echo '<option value="'.$pt['id'].'">'.$pt['type'].'</option>';
									}
								   ?>
								</select>
						</div>
						<div class="input-container-full">
							<label>Preferred Location</label>
							<div class="form-field-wrapper">
							   <input type="text" class="signupTxt verify-txt-f city" placeholder="City/Town e.g Ikeja">

							 </div>

						</div>
					</div>
						<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
					<button style="cursor:pointer" id="verifyBut" class="verifyBut">Create Alert</button>

					<!--<div class="form-field-wrapper">
						<div class="pp-container left">
							We value your privacy.<br />
							By signing up, you accept  our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
						</div>
					</div>-->
				</form>

			</div>

		</div>

	</div>

<script src="<?php echo base_url().'assets/js/create-alert.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>