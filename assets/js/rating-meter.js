$(function() {

	$(".rating-progress").each(function() {

    	var value = $(this).attr('data-value');
    	var left = $(this).find('.rating-progress-left .rating-progress-bar');
    	var right = $(this).find('.rating-progress-right .rating-progress-bar');

    	if (value > 0) {
    	    
    		if (value <= 50) {
    		    
        		right.css('transform-duration', 'rotate(' + percentageToDegrees(value) + 'deg)');
        		
        		right.css('transition', '1s');
    		
    		} else {
    		    
        		right.css('transform', 'rotate(180deg)');
        		
        		right.css('transition-duration', '1s');
        		
        		left.css('transition-delay', '1s');
        		
        		left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)');
        		
        		left.css('transition-duration', '.3s');
    		
    		}
    		
    	}

	})

	function percentageToDegrees(percentage) {

		return percentage / 100 * 360

	}

});