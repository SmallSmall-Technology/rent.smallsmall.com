<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
				<div class="position-relative form-group">
				    <label for="duration-float" class="">Duration</label>
				    <select name="duration-float" id="duration-float" class="form-control verify-txt duration-float">

						<option value="">Select Months</option>
						<option value="1">1 month</option>
						<option value="2">2 months</option>
						<option value="3">3 months</option>
						<option value="4">4 months</option>
						<option value="5">5 months</option>
						<option value="6">6 months</option>
						<option value="7">7 months</option>
						<option value="8">8 months</option>
						<option value="9">9 months</option>
						<option value="10">10 months</option>
						<option value="11">11 months</option>
						<option value="12">12 months</option>
					</select>

				</div>
				<div class="position-relative form-group">
				    <label for="payment-month" class="">Payment for</label>
				    <select name="payment-month" id="payment-month" class="form-control payment-month">
						<option value="">Select Month</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>
				</div>
				<div class="row">
				    <div class="col-md-6">
				        <label for="rent-due" class="">Due Date</label>
					    <input name="rent-due" type="date" class="form-control rent-due-float" id="rent-due-float" />
				    </div>
				    <div class="col-md-6">
    				    <label for="rent-due" class="">Date of transaction</label>
    					<input name="tnx-date" type="date" class="form-control tnx-date-float" id="tnx-date-float" />
					</div>
				</div>
				<div class="row">
				    <div class="col-md-6">
    				    <label for="rent-amount-float" class="">Rent amount</label>
    					<input name="rent-amount-float" type="text" class="form-control rent-amount-float" id="rent-amount-float" placeholder="i.e 150000" />
					</div>
					<div class="col-md-6">
					    <label for="security-dep-float" class="">Security Deposit</label>
					    <input name="sec-dep-float" type="text" class="form-control sec-dep-float" id="sec-dep-float" placeholder="i.e 1500000" />
					</div>
				</div>
				<div class="position-relative form-group">
				    <label for="sec-dep-term" class="">Security Deposit Term</label>
				    <select name="sec-dep-term" id="sec-dep-term" class="form-control sec-dep-term">

						<option value="">Select Term</option>
						<option value="1">1 month</option>
						<option value="2">2 months</option>
					</select>
				</div>
				<div class="row">
				    <div class="col-md-6">
				        <label for="">
				            <input type="radio" name="lvl-payment" id="" value="Full" />Full payment
				        </label>
				    </div>
				    <div class="col-md-6">
				        <label for="">
				            <input type="radio" name="lvl-payment" id="" value="Part" />Part payment
				        </label>
				    </div>
				    
				</div>
				<input type="hidden" id="prop-id-float" value="" />
				<input type="hidden" id="booking-id-float" value="" />
				<input type="hidden" id="user-id-float" value="" />
				<input type="hidden" id="verification-id-float" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-payment-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary lock-transaction">Save changes</button>
               
            </div>
        </div>
    </div>
</div>