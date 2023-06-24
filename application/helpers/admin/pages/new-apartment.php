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
						Add Apartment						
					</div>
				</div>
				</div>
		</div> 
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Apartment Details</h5>
						<form class="" autocomplete="off" id="newAptForm" method="post" enctype="multipart/form-data">
							<div class="form-result"></div>
							<div class="position-relative form-group"><label for="aptTitle" class="">Apartment Title</label><input name="aptTitle" id="aptTitle" placeholder="Title" type="text" class="form-control verify-field"></div>
							
							<div class="position-relative form-group"><label for="propType" class="">Apartment Type</label>
								<select name="propType" id="propType" class="form-control verify-field">
									<option></option>
									<?php
										foreach($aptTypes as $aptType => $value){
											echo "<option value='".$value['id']."'>".$value['type']."</option>";
										}
									?>
								</select>
							</div>
							<div class="position-relative form-group"><label for="stayType" class="">Stay Type</label>
								<select name="stayType" id="stayType" class="form-control verify-field">
									<option></option>
									<?php
										foreach($stayTypes as $stayType => $value){
											echo "<option value='".$value['id']."'>".$value['stay_name']."</option>";
										}
									?>
								</select>
							</div>
							
							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress" placeholder="65, Admiralty way" type="text" class="form-control verify-field">
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
							
							<div class="position-relative form-group"><label for="aptDesc" class="">Apartment Description</label>
								<textarea name="aptDesc" id="txtDefaultHtmlArea" class="form-control verify-field aptDesc" rows="8"></textarea>
							</div>
							
							<div class="position-relative form-group"><label for="house_rules" class="">House rules</label>
								<textarea name="house_rules" class="form-control house_rules" rows="5"></textarea>
							</div>
							<div class="position-relative form-group"><label for="policies" class="">Policies</label>
								<textarea name="policies" class="form-control policies" rows="5"></textarea>
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
													       <div class="position-relative form-group"><label for="cost" class="">Cost Per Night</label><input name="cost" id="cost" type="text" class="form-control ">
							            </div> 
												        </div>
												        
												        <div class="col-md-6">
													        <div class="position-relative form-group"><label for="security-deposit" class="">Security Deposit</label><input name="security-deposit" id="security-deposit" value="0" type="text" class="form-control">
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
													    <div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="air-conditioning">AC/Heater</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="entertainment">Entertainment</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="wardrobe">Wardrobe</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="kitchen"> Kitchen</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="toiletries">Toiletries</label></div></div>
														</div>
													</div>
													
													<div class="form-row">
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="parking">Parking Space</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="pool">Pool</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="gym">Gym</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="wifi">WIFI</label></div></div>
														</div>
														<div class="col-md-3">
															<div class="position-relative form-group"><div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" class="amenities form-check-input" name="amenities[]" value="hanger">Wardrobe Hanger</label></div></div>
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
																<label for="guest-number" class="">Guest Limit</label>
																<input name="guest-number" id="guest-number" type="number" min="0" max="99" class="form-control">
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

													</div>
													<input type="hidden" name="foldername" id="foldername" class="folderName" value="" />							
													<input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="" />
												</div>
                                            </div>
                                        </div>
                                    </div>
								<button id="newPropBut" class="mt-2 btn btn-primary">Upload Property</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="tab-content">			
			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body"><h5 class="card-title">Property Details</h5>
					<?php //echo @$error; ?> <!-- Error Message will show up here -->
					<?php //echo @$success; ?> <!-- Error Message will show up here -->
					<?php //echo form_open_multipart('admin/admin_signup/'.$this->session->userdata('adminID').'');?>
					<!---<form id="newPropForm" class="">

						<div class="position-relative row form-group"><label for="fname" class="col-sm-2 col-form-label">Title</label>
							<div class="col-sm-10"><input name="fname" id="fname" placeholder="Title" type="text" class="verify-txt form-control"></div>
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
										//foreach($adminPriv as $userprivilege => $value){
											//echo '<option value="'.$value->accessID.'">'.$value->accessName.'</option>';
										//}
									?>
								</select>
							</div>
						</div>
						
						<div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Profile Image</label>
							<div class="col-sm-10"><input id='real-input' name='userfile' type="file" class="form-control-file">
								<small class="form-text text-muted">Select an image for the article (JPG, GIF or PNG format only)</small>
							</div>
						</div>

						<div class="position-relative row form-check">
							<div class="col-sm-10 offset-sm-2">
								<button class="btn btn-primary">Submit</button>
							</div>
						</div>

					</form>
					</div>
				</div>
			</div>
		</div>-->
	</div>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-apt-images.js"></script>
<script src="<?php echo base_url().'assets/js/country-picker.js' ?>"></script>