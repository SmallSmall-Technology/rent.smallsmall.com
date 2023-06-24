                        <div class="wallet-action-container">
                            <span class=""><a href="<?php echo base_url()."user/wallet"; ?>">Wallet</a></span>|<span class="active-wallet-btn"><a href="<?php echo base_url()."user/my-loan"; ?>">Loans</a></span>
                        </div>
                        <div class="user-mainbar-content">
							
							<div class="credit-dets green-tint">
							    <div class="wallet-txt text-left">Request a loan</div>
						
    							<div class="wallet-display">
    								
    								<div class="wallet-txt-small text-left">Current loan:</div>
    								<p></p>
    								<div class="wallet-balance text-left"><i style="font-style:normal;font-family:helvetica;font-weight:bold;">&#x20A6;</i><?php echo number_format($loan_owed['payableAmount']); //number_format((float)$loan_owed['payableAmount'], 2, '.', ''); ?></div>
            						
            						<div class="seperator"></div>
            						
            						<div class="loan-but get-loan-btn">Get Loan</div>
    							    <div class="loan-but pay-loan-btn">Pay Loan</div>
    							</div>
							    
							</div>
							<div class="credit-dets green-tint">
							    <div class="wallet-txt text-left">Credit limit</div>
						
    							<div class="wallet-display">
    								
    								<div class="wallet-txt-small text-left">Current credit limit:</div>
    								<div class="wallet-balance text-left"><i style="font-style:normal;font-family:helvetica;font-weight:bold;">&#x20A6;</i><?php echo number_format($account_details['credit_limit'].".00"); ?></div>
            						
            						<div class="seperator"></div>
            						
            						<div class="loan-but increase-loan-btn">Increase limit</div>
    							</div>
							</div>
							
							
						</div>
						
						<div class="user-mainbar-content loan-spc get-loan-spc green-tint">
						    <div class="credit-dets">
						        <form id="loanRequestForm" method="POST">
						            <div class="wallet-txt-small text-left">Amount</div>
						            <div class="loan-form-control">
						                <span class="naira-overlay"><i style="font-style:normal;font-family:helvetica;font-weight:bold;">&#x20A6;</i></span>
						                <input type="text" value="" name="credit-amount" class="walletTxt" id="credit-amount" />
						            </div>
						            <div class="loan-form-control">
						                <div class="wallet-txt-small text-left">Purpose of loan</div>
						                <label for="rent">
						                    <input type="checkbox" value="Rent" name="purpose" />
    						                Rent
						                </label>
						                <label for="groceries">
						                    <input type="checkbox" value="Groceries" name="purpose" />
    						                Groceries
						                </label>
						                <label for="utilities">
						                    <input type="checkbox" value="Utilities" name="purpose" />
    						                Utilities
						                </label>
						                <label for="phone-services">
						                    <input type="checkbox" value="Phone services" name="purpose" />
    						                Phone services (Data, Airtime e.t.c)
						                </label>
						            </div>
						            <div class="loan-form-control">
						                <input type="submit" class="loan-but proceed-btn" value="proceed" />
						            </div>
						            <div class="loan-agreement">
						                <label for="loan-agreement">
    						                <input type="checkbox" name="loan-agreement" />
    						                Click to agree to our <a target="_blank" href="">terms and conditions</a>
						                </label>
						            </div>
						        </form>
						    </div>
						    <div class="credit-dets green-tint">
						        <div class="wallet-display">
    								
    								<div style="margin-bottom:10px" class="wallet-txt-small text-left">Amount payable:</div>
    								<div class="wallet-amount-payable text-left"><i style="font-style:normal;font-family:helvetica;font-weight:bold;">&#x20A6;</i><div style="display:inline-block" class="amount-payable">0</div><?php //echo number_format((float)$wallet_amount['amount'], 2, '.', ''); ?></div>
            						<div style="margin-top:20px;" class="wallet-txt-small text-left">Interest rate: 4%</div>
            						<div style="margin-top:20px;" class="wallet-txt-small text-left">Repayment date: <?php echo date('Y-m-d', strtotime('+30 days', strtotime(date('Y-m-d')))); ?></div>
    							</div>
						    </div>
						</div>
						<div class="user-mainbar-content loan-spc pay-loan-spc green-tint">
						    <div class="label-desc">Enter repayment amount</div>
						    <!--- Paystack form begins here --->
        						<form id="loanRepaymentForm" autocomplete="no">
        
                        				<input type="hidden" class="email" id="email" value="<?php echo $email; ?>" required />
                        				
                        				<input class="refID" type="hidden" id="refID" value="<?php echo "lrm_".md5(date('H:i:s')); ?>" />
            
            							<div class="walletTxtCont">
            							    
						                    <span class="naira-overlay"><i style="font-style:normal;font-family:helvetica;font-weight:bold;">&#x20A6;</i></span>
            							    <input type="text" class="walletTxt amount" id="amount" placeholder="200000" />
            							</div>
            							
            							<button type="submit" class="wallet-btn" onclick="payWithPaystack()"> Paystack </button>
            							
            							<div class="wallet-result"></div>
            							
        							
        							
        						</form>
        						<!--- Paystack form ends here --->
        						<!---Flutterwave form begins here --->
        						<form id="flutterwaveform" action='<?php echo base_url("flutterwave/create_transaction"); ?>' method='post'>

                    				<input type='hidden' name='customer_email' value="<?php echo $email; ?>" required/>
                    				
                    				<!---<label>Amount <span class='text-danger'>*</span></label>--->
                    				<input type='hidden' id="cost_amount" name='cost_amount' class='form-control' required/>
                    				
                    				<input type='hidden' name='payment_for' value='wallet' class='form-control'/>
                    				
                    				<input type='hidden' name='payment_plan' value='' class='form-control'/>
                    				
                    				<!---<label>Currency <span class='text-danger'>*</span></label>--->
                    				<input type='hidden' name='currency' value='NGN' readonly class='form-control'/>
                    				
                    				<input type="hidden" name="referenceID" value="<?php echo "lrm_".md5(date('H:i:s')); ?>" />
                    			
                    				<input type='submit' class='wallet-btn' value='Flutterwave'/>
                    				<!---<div class="wallet-btn">Pay rent <i class="fa fa-money"></i></div>--->
                    			</form>
        						<!---Flutterwave form ends here ---->
						</div>
					</div>
					<script>
    	                const paymentForm = document.getElementById('loanRepaymentForm');
                    
                    	paymentForm.addEventListener("submit", payWithPaystack, false);
                    
                    	function payWithPaystack(e) {
                    
                    	  e.preventDefault();
                    
                    	  let handler = PaystackPop.setup({
                    
                    		key: 'pk_live_7741a8fec5bee8102523ef51f19ebb467893d9d2', // Replace with your public key
                    
                    		email: document.getElementById("email").value,
                    
                    		amount: document.getElementById("amount").value * 100,
                    
                    		ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    
                    		// label: "Optional string that replaces customer email"
                    
                    		onClose: function(){
                    
                    		},
                    
                        callback: function(response){
                    
                          let message = 'Payment complete! Reference: ' + response.reference;
                          
                          updateTransaction();
                    
                        }
                    
                      });
                    
                      handler.openIframe();
                    
                    }
                    
                    function updateTransaction(){
                        
                        var baseURL = "https://www.rentsmallsmall.com/";
                        
                        var amount = document.getElementById('amount').value;
                        
                        var refID = document.getElementById('refID').value;
                        
                        var email = document.getElementById('email').value;
                        
                        var data = {"referenceID" : refID, "amount" : amount, "email" : email};
                        
                        $.ajaxSetup ({ cache: false });
                
                		$.ajax({
                
                			url : baseURL+'loans/loanRepayment/',
                
                			type: "POST",
                
                			async: true,
                
                			data: data,
                
                			success	: function (data){
                				if(data == 1){
                
                					alert("Loan has been successfully paid!");
                
                					location.reload(true);
                
                				}else{
                
                					alert("Error updating payment.");
                
                				}				
                
                			}
                
                		});
                    }
                    </script>
                    <script src="https://js.paystack.co/v1/inline.js"></script> 
					<script src="<?php echo base_url(); ?>assets/js/wallet.js"></script>
				<!--- Here is the end ----> 