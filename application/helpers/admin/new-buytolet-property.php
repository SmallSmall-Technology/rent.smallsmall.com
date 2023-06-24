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
						Add Buy2Let Property						
					</div>
				</div>
				</div>
		</div> 
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Property Details</h5>
						<form id="newBuytoletForm">
							<div class="form-result"></div>
							<div class="position-relative form-group"><label for="propTitle" class="">Property Title</label><input name="propTitle" id="propTitle" placeholder="Title" type="text" class="form-control verify-field allFields"></div>
							
							<div class="position-relative form-group"><label for="propAddress" class="">Property Type</label>
								<select name="propType" id="propType" class="form-control allFields">
									<option value=""></option>
									<?php
										foreach($aptTypes as $aptType => $value){
											echo "<option value='".$value['id']."'>".$value['type']."</option>";
										}
									?>
								</select>
							</div>
							
							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress" placeholder="65, Admiralty way" type="text" class="form-control allFields">
							</div>
							<div class="form-row">
								<div class="col-md-2"><label for="country" class="">Country</label>
									<select name="country" id="country" class="country form-control verify-field allFields">
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
										<select name="states" id="states" class="states form-control verify-field allFields">
											<option value="">Select State</option>
											
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group"><label for="city" class="">City</label><input name="city" id="city" disabled type="text" class="form-control verify-field allFields"></div>
								</div>
								
								
							</div>
							
							<div class="position-relative form-group"><label for="propDesc" class="">Property Description</label>
								<textarea name="propDesc" class="propDesc" id="txtDefaultHtmlArea" class="form-control allFields" rows="8"></textarea>
							</div>
							
					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Finance </h5>
						<div>
							<div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="m-0 p-0">Finance Options</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
												<div class="card-body">
													<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group"><label for="price" class="">Enter Price</label><input name="price" id="price" placeholder="1000000" type="text" class="form-control allFields"></div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group"><label for="expected-rent" class="">Expected Rent</label><input name="expected-rent" id="expected-rent" placeholder="" type="text" class="form-control allFields"></div>
														</div>
													</div>
													
													<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="hpi-growth" class="">HPI Growth</label>
																<input name="hpi-growth" id="hpi-growth" type="text" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group">
															    <label for="mortgage-value" class="">Mortgage value</label>
															    <input name="mortgage-value" id="mortgage-value" placeholder="" type="text" class="form-control">
															</div>
														</div>
													</div>	
													
													<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group">
															    <label for="payment-plan" class="">Does this property have a payment plan?</label>
															    <select class="form-control payment-plan">
																	<option value="yes">Yes</option>
																	<option selected value="no">No</option>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group payment-plan-period-spc">
															    <label for="payment-plan-period" class="">Payment plan period</label>
															    
															    <select class="form-control payment-plan-period">
																	<option value="12">12 Months</option>
																	<option value="24">24 Months</option>
																</select>
															</div>
														</div>
													</div>
													
                                            	</div>
											</div>
                                        </div>
                                        <div class="card">
                                            <div id="headingTwo" class="b-radius-0 card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Amenities</h5></button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne2" class="collapse">
                                                <div class="card-body">
													<div class="form-row">
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="bed-number" class="">Bed</label>
																<input name="bed-number" id="bed-number" type="number" min="0" max="99" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group"><label for="bath-number" class="">Bath</label><input name="bath-number" id="bath-number" type="number" min="0" max="99" class="form-control"></div>
														</div>
													</div>			
													
													<div class="form-row">
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="tenentable" class="">Does this property have tenants?</label>
																<select class="form-control tenantable allFields">
																	<option value="yes">Yes</option>
																	<option value="no">No</option>
																</select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group"><label for="property-size" class="">Property Size</label><input name="property-size" id="property-size" placeholder="" type="text" class="form-control"></div>
														</div>
													</div>
													
													
                                            	</div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div id="headingThree" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Location</h5></button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne3" class="collapse">
                                                <div class="card-body">
													<div class="position-relative form-group"><label for="location-info" class="">Location Info</label>
														<textarea name="location-info" class="location-info form-control" rows="8"></textarea>
                                                </div>
                                            </div>
                                        </div>										
										
										<div class="card">
                                            <div id="headingFour" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Floor Plan</h5></button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne4" class="collapse">
                                                <div class="card-body">
													<div class="col-md-6"><div class="position-relative form-group"><label for="plan-image" class="">Plan Image</label><input name="plan-image" id="floor-plan" type="file" class="floor-plan form-control" /></div></div>
                                                </div>
                                            </div>
                                        </div>		
										<div class="card">
                                            <div id="headingSix" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseSix" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Images</h5></button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne6" class="collapse">
                                                <div class="card-body">
													<div class="file_drag_area" id="file_drag_area">
														Drop Files Here
													</div>
													<div id="uploaded_files">
														<label>Click to add Images</label>
														<input type="file" name='userfile[]' id="multipleUplFiles" class='multipleUplFiles' multiple />
													</div>
													<div id="uploaded_images">

													</div>
													<input type="hidden" name="foldername" id="foldername" class="folderName" value="" />							
													<input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="" />
												</div>
                                            </div>
                                        </div>
                                    </div>
								<button type="submit" id="newPropBut" class="mt-2 btn btn-primary">Upload Property</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-buytolet-image.js"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>