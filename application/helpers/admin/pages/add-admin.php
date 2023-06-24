	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-user text-success">

						</i>

					</div>

					<div>

						Add Administrator	

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">			

			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">New Profile</h5>

					<?php //echo @$error; ?> <!-- Error Message will show up here -->

					<?php //echo @$success; ?> <!-- Error Message will show up here -->

					<?php //echo form_open_multipart('admin/admin_signup/'.$this->session->userdata('adminID').'');?>

					<form id="adminSignupForm" class="">



						<div class="position-relative row form-group"><label for="fname" class="col-sm-2 col-form-label">Firstname</label>

							<div class="col-sm-10"><input name="fname" id="fname" placeholder="Firstname" type="text" class="verify-txt form-control"></div>

						</div>

						<div class="position-relative row form-group"><label for="lname" class="col-sm-2 col-form-label">Lastname</label>

							<div class="col-sm-10"><input name="lname" id="lname" placeholder="Lastname" type="text" class="verify-txt form-control"></div>

						</div>

						<div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>

							<div class="col-sm-10"><input name="email" id="email" placeholder="Email" type="text" class="verify-txt form-control"></div>

						</div>

						<div class="position-relative row form-group"><label for="userAccess" class="col-sm-2 col-form-label">User Access</label>

							<div class="col-sm-10">

								<select name="select" id="userAccess" class="form-control verify-txt">

									<option value="">Select Option</option>

									<?php 

										foreach($adminPriv as $userprivilege => $value){

											echo '<option value="'.$value->accessID.'">'.$value->accessName.'</option>';

										}

									?>

								</select>

							</div>

						</div>

						

						<!--<div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Profile Image</label>

							<div class="col-sm-10"><input id='real-input' name='userfile' type="file" class="form-control-file">

								<small class="form-text text-muted">Select an image for the article (JPG, GIF or PNG format only)</small>

							</div>

						</div>-->



						<div class="position-relative row form-check">

							<div class="col-sm-10 offset-sm-2">

								<button id="add-admin-but" class="btn btn-primary">Submit</button>

							</div>

						</div>



					</form>

					</div>

				</div>

			</div>

		</div>

	</div>