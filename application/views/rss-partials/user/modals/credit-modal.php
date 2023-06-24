    <!---Credit overlay starts here--->
    <div class="form-overlay">
        <div class="form-overlay-box credit-overlay">
                <!---<table width="100%">                            
                    <tr>
                        <td width="50px" valign="top"><div class="top-booking-icon top-credit-icon"></div></td>
                        <td>
                            <div class="dash-bt-header">Request Credit</div>
                            
                        </td>
                    </tr>
                </table>--->
            <div class="close-button">X</div>
            <div class="overlay-cards">
                
                <form id="loanRequestForm">
                    <div class="forms-control-container">
                        <label>Credit amount</label>
                        <input type="text" class="dash-txt-f" id="credit-amount" />
                    </div>
                    <div class="form-controls-cb-container">
                        <div class="label-txt">Purpose of credit</div>
                        <p></p>
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
                        <label for="data">
                            <input type="checkbox" value="Data" name="purpose" />
                            Data
                        </label>
                        <label for="airtime">
                            <input type="checkbox" value="Airtime" name="purpose" />
                            Airtime
                        </label>
                    </div>             
                    <div class="form-controls-container">
                        <input type="submit" class="action-btns proceed-btn green-bg" value="Request now" />
                    </div>                            
                    <div class="form-controls-container">
                        <label class="checkbox-label"><input type="checkbox" class="dash-chk-bx" id="t-and-c" />Click to agree to our <a href="#">terms and conditions</a></label>                    
                    </div> 
                </form>
            </div>
            <div style="padding:0" class="overlay-cards">
                <table cellspacing="10" width="100%">  
                    <tr style="padding-top:10px;padding-bottom:10px">
                        <td valign="middle" width="40%"><div class="label-txt">Amount payable</div></td>
                        <td>                            
                            <div class="feat-tnx green-txt"><span style="font-family:helvetica">&#x20A6;</span><span class="amount-payable"></span></div>
                        </td>
                    </tr>
                    <tr style="padding-top:10px;padding-bottom:10px">
                        <td width="50%"><div class="label-txt">Principal amount</div></td>
                        <td><span class="label-txt"><span style="font-family:helvetica">&#x20A6;</span><span class="credit-principal"></span></span></td>
                    </tr>
                    <tr style="padding-top:10px;padding-bottom:10px">
                        <td width="50%"><div class="label-txt">Interest rate</div></td>
                        <td><span class="label-txt">4%</span></td>
                    </tr>
                    <tr style="padding-top:10px;padding-bottom:10px">
                        <td width="50%"><div class="label-txt">Repayment period</div></td>
                        <td><span class="label-txt">30 Days</span></td>
                    </tr>
                </table>                              
            </div>
        </div>
    </div>
    <!---Credit overlay starts here--->
	<script src="<?php echo base_url(); ?>assets/js/wallet.js"></script>