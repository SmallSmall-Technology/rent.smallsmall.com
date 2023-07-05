// JavaScript Document - Old
// jQuery(document).ready(function($){

 
//   var baseUrl = "https://dev-rent.smallsmall.com/";

//     var dateToday = new Date(); 
    
//     $('.close-button').click(function(){
        
//         $('.popup-container').css("display", "none");
    				
//     	$('.popup.inspection').css("display", "none");
    	
//     	$('.popup.payment-option-pop').css("display", "none");
    	
//     	$('.popup.subscription').css("display", "none");
    	
//     });
    
    
//     $('#inspectionForm').submit(function(e){
        
//         e.preventDefault();
    
//     	"use strict";
    	
//         var inspectionType = $('.insp-type').val();
        
//         var inspectionTime = $('.inspection-time').val();
            
//         var inspectionDate = $('.inspection-date').val();
    	
//     	var inspectionStat = $('#inspection_stat').val();
    	
//     	/*if(inspectionStat == 'yes'){
    
//     		$(".appender").remove();
    
//     		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You already booked an inspection</span>');
    
//     		return false;
    
//     	}*/
    	
//     	//inspectionDate = inspectionDate.replace(/ PM/, '');
    	
//     	//alert(inspectionDate);
    	
//     	//return false;
    	
//     	var propID = $('.property-id').val();
    	
//     	inspectionDate = inspectionDate+' '+inspectionTime+':00';
    	
//     	//var v_stat = $('#cvstat').val();
    		
//     	//var v_profile = $('#verification_profile').val();
    		
//     	/*if(v_stat == 'no' && v_profile == 1){
    
//     		alert('Account not verified!');
    
//     		return false;
    
//     	}*/
    	
    
//     	if(inspectionDate == ''){
    
//     		$('.date-wrapper').css("border", "1px solid #F00");
    
//     		$(".appender").remove();
    
//     		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
//     		return false;
    
//     	}
    	
    
//     	/*if($("input[name='tenancy-terms']:checked").length < 1){
    
//     		$(".appender").remove();
    
//     		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You need to agree to tenancy terms</span>');
    
//     		return false;
    
//     	}*/
    
//     	var data = {"inspectionDate" : inspectionDate, "propID" : propID, "inspectionType" : inspectionType};
    
//     	$.ajaxSetup ({ cache: false });
    
//     	$.ajax({
    
//     		url: baseUrl+"rss/bookInspection/",
    
//     		type: "POST",
    
//     		async: true,
    
//     		data: data,
    
//     		beforeSend: function() {
    
//     			$(".schedule-inspection").css("opacity",".4");
    
//     			$(".schedule-inspection").html("Scheduling...");
    
//     		},
    
//     		success	: function (data){
    
//     			if(data == 1){
    				
//     				$('.popup-container').css("display", "block");
    				
//     				$('.popup.inspection').css("display", "block");
    
//     				$(".schedule-inspection").css("opacity","1");
    
//     				$(".schedule-inspection").html("Schedule inspection");
    
//     				$("#inspection_stat").val("yes");
    				
//     				return false;
    
//     			}else if(data == 2){
//                     alert('You need to login to schedule an inspection');
//     				//Redirect to login page
//     				window.location.href = baseUrl+"login";
    
//     			}else{				
    
//     				$(".schedule-inspection").css("opacity","1");
    
//     				$(".schedule-inspection").html("Schedule inspection");				
    
//     				return false;
    
//     			}				
    
//     		}
    
//     	});
    
    	
    
//     	$.ajaxSetup ({ cache: false });
    
//     	$.ajax({
    	    
//     		type: "POST",
    
//     		dataType : 'json',
    
//     		success: function(data) {
    
//     			//alert(data.status+' : '+data.msg);
    
//     			//distance = data.msg;
    
//     			var result = data;
    
    
    
//     			//console.log(result.msg[0].distance);
    
//     			for(let i = 0; i < result.msg.length; i++){
    
//     				distance += '<option value="'+result.msg[i].distance+'">'+result.msg[i].distance+'</option>';
    
