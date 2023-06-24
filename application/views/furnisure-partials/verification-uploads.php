	<div class="pane">

		<div class="pane-inner">

			<h1>Upload files</h1>

			<span class="breadcrumbs">Profile > Employment > File upload</span>

			<h5>

				Our final stage of your verification process requires you share you bank details for us to ascertain you can maintian rental payment of our property.

			</h5>

		</div>

	</div>

	<div class="item-pane overflow-div">

		<div class="page-inner overflow-div">

			<form id="uploadForm" class="verificationForm regForm" method="POST" enctype="multipart/form-data">

				<!--<div class="regFormHead">Profile</div>-->

				<div class="form-field-wrapper overflow-div">

					<div class="input-container overflow-div left">

						<label>Valid ID ( Intl. passport, Driver’s license or National ID only )</label>

						<div class="disclaimer">Accepted file types: JPG, JPEG, PNG, GIF, PDF</div>

						

						<div class="dropzone js" id="dropzone-id">

							<div class="box" id="box-id">

								<input type="file" name="file-5" id="file-5" class="inputfile inputfile-4 identification-inp" data-multiple-caption="{count} files selected" />

								<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>

							</div>

												

						</div>	

						<div class="file-name">

							<div id="id-fileName" class="fileName"></div>

						</div>

						<div class="progress" id="id-progress">

							<div class="meter">

								<div id="id-meter-text" class="meter-text"></div>

								<span id="id-progress-bar" style="width:0%"></span>

							</div>

							<div class="cancel-upload" id="id-cancel"><i class="fa fa-times"></i></div>

						</div>

					</div>

					<div class="input-container overflow-div right">

						<label>Bank statement</label>

						<div class="disclaimer">Accepted file types: JPG, JPEG, PNG, GIF, PDF</div>

						<div class="dropzone js" id="dropzone-bank">

							<div class="box" id="box-statement">

								<input type="file" name="file-6" id="file-6" class="inputfile inputfile-4 statement-inp" data-multiple-caption="{count} files selected"  />

								<label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>

							</div>								

						</div>							

						<div class="file-name">

							<div id="statement-fileName" class="fileName"></div>

						</div>

						<div class="progress" id="statement-progress">

							<div class="meter">

								<div class="meter-text" id="statement-meter-text"></div>

								<span id="statement-progress-bar" style="width:0%"></span>

							</div>

							<div class="cancel-upload" id="bank-cancel"><i class="fa fa-times"></i></div>					

						</div>

					</div>

					

					<div class="input-container overflow-div left">

						<label class="container">

							<div for="terms-use-link" class="label-text">I agree that the submission of this information does not guarantee that RentSmallSmall will offer this property to me and that RentSmallSmall may reject the application without giving any reasons. [ Term of Use link ]</div>

						  	<input name="terms-use-link" type="checkbox" checked="checked">

						  	<span class="checkmark"></span>

						</label>

						

						<label class="container">

							<div class="label-text">I have read and agreed to the [ Tenancy terms ], and a personalized copy will be sent to me via email before I move into the property.</div>

						  	<input name="tenancy-term" type="checkbox" checked="checked">

						  	<span class="checkmark"></span>

						</label>

						

					</div>

					<div class="input-container overflow-div right">

						

					</div>

					<input type="hidden" id="userID" value="<?php echo @$userID; ?>" />

					<input type="hidden" id="statement" value="" />

					<input type="hidden" id="idcard" value="" />

				</div>

				

					<!--<div class="forgot-pass"><a href="#">Forgot password?</a></div>-->
				<div class="form-field-wrapper overflow-div">
					<button class="verifyBut-left">Back</button>

					<button type="submit" class="verifyBut-right verifyBut" id="verifyBut-right">Submit</button>

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

<!--<script>

	$('.verifyBut').css("background", "#CCC");

</script>-->

<script src="<?php echo base_url().'assets/js/furnisure-verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/upload-verification-file.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/custom-file-input.js' ?>"></script>