//Javascript Document

function numberWithCommas(amt) {

	"use strict";

    return amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ", ");

}

$('.payment-plan-d').on('change', function(){

	"use strict";
	
	var first_months = "";
	
	var subsequent_months = "";
	
	var pay_per_first_months = 0;
	
	var pay_per_subsequent_months = 0;

	//How will the payment plan be Monthly, Upfront, Quarterly or Bi-annually

	var pplan = $(this).val();
	
	//Get Monthly rate from hidden field

	var price = parseInt($('.monthly-cost').val());

	

	var securityDeposit = parseInt($('.sec-dep-cost').val());
	
	
	
	if(pplan == 12){
	    
	    $('.first-months').html('Month 1 - 3');
	    
	    $('.subsequent-months').html('Month 4 - 9');
	    
	    pay_per_first_months = numberWithCommas(Math.floor((price * 0.6) / 3));
	
	    pay_per_subsequent_months = numberWithCommas(Math.floor((price * 0.6) / 9));
	    
	    $('.pay-per-first-mth').html(pay_per_first_months);
	    
	    $('.pay-per-subsequent-mth').html(pay_per_subsequent_months);
	    
	}else if(pplan == 6){
	    
	    $('.first-months').html('Month 1 - 2');
	    
	    $('.subsequent-months').html('Month 3 - 6');
	    
	    pay_per_first_months = numberWithCommas(Math.floor((price * 0.6) / 2));
	
	    pay_per_subsequent_months = numberWithCommas(Math.floor((price * 0.6) / 4));
	    
	    $('.pay-per-first-mth').html(pay_per_first_months);
	    
	    $('.pay-per-subsequent-mth').html(pay_per_subsequent_months);
	    
	}else if(pplan == 4){
	    
	    $('.first-months').html('Month 1 - 2');
	    
	    $('.subsequent-months').html('Month 3 - 4');
	    
	    pay_per_first_months = numberWithCommas(Math.floor((price * 0.6) / 2));
	
	    pay_per_subsequent_months = numberWithCommas(Math.floor((price * 0.6) / 2));
	    
	    $('.pay-per-first-mth').html(pay_per_first_months);
	    
	    $('.pay-per-subsequent-mth').html(pay_per_subsequent_months);
	    
	}

	

	//alert(pplan+'-'+price+'-'+securityDeposit);

	

	price = parseInt(price) * parseInt(pplan);

	

	if(pplan != 12){
	
		price = price + securityDeposit;
		
	}

	

	$('.amount-due').val(price);

	$('.totalDisplay').html(numberWithCommas(price));

});