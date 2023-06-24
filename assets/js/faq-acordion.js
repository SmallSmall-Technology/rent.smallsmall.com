// JavaScript Document

$('.acordion').click(function(){

	"use strict";	

	$('.acordion-content').hide(200);

	var the_id = $(this).attr("id");

	$('#content-'+the_id).show(200);

});

/*$('.tenant').click(function(){
	
}); */ 