// JavaScript Document

$('.more-locs').click(function() {

  $('.more-less-city-container').css('height', 'auto');

  $('.more-less-city-container').css('overflow', 'auto');

  $('.more-locs').hide();

  $('.less-locs').show();

});
$('.less-locs').click(function() {

  $('.more-less-city-container').css('height', '130px');

  $('.more-less-city-container').css('overflow', 'hidden');

  $('.less-locs').hide();

  $('.more-locs').show();

});
$('.sort_search_categories').click(function(){

	"use strict";

	$('.filter-pane').slideDown(400);

	$('.properties-holder').slideUp(400);

});
$('.advanced-filter-tab').click(function(){

	"use strict";

	if($('.advanced-filter-pane').is(":hidden")){
	    $('.advanced-filter-pane').slideDown();
	}else{
	    $('.advanced-filter-pane').slideUp();
	}

});
$('.filter-city-items').click(function(){

	"use strict";

	$('.filter-city-items').removeClass('selected-city');

	$(this).addClass('selected-city');
	
	var option = $(this).attr("id");
	
	$("#search-city").val(option);

});

$('.apt-type').click(function(){

	"use strict";

	$('.apt-type').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#property_type").val(option);

});

$('.bedroom-num').click(function(){

	"use strict";

	$('.bedroom-num').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#bed_num").val(option);

});

$('.bathroom-num').click(function(){

	"use strict";

	$('.bathroom-num').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#bath_num").val(option);

});

$('.gender-type').click(function(){

	"use strict";

	$('.gender-type').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#renting_as").val(option);

});

$('.furnishing').click(function(){

	"use strict";

	$('.furnishing').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#furnishing").val(option);

});

$('.apt-availability').click(function(){

	"use strict";

	$('.apt-availability').removeClass('selected-filter-option');

	$(this).addClass('selected-filter-option');
	
	var option = $(this).attr("id");
	
	$("#availability_val").val(option);

});