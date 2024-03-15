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
						Properties
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
					    <form action="<?php echo base_url('admin/search-properties'); ?>" method="POST">
						<div class="search-wrapper active">
							<div class="input-holder">
								<input name="search-input" type="text" class="search-input" placeholder="Type to search">
								<button class="search-icon"><span></span></button>
							</div>
							<!---<button class="close"></button>--->
						</div>
						</form>
						<div class="btn-actions-pane-right">
							<table>
								<tr>
									<td width="200px">
										<select class="form-control action" id="prop-action">
											<option value="">Select Option</option>
											<option value="delete">Delete</option>
											
											<option value="release">Release Property</option>
										</select>
									</td>
									<td>
										<button type="button" id="" class="btn btn-primary btn-sm process-prop-action">Change</button>
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
								<!--<th class="text-left">Location</th>
								<th class="text-left">Type</th>-->
								<th class="text-left">Views</th>
								<th class="text-left">Status</th>
								<th class="text-left">Added</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($properties) && !empty($properties)) {
									foreach($properties as $property => $value) {
										
										if($value['available_date'] > date('Y-m-d H:i:s')){
										    $stat = '<i style="color:red" class="fa fa-lock"></i>';
											//$stat = 'badge-danger';
											//$status = "Rented";
										}else{
											$stat = '<i style="color:green" class="fa fa-unlock"></i>';
										}
							?>	

							<tr>
								<td class="text-left"><input type="checkbox" class="props-check-item" id="<?php echo $value['propertyID'] ?>" /></td> 
								<td class="text-left"><?php echo '<a target="_blank" href="'.base_url().'property/'.$value['propertyID'].'">'.$value['propertyTitle'].'</a>'; ?></td>
								<!--<td class="text-left"><?php //echo $value['city'].', '.$value['name'] ?></td>
								<td class="text-left"><?php //echo $value['type'] ?></td>-->
								<td class="text-left"><?php echo $value['views'] ?></td>
								<td class="text-left">
								    <!---<div class="mb-2 mr-2 badge <?php //echo $stat; ?>"><?php //echo $status; ?></div>--->
								    <?php echo $stat; ?>
								</td>
								<td class="text-left">
								    <?php echo date("d M Y" , strtotime($value['dateOfEntry'])); ?>
								</td>
								<td class="text-left">
									<div class="action-container">
										<a href="<?php echo base_url()."admin/edit-property/".$value['propertyID']; ?>" type="button" id="article-<?php echo $value['id']; ?>" class="btn btn-primary btn-sm article-detail">Edit</a>

										<button type="button" id="property-<?php echo $value['propertyID']; ?>" class="btn btn-primary btn-sm property-delete">Delete</button>

										<a href="<?php echo base_url()."admin/clone-property/".$value['propertyID']; ?>" type="button"  class="btn btn-primary btn-sm article-detail">Copy</a>
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