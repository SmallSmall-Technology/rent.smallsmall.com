<div class="pane-banner">

		<div class="banner-title">

			Add Your Property<br />

			<span class="small-banner-title">Rent your property to verified tenants</span>

		</div>

	</div>

	<div class="item-pane">

		<div class="pane-inner">

			<div class="page-inner-left">

				<form id="addPropForm" autocomplete="off" class="verificationForm regForm" method="POST">

					<!--<div class="regFormHead">Profile</div>-->

					<div class="form-field-wrapper">

						<div class="input-container-full">

							<span>*</span>

							<input type="text" id="property_name" class="signupTxt verify-txt-f" placeholder="Property Name">

						</div>

					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full">

							<span>*</span>  

							<input type="text" id="address" class="signupTxt verify-txt-f" placeholder="Address">

						</div>

					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full">

							<span>*</span> 

							<textarea id="property_description" class="textarea-field verify-txt-f" rows="5" placeholder="Description"></textarea>

						</div>

					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full">

							<span>*</span>

							<input type="text" id="email" class="signupTxt verify-txt-f" placeholder="Email Address">

						</div>

					</div>

					<div class="form-field-wrapper">						

						<div class="input-container-full">

							<select name="search_categories" class="propType verify-txt-f" id="soflow">

							   <option value="">Property Type</option>

							   <?php if(isset($propTypes) && !empty($propTypes)){ ?>

									<?php foreach($propTypes as $propType => $value){ ?>

										<option value="<?php echo $value['id']; ?>" selected="selected"><?php echo $value['type']; ?></option>

									<?php } ?>

								<?php } ?>

							</select>

						</div>

					</div>
					
					<div class="form-field-wrapper col-2">

						<div class="lineup-2">

						   <select name="search_categories" class="country verify-txt-f" id="soflow">

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

						<div class="lineup-2">

						   <select name="search_categories" class="verify-txt-f states" id="soflow">

								<option value="">State</option>

							</select>

						 </div>
					</div>
					<div class="form-field-wrapper">
						
							<input type="text" class="signupTxt verify-txt-f city" disabled id="city" placeholder="City/Town">
						
					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full">							

						   <select name="rent_type" class="rent_type" id="soflow">

							  	<option value="" selected="selected">Type of renting</option>
							   
							   	<option value="family" >Family</option>

							   <?php if(isset($rentTypes) && !empty($rentTypes)){ ?>

									<?php foreach($rentTypes as $rentType => $r_type){ ?>									   			

										<option value="<?php echo $r_type['id']; ?>"><?php echo $r_type['rent_type']; ?></option>

										

									<?php } ?>

								<?php } ?>

							</select>

						</div>

					</div>

					

					<div class="form-field-wrapper">

						<div class="input-container-full col-3">

							<div class="lineup-3">

							   <select name="search_categories" class="verify-txt-f furnishing" id="soflow">

								  <option value="No Furnishing" selected="selected">No Furnishing</option>

								  <option value="Partially Furnished" >Partially Furnished</option>

								  <option value="Fully Furnished">Fully Furnished</option>

								</select>

							 </div>

							<div class="lineup-3">

							   <select name="search_categories" class="verify-txt-f services" id="soflow">

								  <option value="1" selected="selected">Services</option>

								</select>

							 </div>



							<div class="lineup-3">

								<select name="search_categories" class="verify-txt-f bed" id="soflow">

									<option value="">Bed</option>

									<option value="1">One</option>

									<option value="2">Two</option>

									<option value="3">Three</option>

									<option value="4">Four</option>

								</select>
								
							 </div>

						</div>

					</div>

					

						<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->

					<button type="submit" class="verifyBut">Next</button>



					<!--<div class="form-field-wrapper">

						<div class="pp-container left">

							We value your privacy.<br />

							By signing up, you accept  our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>

						</div>

					</div>-->

				

			</div>

			<div class="page-inner-right">

				<div class="price-container">

					<div class="price-container-title">Base rent</div>

					

					<div class="form-field-wrapper">

						<div class="base-txtf-container">

							<span>&#x20A6;</span>

							<input type="text" class="base_rent_side verify-txt-f" id="base_rent" >

						</div>

					</div>

					

					<div class="price-container-title">Service charge</div>

					

					<div class="form-field-wrapper">

						<div class="base-txtf-container">

							<span>&#x20A6;</span>

							<input type="text" class="base_rent_side verify-txt-f" id="service_charge" >

						</div>

					</div>

					

					<div class="form-field-wrapper">					

					   <select style="background:#FFF" name="search_categories" class="payment_plan bg-white verify-txt-f soflow" id="payment_plan">

						   <option value="" selected="selected">Payment Plan</option>
						   <option value="flexible">Flexible</option>
						   <option value="upfront">Upfront</option>

						</select>

					</div>

				</div>

				

				</form>

			</div>

		</div>

	</div>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/add-property.js' ?>"></script>