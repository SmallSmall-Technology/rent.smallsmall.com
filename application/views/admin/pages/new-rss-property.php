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

						Add New Property						

					</div>

				</div>

				</div>

		</div> 
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                    <span>New Property</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                    <span>Upcoming Property</span>
                </a>
            </li>
        </ul>
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


							<div class="position-relative form-group"><label for="propDesc" class="">Property Description</label>
								<!--<textarea name="propDesc" id="exampleText" class="form-control verify-field"></textarea>-->   
								<textarea name="propDesc" id="txtDefaultHtmlArea" class="form-control propDesc" rows="8"></textarea>

							</div>

							<div class="position-relative form-group">
								<label for="availableFrom" class="">Available From</label>
								<div class="position-relative input-group">
									
									<input name="availableFrom" id="availableFrom" type="date" class="form-control">
									<div class="input-group-prepend">
										<span class="input-group-text">YYYY-MM-DD</span>
									</div>

								</div>
							</div>
							
							<div class="form-row">
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="newProp" id="newProp" type="checkbox" class="form-check-input"><label for="newProp" class="form-check-label">Check if property is new</label></div>
							    </div>
							    
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="featuredProp" id="featuredProp" type="checkbox" class="form-check-input" value="1"><label for="featuredProp" class="form-check-label">Is this a featured property?</label></div>
							    </div>
							    
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="premiumProp" id="premiumProp" type="checkbox" class="form-check-input" value="1"><label for="premiumProp" class="form-check-label">Is this a premium property?</label></div>
							    </div>
							    
							</div>
							
					</div>

				</div>

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Settings</h5>

						<div>

							<div id="accordion" class="accordion-wrapper mb-3">

                                        <div class="card">

                                            <div id="headingOne" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">

                                                    <h5 class="m-0 p-0">General</h5>

                                                </button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">

												<div class="card-body">

														<div class="position-relative form-group"><label for="monthly-price" class="">Enter Price</label><input name="monthly-price" id="monthly-price" placeholder="1000000" value="" type="text" class="form-control"></div>

														<!---</div>

													</div>--->

													<div class="position-relative form-group"><label for="payment-plan" class="">Payment Plan</label><select name="payment-plan" id="payment-plan" class="payment-plan form-control">

                                                        <option></option>

                                                        <option value="flexible">Flexible</option>

                                                        <option value="upfront">Upfront</option>

                                                    </select></div>

													

													<div class="form-row">

														<div class="col-md-6">

															<div class="position-relative form-group"><label for="pay-interval" class="">Payment Interval</label><select name="pay-interval" id="pay-interval" class="form-control">

																<option></option>
																
																	<option value="Monthly">Monthly</option>						
															
																	<option value="Quarterly">Quarterly</option>
																
																	<option value="Bi-annually">Bi-annually</option>
																
																	<option value="Upfront">Upfront</option>
																

															</select></div>
														</div>

														<div class="col-md-6">

															<div class="chosen-options payment-interval-options">
															
																	
															</div>

															<input type="hidden" name="payment-int-txt[]" id="payment-int-txt" class="payment-int-txt" value="" />

														</div>

													</div>

													<div class="form-row rent-freq-row">

														<div class="col-md-6">

															<div class="position-relative form-group"><label for="rent-freq" class="">Rent Frequency</label><select name="rent-freq" id="rent-freq" class="rent-freq form-control">

																<option></option>
																
																	<option value="1">One Month</option>
																
																	<option value="3">Three Months</option>
																
																	<option value="6">Six Months</option>
																
																	<option value="9">Nine Months</option>
																
																	<option value="12">Twelve Months</option>							

															</select></div>

														</div>

														<div class="col-md-6">

															<div class="chosen-options payment-frequency-options">
															
															</div>

															<input type="hidden" name="rent-freq-txt[]" class="rent-freq-txt" value="" />

														</div>

													</div>

													<div class="form-row">

														<div class="col-md-6">

															<div class="position-relative form-group"><label for="security-deposit" class="">Security Deposit</label><input name="security-deposit" id="security-deposit" placeholder="" type="text" class="form-control"></div>

														</div>

														<div class="col-md-6">

															<div class="position-relative form-group">
															    
															    <label for="security-deposit-term" class="">Security Deposit Term</label>
															    
															    <select name="security-deposit-term" id="security-deposit-term" class="form-control">
															        
<<<<<<< HEAD
                            										<option selected="selected" value="1">One Month</option>
															        
                            										<option value="2">Two Month</option>
=======
                            										<option selected="selected" value="1">One month</option>
															        
                            										<option value="2">Two months</option>

																	<option value="3">Upfront 25 / 30</option>

																	<option value="4">One month with SD</option>
