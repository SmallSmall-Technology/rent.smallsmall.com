<div class="pane-banner">

		<div class="banner-title">

			Add Amenities & Images<br />

			<span class="small-banner-title">Rent your property to verified tenants</span>

		</div>

	</div>

	<div class="item-pane">

		<div class="pane-inner">

			<h1>Amenities</h1>

			<div class="page-inner-left">

				<form id="propAmenitiesForm" class="verificationForm regForm" method="POST" enctype="multipart/form-data">

					<!--<div class="regFormHead">Profile</div>-->

					<div class="form-field-wrapper">

						<div class="input-container-full col-2">

							<div class="lineup-2">
                                <label>Bathrooms</label>
							    <select class="verify-txt-f bath" id="soflow">

								  <option value="1">One</option>

								  <option value="2">Two</option>

								  <option value="3">Three</option>

								  <option value="4">Four</option>

								</select>

							</div>

							<div class="lineup-2">
                                <label>Toilet</label>
							    <select class="verify-txt-f toilet" id="soflow">

								  <option value="1">One</option>

								  <option value="2">Two</option>

								  <option value="3">Three</option>

								  <option value="4">Four</option>

								</select>

							 </div>	

						</div>

					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full">

							<label>Available amenities</label>	

							<div class="input-container left">

								<label class="container">

									<div class="label-text">Water</div>

									<input type="checkbox" value="Water" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Wardrobe</div>

									<input type="checkbox" value="Wardrobe" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Dining</div>

									<input type="checkbox" value="Dining" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Prepaid Meter</div>

									<input type="checkbox" value="prepaid-meter" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Pool</div>

									<input type="checkbox" value="pool" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Gen</div>

									<input type="checkbox" value="gen" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Security Gate</div>

									<input type="checkbox" value="security-gate" name="amenities" >

									<span class="checkmark"></span>

								</label>

							</div>

							<div class="input-container right">

								<label class="container">

									<div class="label-text">Wifi</div>

									<input type="checkbox" value="wifi" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Gym</div>

									<input type="checkbox" value="gym" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Basketball Court</div>

									<input type="checkbox" value="basketball-court" name="amenities" >

									<span class="checkmark"></span>

								</label>						

								<label class="container">

									<div class="label-text">Tennis Court</div>

									<input type="checkbox" value="tennis-court" name="amenities" >

									<span class="checkmark"></span>

								</label>

							</div>

						</div>
						
						<div class="form-field-wrapper">
                            
							<div class="input-container-full">
                                <label>Rental Condition</label>
								<textarea id="rental-condition" class="textarea-field verify-txt-f" rows="5" placeholder="Rental Condition"></textarea>

							</div>

						</div>
						<div class="form-field-wrapper">

							<div class="input-container-full">
								<label>Please leave your contact name and phone number, let us know when we can visit the property.</label>
								<textarea id="details" class="textarea-field verify-txt-f" rows="5" placeholder="landlord-details"></textarea>

							</div>

						</div>

					</div>

					<div class="form-field-wrapper">

						<div class="input-container-full-2">
							<div style="font-family:avenir-regular;font-size:12px;width:100%;min-height:10px;overflow:auto;margin-bottom:8px;color:#00CDA6;">Select multiple files for upload</div>
							 

						   <div class="profile-img-change-container button-wrap"> 
								<label style="display:inline-block" for="userfile" class="new-button"> Select Picture</label>
								<input style="color:#03100D;" type="file" name="userfile[]" id="userfile" multiple class="the-profile-pic" /> 
							</div>
	

						</div>
					

					</div>		

						<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->

					<button type="submit" class="verifyBut">Finish</button>

					</form>

					<!--<div class="form-field-wrapper">

						<div class="pp-container left">

							We value your privacy.<br />

							By signing up, you accept  our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>

						</div>

					</div>-->

				

			</div>

			<div class="page-inner-right">

								

			</div>

		</div>

	</div>
<div class="sendAgainOverlay">
	<div class="sendAgainModal">
		<div class="s_modal_close"><i class="fa fa-times"></i></div>
		<div class="s_modal_title">Property Upload Successful!</div>
		<div class="s_modal_note"> 
			Thank you for filling our verification form! You are a step closer to renting with us.   
		</div>
		<div class="s_modal_icon">
			<img src="<?php echo base_url().'assets/img/prop-upload-icn.png'; ?>" />
		</div>
		<div class="s_modal_do" id="close_modal">Close</div>
	</div>
</div>
<script src="<?php echo base_url().'assets/js/add-property.js' ?>"></script>