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
						Furnisure Items
						<!--<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
						</div>-->
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Items
						<form action="<?php echo base_url('admin/search-items'); ?>" method="POST">
						<div class="search-wrapper active">
							<div class="input-holder">
								<input name="search-input" type="text" class="search-input" placeholder="Type to search">
								<button class="search-icon"><span></span></button>
							</div>
							<button class="close"></button>
						</div>
						</form>
						<div class="btn-actions-pane-right">
							<table>
								<tr>
									<td width="200px">
										<select class="form-control action">
											<option value="">Select Option</option>
											<option value="delete">Delete</option>
											<option value="hold">On Hold</option>
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
								<th class="text-left">Type</th>
								<th class="text-left">Category</th>
								<th class="text-left">Views</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($furnitures) && !empty($furnitures)) {
									foreach($furnitures as $furniture => $value) {
										
							?>	

							<tr>
								<td class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['applianceID'] ?>" /></td> 
								<td class="text-left"><?php echo $value['applianceName'] ?></td>
								<td class="text-left"><?php echo $value['type']; ?></td>
								<td class="text-left"><?php echo $value['categoryName'] ?></td>
								<td class="text-left"><?php echo $value['views'] ?></td>
								<td class="text-left">
									<a href="<?php echo base_url()."admin/edit-item/".$value['applianceID']; ?>" type="button"  class="btn btn-primary btn-sm article-detail">Edit</a>
									<button type="button" id="item-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm delete-item">Delete</button>
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
