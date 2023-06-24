            	<div class="app-main__outer">
            	    <?php
            
                		$CI =& get_instance();
                
                		//$prop_dets = $CI->get_ver_prop($details['propertyID']); 
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
                						Booking details
                					</div>
                
                				</div>
                				<!---<div class="page-title-actions">
                				    
                                </div>--->
                			</div>
                
                		</div> 
                		
                		<div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Basic Profile</h5>
                                        <table class="mb-0 table">
                                            <tbody>                                            
                                            <tr>
                                                <th width="200px" scope="row">Property Name</th>
                                                <td><?php echo '<a target="_blank" href="'.base_url().'property/'.$details[0]['propertyID'].'">'.$details[0]['propertyTitle'].'</a>'; ?></td>
                                            </tr>                                            
                                            <tr>
                                                <th width="200px" scope="row">Property Type </th>
                                                <td><?php echo strtoupper($details[0]['type']); ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Property Location</th>
                                                <td><?php echo $details[0]['city'].", ".$details[0]['name']; ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Property Rent </th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details[0]['price']); ?></td>
                                            </tr>                                           
                                            <tr>
                                                <th width="200px" scope="row">Security Deposit</th>
                                                <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details[0]['securityDeposit']); ?></td>
                                            </tr> 
                                            </tbody>
                                            <input type="hidden" id="propID" value="<?php echo $details[0]['propertyID']; ?>" />
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Booking status</h5>
                                        <form id="bookingStatusChange" method="POST" class="">
                                            <div class="position-relative form-group">
                                                <label for="booking-status" class="">Booking Status</label>
                                                <select id="booking-status" name="booking-status" class="booking-status form-control">
                                                    <?php //if($details[0]['status'] == 'Terminated'){ echo "selected"; } ?>
                                                    <option value="Bereavement">Bereavement</option>
                                                    <option value="Job Loss">Job Loss</option>
                                                    <option value="Misdemeanour">Misdemeanour</option>
                                                    <option value="Relocation(Abroad)">Relocation(Abroad)</option>
                                                    <option value="Relocation(Local)">Relocation(Local)</option>
                                                    <option value="RSS Contract Termination(RSS)">RSS Contract Termination</option>
                                                    <option value="Tenant Contract Termination">Tenant Contract Termination</option>
                                                    <option value="Rent Default">Rent Default</option>
                                                </select> 
                                            </div>
                                            
                                            <div class="position-relative form-group">
                            				    <label for="move_out_date" class="">Move out date</label>
                            
                            					<input name="move_out_date" type="date" class="form-control" id="move_out_date" />
                            				</div>
                                            
                                            <div class="position-relative form-group"><label for="status-note" class="">Note</label><textarea row="5" name="status-note" id="status-note" class="form-control status-note"></textarea></div>
                                            
                                            <!---<small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>--->
                                            <input type="hidden" id="user_id" value="<?php echo $details[0]['userID']; ?>" />
                                            <input type="hidden" id="booking_id" value="<?php echo $details[0]['bookingID']; ?>" />
                                            <button class="debt-button mt-1 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    </div>

				</div>

			</div>

		</div>

	</div>