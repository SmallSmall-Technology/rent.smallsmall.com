//Javascript Document

var baseUrl = "https://dev-rent.smallsmall.com/";

var cartCount = document.getElementById('cart-counter');

if(localStorage.getItem('rentalBasket') === null){

	//Create a unique localstorage ID for basket

	var basketID = '_' + Math.random().toString(36).substr(2, 9);	

	var orderType = "furnisure";

	var paymentOption = "";

	//var prodExists = false;

	var newrentalBasket = {

							"id": basketID,

							"orderType" : orderType,

							"paymentOption" : paymentOption,

							"furnisure" : [],

							"property" : []

					   };

	window.localStorage.setItem('rentalBasket', JSON.stringify(newrentalBasket));

}else{

	//Get all cart products

	var order = JSON.parse(localStorage.getItem('rentalBasket'));
	

	order.orderType = "furnisure";


	//Update the cart counter icon on the page header

	cartCount.innerHTML = order.furnisure.length;
	
	window.localStorage.setItem('rentalBasket', JSON.stringify(order));	

} 


var add_to_cart = document.getElementById('add-to-cart');



add_to_cart.addEventListener("click", function (){

	"use strict";

	var theDuration = "";

	var floatingElement = document.getElementById("float-product-container");

	var userID = document.getElementById('userID').value;

	

	if(!userID){

	    alert('You are not logged in');

		window.location.href = baseUrl+"login";		

		return false;

	}

	

	var reporting = document.getElementById('reportage');

	var paymentPlan = document.getElementById('payment-plan-d').value;

	var productTitle = document.getElementById('productName').value;

	var prodPrice = document.getElementById('amount-due').value;	

	var securityDeposit = document.getElementById('sec-dep-cost').value;

	var productID = document.getElementById('productID').value;

	var img = document.getElementById('imageLink').value;	

	var productUrl = window.location.href;

	
    if(order.furnisure.length > 0){
        
        paymentPlan = order.furnisure[0].paymentPlan;
        
    }


	var productDetails = {"productID": productID, "productTitle" : productTitle, "paymentPlan" : paymentPlan, "prodPrice" : prodPrice, "imageLink" : img, "productUrl" : productUrl, "securityDeposit" : securityDeposit, "duration" : paymentPlan};	

	

	order.furnisure.push(productDetails);

	window.localStorage.setItem('rentalBasket', JSON.stringify(order));

	//Update the cart counter icon on the page header

	cartCount.innerHTML = order.furnisure.length; 

	//error.style.display = "none";

	//success.innerHTML = '<i class="icon-basket"></i> <span>Product successfully added to cart</span><span class="chkoutBut"><a href="'+baseUrl+'furnisure/checkout">Proceed to Checkout</a></span>';

	reporting.style.backgroundColor = "rgba(0, 128, 0, 0.6)";

	reporting.innerHTML = '<span><i class="fa fa-check"></i></span> Successfully added to cart <a style="cursor:pointer;text-decoration:underline" id="pay-property">Proceed to Checkout</a>';

	reporting.style.display = "block";

	reporting.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });

	/*********************** Add item to floating cart   *************************/
	
	var i = order.furnisure.length;
	
	var hItem = document.createElement("LI"); //Create a <div> element

	hItem.classList.add("float-product-item"); //Add a class to the DIV

	hItem.setAttribute("id", "cart-item-"+i); 

	var hImg = document.createElement("DIV"); //Create a <div> element

	hImg.classList.add("floating-image"); //Add a class to the DIV



	var productImg = document.createElement("IMG"); //Create a Image element



	productImg.setAttribute("src", img);



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

	var productPrice = document.createTextNode(" Duration: "+theDuration);

	//var productPrice = document.createTextNode("₦"+numberWithCommas(document.getElementById('amount-due').value)+" Duration: 12 Mths");
	var titleLink = document.createElement("a"); //Create a <div> element

	titleLink.setAttribute("href", productUrl); 

	var pTitle = document.createTextNode(productTitle);

	//hDet.appendChild(hProdTitle);

	titleLink.appendChild(pTitle);

	hProdTitle.appendChild(titleLink);

	hItem.appendChild(hProdTitle);

	fpDet.appendChild(hImg);

	hItem.appendChild(floatAction);

	fpDet.appendChild(hDet);

	priceCont.appendChild(productPrice);

	hDet.appendChild(priceCont);

	hProdPrice.appendChild(duration);

	hDet.appendChild(hProdPrice);

	delAction.appendChild(delTxt);

	floatAction.appendChild(delAction);
 
	floatingElement.appendChild(hItem); 

	hItem.appendChild(fpDet);

	hItem.appendChild(floatAction);
 
	//totalPrice = totalPrice + order.furnisure[i].prodPrice;

});