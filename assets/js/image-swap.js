// JavaScript Document
$('.thumb-item').click(function(){
	"use strict";
	var imgUrl = $(this).attr('id');
	$('.main-img').html('<img src="'+imgUrl+'" />');
});