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
						Buy2let Properties
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Properties
						<form action="<?php echo base_url('admin/search-properties'); ?>" method="POST">
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
								<th class="text-left">Property</th>
								<th class="text-left">Views</th>
								<th class="text-left">Status</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = '';
								if (isset($properties) && !empty($properties)) {
									foreach($properties as $property => $value) {
										
										if($value['status'] == 'New' || $value['status'] == 'new'){
											$stat = 'badge-success';
										}elseif($value['status'] == 'No' || $value['status'] == 'no'){
											$stat = 'badge-info';
											$value['status'] = "Old";
										}elseif($value['status'] == 'Rented' || $value['status'] == 'rented'){
											$stat = 'badge-warning';
										}
							?>	

							<tr>
								<td class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['propertyID'] ?>" /></td>
								<td class="text-left">
								    <div class="widget-heading">
								        <?php echo $value['property_name']; ?>
								    </div>
								    <div style="font-weight:bold;font-size:14px;color:#495057;opacity:.6" class="widget-subheading">
								        Type: <?php echo $value['investmentType']; ?>
								    </div>
								</td>
								
								<td class="text-left"><?php echo $value['views'] ?></td>
								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['status'] ?></div></td>
								<td class="text-left">
									<div class="action-container">
										<a href="<?php echo base_url()."admin/edit-btl/".$value['propertyID']; ?>" type="button" class="btn btn-primary btn-sm article-detail">Edit</a>

										<button type="button" id="property-<?php echo $value['propertyID'].'-'.$value['image_folder']; ?>" class="btn btn-primary btn-sm btl-property-delete">Delete</button>
										
										<?php if($value['availability'] == "Available" || $value['availability'] == ""){ ?>
    										<button type="button" id="property-<?php echo $value['propertyID']; ?>" class="btn btn-primary btn-sm btl-property-sold">Sold</button>
										<?php } ?>

										<a href="<?php echo base_url()."admin/clone-btl-property/".$value['propertyID']; ?>" type="button"  class="btn btn-primary btn-sm article-detail">Copy</a>
										
										<?php if($value['active']){ ?>
    										    <button type="button" id="property-<?php echo $value['propertyID'].'-'.$value['active']; ?>" class="btn btn-primary btn-sm btl-property-listing">Unlist</button>
										<?php }else{ ?>
                                                <button type="button" id="property-<?php echo $value['propertyID'].'-'.$value['active']; ?>" class="btn btn-primary btn-sm btl-property-listing">List</button>
										<?php } ?>
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
