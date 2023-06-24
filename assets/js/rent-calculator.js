//Javascript Document

function numberWithCommas(amt) {

	"use strict";
    return amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}


// Handle Mobile

$('.payment_plan').on('change', function(){

	"use strict";

	//How will the payment plan be Monthly, Upfront, Quarterly or Bi-annually
	
	var pplan = $('.payment_plan').val();

	//How long will the rent be for
	
	var duration = $('.duration').val();

	//Get Monthly rate from hidden field
	
	var price = parseInt($('.prop-monthly-price').val());
	
	var Sprice = parseInt($('.prop-monthly-price').val());
	
	var mnth = 'Monthly';
	
	var subc = parseInt(price) * parseInt(1);

	var service_charge = parseInt($('.serv-charge').val());
	
	console.log(service_charge);
	
	//Add service charge to rent price
	
	var securityDeposit = parseInt($('.sec-deposit').val());
	
	var securityDeposits = '';

	if(pplan == 'Monthly'){

		price = parseInt(price) * parseInt(1);
		
		mnth = 'Monthly';
		
		subc = parseInt(Sprice) * parseInt(1);
		
		price = price + securityDeposit;
		
		$('.sec_dep').html(numberWithCommas(securityDeposit));
		

	}else if(pplan == 'Bi-annually'){

        subc = parseInt(Sprice) * parseInt(6);
        
		price = ( parseInt(price) * parseInt(duration) ) / parseInt(2);
		
		mnth = 'Bi-annually';
		
		price = price + securityDeposit;
		
		$('.sec_dep').html(numberWithCommas(securityDeposit));

	}else if(pplan == 'Quarterly'){

        subc = parseInt(Sprice) * parseInt(3);
        
		price = ( parseInt(price) * parseInt(duration) ) / parseInt(4);
		
		mnth = 'Quartely';
		
		price = price + securityDeposit;
		
		$('.sec_dep').html(numberWithCommas(securityDeposit));

	}else if(pplan == 'Upfront'){

        subc = parseInt(Sprice) * parseInt(12);
        
		price = parseInt(price) * parseInt(duration);
		
		mnth = 'Upfront';
		
		if(subc > 2000000)
		{
		    securityDeposits = 0.30 * subc;
		}
		
		else
		{
		    securityDeposits = 0.25 * subc;
		}
		
		
		price = price + securityDeposits;
		
		$('.sec_dep').html(numberWithCommas(securityDeposits));

	}else{
	    
	    price = parseInt(price);
	    
	    mnth = 'Monthly';
	    
		subc = parseInt(Sprice) * parseInt(1);
	
	    price = price + securityDeposit;    
	}

	//console.log(price);
	
	price = price + service_charge;

	$('.amount-due').val(price);

	$('.pricing').html(numberWithCommas(price));
	
	$('.mnth').html(mnth);

	$('.subc').html(numberWithCommas(subc));
	
	
// Update the values of the hidden input fields
    $('input[name="subscription-fees"]').val(subc);
    
    $('input[name="service-charge-deposit"]').val(service_charge);

    if (pplan == 'Upfront') {
        
        if (subc > 2000000) {
             securityDeposits = 0.30 * subc;
        } else {
        securityDeposits = 0.25 * subc;
        }
        
    } else {
        
    securityDeposits = parseInt($('.sec-deposit').val());
    }

    $('input[name="security-deposit-fund"]').val(securityDeposits);
    
    $('input[name="total"]').val(price);

});

$('.duration').on('change', function(){

	"use strict";

	//How will the payment plan be Monthly, Upfront, Quarterly or Bi-annually
	
	var pplan = $('.payment_plan').val();

	//How long will the rent be for
	
	var duration = $(this).val();

	//Get Monthly rate from hidden field
	var price = parseInt($('.prop-monthly-price').val());
    
	var securityDeposit = parseInt($('.sec-deposit').val());

	var servCharge = parseInt($('.serv-charge').val());
	
	//Add service charge to rent price
	
	price = price + servCharge;
	
	console.log(price);

	if(pplan == 'Monthly'){

		price = parseInt(price) * parseInt(1);

	}else if(pplan == 'Bi-annually'){

		price = parseInt(price) * parseInt(duration);

	}else if(pplan == 'Quarterly'){

		price = parseInt(price) * parseInt(duration);

	}else if(pplan == 'Upfront'){

		price = parseInt(price) * parseInt(duration);

	}

	price = price + securityDeposit;

	$('.amount-due').val(price);

	$('.pricing').html(numberWithCommas(price));
	
// Update the values of the hidden input fields
 
    $('input[name="total"]').val(price);

});


