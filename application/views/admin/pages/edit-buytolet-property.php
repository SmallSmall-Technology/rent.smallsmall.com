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
						Edit Buy2Let Property
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Property Details</h5>
						<form id="editBuytoletForm">
							<div class="form-result"></div>
							<div class="position-relative form-group"><label for="propTitle" class="">Property Title</label><input name="propTitle" id="propTitle" placeholder="Title" type="text" value="<?php echo $property['property_name']; ?>" class="form-control verify-field allFields"></div>

							<div class="position-relative form-group">
								<label for="propType" class="">Property Type</label>
								<select name="propType" id="propType" class="form-control allFields">

									<?php

									foreach ($aptTypes as $aptType => $value) {
										if ($value['id'] == $property['apartment_type']) {
											echo "<option selected='selected' value='" . $value['id'] . "'>" . $value['type'] . "</option>";
										} else {
											echo "<option value='" . $value['id'] . "'>" . $value['type'] . "</option>";
										}
									}
									?>
								</select>
							</div>

							<div class="position-relative form-group"><label for="propAddress" class="">Property Address</label><input name="propAddress" id="propAddress" value="<?php echo $property['address']; ?>" placeholder="65, Admiralty way" type="text" class="form-control allFields">
							</div>
							<div class="form-row">
								<div class="col-md-2"><label for="country" class="">Country</label>
									<select name="country" id="country" class="country form-control verify-field allFields">

										<?php
										foreach ($countries as $country => $country_item) {
											if ($country_item['id'] == $property['country']) {
												echo "<option selected='selected' value='" . $country_item['id'] . "'>" . $country_item['name'] . "</option>";
											} else {
												echo "<option value='" . $country_item['id'] . "'>" . $country_item['name'] . "</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<div class="position-relative form-group"><label for="state" class="">State</label>
										<select name="states" id="states" class="states form-control verify-field allFields">
											<?php
											foreach ($states as $state => $state_item) {
												if ($state_item['id'] == $property['state']) {
													echo "<option selected='selected' value='" . $state_item['id'] . "'>" . $state_item['name'] . "</option>";
												} else {
													echo "<option value='" . $state_item['id'] . "'>" . $state_item['name'] . "</option>";
												}
											}
											?>

										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group"><label for="city" class="">City</label><input name="city" id="city" disabled type="text" value="<?php echo $property['city']; ?>" class="form-control verify-field allFields"></div>
								</div>


							</div>

							<div class="position-relative form-group"><label for="propDesc" class="">Property Description</label>
								<textarea name="propDesc" class="propDesc" id="txtDefaultHtmlArea" class="form-control allFields" rows="8"><?php echo $property['property_info']; ?></textarea>
							</div>

							<div class="form-row">
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="construction-level" class="">Construction Level</label>
										<select name="construction-level" class="form-control construction-level">
											<option <?php if (is_null($property['construction_lvl']) || $property['construction_lvl'] == '') {
														echo "selected";
													} ?> value="">Select</option>
											<option <?php if ($property['construction_lvl'] == 'Ongoing') {
														echo "selected";
													} ?> value="Ongoing">Ongoing Project</option>
											<option <?php if ($property['construction_lvl'] == 'Off Plan') {
														echo "selected";
													} ?> value="Off Plan">Off Plan Project</option>
											<option <?php if ($property['construction_lvl'] == 'Completed') {
														echo "selected";
													} ?> value="Completed">Completed Project</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="position-relative form-group">
										<label for="start-date" class="">Start Date</label>
										<input <?php if (@$property['construction_lvl'] == 'Completed' || is_null(@$property['construction_lvl'])) {
													echo "disabled";
												} ?> autocomplete="off" class="form-control start-date" name="start-date" id="start-date" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="position-relative form-group">
										<label for="finish-date" class="">Finish Date</label>
										<input autocomplete="off" class="form-control finish-date" name="finish-date" id="finish-date" />
									</div>
								</div>
							</div>
							<div class="position-relative form-group">
								<div class="position-relative form-group">
									<label for="investment-type" class=""> Select Investment type</label>
									<select name="investment-type" class="form-control investment-type">
										<?php
										foreach ($investTypes as $investType => $value) {

											if ($value['id'] == $property['investment_type']) {

												echo "<option selected='selected' value='" . $value['id'] . "'>" . $value['type'] . "</option>";
											} else {

												echo "<option value='" . $value['id'] . "'>" . $value['type'] . "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>
							<?php

							$featured = '';

							if (@$property['featured'] == 1) {
								$featured = "checked";
							}

							?>
							<div class="position-relative form-check"><input name="featuredProp" id="featuredProp" type="checkbox" <?php echo $featured; ?> class="form-check-input"><label for="featuredProp" class="form-check-label">Is this a featured property?</label></div>

					</div>
				</div>
				<div class="main-card mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Finance </h5>
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
														<input name="marketValue" id="marketValue" value="<?php echo $property['marketValue']; ?>" type="text" class="form-control allFields">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="outright-discount" class="">Outright Discount</label>
														<input name="outright-discount" id="outright-discount" value="<?php echo $property['outrightDiscount']; ?>" type="text" class="form-control allFields">
													</div>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group"><label for="price" class="">Property Price</label><input name="price" id="price" value="<?php echo $property['price']; ?>" type="text" class="form-control allFields"></div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group"><label for="expected-rent" class="">Expected Rent</label><input name="expected-rent" id="expected-rent" value="<?php echo $property['expected_rent']; ?>" type="text" class="form-control allFields"></div>
												</div>
											</div>

											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="asset-appreciation-1" class="">1-4 Yr Asset Appreciation (%)</label>
														<input name="asset-appreciation-1" id="asset-appreciation-1" type="text" class="form-control" value="<?php echo $property['asset_appreciation_1']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="asset-appreciation-2" class="">5-9 Yr Asset Appreciation (%)</label>
														<input name="asset-appreciation-2" id="asset-appreciation-2" type="text" class="form-control" value="<?php echo $property['asset_appreciation_2']; ?>">
													</div>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="asset-appreciation-3" class="">10 - 14 Yr Asset Appreciation (%)</label>
														<input name="asset-appreciation-3" id="asset-appreciation-3" type="text" class="form-control" value="<?php echo $property['asset_appreciation_3']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="asset-appreciation-4" class="">16 - 19 Yr Asset Appreciation (%)</label>
														<input name="asset-appreciation-4" id="asset-appreciation-4" type="text" class="form-control" value="<?php echo $property['asset_appreciation_4']; ?>">
													</div>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="asset-appreciation-5" class="">20th Yr Asset Appreciation (%)</label>
														<input name="asset-appreciation-5" id="asset-appreciation-5" type="text" class="form-control" value="<?php echo $property['asset_appreciation_5']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="mortgage-value" class="">Mortgage value</label>
														<input name="mortgage-value" id="mortgage-value" placeholder="" type="text" value="<?php echo $property['mortgage']; ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group"><label for="promo_price" class="">Promo Price</label><input name="promo_price" id="promo_price" type="text" class="form-control allFields" value="<?php echo @$property['promo_price']; ?>"></div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="promo_category" class="">Promo Category</label>
														<select class="form-control promo_category">
															<option <?php if ($property['promo_category'] == '') {
																		echo 'selected="selected"';
																	} ?> value="">Select Finance Option</option>
															<option <?php if ($property['promo_category'] == 'all') {
																		echo 'selected="selected"';
																	} ?> value="all">All</option>
															<option <?php if ($property['promo_category'] == 'cash-finance') {
																		echo 'selected="selected"';
																	} ?> value="cash-finance">Cash Finance</option>
															<option <?php if ($property['promo_category'] == 'mortgage-finance') {
																		echo 'selected="selected"';
																	} ?> value="mortgage-finance">Mortgage Finance</option>
															<option <?php if ($property['promo_category'] == 'payment-plan') {
																		echo 'selected="selected"';
																	} ?> value="payment-plan">Payment Plan</option>
														</select>
													</div>
												</div>
											</div>
											<div class="position-relative form-group">
												<div class="position-relative form-group">
													<label for="payment-plan" class="">Does this property have a payment plan?</label>
													<select class="form-control payment-plan">
														<option <?php if (@$property['payment_plan'] == '') {
																	echo 'selected = "selected"';
																} ?> value="">Select</option>
														<option <?php if (@$property['payment_plan'] == 'yes') {
																	echo 'selected = "selected"';
																} ?> value="yes">Yes</option>
														<option <?php if (@$property['payment_plan'] == 'no') {
																	echo 'selected = "selected"';
																} ?> value="no">No</option>
													</select>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group <?php if (@$property['payment_plan'] == 'no') {
																									echo 'payment-plan-period-spc';
																								} ?>">
														<label for="minimum-payment-plan-value" class="">Minimum Payment Plan (%)</label>
														<input name="minimum-payment-plan-value" id="minimum-payment-plan-value" value="<?php echo @$property['minimum_payment_plan']; ?>" type="text" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group  <?php if (@$property['payment_plan'] == 'no') {
																									echo 'payment-plan-period-spc';
																								} ?>">
														<label for="payment-plan-period" class="">Payment plan period</label>

														<select class="form-control payment-plan-period">
															<option value="">Select</option>
															<option <?php if (@$property['payment_plan_period'] == '1' || @$property['payment_plan_period'] == '12') {
																		echo 'selected = "selected"';
																	} ?> value="12">1 Year</option>
															<option <?php if (@$property['payment_plan_period'] == '2' || @$property['payment_plan_period'] == '24') {
																		echo 'selected = "selected"';
																	} ?> value="24">2 Years</option>
															<option <?php if (@$property['payment_plan_period'] == '3' || @$property['payment_plan_period'] == '36') {
																		echo 'selected = "selected"';
																	} ?> value="36">3 Years</option>
															<option <?php if (@$property['payment_plan_period'] == '4' || @$property['payment_plan_period'] == '48') {
																		echo 'selected = "selected"';
																	} ?> value="48">4 Years</option>
															<option <?php if (@$property['payment_plan_period'] == '5' || @$property['payment_plan_period'] == '60') {
																		echo 'selected = "selected"';
																	} ?> value="60">5 Years</option>
															<option <?php if (@$property['payment_plan_period'] == '6' || @$property['payment_plan_period'] == '72') {
																		echo 'selected = "selected"';
																	} ?> value="72">6 Years</option>
														</select>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div id="headingTen" class="b-radius-0 card-header">
										<button type="button" data-toggle="collapse" data-target="#collapseOne10" aria-expanded="false" aria-controls="collapseTen" class="text-left m-0 p-0 btn btn-link btn-block">
											<h5 class="m-0 p-0">Co-Own Options</h5>
										</button>
									</div>
									<div data-parent="#accordion" id="collapseOne10" class="collapse">
										<div class="card-body">
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-1" class="">1st Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-1" type="text" class="form-control" value="<?php echo $property['co_appr_1']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-2" class="">2nd Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-2" type="text" class="form-control" value="<?php echo $property['co_appr_2']; ?>">
													</div>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-3" class="">3rd Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-3" type="text" class="form-control" value="<?php echo $property['co_appr_3']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-4" class="">4th Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-4" type="text" class="form-control" value="<?php echo $property['co_appr_4']; ?>">
													</div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-5" class="">5th Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-5" type="text" class="form-control" value="<?php echo $property['co_appr_5']; ?>">
													</div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-6" class="">6th Yr Asset Appreciation (%)</label>
														<input name="co-appr[]" id="co-appr-6" type="text" class="form-control" value="<?php echo $property['co_appr_6']; ?>">
													</div>
												</div>
											</div>

											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-appr-1" class="">1st Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-1" type="text" class="form-control" value="<?php echo $property['co_rent_1']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-rent-2" class="">2nd Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-2" type="text" class="form-control" value="<?php echo $property['co_rent_2']; ?>">
													</div>
												</div>
											</div>
											<div class="form-row">

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-rent-3" class="">3rd Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-3" type="text" class="form-control" value="<?php echo $property['co_rent_3']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-rent-4" class="">4th Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-4" type="text" class="form-control" value="<?php echo $property['co_rent_4']; ?>">
													</div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-rent-5" class="">5th Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-5" type="text" class="form-control" value="<?php echo $property['co_rent_5']; ?>">
													</div>
												</div>

												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="co-rent-6" class="">6th Yr Rent (%)</label>
														<input name="co-rent[]" id="co-rent-6" type="text" class="form-control" value="<?php echo $property['co_rent_6']; ?>">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="payment-plan" class="">Hold period</label>
														<select id="hold-period" class="form-control hold-period allFields">
															<option <?php echo (@$property['hold_period'] == 'Free hold') ? 'selected="selected"' : ''; ?> value="Free hold">Free Hold</option>
															<option <?php echo (@$property['hold_period'] == 'One year') ? 'selected="selected"' : ''; ?> value="One year">One year</option>
															<option <?php echo (@$property['hold_period'] == 'Two years') ? 'selected="selected"' : ''; ?> value="Two years">Two years</option>
															<option <?php echo (@$property['hold_period'] == 'Three years') ? 'selected="selected"' : ''; ?> value="Three years">Three years</option>
															<option <?php echo (@$property['hold_period'] == 'Four years') ? 'selected="selected"' : ''; ?> value="Four years">Four years</option>
															<option <?php echo (@$property['hold_period'] == 'Five years') ? 'selected="selected"' : ''; ?> value="Five years">Five years</option>
															<option <?php echo (@$property['hold_period'] == 'Six years') ? 'selected="selected"' : ''; ?> value="Six years">Six years</option>
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
												<div class="col-md-4">
													<div class="position-relative form-group">
														<label for="pool-buy" class="">Turn on buy pool</label>
														<select class="form-control pool-buy allFields">
															<option <?php if ($property['pool_buy'] == 'yes') {
																		echo 'selected="selected"';
																	} ?> value="yes">Yes</option>
															<option <?php if ($property['pool_buy'] == 'no') {
																		echo 'selected="selected"';
																	} ?> value="no">No</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="position-relative form-group"><label for="pooling-units" class="">Total units</label><input name="pooling-units" id="pooling-units" type="number" min="0" value="<?php echo $property['pool_units']; ?>" class="form-control"></div>
												</div>
												<div class="col-md-4">
													<div class="position-relative form-group"><label for="available-units" class="">Units available</label><input name="available-units" id="available-units" type="number" min="0" value="<?php echo $property['available_units']; ?>" class="form-control"></div>
												</div>
											</div>

											<div class="form-row">
												<div class="col-md-6">
													<div class="position-relative form-group">
														<label for="payment-plan" class="">Percentage per share</label>
														<input name="pps" id="pps" value="<?php echo $property['percentage_per_share']; ?>" type="text" class="form-control allFields">
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
									<button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
										<h5 class="m-0 p-0">Amenities</h5>
									</button>
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
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="tenentable" class="">Does this property have tenants?</label>
													<select class="form-control tenantable allFields">
														<option <?php if ($property['tenantable'] == 'yes') {
																	echo "selected";
																} ?> value="yes">Yes</option>
														<option <?php if ($property['tenantable'] == 'no') {
																	echo "selected";
																} ?> value="no">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group"><label for="property-size" class="">Property Size</label><input name="property-size" id="property-size" placeholder="" type="text" class="form-control" value="<?php echo $property['property_size']; ?>"></div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="toilet-number" class="">Toilet</label>
													<input name="toilet-number" id="toilet-number" type="number" min="0" max="99" class="form-control" value="<?php echo $property['toilet']; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="floor-level" class="">Floor</label>
													<input name="floor-level" id="floor-level" value="<?php echo $property['floor_level']; ?>" type="number" min="0" max="99" class="form-control">
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div id="headingThree" class="card-header">
									<button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
										<h5 class="m-0 p-0">Location</h5>
									</button>
								</div>
								<div data-parent="#accordion" id="collapseOne3" class="collapse">
									<div class="card-body">
										<div class="position-relative form-group"><label for="location-info" class="">Location Info</label>
											<textarea name="location-info" class="location-info form-control" rows="8"><?php echo $property['location_info']; ?></textarea>
										</div>
									</div>
								</div>

								<div class="card">
									<div id="headingFour" class="card-header">
										<button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block">
											<h5 class="m-0 p-0">Floor Plan</h5>
										</button>
									</div>
									<div data-parent="#accordion" id="collapseOne4" class="collapse">
										<div class="card-body">
											<div class="col-md-6">
												<div class="position-relative form-group"><label for="plan-image" class="">Plan Image</label><input name="plan-image" id="floor-plan" type="file" class="floor-plan form-control" /></div>
											</div>
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
										<div class="card-body">
											<div class="file_drag_area" id="file_drag_area">
												Drop Files Here
											</div>
											<div id="uploaded_files">
												<label>Click to add Images</label>
												<input type="file" name='userfile[]' id="multipleUplFiles" class='multipleUplFiles' multiple />
											</div>

											<?php // Added for s3 integration

											require 'vendor/autoload.php'; // Include the AWS SDK

											$bucketName = 'dev-bss-uploads';

											$region = 'eu-west-1';

											$s3 = new Aws\S3\S3Client([

												'version' => 'latest',

												'region' => $region,
											]);

											$propertyImageFolder = $property['image_folder'];

											try {

												$objects = $s3->listObjectsV2([

													'Bucket' => $bucketName,

													'Prefix' => 'uploads/buytolet/' . $propertyImageFolder . '/'
												]);

												$imageObjects = $objects['Contents'];
											} catch (Aws\Exception\AwsException $e) {

												echo $e->getMessage();

												exit();
											}

											?>

											<!-- // -->

											<div id="uploaded_images">
												<?php
												foreach ($imageObjects as $object) {

													$key = $object['Key'];

													$file = basename($key);

													if ($file !== '.' && $file !== '..') {

														$imgUrl = $s3->getObjectUrl($bucketName, $key); // Get the URL for the image in S3

														// Rest of your HTML code for displaying the images
												?>
														<span class="imgCover removal-id-<?php echo $file; ?>" id="id-<?php echo $file; ?>">
															<img src="<?php echo $imgUrl; ?>" id="<?php echo $file; ?>" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
															<?php if ($file == $property['featured_image']) {
																echo '<span class="featTT">Featured</span>';
															} ?>
															<div class="remove-img img-removal" id="img-properties-<?php echo $file; ?>">remove <i class="fa fa-trash"></i></div>
														</span>
												<?php

													}
												}

												?>

											</div>

											<!-- // -->

										</div>
									</div>
								</div>
								<input type="hidden" name="propID" id="propID" class="propID" value="<?php echo $property['propertyID']; ?>" />
								<input type="hidden" name="foldername" id="foldername" class="folderName" value="<?php echo $property['image_folder']; ?>" />
								<input type="hidden" name="featuredPic" id="featuredPic" class="featuredPic" value="<?php echo $property['featured_image']; ?>" />
							</div>
							<button type="submit" id="editPropBut" class="mt-2 btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function() {

			var startDate = new Date(new Date("<?php echo date('Y/m/d', strtotime($property['start_date'])); ?>").getFullYear(), new Date("<?php echo date('Y/m/d', strtotime($property['start_date'])); ?>").getMonth(), new Date("<?php echo date('Y/m/d', strtotime($property['start_date'])); ?>").getDate());

			var finishDate = new Date(new Date("<?php echo date('Y/m/d', strtotime($property['finish_date'])); ?>").getFullYear(), new Date("<?php echo date('Y/m/d', strtotime($property['finish_date'])); ?>").getMonth(), new Date("<?php echo date('Y/m/d', strtotime($property['finish_date'])); ?>").getDate());

			var maturityDate = new Date(new Date("<?php echo date('Y/m/d', strtotime($property['maturity_date'])); ?>").getFullYear(), new Date("<?php echo date('Y/m/d', strtotime($property['maturity_date'])); ?>").getMonth(), new Date("<?php echo date('Y/m/d', strtotime($property['maturity_date'])); ?>").getDate());

			var closingDate = new Date(new Date("<?php echo date('Y/m/d', strtotime($property['closing_date'])); ?>").getFullYear(), new Date("<?php echo date('Y/m/d', strtotime($property['closing_date'])); ?>").getMonth(), new Date("<?php echo date('Y/m/d', strtotime($property['closing_date'])); ?>").getDate());

			$('#start-date').datetimepicker({
				format: 'DD-MM-YYYY',
				defaultDate: startDate
				/*daysOfWeekDisabled: disabledDays,
				disabledDates: [
				    moment("03/29/2021"), "03/30/2021 00:53"
				]*/
			});
			$('#finish-date').datetimepicker({
				format: 'DD-MM-YYYY',
				defaultDate: finishDate
			});

			$('#maturity-date').datetimepicker({
				format: 'DD-MM-YYYY',
				defaultDate: maturityDate
			});
			$('#closing-date').datetimepicker({
				format: 'DD-MM-YYYY',
				defaultDate: closingDate
			});
		});
	</script>
	<script src="<?php echo base_url(); ?>assets/js/drag-drop-buytolet-image.js"></script>
	<script src="<?php echo base_url() . 'assets/js/country-picker.js' ?>"></script>
	<script src="<?php echo base_url() . 'assets/js/state-picker.js' ?>"></script>