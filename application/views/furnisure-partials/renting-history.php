	<div class="pane">
		<div class="pane-inner">
			<h1>Renting History</h1>
			<span class="breadcrumbs">Profile > Renting history </span>
		</div>
	</div>
	<div class="item-pane">
		<div class="page-inner">
			<form id="rentingHistoryForm" autocomplete="off" class="verificationForm regForm" method="POST">
				<!--<div class="regFormHead">Profile</div>-->
				<div class="form-field-wrapper">
					<div class="input-container left">
						<label>Present Address</label>						
						<input type="text" class="signupTxt present_address verify-txt-f" placeholder="Address">
					</div>
					<div class="input-container right col-3">
						<label>&nbsp;</label>
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
				<div class="form-field-wrapper">
					<div class="input-container left">
						<label>Time spent at Previous address</label>
						<div class="search_categories">
							<div class="select">
							   <select name="search_categories" class="previous_rent_duration" id="previous_rent_duration">
								  <option value="1" selected="selected">1 Year</option>
								  <option value="2" >2 Years</option>
								  <option value="3" >3 Year</option>
								  <option value="4" >4 Year</option>
								  <option value="5" >5 Year</option>
								  <option value="6" >6 Year</option>
								  <option value="7" >7 Year</option>
								  <option value="8" >8 Year</option>
								  <option value="9" >9 Year</option>
								  <option value="10">10 Year</option>
								</select>
							 </div>
						 </div>
					</div>
					<div class="input-container right">
						
					</div>
				</div>
				<div class="form-field-wrapper">
					<div class="input-container left">
						<label>Current Accomodation status</label>
						<div class="search_categories">
							<div class="select">
							   <select name="search_categories" class="renting_status" id="renting_status">
								  <option value="Yes" selected="selected">Renting</option>
								  <option value="No">Not Renting</option>
								</select>
							 </div>
						 </div>
					</div>
					<div class="input-container right">
						<label>Any previous evictions</label>
						<div class="search_categories">
							<div class="select">
							   <select name="search_categories" class="previous_eviction" id="previous_eviction">
								  <option value="Yes" selected="selected">Yes</option>
								  <option value="No">No</option>
								</select>
							 </div>
						 </div>
						
					</div>
				</div>
				<div class="form-field-wrapper">
					<div class="input-container left">
						<label>Pets</label>
						<div class="search_categories">
							<div class="select">
							   <select name="search_categories" class="pet" id="pet">
								  <option value="Yes" selected="selected">Yes</option>
								  <option value="No">No</option>
								</select>
							 </div>
						 </div>
						
					</div>
					<div class="input-container right">
						<label>Any disability or have any critical illness?</label>
						<div class="search_categories">
							<div class="select">
							   <select name="search_categories" class="critical_illness" id="critical_illness">
								  <option value="Yes" selected="selected">Yes</option>
								  <option value="No" >No</option>
								</select>
							 </div>
						 </div>
						
					</div>
				</div>
				<div class="text-seperator">Present landlord or estate agent</div>
				<div class="form-field-wrapper">
					<div class="input-container left">
						<input type="text" id="landlord_full_name" class="signupTxt landlord_full_name verify-txt-f" placeholder="Full name">
					</div>
					<div class="input-container right col-2">
						<input type="text" class="signupTxt landlord_email" placeholder="Email">
						<input type="text" class="signupTxt landlord_phone verify-txt-f" placeholder="Telephone">
					</div>
				</div>
				<div class="form-field-wrapper">
					<div class="input-container left">
						<textarea class="textarea-field landlord_address verify-txt-f" rows="5" placeholder="Address"></textarea>
					</div>
				
					<div class="input-container right">
						<textarea class="textarea-field reason_for_leaving" rows="5" placeholder="Reason for leaving previous address"></textarea>
					</div>
				</div>
					<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
				<button class="verifyBut-left">Back</button>
				<button class="verifyBut-right rentingBut verifyBut" id="verifyBut-right">Next</button>
			</form>
		</div>
	</div>
<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>