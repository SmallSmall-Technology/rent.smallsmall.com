 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-mail-open-file icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>
					    App Inspection Requests

						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.

						</div>-->

					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">Residential

						<div class="btn-actions-pane-right">

							<!--<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

								<li class="nav-item">

									<a role="tab" class="nav-link active" data-toggle="modal" data-target="#exampleModalLong">

										<span>Add Amenity <i style="font-size:14px;marginleft:5px;" class="fa fa-plus"></i></span>

									</a>

								</li> 	

							</ul>-->

						</div>

					</div>

					<div class="table-responsive">

						<table class="align-middle mb-0 table table-borderless table-striped table-hover">

							<thead>

							<tr>
								<th class="text-left">&nbsp;</th>

								<th class="text-left">From</th>

								<th class="text-left">Property</th>

								<th class="text-left">Inspection Date</th>

								<th class="text-left">Submitted On</th>

								<!---<th class="text-left">Actions</th>--->

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($inspections) && !empty($inspections)) {

									foreach($inspections as $inspection => $value) {

							?>	



							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['id'] ?>" />
								</td>

								<td class="text-left">

									<?php 
										echo $value['name'];
									?>

								</td>
								<td class="text-left">

									<?php 
										echo '<a target="_blank" href="'.base_url().'property/'.$value['pID'].'">'.$value['title'].'</a>';
									?>

								</td>
								
								<td class="text-left"><?php echo date("M d Y", strtotime($value['inspection_time'])); ?></td>
								
								<td class="text-left"><?php echo date("M d Y", strtotime($value['created_at'])); ?></td>

								<!---<td class="text-left">
									<button data-toggle="modal" data-target="#exampleModalLong" type="button" id="request-<?php //echo $value['id']."-".$value['id']; ?>" class="btn btn-primary btn-sm inspection-detail">Details</button>
 
								</td>--->

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