//     			}
    
//     			//distance = result.msg[0].distance;
    
//     		}
    
//     	});
    
//     });
    
//     $('#mobInspectionForms').submit(function(e){
        
//         e.preventDefault();
    
//     	"use strict";
    	
//         var inspectionType = $('.mob-insp-type').val();
        
//         var inspectionTime = $('.mob-inspection-time').val();
            
//         var inspectionDate = $('.mob-inspection-date').val();
    	
//     	var inspectionStat = $('#inspection_stat').val();
    	
//     	/*if(inspectionStat == 'yes'){
    
//     		$(".appender").remove();
    
//     		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You already booked an inspection</span>');
    
//     		return false;
    
//     	}*/
    	
//     	//inspectionDate = inspectionDate.replace(/ PM/, '');
    	
//     	//alert(inspectionDate);
    	
//     	//return false;
    	
//     	var propID = $('.property-id').val();
    	
//     	inspectionDate = inspectionDate+' '+inspectionTime+':00';
    	
//     	//var v_stat = $('#cvstat').val();
    		
//     	//var v_profile = $('#verification_profile').val();
    		
//     	/*if(v_stat == 'no' && v_profile == 1){
    
//     		alert('Account not verified!');
    
//     		return false;
    
//     	}*/
    	
    
//     	if(inspectionDate == ''){
    
//     		$('.date-wrapper').css("border", "1px solid #F00");
    
//     		$(".appender").remove();
    
//     		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
//     		return false;
    
//     	}
    
//     	var data = {"inspectionDate" : inspectionDate, "propID" : propID, "inspectionType" : inspectionType};
    
//     	$.ajaxSetup ({ cache: false });
    
//     	$.ajax({
    
//     		url: baseUrl+"rss/bookInspection/",
    
//     		type: "POST",
    
//     		async: true,
    
//     		data: data,
    
//     		beforeSend: function() {
    
//     			$(".mob-schedule-inspection").css("opacity",".4");
    
//     			$(".mob-schedule-inspection").html("Scheduling...");
    
//     		},
    
//     		success	: function (data){
    
//     			if(data == 1){
    			    
//     			    $('.mobile-overlays').css('display', 'none');
    			    
//                     $('body').removeClass('no-scroll');
    				
//     				$('.popup-container').css("display", "block");
    				
//     				$('.popup.inspection').css("display", "block");
    
//     				$(".mob-schedule-inspection").css("opacity","1");
    
//     				$(".mob-schedule-inspection").html("Schedule inspection");
    
//     				$("#inspection_stat").val("yes");
    				
//     				return false;
    
//     			}else if(data == 2){
//                     alert('You need to login to schedule an inspection');
//     				//Redirect to login page
//     				window.location.href = baseUrl+"login";
    
//     			}else{
    			    
//     			    $('.mobile-overlays').css('display', 'none');
    			    
//                     $('body').removeClass('no-scroll');
    
//     				$(".mob-schedule-inspection").css("opacity","1");
    
//     				$(".mob-schedule-inspection").html("Schedule inspection");				
    
//     				return false;
    
//     			}				
    
//     		}
    
//     	});
//     });
    
    
    
//     /*var dates = $("#field-date").datepicker({
    
//         numberOfMonths: 3,
    
//     	showButtonPanel: true,
    
//     	minDate: dateToday,
    
//         onSelect: function(selectedDate) {
    
//             var option = this.id == "field-date" ? "minDate" : "maxDate",
    
//                 instance = $(this).data("datepicker"),
    
//                 date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    
//             dates.not(this).datepicker("option", option, date);
    
//         }
    
//     });*/
    
    
    
//     $('#fields-date').on("dp.change", function (e){
    
//     	"use strict";
    
//     	var todaysDate = new Date(); // Gets today's date
    	
//     	var dateSelected = $(this).toLocaleDateString();
    
//     	var selected = dateSelected.split("-").reverse().join("-");
    	
//     	alert(selected);
    
    	
    
//     	// Max date attribute is in "YYYY-MM-DD".  Need to format today's date accordingly
    
