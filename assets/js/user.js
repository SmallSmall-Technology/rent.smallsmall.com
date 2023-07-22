var baseUrl = "https://dev-rent.smallsmall.com/";

$('.s_modal_close').click(function(){
	$('.allPurposeOverlay').css("display", "none");
});
$('#updateProfile').submit(function(e){
	"use strict";
	e.preventDefault();
	
	$('.profile-btn').html('Saving...');
	
	var firstname = $.trim($('.first-name').val());
	
	var lastname = $.trim($('.last-name').val());
	
	var email = $.trim($('.email').val());
	
	var phone = $.trim($('.phone').val());
	
	var income = $.trim($('.income_level').val());	
	
	var user_id = $('.user_id').val();
	
	var filteredList = $('.verify-field').filter(function(){
		return $(this).val() == "";
	});

	if(filteredList.length > 0){
        
        $('.result-bar').fadeIn();
        
        $('.result-bar').html("All fields are required");
			    
	    $('.result-bar').removeClass('green-bg');
	    
	    $('.result-bar').addClass('red-bg');
	    
	    $('.feedback-btn').val('Submit');

		$('.profile-btn').html('Save changes');
		
		 window.scrollTo(0, 0);
		 
		return false;
	}
	
	var data = {"lastname" : lastname, "firstname" : firstname,	"email" : email,	"phone" : phone, "income_level" : income,	"user_id" : user_id};
	
	$.ajaxSetup ({ cache: false });
	
	$.ajax({
		url: baseUrl+"rss/updateUserInfo",
		
		type: "POST",
		
		data: data,
		
		success: function(data) {
			if(data == 1){
			    
				alert("Profile successfully updated.");
				
				location.reload();
				
			}else{
			    
			    $('.result-bar').fadeIn();
			    
			    $('.result-bar').html("Error inserting data");
			    
			    $('.result-bar').removeClass('green-bg');
			    
			    $('.result-bar').addClass('red-bg');
			    
				$('.profile-btn').html('Save changes');
	            
	            window.scrollTo(0, 0);
	            
	            return false;
				
			}

		} 
	});	
});

//Change display picture

