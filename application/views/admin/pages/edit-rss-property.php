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

						Edit Property						

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">

			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Property Details</h5>

						<form method="POST" autocomplete="off" id="editPropForm" enctype="multipart/form-data">

							<div class="form-result"></div>

							<div class="position-relative form-group"><label for="propTitle" class="">Property Title</label><input name="propTitle" id="propTitle" placeholder="Title" type="text" class="form-control verify-field" value="<?php echo $property['propertyTitle']; ?>"></div>

							<div class="form-row">
								<div class="col-md-6">

									<label for="propType" class="">Property Type</label>

									<select name="propType" id="propType" class="form-control verify-field">

										<?php

											foreach($aptTypes as $aptType => $value){
												
												if($value['id'] == $property['prop_type']){

													echo "<option selected value='".$value['id']."'>".$value['type']."</option>";	
												}else{
													echo "<option value='".$value['id']."'>".$value['type']."</option>";
												}

											}

										?>

									</select>
								</div>
								<div class="col-md-6">

									<label for="services" class="">Services</label>

									<select name="services" id="services" class="form-control verify-field">

										<?php

											foreach($services as $service => $val){	
												if($val['id'] == $property['services']){

													echo "<option selected value='".$val['id']."'>".$val['services']."</option>";	
												}else{
													echo "<option value='".$val['id']."'>".$val['services']."</option>";
												}
											}
 
										?>

									</select>
								</div>
							</div>
							<p></p>
							<div class="position-relative form-group">
								<label for="suitable-for" class="">Tenant Type</label>
								<div class="form-row">
									<?php
									
										@$renter = unserialize($property['renting_as']);						

										if(is_array($renter)) {
								
									?>
									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" <?php if(in_array("Male", $renter)){ echo 'checked="checked"'; } ?> class="form-check-input" name="suitable-for[]" value="Male">Male</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" <?php if(in_array("Female", $renter)){ echo 'checked="checked"'; } ?> class="form-check-input" name="suitable-for[]" value="Female">Female</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" <?php if(in_array("Family", $renter)){ echo 'checked="checked"'; } ?> class="form-check-input" name="suitable-for[]" value="Family"> Family</label></div></div>

									</div>
								
									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" <?php if(in_array("Corporate", $renter)){ echo 'checked="checked"'; } ?> class="form-check-input" name="suitable-for[]" value="Corporate">Corporate</label></div></div>

									</div>

									<div class="col-md-3">

										<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" <?php if(in_array("Other", $renter)){ echo 'checked="checked"'; } ?> class="form-check-input" name="suitable-for[]" value="Other"> Other</label></div></div>

									</div>
									<?php }else{ ?>
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
									
									<?php } ?>
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

							

							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress" value="<?php echo $property['address']; ?>" type="text" class="form-control">

							</div>
							<div class="form-row">

								<div class="col-md-2"><label for="country" class="">Country</label>

									<select name="country" id="country" class="country form-control verify-field">

										
										<?php

											foreach($countries as $countrys => $country_item){
												
												if($country_item['id'] == $property['country']){
													
													echo "<option selected value='".$country_item['id']."'>".$country_item['name']."</option>";
													
												}else{  
													
													echo "<option value='".$country_item['id']."'>".$country_item['name']."</option>";
													
												}
											}

										?>

									</select>

								</div>

								<div class="col-md-4">

									<div class="position-relative form-group"><label for="state" class="">State</label>

										<select name="states" id="states" class="states form-control verify-field">

											<?php

											foreach($states as $sstate => $state_item){
												
												if($state_item['id'] == $property['state']){
													
													echo "<option selected value='".$state_item['id']."'>".$state_item['name']."</option>";
													
												}else{  
													
													echo "<option value='".$state_item['id']."'>".$state_item['name']."</option>";
													
												}
											}

										?>
										</select>

									</div>

								</div>

								<div class="col-md-6">

									<div class="position-relative form-group"><label for="city" class="">City</label><input name="city" id="city" type="text" class="form-control verify-field" value="<?php echo $property['city']; ?>"></div>
									

								</div>
							</div>


							<div class="position-relative form-group"><label for="propDesc" class="">Property Description</label>
								<!--<textarea name="propDesc" id="exampleText" class="form-control verify-field"></textarea>-->   
								<textarea name="propDesc" id="txtDefaultHtmlArea" class="form-control propDesc" rows="8">
									<?php echo nl2br(html_entity_decode($property['propertyDescription'])); ?>
								</textarea>

							</div>
							<div class="position-relative form-group">
								<label for="availableFrom" class="">Available From</label>
								<div class="position-relative input-group">
									
									<input name="availableFrom" id="availableFrom" type="date" class="form-control" value="<?php echo date("Y m d", strtotime($property['available_date'])); ?>">
									<div class="input-group-prepend">
										<span class="input-group-text">YYYY-MM-DD</span>
									</div>

								</div>
							</div>
							
							<div class="position-relative form-check"><input name="newProp" id="newProp" <?php if(@$property['status'] == 'New'){ echo "checked"; } ?> type="checkbox" class="form-check-input"  value="1"><label for="newProp" class="form-check-label">Check if you want property tagged "New"</label></div> 
							
							<div class="position-relative form-check"><input name="featuredProp" id="featuredProp" type="checkbox" class="form-check-input" <?php if(@$property['featured_property'] == 'yes'){ echo "checked"; } ?> value="1"><label for="featuredProp" class="form-check-label">Is this a featured property?</label></div>
							
							<div class="form-row">
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="newProp" id="newProp" <?php if(@$property['status'] == 'New'){ echo "checked"; } ?> type="checkbox" class="form-check-input"  value="1"><label for="newProp" class="form-check-label">Check if property is new</label></div>
							    </div>
							    
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="featuredProp" id="featuredProp" type="checkbox" class="form-check-input" <?php if(@$property['featured_property'] == 'yes'){ echo "checked"; } ?> value="1"><label for="featuredProp" class="form-check-label">Is this a featured property?</label></div>
							    </div>
							    
							    <div class="col-md-4">
							        <div class="position-relative form-check"><input name="premiumProp" id="premiumProp" type="checkbox" class="form-check-input" <?php if(@$property['premium_property']){ echo "checked"; } ?> value="1"><label for="premiumProp" class="form-check-label">Is this a premium property?</label></div>
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

														<div class="position-relative form-group"><label for="monthly-price" class="">Enter Price</label><input name="monthly-price" id="monthly-price" value="<?php echo $property['price']; ?>" type="text" class="form-control" ></div>

														<div class="position-relative form-group"><label for="payment-plan" class="">Payment Plan</label><select name="payment-plan" id="payment-plan" class="payment-plan form-control">

                                                        <option></option>

                                                        <option <?php if($property['paymentPlan'] == 'flexible'){ echo 'selected="selected"'; } ?> value="flexible">Flexible</option>

                                                        <option <?php if($property['paymentPlan'] == 'upfront'){ echo 'selected="selected"'; } ?> value="upfront">Upfront</option>

                                                    </select></div>

													

													<div class="form-row">

														<div class="col-md-6">
														    <?php 
														        $intervals = unserialize($property['intervals']);
														        
														        //print_r($intervals);
														    ?>
														    

															<div class="position-relative form-group"><label for="pay-interval" class="">Payment Interval</label><select name="pay-interval" id="pay-interval" class="form-control">

																<option></option>
																    <?php if(in_array("Monthly", $intervals)){ ?>
																    
																	    <option style="display:none" value="Monthly">Monthly</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="Monthly">Monthly</option>
																	    
																	<?php } ?>
																	
																	<?php if(in_array("Quarterly", $intervals)){ ?>
															
																	    <option style="display:none" value="Quarterly">Quarterly</option>
																	    
																	<?php }else{ ?>
																	    <option value="Quarterly">Quarterly</option>
																	<?php } ?>
																	
																	<?php if(in_array("Bi-annually", $intervals)){ ?>
																
																	    <option style="display:none" value="Bi-annually">Bi-annually</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="Bi-annually">Bi-annually</option>
																	    
																	<?php } ?>
																	
																	<?php if(in_array("Upfront", $intervals)){ ?>
																
																	    <option style="display:none" value="Upfront">Upfront</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="Upfront">Upfront</option>
																	    
																	<?php } ?>
																

															</select></div>
														</div>

														<div class="col-md-6">

															<div class="chosen-options payment-interval-options">
															    <?php if(is_array($intervals)){ ?>
															        <?php for($i = 0; $i < count($intervals); $i++){ ?>
															    
															        <span class="chosen" id="int-<?php echo $intervals[$i]; ?>"><input class="allInts" type="hidden" value="<?php echo $intervals[$i]; ?>" /><span class="close close-int" id="<?php echo $intervals[$i]; ?>">x</span><span class="text"><?php echo $intervals[$i]; ?></span></span>
															    
															        <?php } ?>
															    <?php } ?>
															</div>

															<input type="hidden" name="payment-int-txt[]" id="payment-int-txt" class="payment-int-txt" value="" />

														</div>

													</div>

													<div class="form-row rent-freq-row">

														<div class="col-md-6">
														    <?php 
														        $frequency = unserialize($property['frequency']);
														    ?>

															<div class="position-relative form-group"><label for="rent-freq" class="">Rent Frequency</label><select name="rent-freq" id="rent-freq" class="rent-freq form-control">

																<option></option>
																    <?php if(in_array(1, $frequency)){ ?>
																    
																	    <option style="display:none" value="1">One Month</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="1">One Month</option>
																	
																	<?php } ?>
																	
																	<?php if(in_array(3, $frequency)){ ?>
																
																	<option style="display:none" value="3">Three Months</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="3">Three Months</option>
																	
																	<?php } ?>
																	
																	<?php if(in_array(6, $frequency)){ ?>
																
																	<option style="display:none" value="6">Six Months</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="6">Six Months</option>
																	
																	<?php } ?>
																	
																	<?php if(in_array(9, $frequency)){ ?>
																
																	<option style="display:none" value="9">Nine Months</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="9">Nine Months</option>
																	
																	<?php } ?>
																	
																	<?php if(in_array(12, $frequency)){ ?>
																
																	<option style="display:none" value="12">Twelve Months</option>
																	    
																	<?php }else{ ?>
																	
																	    <option value="12">Twelve Months</option>
																	
																	<?php } ?>							

															</select></div>

														</div>

														<div class="col-md-6">

															<div class="chosen-options payment-frequency-options">
															    <?php if(is_array($frequency)){ ?>
															        <?php for($i = 0; $i < count($frequency); $i++){ ?>
															        <?php
															        
															            $freq_disp = "";
															            
															            if($frequency[$i] == 1){
															               $freq_disp = "One Month";
															            }elseif($frequency[$i] == 3){
															                $freq_disp = "Three Months";
															            }elseif($frequency[$i] == 6){
															                $freq_disp = "Six Months";
															            }elseif($frequency[$i] == 9){
															                $freq_disp = "Nine Months";
															            }elseif($frequency[$i] == 12){
															                $freq_disp = "Twelve Months";
															            }
															        ?>
															    
															        <span class="chosen" id="freq-<?php echo $frequency[$i]; ?>"><input class="allFreq" type="hidden" value="<?php echo $frequency[$i]; ?>" /><span class="close close-freq" id="<?php echo $frequency[$i]; ?>">x</span><span class="text"><?php echo $freq_disp; ?></span></span>
															        
															     <?php } ?>
															    <?php } ?>
															</div>

															<input type="hidden" name="rent-freq-txt[]" class="rent-freq-txt" value="" />

														</div>

													</div>

													<div class="form-row">

														<div class="col-md-6">

															<div class="position-relative form-group"><label for="security-deposit" class="">Security Deposit</label><input name="security-deposit" id="security-deposit" placeholder="" type="text" class="form-control" value="<?php echo $property['securityDeposit'] ?>"></div>

														</div>

														<div class="col-md-6">

															<div class="position-relative form-group">
															    <label for="security-deposit-term" class="">Security Deposit Term</label>
															    <select name="security-deposit-term" id="security-deposit-term" class="form-control">
															        
                            										<option <?php if($property['securityDepositTerm'] == 1){ echo 'selected="selected"'; } ?> value="1">One Year</option>
															        
                            										<option <?php if($property['securityDepositTerm'] == 2){ echo 'selected="selected"'; } ?> value="2">Two Years</option>
                            
                            									</select>
															    
															</div>

														</div>

													</div>									<div class="position-relative form-group"><label for="prop_manager" class="">Property managed by</label><select name="prop_manager" id="prop_manager" class="prop_manager form-control">
													<option>Select</option>
                                                    <?php
                                                        foreach($prop_managers as $prop_manager => $manager_item){
                                                            
                                                            if($manager_item['id'] == $property['managed_by']){
                                                                echo "<option selected='selected' value='".$manager_item['id']."'>".$manager_item['manager']."</option>";
                                                            }else{
                                                                echo "<option value='".$manager_item['id']."'>".$manager_item['manager']."</option>";  
                                                            }
                										    												
                										}
                
                									?>

                                                    </select></div>
                                                    
                                                    <div class="form-row">
														<div class="col-md-6"><label for="service-charge" 			class="">Service charge</label>
															<input name="service-charge" id="service-charge" placeholder="" type="text" class="form-control" value="<?php echo $property['serviceCharge'] ?>">
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

																<input name="bed-number" id="bed-number" type="number" min="0" max="99" class="form-control" value="<?php echo $property['bed']; ?>">

															</div>

														</div>

														<div class="col-md-6">

															<div class="position-relative form-group"><label for="bath-number" class="">Bath</label><input name="bath-number" id="bath-number" type="number" min="0" max="99" class="form-control" value="<?php echo $property['bath']; ?>"></div>

														</div>

													</div>
													

													<div class="form-row">
														<?php
									
															@$amenity = unserialize($property['amenities']);						

															//foreach($renting_as as $renter) {

														?>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="amenities[]" <?php if(in_array("water", $amenity)){ echo 'checked="checked"'; } ?> value="water">Water</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("wardrobe", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="wardrobe">Wardrobe</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("dining", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="dining"> Dining</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("prepaid-electricity", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="prepaid-electricity">Prepaid Electricity</label></div></div>

														</div>

													</div>

													

													<div class="form-row">

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("security-gate", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="security-gate">Security Gate</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("pool", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="pool">Pool</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("gym", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="gym">Gym</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("wifi", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="wifi">WIFI</label></div></div>

														</div>

														<div class="col-md-3">

															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"<?php if(in_array("generator", $amenity)){ echo 'checked="checked"'; } ?> name="amenities[]" value="generator">Gen</label></div></div>

														</div>

													</div>			

													

													<div class="form-row">

														<div class="col-md-6">

															<div class="position-relative form-group">

																<label for="toilet-number" class="">Toilet</label>

																<input name="toilet-number" id="toilet-number" type="number" min="0" max="99" class="form-control" value="<?php echo $property['toilet'] ?>">

															</div>

														</div>

														<div class="col-md-6">

															<div class="position-relative form-group">

																<label for="furnishing" class="">Furnishing</label>

																<select name="furnishing" id="furnishing" class="furnishing form-control">
																    <?php 
                                                                        foreach($furnishings as $furnishing => $value){	
                                                                            
                                                                            if($value['type'] != 0){
                                                                                
                                                                                if($value['type'] == $property['furnishing']){
                                                                                    
                            												        echo "<option selected='selected' value='".$value['type']."'>".$value['name']."</option>";
                            												    
                                                                                }else{
                                                                                    
                                                                                    echo "<option value='".$value['type']."'>".$value['name']."</option>";
                                                                                    
                                                                                }
                            												    
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

														<textarea name="propNote" id="txtDefaultHtmlArea" class="propNote form-control" rows="8"><?php echo nl2br(html_entity_decode($property['rentalCondition'])); ?></textarea>

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

													

													<?php
														$CI =& get_instance();

														$facilities = $CI->get_facilities($property['propertyID']);
													
														if(is_array($facilities)){
															
															$ind = 0;
															
															if(count($facilities) == 3){
													?>
																<div class="form-row element" id="div_0">

																	<div class="new-facility mb-2 mr-2 btn-transition btn btn-outline-primary">New Facility</div>

																</div>
													<?php
															}
															
															foreach($facilities as $facility => $fac){
													?>
													<div class='form-row element' id='div_<?php echo $fac['id']; ?>'>
													<div class="col-md-4">
														<div class="position-relative form-group">
															<label for="facility-name" class="">Facility Name</label>
															<input name="facility-name[]" id="facility_name_<?php echo $fac['id']; ?>" type="text" value="<?php echo $fac['name'] ?>" class="facility-name form-control" />
														</div>
													</div>
													<div class="col-md-4">
														<div class="position-relative form-group">
															<label for="facility_category" class="">Category</label>
															<select name="facility_category[]" id="facility_category_<?php echo $fac['id']; ?>" class="facility-category form-control">											<?php 
																		foreach($facility_categories as $facility_category => $fc){
																			
																			if($fac['category'] == $fc['category']){
																				
																				echo '<option selected="selected" value="'.$fc['category'].'">'.$fc['category'].'</option>';
																				
																			}else{
																				
																				echo '<option value="'.$fc['category'].'">'.$fc['category'].'</option>';
																				
																			}
																			
																		}
																	?>															
															</select>
														</div>
													</div>
													<div class="col-md-4">
													<div class="position-relative form-group">
														<label for="facility-distance" class="">Distance</label>
														<select name="facility-distance[]" id="facility_distance_<?php echo $fac['id']; ?>" class="facility-distance form-control">
																<?php 
																		foreach($distances as $distance => $fd){
																			
																			if($fac['distance'] == $fd['distance']){
																				
																				echo '<option selected="selected" value="'.$fd['distance'].'">'.$fd['distance'].'</option>';
																				
																			}else{
																				
																				echo '<option value="'.$fd['distance'].'">'.$fd['distance'].'</option>';
																				
																			}
																			
																		}
																	?>	
														</select>
													</div>
													</div>
													<div class="col-md-4">
														<div class="position-relative form-group">
															<label for="facility-image" class="">Facility Image</label>
															<input name="facility-image[]" id="facility_image_<?php echo $fac['id']; ?>" type="file" class="facility-image form-control" />
														</div>
													</div>
														</div>															
															
													<?php 	
																$ind++;
															}
															
														}
														
													?>

                                                </div>

                                            </div>

                                        </div>

								


										<div class="card">
    <div id="headingSix" class="card-header">
        <button type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseSix" class="text-left m-0 p-0 btn btn-link btn-block">
            <h5 class="m-0 p-0">Images</h5>
        </button>
    </div>
    <div data-parent="#accordion" id="collapseOne6" class="collapse">

        <!-- <div class="card-body">
            <div class="file_drag_area" id="file_drag_area">
                Drop Files Here
            </div>
            <div id="uploaded_files">
                <label>Click to upload file(s)</label>
                <input type="file" name="userfile[]" id="multipleUplFiles" class="multipleUplFiles" multiple />
            </div>

			<div id="uploaded_images">
                </?php
                require 'vendor/autoload.php';

                $s3 = new Aws\S3\S3Client([
                    'version' => 'latest',
                    'region' => 'eu-west-1', // Replace with your region
                ]);

                $bucket = 'dev-rss-uploads'; // Replace with your bucket name
                $prefix = 'uploads/properties/' . $property['imageFolder'] . '/';

                try {
                    $objects = $s3->listObjects([
                        'Bucket' => $bucket,
                        'Prefix' => $prefix,
                    ]);

                    foreach ($objects['Contents'] as $object) {
                        $fileKey = $object['Key'];
                        $fileUrl = $s3->getObjectUrl($bucket, $fileKey);

                        echo '<span class="imgCover" id="id-' . $fileKey . '">';
                        echo '<img src="' . $fileUrl . '" id="' . $fileKey . '" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />';
                        if ($fileKey == $property['featuredImg']) {
                            echo '<span class="featTT">Featured</span>';
                        }
                        echo '<div class="remove-img img-removal" id="img-properties-' . $fileKey . '">remove <i class="fa fa-trash"></i></div>';
                        echo '</span>';
                    }
                } catch (Aws\S3\Exception\S3Exception $e) {
                    echo 'S3 Error: ' . $e->getMessage() . PHP_EOL;
                }
                ?>
            </div>

			<input type="hidden" name="foldername" id="foldername" class="folderName" value="<?php echo $property['imageFolder'] ?>" />
            <input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="<?php echo $property['featuredImg']; ?>" />
            <input type="hidden" name="propID" id="propID" class="propID" value="<?php echo $property['propertyID']; ?>" />
        </div> -->


		<div class="card-body">
    <div class="file_drag_area" id="file_drag_area">
        Drop Files Here
    </div>
    <div id="uploaded_files">
        <label>Click to upload file(s)</label>
        <input type="file" name='userfile[]' id="multipleUplFiles" class='multipleUplFiles' multiple />
    </div>
    <div id="uploaded_images"> 

        <?php

        require 'vendor/autoload.php';

        // Create an S3 client
        $s3 = new Aws\S3\S3Client([
            'version' => 'latest',

            'region' => 'eu-west-1',
        ]);

        $bucket = 'dev-rss-uploads';

        $imageFolder = $property['imageFolder'];

        try {
            $objects = $s3->listObjects([
                'Bucket' => $bucket,

                'Prefix' => "uploads/properties/$imageFolder/",
            ]);

            $content_size = count($objects['Contents']);

            $count = 0;

            foreach ($objects['Contents'] as $object) {

                $file = basename($object['Key']);

                if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {

                    $imageSrc = $s3->getObjectUrl($bucket, $object['Key']);
        ?>
                    <span class="imgCover removal-id-<?php echo $count; ?>" id="id-<?php echo $file; ?>">
                        <img src="<?php echo $imageSrc; ?>" id="<?php echo $file; ?>" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as the featured image" />
                        <?php if ($file == $property['featuredImg']) { echo '<span class="featTT">Featured</span>'; } ?>
                        <div class="remove-img img-removal" id="img-properties-<?php echo $file; ?>-<?php echo $count; ?>">remove <i class="fa fa-trash"></i></div>
                    </span>
        <?php

                }

                $count++;
            }

        } catch (Aws\S3\Exception\S3Exception $e) {

            // Handle S3 error here
            echo 'Error listing S3 objects: ' . $e->getMessage();

        }

        ?>

    </div>

    <input type="hidden" name="foldername" id="foldername" class="folderName" value="<?php echo $property['imageFolder'] ?>" />
    <input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="<?php echo $property['featuredImg']; ?>" />
    <input type="hidden" name="propID" id="propID" class="propID" value="<?php echo $property['propertyID']; ?>" />
</div>



<script>
    // JavaScript to handle selecting featured image and reordering S3 objects
    function selectFeatured(evt) {
        "use strict";
        var pictureList = document.getElementsByClassName('upldImg');
        var featPicField = document.getElementById('featuredPic');
        featPicField.value = evt;
        var clickedImg = document.getElementById(evt);

        // Assuming you have a new order (e.g., imageOrder) for the images
        // based on the selected featured image.
        // You need to retrieve or generate this order in your PHP backend.

        // Example imageOrder: ["image3.jpg", "image1.jpg", "image2.jpg", ...]

        // Implement logic to reorder the images in the S3 bucket based on imageOrder.
        reorderImagesInS3(imageOrder);
    }

    function reorderImagesInS3(imageOrder) {
        // Implement logic to copy objects to new keys (filenames) based on imageOrder.
        // You'll need to use AWS SDK for PHP to interact with S3.
        // Loop through imageOrder and copy objects accordingly.

        // Example logic (simplified):
        for (var i = 0; i < imageOrder.length; i++) {
            var sourceKey = "uploads/properties/" + foldername + "/" + imageOrder[i];
            var destinationKey = "uploads/properties/" + foldername + "/new-" + imageOrder[i]; // New key/filename
            copyObjectToS3(sourceKey, destinationKey);
        }

        // Delete old objects (images) after copying to new keys (filenames).
        // This step requires careful handling to avoid data loss.
    }

    function copyObjectToS3(sourceKey, destinationKey) {
        // Implement logic to copy an object from sourceKey to destinationKey in S3.
        // You can use the AWS SDK for PHP to copy objects between keys.

        // Example logic (simplified):
        try {
            var params = {
                Bucket: bucket,
                CopySource: bucket + "/" + sourceKey,
                Key: destinationKey
            };

            s3.copyObject(params, function (err, data) {
                if (err) {
                    console.log("Error copying object: " + err);
                } else {
                    console.log("Object copied successfully: " + destinationKey);
                }
            });
        } catch (err) {
            console.log("Error copying object: " + err);
        }
    }
</script>



    </div>
</div>


                                    </div>

								<button name="newPropBut" id="newPropBut" class="mt-2 btn btn-primary">Save Changes</button>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
	<script>
    
	"use strict";

	var states = $('#states').val();
	
	var cities = [];

	var data = {"states" : states};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: "<?php echo base_url(); ?>pages/get_cities/",

		secureuri : false,

		type: "POST",

		dataType : 'json',

		data: data,

		success: function(data, status, msg) {

			for(let i = 0; i < data.msg.length; i++){

				cities.push(data.msg[i].name);

			}

			autocomplete_edit(document.getElementById("city"), cities);

			//$('#city').prop("disabled", false);

		}

	});

function autocomplete_edit(inp, arr) {
   
	"use strict";
  /*the autocomplete function takes two arguments,

  the text field element and an array of possible autocompleted values:*/
	
  	var currentFocus;

  /*execute a function when someone writes in the text field:*/

  	inp.addEventListener("input", function(e) {

      var a, b, i, val = this.value;

      /*close any already open lists of autocompleted values*/

      closeAllLists();

      if (!val) { return false;}

      currentFocus = -1;

      /*create a DIV element that will contain the items (values):*/

      a = document.createElement("DIV");

      a.setAttribute("id", this.id + "autocomplete-list");

      a.setAttribute("class", "autocomplete-items");

      /*append the DIV element as a child of the autocomplete container:*/

      this.parentNode.appendChild(a);

      /*for each item in the array...*/

      for (i = 0; i < arr.length; i++) {

        /*check if the item starts with the same letters as the text field value:*/

        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

          /*create a DIV element for each matching element:*/

          b = document.createElement("DIV");

          /*make the matching letters bold:*/

          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";

          b.innerHTML += arr[i].substr(val.length);

          /*insert a input field that will hold the current array item's value:*/

          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

          /*execute a function when someone clicks on the item value (DIV element):*/

              b.addEventListener("click", function(e) {

              /*insert the value for the autocomplete text field:*/

              inp.value = this.getElementsByTagName("input")[0].value;

              /*close the list of autocompleted values,

              (or any other open lists of autocompleted values:*/

              closeAllLists();

          });

          a.appendChild(b);

        }

      }
  	});
  	
  	/*execute a function presses a key on the keyboard:*/

      inp.addEventListener("keydown", function(e) {
    
          var x = document.getElementById(this.id + "autocomplete-list");
    
          if (x) x = x.getElementsByTagName("div");
    
          if (e.keyCode == 40) {
    
            /*If the arrow DOWN key is pressed,
    
            increase the currentFocus variable:*/
    
            currentFocus++;
    
            /*and and make the current item more visible:*/
    
            addActive(x);
    
          } else if (e.keyCode == 38) { //up
    
            /*If the arrow UP key is pressed,
    
            decrease the currentFocus variable:*/
    
            currentFocus--;
    
            /*and and make the current item more visible:*/
    
            addActive(x);
    
          } else if (e.keyCode == 13) {
    
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
    
            e.preventDefault();
    
            if (currentFocus > -1) {
    
              /*and simulate a click on the "active" item:*/
    
              if (x) x[currentFocus].click();
    
            }
    
          }
    
      });
    
      function addActive(x) {
    
        /*a function to classify an item as "active":*/
    
        if (!x) return false;
    
        /*start by removing the "active" class on all items:*/
    
        removeActive(x);
    
        if (currentFocus >= x.length) currentFocus = 0;
    
        if (currentFocus < 0) currentFocus = (x.length - 1);
    
        /*add class "autocomplete-active":*/
    
        x[currentFocus].classList.add("autocomplete-active");
    
      }
    
      function removeActive(x) {
    
        /*a function to remove the "active" class from all autocomplete items:*/
    
        for (var i = 0; i < x.length; i++) {
    
          x[i].classList.remove("autocomplete-active");
    
        }
    
      }
    
      function closeAllLists(elmnt) {
    
        /*close all autocomplete lists in the document,
    
        except the one passed as an argument:*/
    
        var x = document.getElementsByClassName("autocomplete-items");
    
        for (var i = 0; i < x.length; i++) {
    
          if (elmnt != x[i] && elmnt != inp) {
    
          x[i].parentNode.removeChild(x[i]);
    
        }
    
      }
    
    }
    
    /*execute a function when someone clicks in the document:*/
    
    document.addEventListener("click", function (e) {
    
        closeAllLists(e.target);
    
    });
}
</script>

	<script src="<?php echo base_url(); ?>assets/js/drag-drop-image.js"></script>

<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/state-picker.js' ?>"></script>

