// JavaScript Document
$('#rent-now-web').click(function(){	
	"use strict";
		$('#inspect-now-web').removeClass('active');
		$('#rent-now-web').addClass('active');
		$('.inspection-form').hide(600);
		$('.rent-form').show(600);
	});
$('#inspect-now-web').click(function(){
	"use strict";
	$('#rent-now-web').removeClass('active');
	$('#inspect-now-web').addClass('active');
	$('.inspection-form').show(600);
	$('.rent-form').hide(600);
});

$('#rent-now-mobile').click(function(){	
	"use strict";
		$('#inspect-now-mobile').removeClass('active');
		$('#rent-now-mobile').addClass('active');
		$('.inspection-form').hide(600);
		$('.rent-form').show(600);
	});
$('#inspect-now-mobile').click(function(){
	"use strict";
	$('#rent-now-mobile').removeClass('active');
	$('#inspect-now-mobile').addClass('active');
	$('.inspection-form').show(600);
	$('.rent-form').hide(600);
});