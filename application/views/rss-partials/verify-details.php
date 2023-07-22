    <div class="other-content">
        <div class="payment-content">
            <div class="breadcrumb-strip">
                <span><a href="<?php echo base_url('properties'); ?>"><i class="fa fa-angle-left"></i> Back</a></span>
            </div>
            <div class="big-page-desc">Payment Summary</div>
            <div class="small-page-desc">This is a breakdown of your payment</div>
            <div class="online-payment-container">
                <div class="online-payment-item">
                    <div class="prod-details-item">
                        <div class="payment-table-container">
                            <table width="100%" cellpadding="20">
                                <tr>
                                    <td class="payment-details-td" valign="top" width="50%">
                                        <div class="payment-small-txt">Property info</div>
                                        <div class="payment-large-txt"><?php echo @$dets['propertyTitle']; ?></div>
                                    </td>
                                    <td class="payment-details-td" valign="top" width="50%">
                                        <div class="payment-small-txt">Subscription fee</div>
                                        <div class="payment-large-txt"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$property['price']); ?></div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt">Payment plan</div>
                                        <div class="payment-large-txt"><?php echo @$dets['payment_plan']; ?></div>
                                    </td>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt">Payment duration</div>
                                        <div class="payment-large-txt"><?php echo @$dets['duration']; ?> Month<?php echo @$pluralize; ?></div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt">Payment method</div>
                                        <div class="payment-large-txt"><?php echo @$dets['payment_type']; ?></div>
                                    </td>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt">Transaction ID</div>
                                        <div class="payment-large-txt"><?php echo @$dets['bookingID']; ?></div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt">Date</div>
                                        <div class="payment-large-txt"><?php echo date("M d, Y", strtotime(date("Y-m-d"))); ?></div>
                                    </td>
                                    <td class="payment-details-td" valign="top">
                                        <div class="payment-small-txt"></div>
                                        <div class="payment-large-txt"></div> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="online-payment-item cost-layout-item">
                    <div class="payment-blocks">
                        <div class="payment-table-container">
                            <table width="100%" cellpadding="20">
                                <tr class="price-tr">
                                    <td class="price-td">Subscription fee</td>
                                    <td class="price-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$property['price'] * @$dets['duration']); ?></td>
                                </tr>
                                <tr class="price-tr">
                                    <td class="price-td">Service charge</td>
                                    <td class="price-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$property['serviceCharge'] * @$dets['duration']); ?></td>
                                </tr>
                                <tr class="price-tr">
                                    <td class="price-td">Security deposit</td>
                                    <td class="price-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo (@$dets['securityDepositTerm'] == 1) ? number_format(@$dets['securityDeposit'] * @$dets['securityDepositTerm']) : number_format(0.75 * @$dets['securityDeposit'] * @$dets['securityDepositTerm']); ?></td>
                                </tr>
                                <tr class="price-tr">
                                    <td class="price-td"><i style="color:#F00">Recurring amount</i></td>
                                    <td class="price-td"><i style="color:#F00"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$property['price'] + @$property['serviceCharge']); ?></i></td>
                                </tr>
                                <tr class="price-tr">
                                    <td class="price-td">Total</td>
                                    <td class="price-td total-price"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span><?php echo number_format(@$dets['amount']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="payment-blocks">
                        <?php if($dets['payment_type'] == 'paystack'){ ?>
                			<form id="paymentForm">
                
                				<input type="hidden" class="email" id="email" value="<?php echo @$dets['email']; ?>" required />			  
                
                				<input type="hidden" class="amount" id="amount" value="<?php echo @$dets['amount']; ?>" required />
                
                				<input class="fname" type="hidden" id="fname" value="<?php echo @$dets['firstName']; ?>" />
                
                				<input class="lname" type="hidden" id="lname" value="<?php echo @$dets['lastName']; ?>" />
                				
                				<input class="propID" type="hidden" id="propID" value="<?php echo @$dets['propertyID']; ?>" />
                				
                				<input class="refID" type="hidden" id="refID" value="<?php echo @$dets['reference_id']; ?>" />
                				
                				<input type="hidden" class="booking_id" id="booking_id" value="<?php echo @$dets['bookingID']; ?>" required />
                				
                				<input type="hidden" class="ver_id" id="ver_id" value="<?php echo @$dets['verification_id']; ?>" required />
                				
                				<input type="hidden" class="rent_expiry" id="rent_expiry" value="<?php echo @$dets['rent_expiration']; ?>" required />
                
                				<button type="submit" class="online-payment-btn" onclick="payWithPaystack()"> Pay now </button>
                
                			</form>
                			
            			<?php }else if($dets['payment_type'] == 'flutterwave'){ ?>
            			
                			<form action='<?php echo base_url("flutterwave/create_transaction"); ?>' method='post'>
                
                				<input type='hidden' name='customer_email' value="<?php echo @$dets['email']; ?>" required/>
                				
                				<!---<label>Amount <span class='text-danger'>*</span></label>--->
                				<input type='hidden' name='cost_amount' class='form-control' value="<?php echo @$dets['amount']; ?>" required/>
                				
                				<!---<label>Currency <span class='text-danger'>*</span></label>--->
                				<input type='hidden' name='currency' value='NGN' readonly class='form-control'/>
                				
                				<!---<label>Currency <span class='text-danger'>*</span></label>--->
                				<input type='hidden' name='payment_for' value='property' readonly class='form-control'/>
                				
                				<!---<label>Payment Plan ID [ Set your product / plan ID for recurring payments if any ]</label>--->
                				<input type='hidden' name='payment_plan' value=''  class='form-control'/>
                				
                				<input type="hidden" name="propertyID" value="<?php echo @$dets['propertyID']; ?>" />
                				
                				<input type="hidden" name="referenceID" value="<?php echo @$dets['reference_id']; ?>" />
                				
                				<input type="hidden" name="bookingID" value="<?php echo @$dets['bookingID']; ?>" required />
                				
                				<input type="hidden" name="verificationID" value="<?php echo @$dets['verification_id']; ?>" required />
                				
                				<input type="hidden" name="rentExpiry" value="<?php echo @$dets['rent_expiration']; ?>" required />
                				
                				<input type='submit' class='online-payment-btn' value='Pay now'/>
                				
                			</form>
                			
                		<?php }else if($dets['payment_type'] == 'crypto'){ ?>
                		
                            <input type="hidden" min="5" class="currencyInput" value="NGN" />
                            
                            <input type="hidden" min="5" class="amountInput" value="<?php echo @$dets['amount']; ?>" />
                            
                            <input type="hidden"  class="emailInput" value="<?php echo @$dets['email']; ?>" />
                				
                				<input type="hidden" name="property_id" class="property_id" value="<?php echo @$dets['propertyID']; ?>" />
                				
                			<input type="hidden" name="refNum" class="refNum" value="<?php echo @$dets['reference_id']; ?>" />
                				
                			<input type="hidden" name="bookingNum" class="bookingNum" value="<?php echo @$dets['bookingID']; ?>" required />
                            
                            <input type="hidden" value="Subscription payment" class="descriptionInput" />
                            
                            <input type="hidden" class="publicKeyInput" value="pub_live_VgSADM_frnCM1nc0Cci5gjqQrMOc7W-" />
                				
                			<input type="hidden" class="rent_expiry" value="<?php echo @$dets['rent_expiration']; ?>" required />
                            
                            <button class="online-payment-btn payButton">Pay</button>
                            
                		<?php } else if(@$dets['payment_type'] == 'wallet'){ ?>
                		
                		        <div class="online-payment-btn wallet-transaction" id="wallet-transaction-<?php echo @$dets['amount'].'-'.@$dets['bookingID']; ?>">Pay subscription</div>
                		
            			<?php } else { ?>
            			        <div class="transfer-container">
                                    <div class="bank-logo-container">
                                        <img src="assets/img/providus-transfer-logo.png" alt="Providus bank logo" />
                                    </div>
                                    <table width="100%" cellpadding="20">
                                        <tr class="price-tr">
                                            <td class="price-td">Account name</td>
                                            <td class="price-td">Rent SmallSmall LTD</td>
                                        </tr>
                                        <tr class="price-tr">
                                            <td class="price-td">Account number</td>
                                            <td class="price-td">7900982382</td>
                                        </tr>
                                    </table> 
                                    <input type="hidden" id="acct-details" value="Rent SmallSmall LTD Providus Bank 7900982382" />
                                    <div class="online-payment-btn" onclick="copyAcctDetails()">Copy details</div> 
                                </div>
            			        <!---<div class="transfer-but"><a href="<?php //echo base_url()."payment-transfer"; ?>">Proceed</a></div>--->
            			    
            			<?php } ?>
                        
                        <!---<div class="online-payment-btn">Pay now</div>--->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<script>
	    var baseURL = "https://dev-rent.smallsmall.com/";
	    
    	const paymentForm = document.getElementById('paymentForm');
    
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
        
        var bookingID = document.getElementById('booking_id').value;
        
        var amount = document.getElementById('amount').value;
        
        var propID = document.getElementById('propID').value;
        
        var refID = document.getElementById('refID').value;
        
        var expiry = document.getElementById('rent_expiry').value;
        
        //alert(bookingID+" - "+amount+" - "+propID+" - "+refID+" - "+expiry);
        
        var data = {"bookingID" : bookingID, "referenceID" : refID, "amount" : amount, "propertyID" : propID, "expiry" : expiry};
        
        $.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseURL+'rss/updatePayment/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){
				if(data == 1){

					alert("Payment update Successful!");

					window.location.href = baseURL+"rss/payment-success/"+refID;

				}else{

					alert("Error updating payment.");

				}				

			}

		});
    }
    </script>
    <script>
        function copyAcctDetails() {
            /* Get the text field */
            var copyText = document.getElementById("acct-details");
    
            /* Select the text field */
            copyText.select();
            //copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
    
            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
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
        const propId = document.querySelector(".property_id");
        const bookingInput = document.querySelector(".bookingNum");
        const rent_expiry_date = document.querySelector("rent_expiry");
        
        payButton.addEventListener("click", () => {
            const amount = amountInput.value;
            const email = emailInput.value;
            const publicKey = publicKeyInput.value;
            const description = descriptionInput.value;
            const currency = currencyInput.value;
            const refID = refInput.value;
            const bookingID = bookingInput.value;
            const rentExpiryDate = rent_expiry_date.value;
        
            window.payWithBasqet({
                amount,
                email,
                ...(description && { description }),
                currency: currency,
                public_key: publicKey,
                meta: {
                    transaction_reference: refID
                },
                onSuccess: (ref) => {
                    
                    //alert(`Transaction successful: ${ref}`);
                    updateCryptoTransaction();
                    
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
        
        function updateCryptoTransaction(){
            
            var bookingID = bookingInput.value;
            
            var amount = amountInput.value;
            
            var propID = propId.value;
            
            var refID = refInput.value;
            
            var expiry = rentExpiryDate.value;
            
            //alert(bookingID+" - "+amount+" - "+propID+" - "+refID+" - "+expiry);
            
            var data = {"bookingID" : bookingID, "referenceID" : refID, "amount" : amount, "propertyID" : propID, "expiry" : expiry};
            
            $.ajaxSetup ({ cache: false });
    
    		$.ajax({
    
    			url : baseURL+'rss/updatePayment/',
    
    			type: "POST",
    
    			async: true,
    
    			data: data,
    
    			success	: function (data){
    				if(data == 1){
    
    					alert("Payment update Successful!");
    
    					window.location.href = baseURL+"rss/payment-success/"+refID;
    
    				}else{
    
    					alert("Error updating payment.");
    
    				}				
    
    			}
    
    		});
        }
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/wallet-payment.js"></script>
    <script src="https://checkout.basqet.com/static/prod/basqet.js"></script> 