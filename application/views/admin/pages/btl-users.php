 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-users icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>Buytolet Users

						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.

						</div>-->

					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">All Users - <?php echo count($btl_users)." of ".$total_count; ?>

						<div class="btn-actions-pane-right">
							<!---<table>
								<tr>
									<td width="200px">
										<select class="form-control action">
											<option value="">Select Option</option>
											<option value="delete">Delete</option>
											<option value="deactivate">Deactivate</option>
											<option value="activate">Activate</option>
										</select>
									</td>
									<td>
										<button type="button" id="" class="btn btn-primary btn-sm process-action">Submit</button>
									</td>
								</tr>
							</table>--->							
                        	
						</div>

					</div>

					<div class="table-responsive">

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>

								<th class="text-left">Name</th>

								<th class="text-left">Email</th>

								<th class="text-left">Phone</th>

								<th class="text-left">Registered</th>

								<th class="text-left">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($btl_users) && !empty($btl_users)) {

									foreach($btl_users as $btl_user => $value) {

							?>	



							<tr>

								<td class="text-left"><?php echo $value['firstName'].' '.$value['lastName']; ?></td>

								<td class="text-left"><?php echo $value['email'] ?></td>

								<td class="text-left"><?php echo $value['phone'] ?></td>

								<td class="text-left"><?php echo date( "d M Y", strtotime($value['regDate'])); ?></td>

								<td class="text-left">
								    <button type="button" class="btn btn-primary btn-sm"><a style="color:white;" href="<?php echo base_url().'admin/btl_user/'.$value['userID']; ?>">Details</a></button>

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

	</div>