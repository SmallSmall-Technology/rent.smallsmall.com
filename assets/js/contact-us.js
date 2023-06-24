var baseUrl = "https://rent.smallsmall.com/";

$("#contactus").submit(function(e){
    
    e.preventDefault();
    
    $("#contactBut").html("Sending...");
    
    var name = $('#name').val();
    
    var phone = $('#phone').val();
    
    var email = $('#email').val();
    
    var msg = $('#msg').val();
    
    var filteredList = $('.verify-fld').filter(function(){

		return $(this).val() == "";

	});

	if(filteredList.length > 0){

		$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

		filteredList.css("border","2px solid rgba(251,1,1,0.5)");
		
		$("#contactBut").html("Send message");

		return false;

	}
	
	var data = {"name" : name, "phone" : phone, "email" : email, "msg" : msg};
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/contactFormData/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {

			if(data == 1){

				alert('Message sent!');

				location.reload(true);

			}else{

				$('.form-result').html('<div class="width:100%;line-height:30px;background:#FF0000;color:#FFF;border-radius:3px;font-family:avenir-regular;text-indent:10px;">Error sending message</div>');

		        window.scrollTo(0,100);
				
				return false;

			}

		},

		error: function() {
            alert("Contact administrator");
			return false;

		}

	});
});