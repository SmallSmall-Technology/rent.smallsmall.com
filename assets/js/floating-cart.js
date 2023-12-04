// JavaScript Document
var baseUrl = "https://dev-rent.smallsmall.com/";
var cartCount = document.getElementById('cart-counter');

if(localStorage.getItem('rentalBasket') !== null){

	var theDuration = "";

	var totalPrice = 0;

	var floatingElement = document.getElementById("float-product-container");

	//var floatingSubT = document.getElementById("hoverSubTotal");

	//var floatingShipping = document.getElementById("hoverShipping");	

	//Get all cart products

	var order = JSON.parse(localStorage.getItem('rentalBasket'));

	cartCount.innerHTML = order.furnisure.length;

	for(let i = 0; i < order.furnisure.length; i++){

		var hItem = document.createElement("LI"); //Create a <div> element

		hItem.classList.add("float-product-item"); //Add a class to the DIV

		hItem.setAttribute("id", "cart-item-"+i); 

		var hImg = document.createElement("DIV"); //Create a <div> element

		hImg.classList.add("floating-image"); //Add a class to the DIV

		

		var productImg = document.createElement("IMG"); //Create a Image element

		

		productImg.setAttribute("src", order.furnisure[i].imageLink);

		

		hImg.appendChild(productImg);

		

		var hDet = document.createElement("DIV"); //Create a <div> element

		hDet.classList.add("floating-details"); //Add a class to the DIV

		

		

		var fpDet = document.createElement("DIV"); //Create a <div> element

		fpDet.classList.add("floating-prod-details"); //Add a class to the DIV

		

		var hProdTitle = document.createElement("DIV"); //Create a <div> element

		hProdTitle.classList.add("floating-title"); //Add a class to the DIV

		

		var delAction = document.createElement("SPAN"); //Create a <span> element

		delAction.classList.add("delete-furniture"); //Add a class to the SPAN
		
		delAction.classList.add("delete"); //Add a class to the SPAN
		
		delAction.setAttribute("id", i); 

		var delTxt = document.createTextNode("Delete");

		

		

		var hProdPrice = document.createElement("DIV"); //Create a <div> element

		hProdPrice.classList.add("floating-price"); //Add a class to the DIV

		

		var priceCont = document.createElement("DIV"); //Create a <div> element

		priceCont.classList.add("floating-price"); //Add a class to the DIV

		

		var floatAction = document.createElement("DIV"); //Create a <div> element

		floatAction.classList.add("float-action"); //Add a class to the DIV

		

		if(order.furnisure[i].duration == 12){

		   theDuration = "12 Months";

		}else if(order.furnisure[i].duration == 6){

			theDuration = "6 Months";	 

		}else if(order.furnisure[i].duration == 4){

			theDuration = "3 Months";	 

		}

		

		var duration = document.createTextNode("Payment plan: "+theDuration);

		

		//var prodPrice = document.createTextNode("₦"+numberWithCommas(order.furnisure[i].prodPrice)+" Duration: 12 Mths");

		var prodPrice = document.createTextNode("₦"+numberWithCommas(order.furnisure[i].prodPrice)+" Duration: "+theDuration);

		var titleLink = document.createElement("a"); //Create a <div> element

		

		titleLink.setAttribute("href", order.furnisure[i].productUrl); 

		

		var pTitle = document.createTextNode(order.furnisure[i].productTitle);

		

		//hDet.appendChild(hProdTitle);

		

		titleLink.appendChild(pTitle);

		

		hProdTitle.appendChild(titleLink);

		

		hItem.appendChild(hProdTitle);

		

		fpDet.appendChild(hImg);

		

		hItem.appendChild(floatAction);

		

		fpDet.appendChild(hDet);	

		

		priceCont.appendChild(prodPrice);

		

		hDet.appendChild(priceCont);

		

		hProdPrice.appendChild(duration);

		

		hDet.appendChild(hProdPrice);

		

		delAction.appendChild(delTxt);

		

		floatAction.appendChild(delAction);

		

		floatingElement.appendChild(hItem);

		

		hItem.appendChild(fpDet);

		

		hItem.appendChild(floatAction);

		

		totalPrice = totalPrice + order.furnisure[i].prodPrice;

		

	}

	

	//floatingSubT.innerHTML = "₦"+numberWithCommas(totalPrice);



	

}else{

	var hItem = document.createElement("LI"); //Create a <div> element

	hItem.classList.add("float-product-item"); //Add a class to the DIV

	var nullTxt = document.createTextNode("No item in Cart.");

	hItem.appendChild(nullTxt);

	floatingElement.appendChild(hItem);

}

