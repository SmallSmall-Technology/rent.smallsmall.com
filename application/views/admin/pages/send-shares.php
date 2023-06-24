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

						Send Buytolet Shares	

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">			

			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Fill details</h5>

					<form autocomplete="off" id="adminSendShares">
					    
					    <div class="position-relative row form-group">
					        <label for="new-user" class="col-sm-2 col-form-label">New User?</label>
					        <div class="col-sm-10"><input name="new-user" id="new-user" type="checkbox" checked class="form-check-input"></div>
					    </div>


						<div class="position-relative row form-group user-fields">
						    
						    <label for="fname" class="col-sm-2 col-form-label">Firstname</label>

							<div class="col-sm-10"><input name="fname" id="fname" placeholder="Firstname" type="text" class="form-control"></div>

						</div>

						<div class="position-relative row form-group user-fields">
						    
						    <label for="lname" class="col-sm-2 col-form-label">Lastname</label>

							<div class="col-sm-10"><input name="lname" id="lname" placeholder="Lastname" type="text" class="form-control"></div>

						</div>

						<div class="position-relative row form-group">
						    
						    <label for="email" class="col-sm-2 col-form-label">Email</label>

							<div class="col-sm-10"><input name="email" id="email" placeholder="Email" type="text" class="verify-txt form-control"></div>

						</div>

						<div class="position-relative row form-group user-fields">
						    
						    <label for="phone" class="col-sm-2 col-form-label">Phone</label>

							<div class="col-sm-10"><input name="phone" id="phone" placeholder="Phone" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group user-fields">
						    
						    <label for="company" class="col-sm-2 col-form-label">Company</label>

							<div class="col-sm-10"><input name="company" id="company" placeholder="Company name" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group user-fields">
						    
						    <label for="company-address" class="col-sm-2 col-form-label">Company address</label>

							<div class="col-sm-10"><input name="company-address" id="company-address" placeholder="Company address" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group user-fields"><label for="position" class="col-sm-2 col-form-label">Position</label>

							<div class="col-sm-10"><input name="position" id="position" placeholder="Position" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group user-fields"><label for="occupation" class="col-sm-2 col-form-label">Occupation</label>

							<div class="col-sm-10"><input name="occupation" id="occupation" placeholder="Occupation" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group user-fields"><label for="income" class="col-sm-2 col-form-label">Income</label>

							<div class="col-sm-10"><input name="income" id="income" placeholder="Income e.g 500000" type="text" class="form-control"></div>

						</div>
						
						<div class="position-relative row form-group"><label for="shares-amount" class="col-sm-2 col-form-label">Shares</label>

							<div class="col-sm-10"><input name="shares-amount" id="shares-amount" placeholder="Shares amount e.g 1 or 50" type="text" class="verify-txt form-control"></div>

						</div>
						
						<div class="position-relative row form-group"><label for="shares-amount" class="col-sm-2 col-form-label">Property</label>

							<div class="col-sm-10">
							    <div class="autocomplete">
                                    <input id="properties" type="text" name="properties" class="verify-txt form-control" placeholder="Start typing property name">
                                </div>
							</div>

						</div>
						
						<div class="position-relative row form-group"><label for="shares-amount" class="col-sm-2 col-form-label">Offer type</label>

							<div class="col-sm-10">
							    <select name="offer-type" id="offer-type" class="form-control verify-txt">

									<option value="">Select One</option>
                                    <option value="champions">Champions</option>
                                    <option value="free">Free offer</option>
								</select>
							</div>

						</div>

						<div class="position-relative row form-check">

							<div class="col-sm-10 offset-sm-2">

								<button id="send-but" class="btn btn-primary">Send Shares</button>

							</div>

						</div>



					</form>

					</div>

				</div>

			</div>

		</div>

	</div>
	<script src="<?php echo base_url('assets/js/load-properties.js'); ?>"></script>
	<script>
        autocomplete(document.getElementById("properties"), properties);
    </script> 