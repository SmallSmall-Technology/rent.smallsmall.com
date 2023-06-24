                <?php
				
				    $ref = 'rss_'.md5(rand(1000000, 9999999999));
				    
				    $pplan = 0;
				    
				    if(@$dets['payment_plan'] == 'Monthly'){
				        
				        $pplan = 1;
				        
				    }elseif(@$dets['payment_plan'] == 'Quarterly'){
				        
				        $pplan = 3;
				        
				    }elseif(@$dets['payment_plan'] == 'Bi-annually'){
				        
				        $pplan = 6;
				        
				    }elseif(@$dets['payment_plan'] == 'Upfront'){
				        
				        if($dets['duration'] == 12){
			
            				$pplan = 12;
            				
            			}elseif($dets['duration'] == 3){
            				
            				$pplan = 3;
            				
            			}elseif($dets['duration'] == 6){
            				
            				$pplan = 6;
            				
            			}elseif($dets['duration'] == 9){
            				
            				$pplan = 9;
            				
            			}
				    }
				?>

				<div class="dashboard-mainbar">

					<table cellpadding="10px" class="renewal-details-table">
					    <tr class="renewal-details-tr">
					        <td class="renewal-details-td">Transaction ID</td>
					        <td class="renewal-details-td"># <?php echo $dets['bookingID']; ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Property Name</td>
					        <td class="renewal-details-td"><?php echo @$dets['propertyTitle']; ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Payment Duration</td>
					        <td class="renewal-details-td"><?php echo $dets['duration']; ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Payment Type</td>
					        <td class="renewal-details-td"><?php echo $dets['payment_type']; ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Amount</td>
					        <td class="renewal-details-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span> <?php echo number_format(@$dets['price'] * $pplan); ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Payment Plan</td>
					        <td class="renewal-details-td"><?php echo $dets['payment_plan']; ?></td>
					    </tr>
					    <tr>
					        <td class="renewal-details-td">Date of Transaction</td>
					        <td class="renewal-details-td"><?php echo date("d M, Y", strtotime(date("Y-m-d"))); ?></td>
					    </tr>
					</table>
					
					<form id="paymentForm">

        				<input type="hidden" class="email" id="email" value="<?php echo $dets['email']; ?>" required />			  
        
        				<input type="hidden" class="amount" id="amount" value="<?php echo $dets['price'] * $pplan; ?>" required />
        
        				<input class="fname" type="hidden" id="fname" value="<?php echo $dets['firstName']; ?>" />
        
        				<input class="lname" type="hidden" id="lname" value="<?php echo $dets['lastName']; ?>" />
        				
        				<input class="refID" type="hidden" id="refID" value="<?php echo $ref; ?>" />
        				
        				<input type="hidden" class="booking_id" id="booking_id" value="<?php echo $dets['bookingID']; ?>" required />
        				
        				<input type="hidden" class="rent_exp" id="rent_exp" value="<?php echo $dets['next_rental']; ?>" required />
        				
        				<input type="hidden" class="ver_id" id="ver_id" value="<?php echo $dets['verification_id']; ?>" required />
        
        				<button type="submit" class="btn paystack-but" onclick="payWithPaystack()"> Pay </button>
        
        			</form>
				</div>

			</div>

		</div>

	</div>
	<script>
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
    
          updateTransaction(bID);
    
        }
    
      });
    
      handler.openIframe();
    
    }
    
    function updateTransaction(bookingID){
            //alert(bookingID+' - '+refID);
            var baseURL = "https://test.rentsmallsmall.com/";
            
            var rent_exp = document.getElementById('rent_exp').value;
            
            var duration = document.getElementById('duration').value;
            
            var pplan = document.getElementById('payment_plan').value;
            
            var amount = document.getElementById('amount').value;
            
            var propID = document.getElementById('propID').value;
            
            var refID = document.getElementById('refID').value;
            
            var verID = document.getElementById('ver_id').value;
            
            var data = {"bookingID" : bookingID, "referenceID" : refID, "rent_exp" : rent_exp, "duration" : duration, "pplan" : pplan, "amount" : amount, "propertyID" : propID, "verificationID" : verID};
            
            $.ajaxSetup ({ cache: false });

    		$.ajax({
    
    			url : baseURL+'rss/renewedTrans/',
    
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
    <script src="https://js.paystack.co/v1/inline.js"></script> 