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
					    Adverts
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Adverts
						
						<div class="btn-actions-pane-right">
                        	
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
							<tr>
								<th class="text-left">&nbsp;</th>
								<th class="text-left">Title</th>
								<!--<th class="text-left">Location</th>
								<th class="text-left">Type</th>-->
								<th class="text-left">link</th>
								<th class="text-left">Date</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($notifications) && !empty($notifications)) {
									foreach($notifications as $notification => $value) {
										
										
							?>	

							<tr>
								<td class="text-left"><input type="checkbox" class="notification-checkbox" id="<?php echo $value['id'] ?>" /></td> 
								<td class="text-left"><?php echo $value['title']; ?></td>
								
								<td class="text-left"><?php echo $value['link']; ?></td>
								<td class="text-left"><?php echo date("d M Y" , strtotime($value['date'])); ?></td>
								
					
								<td class="text-left">
									<div class="action-container">
										<a href="<?php echo base_url()."admin/edit-notification/".$value['id']; ?>" type="button" id="notification-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm article-detail">Edit</a>

										<button type="button" id="notification-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm notification-delete">Delete</button>

										
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