$('.the-profile-pic').on("change", function(){
	
	"use strict";
	
	$('.new-button').html("Uploading ...");
	
	var fd = new FormData();

	var files = $('.the-profile-pic')[0].files[0];

	var folderName = $('.user_id').val();
	
	
	if(!folderName){

	   folderName = 0;

	}
	

	fd.append('files',files); 
	
	$.ajax({

		url: baseUrl+'rss/uploadProfilePicture/'+folderName,

		type: 'post',
		
		dataType: 'json',

		data: fd,

		contentType: false,

		processData: false,

		beforeSend: function(){


		},

		success:function(data){
			
			if(data.result == "success"){
				
			   	//Change profile picture
				$('.profile-img').html('<img src="'+baseUrl+'uploads/users/'+folderName+'/'+data.msg+'" />');
				
				
				$('.new-button').html("Upload Picture");
				
			}else{
				
				alert(data.msg);
				
				$('.new-button').html("Upload Picture");
				
			}

		}

	});
	
});
//Switch rent duration on booking
$('.switcharoo').click(function(){
	
	"use strict";
	
	var id = $(this).attr("id").replace(/switch-/, "").split('-');
	
	$('#switch-'+id[0]+'-'+id[1]).html("Wait...");
	
	var booking_id = id[0];
	
	var prop_id = id[1];
	
	var data = {
		
		"booking_id" : booking_id,
		
		"property_id" : prop_id
		
	};
	
						
	//$('.renew-pane').hide();
					
	//$('.switch-pane').show();
	
	//$('.allPurposeOverlay').css("display", "flex");
	
	//$('.s_modal_title').html('Switch Rent Date');
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/getBookingDuration/",

		type: "POST",

		data: data,

		dataType: 'JSON',

		beforeSend: function() {



		},

		success: function(data) {

			//console.log(data);

			//alert(data.frequency.length+' - '+data.intervals.length);

			var int = '<select class="pPlan soflow" id=""><option value="">Payment Plan</option>';

			$.each(data.intervals, function(index, value) {
			  // work with value
				int += '<option value="'+value+'">'+value+'</option>';

			});
			int += '</select>';

			$('.interval-spn').html(int);



			var freq = '<select class="duration soflow" id=""><option value="">Duration</option>';

			$.each(data.duration, function(index, val) {
			  // work with value
				if(val > 1){
					freq += '<option value="'+val+'">'+val+' Months</option>';
				}else{
					freq += '<option value="'+val+'">'+val+' month</option>';
				}


			});
			freq += '</select>';

			$('.frequency-spn').html(freq+'<input type="hidden" class="propPrice" value="'+data.price+'" /><input type="hidden" class="verification_id" value="'+data.verID+'" />');
			//console.log(data.frequency+' - '+data.intervals+' - '+data.price);

			$('#switch-'+booking_id+'-'+prop_id).html("Switch");

			$('.renew-pane').hide();

			$('.switch-pane').show();

			$('.allPurposeOverlay').css("display", "flex");

			return false;


		}

	});
	
});
$('.booking-button').click(function(){
	
	"use strict";
	
	$(this).html("Wait...");
	
	var dets = $(this).attr('id').split("-");
	
	var pType = dets[0];
	
	var tID = dets[1];	
	
	var data = {"pType" : pType, "tID" : tID};
	
	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"rss/switchPaymentType/",

		type: "POST",

		async: true,

		data: data,

		success: function(data) {
			
			if(data == 1){
				
				alert("Successfully Switched payment mode");
				
				$('.booking-button').html("Switch to "+pType);
				
				location.reload();
				
			}else{
				
				alert("Error switching payment mode.");
				
				$('.booking-button').html("Switch to "+pType);
				
				return false;
				
			}
		}

	}); 
	
});
/*$('.renew-button').click(function(){
	
	"use strict";
	
	$('.switch-pane').hide();
						
	$('.renew-pane').show();
	
	$('.allPurposeOverlay').css("display", "flex");
	
	//$('.s_modal_title').html('Switch Rent Date');
	
	/*$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"rss/getBookingDuration/",

			type: "POST",

			async: true,

			data: data,
			
			dataType : "json",

			beforeSend: function() {



			},

			success: function(data) {
				
				$('#switch-'+booking_id+'-'+prop_id).html("Switch");				
				
				$('.allPurposeOverlay').css("display", "flex");

				$('.s_modal_title').html('Switch Rent Date');
				
				$('.s_modal_note').html(data.frequency+' '+data.intervals);
				
				return false;


			}

		});
	
});*/
$('#switch-payment-plan').submit(function(e){
	
	"use strict";
	
	e.preventDefault();
	
	$('.the-switch-but').val("Switching...");
	
	var duration = $('.duration').val();
	
	var pPlan = $('.pPlan').val();
	
	var price = $('.propPrice').val();
	
	var verID = $('.verification_id').val();
	
	if(duration == "" || pPlan == ""){
	   
		$('.form-report').show();
		
		$('.form-report').html('<div style="width:100%;line-height:30px;background:#FF0000;color:#FFF;font-size:14px;font-family:avenir-regular;border-radius:4px;text-indent:10px;">Select appropriate values</div>');
		
		$('.the-switch-but').val("Switch");
		
		return false;
		
	}
	
	var data = {"duration" : duration, "pPlan" : pPlan, "price" : price, "verification_id" : verID};
	
	$.ajaxSetup ({ cache: false });
	
	$.ajax({
		
		url: baseUrl+"rss/updatePlan",
		
		type: "POST",
		
		data: data,
		
		success: function(data) {
			
			if(data == 1){
				
				$('.form-report').show();
				
				$('.form-report').html('<div style="width:100%;line-height:30px;background:#00CDA6;color:#FFF;font-size:14px;font-family:avenir-regular;border-radius:4px;text-indent:10px;">Select appropriate values</div>');
				
				$('.duration').val('');	
				
				$('.pPlan').val('');
				
				$('#pay-plan-'+verID).html(pPlan);
				
				$('.the-switch-but').val("Switch");
				
			}else{
				
				$('.form-report').show();
				
				$('.form-report').html('<div style="width:100%;line-height:30px;background:#FF0000;color:#FFF;font-size:14px;font-family:avenir-regular;border-radius:4px;text-indent:10px;">Error switching</div>');	
				
				$('.the-switch-but').val("Switch");
				
				return false;
				
			}

		} 
	});	
	
});