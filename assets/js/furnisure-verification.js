// JavaScript Document

//Insert into local storage

var baseUrl = "https://dev-rent.smallsmall.com/";

var details = "";

if(localStorage.getItem('verificationStorage') === null){



	//Create a unique localstorage ID for basket

	var verificationID = 'ver-' + Math.random().toString(36).substr(2, 9);

	var stat = 'incomplete';

	var newProfile = {

						"id": verificationID,

						"status": stat,

						"profile" : [],

						"renting" : [],

						"employment" : [],

						"uploads" : []

					   };

	window.localStorage.setItem('verificationStorage', JSON.stringify(newProfile));

}else{



	//Get all cart products

	details = JSON.parse(localStorage.getItem('verificationStorage'));





} 

$('#profileVerification').submit(function(e){

	"use strict";

	//Stop page from refreshing

	e.preventDefault();

	

	$('#verifyBut').html("wait...");

	//Get all cart products

	details = JSON.parse(localStorage.getItem('verificationStorage'));

	

	var firstname = $.trim($('#first-name').val());

	var lastname = $.trim($('#last-name').val());

	var email = $.trim($('#email').val());

	var phone = $.trim($('#phone').val());

	var gross_pay = $.trim($('#gross-pay').val());

	var dob_day = $('.dob-day').val();

	var dob_mth = $('.dob-mth').val();

	var dob_yr = $('.dob-yr').val();

	var gender = $('.gender').val();

	var marital_status = $('.marital-status').val();

	var city = $.trim($('#city').val());

	var state = $('.states').val();

	var country = $('.country').val();	

	var passport_number = $.trim($('#passport-number').val());	

	var dob = dob_yr+'-'+dob_mth+'-'+dob_day;

	

	//verify the fields

	var filteredList = $('.verify-txt-f').filter(function(){

		return $(this).val() === "";

	});

	

	//Do something about the empty fields

	if(filteredList.length > 0){	

		alert("Fields in red are mandatory");	

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		//$('body').scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });

		$('.verifyBut').html("Next");

		return false;

	}

	if(details.profile.length > 0){

	   details.profile.length = 0;

	}

	//Insert details into local storage

	var profileDetails = {"firstname": firstname, "lastname" : lastname, "email" : email, "phone" : phone, "gross_pay" : gross_pay, "dob" : dob, "gender" : gender, "marital_status" : marital_status, "state" : state, "city" : city, "country" : country, "passport_number" : passport_number};	

	//details.orderItemCount = details.orderItemCount + 1;

	details.profile.push(profileDetails);
	
	var rentingDetails = {"present_address": "", "state" : "", "city" : "", "country" : "", "previous_rent_duration" : "", "renting_status" : "", "previous_eviction" : "", "pet" : "", "critical_illness" : "", "landlord_full_name" : "", "landlord_email" : "", "landlord_phone" : "", "landlord_address" : "", "reason_for_leaving" : ""};	

	//details.orderItemCount = details.orderItemCount + 1;

	details.renting.push(rentingDetails);

	

	window.localStorage.setItem('verificationStorage', JSON.stringify(details));

	

	window.location.href = baseUrl+"furnisure/verification/employment-verification";

	

	

});

