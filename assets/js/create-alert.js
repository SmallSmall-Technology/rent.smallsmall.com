// JavaScript Document

//alert("create alert");

var baseUrl = "https://rent.smallsmall.com/";

function isEmail(email) {

	"use strict";

   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   return regex.test(email);

}

$('#propAlertForm').submit(function(e){

	"use strict";
	e.preventDefault();
	$("#verifyBut").html("wait...");
	//Get values from alert field
	var firstname = $('#first-name').val();
	var lastname = $('#last-name').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	var rent_plan = $('.rent-plan').val();
	var renting_as = $('.renting-as').val();
	var min_price = $('.from').val();
	var max_price = $('.to').val();
	var property_type = $('.prop_type').val();
	var country = $('.country').val();
	var states = $('.states').val();
	var city = $('.city').val();
	
	//Check for empty fields
	var filteredList = $('.verify-txt-f').filter(function(){
		return $(this).val() === "";
	});
	
	//Do something about the empty fields
	if(filteredList.length > 0){
		filteredList.css("border", "1px solid red");
		/*$('.mand-f').css("border","1px solid #CCC");
		filteredList.css("border","1px solid rgba(251,1,1,0.5)");*/
		$('.form-report').html("Fields in red are mandatory fields");
		$('.form-report').css("background", "red");
		$('.form-report').show();
		window.scrollTo(0,100);
		return false;
	}
	var data = {
		"firstname" : firstname,
		"lastname"  : lastname,
		"email"     : email,
		"phone"     : phone,
		"rent_plan" : rent_plan,
		"renting_as": renting_as,
		"min_price" : min_price,
		"max_price" : max_price,
		"property_type" : property_type,
		"country"   : country,
		"states"    : states,
		"city"      : city
	};
	$.ajaxSetup ({ cache: false });
	$.ajax({
		url: baseUrl+"pages/setupAlert/",
		type: "POST",
		async: true,
		data: data,
		beforeSend: function() {

		},
		success: function(data) {
			if(data == 1){
				$('.loader').hide();
				$('.form-report').html("Successful! Check your email for confirmation");
				$('.form-report').css("background", "green");
				$('.form-report').show();
				window.scrollTo(0,100);
				//window.location.href = baseUrl+"dashboard/";
			}else{
				$('.loader').hide();
				$('.form-report').html("Error: "+data);
				$('.form-report').css("background", "red");
				$('.form-report').show();
				window.scrollTo(0,100);
			}
		}
	});
});