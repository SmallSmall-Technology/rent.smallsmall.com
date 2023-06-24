	<div class="pane">

		<div class="pane-inner">

			<h1>Employment</h1>

			<span class="breadcrumbs">Profile > Basic Profile > Employment </span>

		</div>

	</div>

	<div class="item-pane">

		<div class="page-inner overflow-div">

			<form id="employmentForm" class="verificationForm regForm" method="POST">

				<!--<div class="regFormHead">Profile</div>-->

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<label>&nbsp;</label>

					    <select name="search_categories" class="employment_status verify-txt-f" id="soflow">

						  <option value="Employed" selected="selected">Employed</option>

						  <option value="Unemployed" >Unemployed</option>

						</select>

					</div>

					<div class="input-container overflow-div right">

						<label>&nbsp;</label>

						<input type="text" class="signupTxt job_title verify-txt-f" placeholder="Occupation/Job Title">

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<label>&nbsp;</label>

						<input type="text" class="signupTxt company_name verify-txt-f" placeholder="Company Name">						

					</div>

					<div class="input-container overflow-div right">

						<label>&nbsp;</label>

						<input type="text" class="signupTxt manager_hr_name verify-txt-f" placeholder="HR Manager's Name">

						

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<label>&nbsp;</label>						

						<input type="text" class="signupTxt manager_hr_email verify-txt-f" placeholder="Email Address">

					</div>

					<div class="input-container overflow-div right">

						<label>&nbsp;</label>

						<input type="text" class="signupTxt manager_hr_phone verify-txt-f" placeholder="Phone">

						

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<label>&nbsp;</label>						

						<textarea class="textarea-field company_address verify-txt-f" rows="5" placeholder="Company address"></textarea>

					</div>

					<div class="input-container overflow-div right">

						<label>&nbsp;</label>

						

					</div>

				</div>

				

				<div class="text-seperator">Guarantor</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<input type="text" class="signupTxt guarantor_name verify-txt-f" placeholder="Full name/Relationship">

					</div>

					<div class="input-container overflow-div right col-2">

						<input type="text" class="signupTxt guarantor_email verify-txt-f" placeholder="Email">

						<input type="text" class="signupTxt guarantor_phone verify-txt-f" placeholder="Telephone">

					</div>

				</div>

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<textarea class="textarea-field guarantor_job_title verify-txt-f" rows="5" placeholder="Occupation, Job Title"></textarea>

					</div>

				

					<div class="input-container overflow-div right">

						<textarea class="textarea-field guarantor_address verify-txt-f" rows="5" placeholder="Address"></textarea>

					</div>

				</div>

					<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
				<div class="form-field-wrapper overflow-div">
					<button class="verifyBut-left">Back</button>

					<button class="verifyBut-right verifyBut" id="verifyBut-right">Next</button>
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