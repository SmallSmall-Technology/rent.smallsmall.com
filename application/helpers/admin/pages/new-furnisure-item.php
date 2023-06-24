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

						Add Furniture						

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">

			<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Furniture Details</h5>

						<form class="" id="furnitureForm">

							<div class="form-result"></div>

							<div class="position-relative form-group"><label for="title" class="">Furniture Title</label><input name="title" id="title" placeholder="Title" type="text" class="form-control verify-field"></div>

							

							<div class="position-relative form-group"><label for="category" class="">Furniture Category</label>

								<select name="category" id="category" class="form-control verify-field">

									<option></option>

									<?php

										foreach($categories as $category => $value){

											echo "<option value='".$value['id']."'>".$value['category']."</option>";

										}

									?>

								</select>

							</div>

							<div class="position-relative form-group"><label for="type" class="">Furniture Type</label>

								<select name="type" id="type" class="form-control verify-field">

									<option></option>

									<?php

										foreach($types as $type => $value){

											echo "<option value='".$value['id']."'>".$value['type']."</option>";

										}

									?>

								</select>

							</div>

							

							<div class="form-row">

								<div class="col-md-6">

									<div class="position-relative form-group"><label for="cost" class="">Cost</label><input name="cost" id="cost" type="text" class="form-control verify-field"></div>

								</div>

								<div class="col-md-6">

									<div class="position-relative form-group"><label for="sec-deposit" class="">Security Deposit</label><input name="sec-deposit" id="sec-deposit" type="text" class="form-control verify-field"></div>

								</div>

								

							</div>

							

							<div class="position-relative form-group"><label for="propDesc" class="">Item Description</label>

								<textarea name="propDesc" class="desc" id="txtDefaultHtmlArea" class="form-control verify-field" rows="8"></textarea>

							</div>

							

							<!--<div class="position-relative form-check"><input name="newProp" id="newProp" type="checkbox" class="form-check-input"><label for="newProp" class="form-check-label">Check if you want property tagged "New"</label></div>-->

							

					</div>

				</div>

				<div class="main-card mb-3 card">

					<div class="card-body"><h5 class="card-title">Other Details</h5>

						<div>

							<div id="accordion" class="accordion-wrapper mb-3">

                                        <div class="card">

                                            <div id="headingOne" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">

                                                    <h5 class="m-0 p-0">Payment Description</h5>

                                                </button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse">

												<div class="card-body">

													<div class="position-relative form-group"><label for="payment-info" class="">Payment Info</label><textarea name="payment-info" id="payment-info" class="form-control"></textarea></div>								

													

                                            	</div>

											</div>

                                        </div>

                                        <div class="card">

                                            <div id="headingTwo" class="b-radius-0 card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Delivery Info</h5></button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne2" class="collapse">

                                                <div class="card-body">

													<div class="card-body">

													<div class="position-relative form-group"><label for="delivery-info" class="">Delivery Info</label><textarea name="delivery-info" id="delivery-info" class="form-control"></textarea></div>								

													

                                            	</div>

												</div>

                                            </div>

                                        </div>

                                        <div class="card">

                                            <div id="headingThree" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Specification Details</h5></button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne3" class="collapse">

                                                <div class="card-body">

													<div class="position-relative form-group"><label for="specs-info" class="">Specification</label><textarea name="specs-info" id="specs-info" class="form-control"></textarea></div>									

													

                                            	</div>

                                            </div>

                                        </div>

																		

										<div class="card">

                                            <div id="headingSix" class="card-header">

                                                <button type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseSix" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Furniture Images</h5></button>

                                            </div>

                                            <div data-parent="#accordion" id="collapseOne6" class="collapse">

                                                <div class="card-body">

													<div class="file_drag_area" id="file_drag_area">

														Drop Files Here

													</div>

													<div id="uploaded_files">

														<input type="file" name='multipleUplFiles[]' id="multipleUplFiles" class='multipleUplFiles' multiple />

													</div>

													<div id="uploaded_images">



													</div>

													<input type="hidden" id="foldername" class="folderName" value="" />							

													<input type="hidden" id="featuredPic" class="featuredPic" value="" />

												</div>

                                            </div>

                                        </div>

                                    </div>

								<button id="newFurnitureBut" class="mt-2 btn btn-primary">Upload Item</button>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<script src="<?php echo base_url(); ?>assets/js/drag-drop-furnisure-image.js"></script>