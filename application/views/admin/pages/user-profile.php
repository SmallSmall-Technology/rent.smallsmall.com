            	<div class="app-main__outer">
            	    <?php
            
                		$CI =& get_instance();
                
                    ?>
            
            	<div class="app-main__inner">
            
            		<div class="app-page-title">
            
            			<div class="page-title-wrapper">
            
            				<div class="page-title-heading">
            
            					<div class="page-title-icon">
            
            						<i class="pe-7s-user text-success">
            
            						</i>
            
            					</div>
            
            					<div>
            
            						<?php echo $details['firstName'].' '.$details['lastName']; ?>	
            
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
                                            <th width="200px" scope="row">First Name</th>
                                            <td><?php echo $details['firstName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Last Name</th>
                                            <td><?php echo $details['lastName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><?php echo $details['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Income</th>
                                            <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details['income']); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lead Source</th>
                                            <td><?php echo $details['referral']; ?></td>
                                        </tr>												
                                        <tr>
                                            <th scope="row">Verified?</th>
                                            <td><?php echo $details['verified']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Referred</th>
                                            <td><?php if(@$details['ref_count']){ echo @$details['ref_count']; }else{ echo 0; } ?> persons</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Reg Date</th>
                                            <td><?php echo date('Y-m-d', strtotime($details['regDate'])); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Debt Form</h5>
                                    <form id="debt-form" method="POST" class="">
                                        <div class="position-relative form-group"><label for="debt-amount" class="">Debt Amount</label><input name="debt-amount" id="debt-amount" type="text" class="form-control verify-debt-txt"></div>
                                        
                                        <div class="form-row">
                                            <div class="col-md-4"><label for="debt-day" class="">Debt Period</label><select name="debt-day" id="debt-day" class="form-control verify-debt-txt">
                                            <option selected="selected">Day</option>
                                        <?php for($i = 1; $i < 32; $i++){ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                        </select></div>
                                        
                                        <div class="col-md-4"><label for="debt-month" class="">&nbsp;</label><select name="debt-month" id="debt-month" class="form-control verify-debt-txt">
                                            <option selected>Month</option>
                                        <?php for($i = 1; $i < 13; ++$i){ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                        </select></div>
                                        
                                        <div class="col-md-4"><label for="debt-yr" class="">&nbsp;</label><select name="debt-yr" id="debt-yr" class="form-control verify-debt-txt">
                                            <option selected="selected">Year</option>
                                        <?php for($i = 2020; $i < 2071; $i++){ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                        </select></div>
                                        
                                        </div>
                                        
                                        <div class="position-relative form-group"><label for="debt-note" class="">Note</label><textarea name="debt-note" id="debt-note" class="form-control verify-debt-txt"></textarea></div>
                                        
                                        <!---<small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>--->
                                        <input type="hidden" id="debtor_id" value="<?php echo $details['userID']; ?>" />
                                        <input type="hidden" id="admin_id" value="<?php echo $adminID; ?>" />
                                        <button class="debt-button mt-1 btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Bookings</h5>
                                    <table class="mb-0 table">
                                        
                                        <tbody>
                                        <?php if(isset($bookings) && !empty($bookings)){ ?>
                                            <?php foreach($bookings as $booking => $value){ ?>
                                        <tr>
                                            <td width="60%" scope="row"><a href="<?php echo base_url(); ?>property/<?php echo $value['propertyID']; ?>"><?php echo $value['propertyTitle']; ?></a>
                                                <div style="font-size:12px;color:#888"><b>Due date:</b> <?php echo date('m-d-Y', strtotime($value['next_rental'])); ?></div>
                                            </td>
                                            <!---<td><?php echo $value['pID']; ?></td>--->
                                            <td class="text-right">
                                                <button style="margin-bottom:10px" type="button" id="<?php echo $value['bookingID'].'-'.$value['propertyID'].'-'.$details['userID'].'-'.$details['verification_id'] ?>" class="btn btn-primary btn-sm initiate-payment">Initiate payment</button>
                                                
                                                <button type="button" id="<?php echo "switch-".$value['bookingID'].'-'.$value['propertyID'].'-'.$details['userID'].'-'.$details['verification_id']; ?>" class="btn btn-primary btn-sm switch-property">View Option</button>
                                            </td>
                                        </tr>
                                        
                                        <tr class="prop-search-field prop-search-field-<?php echo $value['propertyID'] ?>">
                                            
                                            <td  width="60%">
                                                <label>Property ID</label>
                                                <input type="text" class="form-control" placeholder="Property ID" id="prop-id-<?php echo $value['propertyID']; ?>" /></td>
                                            
                                            <td class="text-right">
                                                <label>Payment plan</label>
                                                <select id="payment-plan-<?php echo $value['propertyID']; ?>" class="form-control">
                                                    <option value="">Payment Plan</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quarterly">Quarterly</option>
                                                    <option value="Bi-Annually">Bi-annually</option>
                                                    <option value="Upfront">Upfront</option>
                                                </select>
                                            </td>
                                            
                                        </tr>
                                        <tr class="prop-search-field prop-search-field-<?php echo $value['propertyID'] ?>">
                                            
                                            <td  width="60%">
                                                <label>Security deposit</label>
                                                <input type="text" class="form-control" placeholder="Security Deposit" id="security-dep-<?php echo $value['propertyID']; ?>" /></td>
                                            
                                            <td class="text-left">
                                                <label>Move in date</label>
                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="move-in-date-<?php echo $value['propertyID']; ?>" />
                                            </td>
                                            
                                        </tr>
                                        <tr class="prop-search-field prop-search-field-<?php echo $value['propertyID'] ?>">
                                            <td>
                                                <label>Renting as</label>
                                                <select id="renting-as-<?php echo $value['propertyID']; ?>" class="form-control">
                                                    <option value="Individual">Individual</option>
                                                    <option value="Corporate">Corporate</option>
                                                    <option value="Family">Family</option>
                                                </select>
                                            </td>
                                            <td>
                                                <label>Months paid for</label>
                                                <select id="period-<?php echo $value['propertyID']; ?>" class="form-control">
                                                    <option value="1">1 Month</option>
                                                    <option value="2">2 Months</option>
                                                    <option value="3">3 Months</option>
                                                    <option value="4">4 Months</option>
                                                    <option value="5">5 Months</option>
                                                    <option value="6">6 Months</option>
                                                    <option value="7">7 Months</option>
                                                    <option value="8">8 Months</option>
                                                    <option value="9">9 Months</option>
                                                    <option value="10">10 Months</option>
                                                    <option value="11">11 Months</option>
                                                    <option value="12">12 Months</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="prop-search-field prop-search-field-<?php echo $value['propertyID'] ?>">
                                            
                                            <td  width="60%">
                                                <button type="button" id="<?php echo "activate-".$value['bookingID'].'-'.$value['propertyID'].'-'.$details['userID'].'-'.$details['verification_id']; ?>" class="btn btn-primary btn-sm activate-switch">Activate switch</button>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        
                                            <?php } ?>
                                        <?php }else if($details['verification_id']){ ?>
                                        
                                            <tr>
                                               <td width="60%">
                                                   <label>Property ID</label>
                                                    <input type="text" class="form-control" placeholder="Property ID" id="book-prop-id" />
                                               </td>
                                               <td class="text-left">
                                                <label>Payment plan</label>
                                                <select id="new-payment-plan" class="form-control">
                                                    <option value="">Payment Plan</option>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quarterly">Quarterly</option>
                                                    <option value="Bi-Annually">Bi-annually</option>
                                                    <option value="Upfront">Upfront</option>
                                                </select>
                                            </td>
                                            
                                        </tr>
                                        <tr >
                                            <td width="60%">
                                                <label>Renting as</label>
                                                <select id="new-renting-as" class="form-control">
                                                    <option value="Individual">Individual</option>
                                                    <option value="Corporate">Corporate</option>
                                                    <option value="Family">Family</option>
                                                </select>
                                            </td>
                                            <td>
                                                <label>Duration of stay</label>
                                                <select id="new-duration" class="form-control">
                                                    <option value="1">1 Month</option>
                                                    <option value="2">2 Months</option>
                                                    <option value="3">3 Months</option>
                                                    <option value="4">4 Months</option>
                                                    <option value="5">5 Months</option>
                                                    <option value="6">6 Months</option>
                                                    <option value="7">7 Months</option>
                                                    <option value="8">8 Months</option>
                                                    <option value="9">9 Months</option>
                                                    <option value="10">10 Months</option>
                                                    <option value="11">11 Months</option>
                                                    <option value="12">12 Months</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  width="60%">
                                                <label>Move in date</label>
                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="new-move-in-date" />
                                            </td>
                                            
                                            <td class="text-left">
                                                
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                           <td width="60%">
                                               <button type="button" id="<?php echo "book-id-".$details['userID'].'-'.$details['verification_id']; ?>" class="btn btn-primary btn-sm new-booking">Book Now</button>
                                           </td>
                                           <td>
                                               
                                           </td> 
                                        </tr>
                                        <?php } ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Debt History</h5>
                                    <table class="mb-0 table">
                                        
                                        <tbody>
                                        <?php if(isset($debts) && !empty($debts)){ ?>
                                            <?php foreach($debts as $debt => $debt_value){ ?>
                                        <tr>
                                            <td width="60%" scope="row"><span style="font-family:helvetica;">&#x20A6;</span><?php echo $debt_value['amount_owed']; ?>
                                            <div style="font-size:12px;color:#888"><b>Debt Period:</b> <?php echo date('m-d-Y', strtotime($debt_value['owed_on'])); ?></div>
                                            </td>
                                            
                                            <td class="text-right">
                                                <button type="button" id="<?php echo $debt_value['id']; ?>" class="btn btn-primary btn-sm initiate-payment">Clear Debt</button>
                                            </td>
                                        </tr>
                                            <?php } ?>
                                        <?php } ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>


                    <!--subscription agreement -->
                    <div class="row">
            			<div class="col-md-12">
            				<div class="main-card mb-3 card">
            					<div class="card-header">
            					    Subscription agreement
            						
            						<div class="btn-actions-pane-right">
            							
            						</div>
            				</div>
            					
            					
            			    <div class="table-responsive">
                                    <?php echo form_open_multipart('admin/agr_upload');?>  
                                    
                                        <br></br>
                                        <div class="form-row" style = "margin-left: 10px;">
                                            
                                            
                                            <div class="col-md-4"><label for="debt-note" class="">Start year</label>
                                            <select name="start-yr" id="start-yr" class="form-control verify-debt-txt" required>
                                                
                                            <?php for($i = 2020; $i < 2071; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            </select></div>
                                            
                                            
                                            
                                            
                                            <div class="col-md-4"><label for="debt-note" class="">End year</label><select required = 'true' name="end-yr" id="end-yr" class="form-control verify-debt-txt">
                                                
                                            <?php for($i = 2020; $i < 2071; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            </select></div></div><br></br>
                                            
                                            
                                        <div class="col-md-4">
                                        <input type="hidden" name = "sub_id" value = "<?php echo @$ids ?>">
                                        <div class="position-relative form-group"><label for="debt-note" class="">Property</label><select name="sub-propty" id="sub-propty" class="form-control verify-debt-txt">
                                        <?php foreach($proptys as $propty => $value){ ?>
                                            <option value="<?php echo $value['propertyID']; ?>"><?php echo $value['propertyTitle']; ?></option>
                                        <?php } ?></select>
                                        </div></div>  
                                        
                                        <div class="col-md-4">
                                            <label for="debt-note" class="">Upload Document</label>
                                            <input type="file" name="filename" required/>
                                        </div><br></br>
                                        
                                        
                                        <div class="col-md-4">
                                            <input type="submit" value="upload"/><br></br>
                                        </div>
                                            
            		                    </form>
            					</div>
                    
                    </div>
            			</div>
            		</div>
                    <!--subscription agreement -->
                    
                    
                    <!--subscription agreement history -->
                    <div class="row">
            			<div class="col-md-12">
            				<div class="main-card mb-3 card">
            					<div class="card-header">
            					    Subscription agreement History
            						
            						<div class="btn-actions-pane-right">
            							
            						</div>
            				</div>
            					
            					
            			    <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            							<thead>
            							<tr>
            								<th width="70px" class="text-left">&nbsp;</th>
            								<th width="300px" class="text-left">User</th>
            								<th width="300px" class="text-left">Start Year</th>
            								<th width="300px" class="text-left">End Year</th>
            								<th width="300px" class="text-left">File</th>
            								<th width="100px" class="text-left">Property</th>
            								<th width="300px" class="text-left">Admin</th>
            							<th width="300px" class="text-left">Date</th>
            							</tr>
            							</thead>
            							
            							<tbody>
            							<?php
            									foreach($user_hstry as $user_transaction => $value) { ?>	 
               
            							<tr> 
            							
            							    <td class="text-left"></td>
            							    
            								<td class="text-left"><?php echo $value['firstName'].' '.$value['lastName']; ?></td>
            								
            								<td class="text-left"><?php echo $value['start_year']; ?></td>
            								
            								<td class="text-left"><?php echo $value['end_year']; ?></td>
            								
            								<td class="text-left"><?php echo $value['filename']; ?></td>
            								
            								<td class="text-left"><?php echo $value['propertyTitle']; ?></td>
            								
            								<td class="text-left"><?php echo $value['admin']; ?></td>
            								
            								<td class="text-left"><?php echo $value['date']; ?></td>
            								
            							</tr>    
            							<?php    
            									
            								}?>
            							
            							</tbody>

            						</table>
            					</div>
                    
                    </div>
            			</div>
            		</div>
                    <!--subscription agreement history -->

                    <!--- Transaction start pane --->
                    <div class="row">
            			<div class="col-md-12">
            				<div class="main-card mb-3 card">
            					<div class="card-header">
            					    Transaction History
            						
            						<div class="btn-actions-pane-right">
            							
            						</div>
            					</div>
            					<div class="table-responsive">
            						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
            							<thead>
            							<tr>
            								<th width="70px" class="text-left">&nbsp;</th>
            								<th width="300px" class="text-left">Booked By</th>
            								<th width="300px" class="text-left">Mode of payment</th>
            								<th width="300px" class="text-left">Amount</th>
            								<th width="300px" class="text-left">Date</th>
            								<th width="100px" class="text-left">Status</th>
            								<th width="300px" class="text-left">Actions</th>
            							</tr>
            							</thead>
            							<tbody>
            							<?php
            								$stat = '';
            								if (isset($user_transactions) && !empty($user_transactions)) {
            									foreach($user_transactions as $user_transaction => $value) {
            										
            										if($value['payment_status'] == 'Approved' || $value['payment_status'] == 'approved'){
            											$stat = 'badge-success';
            										}elseif($value['payment_status'] == 'Pending' || $value['payment_status'] == 'pending'){
            											$stat = 'badge-info';
            										}elseif($value['payment_status'] == 'Declined' || $value['payment_status'] == 'declined'){
            											$stat = 'badge-warning';
            										}
            							?>	 
               
            							<tr> 
            								<td width="70px" class="text-left"><input type="checkbox" class="props-checkbox" id="<?php echo $value['transaction_id'] ?>" /></td>
            								<td class="text-left"><?php echo substr($value['firstName'], 0, 1).' '.$value['lastName']; ?></td>
            								<td class="text-left"><?php echo ucfirst($value['payment_type']); ?></td>
            								<td class="text-left"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['amount']); ?></td>
            								<td class="text-left"><?php echo date("d M Y - H:i", strtotime($value['transaction_date'])); ?></td>
            								<td class="text-left"><div class="mb-2 mr-2 badge <?php echo $stat; ?>"><?php echo $value['payment_status']; ?></div></td>
            								<td class="text-left">
            									<?php if($value['payment_status'] == 'Pending' || $value['payment_status'] == 'pending'){ ?>
            										<button type="button" id="approve-<?php echo $value['reference_id']; ?>-<?php echo $value['transaction_id']; ?>" class="btn btn-primary btn-sm approve-payment">Approve</button>
            									<?php }else if($value['payment_status'] == 'approved' && !empty($value['invoice'])){ ?>
            									
            									        <a href="<?php echo base_url().'assets/pdf/tenant/'.$value['transaction_id'].'/'.$value['invoice']; ?>" target="_blank">Download Invoice
            									
            									<?php } ?>
            									  
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
            		<!----Transaction pane --->
				</div>

			</div>

		</div>

	</div>