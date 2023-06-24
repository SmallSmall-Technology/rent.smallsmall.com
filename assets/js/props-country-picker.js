// JavaScript Document
var baseUrl = "https://rent.smallsmall.com/";

$('.state').on('change', function(){

	"use strict";

	var states = $(this).val();

	var cities = "<option selected='selected'>Cities</option>";

	$('.city').html("<option selected='selected'>Loading...</option>");

	var data = {"states" : states};

	$.ajaxSetup ({ cache: false });

	$.ajax({

		url: baseUrl+"pages/get_cities/",

		secureuri : false,

		type: "POST",

		dataType : 'json',

		data: data,

		success: function(data, status, msg) {

			for(let i = 0; i < data.msg.length; i++){
			    
			    cities += '<option value="'+data.msg[i].name+'">'+data.msg[i].name+'</option>';

			}

			$('.city').html(cities);

		}

	});

});