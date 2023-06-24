 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-users icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>App Verification Requests

						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.

						</div>-->

					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">All Requests - <?php //echo count($rss_users)." of ".$total_count; ?>
						<form action="<?php echo base_url('admin/search-verification'); ?>" method="POST">
							<div class="search-wrapper active">
								<div class="input-holder">
									<input name="search-input" type="text" class="search-input" placeholder="Type to search">
									<button class="search-icon"><span></span></button>
								</div>
								<button class="close"></button>
							</div>
						</form>

						<div class="btn-actions-pane-right">
							<table>
								<tr>
									<td width="200px">
										<select class="form-control action" id="action">
											<option value="">Select Option</option>
											<option value="approve">Approve</option>
											<option value="deny">Deny</option>
											<option value="delete">Delete</option>
										</select>
									</td>
									<td>
										<button type="button" id="" class="btn btn-primary btn-sm verification-action">Submit</button>
									</td>
								</tr>
							</table>							
                        	
						</div>

					</div>

					<div class="table-responsive">

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>
								<th class="text-left">&nbsp;</th>

								<th class="text-left">Name</th>

								<th class="text-left">Marital Status</th>

								<th class="text-left">Occupation</th>

								<th class="text-left">Income</th>

								<th class="text-left">Status</th>

								<th class="text-left">Received On</th>

								<th class="text-left">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($verifications) && !empty($verifications)) {

									foreach($verifications as $verification => $value) {

							?>	



							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['id'].'-'.$value['user_id'].'-'.$value['email'] ?>" />
								</td>

								<td>

									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<div class="widget-heading"><?php echo $value['name']; ?></div>
													<div class="widget-subheading"><b>Employment status:</b> <?php echo $value['employment_status']; ?></div>
												</div>

											</div>											

										</div>

									</div>

								</td>

								<td class="text-left"><?php echo $value['marital_status'] ?></td>

								<td class="text-left"><?php echo $value['occupation'] ?></td>

								<td class="text-left"><?php echo "N".number_format($value['gross_annual_income']); ?></td>
								
								<td class="text-left">
									<?php
										if($value['is_verified'] == 2){
											echo '<div class="mb-2 mr-2 badge badge-primary">Verified</div>';
										}else{
											echo '<div class="mb-2 mr-2 badge badge-danger">Unverified</div>';
											
										}
									?>

								</td>
								<td class="text-left">

									<?php echo date("d M Y", strtotime($value['created_at'])); ?>

								</td>

								<td class="text-left">

									<button type="button" class="btn btn-primary btn-sm ver-detail"><a style="color:white;" href="<?php echo base_url()."admin/app-profile/".$value['id']; ?>">Details</a></button>

								</td>

							</tr>

							<?php 

									}

								}

						

							?>

							

							</tbody>

						</table>

					</div>

					<div class="d-block text-center card-footer">

						<div class="paginated"><?php echo $this->pagination->create_links(); ?></div>

					</div>

				</div>

			</div>

		</div>

	</div>q