function numberWithCommas(x) {

	"use strict";

    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ", ");

}
$(document).on('click', '.delete-furniture', function(){
	
	"use strict";	
	
	var id = $(this).attr("id");
	
	$('#cart-item-'+id).css("background", "rgba(255, 0, 0, 0.13)");
	
	order.furnisure.splice(id, 1);
    				
	order = JSON.stringify(order);

	localStorage.setItem("rentalBasket", order);	
	
	order = JSON.parse(localStorage.getItem('rentalBasket'));
	
	setTimeout(function() { $('#cart-item-'+id).remove(); }, 500);
		
	cartCount.innerHTML = order.furnisure.length;
	
	return false;
	
});
/*$(document).on('click', '.pay-property', function(){
	
});*/
//var pay_property = document.getElementById('pay-property');



$(document).on('click', '.pay-property', function(){

	"use strict";

	$('.pay-property').html("Loading...");
	//pay_property.innerHTML = "Loading...";	

	$(".payment-modal-container").css("display", "flex");

	

	$('.pay-property').html("Checkout");

});	



$('.pay-option').click(function(){	

	"use strict";

	//

	$('.pay-option').css("background", "#FFF");

	$('.pay-option').css("color", "#000");

	var paymentOption = $(this).attr('id');

	$("#"+paymentOption).css("background", "#00CDA6");

	$("#"+paymentOption).css("color", "#FFF");

	$('#payment_option').val(paymentOption);
	

});


$('#continue-but').click(function(){

	"use strict";

	$('#continue-but').html("wait...");	
	
	var order = JSON.parse(localStorage.getItem('rentalBasket'));

	var payment_option = document.getElementById('payment_option').value;
	
	order.paymentOption = payment_option;
	
	window.localStorage.setItem('rentalBasket', JSON.stringify(order));
	
	var verified = $('#verified').val();
	
	var userID = document.getElementById('userID').value;
	
	
	if(!userID){

		alert('You are not logged in');

		window.location.href = baseUrl+"login";		

		return false;

	}
	
	//Redirect to verification page
	if(verified == 'no'){
			
		//Redirect to verification page

		window.location.href = baseUrl+"furnisure/verification/profile-verification/";
			
	}else{
		
		//Go straight to payment page
			
			order = JSON.parse(localStorage.getItem('rentalBasket'));


			var data = {"order" : order};


			$.ajaxSetup ({ cache: false });

			$.ajax({			

				url: baseUrl+"rss/insertOrderDetails/",

				type: "POST",

				data: data,

				success: function(data) {
                    
                    alert(data);
					if(data == 1){

						//Redirect to pay
						$('#continue-but').html("Continue");

						window.localStorage.removeItem('rentalBasket');

						//window.location.href = baseUrl+"pay/"+data.email+"/"+data.msg+"/"+data.method+"/"+data.ref;
						window.location.href = baseUrl+"furnisure/verify-details";
						
						return false;

					}else{

						alert("Error!!!"); 

						$('#continue-but').html("done");

					}				

				}

			});
		
		
	}

	//window.location.href = baseUrl+"furnisure/verification/profile-verification/";

});

$('.modal-close-button').click(function(){

	"use strict";

	$(".payment-modal-container").css("display", "none");

});