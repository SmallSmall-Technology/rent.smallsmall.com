// JavaScript Document

var baseUrl = "https://dev-rent.smallsmall.com/";

// Initialize Mixpanel with your project token
mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

function isEmail(email) {

	"use strict";

   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   return regex.test(email);

}
$('#loginForm').submit(function(e){

	"use strict";

	e.preventDefault();

	$('.loginButton').html("<i class='fa fa-unlock'></i> Wait...");

	$('.loader').show();

	$('.form-report').hide();
	


	var username = $.trim($('#username').val());

	var password = $.trim($('#pass').val());

	var current_page = $.trim($('#current-page').val());
	
	
	//Check for empty fields

	var filteredList = $('.mand-f').filter(function(){

		return $(this).val() === "";

	});

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.mand-f').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		$('.form-report').html("Fields in red are mandatory fields");

		$('.form-report').css("background", "red");
		
		$('.form-report').css("color", "#FFFFFF");

		$('.form-report').show();

		$('.loader').hide();

		window.scrollTo(0,100);
		
		$('.loginButton').html('<i class="fa fa-lock"></i> Log in');

		return false;

	}

	

	if(!isEmail(username)){

		$('.form-report').html("Wrong email format");

		$('.form-report').css("background", "red");
		
		$('.form-report').css("color", "#FFFFFF");

		$('.form-report').show();

		$('.loader').hide();

		window.scrollTo(0,100);

		$('.loginButton').html('<i class="fa fa-lock"></i> Log in');
		
		return false;

	}

	var data = {

		'username' : username,

		'password' : password

	};

	

	$.ajaxSetup ({ cache: false });
	
	
	// Initialize Mixpanel with your project token
    mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');
    
                        
// Identify the user by their email and userID in Mixpanel to track Users
    mixpanel.identify(username);

    
    // Track the user login event
    mixpanel.track('User Login', {
        'Username': username,
        'UserID': userID
    });
   

	$.ajax({

		url: baseUrl+"rss/login_form/",

		type: "POST",

		dataType : 'json',

		data: data,

		success: function(data) {


			if(data.result == 'success'){	
			    
			    // Track the successful login event
                mixpanel.track('Successful Login', {
                    'Username': username
                });

				window.location.href = current_page;
				
				
				
				
				/*if(data.user_type == 'tenant'){
				    
				    window.location.href = baseUrl+"user/dashboard";
				    
				}else{
				    
				    window.location.href = baseUrl+"landlord/dashboard";
				    
				}*/

			}else if(data.result == 'redirect'){				

				window.location.href = baseUrl+"do-password-reset";

			}else{
			    
			    // Track the login failure event
                mixpanel.track('Login Failed', {
                    'Username': username,
                    'Error Message': data.details
                });

				$('.loader').hide();

				$('.form-report').html(data.details);

				$('.form-report').css("background", "red");
				
				$('.form-report').css("color", "#FFFFFF");

				$('.form-report').show();
				
				$('.loginButton').html('<i class="fa fa-lock"></i> Log in');

				window.scrollTo(0,100);

			}

		}

	});

	

});

$('#pwdResetForm').submit(function(e){


	"use strict";
	e.preventDefault();

	$('.loginButton').html('Wait...');

	$('.form-report').hide();
	

	var username = $.trim($('#username').val());
			

	//Check for empty fields

	var filteredList = $('.mand-f').filter(function(){

		return $(this).val() === "";

	});
	

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.mand-f').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		$('.form-report').html("Fields in red are mandatory fields");

		$('.form-report').css("background", "red");
		
		$('.form-report').css("color", "#FFF");

		$('.form-report').show();

		$('.loginButton').html('Submit');

		window.scrollTo(0,100);

		return false;

	}
	

	if(!isEmail(username)){

		$('.form-report').html("Wrong email format");

		$('.form-report').css("background", "red");
		
		$('.form-report').css("color", "#FFF");

		$('.form-report').show();

		$('.loginButton').html('Submit');

		window.scrollTo(0,100);

		return false;

	}
	

	var data = {

		'username' : username

	};

	

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/passReset/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {			

			if(data == 1){				
				
				$('.loginButton').html('Submit');
				
				$('.form-report').html('Check your email for reset instructions');

				$('.form-report').css("background", "#007DC1");

				$('.form-report').css("color", "#FFF");

				$('.form-report').show();
				
				$('#username').val('');

				$('.sendAgainOverlay').css('display', 'flex');

				window.scrollTo(0,100);
				
				return false;

			}else{

				$('.loginButton').html('Submit');

				$('.form-report').html(data);

				$('.form-report').css("background", "red");

				$('.form-report').css("color", "#FFF");

				$('.form-report').show();

				window.scrollTo(0,100);
				
				return false;

			}

		}

	});

	

});

