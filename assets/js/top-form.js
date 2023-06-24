// JavaScript Document
$('.list-style').click(function(){	
	"use strict";
	var the_style = $(this).attr('id');
	if(the_style === 'grid'){
		$('.properties-holder').removeClass('line-properties-holder');
		$('.properties-holder').addClass('grid-properties-holder');
		$('#grid').addClass('active-style');
		$('#list').removeClass('active-style');
	}else if(the_style === 'list'){
		$('.properties-holder').addClass('line-properties-holder');
		$('.properties-holder').removeClass('grid-properties-holder');
		$('#grid').removeClass('active-style');
		$('#list').addClass('active-style');
	}
	//$('.properties-holder').remove
	//alert(the_style);
});
