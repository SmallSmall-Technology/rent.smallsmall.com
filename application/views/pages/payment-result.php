<div class="item-pane">

	<div class="pane-inner">

		<div class="payment-result-box">
		    <?php if(@$response == "success" && @$payment_purpose == 'property'){ ?>
		    
        			<div class="payment-result"><?php echo @$payment_status; ?></div>
        			
        			<div class="payment-detail"><u>Your details below</u></div>
        			
        			<?php if(@$type == 'rss'){ ?>
        			
        				<div class="payment-detail-s"><b>Property:</b> <?php echo @$propTitle ?></div>
        				
        			<?php }else{ ?>
        			
        				<div class="payment-detail-s"><b>Purchased:</b> Furnisure Items</div>
        				
        			<?php } ?>
        			
        			<div class="payment-detail-s"><b>Amount:</b> <span style="font-family:helvetica;font-weight:bold">&#x20A6;</span> <?php echo @number_format($propPrice); ?></div>
        			
        			<div class="micro-detail">Click the button below to see more details in your dashboard</div>
        			
        			<div class="dash-but"><a href="<?php echo base_url('user/wallet'); ?>">Go to dashboard</a></div>
    			
    		<?php }elseif(@$response == "success" && @$payment_purpose == 'wallet'){ ?>
    		
        			<div class="payment-result"><?php echo @$payment_status; ?></div>
        			
        			<div class="payment-detail"><u>Your details below</u></div>
        			
        			<div class="payment-detail-s"><b>Paid For:</b> Wallet Funding.</div>
        			
        			<div class="payment-detail-s"><b>Amount:</b> <span style="font-family:helvetica;font-weight:bold">&#x20A6;</span> <?php echo @number_format($fundedAmount); ?></div>
        			
        			<div class="micro-detail">Click the button below to see more details in your dashboard</div>
        			
        			<div class="dash-but"><a href="<?php echo base_url('user/wallet'); ?>">Go to dashboard</a></div>
    			
    		<?php }else{ ?>
    		
        		    <div class="payment-result"><?php echo @$status; ?></div>
        		    
        		    <div class="payment-detail"><?php echo @$message; ?></div>
        		    
    		<?php } ?>
		
		</div>

	</div>

</div>
