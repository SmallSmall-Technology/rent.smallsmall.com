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
						Wallet Transactions
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
					    <form action="<?php echo base_url('admin/search-wallet-transactions/'); ?>" method="POST">
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
								<th width="70px" class="text-left">&nbsp;</th>
								<th width="300px" class="text-left">Amount</th>
								<th width="300px" class="text-left">Type</th>
								<th width="300px" class="text-left">Mode of payment</th>
								<th width="300px" class="text-left">Date</th>
								<th width="100px" class="text-left">Status</th>
								<th width="300px" class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($transactions) && !empty($transactions)) {
									foreach($transactions as $transaction => $value) {
									    
									    $stat = '';
									    
									    $type = '';
										
										if($value['status'] == 'Successful' || $value['status'] == 'successful'){
											$stat = 'badge-success';
										}elseif($value['status'] == 'Pending' || $value['status'] == 'pending'){
											$stat = 'badge-info';
										}elseif($value['status'] == 'Declined' || $value['status'] == 'declined'){
											$stat = 'badge-warning';
										}
										
										if($value['transaction_type'] == 'Credit' || $value['transaction_type'] == 'credit'){
											$type = 'badge-success';
										}elseif($value['transaction_type'] == 'Debit' || $value['transaction_type'] == 'debit'){
											$type = 'badge-warning';
										}
							?>	 
   
							<tr> 
								<td width="70px" class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['id'] ?>" /></td>
								<td class="text-left"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['amount']); ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $type; ?>"><?php echo $value['transaction_type']; ?></div></td>
								<td class="text-left"><?php echo $value['mode_of_payment']; ?></td>
								<td class="text-left"><?php echo date("d M Y - H:i", strtotime($value['transaction_date'])); ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['status']; ?></div></td>
								<td class="text-left">
									<?php if($value['status'] == 'Pending' || $value['tatus'] == 'pending'){ ?>
										<button type="button" id="approve-<?php echo $value['txn_id']; ?>-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>
									<?php }else if($value['status'] == 'Successful'){ ?>
									
									        <!---<a href="<?php //echo base_url().'assets/pdf/tenant/'.$value['txn_id'].'/'.@$value['invoice']; ?>" target="_blank">Download Invoice</a>--->
									
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
