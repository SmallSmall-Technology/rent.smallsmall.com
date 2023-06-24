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
					    Articles
					</div>
				</div>
			</div>
		</div>            
	
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">All Articles
						<!---<form action="<?php //echo base_url('admin/search-properties'); ?>" method="POST">
						<div class="search-wrapper active">
							<div class="input-holder">
								<input name="search-input" type="text" class="search-input" placeholder="Type to search">
								<button class="search-icon"><span></span></button>
							</div>
							<button class="close"></button>
						</div>
						</form>--->
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
								<!---<th class="text-left">&nbsp;</th>--->
								<th class="text-left">Title</th>
								<!--<th class="text-left">Location</th>
								<th class="text-left">Type</th>-->
								<th class="text-left">Views</th>
								<th class="text-left">Author</th>
								<th class="text-left">Posted</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($articles) && !empty($articles)) {
									foreach($articles as $article => $value) {
										
										
							?>	

							<tr>
								<!---<td class="text-left"><input type="checkbox" class="props-checkbox" id="<?php //echo $value['propertyID'] ?>" /></td> --->
								<td class="text-left"><?php echo $value['articleTitle']; ?></td>
								
								<td class="text-left"><?php echo $value['views'] ?></td>
								<td class="text-left">
								    <?php echo $value['firstName']." ".$value['lastName']; ?>
								</td>
								<td class="text-left">
								    <?php echo date("d M Y" , strtotime($value['datePosted'])); ?>
								</td>
								<td class="text-left">
									<div class="action-container">
										<a href="<?php echo base_url()."admin/edit-article/".$value['articleID']; ?>" type="button" id="article-<?php echo $value['articleID']; ?>" class="btn btn-primary btn-sm article-detail">Edit</a>

										<button type="button" id="article-<?php echo $value['articleID'].'_'.$value['articleSlug']; ?>" class="btn btn-primary btn-sm article-delete">Delete</button>

										
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