$('#employmentForm').submit(function(e){

	"use strict";

	//Stop page from refreshing

	e.preventDefault();

	

	$('.verifyBut').html("wait...");

	

	

	var employment_status = $('.employment_status').val();

	var job_title = $.trim($('.job_title').val());

	var company_name = $.trim($('.company_name').val());

	var company_address = $.trim($('.company_address').val());

	var manager_hr_name = $.trim($('.manager_hr_name').val());

	var manager_hr_email = $.trim($('.manager_hr_email').val());

	var manager_hr_phone = $.trim($('.manager_hr_phone').val());

	var guarantor_name = $.trim($('.guarantor_name').val());

	var guarantor_email = $.trim($('.guarantor_email').val());

	var guarantor_phone = $.trim($('.guarantor_phone').val());

	var guarantor_job_title = $.trim($('.guarantor_job_title').val());

	var guarantor_address = $.trim($('.guarantor_address').val());		

	

	

	//verify the fields

	var filteredList = $('.verify-txt-f').filter(function(){

		return $(this).val() === "";

	});

	

	//Do something about the empty fields

	if(filteredList.length > 0){

		alert("Fields in red are mandatory");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		//$('body').scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });

		$('.verifyBut').html("Next");

		return false;

	}

	if(details.profile.length < 1){

	   //header.

		window.location.href = baseUrl+"furnisure/verification/profile-verification";

	}

	if(details.employment.length > 0){

	   details.employment.length = 0;

	}

	//Insert details into local storage

	var employmentDetails = {"employment_status": employment_status, "job_title" : job_title, "company_name" : company_name, "company_address" : company_address, "manager_hr_name" : manager_hr_name, "manager_hr_email" : manager_hr_email, "manager_hr_phone" : manager_hr_phone, "guarantor_name" : guarantor_name, "guarantor_email" : guarantor_email, "guarantor_phone" : guarantor_phone, "guarantor_job_title" : guarantor_job_title, "guarantor_address" : guarantor_address};	

	//details.orderItemCount = details.orderItemCount + 1;

	details.employment.push(employmentDetails);

	

	window.localStorage.setItem('verificationStorage', JSON.stringify(details));

	

	window.location.href = baseUrl+"furnisure/verification/verification-uploads";


});

$('#uploadForm').submit(function(e){

	"use strict";

	//Stop page from refreshing

	e.preventDefault();

	$('#verifyBut-right').html("Wait...");

	

	if($("input[name='terms-use-link']:checked") && $("input[name='tenancy-term']:checked")){

		

		var id_path = $('#idcard').val();

		var statement_path = $('#statement').val();

		var user_id = $('#userID').val();



		if(id_path == "" || statement_path == ""){

		   alert("Upload required files.");

			$('#verifyBut-right').html("Submit");

			return false;			

		 }

		var details = JSON.parse(localStorage.getItem('verificationStorage'));

		if(details.profile.length < 1){

		   //header.

			window.location.href = baseUrl+"furnisure/verification/profile-verification";

		}

		//Insert details into local storage

		if(details.uploads.length > 0){

			details.uploads.length = 0;

		}

		var uploadDetails = {"id_path": id_path, "statement_path" : statement_path, "user_id" : user_id};	

		//details.orderItemCount = details.orderItemCount + 1;

		details.status = "complete";



		details.uploads.push(uploadDetails);



		window.localStorage.setItem('verificationStorage', JSON.stringify(details));



		//Get the order details and the verification details

		var verification = JSON.parse(localStorage.getItem('verificationStorage'));

		var order = JSON.parse(localStorage.getItem('rentalBasket'));


		var data = {"details" : verification, "order" : order};


		$.ajaxSetup ({ cache: false });

		$.ajax({			

			url: baseUrl+"rss/insertDetails/",

			type: "POST",

			data: data,

			dataType : 'json',

			beforeSend: function() {				

			},

			success: function(data) {

				if(data.result == "success"){

				   	//Redirect to pay

					window.localStorage.removeItem('verificationStorage');

					window.localStorage.removeItem('rentalBasket');
					
					//alert(baseUrl+"pay/"+data.email+"/"+data.msg+"/"+data.method);

					window.location.href = baseUrl+"furnisure/verification-complete";
					
					return false;
					

				}else{

					alert("Error!!!"); 

					$('#verifyBut-right').html("Submit");

				}				

			}

		});

	}else{

		alert("You need to agree to terms of use and tenancy terms");

		$('#verifyBut-right').html("Submit");

	}

	//window.location.href = baseUrl+"pay/"+details;

	

	//Continue to payment page

});