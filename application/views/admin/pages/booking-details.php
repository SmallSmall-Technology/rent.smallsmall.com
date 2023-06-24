	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-note2 text-success">

						</i>

					</div>

					<div>

						Booking Details	

					</div>

				</div>
				<div class="page-title-actions">
									<?php if($details['status'] == 0){ ?>
										<button type="button" id="<?php echo $details['bookingID']; ?>-lock"  class="change-status btn-shadow mr-3 btn btn-info">
											Lock <i class="fa fa-lock"></i>
										</button>
									<?php }else{ ?>
										<button type="button" id="<?php echo $details['bookingID']; ?>-unlock"  class="change-status unlock-apt btn-shadow mr-3 btn btn-danger">
											Unlock <i class="fa fa-unlock"></i>
										</button>
									<?php } ?>
                                    
                                </div>
			</div>

		</div> 
		
		<div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Guest Profile</h5>
                                        <table class="mb-0 table">
                                            <!--<thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                            </thead>-->
                                            <tbody>
                                            <tr>
                                                <th width="200px" scope="row">First Name</th>
                                                <td><?php echo $details['firstname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Last Name</th>
                                                <td><?php echo $details['lastname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td><?php echo $details['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td> <?php echo $details['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address</th>
                                                <td><?php echo $details['address']; ?></td>
                                            </tr>												
                                            <tr>
                                                <th scope="row">Comment</th>
                                                <td><?php echo $details['comment']; ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th scope="row">Identification</th>
                                                <td><a rel="nofollow" target="_blank" href="https://stay.smallsmall.com/uploads/identification/<?php echo $details['userID'].'/'.$details['identification']; ?>">Download</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Booking Details</h5>
                                        <table class="mb-0 table">
                                            
                                            <tbody>
                                            <tr>
                                                <th width="200px" scope="row">Apartment Name</th>
                                                <td><?php echo $details['apartmentName']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Apartment Type</th>
                                                <td><?php echo $details['type']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Number of Guests</th>
                                                <td><?php echo $details['guests']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Duration of Stay</th>
                                                <td><?php echo $details['no_of_nights']." Nights"; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Check In</th>
                                                <td><?php echo date("Y M d", strtotime($details['checkin'])); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Check Out</th>
                                                <td><?php echo date("Y M d", strtotime($details['checkout'])); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Booking Date</th>
                                                <td><?php echo date("Y M d", strtotime($details['date_of_booking'])); ?></td>
                                            </tr>
											<tr>
                                                <th scope="row">Amount</th>
                                                <td><?php echo number_format($details['amount']); ?></td>
                                            </tr>	
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

		

				</div>

			</div>

		</div>

	</div>