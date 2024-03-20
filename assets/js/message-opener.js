// JavaScript Document

var baseUrl = "https://rent.smallsmall.com/";

var ids = 0;

/*$('.check-msg').click(function(){
    
    $('.inbox-col').css('width', '40%');
    
    $('.compose-col').css('display', 'block');
    
    $('.compose-container').css('display', 'none');
    
    $('.reply-container').css('display', 'block');
    
    window.scrollTo(0, 0);
    
});*/

$('.compose-msg').click(function(){
    
    //$('.compose-col').css('transition', '4s');
    
    //$('.inbox-col').css('transition', '4s');
    //$('.inbox-loader').hide();
    
    ///$('.inbox-col').css('width', '40%');
    
    var screenWidth = $(window).width();
	
	if(screenWidth > 900){
	
    	$('.inbox-loader').hide();
    	
    	$('.inbox-col').css('width', '50%');
        
        window.scrollTo(0, 0);
        
	}else{
	    
	    window.scrollTo(0, 600);
	}
    
    $('.compose-col').css('display', 'block');
    
    $('.reply-container').css('display', 'none');
    
    $('.compose-container').css('display', 'block');
    
});

$('.close-compose-box').click(function(){
    
    //$('.compose-col').css('transition', '4s');
    
    //$('.inbox-col').css('transition', '4s');
    
    $('.inbox-col').css('width', '100%');
    
    $('.compose-col').css('display', 'none');
    
});

$(document).on('click', '.open-message', function(){
    
    $('.inbox-loader').show();
        
    $('.inbox-msg').html('...');
		    
    $('.inbox-sub').html('...');
    
    $('.inbox-sender').html('...');
        
    
	var id = $(this).attr("id").replace(/message-/, "");
	
	var screenWidth = $(window).width();
	
	if(screenWidth > 900){
	
    	//$('#message-'+id).html('Opening...');
    	
    	//$('.inbox-col').css('width', '50%');
        
        //window.scrollTo(0, 0);
        
	}else{
	    
	    window.scrollTo(0, 600);
	}
        
    //$('.compose-col').css('display', 'block');
    
    //$('.compose-container').css('display', 'none');
    
    //$('.reply-container').css('display', 'block');
	
	var data = {"id": id};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/mark_as_read/",

		type: "POST",
		
		dataType : 'json',

		async: true,

		data: data,

		success: function(data) {
            
			if(data.result){
			    setTimeout(function()
                {
                    //do something special
                    $('.inbox-msg').html(data.data[0].content);
			    
    			    $('.inbox-sub').html(data.data[0].subject);
    			    
    			    $('.inbox-sender').html(data.data[0].firstName+' '+data.data[0].lastName);
    			    
    			    $('.inbox-dt').html(data.data[0].dateOfEntry);
    			    
    			    $('#inbox-receiver').val(data.data[0].sender);
    			    
    			    $('#inbox-msg-id').val(data.data[0].id);
    			    
    			    //$('.inbox-stat-ball').addClass('unread');
    			    
    			    //$('.inbox-loader').hide();
                }, 2000);
                  
                  //$('#message-'+id).html('Open');

				//$('#message-stat-'+id).removeClass('unread');

				//$('#message-stat-'+id).addClass('read');

			}else{

                $('#message-'+id).html('Open');

			}

		}

	});
	
		
});


/*$('.open-message').click(function(){

	"use strict";

	var id = $(this).attr("id").replace(/message-/, "");

	$(this).removeClass('unopened');

	$('.message-button-o').removeClass('opened');	

	$('.message-button-o').html('View message <i class="fa fa-angle-down"></i>');

	$('.message-button-o').removeClass('unopened');

	$(this).removeClass('open-message');

	$(this).addClass('opened close-message');

	$('.message-details').hide(400);

	$('#message-details-'+id).show(400);

	$(this).html('Close Message <i class="fa fa-angle-up"></i>');

});



$(document).on('click', '.close-message', function(){

	"use strict";
	
	var id = $(this).attr("id").replace(/message-/, "");

	$(this).removeClass('opened');

	$(this).addClass('unopened open-message');

	$('#message-details-'+id).hide(400);

	$(this).html('View message <i class="fa fa-angle-down"></i>');

});*/

$('.reply-button-o').click(function(){

	"use strict";

	var id= $(this).attr("id").replace(/message-/, "");

	$('#reply-field-'+id).show();

});

$('#tenantReplyMsg').submit(function(e){

	"use strict";
	
	e.preventDefault();
	
	var receiverID = $('#inbox-receiver').val();

	var messageID = $('#inbox-msg-id').val();

	var subject = $('.inbox-sub').html();

	var reply = $('#reply-txt-field').val();
	
	//alert(receiverID+'-'+messageID+'-'+subject+'-'+reply);

	if(reply == ""){

	   	alert("Reply field can't be empty!");

		$('#reply-txt-field').css("border", "1px solid red");

		return false;

	}

	var data = {"receiverID" : receiverID, "messageID" : messageID, "subject" : subject, "reply" : reply};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/reply_message/",

		type: "POST",

		async: true,

		data: data,

		beforeSend: function() {
		    
			$('.submit-reply').html("Sending...");
			
		},

		success: function(data) {

			if(data == 1){

				alert("Successfully sent!");	

				$('#reply-txt-field').val("");

				$('.submit-reply').html("Send");

			}else{

				alert("Error sending message");				

				$('.submit-reply').html("Send");

			}

		}

	});

});

$('#tenantNewMsg').submit(function(e){

	"use strict";
	
	e.preventDefault();

	var message = $('#compose-msg').val();

	var subject = $('#compose-sub').val();


	if(message == ""){

	   	alert("Message field can't be empty!");

		$('#compose-msg').css("border", "1px solid red");

		return false;

	}
	
	if(subject == ""){

	   	alert("Subject field can't be empty!");

		$('#compose-sub').css("border", "1px solid red");

		return false;

	}

	var data = {"message" : message, "subject" : subject};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/send_message/",

		type: "POST",

		async: true,

		data: data,

		beforeSend: function() {
		    
			$('.submit-message').html("Sending...");
			
		},

		success: function(data) {

			if(data == 1){

				alert("Successfully sent!");	

				$('#compose-msg').val("");	

				$('#compose-sub').val("");

				$('.submit-message').html("Send");

			}else{

				alert("Error sending message");				

				$('.submit-message').html("Send");

			}

		}

	});

});