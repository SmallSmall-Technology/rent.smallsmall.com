	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-user text-success">

						</i>

					</div>

					<div>

						BTL User Profile	

					</div>

				</div>
				<div class="page-title-actions">
                </div>
			</div>

		</div> 
		
		<div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Basic Profile</h5>
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
                                                <th scope="row">Gender</th>
                                                <td><?php echo $details['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Income</th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format(intval($details['income'])); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Age</th>
                                                <td><?php echo $details['age']; ?></td>
                                            </tr>									<tr>
                                                <th scope="row">Phone</th>
                                                <td><?php echo $details['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td><?php echo $details['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address</th>
                                                <td><?php echo $details['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Occupation</th>
                                                <td><?php echo $details['occupation']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Position</th>
                                                <td><?php echo $details['position']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Date Of Registration</th>
                                                <td><?php echo $details['registration_date']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Investment Profile</h5>
                                        <table class="mb-0 table">
                                            
                                            <tbody>
                                            <tr>
                                                <th width="200px" scope="row">Accredited Investor?</th>
                                                <td><?php echo $details['accredited_investor']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Investment Experience?</th>
                                                <td><?php echo $details['investment_experience']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Investment Goal</th>
                                                <td><?php echo $details['investment_goal']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Investment Capital</th>
                                                <td><?php echo $details['investment_capital']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Financing Choice</th>
                                                <td><?php echo $details['financing_choice']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Investment Period</th>
                                                <td><?php echo $details['investment_period']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Purchase Plan</th>
                                                <td><?php echo $details['purchase_plan']; ?></td>
                                            </tr>
                                             <tr>
                                                <th scope="row">Preferred Location 1</th>
                                                <td><?php echo $details['preferred_location_1']; ?></td>
                                            </tr>
											<tr>
                                                <th scope="row">Preferred Location 2</th>
                                                <td><?php echo $details['preferred_location_2']; ?></td>
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