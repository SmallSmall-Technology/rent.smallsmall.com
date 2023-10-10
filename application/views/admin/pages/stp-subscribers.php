<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-home icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>
						Subscribers
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">
						<form action="<?php echo base_url('admin/search-subscribers'); ?>" method="POST">
						<div class="search-wrapper active">
							<div class="input-holder">
								<input name="search-input" type="text" class="search-input" placeholder="Type to search">
								<button class="search-icon"><span></span></button>
							</div>
							<button class="close"></button>
						</div>
						</form>
						<div class="btn-actions-pane-right">
							
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-left">&nbsp;</th>
								<th class="text-left">Name</th>
								<!---<th class="text-left">Property</th>--->
								<th class="text-left">Frequency</th>
								<th class="text-left">Amount</th>
								<th class="text-left">Subscription Date</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($subscriptions) && !empty($subscriptions)) {
									foreach($subscriptions as $subscription => $value) {
										
										/*if($value['available_date'] > date('Y-m-d H:i:s')){
											$stat = 'badge-danger';
											$status = "Rented";
										}else{
											$stat = 'badge-success';
											$status = "Vacant";
										}*/
							?>	

							<tr id="sub-<?php echo $value['stp_id']; ?>">
								<td class="text-left"><?php if($value['active']){ ?>
								        <i style="color:green" class="fa fa-lock"></i>
								    <?php }else{ ?>
								        <i style="color:red" class="fa fa-unlock"></i>
								    <?php } ?></td> 
								<td>
								    <div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">
													<div class="widget-heading"><?php echo ucfirst($value['firstName']).' '.ucfirst($value['lastName']); ?></div>
													<div class="widget-subheading"><b>Email:</b><?php echo $value['email']; ?> </div>
													<div class="widget-subheading"><b>Phone:</b><?php echo $value['phone']; ?> </div>
												</div>

											</div>											

										</div>

									</div>
								</td>
								<!---<td class="text-left"><?php //echo '<a target="_blank" href="'.base_url().'apartment/'.$value['propertyID'].'">'.$value['property_name'].'</a>'; ?></td>--->
								<!--<td class="text-left"><?php //echo $value['city'].', '.$value['name'] ?></td>
								<td class="text-left"><?php //echo $value['type'] ?></td>-->
								<td class="text-left">
								    <span class="badge badge-success"><?php echo ucfirst($value['frequency']); ?></span>
								</td>
								<td class="text-left">
								    N<?php echo number_format($value['amount']); ?>
								</td>
								<td class="text-left"><?php echo date("M d, Y", strtotime($value['date_subscribed'])); ?></td>
								<td class="text-left">
									<div class="action-container">
										
										<button type="button" id="delete-<?php echo $value['stp_id']; ?>" class="btn btn-primary btn-sm delete-request">Delete</button>
									</div>
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
