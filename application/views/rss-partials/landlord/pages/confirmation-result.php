	
	<div class="item-pane">

		<div class="pane-inner">
            <div class="spc-div">
    			<h1><?php echo @$status; ?></h1>
    
    			<h5><?php echo @$reason; ?></h5>
    		</div>
			<?php if(@$payment){ ?>
			<div class="spc-div">
			    <b style="display:block;margin-bottom:15px;">All bank transfers payable to:</b>
    			<table class="bank-det-tbl" cellpadding="20" cellspacing="10" >
    			    
    			    <tr class="bank-det-tr">
    			        <td class="bank-det-td"><b>Account Nam</b>e</td>
    			        <td class="bank-det-td">Rent Small Small Ltd</td>
    			    </tr>
    			    <tr class="bank-det-tr">
    			        <td class="bank-det-td"><b>Bank Name</b></td>
    			        <td class="bank-det-td">Providus Bank</td>
    			    </tr>
    			    <tr class="bank-det-tr">
    			        <td class="bank-det-td"><b>Account Number</b></td>
    			        <td class="bank-det-td">7900982382</td>
    			    </tr>
    			</table>
			</div>
            <?php } ?>
		</div>

	</div>