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
						Bookings
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
						<form action="<?php echo base_url('admin/search-bookings'); ?>" method="POST">
						<div class="search-wrapper active">
							<div class="input-holder">
								<input name="search-input" type="text" class="search-input" placeholder="Type to search">
								<button class="search-icon"><span></span></button>
							</div>
							<button class="close"></button>
						</div>
						</form>
						<div class="btn-actions-pane-right">
							<!---<table>
								<tr>
									<td width="200px">
										<select class="form-control action">
											<option value="">Select Option</option>
											<option value="delete">Delete</option>
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
								<th class="text-left">&nbsp;</th>
								<th class="text-left">Name</th>
								<th class="text-left">Apartment</th>
								<th class="text-left">Duration</th>
								<th class="text-left">Booking Date</th>
								<th class="text-left">Actions</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$stat = ''; 
								if (isset($apartments) && !empty($apartments)) {
									foreach($apartments as $apartment => $value) {
										
										/*if($value['available_date'] > date('Y-m-d H:i:s')){
											$stat = 'badge-danger';
											$status = "Rented";
										}else{
											$stat = 'badge-success';
											$status = "Vacant";
										}*/
							?>	

							<tr id="booking-<?php echo $value['bookingID']; ?>">
								<td class="text-left"><?php if($value['status']){ ?>
								        <i style="color:green" class="fa fa-lock"></i>
								    <?php }else{ ?>
								        <i style="color:red" class="fa fa-unlock"></i>
								    <?php } ?></td> 
								<td>
								    <div class="widget-content p-0">

										<div class="widget-content-wrapper">

											<div class="widget-content-left mr-3">

												<div class="widget-content-left">
													<div class="widget-heading"><?php echo ucfirst($value['firstname']).' '.ucfirst($value['lastname']); ?></div>
													<div class="widget-subheading"><b>Booking ID:</b><?php echo $value['bookingID']; ?> </div>
												</div>

											</div>											

										</div>

									</div>
								</td>
								<td class="text-left"><?php echo '<a target="_blank" href="'.base_url().'apartment/'.$value['apartmentID'].'">'.$value['apartmentName'].'</a>'; ?></td>
								<!--<td class="text-left"><?php //echo $value['city'].', '.$value['name'] ?></td>
								<td class="text-left"><?php //echo $value['type'] ?></td>-->
								<td class="text-left">
								    <?php echo $value['no_of_nights'] ?> Nights 
								    
								</td>
								<td class="text-left"><?php echo date("Y F d", strtotime($value['date_of_booking'])); ?></td>
								<td class="text-left">
									<div class="action-container">
										<a href="<?php echo base_url()."admin/booking-details/".$value['bookingID']; ?>" type="button" id="article-<?php echo $value['bookingID']; ?>" class="btn btn-primary btn-sm article-detail">Details</a>

										<button type="button" id="book-<?php echo $value['bookingID']; ?>" class="btn btn-primary btn-sm delete-booking">Delete</button>
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