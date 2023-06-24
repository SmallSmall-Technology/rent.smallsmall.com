    <!---Credit overlay starts here--->
    <div class="form-overlay">
        <div class="form-overlay-box funding-overlay">
            
            <div class="close-button">X</div>
            
            <div class="overlay-txt">Top up amount</div>
            
            <div class="overlay-amount"><span style="font-family:helvetica">&#x20A6;</span><span id="overlay-amt">0</span></div>
            
            <div class="wallet-fund-transfer-details">
                <div class="empty-card">
                    <div class="card-logo"><img src="<?php echo base_url(); ?>assets/img/card-logo.png" /></div>
                    <div class="virtual-account-info">Account Name: <span><?php echo @$account_details['account_name']; ?></span></div>
                    <div class="virtual-account-info">Virtual Account Number: <span><?php echo @$account_details['account_number']; ?></span></div>
                    <div class="virtual-account-info">Bank Name: <span><?php echo @$account_details['bank_name']; ?></span></div>
                    <div class="virtual-account-info">Created On: <span><?php echo date('m/y',strtotime($account_details['date_created'])); ?></span></div>
                </div>
            </div>
            
            <table class="fund-option-table" width="100%">                            
                    <tr>
                        <!---Paystack Form--->
                        <td valign="top">
                            <form id="walletForm">
                                
                                <input type="hidden" class="userID" id="userID" value="<?php echo $userID; ?>" required />
    
                				<input type="hidden" class="email" id="email" value="<?php echo $email; ?>" required />			  
                
                				<input type="hidden" class="amount" id="amount" value="" required />
                
                				<input class="fname" type="hidden" id="fname" value="<?php echo $fname; ?>" />
                
                				<input class="lname" type="hidden" id="lname" value="<?php echo $lname; ?>" />
                				
                				<input class="refID" type="hidden" id="refID" value="<?php echo "wlt_".md5(date('H:i:s')); ?>" />
                
                				<button type="submit" class="mob-btn action-btns green-bg" onclick="payWithPaystack()"> Fund with Paystack </button>
                
                			</form>
                            <!---<div class="action-btns green-bg">Fund with Paystack</div>--->
                        </td>
                        <!---Flutterwave Form --->
                        <td>
                            <!---Flutterwave form begins here --->
    						<form id="flutterwaveform" action='<?php echo base_url("flutterwave/create_transaction"); ?>' method='post'>

                				<input type='hidden' name='customer_email' value="<?php echo $email; ?>" required/>
                				
                				<!---<label>Amount <span class='text-danger'>*</span></label>--->
                				<input type='hidden' id="cost_amount" name='cost_amount' class='form-control' required/>
                				
                				<input type='hidden' name='payment_for' value='wallet' class='form-control'/>
                				
                				<input type='hidden' name='payment_plan' value='0' class='form-control'/>
                				
                				<!---<label>Currency <span class='text-danger'>*</span></label>--->
                				<input type='hidden' name='currency' value='NGN' readonly class="form-control"/>
                				
                				<input type="hidden" name="referenceID" value="<?php echo "wlt_".md5(date('H:i:s')); ?>" />
                			
                				<input type="submit" class="mob-btn action-btns green-bg" value="Fund with Flutterwave"/>
                				<!---<div class="wallet-btn">Pay rent <i class="fa fa-money"></i></div>--->
                			</form>
                        </td>
                        <td>
                            <div class="mob-btn wallet-transfer-btn action-btns green-bg">Fund by Transfer</div>
                        </td>
                    </tr>
                </table>
        </div>
        
        <div class="form-overlay-box withdrawal-overlay">
            <div class="close-button">X</div>
            <div class="overlay-narration">Fill in receiver details</div>
            <div class="overlay-result withdrawal"></div>
            <div class="forms-control-container">
                <label>Receiver account number</label>
                <input type="text" class="dash-txt-f verify-transfer-fields" id="receiver-account-number" />
            </div>
            <div class="forms-control-container">
                <label>Receiver bank name</label>
                <select id="customSelect" class="lenco-banks verify-transfer-fields">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="forms-control-container">
                <label>Amount</label>
                <input type="text" class="dash-txt-f verify-transfer-fields" id="receiver-transfer-amount" />
            </div>
            <div class="forms-control-container">
                <label>Narration</label>
                <input type="text" class="dash-txt-f verify-transfer-fields" id="receiver-narration" />
            </div>
            <div class="forms-control-container">
                <div id="transfer-btn" class="transfer-btn action-btns green-bg">Make Transfer</div>
            </div>
        
        </div>
    </div>
    <!---Wallet funding overlay starts here--->
    <script>
    	//const paymentForm = document.getElementById('walletForm');
    
    	//paymentForm.addEventListener("submit", payWithPaystack, false);
    
    	$('#walletForm').submit(function(e){
    
    	    e.preventDefault();
    
    	    let handler = PaystackPop.setup({
    
        		key: 'pk_live_7741a8fec5bee8102523ef51f19ebb467893d9d2', // Replace with your public key
        
        		email: document.getElementById("email").value,
        
        		amount: document.getElementById("amount").value * 100,
        
        		ref: document.getElementById("refID").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        
        		// label: "Optional string that replaces customer email"
        
        		onClose: function(){
        		    
                    alert('Payment aborted!');
                    
        		},
    
                callback: function(response){
            
                  //let message = 'Payment complete! Reference: ' + response.reference;
                  
                  updateTransaction(response.reference);
            
                }
            });
    
            handler.openIframe();
    
        });
    
    function updateTransaction(reference){
        
        var baseURL = "<?php echo base_url(); ?>";
        
        var userID = document.getElementById('userID').value;
        
        var amount = document.getElementById('amount').value;
        
        var refID = document.getElementById('refID').value;
        
        var email = document.getElementById('email').value;
        
        var paystack_reference = reference;
        
        var data = {"referenceID" : refID, "amount" : amount, "email" : email, "paystack_reference" : paystack_reference, "userID" : userID};
        
        $.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseURL+'loans/walletFunding/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){
				if(data == 1){

					alert("Your wallet has been successully funded!");

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