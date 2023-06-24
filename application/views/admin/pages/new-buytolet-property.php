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
						<form id="newBuytoletForm" method="POST">
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
							<div class="form-row">
								<div class="col-md-6">
    								<div class="position-relative form-group">
    									<label for="construction-level" class="">Construction Level</label>
    									<select name="construction-level" class="form-control construction-level">
    									    <option selected value="">Select</option>
    										<option value="Ongoing">Ongoing Project</option>
    										<option value="Off Plan">Off Plan Project</option>
    										<option value="Completed">Completed Project</option>
    									</select>
    								</div>
							    </div>
							    <div class="col-md-3">
    								<div class="position-relative form-group">
    									<label for="start-date" class="">Start Date</label>
    									<input disabled autocomplete="off" class="form-control start-date" name="start-date" id="start-date" />
    								</div>
							    </div>
							    <div class="col-md-3">
    								<div class="position-relative form-group">
    									<label for="finish-date" class="">Finish Date</label>
    									<input disabled autocomplete="off" class="form-control finish-date" name="finish-date" id="finish-date" />
    								</div>
							    </div>
							</div>
							<div id="construction-status-panel" class="position-relative form-group construction-status-panel">
								<div class="position-relative form-group">
									<label for="construction-status" class=""> Construction status</label>
									<input autocomplete="off" class="form-control construction-status" name="construction-status" id="construction-status" />
								</div>
							</div>
							<div class="position-relative form-group">
								<div class="position-relative form-group">
									<label for="investment-type" class=""> Select Investment type</label>
									<select name="investment-type" class="form-control investment-type">
										<?php
    										foreach($investTypes as $investType => $value){
    											echo "<option value='".$value['id']."'>".$value['type']."</option>";
    										}
    									?>
									</select>
								</div>
							</div>
							<div class="position-relative form-check"><input name="featuredProp" id="featuredProp" type="checkbox" class="form-check-input" value="1"><label for="featuredProp" class="form-check-label">Is this a featured property?</label></div>
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
													<div class="position-relative form-group">
													    <label for="marketValue" class="">Market value</label>
										                <input name="marketValue" id="marketValue" placeholder="20000000" type="text" class="form-control allFields">
										            </div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
													    <label for="outright-discount" class="">Outright Discount</label>
													    <input name="outright-discount" id="outright-discount" placeholder="20000000" type="text" class="form-control allFields">
													</div>
												</div>
											</div>
										    
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group"><label for="price" class="">Property Price</label><input name="price" id="price" placeholder="1000000" type="text" class="form-control allFields"></div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group"><label for="expected-rent" class="">Guaranteed Rent</label><input name="expected-rent" id="expected-rent" placeholder="" type="text" class="form-control allFields"></div>
												</div>
											</div>

											<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="asset-appreciation-1" class="">1-4 Yr Asset Appreciation (%)</label>
																<input name="asset-appreciation-1" id="asset-appreciation-1" type="text" class="form-control" >
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="asset-appreciation-2" class="">5-9 Yr Asset Appreciation (%)</label>
																<input name="asset-appreciation-2" id="asset-appreciation-2" type="text" class="form-control" >
															</div>
														</div>
													</div>	
													<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="asset-appreciation-3" class="">10 - 14 Yr Asset Appreciation (%)</label>
																<input name="asset-appreciation-3" id="asset-appreciation-3" type="text" class="form-control" >
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="asset-appreciation-4" class="">16 - 19 Yr Asset Appreciation (%)</label>
																<input name="asset-appreciation-4" id="asset-appreciation-4" type="text" class="form-control" >
															</div>
														</div>
													</div>
													<div class="form-row">
														
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="asset-appreciation-5" class="">20th Yr Asset Appreciation (%)</label>
																<input name="asset-appreciation-5" id="asset-appreciation-5" type="text" class="form-control" >
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
                                                    <div class="position-relative form-group"><label for="promo_price" class="">Promo Price</label>
                                                    <input name="promo_price" id="promo_price" placeholder="1000000" type="text" class="form-control allFields"></div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="promo_category" class="">Promo Applicable Category</label>
														<select class="form-control promo_category">
															<option value="">Select Finance Option</option>
															<option value="all">All</option>
															<option value="cash-finance">Cash Finance</option>
															<option selected value="mortgage-finance">Mortgage Finance</option>
															<option value="payment-plan">Payment Plan</option>
														</select>
													</div>
												</div>
												
											</div>
											<div class="position-relative form-group">
												<div class="position-relative form-group">
													<label for="payment-plan" class="">Does this property have a payment plan?</label>
													<select class="form-control payment-plan">
														<option value="yes">Yes</option>
														<option selected value="no">No</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group payment-plan-period-spc">
														<label for="minimum-payment-plan-value" class="">Minimum Payment Plan (%)</label>
														<input name="minimum-payment-plan-value" id="minimum-payment-plan-value" placeholder="" type="text" class="form-control">
													</div>
												</div>

                                                <div class="col-md-6">
													<div class="position-relative form-group payment-plan-period-spc">
														<label for="payment-plan-period" class="">Payment plan period</label>

														<select class="form-control payment-plan-period">
															<option selected value="12">1 Year</option>
															<option value="24">2 Years</option>
															<option value="36">3 Years</option>
															<option value="48">4 Years</option>
															<option value="60">5 Years</option>
															<option value="72">6 Years</option>
														</select>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="card">
									<div id="headingTen" class="b-radius-0 card-header">
										<button type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="false" aria-controls="collapseTen" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Co-Own Options</h5></button>
									</div>
									<div data-parent="#accordion" id="collapseOne10" class="collapse">
										<div class="card-body">
										    
										    <div class="form-row">
														
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-1" class="">1st Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-1" type="text" class="form-control" >
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-2" class="">2nd Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-2" type="text" class="form-control" >
    												</div>
    											</div>
    										</div>	
    										<div class="form-row">
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-3" class="">3rd Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-3" type="text" class="form-control" >
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-4" class="">4th Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-4" type="text" class="form-control" >
    												</div>
    											</div>
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-5" class="">5th Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-5" type="text" class="form-control" >
    												</div>
    											</div>
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-6" class="">6th Yr Asset Appreciation (%)</label>
    													<input name="co-appr[]" id="co-appr-6" type="text" class="form-control" >
    												</div>
    											</div>
    										</div>
    										
    								        <div class="form-row">
														
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-appr-1" class="">1st Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-1" type="text" class="form-control" >
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-rent-2" class="">2nd Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-2" type="text" class="form-control" >
    												</div>
    											</div>
    										</div>	
    										<div class="form-row">
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-rent-3" class="">3rd Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-3" type="text" class="form-control" >
    												</div>
    											</div>
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-rent-4" class="">4th Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-4" type="text" class="form-control" >
    												</div>
    											</div>
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-rent-5" class="">5th Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-5" type="text" class="form-control" >
    												</div>
    											</div>
    											
    											<div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="co-rent-6" class="">6th Yr Rent (%)</label>
    													<input name="co-rent[]" id="co-rent-6" type="text" class="form-control" >
    												</div>
    											</div>
    										</div>
										    
										    
										    
										    
										    <div class="form-row">
										        <div class="col-md-6">
    												<div class="position-relative form-group">
    													<label for="payment-plan" class="">Hold period</label>
    													<select id="hold-period" class="form-control hold-period allFields">
    														<option value="Free hold">Free Hold</option>
    														<option value="One year">One year</option>
    														<option value="Two years">Two years</option>
    														<option value="Three years">Three years</option>
    														<option value="Four years">Four years</option>
    														<option value="Five years">Five years</option>
    														<option value="Six years">Six years</option>
    													</select>
    												</div>
    											</div>
    											<div class="col-md-6">
                    								<div class="position-relative form-group">
                    									<label for="maturity-date" class="">Maturity Date</label>
                    									<input autocomplete="off" class="form-control maturity-date" name="maturity-date" id="maturity-date" />
                    								</div>
                							    </div>
												
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="pool-buy" class="">Turn on buy pool</label>
														<select class="form-control pool-buy allFields">
															<option value="yes">Yes</option>
															<option selected="selected" value="no">No</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group"><label for="pooling-units" class="">Units available</label><input name="pooling-units" id="pooling-units" type="number" min="0" class="form-control"></div>
												</div>
											</div>
											
                                            <div class="form-row">
                                                <div class="col-md-6">
												    <div class="position-relative form-group">
													<label for="payment-plan" class="">Percentage per share</label>
													<input name="pps" id="pps" placeholder="" type="text" class="form-control allFields">
													</div>
												</div>
												<div class="col-md-6">
                    								<div class="position-relative form-group">
                    									<label for="maturity-date" class="">Closing Date</label>
                    									<input autocomplete="off" class="form-control closing-date" name="closing-date" id="closing-date" />
                    								</div>
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
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="toilet-number" class="">Toilet</label>
														<input name="toilet-number" id="toilet-number" type="number" min="0" max="99" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
                                                    <div class="position-relative form-group">
														<label for="floor-level" class="">Floor</label>
														<input name="floor-level" id="floor-level" type="number" min="0" max="99" class="form-control">
													</div>
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
<script>
    $(function () {
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        
        /*var dayOfTheWeek = new Date().getDay();
        
        var disabledDays = [1];
        
        if(dayOfTheWeek == 6 || dayOfTheWeek == 0){
            
            disabledDays = [0, 1, 6];
            
        }*/
        
        $('#start-date').datetimepicker({ 
            format: 'DD-MM-YYYY'
            /*daysOfWeekDisabled: disabledDays,
            disabledDates: [
                moment("03/29/2021"), "03/30/2021 00:53"
            ]*/
        });
        $('#finish-date').datetimepicker({ 
            format: 'DD-MM-YYYY'
        });
        $('#maturity-date').datetimepicker({ 
            format: 'DD-MM-YYYY'
        });
        
        $('#closing-date').datetimepicker({ 
            format: 'DD-MM-YYYY'
        });
    });
</script>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-buytolet-image.js"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>
<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>