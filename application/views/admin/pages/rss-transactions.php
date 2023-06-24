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
					<div class="card-header">
					    <form action="<?php echo base_url('admin/search-transactions/'); ?>" method="POST">
							<div class="search-wrapper active">
								<div class="input-holder">
									<input name="search-input" type="text" class="search-input" placeholder="Type to search">
									<button class="search-icon"><span></span></button>
								</div>
							</div>
						</form>
						
						<div class="btn-actions-pane-right">
							<!---<table>
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
							</table>--->							
                        	
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th width="70px" class="text-left">&nbsp;</th>
								<th width="300px" class="text-left">Booked By</th>
								<th width="300px" class="text-left">Mode of payment</th>
								<th width="300px" class="text-left">Amount</th>
								<th width="300px" class="text-left">Date</th>
								<th width="100px" class="text-left">Status</th>
								<th width="300px" class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($bookings) && !empty($bookings)) {
									foreach($bookings as $booking => $value) {
										
										if($value['payment_status'] == 'Approved' || $value['payment_status'] == 'approved'){
											$stat = 'badge-success';
										}elseif($value['payment_status'] == 'Pending' || $value['payment_status'] == 'pending'){
											$stat = 'badge-info';
										}elseif($value['payment_status'] == 'Declined' || $value['payment_status'] == 'declined'){
											$stat = 'badge-warning';
										}
							?>	 
   
							<tr> 
								<td width="70px" class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['transaction_id'] ?>" /></td>
								<td class="text-left"><?php echo substr($value['firstName'], 0, 1).' '.$value['lastName']; ?></td>
								<td class="text-left"><?php echo ucfirst($value['payment_type']); ?></td>
								<td class="text-left"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['amount']); ?></td>
								<td class="text-left"><?php echo date("d M Y - H:i", strtotime($value['transaction_date'])); ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['payment_status']; ?></div></td>
								<td class="text-left">
									<?php if($value['payment_status'] == 'Pending' || $value['payment_status'] == 'pending'){ ?>
										<button type="button" id="approve-<?php echo $value['reference_id']; ?>-<?php echo $value['transaction_id']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>
									<?php }else if($value['payment_status'] == 'approved' && !empty($value['invoice'])){ ?>
									
									        <a href="<?php echo base_url().'assets/pdf/tenant/'.$value['transaction_id'].'/'.$value['invoice']; ?>" target="_blank">Download Invoice
									
									<?php } ?>
									  
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
