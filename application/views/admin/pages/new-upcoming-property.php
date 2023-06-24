<script src="<?php echo base_url(); ?>assets/js/select-featured-picture.js"></script>	

<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-home text-success">

						</i>

					</div>

					<div>

						Add Property						

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">

			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Property Details</h5>

						<form method="POST" autocomplete="off" id="newPropForm" enctype="multipart/form-data">

							<div class="form-result"></div>

							<div class="position-relative form-group"><label for="propTitle" class="">Property Title</label><input name="propTitle" id="propTitle" placeholder="Title" type="text" class="form-control verify-field"></div>

							<div class="form-row">
								<div class="col-md-6">

									<label for="propType" class="">Property Type</label>

									<select name="propType" id="propType" class="form-control verify-field">

										<option>Select</option>

										<?php

											foreach($aptTypes as $aptType => $value){												

												echo "<option value='".$value['id']."'>".$value['type']."</option>";					

											}

										?>

									</select>
								</div>
								<div class="col-md-6">

									<label for="services" class="">Services</label>

									<select name="services" id="services" class="form-control verify-field">

										<option>Select</option>

										<?php

											foreach($services as $service => $val){												

												echo "<option value='".$val['id']."'>".$val['services']."</option>";					

											}

										?>

									</select>
								</div>
							</div>
							<p></p>
							<div class="position-relative form-group">
								<label for="suitable-for" class="">Tenant Type</label>
								<div class="form-row">
									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="suitable-for[]" value="Male">Male</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="suitable-for[]" value="Female">Female</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="suitable-for[]" value="Family"> Family</label></div></div>

									</div>
								
									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="suitable-for[]" value="Corporate">Corporate</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="suitable-for[]" value="Other"> Other</label></div></div>

									</div>
								</div>
								<!--<select name="suitable-for" id="suitable-for" class="suitable-for form-control verify-field">

									<option value="">Select Option</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Family">Family</option>
									<option value="Corporate">Corporate</option>
									<option value="Other">Other</option>
								</select>-->
							</div>

							

							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress" placeholder="65, Admiralty way" type="text" class="form-control">

							</div>

							<div class="form-row">

								<div class="col-md-2"><label for="country" class="">Country</label>

									<select name="country" id="country" class="country form-control verify-field">

										<option value="">Select Country</option>

										<?php

											foreach($countries as $country => $country_item){
																									
												echo "<option value='".$country_item['id']."'>".$country_item['name']."</option>";												
											}

										?>

									</select>

								</div>

								<div class="col-md-4">

									<div class="position-relative form-group"><label for="state" class="">State</label>

										<select name="states" id="states" class="states form-control verify-field">

											<option value="">Select State</option>
														

										</select>

									</div>
								</div>

								<div class="col-md-6">

									<div class="position-relative form-group"><label for="city" class="">City</label><input name="city" id="city" disabled type="text" class="form-control verify-field"></div>

								</div>
							</div>
                            <div class="form-row">

								<div class="position-relative form-group"><label for="monthly-price" class="">Enter Price</label><input name="monthly-price" id="monthly-price" placeholder="1000000" value="" type="text" class="form-control"></div>
                    	    </div>
                    	    <button name="newPropBut" id="newPropBut" class="mt-2 btn btn-primary">Upload Property</button>
                    	    
                    	    </form>
					</div>

				</div>

				

					</div>

				</div>

			</div>

		</div>

	</div>


<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>