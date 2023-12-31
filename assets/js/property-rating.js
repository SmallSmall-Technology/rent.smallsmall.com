//Javascript Document
var baseUrl = "https://rent.smallsmall.com/";

$('.satifaction-option').click(function(){
    
    var id = $(this).attr('id').replace(/satifaction-option-/, '');
    
    $('.satifaction-option').removeClass('picked-item');
    
    $('#satifaction-option-'+id).addClass('picked-item');
    
    $('#satisfaction-value').val(id);
    
    return false;
    
});

$('.grade-option').click(function(){
    
    var id = $(this).attr('id').replace(/grade-option-/, '');
    
    $('.grade-option').removeClass('picked-box');
    
    $('#grade-option-'+id).addClass('picked-box');
    
    $('#grade-value').val(id);
    
    return false;
    
});

$('#ratingForm').submit(function(e){
    
    e.preventDefault();
    
    var grading = $('#grade-value').val();
    
    var satisfaction = $('#satisfaction-value').val();
    
    var propertyID = $('#property_id').val();
    
    var ratingNote = $('#rating-note').val();
    
    $('.rating-btn').val('Submitting');
    
    if(grading == "" || satisfaction == ""){
        
        $('.result-bar').fadeIn();
        
        $('.result-bar').html("You need to rate us to proceed");
			    
	    $('.result-bar').removeClass('green-bg');
	    
	    $('.result-bar').addClass('red-bg');
	    
	    $('.repair-btn').val('Submit');
	            
	    window.scrollTo(0, 0);
        
        return false;
    }
    
    if(propertyID == ""){
        
        $('.result-bar').fadeIn();
        
        $('.result-bar').html("You are not a renting subscriber");
			    
	    $('.result-bar').removeClass('green-bg');
	    
	    $('.result-bar').addClass('red-bg');
	    
	    $('.repair-btn').val('Submit');
	            
	    window.scrollTo(0, 0);
        
        return false;
    }
    
    var data = {"grading" : grading, "satisfaction" : satisfaction, "propertyID" : propertyID, "ratingNote" : ratingNote};
    
    $.ajaxSetup ({ cache: false });

	$.ajax({			

		url: baseUrl+"rss/sendRating/",

		type: "POST",
		
		data : data,

		success: function(data) {

			if(data){
	    
	            $('.result-bar').fadeIn();
			    
			    $('.result-bar').html("Successfully submitted");
			    
			    $('.result-bar').removeClass('red-bg');
			    
			    $('.result-bar').addClass('green-bg');
			    
			    $('.grade-option').removeClass('picked-box');
			    
			    $('.satifaction-option').removeClass('picked-item');
			    
			    $('#rating-note').val('');
			    
			    $('.rating-btn').val('Submit');
	            
	            window.scrollTo(0, 0);
			    
			}else{
	    
	            $('.result-bar').fadeIn();
			    
			    $('.result-bar').html("Error inserting data");
			    
			    $('.result-bar').removeClass('green-bg');
			    
			    $('.result-bar').addClass('red-bg');
	            
	            window.scrollTo(0, 0);
	            
	            $('.rating-btn').val('Submit');
	            
	            return false;
			    
			}

		}

	});
    
});