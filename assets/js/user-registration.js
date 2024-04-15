// JavaScript Document

var baseUrl = "https://rent.smallsmall.com/";


// Initialize Mixpanel with your project token to track Users
mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

var current = 1,current_step,next_step,steps;

steps = $("fieldset").length;

// // Change progress bar action
// function setProgressBar(curStep){
//     var percent = parseFloat(100 / steps) * curStep;
//     percent = percent.toFixed();
//     var fig = parseFloat(3 / steps) * curStep;
//     fig = fig.toFixed();
//     $(".progress-bar").css("width",percent+"%");
//     $(".progress-p").html(fig+" of "+steps);		
// }


function isEmail(email) {

	"use strict";

   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   return regex.test(email);

}

$('#password').keyup(function(){
	"use strict";	
	var pass = $(this).val();
	
	if(checkPassword(pass)){
		$(this).css("border", "1px solid green");
		$('.pass-dir').hide(600);
	}else{
		$(this).css("border", "1px solid red");
		$('.pass-dir').show(600);
	}
});

$('#password_2').keyup(function(){
	"use strict";
	var pass2 = $(this).val();
	var pass1 = $('#password').val();
	
	if(pass2 == pass1){
		$(this).css("border", "1px solid green");
	}else{
		$(this).css("border", "1px solid red");
		
	}
});

function hasWhiteSpace(s) {
    
    return /\s/g.test(s);
    
}
  
function checkPassword(inputtxt){ 
	"use strict";	
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	
	if(inputtxt.match(passw)){ 
		
		return true;
		
	}else{ 
		
		return false;
		
	}
}

// function setProgressBar(curStep){
          
//     var percent = parseFloat(100 / steps) * curStep;
    
//     percent = percent.toFixed();
    
//     var fig = parseFloat(3 / steps) * curStep;
    
//     fig = fig.toFixed();
    
//     $(".progress-bar").css("width",percent+"%");
      
//     $(".progress-p").html(fig+" of "+steps);

    
// }


$('#regForm').submit(function(e){

	"use strict";

	e.preventDefault();
	
	var count_click = $('#clicked').val();
	
	if(count_click < 1){
    	
    	if(!$('.form-report').is(':hidden')){
    	
    	    $('.form-report').hide();
    	    
    	}
    	
    	$('.finish-btn').html('Wait...');
    	
    	$('.reg-fields').css('border', '1px solid transparent');
    
    	current_step = $(this).parent().parent();

        next_step = $(this).parent().parent().next();

    	var user_type = 'tenant'; //$("input[type='radio'][name='user_type']:checked").val();
    
    	var fname = $.trim($('#fname').val());
    
    	var lname = $.trim($('#lname').val());
    
    	var email = $.trim($('#email').val());
    
    	var phone = $('#phone').val();
    
    	var password1 = $.trim($('#password').val());
    
    	var password2 = $.trim($('#password_2').val());
    
    	var income = $('.income').val();
    
    	var age = $('#age').val();
    
    	var gender = $('.gender').val();
    
    	var referral = $('.referral').val();
    
    	var referred_by = $('#referral_code').val();
    
    	var interest = $('.interest').val();
    	
    	var filteredList = $('.reg-fields').filter(function(){
    
    		return $(this).val() == "";
    
    	});
    
    	if(filteredList.length > 0){
    	    
    	    filteredList.css('border', '1px solid red');
    	    
    	    $('.form-report').html("Fields in red are mandatory fields");
    
    		$('.form-report').css("background", "red");
    		
    		$('.form-report').css("color", "#FFFFFF");
    
    		$('.form-report').show();
    
    		$('.finish-btn').html('Finish');
    
    		return false;
    
    	}
    
    	if(isNaN(phone) || hasWhiteSpace(phone)){
    		
    		$('.form-report').html("Wrong phone number format");
    
    		$('.form-report').css("background", "red");
    		
    		$('.form-report').css("color", "#FFFFFF");
    
    		$('.form-report').show();
    
    		$('.finish-btn').html('Finish');
    
    		return false;
    	}	
    
    	
    	if(!isEmail(email)){
    
    		$('.form-report').html("Wrong email format");
    
    		$('.form-report').css("background", "red");
    		
    		$('.form-report').css("color", "#FFFFFF");
    
    		$('.form-report').show();
    
    		$('.finish-btn').html('Finish');
    
    		return false;
    
    	}
    
    	if(!checkPassword(password1)){
    		
    		$('.form-report').html("Password should be 6 - 20 characters, and must contain at least one upercase, lowercase, number and special character");
    
    		$('.form-report').css("background", "red");
    		
    		$('.form-report').css("color", "#FFFFFF");
    
    		$('.form-report').show();
    		
    	    $('.finish-btn').html('Finish');
    	    
    		return false;
    	}
    
    	if(password1 !== password2){
    	    
    	    $('.form-report').html("Passwords do not match");
    
    		$('.form-report').css("background", "red");
    		
    		$('.form-report').css("color", "#FFFFFF");
    
    		$('.form-report').show();
    
    		$('.finish-btn').html('Finish');
    
    		return false;
    
    	}
    
    	var data = {
    
    		'fname' : fname,
    
    		'lname' : lname,
    
    		'email' : email,
    
    		'phone' : phone,
    
    		'password' : password1,
    
    		'income' : income,
    
    		'age' : age,
    
    		'gender' : gender,
    		
    		'referral' : referral,
    		
    		'referred_by' : referred_by,
    		
    		'user_type' : user_type,
    		
    		'interest' : interest
    
    	};
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url: baseUrl+"rss/signup_form/",
    
    		type: "POST",
    
    		async: true,
    
    		data: data,
    
    		success: function(data) {
    
    			if(data == 1){
    			    
    			    $('#clicked').val("1");
                    
                    next_step.show();
                    
                    current_step.hide();
                    
                    // setProgressBar(++current);
                    
                    $('.final-signup-msg').show();
                    
                    window.scrollTo(0, 0);
                    
                     // Identify the user by their email and userID in Mixpanel to track Users
                    mixpanel.identify(email);
                    

                    // Track the user login event in mixpanel
                    mixpanel.track('User Login', {
                        'Username': email,
                        'UserID': userID
                    });
                	
                	// 	return false;
                    
    				window.location.href = baseUrl+"login";    
    			}else{
    
    				$('.form-report').html(data);
    
            		$('.form-report').css("background", "red");
            		
            		$('.form-report').css("color", "#FFFFFF");
            
            		$('.form-report').show();
    				
    				$('.finish-btn').html('Finish');
    				
    				return false; 
    
    			}
    
    		}
    	});
	}
});

$('.resend-verification').click(function(){
	
	"use strict";
	
	$('.s_modal_do').html('resending...');
		
	var email = $('.conf-email').val();

	if(!email){
		$('.s_modal_do').html("Didn't get it? Send again.");
		return false;
	}
	var data = {"email": email};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/resend_verification/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {

			if(data == 1){

				$('s_modal_do').removeClass('resend-verification');

				$('.s_modal_do').html("Sent!");

			}else{
				
				$('.s_modal_do').html("Didn't get it? Send again.");

				return false; 

			}

		}
		
	});

});