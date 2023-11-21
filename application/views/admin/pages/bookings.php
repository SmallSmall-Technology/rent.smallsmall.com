 <div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-notebook icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>
						Bookings
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">
					    <form action="<?php echo base_url('admin/search-bookings/'); ?>" method="POST">
							<div class="search-wrapper active">
								<div class="input-holder">
									<input name="search-input" type="text" class="search-input" placeholder="Type to search">
									<button class="search-icon"><span></span></button>
								</div>
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
								<th class="text-left">Booked By</th>
								<th class="text-left">Tranx Date</th>
								<th class="text-left">Move in</th>
								<th class="text-left">Move out</th>
								<th class="text-left">Status</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								$CI =& get_instance();
								if (isset($bookings) && !empty($bookings)) {
									foreach($bookings as $booking => $value) {
										
										if($value['booking_status'] == 'Approved' || $value['booking_status'] == 'approved'){
											$stat = 'badge-success';
										}elseif($value['booking_status'] == 'Pending' || $value['booking_status'] == 'pending'){
											$stat = 'badge-info';
										}elseif($value['booking_status'] == 'Declined' || $value['booking_status'] == 'declined'){
											$stat = 'badge-warning';
										}
										

										$title = $CI->shorten_title($value['propertyTitle']);

										$data = [];

										$name = $value['firstName'].'-'.$value['lastName'];

										if (in_array($name, $data))
										{
										    
										}

										else
										{
											array_push($data, $name);

											print_r($data);
							?>	 
   
							<tr>
								<td class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['propertyID'] ?>" /></td>
								<td class="text-left">
								    <?php echo substr($value['firstName'], 0, 1).' '.$value['lastName'] ?>
								    <span style="display:block;font-size:12px;color:#e3e3e3"><?php echo "<a href='".base_url()."property/".$value['propertyID']."' />".$title."</a>" ?></span>
								</td>
								<td class="text-left"><?php echo date("d M Y", strtotime($value['transaction_date'])) ?>
								    <!---<div class="widget-subheading"><?php //echo ucfirst($value['payment_type']); ?></div>--->
								</td>
								<td class="text-left"><?php echo date("d M Y", strtotime($value['move_in_date'])) ?></td>
								<td class="text-left"><?php echo date("d M Y", strtotime(@$value['next_rental'])) ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['status'] ?></div></td>
								<td class="text-left">
									<div class="action-container">
										<?php //if($value['status'] == 'Pending' || $value['status'] == 'pending'){ ?>
											<!---<button type="button" id="approve-<?php //echo $value['reference_id']."-".$value['propertyID']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>---> 
										<?php //} ?> 
										<!-- <button type="button" class="btn btn-primary btn-sm article-detail"><a style="color:white;" href="<?php echo base_url()."admin/booking/".$value['bookingID']; ?>">Details</a></button>
										<button type="button" id="booking-<?php echo $value['bookingID']; ?>-<?php echo $value['propertyID']; ?>" class="btn btn-primary btn-sm delete-booking">Delete</button> -->

										<button type="button" class="btn btn-primary btn-sm article-detail"><a style="color:white;" href="<?php echo base_url()."admin/userbooking/".$value['buserId']; ?>">Details</a></button>
										<button type="button" id="booking-<?php echo $value['bookingID']; ?>-<?php echo $value['propertyID']; ?>" class="btn btn-primary btn-sm delete-booking">Delete</button>
									</div>
								</td>
							</tr> 
							<?php    
									}
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