 <div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-wallet icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>
						Transactions
						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
						</div>-->
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">Furnisure Transactions
						
						<div class="btn-actions-pane-right">
							<table>
								<tr>
									<td width="200px">
										<select class="form-control action">
											<option value="">Select Option</option>
											<option value="delete">Delete</option>
											<option value="hold">On Hold</option>
											<option value="release">Release Property</option>
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
								<th class="text-left">Transaction ID</th>
								<th class="text-left">Amount</th>
								<th class="text-left">Booked By</th>
								<th class="text-left">Transaction Date</th>
								<th class="text-left">Status</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($bookings) && !empty($bookings)) {
									foreach($bookings as $booking => $value) {
										
										if($value['status'] == 'New' || $value['status'] == 'new'){
											$stat = 'badge-success';
										}elseif($value['status'] == 'Available' || $value['status'] == 'available'){
											$stat = 'badge-info';
										}elseif($value['status'] == 'Rented' || $value['status'] == 'rented'){
											$stat = 'badge-warning';
										}
							?>	 
   
							<tr>
								<td class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['propertyID'] ?>" /></td>
								<td class="text-left"><?php echo $value['transaction_id'] ?></td>
								<td class="text-left"><?php echo "N ".number_format($value['amount']) ?></td>
								<td class="text-left"><?php echo substr($value['firstName'], 0, 1).' '.$value['lastName'] ?></td>
								<td class="text-left"><?php echo date("d F Y", strtotime($value['transaction_date'])) ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['status'] ?></div></td>
								<td class="text-left">
									<button type="button" id="approve-<?php echo $value['bookingID']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>
									 
									<button type="button" id="article-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm article-detail">Delete</button>
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
