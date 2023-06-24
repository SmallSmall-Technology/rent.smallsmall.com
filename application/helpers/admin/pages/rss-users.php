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
					    Users

					</div>

				</div>

			</div>

		</div>            

		

		<div class="row">

			<div class="col-md-12">

				<div class="main-card mb-3 card">

					<div class="card-header"><?php //if(is_array(@$rss_users)){ echo count($rss_users)." of ".$total_count; }else{ echo "0 of ".$total_count; } ?>
						<form action="<?php echo base_url('admin/search-users'); ?>" method="POST">
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
											<option value="verify">Verify</option>
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

								<th class="text-left">Email</th>

								<th class="text-left">Phone</th>

								<th class="text-left">Verified</th>

								<th class="text-left">Registration</th>

								<th class="text-left">Action</th>

							</tr>

							</thead>

							<tbody>

							<?php

								if (isset($rss_users) && !empty($rss_users)) {

									foreach($rss_users as $rss_user => $value) {

							?>	



							<tr>
								<td class="text-left">
									<input type="checkbox" class="action-item" id="<?php echo $value['firstName'].'-'.$value['email'].'-'.$value['userID'] ?>" />
								</td>

								<td>

									<?php

										/*if($value['image'] == NULL || $value['image'] ==  ''){

											$pic = 'default-img.png';

										}else{

											$pic = $value['image'];

										}*/

									?>

									<div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">

													<div class="widget-heading"><?php echo $value['firstName'].' '.$value['lastName']; ?></div>
													<div class="widget-subheading"><b>Last Login:</b> <?php echo date('d M Y', strtotime($value['lastLogin'])); ?></div>
												</div>

											</div>											

										</div>

									</div>

								</td>

								<td class="text-left"><?php echo $value['email'] ?></td>

								<td class="text-left"><?php echo $value['phone'] ?></td>

								<td class="text-center">
                                    <?php $badge = 'danger'; $term = ''; 
                                    
                                        if($value['verified'] == 'yes'){ 
                                            
                                            $badge = 'success'; 
                                            $term = 'Verified'; 
                                            
                                        }elseif($value['verified'] == 'no'){
                                            
                                            $badge = 'danger'; 
                                            $term = 'Unverified'; 
                                            
                                        } 
                                    ?>
                                    
                                    
									<div class="badge badge-<?php echo $badge; ?>"><?php echo $term; ?></div>

								</td>
								<td class="text-left"><?php echo date('d-m-Y', strtotime(@$value['regDate'])); ?></td>

								<td class="text-left">

									<button type="button" class="btn btn-primary btn-sm article-detail"><a style="color:white;" href="<?php echo base_url()."admin/user-profile/".$value['userID']; ?>">Details</a></button>
									<!---<button type="button" id="article-<?php //echo $value['referral']; ?>" class="btn btn-primary btn-sm article-detail">Renew</button>--->

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