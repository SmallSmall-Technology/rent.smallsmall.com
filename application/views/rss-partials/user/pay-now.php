        <div class="pay-now-container white-bg">
            <!----Display table for payment details ---->
    		<table cellpadding="20px" class="renewal-details-table">
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Transaction ID</td>
    		        <td class="renewal-details-td"># <?php echo $dets['bookingID']; ?></td>
    		    </tr>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Property Name</td>
    		        <td class="renewal-details-td"><?php echo @$dets['propertyTitle']; ?></td>
    		    </tr>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Payment Duration</td>
    		        <td class="renewal-details-td"><?php echo $dets['duration']; ?></td>
    		    </tr>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Payment Type</td>
    		        <td class="renewal-details-td"><?php echo ucfirst($dets['payment_type']); ?></td>
    		    </tr>
    		    <?php if($dets['payment_type'] == 'transfer'){ ?>
    		    <tr class="renewal-details-tr">
    		        <td valign="top" class="renewal-details-td">Bank Details</td>
    		        <td class="renewal-details-td"><b>Account Name:</b> Rent Small Small Ltd <br /><b>Bank Name:</b> Providus Bank<br /><b>Account Number:</b> 7900982382</td>
    		    </tr>
    		    <?php } ?>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Amount</td>
    		        <td class="renewal-details-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span> <?php echo number_format(@$dets['amount']); ?></td>
    		    </tr>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Payment Plan</td>
    		        <td class="renewal-details-td"><?php echo $dets['payment_plan']; ?></td>
    		    </tr>
    		    <tr class="renewal-details-tr">
    		        <td class="renewal-details-td">Date of Transaction</td>
    		        <td class="renewal-details-td"><?php echo date("d M, Y", strtotime(date("Y-m-d"))); ?></td>
    		    </tr>
    		</table>
    		<!----Display table for payment details ---->
    		
    		<?php if($dets['payment_type'] == 'paystack'){ ?>
    		
        		<!----Paystack form ---->
        		<form id="paymentForm">
        
        			<input type="hidden" class="email" id="email" value="<?php echo $dets['email']; ?>" required />			  
        
        			<input type="hidden" class="amount" id="amount" value="<?php echo $dets['amount']; ?>" required />
        
        			<input class="fname" type="hidden" id="fname" value="<?php echo $dets['firstName']; ?>" />
        
        			<input class="lname" type="hidden" id="lname" value="<?php echo $dets['lastName']; ?>" />
        			
        			<input class="refID" type="hidden" id="refID" value="<?php echo $dets['reference_id']; ?>" />
        			
        			<input type="hidden" class="booking_id" id="booking_id" value="<?php echo $dets['bookingID']; ?>" required />
        			
        			<input type="hidden" class="rent_exp" id="rent_exp" value="<?php echo $dets['rent_expiration']; ?>" required />
        			
        			<input type="hidden" class="duration" id="duration" value="<?php echo $dets['duration']; ?>" required />
        			
        			<input type="hidden" class="payment_plan" id="payment_plan" value="<?php echo $dets['payment_plan']; ?>" required />
        			
        			<input type="hidden" class="propID" id="propID" value="<?php echo $dets['propertyID']; ?>" required />
                    
        			<button type="submit" class="green-bg pay-now-btn" onclick="payWithPaystack()"> Pay now </button>
        			
        
        		</form>
        		<!----Paystack form ---->
    		<?php }else if($dets['payment_type'] == 'flutterwave'){ ?>
        			<form action='<?php echo base_url("flutterwave/create_transaction"); ?>' method='post'>
        
        				<input type='hidden' name='customer_email' value="<?php echo $dets['email']; ?>" required/>
        				
        				<!---<label>Amount <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='cost_amount' class='form-control' value="<?php echo $dets['amount']; ?>" required/>
        				
        				<!---<label>Currency <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='currency' value='NGN' readonly class='form-control'/>
        				
        				<!---<label>Currency <span class='text-danger'>*</span></label>--->
        				<input type='hidden' name='payment_for' value='property' readonly class='form-control'/>
        				
        				<!---<label>Payment Plan ID [ Set your product / plan ID for recurring payments if any ]</label>--->
        				<input type='hidden' name='payment_plan' value=''  class='form-control'/>
        				
        				<input type="hidden" name="propertyID" value="<?php echo $dets['propertyID']; ?>" />
        				
        				<input type="hidden" name="referenceID" value="<?php echo $dets['reference_id']; ?>" />
        				
        				<input type="hidden" name="bookingID" value="<?php echo $dets['bookingID']; ?>" required />
        				
        				<input type="hidden" name="verificationID" value="<?php echo $dets['verification_id']; ?>" required />
        				
        				<input type="hidden" name="rentExpiry" value="<?php echo $dets['rent_expiration']; ?>" required />
        				
        				<input type='submit' class='green-bg pay-now-btn' value='Pay Now'/>
        				
        			</form>
        			<?php }else if($dets['payment_type'] == 'crypto'){ ?>
                		
                        <input type="hidden" min="5" class="currencyInput" value="NGN" />
                        
                        <input type="hidden" min="5" class="amountInput" value="<?php echo @$dets['amount']; ?>" />
                        
                        <input type="hidden"  class="emailInput" value="<?php echo @$dets['email']; ?>" />
            				
            			<input type="hidden" name="refNum" class="refNum" value="<?php echo @$dets['reference_id']; ?>" />
            				
            			<input type="hidden" name="bookingNum" class="bookingNum" value="<?php echo @$dets['bookingID']; ?>" required />
                        
                        <input type="hidden" value="Subscription payment" class="descriptionInput" />
                        
                        <input type="hidden" class="publicKeyInput" value="pub_test_SoQA8Vi5yYgnCDrq7foEXE9RO2YFawX" />
                        
                        <button class="green-bg pay-now-btn payButton">Pay</button>
                        
    			<?php } else { ?>
    			    <div class="green-bg pay-now-btn"><a href="<?php echo base_url()."payment-transfer"; ?>">Proceed</a></div>
    			<?php } ?>
    		</div>

	    </div>
    	<script>
        	const paymentForm = document.getElementById('paymentForm');
        	
        	var bID = document.getElementById('booking_id').value;
        	
        	var refID = document.getElementById("refID").value;
        
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
                        
                        updateTransaction(bID, refID);
                
                    }
                });
        
                handler.openIframe();
            
            }
            
            function updateTransaction(bookingID, refID){
                //alert(bookingID+' - '+refID);
                var baseURL = "https://test.rentsmallsmall.com/";
                
                var rent_exp = document.getElementById('rent_exp').value;
                
                var duration = document.getElementById('duration').value;
                
                var pplan = document.getElementById('payment_plan').value;
                
                var amount = document.getElementById('amount').value;
                
                var propID = document.getElementById('propID').value;
                
                var data = {"bookingID" : bookingID, "referenceID" : refID, "rent_exp" : rent_exp, "duration" : duration, "pplan" : pplan, "amount" : amount, "propertyID" : propID};
                
                $.ajaxSetup ({ cache: false });
    
        		$.ajax({
        
        			url : baseURL+'rss/updateTransaction/',
        
        			type: "POST",
        
        			async: true,
        
        			data: data,
        
        			success	: function (data){
        				if(data == 1){
        
        					alert("Payment update Successful!");
        
        					window.location.href = baseURL+"user/bookings";
        
        				}else{
        
        					alert("Error updating payment.");
        
        				}				
        
        			}
        
        		});
            }
        </script>
        <script>
            const amountInput = document.querySelector(".amountInput");
            const payButton = document.querySelector(".payButton");
            const emailInput = document.querySelector(".emailInput");
            const descriptionInput = document.querySelector(".descriptionInput");
            const publicKeyInput = document.querySelector(".publicKeyInput");
            const currencyInput = document.querySelector(".currencyInput");
            const refInput = document.querySelector(".refNum");
            const bookingInput = document.querySelector(".bookingNum");
        
            payButton.addEventListener("click", () => {
                const amount = amountInput.value;
                const email = emailInput.value;
                const publicKey = publicKeyInput.value;
                const description = descriptionInput.value;
                const currency = currencyInput.value;
                const refID = refInput.value;
                const bookingID = bookingInput.value;
            
                window.payWithBasqet({
                    amount,
                    email,
                    ...(description && { description }),
                    currency: currency,
                    public_key: publicKey,
                    meta: {
                        transaction_reference: "REF56768798"
                    },
                    onSuccess: (ref) => {
                        alert(`Transaction successful: ${ref}`);
                    },
                    onError: (error) => {
                        alert(`Transaction failed ${error}`);
                    },
                    onClose: () => {
                        alert("Checkout closed");
                    },
                    onAbandoned: () => {
                        alert("Checkout Abandoned");
                    }
                });
            });
        </script>
        <script src="https://js.paystack.co/v1/inline.js"></script> 
        <script src="https://checkout.basqet.com/static/prod/basqet.js"></script> 