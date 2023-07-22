// JavaScript Document

var baseUrl = "https://dev-rent.smallsmall.com/";

$('#addPropForm').submit(function(e){

	"use strict";

	e.preventDefault();

	$('.verifyBut').html("Wait...");

	var property_title = $.trim($('#property_name').val());

	var description = $.trim($('#property_description').val());

	var address = $.trim($('#address').val());

	var email = $.trim($('#email').val());

	var propType = $('.propType').val();

	var country = $('.country').val();

	var states = $('.states').val();

	var city = $('#city').val();

	var rent_type = $('.rent_type').val();

	var furnishing = $('.furnishing').val();

	var bed = $('.bed').val();

	var base_rent = $.trim($('#base_rent').val());

	var service_charge = $.trim($('#service_charge').val());

	

	var filteredList = $('.verify-txt-f').filter(function(){

		return $(this).val() == "";

	});



	if(filteredList.length > 0){

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		document.body.scrollTop = 0; // For Safari

		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		
		$('.verifyBut').html("Next");

		return false;

	}

	

	//Add to localStorage

	if(localStorage.getItem('propertyStorage') === null){

		//Create a unique localstorage ID for basket		

		var newProfile = {

			"propTitle": property_title,

			"propDesc": description,

			"address" : address,

			"email" : email,

			"propType" : propType,

			"country" : country,

			"states" : states,

			"city"   : city,

			"rent_type" : rent_type,

			"furnishing": furnishing,

			"bed"     : bed,

			"base_rent" : base_rent,

			"service_charge" : service_charge

		};
		

		window.localStorage.setItem('propertyStorage', JSON.stringify(newProfile));

		

	}else{

		//Get all cart products

		var property = JSON.parse(localStorage.getItem('propertyStorage'));


		property.propTitle = property_title;

		property.propDesc = description;

		property.address = address;

		property.email = email;

		property.propType = propType;

		property.country = country;

		property.states = states;

		property.city = city;

		property.rent_type= rent_type;

		property.furnishing = furnishing;

		property.bed = bed;

		property.base_rent = base_rent;

		property.service_charge = service_charge;
		
		window.localStorage.setItem('propertyStorage', JSON.stringify(property));

	} 

	window.location.href = baseUrl+"add-amenities";

});



$('#propAmenitiesForm').submit(function(e){

	"use strict";
	
	$('#verifyBut').html("Uploading...");
	
	e.preventDefault();

	var bath = $('.bath').val();

	var toilet = $('.toilet').val();

	var amenities = [];

	var rental_condition = $('#rental-condition').val();

	var details = $('#details').val();

		

		

	$.each($("input[name='amenities']:checked"), function(){

		amenities.push($(this).val());

	});

	//Add to table

	var property = JSON.parse(localStorage.getItem('propertyStorage'));


	var data = {

			"propTitle" : property.propTitle,

			"propDesc"  : property.propDesc,

			"address"     : property.address,

			"email"     : property.email,

			"propType"  : property.propType,

			"country"   : property.country,

			"states"    : property.states,

			"city"      : property.city,

			"rent_type" : property.rent_type,

			"furnishing": property.furnishing,

			"services"  : property.services,

			"bed"       : property.bed,

			"base_rent" : property.base_rent,

			"service_charge" : property.service_charge,

			"bath"      : bath,

			"toilet"    : toilet,

			"amenities" : amenities,

			"rental_condition" : rental_condition,

			"details"   : details

		};


		$.ajaxFileUpload({
			
			url: baseUrl+"rss/insertPropertyDetails/",
			
			secureuri : false,
			
			fileElementId : 'userfile',
			
			dataType : 'json',
			
			data : data,
			
			success	: function (data){	

				if(data.result == "success"){

				   	//Redirect to pay

					window.localStorage.removeItem('propertyStorage');

					$('.sendAgainOverlay').css("display", "flex");

				}else{

					alert(data.msg); 

					$('#verifyBut-right').html("Submit");

				}

				

			}

		});

});



$("#base_rent").keyup(function(){

	"use strict";

	var content = $.trim($(this).val());

	if(isNaN(content)){

		alert("Enter numbers only");

		$(this).val("");

	}

});

$("#service_charge").keyup(function(){

	"use strict";

	var content = $.trim($(this).val());

	if(isNaN(content)){

		alert("Enter numbers only");

		$(this).val("");

	}

});