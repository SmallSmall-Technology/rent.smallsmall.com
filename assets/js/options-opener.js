// JavaScript Document
$('.mobile-opener').click(function(){
	"use strict";
	if ($('.options').is(':hidden') ) {
		$('.options').slideDown();

	}else {
		$('.options').slideUp();

	}
});