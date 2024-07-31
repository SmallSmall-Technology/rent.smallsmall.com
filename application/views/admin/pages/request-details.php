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

						Request Details	

					</div>

				</div>
				<div class="page-title-actions">
				    <?php if($details['plan'] != 'co-own'){ ?>
				    
    					<?php if($details['request_status'] == "new"){ ?>
    						<button type="button" id="finance-<?php echo $details['refID'].'-'.$details['userID']; ?>"  class="approve-finance btn-shadow mr-3 btn btn-info">
    							Approve finance <i class="fa fa-lock"></i>
    						</button>
    					<?php }else{ ?>
    						<button type="button" id="<?php echo $details['refID']; ?>-unlock"  class="change-status unlock-apt btn-shadow mr-3 btn btn-danger">
    							Unapprove <i class="fa fa-unlock"></i>
    						</button>
    					<?php } ?>
					
					<?php }else{ ?>
					       <?php if($details['payment_status'] == "Pending" || $details['payment_status'] == '' || $details['payment_status'] == NULL){ ?>
    						<button type="button" class="unlock-apt btn-shadow mr-3 btn btn-danger">
    							Pending payment <i class="fa fa-credit-card"></i>
    						</button>
    					<?php }else{ ?>
    						<button type="button" class="btn-shadow mr-3 btn btn-info">
    							Payment completed <i class="fa fa-credit-card"></i>
    						</button>
    					<?php } ?>
					<?php } ?>
                    
                </div>
			</div>

		</div> 
		
		<div class="row">
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Buyer Profile</h5>
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
                                <td><?php echo $details['buyer_fname']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td><?php echo $details['buyer_lname']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td><?php echo $details['phone']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?php echo $details['email']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td><?php echo (!is_null($details['personal_address']))? '' : $details['personal_address']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Identification</th>
                                <td><a rel="nofollow" target="_blank" href="https://buy.smallsmall.com/uploads/financing/'<?php echo $details['idPath']; ?>">Download</a></td>
                            </tr>
                            
                            <tr>
                                <th scope="row">Bank statement</th>
                                <td>
                                    <?php if($details['plan'] == 'co-own'){ ?>
                                    <a rel="nofollow" target="_blank" href="https://buy.smallsmall.com/uploads/financing/'<?php echo $details['statementPath']; ?>">Download</a></td>
                                    <?php }else{ ?>
                                        N/A
                                    <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Purchase Details</h5>
                        <table class="mb-0 table">
                            
                            <tbody>
			    <?php if($details['method'] == 'Promotional'){ ?>
	                            <tr>
	                                <th width="200px" scope="row">Purchase Type</th>
	                                <td><?php echo $details['purchase_beneficiary']; ?></td>
	                            </tr>
			    <?php } ?>
                            <tr>
                                <th width="200px" scope="row">Property</th>
                                <td><?php echo $details['property_name']; ?></td>
                            </tr>
                            <!---<tr>
                                <th scope="row">Apartment Type</th>
                                <td><?php //echo $details['type']; ?></td>
                            </tr>--->
                            <tr>
                                <th scope="row">Address</th>
                                <td><?php echo $details['address'].' '.$details['city'].', '.$details['stateName']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Price/Unit</th>
                                <td>N<?php echo number_format($details['price']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Purchase plan</th>
                                <td><?php echo ucfirst($details['plan']); ?></td>
                            </tr>
                            <?php if($details['plan'] == 'finance'){ ?>
                            <!---<tr>
                                <th scope="row">Balance</th>
                                <td>N<?php //echo number_format($details['finance_balance']); ?></td>
                            </tr>--->
                            <tr>
                                <th scope="row">Equity</th>
                                <td>N<?php echo number_format($details['price'] - $details['payable']); ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row">Payable</th>
                                <td>N<?php echo number_format($details['payable']); ?></td>
                            </tr>
							<tr>
                                <th scope="row">Units</th>
                                <td><?php echo ($details['plan'] == 'co-own')? $details['unit_amount'] : '1' ; ?></td>
                            </tr>	
			<?php if($details['promo_amount'] > 0){ ?>
			    <tr>
                                <th scope="row">Promo Amount</th>
                                <td><?php echo $details['promo_amount']; ?></td>
                            </tr>
			    <tr>
                                <th scope="row">Coupon code</th>
                                <td><?php echo $details['promo_code']; ?></td>
                            </tr>
			<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if(isset($beneficiaries) && !empty($beneficiaries)){ ?>
                <?php $counter = 1; ?>
                <?php foreach($beneficiaries as $beneficiary => $ben){ ?>
                    
                    <div class="col-lg-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Beneficiary #<?php echo $counter; ?></h5>
                                <table class="mb-0 table">
                                    
                                    <tbody>
                                    <tr>
                                        <th width="200px" scope="row">Name</th>
                                        <td><?php echo $ben['firstname'].' '.$ben['lastname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?php echo $ben['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Position</th>
                                        <td><?php echo $ben['phone']; ?></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php } ?>
            
            <?php } ?>
            <?php if($details['plan'] == 'finance'){ ?>
			<div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Employer Details</h5>
                        <table class="mb-0 table">
                            
                            <tbody>
                            <tr>
                                <th width="200px" scope="row">Company</th>
                                <td><?php echo $details['company']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Occupation</th>
                                <td><?php echo ucfirst($details['occupation']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Position</th>
                                <td><?php echo ucfirst($details['position']); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Income range</th>
                                <td><?php echo $details['income_range']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Company address</th>
                                <td><?php echo $details['company_address']; ?></td>
                            </tr>
								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if(($worth) && ($buybackrate)){ ?>
                    <div class="col-lg-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Interest Details</h5>
                                <table class="mb-0 table">                                    
                                    <tbody>
            
                                        <tr>
                                            <th width="200px" scope="row">Total Worth</th>
                                            <td><?php echo number_format($worth); ?></td>
                                        </tr>
                        
                                    <tr>
                                        <th width="200px" scope="row">Buyback Value</th>
                                        <td><?php echo number_format($worth - $buybackrate); ?></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php } ?>
			            
            
        </div>



</div>

</div>

</div>

</div>
