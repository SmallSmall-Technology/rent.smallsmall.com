 <div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-mail-open-file icon-gradient bg-mean-fruit">

						</i>

					</div>

					<div>Inspection Requests</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header">
					    <form action="<?php echo base_url('admin/search-inspection'); ?>" method="POST">
							<div class="search-wrapper active">
								<div class="input-holder">
									<input name="search-input" type="text" class="search-input" placeholder="Type to search">
									<button class="search-icon"><span></span></button>
								</div>
								<!---<button class="close"></button>--->
							</div>
						</form>

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

								<th class="text-left">Status</th>

								<th class="text-left">Entry Date</th>

								<th class="text-left">Actions</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($inspections) && !empty($inspections)) {

									foreach($inspections as $inspection => $value) {
							?>	

							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['inspectionID'] ?>" />
								</td>

								<td class="text-left">

									<?php 
										echo $value['firstName'].' '.$value['lastName'];
									?>

								</td>
								<td class="text-left">

									<?php 
										echo '<a target="_blank" href="'.base_url().'property/'.$value['propertyID'].'">'.$value['propertyTitle'].'</a>';
									?>

								</td>

								<td class="text-left"><?php echo date("M d, y g:i A", strtotime($value['inspectionDate'])); ?></td>
								
								<td>
									<?php
										if($value['msg_status'] == 'read'){
											echo '<i style="color:green;font-size:20px" class="metismenu-icon pe-7s-mail-open"></i>';
										}elseif($value['msg_status'] == 'unread'){
											echo '<i style="color:red;font-size:20px" class="metismenu-icon pe-7s-mail"></i>';
											
										}elseif($value['msg_status'] == 'new'){
											echo '<i style="color:red;font-size:20px" class="metismenu-icon pe-7s-mail"></i>';
											
										}else{
											echo "Error!!!";
										}
									?>
								</td>

								<td class="text-left"><?php echo date("M-d-y", strtotime($value['dateOfLoggingInspection'])); ?></td>

								<td class="text-left">
									<!--<a role="tab" class="nav-link active" data-toggle="modal" data-target="#exampleModalLong">-->
									<button data-toggle="modal" data-target="#exampleModalLong" type="button" id="request-<?php echo $value['insID']."-".$value['msgID']; ?>" class="btn btn-primary btn-sm inspection-detail">Details</button>
									
									<!---<button  type="button"  class="btn btn-primary btn-sm"><a style="color:#FFF" href="<?php //echo base_url(); ?>admin/notify-cx/<?php //echo $value['inspectionID']; ?>">Notify</a></button>--->
 
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