// Handle Desktop
// Same code but just modify it and change the payment_plan to payment_ppn due to conflit on both when using same classname

$('.payment_ppn').on('change', function() {
    
  "use strict";
  
  var pplan = $('.payment_ppn').val();
  
  var duration = $('.duration').val();
  
  var price = parseInt($('.prop-monthly-price').val());
  
  var Sprice = parseInt($('.prop-monthly-price').val());
  
  var mnth = 'Monthly';
  
  var subc = parseInt(price) * parseInt(1);
  
  var service_charge = parseInt($('.serv-charge').val());
  
  var securityDeposit = parseInt($('.sec-deposit').val());
  
  var securityDeposits = '';

  if (pplan == 'Monthly') {
      
    price = parseInt(price) * parseInt(1);
    
    mnth = 'Monthly';
    
    subc = parseInt(Sprice) * parseInt(1);
    
    price = price + securityDeposit;
    
    $('.sec_dep').html(numberWithCommas(securityDeposit));
    
  } else if (pplan == 'Bi-annually') {
      
    subc = parseInt(Sprice) * parseInt(6);
    
    price = (parseInt(price) * parseInt(duration)) / parseInt(2);
    
    mnth = 'Bi-annually';
    
    price = price + securityDeposit;
    
    $('.sec_dep').html(numberWithCommas(securityDeposit));
    
  } else if (pplan == 'Quarterly') {
      
    subc = parseInt(Sprice) * parseInt(3);
    
    price = (parseInt(price) * parseInt(duration)) / parseInt(4);
    
    mnth = 'Quartely';
    
    price = price + securityDeposit;
    
    $('.sec_dep').html(numberWithCommas(securityDeposit));
    
  } else if (pplan == 'Upfront') {
      
    subc = parseInt(Sprice) * parseInt(12);
    
    price = parseInt(price) * parseInt(duration);
    
    mnth = 'Upfront';
    
    if (subc > 2000000) {
        
      securityDeposits = 0.30 * subc;
      
    } else {
        
      securityDeposits = 0.25 * subc;
      
    }
    
    price = price + securityDeposits;
    
    
    
    $('.sec_dep').html(numberWithCommas(securityDeposits));
    
    
  } else {
      
    price = parseInt(price);
    
    mnth = 'Monthly';
    
    subc = parseInt(Sprice) * parseInt(1);
    
    price = price + securityDeposit;
    
  }

  price = price + service_charge;
  
  $('.amount-due').val(price);
  
  $('.pricing').html(numberWithCommas(price));
  
  $('.mnth').html(mnth);
  
  $('.subc').html(numberWithCommas(subc));
  
  
  // Update the values of the hidden input fields
    $('input[name="subscription-fees"]').val(subc);
    
    $('input[name="service-charge-deposit"]').val(service_charge);

    if (pplan == 'Upfront') {
        
        if (subc > 2000000) {
            
             securityDeposits = 0.30 * subc;
        } else {
            
        securityDeposits = 0.25 * subc;
        
        }
        
    } else {
        
    securityDeposits = parseInt($('.sec-deposit').val());
    }

    $('input[name="security-deposit-fund"]').val(securityDeposits);
    
    $('input[name="total"]').val(price);


});

$('.duration').on('change', function() {
    
  "use strict";
  
  var pplan = $('.payment_ppn').val();
  
  var duration = $(this).val();
  
  var price = parseInt($('.prop-monthly-price').val());
  
  var securityDeposit = parseInt($('.sec-deposit').val());
  
  var servCharge = parseInt($('.serv-charge').val());
  
  price = price + servCharge;

  if (pplan == 'Monthly') {
      
    price = parseInt(price) * parseInt(1);
    
  } else if (pplan == 'Bi-annually') {
      
    price = parseInt(price) * parseInt(duration);
    
  } else if (pplan == 'Quarterly') {
      
    price = parseInt(price) * parseInt(duration);
    
  } else if (pplan == 'Upfront') {
      
    price = parseInt(price) * parseInt(duration);
    
  }

  price = price + securityDeposit;
  
  $('.amount-due').val(price);
  
  $('.pricing').html(numberWithCommas(price));
  
 // Update the values of the hidden input fields
    
    $('input[name="total"]').val(price);
});







