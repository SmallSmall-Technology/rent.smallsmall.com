	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-user text-success">

						</i>

					</div>

					<div>

						Buytolet Promo Form	

					</div>

				</div>

				</div>

		</div> 

		<div class="tab-content">			

			<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

				<div class="main-card mb-3 card">
					<div class="card-header">
						<a style="float:right" href="view-all-btl-promo" class="btn btn-primary" >View all promo</a>
					</div>
					<div class="card-body">

					<form autocomplete="off" id="adminBuytoletPromoForm">
					    
						<div class="position-relative row form-group user-fields">
						    
						    <label for="promo_title" class="col-sm-2 col-form-label">Promo Title</label>

							<div class="col-sm-10"><input name="promo_title" id="promo_title" placeholder="Promo Title" type="text" class="verify-txt form-control"></div>

						</div>

						<div class="position-relative row form-group user-fields">
						    
						    <label for="promo_type" class="col-sm-2 col-form-label">Promo Type</label>

							<div class="col-sm-10">
							    <select name="promo_type" id="promo_type" class="form-control verify-txt">
									<option value="">Select One</option>
                                    <option value="Free">Free Offer</option>
                                    <option value="Coupon">Coupon Offer</option>
								</select>
							</div>

						</div>
						
						<div class="position-relative row form-group user-fields">
						    
						    <label for="promo_beneficiary" class="col-sm-2 col-form-label">Beneficiary</label>

							<div class="col-sm-10">
							    <select name="promo_beneficiary" id="promo_beneficiary" class="form-control verify-txt">
									<option value="">Select One</option>
                                    <option value="Tenants">RSS Tenants</option>
                                    <option value="General">Everybody</option>
								</select>
							</div>

						</div>
                        <div>
    						<div class="position-relative row form-group hide-fields coupon-field">
    						    
    						    <label for="promo_code" class="col-sm-2 col-form-label">Promo Code</label>
    
    							<div class="col-sm-10">
    							    <input name="promo_code" id="promo_code" placeholder="Promo Code" type="text" class="form-control">
    							</div>
    
    						</div>
						</div>

						<div class="position-relative row form-group user-fields">
						    
						    <label for="promo_value" class="col-sm-2 col-form-label">Promo Value</label>

							<div class="col-sm-10"><input name="promo_value" id="promo_value" placeholder="Promo Value" type="text" class="verify-txt form-control"></div>

						</div>
						<div class="position-relative row form-group user-fields"><label for="promo_term" class="col-sm-2 col-form-label">Promo Condition</label>

							<div class="col-sm-10">
							    <input name="promo_term" id="promo_term" placeholder="Condition i.e 1" type="text" class="form-control">
							</div>

						</div>
						
						<div class="position-relative row form-group user-fields">
						    
						    <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>

							<div class="col-sm-10">
							    <input name="start_date" id="start_date" placeholder="Promo Start Date" class="verify-txt form-control">
							</div>

						</div>
						
						<div class="position-relative row form-group user-fields">
						    
						    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>

							<div class="col-sm-10">
							    <input name="end_date" id="end_date" placeholder="Promo End Date" class="form-control">
							</div>

						</div>

						<div class="position-relative row form-check">

							<div class="col-sm-10 offset-sm-2">

								<button id="send-but" class="btn btn-primary">Publish</button>

							</div>

						</div>



					</form>

					</div>

				</div>

			</div>

		</div>

	</div>
	<style>
	    .hide-fields{
	        display:none;
	    }
	</style>
<script>
$(document).ready(function(){
    $(function () {
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        
        $('#start_date').datetimepicker({ 
            format: 'DD-MM-YYYY'
            /*daysOfWeekDisabled: disabledDays,
            disabledDates: [
                moment("03/29/2021"), "03/30/2021 00:53"
            ]*/
        });
        $('#end_date').datetimepicker({ 
            format: 'DD-MM-YYYY'
        });
    
    });
    
    $('#promo_type').on('change', function(){
        
        var promo_type = $(this).val();
        
        if(promo_type == 'Coupon'){
            
            $('.hide-fields').hide();
            $('.coupon-field').css('display', 'flex');
            
        }else if(promo_type == 'Free'){
            
            $('.hide-fields').hide();
            //$('.free-field').show();
            
        }
        
    });
});
</script>