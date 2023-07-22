//Javascript document
var baseUrl = "https://dev-rent.smallsmall.com/";

$('.current-details').click(function(){
    
    var id = $(this).attr('id').replace(/current-details-/, '');
    
    //alert("Current details "+id);
    
    $('#review-'+id).removeClass('active-tab');
    
    $('#review-pane-'+id).hide(600);
    
    //make button active
    $(this).addClass('active-tab');
    
    //Open current details form
    $('#current-details-pane-'+id).show(600);
});

$('.rent-review').click(function(){
    
    var id = $(this).attr('id').replace(/review-/, '');
    
    //alert("Review form "+id);
    
    $('#current-details-'+id).removeClass('active-tab');
    
    $('#current-details-pane-'+id).hide(600);
    
    //make button active
    $(this).addClass('active-tab');
    
    //Open review form
    $('#review-pane-'+id).show(600);
});

$('.review-button').click(function(){
    
    $(this).html('sending...');
    
    var amount = $('.new-price').val();
    
    var reason = $('.purpose-of-review').val();
    
    var payment_plan = $('.payment-plan').val();
    
    var the_id = $('#property-id').val();
    
    var data = {"amount" : amount, "payment_plan" : payment_plan, "reason" : reason, "propertyID" : the_id};
    
    //Send it to RSS
    $.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/send_rent_review/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {

			if(data == 1){
			    
			    alert("Rent review sent. One of our agents will be in contact");
			    
			    $('.new-price').val('');
			    
			    $('.purpose-of-review').val('');
			    
			    $('.payment-plan').val('');

				$('.review-button').html('Send review');
				
				//window.location.href = baseUrl+"login";

			}else{
			    alert("Error sending review, try again later");

				('.review-button').html('Send review');
				
				return false; 

			}

		}

	});
    
    
});