$('#pwdForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.loginButton').html("Wait...");
	
	var password = $.trim($('#password').val());

	var pass2 = $.trim($('#password_2').val());

	//Check for empty fields

	var filteredList = $('.mand-f').filter(function(){

		return $(this).val() === "";

	});
	

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.mand-f').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		$('.form-report').html("Fields in red are mandatory fields");

		$('.form-report').css("background", "red");

		$('.form-report').show();

		$('.loader').hide();

		window.scrollTo(0,100);
		
		$('.loginButton').html('Submit');

		return false;

	}

	
	var data = {

		'password' : password

	};
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/changePass/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {			

			if(data == 1){				
				
				$('.loginButton').html('Submit');
				
				$('#username').val('');

				$('.form-report').html("Password Successfully Changed. Proceed to Login");

				$('.form-report').css("background", "#007dc1");

				$('.form-report').css("color", "#FFF");

				$('.form-report').show();
				
				$('.mand-f').val("");

				window.scrollTo(0,100);

			}else if(data == 2){
				
				//Go to homepage
				window.location.href = baseUrl+"login";	
				
			}else{

				$('.loginButton').html('Submit');

				$('.form-report').html(data);

				$('.form-report').css("background", "red");

				$('.form-report').show();

				window.scrollTo(0,100);

			}

		}

	});
	
});

$('#appPwdResetForm').submit(function(e){

	"use strict";

	e.preventDefault();

	$('.loginButton').html('Wait...');

	$('.form-report').hide();
	

	var username = $.trim($('#username').val());
			

	//Check for empty fields

	var filteredList = $('.mand-f').filter(function(){

		return $(this).val() === "";

	});
	

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.mand-f').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		$('.form-report').html("Fields in red are mandatory fields");

		$('.form-report').css("background", "red");

		$('.form-report').show();

		$('.loginButton').html('Submit');

		window.scrollTo(0,100);

		return false;

	}
	

	if(!isEmail(username)){

		$('.form-report').html("Wrong email format");

		$('.form-report').css("background", "red");

		$('.form-report').show();

		$('.loginButton').html('Submit');

		window.scrollTo(0,100);

		return false;

	}
	

	var data = {

		'username' : username

	};

	

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/appPassReset/",

		type: "POST",

		async: true,

		data: data,

		beforeSend: function() {


		},

		success: function(data) {			

			if(data == 1){				
				
				$('.loginButton').html('Submit');
				
				$('#username').val('');

				$('.sendAgainOverlay').css('display', 'flex');

			}else{

				$('.loginButton').html('Submit');

				$('.form-report').html(data);

				$('.form-report').css("background", "red");

				$('.form-report').show();

				window.scrollTo(0,100);

			}

		}

	});

});

$('#appPwdForm').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.loginButton').html("Wait...");
	
	var password = $.trim($('#password').val());

	var pass2 = $.trim($('#password_2').val());

			

	//Check for empty fields

	var filteredList = $('.mand-f').filter(function(){

		return $(this).val() === "";

	});

	

	//Do something about the empty fields

	if(filteredList.length > 0){

		$('.mand-f').css("border","1px solid #CCC");

		filteredList.css("border","1px solid rgba(251,1,1,0.5)");

		$('.form-report').html("Fields in red are mandatory fields");

		$('.form-report').css("background", "red");

		$('.form-report').show();

		$('.loader').hide();

		window.scrollTo(0,100);
		
		$('.loginButton').html('Submit');

		return false;

	}

	
	var data = {

		'password' : password

	};
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/changeAppPass/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {			

			if(data == 1){				
				
				$('.loginButton').html('Submit');
				
				$('#username').val('');

				$('.form-report').html("Password Successfully Changed.");

				$('.form-report').css("background", "#00CDA6");

				$('.form-report').css("color", "#FFF");

				$('.form-report').show();
				
				$('.mand-f').val("");

				window.scrollTo(0,100);

			}else if(data == 2){
				
				//Go to homepage
				window.location.href = baseUrl+"login";	
				
			}else{

				$('.loginButton').html('Submit');

				$('.form-report').html(data);

				$('.form-report').css("background", "red");

				$('.form-report').show();

				window.scrollTo(0,100);

			}

		}

	});
	
});


function showAndHidePassword(parentInput, inputEl, eyeIcon) {
  $(document).ready(function () {
    $(parentInput).click(function () {
      // Find the password input field
      let passwordInput = $(this).prev('input[type="password"]');
      let input = $(inputEl);
      let eyeEl = $(eyeIcon);

      // Toggle the type attribute of the password input
      if (passwordInput.attr("type") === "password") {
        input.attr("type", "text");
        eyeEl.removeClass("fa-eye-slash").addClass("fa-eye");
      } else {
        input.attr("type", "password");
        eyeEl.removeClass("fa-eye").addClass("fa-eye-slash");
      }
    });
  });
}
showAndHidePassword(".toggle-password", ".newPasswordInput", "#newPassword");

showAndHidePassword(".toggle-password2", ".confirmPasswordInput", "#confirmPassword");

showAndHidePassword(".toggle-password", ".form-password", "#unleashPass");

