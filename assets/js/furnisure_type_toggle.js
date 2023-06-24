// JavaScript Document
$('.option-item').click(function(){
	"use strict";
	var id = $(this).attr('id');
	$('.prop-holder').removeClass('show');
	$('.prop-holder').addClass('hide');
	$('#furnisure-'+id).removeClass('hide');
	$('#furnisure-'+id).addClass('show');
});