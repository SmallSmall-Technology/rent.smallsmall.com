// JavaScript Document
jQuery(document).ready(function($){

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
    
    $('#gross-pay').keyup(function(){
        
        var g_val = $('#gross-pay').val();
        
        if(isNaN(g_val)){
            
            alert('Numbers only allowed!');
            
            $('#gross-pay').val('');
            
            return false;
        }
    });
    
    $('#profileVerification').submit(function(e){
    
    	"use strict";
    
    	//Stop page from refreshing
    
    	e.preventDefault();
    	
    	$('.verifyBut').html("Working...");
    
    	//Get all cart products
    
    	details = JSON.parse(localStorage.getItem('verificationStorage'));
    
    	var firstname = $.trim($('#first-name').val());
    
    	var lastname = $.trim($('#last-name').val());
    
    	var email = $.trim($('#email').val());
    
    	var phone = $.trim($('#phone').val());
    
    	var gross_pay = $.trim($('#gross-pay').val());
    
    	var dob = $('#dob').val();
    
    	var gender = $('.gender').val();
    
    	var marital_status = $('.marital-status').val();
    
    	var city = $.trim($('#city').val());
    
    	var linkedinUrl = $.trim($('#linkedin-url').val());
    
    	var state = $('.states').val();
    
    	var country = $('.country').val();	
    
    	var passport_number = $.trim($('#passport-number').val());
    	
    	var product_package = '';
    
    
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
    	
    	if(isNaN(gross_pay)){	
    
    		alert("Monthly pay cannot have special characters");
    		
    		$('#gross-pay').val('');
    
    		$('#gross-pay').css("border","1px solid rgba(251,1,1,0.5)");
    
    		//$('body').scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'nearest' });
    
    		$('.verifyBut').html("Next");
    
    		return false;
    
    	}
    
    	if(details.profile.length > 0){
    
    	   details.profile.length = 0;
    
    	}
    	//Insert details into local storage
    
    	var profileDetails = {"firstname": firstname, "lastname" : lastname, "email" : email, "phone" : phone, "gross_pay" : gross_pay, "dob" : dob, "gender" : gender, "marital_status" : marital_status, "state" : state, "city" : city, "country" : country, "passport_number" : passport_number, "linkedinUrl" : linkedinUrl};	
    
    	//details.orderItemCount = details.orderItemCount + 1;
    
    	details.profile.push(profileDetails);
    
    	window.localStorage.setItem('verificationStorage', JSON.stringify(details));
    
    	window.location.href = baseUrl+"rss/verification/renting-history";
    
    });
    
    $('#rentingHistoryForm').submit(function(e){
    
    	"use strict";
    
    	//Stop page from refreshing
    
    	e.preventDefault();
    
    	$('.verifyBut').html("wait...");
    
    	var present_address = $.trim($('.present_address').val());
    
    	var city = $('#city').val();
    
    	var state = $('.states').val();
    
    	var country = $('.country').val();
    
    	var previous_rent_duration = $('.previous_rent_duration').val();
    
    	var renting_status = $('.renting_status').val();
    
    	var previous_eviction = $('.previous_eviction').val();
    
    	var pet = $('.pet').val();
    
    	var critical_illness = $('.critical_illness').val();
    
    	var landlord_full_name = $.trim($('.landlord_full_name').val());
    
    	var landlord_email = $.trim($('.landlord_email').val());
    
    	var landlord_phone = $.trim($('.landlord_phone').val());
    
    	var landlord_address = $.trim($('.landlord_address').val());	
    
    	var reason_for_leaving = $.trim($('.reason_for_leaving').val());
    	
    
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
    
    		window.location.href = baseUrl+"rss/verification/profile-verification";
    
    	}
    
    	if(details.renting.length > 0){
    
    	   details.renting.length = 0;
    
    	}
    
    	//Insert details into local storage
    
    	var rentingDetails = {"present_address": present_address, "state" : state, "city" : city, "country" : country, "previous_rent_duration" : previous_rent_duration, "renting_status" : renting_status, "previous_eviction" : previous_eviction, "pet" : pet, "critical_illness" : critical_illness, "landlord_full_name" : landlord_full_name, "landlord_email" : landlord_email, "landlord_phone" : landlord_phone, "landlord_address" : landlord_address, "reason_for_leaving" : reason_for_leaving};	
    
    	//details.orderItemCount = details.orderItemCount + 1;
    
    	details.renting.push(rentingDetails);
    
    	window.localStorage.setItem('verificationStorage', JSON.stringify(details));
    
    	window.location.href = baseUrl+"rss/verification/employment-verification";
    
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
    		window.location.href = baseUrl+"rss/verification/profile-verification";
    
    	}
    
    	if(details.employment.length > 0){
    
    	   details.employment.length = 0;
    
    	}
    
    	//Insert details into local storage
    
    	var employmentDetails = {"employment_status": employment_status, "job_title" : job_title, "company_name" : company_name, "company_address" : company_address, "manager_hr_name" : manager_hr_name, "manager_hr_email" : manager_hr_email, "manager_hr_phone" : manager_hr_phone, "guarantor_name" : guarantor_name, "guarantor_email" : guarantor_email, "guarantor_phone" : guarantor_phone, "guarantor_job_title" : guarantor_job_title, "guarantor_address" : guarantor_address};	
    
    	//details.orderItemCount = details.orderItemCount + 1;
    
    	details.employment.push(employmentDetails);
    
    	window.localStorage.setItem('verificationStorage', JSON.stringify(details));
    
    	window.location.href = baseUrl+"rss/verification/verification-uploads";
    
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
        
            var id_state = $('#id-state').val();
    
    		var statement_state = $('#statement-state').val();
    
    		if(id_path == "" || statement_path == "" || !(id_state) || !(statement_state)){
    
    		   alert("Upload required files.");
    
    			$('#verifyBut-right').html("Submit");
    
    			return false;			
    
    		 }
    
    		var details = JSON.parse(localStorage.getItem('verificationStorage'));
    
    		if(details.profile.length < 1){
    
    		   //header.
    
    			window.location.href = baseUrl+"rss/verification/profile-verification";
    
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
    
    			complete: function(data) {
    
        			//Redirect to pay
        
        			window.localStorage.removeItem('verificationStorage');
        
        			window.localStorage.removeItem('rentalBasket');
        
        			window.location.href = baseUrl+"rss/verification-complete";
        
        			return false; 
    				
    
    			}
    
    		});
    
    	}else{
    
    		alert("You need to agree to terms of use and tenancy terms");
    
    		$('#verifyBut-right').html("Submit");
    
    	}
    
    	//window.location.href = baseUrl+"pay/"+details;
    
    	
    
    	//Continue to payment page
    
    });
});