//     	var year = todaysDate.getFullYear();                        // YYYY
    
    
    
//     	var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);  // MM
    
    
    
//     	var day = ("0" + todaysDate.getDate()).slice(-2);           // DD
    
    
    
//     	//7 Days in advance day
    
//     	var advDate = parseInt(todaysDate.getDate() + 7);
    
//     	//alert(todaysDate.getDate() + 7);
    
//     	var freePass = "";
    
    
    
//     	if(parseInt(advDate) > parseInt(31)){
    
    
    
//     		if((todaysDate.getMonth() + 1) == parseInt(12)){
    
//     			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
//     			year++;
    
//     			day = advDate - parseInt(31);
    
//     			day = ("0" + day).slice(-2);
    
//     			freePass = "ok";
    
//     		}else if((todaysDate.getMonth() + 1) == parseInt(4) || (todaysDate.getMonth() + 1) == parseInt(6) || (todaysDate.getMonth() + 1) == parseInt(9) || (todaysDate.getMonth() + 1) == parseInt(11)){
    
    
    
//     			day = advDate - parseInt(30);
    
//     			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
//     			day = advDate - parseInt(30);
    
//     			day = ("0" + day).slice(-2);
    
    
    
//     		}else if(todaysDate.getMonth() == parseInt(4)){
    
//     			day = advDate - parseInt(30);
    
//     			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
//     			day = ("0" + (advDate - parseInt(28))).slice(-2);	
    
    
    
//     		}else if(todaysDate.getMonth() < parseInt(12)){
    
//     			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
//     			day = advDate - parseInt(31);
    
//     			day = ("0" + day).slice(-2);
    
//     		}else{
    
//     			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
//     			year++;
    
//     			day = advDate - parseInt(31);
    
//     			day = ("0" + day).slice(-2);
    
//     		}
    
//     	}else{				
    
//     		day = ("0"+advDate).slice(-2);				
    
//     	}
    
    
    
//     	var todaysD = day +""+ month +""+ year; // Results in "YYYY-MM-DD" for today's date
    
    
    
//     	var stripped = selected.replace(new RegExp('-', 'g'),"");
    
//     	// Now to set the max date value for the calendar to be today's date
    
//     	// Strip the selected dates into DD MM and YYYY
    
//     	var selectedDD =  parseInt(stripped.substring(0, 2));
    
//     	var selectedMM =  parseInt(stripped.substring(2, 4));
    
//     	var selectedYYYY =  parseInt(stripped.substring(4, 8));
    
//     	// Strip the future dates into DD MM and YYYY
    
//     	var futureDD =  parseInt(todaysD.substring(0, 2));
    
//     	var futureMM =  parseInt(todaysD.substring(2, 4));
    
//     	var futureYYYY =  parseInt(todaysD.substring(4, 8));
    
    
    
//     	/*if(futureMM > selectedMM){
    
//     	   alert(futureMM);
    
//     	   return false;
    
//     	}*/
    
    
    
//     	if(futureDD < selectedDD && futureMM > selectedMM && futureYYYY == selectedYYYY){
    
//     		//Do nothing
    
//     		$(".appender").remove();
    
//     	}else if(futureDD >= selectedDD && futureMM == selectedMM && futureYYYY == selectedYYYY){
    
//     		//Do nothing
    
//     		$(".appender").remove();
    
//     	}else{
    
//     		//alert(futureYYYY+" - "+selectedYYYY);
    
//     		//Report Error
    
//     		$(".appender").remove();
    
//     		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Inspection date cannot be more than 7 days</span>');
    
//     		$(this).val("");
    
//     		return false;
    
//     	}
    
//     });
    
// });


