                        <div class="action-container">
                            <form action="<?php echo base_url().'landlord/filter-tenants'; ?>" method="POST">
                                <!---<div class="search-label">Search by property</div>--->
                                <table width="100%">
                                    <tr>
                                        <td class="search-td" width="85%">
                                            <select name="property" id="soflow-user-dash">
                                                <option selected="selected">Filter tenants by property</option>
                                                <?php if(isset($search_props) && !empty($search_props)){ ?>
                                                    <?php foreach($search_props as $search_prop => $value){ ?>
                                                        <option value="<?php echo $value['propertyID']; ?>"><?php echo $value['propertyTitle']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="search-td">
                                            <input type="submit" value="filter" id="srch-btn" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="user-mainbar-content">
							<!---<div class="welcome-big">Accounts</div>--->
							
						<?php if(isset($rented_props) && !empty($rented_props)){ ?>
						    <?php foreach($rented_props as $rented_prop => $value){ ?>
						    <?php
						    
                              $birthdate = date("d-m-Y", strtotime($value['dob']));
                              
                              $birthDate = explode("-", $birthdate);
                              
                              //get age from date or birthdate
                              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[2]) - 1)
                                : (date("Y") - $birthDate[2]));
                              
						    ?>
							<div class="card-container">
                                <div class="tenant-prof-item orange-tint">
                                    <div class="tenant-profile">
                                        <div class="tenant-profile-container">
											<div class="rate-render">
												<img src="<?php echo base_url(); ?>assets/img/my-tenant-profile.png" />
												<div class="tenant-rating-txt">Tenant rating</div>
												<div class="tenant-rating">N/A</div>
											</div>
                                        </div>
										
                                    </div>
									<div class="tenant-details-container">
										<table class="tenant-tbl">
											<tr class="tenant-tr">
												<td class="tenant-td">
													<span class="tnt-head">Tenant Name</span>
													<span class="tnt-res"><?php echo $value['firstName'].' '.$value['lastName']; ?></span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Age</span>
													<span class="tnt-res"><?php echo $age; ?> Years</span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Marital Status</span>
													<span class="tnt-res"><?php echo $value['marital_status']; ?></span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Rent Status</span>
													<span class="tnt-res">Renting</span>
												</td>
											</tr>
										</table>
										<table class="tenant-tbl">
											<tr class="tenant-tr">
												<td class="tenant-td">
													<span class="tnt-head">Occupation</span>
													<span class="tnt-res"><?php echo $value['occupation']; ?></span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Gender</span>
													<span class="tnt-res"><?php echo @$value['gender']; ?></span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Tenancy Starts</span>
													<span class="tnt-res"><?php echo date('d.m.Y', strtotime($value['move_in_date'])); ?></span>
												</td>
												<td class="tenant-td">
													<span class="tnt-head">Tenancy Ends</span>
													<span class="tnt-res"><?php echo date('d.m.Y', strtotime($value['rent_expiration'])); ?></span>
												</td>
											</tr>
										</table>
										<table class="tenant-tbl">
											<tr class="tenant-tr">
												<td>
													<span class="tnt-head">Property</span>
													<span class="tnt-res"><?php echo $value['propertyTitle']; ?></span>
												</td>												
											</tr>
										</table>
									</div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
							
						</div>
						<div class="pagination">
        					<?php echo $this->pagination->create_links(); ?>
        				</div>
					</div>