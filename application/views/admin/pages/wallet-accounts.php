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
					    Wallets
					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header"><?php //if(is_array(@$rss_users)){ echo count($rss_users)." of ".$total_count; }else{ echo "0 of ".$total_count; } ?>
						<form action="<?php echo base_url('admin/search-accounts'); ?>" method="POST">
							<div class="search-wrapper active">
								<div class="input-holder">
									<input name="search-input" type="text" class="search-input" placeholder="Type to search">
									<button class="search-icon"><span></span></button>
								</div>
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

								<th class="text-left">Account No</th>

								<th class="text-left">Credit Limit</th>

								<th class="text-left">Balance</th>

								<th class="text-left">Platform</th>

								<th class="text-left">Action</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($accounts) && !empty($accounts)) {

									foreach($accounts as $account => $value) {

							?>	



							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['firstName'].'-'.$value['email'].'-'.$value['userID'] ?>" />
								</td>

								<td>
									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<div class="widget-heading"><?php echo ucfirst($value['lastName']).' '.ucfirst($value['firstName']); ?></div>
													<div class="widget-subheading"><b>Account name:</b><?php echo $value['account_name']; ?> <?php //echo date('d M Y', strtotime($value['lastLogin'])); ?></div>
												</div>

											</div>											

										</div>

									</div>

								</td>

								<td class="text-left"><?php echo $value['account_number'] ?></td>

								<td class="text-left"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['credit_limit']) ?></td>

								<td class="text-left"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['account_balance']) ?></div></td>
								
								<td class="text-left"><?php echo @$value['platform']; ?></td>

								<td class="text-left">

									<button type="button" class="btn btn-primary btn-sm article-detail"><a style="color:white;" href="<?php echo base_url()."admin/wallet/".$value['userID']; ?>">History</a></button>
									<button type="button" id="deduction-btn-<?php echo $value['userID']; ?>" class="btn btn-primary btn-sm deduction-btn"><a style="color:white;">Deduct</a></button>
									
								</td>

							</tr>
							
							<tr class="deduction-line" id="deduction-line-<?php echo $value['userID']; ?>">
								<td class="text-left">
									<!---<input type="checkbox" class="action-item" id="<?php //echo $value['firstName'].'-'.$value['email'].'-'.$value['userID'] ?>" />--->
								</td>

								<td>
									<input id="deduction-amount-<?php echo $value['userID']; ?>" class="form-control" autocomplete="off" placeholder="Amount to deduct" />

								</td>

								<td class="text-left">
								    <select id="deduction-purpose-<?php echo $value['userID']; ?>" name="deduction-purpose" class="form-control deduction-purpose">
								        <option value="">Purpose</option>
								        <option value="Light">Light</option>
								        <option value="Water">Water</option>
								        <option value="Rent">Rent</option>
								        <option value="Service Charge">Service Charge</option>
								        <option value="Security Deposit">Security Deposit</option>
								        <option value="Diesel">Diesel</option>
								        <option value="PHCN">PHCN</option>
								        <option value="Late Fee">Late Fee</option>
								    </select>
								</td>

								<td class="text-left">&nbsp;</td>

								<td class="text-left">&nbsp;</td>
								
								<td class="text-left">&nbsp;</td>

								<td class="text-left">
									<button type="button" id="deduct-charges-<?php echo $value['userID']; ?>" class="btn btn-primary btn-sm deduct-charges"><a style="color:white;">Submit</a></button>
									
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