// JavaScript Document - New
jQuery(document).ready(function($){

 
   var baseUrl = "https://dev-rent.smallsmall.com/";

    var dateToday = new Date(); 
    
    $('.pop-modal').click(function() {
        
    $('.popup-container').css("display", "none");
    
    $('.popup.inspection').css("display", "none");

    // Check if the viewport width is greater than a certain threshold (e.g., 768 pixels for tablets).
    // For Web
    if (window.innerWidth > 768) {
        
        // Code for handling web view
        $('.schedule-visit-modal').removeClass('show');
        
        $('.modal-backdrop').remove();
        
        $('body').removeClass('modal-open');

        // Trigger a click event on the button to make it active.
        $('#scheduleVisit').trigger('click');
        
    } else {
        
        // For Mobile
        
        $('.fa-xmark').trigger('click');
    }
});

        
        
        $('#inspectionForm').submit(function(e){
        
        e.preventDefault();
    
    	"use strict";
    	
    // 	// Get the available date
    //     var availableDate = "<?php echo $property['available_date']; ?>";
        
    //     // Convert the available date to a JavaScript Date object
    //     var availableDateObj = new Date(availableDate);
        
    //     // Get the current date
    //     var currentDate = new Date();
    	
        var inspectionType = $('.insp-type').val();
        
        var inspectionTime = $('.inspection-time').val();
            
        var inspectionDate = $('.inspection-date').val();
    	
    	var inspectionStat = $('#inspection_stat').val();
    	
    	var tenancyTerms = document.getElementById('scheduleDesktop').checked;

    	
    	/*if(inspectionStat == 'yes'){
    
    		$(".appender").remove();
    
    		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You already booked an inspection</span>');
    
    		return false;
    
    	}*/
    	
    	//inspectionDate = inspectionDate.replace(/ PM/, '');
    	
    	//alert(inspectionDate);
    	
    	//return false;
    	
    	var propID = $('.property-id').val();
    	
    	inspectionDate = inspectionDate+' '+inspectionTime+':00';
    	
    	//var v_stat = $('#cvstat').val();
    		
    	//var v_profile = $('#verification_profile').val();
    		
    	/*if(v_stat == 'no' && v_profile == 1){
    
    		alert('Account not verified!');
    
    		return false;
    
    	}*/
    	
    // 	if (currentDate <= availableDateObj) {
            
    //         // Display an alert message
            
    //         alert("Property is not available.");
            
    //     return false;
        
    //     }
    	
    
    	if(inspectionType == ''){
    	    
    	    alert("Please select inspection type.");
    
    		$('.date-wrapper').css("border", "1px solid #F00");
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
    		return false;
    
    	}
    	
    	if(inspectionTime == ''){
    	    
    	    alert("Please select inspection time.");
    
    		$('.date-wrapper').css("border", "1px solid #F00");
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
    		return false;
    
    	}
    	
    	if(inspectionDate == ''){
    	    
    	    alert("Please select inspection date.");
    
    		$('.date-wrapper').css("border", "1px solid #F00");
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
    		return false;
    
    	}
    	
    	if(!tenancyTerms){
    	    
    	    alert("Please agree to subscrition terms.");
    
    		$('.date-wrapper').css("border", "1px solid #F00");
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
    		return false;
    
    	}
    	
    
    	/*if($("input[name='tenancy-terms']:checked").length < 1){
    
    		$(".appender").remove();
    
    		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You need to agree to tenancy terms</span>');
    
    		return false;
    
    	}*/
    
    	var data = {"inspectionDate" : inspectionDate, "propID" : propID, "inspectionType" : inspectionType};
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url: baseUrl+"rss/bookInspection/",
    
    		type: "POST",
    
    		async: true,
    
    		data: data,
    
    		beforeSend: function() {
    
    			$(".schedule-inspection").css("opacity",".4");
    
    			$(".schedule-inspection").html("Scheduling...");
    
    		},
    
    		success	: function (data){
    
    			if(data == 1){
    				
    				$('.popup-container').css("display", "block");
    				
    				$('.popup.inspection').css("display", "block");
    
    				$(".schedule-inspection").css("opacity","1");
    
    				$(".schedule-inspection").html("Schedule inspection");
    
    				$("#inspection_stat").val("yes");
    				
    				return false;
    
    			}else if(data == 2){
    			    
                    alert('You need to login to schedule an inspection');
                    
    				//Redirect to login page
    				
    				window.location.href = baseUrl+"login";
    
    			}else{				
    
    				$(".schedule-inspection").css("opacity","1");
    
    				$(".schedule-inspection").html("Schedule inspection");				
    
    				return false;
    
    			}				
    
    		}
    
    	});
    
    	
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    	    
    		type: "POST",
    
    		dataType : 'json',
    
    		success: function(data) {
    
    			//alert(data.status+' : '+data.msg);
    
    			//distance = data.msg;
    
    			var result = data;
    
    
    
    			//console.log(result.msg[0].distance);
    
    			for(let i = 0; i < result.msg.length; i++){
    
    				distance += '<option value="'+result.msg[i].distance+'">'+result.msg[i].distance+'</option>';
    
    			}
    
    			//distance = result.msg[0].distance;
    
    		}
    
    	});
    
    });



    $('#mobInspectionForms').submit(function(e){
        
        e.preventDefault();
    
    	"use strict";
    	
        var inspectionType = $('.mob-insp-type').val();
        
        var inspectionTime = $('.mob-inspection-time').val();
            
        var inspectionDate = $('.mob-inspection-date').val();
    	
    	var inspectionStat = $('#inspection_stat').val();
    	
    	/*if(inspectionStat == 'yes'){
    
    		$(".appender").remove();
    
    		$('.error-report').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">You already booked an inspection</span>');
    
    		return false;
    
    	}*/
    	
    	//inspectionDate = inspectionDate.replace(/ PM/, '');
    	
    	//alert(inspectionDate);
    	
    	//return false;
    	
    	var propID = $('.property-id').val();
    	
    	inspectionDate = inspectionDate+' '+inspectionTime+':00';
    	
    	//var v_stat = $('#cvstat').val();
    		
    	//var v_profile = $('#verification_profile').val();
    		
    	/*if(v_stat == 'no' && v_profile == 1){
    
    		alert('Account not verified!');
    
    		return false;
    
    	}*/
    	
    
    	if(inspectionDate == ''){
    
    		$('.date-wrapper').css("border", "1px solid #F00");
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Select a date</span>');
    
    		return false;
    
    	}
    	
    
    	var data = {"inspectionDate" : inspectionDate, "propID" : propID, "inspectionType" : inspectionType};
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url: baseUrl+"rss/bookInspection/",
    
    		type: "POST",
    
    		async: true,
    
    		data: data,
    
    		beforeSend: function() {
    
    			$(".mob-schedule-inspection").css("opacity",".4");
    
    			$(".mob-schedule-inspection").html("Scheduling...");
    
    		},
    
    		success	: function (data){
    
    			if(data == 1){
    			    
    			    $('.mobile-overlays').css('display', 'none');
    			    
                    $('body').removeClass('no-scroll');
    				
    				$('.popup-container').css("display", "block");
    				
    				$('.popup.inspection').css("display", "block");
    
    				$(".mob-schedule-inspection").css("opacity","1");
    
    				$(".mob-schedule-inspection").html("Schedule inspection");
    
    				$("#inspection_stat").val("yes");
    				
    				return false;
    
    			}else if(data == 2){
                    alert('You need to login to schedule an inspection');
    				//Redirect to login page
    				window.location.href = baseUrl+"login";
    
    			}else{
    			    
    			    $('.mobile-overlays').css('display', 'none');
    			    
                    $('body').removeClass('no-scroll');
    
    				$(".mob-schedule-inspection").css("opacity","1");
    
    				$(".mob-schedule-inspection").html("Schedule inspection");				
    
    				return false;
    
    			}				
    
    		}
    
    	});
    });
    
    
    /*var dates = $("#field-date").datepicker({
    
        numberOfMonths: 3,
    
    	showButtonPanel: true,
    
    	minDate: dateToday,
    
        onSelect: function(selectedDate) {
    
            var option = this.id == "field-date" ? "minDate" : "maxDate",
    
                instance = $(this).data("datepicker"),
    
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
    
            dates.not(this).datepicker("option", option, date);
    
        }
    
    });*/
    
    
    
    $('#fields-date').on("dp.change", function (e){
    
    	"use strict";
    
    	var todaysDate = new Date(); // Gets today's date
    	
    	var dateSelected = $(this).toLocaleDateString();
    
    	var selected = dateSelected.split("-").reverse().join("-");
    	
    	alert(selected);
    
    	
    
    	// Max date attribute is in "YYYY-MM-DD".  Need to format today's date accordingly
    
    	var year = todaysDate.getFullYear();                        // YYYY
    
    
    
    	var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);  // MM
    
    
    
    	var day = ("0" + todaysDate.getDate()).slice(-2);           // DD
    
    
    
    	//7 Days in advance day
    
    	var advDate = parseInt(todaysDate.getDate() + 7);
    
    	//alert(todaysDate.getDate() + 7);
    
    	var freePass = "";
    
    
    
    	if(parseInt(advDate) > parseInt(31)){
    
    
    
    		if((todaysDate.getMonth() + 1) == parseInt(12)){
    
    			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
    			year++;
    
    			day = advDate - parseInt(31);
    
    			day = ("0" + day).slice(-2);
    
    			freePass = "ok";
    
    		}else if((todaysDate.getMonth() + 1) == parseInt(4) || (todaysDate.getMonth() + 1) == parseInt(6) || (todaysDate.getMonth() + 1) == parseInt(9) || (todaysDate.getMonth() + 1) == parseInt(11)){
    
    
    
    			day = advDate - parseInt(30);
    
    			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
    			day = advDate - parseInt(30);
    
    			day = ("0" + day).slice(-2);
    
    
    
    		}else if(todaysDate.getMonth() == parseInt(4)){
    
    			day = advDate - parseInt(30);
    
    			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
    			day = ("0" + (advDate - parseInt(28))).slice(-2);	
    
    
    
    		}else if(todaysDate.getMonth() < parseInt(12)){
    
    			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
    			day = advDate - parseInt(31);
    
    			day = ("0" + day).slice(-2);
    
    		}else{
    
    			month = ("0" + (todaysDate.getMonth() + 2)).slice(-2);
    
    			year++;
    
    			day = advDate - parseInt(31);
    
    			day = ("0" + day).slice(-2);
    
    		}
    
    	}else{				
    
    		day = ("0"+advDate).slice(-2);				
    
    	}
    
    
    
    	var todaysD = day +""+ month +""+ year; // Results in "YYYY-MM-DD" for today's date
    
    
    
    	var stripped = selected.replace(new RegExp('-', 'g'),"");
    
    	// Now to set the max date value for the calendar to be today's date
    
    	// Strip the selected dates into DD MM and YYYY
    
    	var selectedDD =  parseInt(stripped.substring(0, 2));
    
    	var selectedMM =  parseInt(stripped.substring(2, 4));
    
    	var selectedYYYY =  parseInt(stripped.substring(4, 8));
    
    	// Strip the future dates into DD MM and YYYY
    
    	var futureDD =  parseInt(todaysD.substring(0, 2));
    
    	var futureMM =  parseInt(todaysD.substring(2, 4));
    
    	var futureYYYY =  parseInt(todaysD.substring(4, 8));
    
    
    
    	/*if(futureMM > selectedMM){
    
    	   alert(futureMM);
    
    	   return false;
    
    	}*/
    
    
    
    	if(futureDD < selectedDD && futureMM > selectedMM && futureYYYY == selectedYYYY){
    
    		//Do nothing
    
    		$(".appender").remove();
    
    	}else if(futureDD >= selectedDD && futureMM == selectedMM && futureYYYY == selectedYYYY){
    
    		//Do nothing
    
    		$(".appender").remove();
    
    	}else{
    
    		//alert(futureYYYY+" - "+selectedYYYY);
    
    		//Report Error
    
    		$(".appender").remove();
    
    		$('.flatpickr-wrapper').append('<span class="appender" style="font-size:12px;font-weight:bold;color:#f00">Inspection date cannot be more than 7 days</span>');
    
    		$(this).val("");
    
    		return false;
    
    	}
    
    });
    
});
