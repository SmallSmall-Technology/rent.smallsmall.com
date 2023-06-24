<style>
.confirmation-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.confirmation-result {
    width: 100%;
    font-family: gotham-medium;
    font-size: 40px;
    color: #414042;
    margin-bottom: 15px;
    margin-top: 40px;
    text-align: center;
}

.confirmation-result i {
    color: #007DC1;
    margin-left: 10px;
}

.confirmation-note {
    width: 100%;
    font-family: sans-serif;
    color: #414042;
    margin-bottom: 40px;
    text-align: center;
}
</style>
        
        
        <div class="other-content">
            <div class="verification-container">

                <div class="confirmation-result"><?php echo @$status; ?></div>
                <div class="confirmation-note"><?php echo @$reason; ?></div>
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