// Old
// $('.payment_plan').on('change', function(){

// 	"use strict";

// 	//How will the payment plan be Monthly, Upfront, Quarterly or Bi-annually
// 	var pplan = $('.payment_plan').val();

// 	//How long will the rent be for
// 	var duration = $('.duration').val();

// 	//Get Monthly rate from hidden field
// 	var price = parseInt($('.prop-monthly-price').val());
	
// 	var Sprice = parseInt($('.prop-monthly-price').val());
	
// 	var mnth = 'Monthly';
	
// 	var subc = parseInt(price) * parseInt(1);

// 	var service_charge = parseInt($('.serv-charge').val());
	
// 	//Add service charge to rent price
	
// 	var securityDeposit = parseInt($('.sec-deposit').val());
	
// 	var securityDeposits = '';

// 	if(pplan == 'Monthly'){

// 		price = parseInt(price) * parseInt(1);
// 		mnth = 'Monthly';
// 		subc = parseInt(Sprice) * parseInt(1);
		
// 		price = price + securityDeposit;
		
// 		$('.sec_dep').html(numberWithCommas(securityDeposit));

// 	}else if(pplan == 'Bi-annually'){

//         subc = parseInt(Sprice) * parseInt(6);
// 		price = ( parseInt(price) * parseInt(duration) ) / parseInt(2);
// 		mnth = 'Bi-annually';
		
// 		price = price + securityDeposit;
		
// 		$('.sec_dep').html(numberWithCommas(securityDeposit));

// 	}else if(pplan == 'Quarterly'){

//         subc = parseInt(Sprice) * parseInt(3);
// 		price = ( parseInt(price) * parseInt(duration) ) / parseInt(4);
// 		mnth = 'Quartely';
		
// 		price = price + securityDeposit;
		
// 		$('.sec_dep').html(numberWithCommas(securityDeposit));

// 	}else if(pplan == 'Upfront'){

//         subc = parseInt(Sprice) * parseInt(12);
// 		price = parseInt(price) * parseInt(duration);
// 		mnth = 'Upfront';
		
// 		if(subc > 2000000)
// 		{
// 		    securityDeposits = 0.30 * subc;
// 		}
		
// 		else
// 		{
// 		    securityDeposits = 0.25 * subc;
// 		}
		
		
// 		price = price + securityDeposits;
		
// 		$('.sec_dep').html(numberWithCommas(securityDeposits));

// 	}else{
	    
// 	    price = parseInt(price);
// 	    mnth = 'Monthly';
// 		subc = parseInt(Sprice) * parseInt(1);
	
// 	    price = price + securityDeposit;    
// 	}

// 	//console.log(price);
	
// 	price = price + service_charge;

// 	$('.amount-due').val(price);

// 	$('.pricing').html(numberWithCommas(price));
	
// 	$('.mnth').html(mnth);

// 	$('.subc').html(numberWithCommas(subc));

// });

// $('.duration').on('change', function(){

// 	"use strict";

// 	//How will the payment plan be Monthly, Upfront, Quarterly or Bi-annually
// 	var pplan = $('.payment_plan').val();

// 	//How long will the rent be for
// 	var duration = $(this).val();

// 	//Get Monthly rate from hidden field
// 	var price = parseInt($('.prop-monthly-price').val());
    
// 	var securityDeposit = parseInt($('.sec-deposit').val());

// 	var servCharge = parseInt($('.serv-charge').val());
	
// 	//Add service charge to rent price
// 	price = price + servCharge;
	
// 	console.log(price);

// 	if(pplan == 'Monthly'){

// 		price = parseInt(price) * parseInt(1);

// 	}else if(pplan == 'Bi-annually'){

// 		price = parseInt(price) * parseInt(duration);

// 	}else if(pplan == 'Quarterly'){

// 		price = parseInt(price) * parseInt(duration);

// 	}else if(pplan == 'Upfront'){

// 		price = parseInt(price) * parseInt(duration);

// 	}

// 	price = price + securityDeposit;

// 	$('.amount-due').val(price);

// 	$('.pricing').html(numberWithCommas(price));

// });



