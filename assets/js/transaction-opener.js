// JavaScript Document
$('.open-trans').click(function(){
	"use strict";
	var id = $(this).attr("id").replace(/trans-/, "");
	$('#trans-'+id).removeClass('unopened');
	$('.trans-button-o').removeClass('opened');	
	$('.trans-button-o').html('Details <i class="fa fa-angle-down"></i>');
	$('.trans-button-o').addClass('unopened');
	$('#trans-'+id).removeClass('open-trans');
	$('#trans-'+id).addClass('opened close-trans');
	$('.trans-details').hide(400);
	$('#trans-details-'+id).show(400);
	$('#trans-'+id).html('Details <i class="fa fa-angle-up"></i>');
});

$('.close-trans').bind('click', function(){
	"use strict";
	var id = $(this).attr("id").replace(/trans-/, "");
	$('#trans-'+id).removeClass('opened');
	$('#trans-'+id).removeClass('open-trans');
	$('#trans-'+id).addClass('unopened close-trans');
	$('#trans-'+id).html('Details <i class="fa fa-angle-down"></i>');
});