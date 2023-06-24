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

						User Profile	

					</div>

				</div>
				<div class="page-title-actions">
									<?php if($details['is_verified'] == 1){ ?>
										<button type="button" id="<?php echo $details['user_id']; ?>"  class="verify-app-user btn-shadow mr-3 btn btn-info">
											Approve <i class="fa fa-star"></i>
										</button>
									<?php }else{ ?>
										<button type="button" id="<?php echo $details['user_id']; ?>"  class="unverify-app-user btn-shadow mr-3 btn btn-danger">
											Unapprove <i class="fa fa-star"></i>
										</button>
									<?php } ?>
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-download fa-w-20"></i>
                                            </span>
                                            Documents
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a target="_blank" href="<?php echo $details['bank_statement_1']; ?>" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Bank Statement
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary"><i class="fa fa-download"></i></div>
                                                    </a>
                                                </li> 
                                                <li class="nav-item"> 
                                                    <a target="_blank" href="<?php echo $details['validID_path']; ?>" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i> 
                                                        <span>
                                                            Valid Identification
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger"><i class="fa fa-download"></i></div>
                                                    </a>
                                                </li>
                                                <!--<li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture"></i>
                                                        <span>
                                                            Picture
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty"></i>
                                                        <span>
                                                            File Disabled
                                                        </span>
                                                    </a>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
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
                                                <th width="200px" scope="row">Name </th>
                                                <td><?php echo $details['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Marital Status</th>
                                                <td><?php echo $details['marital_status']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Income</th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details['gross_annual_income']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Date Of Birth</th>
                                                <td><?php echo date("Y M d", strtotime($details['dob'])); ?></td>
                                            </tr>												
                                            <tr>
                                                <th scope="row">Disability?</th>
                                                <td><?php echo $details['disability']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pets?</th>
                                                <td><?php echo $details['pets']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Employment Profile</h5>
                                        <table class="mb-0 table">
                                            
                                            <tbody>
                                            <tr>
                                                <th width="200px" scope="row">Employment Status</th>
                                                <td><?php echo $details['employment_status']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Occupation</th>
                                                <td><?php echo $details['occupation']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Company Name</th>
                                                <td><?php echo $details['company_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Company Address</th>
                                                <td><?php echo $details['company_address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">HR Name</th>
                                                <td><?php echo $details['hr_manager_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">HR Email</th>
                                                <td><?php echo $details['hr_manager_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Office Phone</th>
                                                <td><?php echo $details['office_phone']; ?></td>
                                            </tr>
												
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Renting Profile</h5>
                                        <table class="mb-0 table table-bordered">
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
                                                <th width="200px" scope="row">Renting Status</th>
                                                <td><?php echo $details['current_renting_status']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Present Landlord</th>
                                                <td><?php echo $details['present_landlord']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Landlord Email</th>
                                                <td><?php echo $details['landlord_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Landlord Phone</th>
                                                <td><?php echo $details['landlord_phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Landlord Address</th>
                                                <td><?php echo $details['landlord_address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reason For Leaving</th>
                                                <td><?php echo $details['reason_for_living']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Guarantor Details</h5>
                                        <table class="mb-0 table">
                                            <tbody>                                            
                                            <tr>
                                                <th width="200px" scope="row">Guarantor Name</th>
                                                <td><?php echo $details['guarantor_name']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Guarantor Email</th>
                                                <td><?php echo $details['guarantor_email']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Guarantor Phone</th>
                                                <td><?php echo $details['guarantor_phone']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Guarantor Occupation</th>
                                                <td><?php echo $details['guarantor_occupation']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Guarantor Address</th>
                                                <td><?php echo $details['guarantor_address']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php

								$CI =& get_instance();

								$prop_dets = $CI->get_ver_property($details['pID']); 
						    ?>
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Property Description</h5>
                                        <table class="mb-0 table">
                                            <tbody>                                            
                                            <tr>
                                                <th width="200px" scope="row">Property Name</th>
                                                <td><?php echo '<a target="_blank" href="'.base_url().'property/'.$prop_dets['propertyID'].'">'.$prop_dets['propertyTitle'].'</a>'; ?></td>
                                            </tr>                                            
                                            <tr>
                                                <th width="200px" scope="row">Property Type </th>
                                                <td><?php echo $prop_dets['type']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Property Location</th>
                                                <td><?php echo $prop_dets['city'].", ".$prop_dets['name']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Property Rent </th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($prop_dets['price']); ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Security Deposit</th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($prop_dets['securityDeposit']); ?></td>
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

		</div>

	</div>