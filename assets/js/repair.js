//Javascript document
var baseUrl = "https://rent.smallsmall.com/";

$('#repairForm').submit(function(e){
    
    e.preventDefault();
    
    var repairCat = $('.repair-category').val();
    
    var repairNote = $('.repair-note').val();
    
    var propertyID = $('#property_id').val();
    
    $('#repair-btn').val('Submitting...');
    
    if(!$('.result-bar').is(':hidden')){
        
        $('.result-bar').fadeOut();
        
    }
    
    if(repairCat == ''){
	    
	    $('.result-bar').fadeIn();
        
        $('.repair-category').css('border', '1px solid red');
        
        $('.result-bar').html("Please select a category");
	    
	    $('.result-bar').addClass('red-bg');
			    
	    $('.result-bar').removeClass('green-bg');
    
        $('#repair-btn').val('Submit request');
	    
        return false;
    }
    
    if(repairNote == ''){
	    
	    $('.result-bar').fadeIn();
        
        $('.repair-note').css('border', '1px solid red');
        
        $('.result-bar').html("Please fill in details of the repair");
			    
	    $('.result-bar').removeClass('green-bg');
	    
	    $('.result-bar').addClass('red-bg');
	    
	    $('#repair-btn').val('Submit request');
        
        return false;
    }
    
    var data = {"repairCat" : repairCat, "repairNote" : repairNote, "propertyID" : propertyID};
    
    $.ajaxSetup ({ cache: false });

	$.ajax({			

		url: baseUrl+"rss/sendRepair/",

		type: "POST",
		
		data : data,

		success: function(data) {

			if(data){
	    
	            $('.result-bar').fadeIn();
			    
			    $('.result-bar').html("Successfully submitted");
			    
			    $('.result-bar').removeClass('red-bg');
			    
			    $('.result-bar').addClass('green-bg');
			    
			    $('.repair-category').val('');
			    
			    $('.repair-note').val('');
			    
			    $('#repair-btn').val('Submit request');
			    
			}else{
	    
	            $('.result-bar').fadeIn();
			    
			    $('.result-bar').html("Error inserting data");
			    
			    $('.result-bar').removeClass('green-bg');
			    
			    $('.result-bar').addClass('red-bg');
	            
	            $('#repair-btn').val('Submit request');
			    
			}

		}

	});
});