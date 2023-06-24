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
						Property Alert Entries
						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
						</div>-->
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Properties
						
						<div class="btn-actions-pane-right">
													
                        	
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-left">First Name</th>
								<th class="text-left">Last Name</th>
								<th class="text-left">Type</th>
								<th class="text-left">Price Range</th>
								<th class="text-left">Location</th>
								<th class="text-left">Email</th>
								<th class="text-left">Phone</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($properties) && !empty($properties)) {
									foreach($properties as $property => $value) {
										
							?>	

							<tr>
								
								<td class="text-left"><?php echo $value['firstname']; ?></td>
								<td class="text-left"><?php echo $value['lastname']; ?></td>
								<td class="text-left"><?php echo $value['type']; ?></td>
								<td class="text-left"><?php echo '<span style="font-family:helvetica;">&#x20A6;</span>'. number_format($value['min_price']).' - <span style="font-family:helvetica;">&#x20A6;</span>'.number_format($value['max_price']); ?></td>
								<td class="text-left">
								    <?php echo $value['city']; ?>
								</td>
								<td class="text-left">
								    <?php echo $value['email']; ?>
								</td>
								<td class="text-left">
								    <?php echo $value['phone']; ?>
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