>>>>>>> 957cfdaf36b5e9631ff69236967b891029cf90a2
                            
                            									</select>
															</div>

														</div>

													</div>											
                                                    <div class="position-relative form-group"><label for="prop_manager" class="">Property managed by</label><select name="prop_manager" id="prop_manager" class="prop_manager form-control">
                                                    <?php
                                                        foreach($prop_managers as $prop_manager => $manager_item){
                										    echo "<option value='".$manager_item['id']."'>".$manager_item['manager']."</option>";												
                										}
                
                									?>

                                                    </select>
                                                    </div>
                                                    <div class="form-row">
														<div class="col-md-6"><label for="service-charge" 			class="">Service charge</label>
															<input name="service-charge" id="service-charge" placeholder="" type="text" class="form-control" value="0">
														</div>

														<div class="col-md-6">

															<div class="position-relative form-group">
															    
															    <label for="service-charge-term" class="">Service Charge Term</label>
															    
															    <select name="service-charge-term" id="service-charge-term" class="form-control">
															        
										<option selected="selected" value="1">Monthly</option>
                            										<option  value="3">Quarterly</option>
															        
                            										<option value="6">Bi-annually</option>

																	<option value="12">Upfront</option>
                            
                            									</select>
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

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="water">Water</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="wardrobe">Wardrobe</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="dining"> Dining</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="prepaid-electricity">Prepaid Electricity</label></div></div>

														</div>

													</div>

													

													<div class="form-row">

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="security-gate">Security Gate</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="pool">Pool</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="gym">Gym</label></div></div>

														</div>
														
														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="furniture">Furniture</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="wifi">WIFI</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" value="generator">Gen</label></div></div>

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

																<label for="furnishing" class="">Furnishing</label>

																<select name="furnishing" id="furnishing" class="furnishing form-control">
                                                                    <?php 
                                                                        foreach($furnishings as $furnishing => $value){	
                                                                            
                                                                            if($value['type'] != 0){
                                                                                
                            												    echo "<option value='".$value['type']."'>".$value['name']."</option>";
                            												    
                                                                            }
                            
                            											}
                                                                    ?>
																</select>

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

													Location

                                                </div>

                                            </div>

                                        </div>

										<div class="card">

                                            <div id="headingFour" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Property Extra Note</h5></button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne4" class="collapse">

                                                <div class="card-body">

				 									<div class="position-relative form-group"><label for="propNote" class="">Property Note</label>

														<textarea name="propNote" id="txtDefaultHtmlArea" class="propNote form-control" rows="8"></textarea>

													</div>

                                                </div>

                                            </div>

                                        </div>

								

									    <div class="card">

                                            <div id="headingFive" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false" aria-controls="collapseFive" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Neighborhood</h5></button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne5" class="collapse">

                                                <div class="card-body">													

													<div class="form-row element" id="div_0">

														<div class="new-facility mb-2 mr-2 btn-transition btn btn-outline-primary">New Facility</div>

													</div>

													

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
														<label>Click to upload file(s)</label>
														<input type="file" name='userfile[]' id="multipleUplFiles" class='multipleUplFiles' multiple />

													</div>

													<div id="uploaded_images"> 



													</div>

													<input type="hidden" name="foldername" id="foldername" class="folderName" value="<?php echo md5(date("YmdHis")); ?>" />							

													<input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="" />

												</div>

                                            </div>

                                        </div>

                                    </div>

								<button name="newPropBut" id="newPropBut" class="mt-2 btn btn-primary">Upload Property</button>

							</form>

						</div>

					</div>

				</div>

			</div>
            <!---- Upcoming property form starts here ----->
            
            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Upcoming Property Details</h5>
					<form method="POST" autocomplete="off" id="newUpcomingProp" enctype="multipart/form-data">

						<div class="form-result"></div>

						<div class="position-relative form-group"><label for="available-units" class="">Units Available</label>
						    <select name="available-units" id="available-units-upc" class="form-control verify-upc-field">
						        <option value="1">1</option>
						        <?php
						            for($i = 2; $i < 20; $i++){
						                echo '<option value="'.$i.'">'.$i.'</option>';
						            }
						        ?>
						    
						    </select>
						</div>

						<div class="form-row">
							<div class="col-md-6">

								<label for="propType" class="">Property Type</label>

								<select name="propType" id="propType-upc" class="form-control verify-upc-field">

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

								<select name="services" id="services-upc" class="form-control verify-upc-field">

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

									<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="suitable-for-upc form-check-input" value="Male">Male</label></div></div>

								</div>

								<div class="col-md-3">

									<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="suitable-for-upc form-check-input" value="Female">Female</label></div></div>

								</div>

								<div class="col-md-3">

									<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="suitable-for-upc form-check-input" value="Family"> Family</label></div></div>

								</div>
							
								<div class="col-md-3">

									<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="suitable-for-upc form-check-input" value="Corporate">Corporate</label></div></div>

								</div>

								<div class="col-md-3">

									<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="suitable-for-upc form-check-input" value="Other"> Other</label></div></div>

								</div>
							</div>
						</div>

						

						<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress-upc" placeholder="65, Admiralty way" type="text" class="form-control verify-upc-field">

						</div>

						<div class="form-row">

							<div class="col-md-2"><label for="country" class="">Country</label>

								<select name="country" id="country-upc" class="country-upc form-control verify-upc-field">

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

									<select name="states" id="states-upc" class="states-upc form-control verify-upc-field">

										<option value="">Select State</option>
													

									</select>

								</div>
							</div>

							<div class="col-md-6">

								<div class="position-relative form-group"><label for="city" class="">City</label><input name="city" id="city-upc" disabled type="text" class="form-control verify-upc-field"></div>

							</div>
						</div>
                        <div class="form-row">
                            <div class="col-md-6">
    							<div class="position-relative form-group"><label for="price" class="">Enter Price</label><input name="price" id="price-upc" placeholder="1000000" value="" type="text" class="form-control verify-upc-field"></div>
    							</div>
							<div class="col-md-6">
							    <div class="position-relative form-group"><label for="airtable-url" class="">Airtable URL</label><input name="airtable-url" id="airtable-url" value="" type="text" class="form-control verify-upc-field"></div>
    							</div>
							</div>
							<button name="newPropBut" id="newPropBut" class="mt-2 btn btn-primary">Post Property</button>
                	    
                	    </form>
                	   </div>
                	    
				</div>
				
			</div>
            <!---- Upcoming property form ends here ----->
		</div>

	</div>
<script src="<?php echo base_url(); ?>assets/js/drag-drop-image.js"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>