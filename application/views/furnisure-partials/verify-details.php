<div class="pane">

		<div class="pane-inner">

			<h1>Verify Details</h1>

		</div>

	</div>

	<div class="item-pane">

		<div class="page-inner">
            <table cellpadding="10px" class="renewal-details-table">
			    <tr class="renewal-details-tr">
			        <td class="renewal-details-td">Order ID</td>
			        <td class="renewal-details-td"># <?php echo $dets['orderID']; ?></td>
			    </tr>
			    <tr>
			        <td class="renewal-details-td">No of Items</td>
			        <td class="renewal-details-td"><?php echo @$item_count." Items"; ?></td>
			    </tr>
			    <?php if(isset($items) && !empty($items)){ ?>
			        <?php //echo count($items); ?>
			        <?php $count = 1; ?>
			        <?php foreach($items as $item => $value){ ?>
			            <tr>
        			        <td class="renewal-details-td">Item #<?php echo $count; ?></td>
        			        <td class="renewal-details-td"><?php echo @$value['applianceName']; ?></td>
        			    </tr>
        			    <?php $count++; ?>
			        <?php } ?>
			    <?php } ?>
			    <tr>
			        <td class="renewal-details-td">Payment Duration</td>
			        <td class="renewal-details-td"><?php echo $dets['payment_plan']; ?> Months </td>
			    </tr>
			    <tr>
			        <td class="renewal-details-td">Payment Type</td>
			        <td class="renewal-details-td"><?php echo $dets['payment_type']; ?></td>
			    </tr>
			    <tr>
			        <td class="renewal-details-td">Amount Due</td>
			        <td class="renewal-details-td"><span style="font-family:helvetica;font-weight:bold">&#x20A6;</span> <?php echo number_format(@$dets['amount']); ?></td>
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
			<?php if($dets['payment_type'] == 'paystack'){ ?>
			<form id="paymentForm">

				<input type="hidden" class="email" id="email" value="<?php echo $dets['email']; ?>" required />			  

				<input type="hidden" class="amount" id="amount" value="<?php echo $dets['amount']; ?>" required />

				<input class="fname" type="hidden" id="fname" value="<?php echo $dets['firstName']; ?>" />

				<input class="lname" type="hidden" id="lname" value="<?php echo $dets['lastName']; ?>" />
				
				<input class="propID" type="hidden" id="orderID" value="<?php echo $dets['orderID']; ?>" />
				
				<input class="refID" type="hidden" id="refID" value="<?php echo $dets['reference_id']; ?>" />
				
				<input type="hidden" class="ver_id" id="ver_id" value="<?php echo $dets['verification_id']; ?>" required />

				<button type="submit" class="btn paystack-but" onclick="payWithPaystack()"> Pay </button>

			</form>
			<?php } else { ?>
			    <div class="transfer-but"><a href="<?php echo base_url()."furnisure/payment-transfer"; ?>">Proceed</a></div>
			<?php } ?>

		</div>

	</div>
               
    <!--- Here is the end ---->
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
          
          updateTransaction();
    
        }
    
      });
    
      handler.openIframe();
    
    }
    
    function updateTransaction(){
            var baseURL = "https://test.rentsmallsmall.com/";
            
            var amount = document.getElementById('amount').value;
            
            var refID = document.getElementById('refID').value;
            
            //alert(bookingID+" - "+amount+" - "+propID+" - "+refID+" - "+expiry);
            
            var data = {"referenceID" : refID, "amount" : amount};
            
            $.ajaxSetup ({ cache: false });

    		$.ajax({
    
    			url : baseURL+'furnisure/updatePayment/',
    
    			type: "POST",
    
    			async: true,
    
    			data: data,
    
    			success	: function (data){
    				if(data == 1){
    
    					alert("Payment update Successful!");
    
    					window.location.href = baseURL+"furnisure/payment-success/"+refID;
    
    				}else{
    
    					alert("Error updating payment.");
    
    				}				
    
    			}
    
    		});
        }
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 