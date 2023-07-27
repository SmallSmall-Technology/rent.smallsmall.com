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
						Edit Apartment						
					</div>
				</div>
				</div>
		</div> 
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Apartment Details</h5>
						<form class="" autocomplete="off" id="editAptForm" method="post" enctype="multipart/form-data">
							<div class="form-result"></div>
							<div class="position-relative form-group"><label for="aptTitle" class="">Apartment Title</label><input name="aptTitle" id="aptTitle" value="<?php echo $property['apartmentName']; ?>" type="text" class="form-control verify-field"></div>
							
							<div class="position-relative form-group"><label for="propAddress" class="">Apartment Type</label>
								<select name="propType" id="propType" class="form-control verify-field">
									<option></option>
									<?php
										foreach($aptTypes as $aptType => $value){
										    if($value['id'] == $property['apartmentType']){
										        
										        echo "<option selected='selected' value='".$value['id']."'>".$value['type']."</option>";
										        
										    }else{
										    
											    echo "<option value='".$value['id']."'>".$value['type']."</option>";
											    
										    }
										}
									?>
								</select>
							</div>
							
							<div class="position-relative form-group"><label for="stayType" class="">Stay Type</label>
								<select name="stayType" id="stayType" class="form-control verify-field">
									<option></option>
									<?php
										foreach($stayTypes as $stayType => $value){
										    if($value['id'] == $property['stayType']){
										        
										        echo "<option selected='selected' value='".$value['id']."'>".$value['stay_name']."</option>";
										        
										    }else{
										    
											    echo "<option value='".$value['id']."'>".$value['stay_name']."</option>";
											    
										    }
										}
									?>
								</select>
							</div>
							
							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress"  value="<?php echo $property['address']; ?>" type="text" class="form-control verify-field">
							</div>
							
							
							<div class="position-relative form-group"><label for="aptDesc" class="">Apartment Description</label>
								<textarea name="aptDesc" id="txtDefaultHtmlArea" class="form-control verify-field aptDesc" rows="8"><?php echo $property['description']; ?></textarea>
							</div>
							<div class="position-relative form-group"><label for="house_rules" class="">House rules</label>
								<textarea name="house_rules" class="form-control house_rules" rows="5"><?php echo $property['house_rules']; ?></textarea>
							</div>
							<div class="position-relative form-group"><label for="policies" class="">Policies</label>
								<textarea name="policies" class="form-control policies" rows="5"><?php echo $property['policies']; ?></textarea>
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
													<div class="form-row">
												
													</div>									<div class="form-row">
													    <div class="col-md-6">
													       <div class="position-relative form-group"><label for="cost" class="">Cost Per Night</label><input name="cost" id="cost" value="<?php echo $property['price']; ?>" type="text" class="form-control ">
							            </div> 
												        </div>
												        
												        <div class="col-md-6">
													        <div class="position-relative form-group"><label for="security-deposit" class="">Security Deposit</label><input name="security-deposit" id="security-deposit"  value="<?php echo $property['securityDeposit']; ?>" type="text" class="form-control">
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
																<input name="bed-number" id="bed-number" value="<?php echo $property['bedroom']; ?>" type="number" min="1" max="99" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="position-relative form-group"><label for="bath-number" class="">Bath</label><input name="bath-number" id="bath-number" type="number" value="<?php echo $property['bathroom']; ?>" min="1" max="99" class="form-control"></div>
														</div>
													</div>
													<?php
									
														@$amenity = unserialize($property['amenities']);						

														//foreach($renting_as as $renter) {

													?>
													<div class="form-row">
													    <div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("air-conditioning", $amenity)){ echo 'checked="checked"'; } ?> value="air-conditioning">AC/Heater</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("entertainment", $amenity)){ echo 'checked="checked"'; } ?> value="entertainment">Entertainment</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("wardrobe", $amenity)){ echo 'checked="checked"'; } ?> value="wardrobe">Wardrobe</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("kitchen", $amenity)){ echo 'checked="checked"'; } ?> value="kitchen"> Kitchen</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("toiletries", $amenity)){ echo 'checked="checked"'; } ?> value="toiletries">Toiletries</label></div></div>
														</div>
													</div>
													
													<div class="form-row">
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("parking", $amenity)){ echo 'checked="checked"'; } ?> value="parking">Parking Space</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("pool", $amenity)){ echo 'checked="checked"'; } ?> value="pool">Pool</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("gym", $amenity)){ echo 'checked="checked"'; } ?> value="gym">Gym</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("wifi", $amenity)){ echo 'checked="checked"'; } ?> value="wifi">WIFI</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" <?php if(in_array("hanger", $amenity)){ echo 'checked="checked"'; } ?> value="hanger">Wardrobe Hanger</label></div></div>
														</div>
													</div>			
													
													<div class="form-row">
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="toilet-number" class="">Toilet</label>
																<input name="toilet-number" id="toilet-number" type="number" value="<?php echo $property['toilet']; ?>" min="0" max="99" class="form-control">
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="position-relative form-group">
																<label for="guest-number" class="">Guest Limit</label>
																<input name="guest-number" id="guest-number" type="number" min="0" max="99" value="<?php echo $property['guests']; ?>" class="form-control">
															</div>
														</div>
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
														<input type="file" name='userfile[]' id="multipleUplFiles" class='multipleUplFiles' multiple />
													</div>
													<div id="uploaded_images">
                                                        <?php

																$dir = '../stay.smallsmall.com/uploads/apartments/'.$property['folder'].'/';
																
																$filePath = 'https://dev-stay.smallsmall.com/uploads/apartments/'.$property['folder'].'/';
																
																if (file_exists($dir) == false) {

																	echo 'Directory \'', $dir, '\' not found!';

																} else {

																	$dir_contents = scandir($dir);
 
																	$count = 0;
																	
																	$content_size = count($dir_contents);
																	
																	//print_r($dir_contents);

																	foreach ($dir_contents as $file) {
																		

																		//$file_type = strtolower(end(explode('.', $file)));



																		if ($file !== '.' && $file !== '..' && $count <= $content_size) { 

																?>
																			<span class="imgCover removal-id-<?php echo $count; ?>" id="removal-id-<?php echo $file; ?>">
																				<img src="<?php echo $filePath.''.$file; ?>" id="<?php echo $file; ?>" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
																				<?php if($file == $property['featuredImg']){ echo '<span class="featTT">Featured</span>';} ?>
																				<div class="remove-stay-img img-removal" id="img-apartments-<?php echo $file; ?>-<?php echo $file; ?>">remove <i class="fa fa-trash"></i></div>
																			</span>
																			
															<?php			
																			
																		}
																		$count++;

																	}

																}

															?>
													</div>
													<input type="hidden" name="foldername" id="foldername" class="folderName" value="<?php echo $property['folder']; ?>" />							
													<input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="<?php echo $property['featuredImg']; ?>" />					
													<input type="hidden" name="aptID" id="aptID" value="<?php echo $property['apartmentID']; ?>" />
												</div>
                                            </div>
                                        </div>
                                    </div>
								<button id="newPropBut" class="mt-2 btn btn-primary">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-apt-images.js"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>