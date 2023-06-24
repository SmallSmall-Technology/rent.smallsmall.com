	<div class="pane">

		<div class="pane-inner">

			<h1>Verify me</h1>

			<span class="breadcrumbs">Profile </span>

			<h5>Before you can rent with us we need to know who you are since this will be a long partnership. We do not share data with any 3rd party or government agency.</h5>

		</div>

	</div>

	<div class="item-pane">

		<div class="page-inner">

			<form id="profileVerification" autocomplete="off" class="verificationForm regForm" method="POST">

				<div class="regFormHead">Profile</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container left">

						<span>*</span>

						<input type="text" class="signupTxt verify-txt-f" id="first-name" placeholder="First Name">

					</div>

					<div class="input-container right">

						<span>*</span>

						<input type="text" class="signupTxt verify-txt-f" id="last-name" placeholder="Last Name">

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container left">

						<span>*</span>

						<input type="text" class="signupTxt verify-txt-f" id="email" placeholder="Email">

					</div>

					<div class="input-container right">

						<span>*</span>

						<input type="text" class="signupTxt verify-txt-f" id="phone" placeholder="Phone">

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container left">

						<label>&nbsp;</label>

						<span>*</span>

						<input type="text" class="signupTxt verify-txt-f" id="gross-pay" placeholder="Gross annual income">

					</div>

					<div class="input-container right col-3">

						<label>Date of birth</label>

						<div class="lineup-3">

							   <select name="search_categories" class="verify-txt-f dob-day" id="soflow">

								  <option value="" selected="selected">Day</option>

								   <option value="1">1</option>

								   <option value="2">2</option>

								   <option value="3">3</option>

								   <option value="4">4</option>

								   <option value="5">5</option>

								   <option value="6">6</option>

								   <option value="7">7</option>

								   <option value="8">8</option>

								   <option value="9">9</option>

								   <option value="10">10</option>

								   <option value="11">11</option>

								   <option value="12">12</option>

								   <option value="13">13</option>

								   <option value="14">14</option>

								   <option value="15">15</option>

								   <option value="16">16</option>

								   <option value="17">17</option>

								   <option value="18">18</option>

								   <option value="19">19</option>

								   <option value="20">20</option>

								   <option value="21">21</option>

								   <option value="22">22</option>

								   <option value="23">23</option>

								   <option value="24">24</option>

								   <option value="25">25</option>

								   <option value="26">26</option>

								   <option value="27">27</option>

								   <option value="28">28</option>

								   <option value="29">20</option>

								   <option value="30">30</option>

								   <option value="31">31</option>

								</select>

						 </div>

						

						<div class="lineup-3">

							   <select name="search_categories" class="dob-mth verify-txt-f" id="soflow">

								  <option value="" selected="selected">Month</option>

								   <option value="1">Jan</option>

								   <option value="2">Feb</option>

								   <option value="3">Mar</option>

								   <option value="4">Apr</option>

								   <option value="5">May</option>

								   <option value="6">Jun</option>

								   <option value="7">Jul</option>

								   <option value="8">Aug</option>

								   <option value="9">Sep</option>

								   <option value="10">Oct</option>

								   <option value="11">Nov</option>

								   <option value="12">Dec</option>

								</select>

						 </div>

						

						<div class="lineup-3">

						   <select name="search_categories" class="dob-yr verify-txt-f" id="soflow">

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

				<div class="form-field-wrapper overflow-div">

					<div class="input-container left col-2">

						<label>&nbsp;</label>

						<div class="lineup-2">

						   <select name="search_categories" class="verify-txt-f gender" id="soflow">

							  <option value="1" selected="selected">Gender</option>

							   <option value="male">Female</option>

							   <option value="male">Male</option>

							</select>

						 </div>					

						<div class="lineup-2">

						   <select name="search_categories" class="verify-txt-f marital-status" id="soflow">

							  <option value="" selected="selected">Marital status</option>

							   <option value="single">Single</option>

							   <option value="married">Married</option>

							   <option value="divorced">Divorced</option>

							   <option value="widowed">widowed</option>

							</select>

						 </div>

						

					</div>

					<div class="input-container right col-3">

						<label>Place of birth</label>

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

				</div>				

				

				<div class="form-field-wrapper ">
					
					<div class="input-container right">
						
						<input type="text" class="signupTxt verify-txt-f" disabled id="city" placeholder="City/Town">
					
					</div>

					<div class="input-container overflow-div left">

						<span>*</span>

						<input type="text" id="passport-number" class="signupTxt verify-txt-f" placeholder="Passport number (or drivers licence, voter's card)">						

					</div>

					

				</div>

					<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
				<div class="form-field-wrapper overflow-div">
					<button style="cursor:pointer" id="verifyBut" class="verifyBut">Next</button>

				</div>

				<!--<div class="form-field-wrapper">

					<div class="pp-container left">

						We value your privacy.<br />

						By signing up, you accept  our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>

					</div>

				</div>-->

			</form>

		</div>

	</div>

<script src="<?php echo base_url().'assets/js/furnisure-verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>