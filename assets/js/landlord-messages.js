//Javascript 
var baseUrl = "https://dev-rent.smallsmall.com/";

$('#msgForm').submit(function(e){
    
    e.preventDefault();
    
    $('#submit-btn').val("Sending...");
    
    var msg_subject = $('#subject').val();
    
    var msg_content = $('#message').val();
    
    var data = {"msg_subject" : msg_subject, "msg_content" : msg_content};
    
    $.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/send_landlord_message/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {


			if(data == 1){				

				//Successful
				alert("Message sent successfully!");
				
				$('#subject').val('');
				
				$('#message').val('');
				
				$('#submit-btn').val("Send message");
				
				return false;

			}else{

				alert('Sending unsuccessful : '+data);
				
				$('#submit-btn').val("Send message");
				
				return false;

			}

		}

	});
    
});