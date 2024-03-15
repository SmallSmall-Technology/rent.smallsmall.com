 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-users icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>
					    Mobile App Users
					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">All Users - <?php echo count($app_users)." of ".$total_count; ?>
						<form action="<?php echo base_url('admin/search-users'); ?>" method="POST">
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
											<option value="delete">Delete</option>
											<option value="deactivate">Deactivate</option>
											<option value="activate">Activate</option>
											<option value="verify">Verify</option>
										</select>
									</td>
									<td>
										<button type="button" id="" class="btn btn-primary btn-sm process-action">Submit</button>
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

								<th class="text-left">Email</th>

								<th class="text-left">Phone</th>

								<th class="text-left">Income</th>

								<th class="text-left">Referral</th>

								<th class="text-left">Registered</th>

								<th class="text-left">Role</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($app_users) && !empty($app_users)) {

									foreach($app_users as $app_user => $value) {

							?>	



							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['name'].'-'.$value['email'].'-'.$value['id'] ?>" />
								</td>

								<td>


									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<div class="widget-heading"><?php echo $value['name']; ?></div>
													</div>
												</div>

											</div>											

										</div>

									</div>

								</td>

								<td class="text-left"><?php echo $value['email'] ?></td>

								<td class="text-left"><?php echo $value['phone'] ?></td>

								<td class="text-left"><?php echo $value['income_level']; ?></td>
								
								<td class="text-left">

									<?php echo $value['about_us']; ?>

								</td>
								<td class="text-left">

									<?php echo date( "d M Y", strtotime(@$value['created_at'])); ?>

								</td>
								<td class="text-left">

									<?php echo $value['role']; ?>

								</td>

								<!---<td class="text-left">--->

									<!--<button type="button" id="article-<?php //echo $value['referral']; ?>" class="btn btn-primary btn-sm article-detail">Details</button>-->

								<!---</td>--->

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

	</div>