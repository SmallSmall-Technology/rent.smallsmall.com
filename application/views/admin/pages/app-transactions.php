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
						
						mobile app Transactions
						
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">
						
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
								<th width="70px" class="text-left">&nbsp;</th>
								<th width="300px" class="text-left">Booked By</th>
								<th width="300px" class="text-left">Amount</th>
								<th width="300px" class="text-left">Date of txn</th>
								<th width="300px" class="text-left">Expiry</th>
								<th width="100px" class="text-left">Status</th>
								<th width="300px" class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($txns) && !empty($txns)) {
									foreach($txns as $txn => $value) {
										
										if($value['status'] == 'Success' || $value['status'] == 'success'){
											$stat = 'badge-success';
										}elseif($value['status'] == 'Initiated' || $value['status'] == 'initiated'){
											$stat = 'badge-info';
										}else{
											$stat = 'badge-warning';
										}
							?>	 
   
							<tr> 
								<td width="70px" class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['property_id'] ?>" /></td>
								<td class="text-left"><?php echo $value['name']; ?></td>
								<td class="text-left"><?php echo number_format($value['amount']); ?></td>
								<td class="text-left"><?php echo date("d M Y", strtotime($value['created_at'])); ?></td>
								<td class="text-left"><?php echo date("d M Y", strtotime($value['expires_at'])); ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['status']; ?></div></td>
								<td class="text-left">
									<?php if($value['status'] == 'Initiated' || $value['status'] == 'initiated'){ ?>
										<button type="button" id="approve-<?php echo $value['txn_reference']."-".$value['property_id']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>
									<?php } ?>									
									 
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
