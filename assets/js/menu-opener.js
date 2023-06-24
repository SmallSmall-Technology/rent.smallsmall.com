// JavaScript Document
$('.mobile-menu').click(function(){
    
	"use strict";
	
	if ($('.menu').is(':hidden') ) {
	    
		$('.menu').slideDown();

	}else {
	    
		$('.menu').slideUp();

	}
});

$('#dash-mobile-menu').click(function(){
    
	"use strict";
	
	if ($('.dash-menu-container').is(':hidden') ) {
	    
		$('.dash-menu-container').slideDown();

	}else {
	    
		$('.dash-menu-container').slideUp();

	}
});