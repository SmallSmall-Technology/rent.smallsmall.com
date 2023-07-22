// JavaScript Document

var baseUrl = "https://dev-rent.smallsmall.com/";


$('.state-btn').on('click', function(){

	"use strict";
	
	var state_id = $(this).attr('id');
	
	$('.state-btn').removeClass('active-btn');
	
	var cities = "<option selected='selected'>Location</option>";

	$('.cities').html("<option selected='selected'>Loading...</option>");

	var data = {"states" : state_id};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"pages/get_cities/",

		secureuri : false,

		type: "POST",

		dataType : 'json',

		data: data,

		success: function(data, status, msg) {
		    
		    for(let i = 0; i < data.msg.length; i++){

				cities += '<option value="'+data.msg[i].id+'">'+data.msg[i].name+'</option>';

			}
			
			$('#'+state_id).addClass('active-btn');

			$('.cities').html(cities);

		}

	});

});

$('.mob-state-btn').on('click', function(){

	"use strict";
	
	var state_id = $(this).attr('id');
	
	$('.mob-state-btn').removeClass('active-btn');
	
	var cities = "<option selected='selected'>Location</option>";

	$('.mob_cities').html("<option selected='selected'>Loading...</option>");

	var data = {"states" : state_id};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"pages/get_cities/",

		secureuri : false,

		type: "POST",

		dataType : 'json',

		data: data,

		success: function(data, status, msg) {
		    
		    for(let i = 0; i < data.msg.length; i++){

				cities += '<option value="'+data.msg[i].id+'">'+data.msg[i].name+'</option>';

			}
			
			$('#'+state_id).addClass('active-btn');

			$('.mob_cities').html(cities);

		}

	});

});
