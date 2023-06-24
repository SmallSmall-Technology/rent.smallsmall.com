1// JavaScript Document

$('#studio').click(function(){

	"use strict";

	$('.option-item').removeClass('active-option-item');

	$(this).addClass('active-option-item');

	$('.all-props').hide();
	
	$('.studio').show();	

});

$('#popular').click(function(){

	"use strict";

	$('.option-item').removeClass('active-option-item');

	$(this).addClass('active-option-item');

	$('.all-props').hide();
	
	$('.popular').hide();
	
	$('.popular').css("display", "flex");
	

});

$('#shared').click(function(){

	"use strict";

	$('.option-item').removeClass('active-option-item');

	$(this).addClass('active-option-item');

	$('.all-props').hide();

	$('.shared').hide();
	
	$('.shared').css("display", "flex");	

});

$('#new').click(function(){

	"use strict";

	$('.option-item').removeClass('active-option-item');

	$(this).addClass('active-option-item');

	$('.all-props').hide();

	$('.new').hide();
	
	$('.new').css("display", "flex");

	//$('.new').show();	

});

$('.more-locations').click(function(){
    
    $('.location-show-few').css('height', 'auto');
    
    $('.location-show-few').css('overflow', 'auto');
    
    $('.more-locations').hide();
    
    $('.less-locations').show();
    
});

$(document).on('click', '.less-locations', function(){
    
    $('.location-show-few').css('height', '270px');
    
    $('.location-show-few').css('overflow', 'hidden');
    
    $('.less-locations').hide();
    
    $('.more-locations').show();
    
});