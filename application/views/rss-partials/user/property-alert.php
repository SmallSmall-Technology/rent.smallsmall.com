	<div class="pane">
		<div class="pane-inner">
			<h1>Verify me</h1>
			
		</div>
	</div>
	<div class="item-pane">
		<div class="page-inner">
			<div class="sideForm">
				<form id="profileVerification" autocomplete="off" class="verificationForm regForm" method="POST">
					<div class="regFormHead">Profile</div>
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
						
						<div class="input-container-full col-2">
							<label>Price range</label>
							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="verify-txt-f dob-day" id="search_categories">
									  <option value="" selected="selected">From</option>
									   
									</select>
								 </div>
							 </div>

							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="dob-mth verify-txt-f" id="search_categories">
									  <option value="" selected="selected">To</option>
									   
									</select>
								 </div>
							 </div>

							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="dob-yr verify-txt-f" id="search_categories">
									  <option value="" selected="selected">Year</option>
									  <?php
										for($i = 1980; $i < 2020; $i++){
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									   ?>
									</select>
								 </div>
							 </div>

						</div>
					</div>
					<div class="form-field-wrapper">
						<div class="input-container-full">
							<label>&nbsp;</label>
							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="verify-txt-f gender" id="search_categories">
									  <option value="1" selected="selected">Property Type</option>
									   <option value="male">Female</option>
									   <option value="male">Male</option>
									</select>
								 </div>
							 </div>

						</div>
						<div class="input-container right col-3">
							<label>Place of birth</label>
							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="country verify-txt-f" id="search_categories">
									  <option value="" selected="selected">Country</option>
									   <?php
											$CI =& get_instance();
											$countries = $CI->get_countries();
											foreach($countries as $country => $value){
												echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
											}
									   ?>
									</select>
								 </div>

							 </div>

							<div class="search_categories">
								<div class="select">
								   <select name="search_categories" class="verify-txt-f states" id="search_categories">
										<option value="">State</option>
									</select>
								 </div>
							 </div>

							<input type="text" class="signupTxt verify-txt-f" disabled id="city" placeholder="City/Town">


						</div>
					</div>



					<div class="form-field-wrapper ">
						<div class="input-container left">
							<span>*</span>
							<input type="text" id="passport-number" class="signupTxt verify-txt-f" placeholder="Passport number (or drivers licence, voter's card)">

						</div>

					</div>
						<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
					<button style="cursor:pointer" id="verifyBut" class="verifyBut">Next</button>

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
<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>