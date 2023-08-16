// JavaScript Document
$(window).on('load', function(){

	"use strict";

	var baseUrl = "https://rent.smallsmall.com/";

	var distance = "";

	var theCat = "";

	$.ajaxSetup ({ cache: false });
	
	$.ajax({			

			url: baseUrl+"admin/getDistance/",

			type: "POST",

			dataType : 'json',
			
			success: function(data) {

				//alert(data.status+' : '+data.msg);

				//distance = data.msg;

				var result = data;

		

				//console.log(result.msg[0].distance);

				for(let i = 0; i < result.msg.length; i++){

					distance += '<option value="'+result.msg[i].distance+'">'+result.msg[i].distance+'</option>';

				}

				//distance = result.msg[0].distance;

			}

	});

	$.ajaxSetup ({ cache: false });

	$.ajax({			

			url: baseUrl+"admin/getCategory/",

			type: "POST",

			dataType : 'json',

			beforeSend: function() {



			},

			success: function(data) {

				//alert(data.status+' : '+data.msg);

				//distance = data.msg;

				var results = data;

		

				//console.log(result.msg[0].distance);

				for(let i = 0; i < results.msg.length; i++){

					theCat += '<option value="'+results.msg[i].category+'">'+results.msg[i].category+'</option>';

				}

				//distance = result.msg[0].distance;

			}

	});

	
	$(document).on('change','.payment-plan',function(){
		
		var p_plan = $('.payment-plan').val();
		
		if(p_plan == 'yes'){
			
		   $('.payment-plan-period-spc').show();
			
		}else{
			
			$('.payment-plan-period-spc').hide();
			
		}
	});


	$("#live_search").keyup(function(){

		var input = $(this).val();

		if(input != "")
		{
			$.ajax({

				url: baseUrl + "admin/proptySearch/",
				type: "POST",
				data: {input:input},
	
				success: function (data) {
					
					$("#searchresult").css("display", "block");
					$("#searchresult").html(data);

				}
	
			});
		}

		else
		{
			$("#searchresult").css("display", "none");
		}
	});

	$('.delete-agr').click(function () {

		var the_ids = $(this).attr("id").replace(/booking-/, "").split("-");

		var bookingID = the_ids[0];

		var propertyID = the_ids[1];

		$(this).html('Wait...');

		var data = { "bookingID": bookingID, "propertyID": propertyID };

		if (confirm("Are you sure you want to DELETE Agreement?")) {

			$.ajaxSetup({ cache: false });

			$.ajax({
				url: baseUrl + "admin/deleteAgreement",

				type: "POST",

				async: true,

				data: data,

				success: function (data) {

					if (data == 1) {

						alert("Agreement Deleted!");

						$(this).html('Delete');

						location.reload(true);
					} else {

						alert("Error Deleting!!!");

						$(this).html('Delete');

						return false;
					}

				}
			});
		} else {

			$(this).html('Delete');

			return false;

		}

	});

	
	$('.checkagr').click(function () {

		var the_ids = $(this).attr("id").replace(/getVal-/, "").split("-");

		var id = the_ids[0];

		var title = the_ids[1];

		let inputId = document.getElementById("sub-propty");
		
		let inputTitle = document.getElementById("live_search")

		inputId.value = id;
		inputTitle.value = title;

		alert('hello');

	});
	

	$('.close-msg').click(function(){

		$('.error-msg').slideUp(500);

	});

	$('.initiate-payment').click(function(){
	    
	     $(this).html('Initiating...');
	     
	     var ids = $(this).attr("id").split("-");
	     
	     var bookingID = ids[0];
	     
	     var propertyID = ids[1];
	     
	     var userID = ids[2];
	     
	     var verID = ids[3];
	     
	     $('#user-id-float').val(userID);
	     
	     $('#prop-id-float').val(propertyID);
	     
	     $('#booking-id-float').val(bookingID);
	     
	     $('#verification-id-float').val(verID);
	     
	     
	     $(this).html('Initiate payment');
	     
	     $('#paymentModal').css("display", "block");
	     
	     $('#paymentModal').addClass('show');
	     
	});
	$(document).on('click', '.lock-transaction', function(){
	    
	    $('.lock-transaction').html("Wait...");
	    
	    var user_id = $('#user-id-float').val();
	     
	    var prop_id = $('#prop-id-float').val();
	    
	    var payment_month = $('#payment-month').val();
	     
        var booking_id = $('#booking-id-float').val();
        
        var ver_id = $('#verification-id-float').val();
	     
        var rent_due = $('#rent-due-float').val();
	     
        var tnx_date = $('#tnx-date-float').val();
        
        var rent_amount = $('#rent-amount-float').val();
	     
        var security_deposit = $('#sec-dep-float').val();
	     
        var sec_dep_term = $('#sec-dep-term').val();
        
        var duration = $('.duration-float').val();
        
        var payment_lvl = $('input[name="lvl-payment"]:checked').val();
        
        //alert(user_id+'/'+prop_id+'/'+booking_id+'/'+duration);
        
        var data = { "userID" : user_id, "propID" : prop_id, "bookingID" : booking_id, "duration" : duration, "rentDue" : rent_due, "verID" : ver_id, "security_deposit" : security_deposit, "sec_dep_term" : sec_dep_term, "tnx_date" : tnx_date, "rent_amount" : rent_amount, "payment_month" : payment_month, "payment_lvl" : payment_lvl };
	    
	    //Get transaction information
	     $.ajaxSetup ({ cache: false });
         $.ajax({			
        
    		url: baseUrl+"admin/lockTransaction/",
    		type: "POST",
    		data : data,
    		
    		success: function(data) {
    		    
    			if(data == 1){
    			    
    			    alert("Transaction initiated!!!");
    			    
    			    $('#paymentModal').css("display", "none");
	     
	                $('#paymentModal').removeClass('show');
	                
	                $('.lock-transaction').html("Save Changes");
	                
	                return false;
    			}else{
    			    
    			    alert("Error initiating transaction");
    			    
    			    $('.lock-transaction').html("Save Changes");
    			    
    			}
    
    		}
        
        });
	});
	
	$('.close').click(function(){
	    
	     $('#paymentModal').css("display", "none");
	     
	     $('#paymentModal').removeClass('show');
	});
	
	$('.close-payment-modal').click(function(){
	    
	     $('#paymentModal').css("display", "none");
	     
	     $('#paymentModal').removeClass('show');
	});

	$('#adminLoginForm').submit(function(e){

		

		e.preventDefault();

		$('#login-but').html('Wait...');

		$('.error-msg').slideUp(500);

		

		var username = $('.adminUsername').val();

		var password = $('.adminPassword').val();

		//var url = $('.url').val();

			

		//var emptyValues = [];

		var filteredList = $('.login-txt-f').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			$('#login-but').html('Login');
			
			return false;

		}

		 var data = {

            'username' : username,

            'password' : password

        };

        $.ajaxSetup ({ cache: false });

        $.ajax({

            url: baseUrl+"admin/login_admin/",

            type: "POST",

            async: true,

            data: data,

            success: function(data) {

				if(data == 0){

					$('.msg-fb').html("User does not exist.");

                	$('.error-msg').slideDown(500);
					
					$('#login-but').html('Login');

					return false;

				}else{

					data = $.trim(data);

					window.location.href = baseUrl+""+data;	

				}

            },

            error: function() {

                //modalAjaxError('openLogIn');

				$('.msg-fb').html("Error!!!");
				
				$('#login-but').html('Login');

                $('.error-msg').slideDown(500);

            }

        });

	});


	$('#adminSignupForm').submit(function(e){

	    e.preventDefault();

		$("#add-admin-but").html("Sending...");

	    var fname = $('#fname').val();

	    var lname = $('#lname').val();

	    var email = $('#email').val();

	    var access = $('#userAccess').val();

	    var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');



			filteredList.css("border","2px solid rgba(251,1,1,0.5)");
			
			$("#add-admin-but").html("Submit");

			return false;

		}

		var data = {

			'fname' : fname,

			'lname' : lname,

			'email' : email,

			'userAccess' : access

		};

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/addAdmin/",

			type: "POST",

			async: true,

			data: data,

			dataType : 'json', 

			success	: function (data){			

				if(data.status == 'error'){					

					alert("Upload error: "+data.msg);
					
					$("#add-admin-but").html("Submit");

					return false;					

				}else if(data.status == 'success'){				    

				    alert("Admin Successfully Added!");
				    
				    $("#add-admin-but").html("Submit");

				    $(".verify-txt").val("");			    

				}			

			}

		});

	});	
	
	$('#landlordForm').submit(function(e){

	    e.preventDefault();

		$("#add-admin-but").html("Sending...");

	    var fname = $('#fname').val();

	    var lname = $('#lname').val();

	    var email = $('#email').val();

	    var phone = $('#phone').val();

	    var gender = $('#gender').val();

	    var rep_name = $('#rep_name').val();

	    var rep_email = $('#rep_email').val();

	    var rep_phone = $('#rep_phone').val();

	    var referral = $('#referral').val();
	    
	    var landlord_type = $('#landlord-type').val();
	    
	    

	    var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');



			filteredList.css("border","2px solid rgba(251,1,1,0.5)");
			
			$("#add-admin-but").html("Submit");

			return false;

		}

		var data = {

			'fname' : fname,

			'lname' : lname,

			'phone' : phone,

			'email' : email,

			'gender' : gender,
			
			'rep_name' : rep_name,
			
			'rep_phone' : rep_phone,
			
			'rep_email' : rep_email,
			
			'referral' : referral,
			
			'landlord_type' : landlord_type

		};

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/addLandlord/",

			type: "POST",

			async: true,

			data: data, 

			success	: function (data){			

				if(data == 0){					

					alert("Upload error: "+data);
					
					$("#add-admin-but").html("Submit");

					return false;					

				}else{				    

				    alert("Landlord Successfully Added!");
				    
				    $("#add-admin-but").html("Submit");

				    $(".form-control").val("");			    

				}			

			}

		});

	});	

	$('#createCategory').submit(function(e){

		e.preventDefault();

		var category = $('#category').val();

		var parent = $('#catSelect').val();

		var catImage = $('#userfile').val();

		var imgContent = 0;

		if(catImage){

		   imgContent = 1;

		}

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'category' : category,

			'parent' : parent,

			'imgContent' : imgContent

		};

		$.ajaxFileUpload({

			url : baseUrl+'admin/createCat/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			success	: function (data, status, msg){

			

				if(data.status !== 'error'){

					alert(data.msg);

					location.reload(true);

				}else{

					alert(data.msg);

					return false;

				}

				

			},

			error: function() {

				//modalAjaxError('openLogIn');

				return false;

			}

		});

		

	});

	

	$('.delete-cat').click(function(){

		

		var id = $(this).attr('id').split('-');

		var catID = id[0];

		var catImg = '';

		

		if(id[1]){

			catImg = id[1];

		}

		

		var data = {

			'categoryID' : catID,

			'catImage' : catImg

		};

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/deleteCat/",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {



			},

			success: function(data) {

				if(data == 1){

					alert('Category deleted!');

					location.reload(true);

				}else{

					alert('Could not delete category.');

					location.reload(true);

				}

			},

			error: function() {

				return false;

			}

		});

		

	});

	$('.delete-tax').click(function(){

		

		var id = $(this).attr('id');

				

		var data = {

			'taxID' : id

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/deleteTax/",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {



			},

			success: function(data) {

				if(data == 1){

					alert('Deleted!');

					location.reload(true);

				}else{

					alert('Error deleting!');

					location.reload(true);

				}

			},

			error: function() {

				return false;

			}

		});

		

	});	

	$('#colorForm').submit(function(e){

		e.preventDefault();

		

		var color = $('#colorName').val();

		var hexCode = $('#hexCode').val();

		//var imgContent = 0;

		//if(catImage){

		   //imgContent = 1;

		//}

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		alert(color+' - '+hexCode);

		var data = {

			'color' : color,

			'hexCode' : hexCode

		};

		

		$.ajaxFileUpload({

			url : baseUrl+'admin/insertColor/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			success	: function (data, status, msg){

			

				if(data.status !== 'error'){

					alert(data.msg);

					location.reload(true);

				}else{

					alert(data.msg);

					return false;

				}

				

			},

			error: function() {

				//modalAjaxError('openLogIn');

				return false;

			}

		});

		

	});

	

	$('#sizeForm').submit(function(e){

		e.preventDefault();

		

		var size = $('#size').val();

		var desc = $('#desc').val();

		

		//alert(size+' - '+desc);

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'size' : size,

			'desc' : desc

		};

		

		$.ajaxFileUpload({

			url : baseUrl+'admin/insertSize/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			success	: function (data, status, msg){			

				if(data.status !== 'error'){

					alert(data.msg);

					location.reload(true);

				}else{

					alert(data.msg);

					return false;

				}				

			},

			error: function() {

				//modalAjaxError('openLogIn');

				return false;

			}

		});

		

	});

	$('.delete-color').click(function(){

	

		var colorID = $(this).attr('id');

				

		var data = {

			'colorID' : colorID

		};

		if(confirm("Confirm action...")){

			$.ajaxSetup ({ cache: false });

			$.ajax({

				url: baseUrl+"admin/deleteColor/",

				type: "POST",

				async: true,

				data: data,

				beforeSend: function() {



				},

				success: function(data) {

					if(data == 1){

						alert('Deleted!');

						location.reload(true);

					}else{

						alert('Could not delete color.');

						location.reload(true);

					}

				},

				error: function() {

					return false;

				}

			});

		}

	});

	

	$('.delete-size').click(function(){

	

		var sizeID = $(this).attr('id');

				

		var data = {

			'sizeID' : sizeID

		};

		if(confirm("Confirm action...")){

			$.ajaxSetup ({ cache: false });

			$.ajax({

				url: baseUrl+"admin/deleteSize/",

				type: "POST",

				async: true,

				data: data,

				beforeSend: function() {



				},

				success: function(data) {

					if(data == 1){

						alert('Deleted!');

						location.reload(true);

					}else{

						alert('Could not delete color.');

						location.reload(true);

					}

				},

				error: function() {

					return false;

				}

			});

		}

		

	});

	$('.delete-cost').click(function(){

	

		var costID = $(this).attr('id');

				

		var data = {

			'costID' : costID

		};

		if(confirm("Confirm action...")){

			$.ajaxSetup ({ cache: false });

			$.ajax({

				url: baseUrl+"admin/deleteShippingCost/",

				type: "POST",

				async: true,

				data: data,

				beforeSend: function() {



				},

				success: function(data) {

					if(data == 1){

						alert('Deleted!');

						location.reload(true);

					}else{

						alert('Could not delete color.');

						location.reload(true);

					}

				},

				error: function() {

					return false;

				}

			});

		}

		

	});

	$('.delete-method').click(function(){

	

		var methodID = $(this).attr('id');

				

		var data = {

			'methodID' : methodID

		};

		if(confirm("Confirm action...")){

			$.ajaxSetup ({ cache: false });

			$.ajax({

				url: baseUrl+"admin/deleteShippingMethod/",

				type: "POST",

				async: true,

				data: data,

				beforeSend: function() {



				},

				success: function(data) {

					if(data == 1){

						alert('Deleted!');

						location.reload(true);

					}else{

						alert('Could not delete color.');

						location.reload(true);

					}

				},

				error: function() {

					return false;

				}

			});

		}

		

	});

	$('#createShippingCost').submit(function(e){

		e.preventDefault();

		

		var shippingState = [];

		var cost = $('#cost').val();

		

		shippingState = $('#state-list .eachState').map(function(){

	    	return $(this).attr('id');

	  	}).get();



		if(shippingState.length < 1){

			$('#shippingState').css("border","2px solid rgba(251,1,1,0.5)");

			alert("Pick min of one state from list");

			return false;

		}

		

		var data = {

			'shippingState' : shippingState.toString(),

			'cost' : cost

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/createShippingCost/",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {



			},

			success: function(data) {

				if(data == 1){

					alert('Shipping cost inserted');

					location.reload(true);

				}else{

					alert('Error inserting cost.');

					location.reload(true);

				}

			},

			error: function() {

				return false;

			}

		});

		

	});

	$('#createShippingMethod').submit(function(e){

		e.preventDefault();

		

		var method = $('#method').val();

		var cost = $('#cost').val();

		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'method' : method,

			'cost' : cost

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/createShippingMethod/",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {



			},

			success: function(data) {

				if(data == 1){

					alert('Shipping method inserted');

					location.reload(true);

				}else{

					alert('Error inserting method.');

					location.reload(true);

				}

			},

			error: function() {

				return false;

			}

		});

		

	});

	$('#createTax').submit(function(e){

		e.preventDefault();

		

		var taxName = $('#taxName').val();

		var taxRate = $('#taxRate').val();

		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.error-msg').slideDown(500);

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'taxName' : taxName,

			'taxRate' : taxRate

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/createTax/",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {



			},

			success: function(data) {

				if(data == 1){

					alert('Tax Rate Inserted!');

					location.reload(true);

				}else{

					alert('Error Tax Rate!');

					location.reload(true);

				}

			},

			error: function() {

				alert("Error!!!");

				return false;

			}

		});

		

	});

	$('#productForm').on('submit', function(e){

		e.preventDefault();

		

		

		var productTitle = $.trim($('.productTitle').val());

		var productDesc = $('.productDesc').val();

		var productCat = $('.productCat').val();

		var prodPrice = $('.prodPrice').val();

		var salesPrice = $('.salesPrice').val();

		var customLnk = $.trim($('.customLnk').val());

		var newProd = "";

		if($("input[name='newProd']:checked")){

			newProd = "Yes";

		}else{

			newProd = "No";

		}

		var pickedColors = $.trim($('.pickedColors').val());

		var pickedSizes = $.trim($('.pickedSizes').val());

		var skuNumber = $.trim($('.skuNumber').val());

		var stockQty = $.trim($('.stockQty').val());

		var foldername = $.trim($('.folderName').val());

		var featuredPic = $.trim($('.featuredPic').val());

		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'productTitle' : productTitle,

			'productDesc' : productDesc,

			'productCat' : productCat,

			'prodPrice' : prodPrice,

			'salesPrice' : salesPrice,

			'customLnk' : customLnk,

			'newProd' : newProd,

			'pickedColors' : pickedColors,

			'pickedSizes' : pickedSizes,

			'skuNumber' : skuNumber,

			'stockQty' : stockQty,

			'foldername' : foldername,

			'featuredPic' : featuredPic

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/upload_product",

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.prodAddBut').addClass('disabled');

			},

			success	: function (data){



				if(data == 1){

					$('.form-result').html('<div class="alert alert-info alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Upload Successful</div>');

					$('.prodAddBut').removeClass('disabled');

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Couldn\'t Upload to DB</div>');

					$('.prodAddBut').removeClass('disabled');

				}				

			},

			error: function() {

				$('.prodAddBut').removeClass('disabled');

				return false;

			}

		});

		

	});

	

	$('#amenityFloat').on('submit', function(e){

		

		e.preventDefault();

		

		var title = $('#title').val();

		var amenity_type = $('#amenityType').val();

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'title' : title,

			'amenity_type' : amenity_type

		};

		

		$.ajaxFileUpload({

			url : baseUrl+'admin/createAmenity/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data, status, msg){



				if( data.status == 'error' ){

					$('.amenity-but').html("Upload Amenity");

					alert("Image upload error: "+data.msg);

					return false;

				}else if( data.status == 'success'){

					alert("successful!");

					location.reload();

				}



			}

		});

	});

	$('#fCFloat').on('submit', function(e){

		

		e.preventDefault();

		

		var category = $('#category').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'category' : category

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createFacilityCategory/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	$('#nDFloat').on('submit', function(e){

		

		e.preventDefault();

		

		var distance = $('#distance').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'distance' : distance

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createNeighborhoodDistance/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					$('.amenity-but').html('Upload Distance');

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	$('#aTFloat').on('submit', function(e){

		

		e.preventDefault();

		

		var category = $('#category').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'category' : category

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createAptType/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	$('#rentTypeFloat').on('submit', function(e){

		

		e.preventDefault();

		

		var rent_type = $('#rent_type').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'rent_type' : rent_type

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createRentType/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	//listner for the payment plan dropdown menu

	$('.payment-plan').change(function(){

		

		var pPlan = $('#payment-plan').val();

		

		if(pPlan === "upfront"){

			

		   	$(".rent-freq-row").hide();

			

		}else if(pPlan === "flexible"){

			

			$(".rent-freq-row").show();

			

		}

	});

	//listener for the payment interval dropdown menu

	$('#pay-interval').change(function(){

		

		var theval = "";

		var pPlan = $('#pay-interval').val();

		

		if(pPlan == "Monthly"){

			theval = "Monthly";

		}else if(pPlan == "Quarterly"){

			theval = "Quarterly";

		}else if(pPlan == "Bi-annually"){

			theval = "Bi-annually";

		}else if(pPlan == "Upfront"){

			theval = "Upfront";

		}

		

		//$("#payment-int-txt").append(pPlan+"-");

		

		$("#pay-interval option[value='"+pPlan+"']").hide();

		

		$('.payment-interval-options').append('<span class="chosen" id="int-'+pPlan+'"><input class="allInts" type="hidden" value="'+pPlan+'" /><span class="close close-int" id="'+pPlan+'">x</span><span class="text">'+theval+'</span>');

	});

$(document). on('click', '.close-int', function(){

		var theval = "";

		var id = $(this).attr("id");

		

		if(id == "Monthly"){

			theval = "Monthly";

		}else if(id == "Quarterly"){

			theval = "Quarterly";

		}else if(id == "Bi-annually"){

			theval = "Bi-Annually";

		}else if(id == "Upfront"){

			theval = "Upfront";

		}

			

		$("#pay-interval option[value='"+theval+"']").show();

		$("#int-"+id).remove();	

	});

	

	//listner for the rent frequency dropdown menu

	$('#rent-freq').change(function(){

		

		var theval = "";

		var rfeq = parseInt($('#rent-freq').val());

		

		if(rfeq === 1){

			theval = "One Month";

		}else if(rfeq === 3){

			theval = "Three Months";

		}else if(rfeq === 6){

			theval = "Six Months";

		}else if(rfeq === 9){

			theval = "Nine Months";

		}else if(rfeq === 12){

			theval = "Twelve Months";

		}

		

		$("#rent-freq option[value='"+rfeq+"']").hide();

		$('.payment-frequency-options').append('<span class="chosen" id="freq-'+rfeq+'"><input class="allFreq" type="hidden" value="'+rfeq+'" /><span class="close close-freq" id="'+rfeq+'">x</span><span class="text">'+theval+'</span>');

	});

	$(document). on('click', '.close-freq', function(){

		var theval = "";

		var id = parseInt($(this).attr("id"));

		

		if(id === 1){

			theval = "One Month";

		}else if(id === 3){

			theval = "Three Months";

		}else if(id === 6){

			theval = "Six Months";

		}else if(id === 9){

			theval = "Nine Months";

		}else if(id === 12){

			theval = "Twelve Months";

		}

				

		$("#rent-freq option[value='"+id+"']").show();

		$("#freq-"+id).remove();	

	});

	

	$('#newPropForm').submit(function(){

		var propName = $('#propTitle').val();

		var propType = $('#propType').val();

		var propAddress = $('#propAddress').val();

		var propDesc = $('.propDesc').val();		

		var propNote = $('.propNote').val();

		var price = $('#monthly-price').val();
		
		var prop_manager = $('#prop_manager').val();

		var security_deposit = $('#security-deposit').val();

		var security_deposit_term = $('#security-deposit-term').val();
		
		var service_charge = $('#service-charge').val();

		var service_charge_term = $('#service-charge-term').val();

		var imageFolder = $('#foldername').val();

		var featuredPic = $('#featuredPic').val();

		var amenities = [];		

		var allInts = document.getElementsByClassName("allInts");

		var allFreq = document.getElementsByClassName("allFreq");
		
		var bed = $('#bed-number').val();

		var bath = $('#bath-number').val();

		var toilet = $('#toilet-number').val();

		var fName = document.getElementsByClassName("facility-name");

		var fCat = document.getElementsByClassName("facility-category");

		var fDist = document.getElementsByClassName("facility-distance");

		var facilityName = [];

		var facilityCat = [];

		var facilityDist = [];

		var facilityImages = [];

		var status = "New";
		
		var featuredProp = 'no';
		
		var premiumProp = 0;

		var filedata = document.getElementsByName("facility-image");

		

		if($("input[name='newProp']:checked").length > 0){

			status = "New";

		}
		
		if($("input[name='featuredProp']:checked").length > 0){

			featuredProp = "yes";

		}
		
		if($("input[name='premiumProp']:checked").length > 0){

			premiumProp = 1;

		}

		
		//Check for at least one nearby facility entry

		if(fName.length < 1){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill in at least one neighborhood facility</div>');

			

			document.body.scrollTop = 0; // For Safari

  			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

			return false;	   

		}

		

		var fd = new FormData(this);
		var files = "";
		if(fName.length >= 1){
    		
    		files = $('.facility-image');
    		
    		for(let i = 0; i < files.length; i++){
    						
    		}
    		for(let i = 0; i < fName.length; i++){
    			fd.append("facility-name[]", fName[i].value);
    			fd.append("facility-category[]", fCat[i].value);
    			fd.append("facility-distance[]", fDist[i].value);
    			fd.append("files[]", files[i].files[0]);
    		}
		}
		for(let i = 0; i < allInts.length; i++){
			fd.append("intervals[]", allInts[i].value);
		}
				
		if(allFreq.length > 0){
			for(let i = 0; i < allFreq.length; i++){
				fd.append("frequency[]", allFreq[i].value);
			}   
		}

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/uploadProperty/',

			type: "POST",

			data: fd,

			dataType: 'json',

		    secureuri : false,

			processData: false,

            contentType: false,

			beforeSend: function() {

				$("#newPropBut").html("Uploading...");

			},

			success	: function (data){

				if(data == 1){

					alert("Upload successful!");

					location.reload();

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

					

					$("#newPropBut").html("Upload Property");

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					return false;

				}				

			},

			error: function(){

				

				$("#newPropBut").html("Upload Property");

				return false;

			}

		});

		

	

		//validate text fields		

	});
	
	$('#newAptForm').submit(function(e){
    
        e.preventDefault();
        
        $("#newPropBut").html("Uploading ...");
    
    	var propName = $('#aptTitle').val();
    
    	var propType = $('#propType').val();
    
    	var stayType = $('#stayType').val();
    
    	var propAddress = $('#propAddress').val();
    
    	var state = $('#states').val();
    
    	var city = $('#city').val();
    
    	var country = $('#country').val();
    
    	var propDesc = $('.aptDesc').val();	
    
    	var policies = $('.policies').val();
    
    	var house_rules = $('.house_rules').val();	
    
    	var cost = $('#cost').val();			
    
    	var security_deposit = $('#security-deposit').val();
    
    	var imageFolder = $('#foldername').val();
    
    	var featuredPic = $('#featuredPic').val();
    
    	var amenities = [];		
    	
    	var guest = $('#guest-number').val();	
    	
    	var bed = $('#bed-number').val();
    
    	var bath = $('#bath-number').val();
    
    	var toilet = $('#toilet-number').val();
    	
    	
    	$('.amenities:checked').each(function(i){
            amenities.push($(this).val());
        });
    	
    	
    	var data = {"propTitle" : propName, "propType" : propType, "stayType" : stayType, "propAddress" : propAddress, "country" : country, "state" : state, "city" : city, "propDesc" : propDesc, "cost" : cost, "security-deposit" : security_deposit, "foldername" : imageFolder, "featuredPic" : featuredPic, "amenities" : amenities, "bed-number" : bed, "bath-number" : bath, "toilet-number" : toilet, "guest-number" : guest, "policies" : policies, "house_rules" : house_rules};
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url : baseUrl+'admin/uploadApt/',
    
    		type: "POST",
    
    		data: data,
    
    		success	: function (data){
    
    			if(data == 1){
    
    				alert("Upload successful!");
    
    				location.reload();
    
    			}else{
    
    				$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
    
    				$("#newPropBut").html("Upload Property");
    
    				document.body.scrollTop = 0; // For Safari
    
    				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    
    				return false;
    
    			}				
    
    		},
    
    		error: function(){
    
    			$("#newPropBut").html("Upload Property");
    
    			return false;
    
    		}
    
    	});
    	//validate text fields		
    
    });
    $('#editAptForm').submit(function(e){
        
        e.preventDefault();
        
        $("#newPropBut").html("Saving ...");
    
    	var aptID = $('#aptID').val();
    
    	var propName = $('#aptTitle').val();
    
    	var propType = $('#propType').val();
    
    	var stayType = $('#stayType').val();
    
    	var propAddress = $('#propAddress').val();
    
    	var propDesc = $('.aptDesc').val();	
    
    	var policies = $('.policies').val();
    
    	var house_rules = $('.house_rules').val();		
    
    	var cost = $('#cost').val();			
    
    	var security_deposit = $('#security-deposit').val();
    
    	var imageFolder = $('#foldername').val();
    
    	var featuredPic = $('#featuredPic').val();
    
    	var amenities = [];		
    	
    	var guest = $('#guest-number').val();	
    	
    	var bed = $('#bed-number').val();
    
    	var bath = $('#bath-number').val();
    
    	var toilet = $('#toilet-number').val();
    	
    	
    	$('.amenities:checked').each(function(i){
    	    
            amenities.push($(this).val());
            
        });
    	
    	
    	var data = {"aptID" : aptID, "propTitle" : propName, "propType" : propType, "stayType" : stayType, "propAddress" : propAddress, "propDesc" : propDesc, "cost" : cost, "security-deposit" : security_deposit, "foldername" : imageFolder, "featuredPic" : featuredPic, "amenities" : amenities, "bed-number" : bed, "bath-number" : bath, "toilet-number" : toilet, "guest-number" : guest, "policies" : policies, "house_rules" : house_rules};
    
    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url : baseUrl+'admin/editApt/',
    
    		type: "POST",
    
    		data: data,
    
    		success	: function (data){
    
    			if(data == 1){
    
    				alert("Upload successful!");
    
    				location.reload();
    
    			}else{
    
    				$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
    
    				$("#newPropBut").html("Save Changes");
    
    				document.body.scrollTop = 0; // For Safari
    
    				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    
    				return false;
    
    			}				
    
    		},
    
    		error: function(){
    
    			$("#newPropBut").html("Save Changes");
    
    			return false;
    
    		}
    
    	});
    	//validate text fields		
    
    });
	
	$('#newUpcomingProp').submit(function(e){
	    
	    e.preventDefault();
	    
		var units = $('#available-units-upc').val();

		var propType = $('#propType-upc').val();

		var services = $('#services-upc').val();
		
		var airtable_url = $('#airtable-url').val();

		var propAddress = $('#propAddress-upc').val();

		var country = $('#country-upc').val();

		var state = $('#states-upc').val();

		var city = $('#city-upc').val();

		var price = $('#price-upc').val();
		
		var i = 0;
		
		var typeOfTenant = []; 
		
        //var inputElements = document.getElementsByClassName('suitable-for');
        
        $('.suitable-for-upc:checked').each(function () {
           typeOfTenant[i++] = $(this).val();
        });
		
		var filteredList = $('.verify-upc-field').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			$("#newPropBut").html("Post Property");

			document.body.scrollTop = 0; // For Safari

  			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

			return false;

		}
		
		var data = {"units":units, "propType":propType, "services":services, "typeOfTenant":typeOfTenant, "propAddress":propAddress, "country":country, "state":state, "city":city, "price":price, "airtable_url" : airtable_url};

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/uplUpcomingProp/',

			type: "POST",

			data: data,

			beforeSend: function() {

				$("#newPropBut").html("Uploading...");

			},

			success	: function (data){

				if(data == 1){

					alert("Upload successful!");

					location.reload();

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

					$("#newPropBut").html("Post Property");

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					return false;

				}				

			},

			error: function(){

				$("#newPropBut").html("Post Property");

				return false;

			}

		});

		//validate text fields		

	});
	
	
	$('#editPropForm').submit(function(e){

		e.preventDefault();

		var propName = $('#propTitle').val();

		var propType = $('#propType').val();

		var propAddress = $('#propAddress').val();

		var country = $('#country').val();

		var state = $('#states').val();

		var city = $('#city').val();

		var propDesc = $('.propDesc').val();		

		var propNote = $('.propNote').val();

		var price = $('#monthly-price').val();		

		var security_deposit = $('#security-deposit').val();

		var security_deposit_term = $('#security-deposit-term').val();

		var prop_manager = $('#prop_manager').val();

		var service_charge = $('#service-charge').val();

		var service_charge_term = $('#service-charge-term').val();

		var payment_plan = $('#payment-plan').val();

		var allInts = document.getElementsByClassName("allInts");

		var allFreq = document.getElementsByClassName("allFreq");

		var intervals = [];

		var frequency = [];

		var imageFolder = $('#foldername').val();

		var featuredPic = $('#featuredPic').val();

		var amenities = [];

		var bed = $('#bed-number').val();

		var bath = $('#bath-number').val();

		var toilet = $('#toilet-number').val();

		var fName = document.getElementsByClassName("facility-name");

		var fCat = document.getElementsByClassName("facility-category");

		var fDist = document.getElementsByClassName("facility-distance");

		var facilityName = [];

		var facilityCat = [];

		var facilityDist = [];

		var facilityImages = [];

		var filedata = document.getElementsByName("facility-image");
		
		
		//Check for at least one nearby facility entry

		/*if(fName.length < 1){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill in at least one neighborhood facility</div>');

			$("#newPropBut").html("Edit Property");

			document.body.scrollTop = 0; // For Safari

  			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

			return false;	   

		}*/

		

		var fd = new FormData(this);
		var files = "";
		if(fName.length >= 1){
    		
    		files = $('.facility-image');
    		
    		for(let i = 0; i < files.length; i++){
    						
    		}
    		for(let i = 0; i < fName.length; i++){
    			fd.append("facility-name[]", fName[i].value);
    			fd.append("facility-category[]", fCat[i].value);
    			fd.append("facility-distance[]", fDist[i].value);
    			fd.append("files[]", files[i].files[0]);
    		}
		}
		for(let i = 0; i < allInts.length; i++){
			fd.append("intervals[]", allInts[i].value);
		}
				
		if(allFreq.length > 0){
			for(let i = 0; i < allFreq.length; i++){
				fd.append("frequency[]", allFreq[i].value);
			}   
		}

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/editProperty/',

			type: "POST",

			data: fd,

			dataType: 'json',

		    secureuri : false,

			processData: false,

            contentType: false,

			beforeSend: function() {

				$("#newPropBut").html("Uploading...");

			},

			success	: function (data){



				if(data == 1){

					alert("Update successful!");

					location.reload();

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

					$("#newPropBut").html("Edit Property");

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					return false;

				}				

			},

			error: function(){

				alert("Timeout: Please try again later");

				$("#newPropBut").html("Edit Property");

				return false;

			}

		});

		

	

		//validate text fields		

	});

	$('.new-facility').click(function(){

		//Get Distance and Facility Category

		

		// Add new element



  		// Finding total number of elements added

		var total_element = $(".element").length;

 

  		// last <div> with element class id

  		var lastid = $(".element:last").attr("id");

  		var split_id = lastid.split("_");

  		var nextindex = Number(split_id[1]) + 1;



  		var max = 4;

  		// Check total number elements

  		if(total_element < max ){

   			// Adding new div container after last occurance of element class

   			$(".element:last").after("<div class='form-row element' id='div_"+ nextindex +"'></div>");

 

   			// Adding element to <div>

   			$("#div_" + nextindex).append('<div class="col-md-4"><div class="position-relative form-group"><label for="facility-name" class="">Facility Name</label><input name="facility-name[]" id="facility_name_'+ nextindex +'" type="text" class="facility-name form-control" /></div></div><div class="col-md-4"><div class="position-relative form-group"><label for="facility_category" class="">Category</label><select name="facility_category[]" id="facility_category_'+ nextindex +'" class="facility-category form-control">'+theCat+'</select></div></div><div class="col-md-4"><div class="position-relative form-group"><label for="facility-distance" class="">Distance</label><select name="facility-distance[]" id="facility_distance_'+ nextindex +'" class="facility-distance form-control">'+distance+'</select></div></div><div class="col-md-4"><div class="position-relative form-group"><label for="facility-image" class="">Facility Image</label><input name="facility-image[]" id="facility_image_'+ nextindex +'" type="file" class="facility-image form-control" /></div></div>');			

 

  		}		

	});

	$('#furnisureCat').on('submit', function(e){

		

		e.preventDefault();

		

		var category = $('#category').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'category' : category

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createFurnisureCategory/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	$('#furnisureType').on('submit', function(e){

		

		e.preventDefault();

		

		var type = $('#type').val();

		

		

		var filteredList = $('.float-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}

		

		var data = {

			'type' : type

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url : baseUrl+'admin/createFurnisureType/',

			type: "POST",

			async: true,

			data: data,

			beforeSend: function() {

				$('.amenity-but').html('working...');

			},

			success	: function (data){



				if(data == 1){

					alert("successful!");

					location.reload();

				}else{

					alert(data);

				}				

			}

		});

	});

	$('#furnitureForm').on('submit', function(e){

		e.preventDefault();
		
		$('#newFurnitureBut').html("Uploading");

		var title = $.trim($('#title').val());

		var category = $('#category').val();

		var type = $('#type').val();

		var cost = $('#cost').val();

		var securityDep = $('#sec-deposit').val();

		var desc = $.trim($('.desc').val());

		var payment = $.trim($('#payment-info').val());

		var delivery = $.trim($('#delivery-info').val());

		var spec = $.trim($('#specs-info').val());

		

		/*var newProd = "";

		if($("input[name='newProd']:checked")){

			newProd = "Yes";

		}else{

			newProd = "No";

		}*/

		

		var foldername = $.trim($('.folderName').val());

		var featuredPic = $.trim($('.featuredPic').val());

		

		var filteredList = $('.verify-field').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			document.body.scrollTop = 0; // For Safari

			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			
			
		
			$('#newFurnitureBut').html("Upload Item");

			return false;

		}

		var data = {

			'title' : title,

			'category' : category,

			'type' : type,

			'cost' : cost,

			'securityDep' : securityDep,

			'desc' : desc,

			'payment' : payment,

			'delivery' : delivery,

			'spec' : spec,

			'foldername' : foldername,

			'featuredPic' : featuredPic

		};

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/upload_furniture",

			type: "POST",

			async: true,

			data: data,

			success	: function (data){

				if(data == 1){

					$('.form-result').html('<div class="alert alert-info alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Upload Successful</div>');

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					$('.form-control').val('');

					$('.folderName').val('');

					$('.featuredPic').val('');

					$('#newFurnitureBut').html('Upload Item');

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					$('#newFurnitureBut').html('Upload Item');

				}				

			},

			error: function() {

				$('#newFurnitureBut').html('Upload Item');

				return false;

			}

		});

		

	});

	$('#editFurnitureForm').on('submit', function(e){

		e.preventDefault();
		
		$('#newFurnitureBut').html("Uploading");

		var title = $.trim($('#title').val());

		var category = $('#category').val();

		var type = $('#type').val();

		var cost = $('#cost').val();

		var securityDep = $('#sec-deposit').val();

		var desc = $.trim($('.desc').val());

		var payment = $.trim($('#payment-info').val());

		var delivery = $.trim($('#delivery-info').val());

		var spec = $.trim($('#specs-info').val());	

		var foldername = $('.folderName').val();

		var featuredPic = $('.featuredPic').val();
		
		var app_id = $('#appliance_id').val();

		

		var filteredList = $('.verify-field').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			document.body.scrollTop = 0; // For Safari

			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			
			
		
			$('#newFurnitureBut').html("Edit Item");

			return false;

		}

		var data = {

			'title' : title,

			'category' : category,

			'type' : type,

			'cost' : cost,

			'securityDep' : securityDep,

			'desc' : desc,

			'payment' : payment,

			'delivery' : delivery,

			'spec' : spec,

			'foldername' : foldername,

			'featuredPic' : featuredPic,
			
			'app_id' : app_id

		};

		

		$.ajaxSetup ({ cache: false });

		$.ajax({

			url: baseUrl+"admin/edit_furniture",

			type: "POST",

			async: true,

			data: data,

			success	: function (data){



				if(data == 1){
					alert("Successfully updated.");
					//Restart page
					location.reload();

					$('#newFurnitureBut').html('Edit Item');

				}else{

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');

					document.body.scrollTop = 0; // For Safari

					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

					$('#newFurnitureBut').html('Edit Item');

				}				

			},

			error: function() {

				$('#newFurnitureBut').html('Edit Item');

				return false;

			}

		});

	});

	$('#newsForm').submit(function(e){

		e.preventDefault();

		$('.submit-but').html("wait...");

		var title = $.trim($('#articleSubject').val());
		
		var content = $('.content').val().replace(/"/g, '&quot;');

		//var content = $.trim($('.content').val());

		var credit = $.trim($('#articleCredit').val());
		
		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.submit-but').html("Submit");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'title' : title,

			'content' : content,

			'credit' : credit

		};

		$.ajaxFileUpload({

			url : baseUrl+'admin/addNews/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			beforeSend: function() {

                subBut.classList.add('disabled');

			},

			success	: function (data, status, msg){

				if(data.status == 'error'){

					alert("Upload error: "+data.msg);

					return false;

					$('.submit-but').html("Submit");

				}else if(data.status == 'success'){

				    alert(data.msg);

					$('.submit-but').html("Submit");
					
					window.location.reload();

				}

			}

		});

		

	});
	
	$('#editNewsForm').submit(function(e){

		"use strict";

		e.preventDefault();

		$('.submit-but').html("wait...");

		var title = $.trim($('#articleSubject').val());

		//var content = $('.content').val();
		//replace all double quotes
        var content = $('.content').val().replace(/"/g, '&quot;');

		var credit = $.trim($('#articleCredit').val());

		var articleID = $.trim($('#articleID').val());

		var featImg = $.trim($('#featImg').val());

		var folder = $.trim($('#slug').val());
		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.submit-but').html("Save");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'title' : title,

			'content' : content,

			'credit' : credit,
			
			'articleID' : articleID,
			
			'featImg' : featImg,
			
			'folder' : folder

		};

		

		$.ajaxFileUpload({

			url : baseUrl+'admin/editNews/', 

			secureuri : false,

			fileElementId : 'userfile',

			dataType : 'json',

			data : data,

			success	: function (data, status, msg){

				if(data.status == 'error'){

					alert("Upload error: "+data.msg);

					$('.submit-but').html("Save");

					return false;

				}else if(data.status == 'success'){

				    alert(data.msg);

					$('.submit-but').html("Save");
					
					window.location.reload();

				}

			}

		});

	});
	
	/*$('.process-action').click(function(){
		
		$('.process-action').html("wait...");
		
		var action = $('.action').val();
	
		var actionItem = document.getElementsByClassName('props-checkbox');
		
		var details = [];
		
		if(action === ''){
		   
			for(let i = 0; i < actionItem.length; i++){
				
				if(actionItem[i].checked){

					var info = actionItem[i].id;

					details.push({"id": info});
					
					 

				}
				
			}
		   	var data = {"details": details, "action" : action};
			
		}
		
		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/changeStatus",
			type: "POST",
			async: true,
			data: data,
			beforeSend: function() {

			},
			success: function(data) {

				if(data == 1){
					alert("Status successfully changed!");
					location.reload();
				}else{
					alert("Error changing status!!!");
					return false;
				}

			}
		});		
		
		
	});*/
	
	$('.inspection-detail').click(function(){
		
		var the_ids = $(this).attr('id').replace(/request-/, '');
		
		$('.request-msg').html("*************"); 
		
		$('.request-by').html("*************"); 
		
		$('.request-date').html("*************"); 
		
		$('.inspection-type').html("*************");
		
		var all_ids = the_ids.split("-");
		
		var id = all_ids[0];
		
		var msgID = all_ids[1];
		
		var data = {"id" : id, "msgID" : msgID};
		
		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/getInspMsg",
			type: "POST",
			dataType : 'json',
			data: data,
			beforeSend: function() {
				$('#request-'+id).html('Wait...');
			},
			success: function(data) {
				if(data.status == 'success'){ 
					$('.request-msg').html(data.content); 
					$('.request-by').html(data.firstname+' '+data.lastname); 
					$('.request-date').html(data.inspectionDate); 
					$('.inspection-type').html(data.inspectionType); 
					$('.msg_id').val(data.msgID); 
					$('.user_id').val(data.userID); 
					$('#request-'+id).html('Details');					
				}else{
					$('.request-msg').html("*************"); 
					$('.request-by').html("*************"); 
					$('.request-date').html("*************"); 
					$('.inspection-type').html("*************"); 
					$('#request-'+id).html('Details');	
				}
				
			} 
		});	
		
	});
	
	$('#requestFloat').submit(function(e){
		
		e.preventDefault();
		
		$('.reply-but').val("Sending...");
		
		var reply_msg = $.trim($('.reply-msg').val());
		var user_id = $('.user_id').val();
		var msg_id = $('.msg_id').val();
		
		if(reply_msg == ''){
			alert("You need to type a reply in the message box");
			
			$('.reply-but').val("Send Reply");
			
			return false;
		}
		
		var data = {"reply_msg" : reply_msg, "user_id" : user_id, "msg_id" : msg_id};
				
		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/replyInspMsg",
			type: "POST",
			async: true,
			data: data,
			success: function(data) {

				if(data == 1){
					alert("Message successfully sent");
					$('.reply-but').val("Send Reply");
					location.reload();
				}else{
					alert("Error sending message!!!");
					$('.reply-but').val("Send Reply");
					return false;
				}

			}
		});	
		
	});
	$('#newBuytoletForm').submit(function(e){
			
		e.preventDefault();
               
		$("#newPropBut").html("Wait...");
		
		var propName = $('#propTitle').val();
		var propType = $('#propType').val();
		var investmentType = $('.investment-type').val();
		var propAddress = $('#propAddress').val();
		var country = $('#country').val();
		var state = $('#states').val();
		var city = $('#city').val();
		var propDesc = $('.propDesc').val();
		var tenantable = $('.tenantable').val();
		var price = $('#price').val();
		var marketValue = $('#marketValue').val();
		var outrightDiscount = $('#outright-discount').val();
		var asset_appreciation_1 = $('#asset-appreciation-1').val();
		var asset_appreciation_2 = $('#asset-appreciation-2').val();
		var asset_appreciation_3 = $('#asset-appreciation-3').val();
		var asset_appreciation_4 = $('#asset-appreciation-4').val();
		var asset_appreciation_5 = $('#asset-appreciation-5').val();
		var promo_price = $('#promo_price').val();
		var promo_category = $('.promo_category').val();
		var expected_rent = $('#expected-rent').val();
		var payment_plan = $('.payment-plan').val();
		var payment_plan_period = $('.payment-plan-period').val();
		var mortgage = $('#mortgage-value').val();
		var min_pp_val = $('#minimum-payment-plan-value').val();
		var bed = $('#bed-number').val();
		var toilet = $('#toilet-number').val();
		var bath = $('#bath-number').val();
		var hpi_growth = $('#hpi-growth').val();
		var tenancy = $('#tenancy').val();
		var property_size = $('#property-size').val();
		var location_info = $('.location-info').val();
		var pooling_units = $('#pooling-units').val();
		var pool_buy = $('.pool-buy').val();		
		var imageFolder = $('#foldername').val();
		var featuredPic = $('#featuredPic').val();
		var construction_lvl = $('.construction-level').val();
		var start_date = $('.start-date').val();
		var finish_date = $('.finish-date').val();
		var maturity_date = $('#maturity-date').val();
		var closing_date = $('#closing-date').val();
		var floor_level = $('#floor-level').val();
		var hold_period = $('#hold-period').val();
		var featuredProp = 0;
		var co_appr = $('input[name="co-appr[]"]').map(function(){return $(this).val();}).get();
	
	    var co_rent = $('input[name="co-rent[]"]').map(function(){return $(this).val();}).get();
	    
	    //console.log(co_appr);
	    
	    //console.log(co_rent);
	    
	    //return false;
		
		if($("input[name='featuredProp']:checked").length > 0){

			featuredProp = 1;

		}

		var filteredList = $('.verify-field').filter(function(){
			return $(this).val() == "";
		});
		
		if(filteredList.length > 0){
			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');
			
			$("#newPropBut").html("Upload Property");
			document.body.scrollTop = 0; // For Safari
  			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			return false;
		}
		var data = {
			"propTitle" : propName,
			"propType"  : propType,
			"propAddress" : propAddress,
			"country" : country,
			"state"  : state,
			"city"  : city,
			"propDesc" : propDesc,
			"tenantable" : tenantable,
			"investmentType" : investmentType,
			"price" : price,
			"marketValue" : marketValue,
			"outrightDiscount" : outrightDiscount,
			"asset_appreciation_1" : asset_appreciation_1,
			"asset_appreciation_2" : asset_appreciation_2,
			"asset_appreciation_3" : asset_appreciation_3,
			"asset_appreciation_4" : asset_appreciation_4,
			"asset_appreciation_5" : asset_appreciation_5,
			"promo_price" : promo_price,
			"promo_category" : promo_category,
			"expected_rent" :expected_rent,
			"bed" : bed,
			"toilet" : toilet,
			"bath" : bath,
			"hpi" : hpi_growth,
			"mortgage" : mortgage,
			"payment_plan" : payment_plan,
			"payment_plan_period" : payment_plan_period,
			"min_pp_val" : min_pp_val,
			"propertySize": property_size,
			"locationInfo" : location_info,
			"pooling_units" : pooling_units,
			"pool_buy" : pool_buy,
			"imageFolder" : imageFolder,
			"featuredPic" : featuredPic,
			"construction_lvl" : construction_lvl,
			"finish_date" : finish_date,
			"start_date" : start_date,
			"maturity_date" : maturity_date,
			"closing_date" : closing_date,
			"featuredProp" : featuredProp,
			"floor_level" : floor_level,
			"hold_period" : hold_period,
			"co_appr" : co_appr,
			"co_rent" : co_rent
		};
		
		$.ajaxFileUpload({
			url : baseUrl+'admin/uploadBuytoletProperty/', 
			secureuri : false,
			fileElementId : 'floor-plan',
			dataType : 'json',
			data : data,
			success	: function (data){

				if(data.status == "success"){
					alert(data.msg);
					
					location.reload();
					/*alert("Upload successful!");
					location.reload();*/
				}else{
					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>'+data.msg+'</div>');
					
					$("#newPropBut").html("Upload Property");
					document.body.scrollTop = 0; // For Safari
					document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
					return false;
				}				
			}
		});
		
	
		//validate text fields		
	});
	
	$('#editBuytoletForm').submit(function(e){
			
		e.preventDefault();
               
		$("#editPropBut").html("Saving...");
		
		var propID = $('#propID').val();
		var propName = $('#propTitle').val();
		var propType = $('#propType').val();
		var propAddress = $('#propAddress').val();
		var country = $('#country').val();
		var state = $('#states').val();
		var city = $('#city').val();
		var propDesc = $('.propDesc').val();
		var tenantable = $('.tenantable').val();
		var investmentType = $('.investment-type').val();
		var asset_appreciation_1 = $('#asset-appreciation-1').val();
		var asset_appreciation_2 = $('#asset-appreciation-2').val();
		var asset_appreciation_3 = $('#asset-appreciation-3').val();
		var asset_appreciation_4 = $('#asset-appreciation-4').val();
		var asset_appreciation_5 = $('#asset-appreciation-5').val();
		var price = $('#price').val();
		var marketValue = $('#marketValue').val();
		var outrightDiscount = $('#outright-discount').val();
		var promo_price = $('#promo_price').val();
		var promo_category = $('.promo_category').val();
		var expected_rent = $('#expected-rent').val();
		var payment_plan = $('.payment-plan').val();
		var payment_plan_period = $('.payment-plan-period').val();
		var min_pp_val = $('#minimum-payment-plan-value').val();
		var mortgage = $('#mortgage-value').val();
		var bed = $('#bed-number').val();
		var toilet = $('#toilet-number').val();
		var bath = $('#bath-number').val();
		var property_size = $('#property-size').val();
		var location_info = $('.location-info').val();
		var pooling_units = $('#pooling-units').val();
		var available_units = $('#available-units').val();
		var pool_buy = $('.pool-buy').val();		
		var imageFolder = $('#foldername').val();
		var featuredPic = $('#featuredPic').val();
		var construction_lvl = $('.construction-level').val();
		var start_date = $('#start-date').val();  
		var finish_date = $('#finish-date').val();
		var maturity_date = $('#maturity-date').val();
		var closing_date = $('#closing-date').val();
		var featuredProp = 0;
		var hold_period = $('#hold-period').val();
		var floor_level = $('#floor-level').val();
		var co_appr = $('input[name="co-appr[]"]').map(function(){return $(this).val();}).get();
	
	    var co_rent = $('input[name="co-rent[]"]').map(function(){return $(this).val();}).get();
	    
	    //console.log(co_appr);
	    
	    //console.log(co_rent);
	    
	    //return false;
		
		if($("input[name='featuredProp']:checked").length > 0){

			featuredProp = 1;

		}
					
		var filteredList = $('.verify-field').filter(function(){
			return $(this).val() == "";
		});
		
		if(filteredList.length > 0){
			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');
			
			$("#newPropBut").html("Save");
			document.body.scrollTop = 0; // For Safari
  			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			return false;
		}
		var data = {
			"propID" : propID,
			"propTitle" : propName,
			"propType"  : propType,
			"propAddress" : propAddress,
			"country" : country,
			"state"  : state,
			"city"  : city,
			"propDesc" : propDesc,
			"tenantable" : tenantable,
			"investmentType" : investmentType,
			"asset_appreciation_1" : asset_appreciation_1,
			"asset_appreciation_2" : asset_appreciation_2,
			"asset_appreciation_3" : asset_appreciation_3,
			"asset_appreciation_4" : asset_appreciation_4,
			"asset_appreciation_5" : asset_appreciation_5,
			"price" : price,
			"marketValue" : marketValue,
			"outrightDiscount" : outrightDiscount,
			"promo_price" : promo_price,
			"promo_category" : promo_category,
			"expected_rent" :expected_rent,
			"bed" : bed,
			"toilet" : toilet,
			"bath" : bath,
			"mortgage" : mortgage,
			"payment_plan" : payment_plan,
			"payment_plan_period" : payment_plan_period,
			"min_pp_val" : min_pp_val,
			"propertySize": property_size,
			"locationInfo" : location_info,
			"pooling_units" : pooling_units,
			"pool_buy" : pool_buy,
			"imageFolder" : imageFolder,
			"featuredPic" : featuredPic,
			"construction_lvl" : construction_lvl,
			"start_date" : start_date,
			"finish_date" : finish_date,
			"maturity_date" : maturity_date,
			"closing_date" : closing_date,
			"featuredProp" : featuredProp,
			"floor_level" : floor_level,
			"hold_period" : hold_period,
			"co_appr" : co_appr,
			"co_rent" : co_rent,
			"available_units" : available_units
		};
		
		$.ajaxFileUpload({
			url : baseUrl+'admin/editBuytoletProperty/', 
			secureuri : false,
			fileElementId : 'floor-plan',
			dataType : 'json',
			data : data,
			success	: function (data){
				
				if(data.status == "success"){
				    
					alert("Successful!");
					
					location.reload();
					
					return false;
					/*alert("Upload successful!");
					location.reload();*/
				}else{
				    
				    alert("Not Successful!");
				    
				    $("#editPropBut").html("Save");
					
					return false;
				    
				}
								
			}
		});
		
	
		//validate text fields		
	});
	
	$('#aboutUsForm').submit(function(e){

		"use strict";

		e.preventDefault();

		$('#newPropBut').html("wait...");

		var title = $.trim($('#pageTitle').val());

		var content = $.trim($('.pageDesc').val());

		var story_one = $.trim($('.storyOne').val());

		var story_two = $.trim($('.storyTwo').val());

		var id = $.trim($('.id').val());
		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});



		if(filteredList.length > 0){

			$('#newPropBut').html("Post Page");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			$('.form-result').show();

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		
		var data = {

			'title' : title,

			'content' : content,

			'id' : id,
			
			'story_one' : story_one,
			
			'story_two' : story_two

		};

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/updateAbout",
			type: "POST",
			data: data,
			beforeSend: function() {
				$('#request-'+id).html('Wait...');
			},
			success: function(data) {
				if(data.status == 'success'){
					
					alert("Upload Successful");
					
					$('#newPropBut').html("Post Page");

					$('.form-result').show();
					
					location.reload(true);
					
				}else{
					$('#newPropBut').html("Post Page");

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

					$('.form-result').show();	
				}
				
			} 
		});	

	});
	
	$('#hiwFormBtl').submit(function(e){

		"use strict";

		e.preventDefault();

		$('#newPropBut').html("wait...");

		var search = $.trim($('.search').val());

		var analyse = $.trim($('.analyze').val());

		var qualify = $.trim($('.qualify').val());

		var checkout = $.trim($('.checkout').val());

		var id = $.trim($('.id').val());
		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});



		if(filteredList.length > 0){

			$('#newPropBut').html("Post Page");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			$('.form-result').show();

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		
		var data = {

			'search' : search,

			'analyse' : analyse,

			'id' : id,
			
			'qualify' : qualify,
			
			'checkout' : checkout

		};

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/updateBtlHiw",
			type: "POST",
			data: data,
			beforeSend: function() {
				
			},
			success: function(data) {
				if(data == 1){
					
					alert("Upload Successful");
					
					$('#newPropBut').html("Post Page");

					$('.form-result').show();
					
					location.reload(true);
					
				}else{
					$('#newPropBut').html("Post Page");

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

					$('.form-result').show();	
				}
				
			} 
		});	

	});
	
	$('.delete-type').click(function(){		
		
		var id = $(this).attr('id').replace(/delete-/, '');

		$('delete-'+id).html('Wait...');
		
		var data = {

			'type_id' : id

		};
		
		if(confirm("Are you sure you want to DELETE?")){

			$.ajaxSetup ({ cache: false });

			$.ajax({

				url: baseUrl+"admin/deleteType/",

				type: "POST",

				async: true,

				data: data,

				beforeSend: function() {



				},

				success: function(data) {

					if(data == 1){

						alert('Apartment type deleted!');

						location.reload(true);

					}else{

						alert('Could not delete type.');

						location.reload(true);

					}

				},

				error: function() {

					return false;

				}

			});
		}
		
		$('delete-'+id).html('Delete');

	});
	
	$('.property-delete').click(function(){
		
		
		
		var propID = $(this).attr("id").replace(/property-/,'');
		
		$(this).html("Wait...");
		
		var data = { "propID" : propID };
		
		if(confirm("Are you sure you want to DELETE?")){
		
			$.ajaxSetup ({ cache: false });
			
			$.ajax({
				
				url: baseUrl+"admin/delProp",
				
				type: "POST",
				
				data: data,
				
				success: function(data) {
					
					if(data == 1){
					   
						alert("Property successfully deleted!");
						
						location.reload(true)
						
					}else{
						
						alert(data);
						
						$(this).html("Delete");
						
					}
					
				}

			});
		}
		
		$(this).html("Delete");
		
	});
	
	$('.btl-property-delete').click(function(){		
		
		var propDet = $(this).attr("id").replace(/property-/,'');
		
		var props = propDet.split('-');
		
		$(this).html("Wait...");
		
		var data = { "propID" : props[0], "propFolder" : props[1] };
		
		if(confirm("Are you sure you want to DELETE?")){
		
			$.ajaxSetup ({ cache: false });
			
			$.ajax({
				
				url: baseUrl+"admin/delBtlProp",
				
				type: "POST",
				
				data: data,
				
				success: function(data) {
					
					if(data == 1){
					   
						alert("Property successfully deleted!");
						
						location.reload(true)
						
					}else{
						
						alert(data);
						
						$(this).html("Delete");
						
					}
					
				}

			});
		}
		
		$(this).html("Delete");
		
	});
	$('.article-delete').click(function(){
		
		var art = $(this).attr("id").replace(/article-/,'');
		
		var articleInfo = art.split('_');
		
		$(this).html("Wait...");
		
		var data = { "articleID" : articleInfo[0], "folder" : articleInfo[1] };
		
		if(confirm("Are you sure you want to DELETE?")){
		
			$.ajaxSetup ({ cache: false });
			
			$.ajax({
				
				url: baseUrl+"admin/delArticle",
				
				type: "POST",
				
				data: data,
				
				success: function(data) {
					
					if(data == 1){
					   
						alert("Article successfully deleted!");
						
						location.reload(true)
						
					}else{
						
						alert(data);
						
						$(this).html("Delete");
						
					}
					
				}

			});
		}else{
		    $(this).html("Delete");
		}
		
		
	});
	$('.btl-property-sold').click(function(){		
		
		var propID = $(this).attr("id").replace(/property-/,'');
		
		$(this).html("Wait...");
		
		var data = { "propID" : propID };
		
		if(confirm("Are you sure ?")){
		
			$.ajaxSetup ({ cache: false });
			
			$.ajax({
				
				url: baseUrl+"admin/soldProp",
				
				type: "POST",
				
				data: data,
				
				success: function(data) {
					
					if(data == 1){
					   
						alert("Successful!");
						
						$('#property-'+propID).remove();
						
						return false;
						
					}else{
						
						alert("Error: "+data);
						
						$(this).html("Sold");
						
						return false;
						
					}
					
				}

			});
		}else{
		    $(this).html("Sold");
		    return false;
		    
		}
		
		
		
	});
	$('.btl-property-listing').click(function(){		
		
		var propID = $(this).attr("id").replace(/property-/,'');
		
		var propDets = propID.split('-');
		
		var theState = 0;
		
		var reState = '';
		
		if(propDets[1] == 0){
		    
		    theState = 1;
		    
		}
		
		$(this).html("Wait...");
		
		//alert("Property ID: "+propDets[0]+" PropState: "+theState);
		
		//return false;
		
		var data = { "propID" : propDets[0], "propState" : theState };
		
		if(propDets[1] == 0){
		    reState = "List";
		}else{
		    reState = "Unist";
		}
		
		if(confirm("Are you sure ?")){
		
			$.ajaxSetup ({ cache: false });
			
			$.ajax({
				
				url: baseUrl+"admin/propListing",
				
				type: "POST",
				
				data: data,
			
				success: function(data) {
					
					if(data == 1){
					   
						alert("Successful!");
						
						//location.reload();
						
						return false;
						
					}else{
						
						alert("Error: "+data);
						
						
						$('#property-'+propDets[0]+'-'+propDets[1]).html(reState);
						
						return false;
						
					}
					
				}

			});
		}else{
		    $(this).html("Sold");
		    return false;
		    
		}
		
		
		
	});
	$('.process-action').click(function(){
		
		$(this).html("Wait...");
		
		var action = document.getElementById('action');
		
		var actionItem = document.getElementsByClassName('action-item');
		
		var details = [];
		
		
		var counted = actionItem.lenght;

		if(counted < 1){
			
			alert("Select at least one checkbox");
			
			return false;
			
		}

		for(let i = 0; i < actionItem.length; i++){
			
			if(actionItem[i].checked){

				if(action.value === ''){
					
					alert("Pick an action to perform");
					
					return false;
					
				}else{

					var info = actionItem[i].id.split("-");
					
					details.push({"name": info[0], "email": info[1], "id": info[2]});



				}
			}
		}
		var data = {"details": details, "action": action.value}; 

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/changeStatus",
			type: "POST",
			async: true,
			data: data,
			beforeSend: function() {

			},
			success: function(data) {

				if(data == 1){
					alert("Status successfully changed!");
					location.reload();
				}else{
					alert("Error changing status!!!");
					return false;
				}

			}
		});

	});
	
	$('.process-prop-action').click(function(){
		
		$(this).html("Wait...");
		
		var action = document.getElementById('prop-action');
		
		var actionItem = document.getElementsByClassName('props-check-item');
		
		var details = [];
		
		var info = '';
		
		
		var counted = actionItem.lenght;

		if(counted < 1){
			
			alert("Select at least one checkbox");
			
			return false;
			
		}

		for(let i = 0; i < actionItem.length; i++){
			
			if(actionItem[i].checked){

				if(action.value === ''){
					
					alert("Pick an action to perform");
					
					return false;
					
				}else{
					
					details.push({ "id" : actionItem[i].id });

				}
			}
		}

		var data = {"details": details, "action": action.value}; 

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/changePropStatus",
			type: "POST",
			async: true,
			data: data,
			success: function(data) {

				if(data == 1){
					alert("Status successfully changed!");
					location.reload();
				}else{
					alert("Error changing status!!!");
					return false;
				}

			}
		});

	});
	
	$('.verification-action').click(function(){
		
		$(this).html("Submitting...");
		
		var action = document.getElementById('action');
		
		var actionItem = document.getElementsByClassName('action-item');
		
		var details = [];
		
		
		var counted = actionItem.lenght;

		if(counted < 1){
			
			alert("Select at least one checkbox");
			
			return false;
			
		}

		for(let i = 0; i < actionItem.length; i++){
			
			if(actionItem[i].checked){

				if(action.value === ''){
					
					alert("Pick an action to perform");
					
					return false;
					
				}else{

					var info = actionItem[i].id.split("-");
					
					details.push({"verificationID": info[0], "userID": info[1], "email": info[2]});
				}
			}
		}
		console.log(details); return false;
		var data = {"details": details, "action": action.value}; 

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/verificationStatus",
			type: "POST",
			async: true,
			data: data,
			beforeSend: function() {

			},
			success: function(data) {

				if(data == 1){
					alert("Status successfully changed!");
					location.reload();
				}else{
					alert("Error changing status!!!");
					return false;
				}

			}
		});

	});
	
	$('.verify-user').click(function(){ 
		
		$('.verify-user').html('Approving... <i class="fa fa-star"></i>');
		
		var id = $(this).attr("id");
		
		var prop_id = $('#propID').val();
		
		var data = {"id" : id, "prop_id" : prop_id};
		
		$.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/verifyUser",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("User Verified Successfully!");
					
					$('.verify-user').html('Approve <i class="fa fa-star"></i>');
					
					return false;
				}else{
					
					alert("Error changing status!!!");
					
					$('.verify-user').html('Approve <i class="fa fa-star"></i>');
					
					return false;
				}

			}
		});
		
	});
	$('.verify-app-user').click(function(){ 
		
		$('.verify-app-user').html('Approving... <i class="fa fa-star"></i>');
		
		var id = $(this).attr("id");
		
		var data = {"id" : id};
		
		$.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/verifyAppUser",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("User Verified Successfully!");
					
					$('.verify-app-user').html('Approve <i class="fa fa-star"></i>');
					
					return false;
				}else{
					
					alert("Error changing status!!!");
					
					$('.verify-app-user').html('Approve <i class="fa fa-star"></i>');
					
					return false;
				}

			}
		});
		
	});
	$('.unverify-user').click(function(){ 
		
		$('.unverify-user').html('Working... <i class="fa fa-trash"></i>');
		
		var id = $(this).attr("id");
		
		var data = {"id" : id};
		
		$.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/unverifyUser",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("User Unverified!");
					
					$('.unverify-user').hide();
					
					return false;
				}else{
					
					alert("Error Unverifying!!!");
					
					$('.unverify-user').html('Refuse <i class="fa fa-trash"></i>');
					
					return false;
				}

			}
		});
		
	});
	$('.approve-payment').click(function(){
	    
	    $(this).html('Wait...');
		
		var details = $(this).attr("id").replace(/approve-/,"").split('-');
		
		var refID = details[0];
		
		var transactionID = details[1];
		
		var data = {"transactionID" : transactionID, "refID" : refID};
		
		if(confirm("Are you sure you want to PROCEED?")){
		
    		$.ajaxSetup ({ cache: false });
    		
    		$.ajax({
    			url: baseUrl+"admin/approvePayment",
    			
    			type: "POST",
    			
    			async: true,
    			
    			data: data,
    			
    			success: function(data) {
    
    				if(data == 1){
    					
    					alert("Payment Approved!");
    					
    					$(this).html('Approve');
    					
    					location.reload(true);
    					
    				}else{
    					
    					alert("Error Approving!!!");
    					
    					$(this).html('Approve');
    					
    					return false;
    				}
    
    			}
    		});
		}else{
		    
		    $(this).html('Approve');
		    return false;
		    
		}
		
	});
	/*$('.approve-payment').click(function(){
		
		var details = $(this).attr("id").replace(/approve-/,"").split("-");
		
		var ref = details[0];
		
		var propID = details[1];
		
		var data = {"ref" : ref, "propID" : propID};
		
		//alert("reference: "+ref+" - property ID: "+propID);
		
		$.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/approvePayment",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("Payment Approved!");
					
					$('.approve-payment').html('Approve');
					
					return false;
				}else{
					
					alert("Error Approving!!!");
					
					$('.approve-payment').html('Approve');
					
					return false;
				}

			}
		});
	});*/
	$('.delete-booking').click(function(){
	    
		var the_ids = $(this).attr("id").replace(/booking-/,"").split("-");
		
		var bookingID = the_ids[0];
		
		var propertyID = the_ids[1];
		
		$(this).html('Wait...');
		
		var data = {"bookingID" : bookingID, "propertyID" : propertyID};
		
		if(confirm("Are you sure you want to DELETE booking?")){
		
    		$.ajaxSetup ({ cache: false });
    		
    		$.ajax({
    			url: baseUrl+"admin/deleteBooking",
    			
    			type: "POST",
    			
    			async: true,
    			
    			data: data,
    			
    			success: function(data) {
    
    				if(data == 1){
    					
    					alert("Booking Deleted!");
    					
    					$(this).html('Delete');
    					
    					location.reload(true);
    				}else{
    					
    					alert("Error Deleting!!!");
    					
    					$(this).html('Delete');
    					
    					return false;
    				}
    
    			}
    		});
		}else{
		    
		    $(this).html('Delete');
		    
		    return false;
		    
		}
		
	});
	$('#aboutUsFormBuytolet').submit(function(e){

		"use strict";

		e.preventDefault();

		$('#newPropBut').html("wait...");


		var story_one = $.trim($('.storyOne').val());

		var story_two = $.trim($('.storyTwo').val());

		var id = $.trim($('.id').val());
		

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});



		if(filteredList.length > 0){

			$('#newPropBut').html("Post Page");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			$('.form-result').show();

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		
		var data = {

			'id' : id,
			
			'what_we_do' : story_one,
			
			'our_story' : story_two

		};

		$.ajaxSetup ({ cache: false });
		$.ajax({
			url: baseUrl+"admin/updateBuytoletAbout",
			type: "POST",
			data: data,
			beforeSend: function() {
				$('#request-'+id).html('Wait...');
			},
			success: function(data) {
				if(data == 1){
					
					alert("Upload Successful");
					
					$('#newPropBut').html("Post Page");

					$('.form-result').show();
					
					location.reload(true);
					
				}else{
					$('#newPropBut').html("Post Page");

					$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

					$('.form-result').show();	
				}
				
			} 
		});	

	});
	
	$("#debt-form").submit(function(e){
	    
	    e.preventDefault();
	    
	    $('.debt-button').html("Wait...");
	    
	    $('.verify-debt-txt').css("border","1px solid #ced4da");
	    
	    var adminID = $('#admin_id').val();
	    
	    var debtorID = $('#debtor_id').val();
	    
	    var amount = $('#debt-amount').val();
	    
	    var note = $('#debt-note').val();
	    
	    var debt_period = $('#debt-yr').val()+'-'+$('#debt-month').val()+'-'+$('#debt-day').val();
	    
	    var filteredList = $('.verify-debt-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			alert("All fields are required.");

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");
            
            $('.debt-button').html("Submit");
			
			return false;

		}
	    
	    var data = {"adminID" : adminID, "debtorID" : debtorID, "amount" : amount, "note" : note, "debt_period" : debt_period};
	    
	    
	    $.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/addDebt",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("Successful!");
					
					$('.debt-button').html("Submit");
					
					return false;
				}else{
					
					alert("Error inserting data!");
					
					$('.debt-button').html("Submit");
					
					return false;
				}

			}
		});
	    
	    
	});
	
	$('.start-processing').click(function(){
	    
		var user_id = $(this).attr("id");
		
		$(this).html('Wait...');
		
		var data = {"user_id" : user_id};
		
		$.ajaxSetup ({ cache: false });
		
		$.ajax({
			url: baseUrl+"admin/startProcessing",
			
			type: "POST",
			
			async: true,
			
			data: data,
			
			success: function(data) {

				if(data == 1){
					
					alert("Successful!");
					
					$('.start-processing').hide();
					
				}else{
					
					alert("Error starting!");
					
					$('.start-processing').html('Start processing');
					
					return false;
				}

			}
		});
		
		
	});
	
	$('.construction-level').on("change", function(){
	    
	    var level = $(this).val();
	    
	    if(level == 'Ongoing'){
	        
	        $('#start-date').prop("disabled", false);
	        
	        $('#finish-date').prop("disabled", false);
	        
	        $('#construction-status-panel').css('display', 'block');
	        
	    }else if(level == 'Off Plan'){
	        
	        $('#start-date').prop("disabled", false);
	        
	        $('#finish-date').prop("disabled", false);
	        
	        $('#construction-status-panel').css('display', 'none');
	        
	    }else if(level == 'Completed'){
	        
	        $('#start-date').prop("disabled", true);
	        
	        $('#finish-date').prop("disabled", false);
	        
	        $('#construction-status-panel').css('display', 'none');
	        
	    }else{
	        
	        $('#start-date').prop("disabled", true);
	        
	        $('#finish-date').prop("disabled", true);
	        
	        $('#construction-status-panel').css('display', 'none');
	        
	    }
	    
	    
	});
	$('.deduction-btn').click(function(){
	    
	    var id = $(this).attr('id').replace(/deduction-btn-/, '');
	    
	    $('.deduction-line').hide();
	    
	    $('#deduction-line-'+id).show();
	    
	});
	$('.deduct-charges').click(function(){
	    
	    var id = $(this).attr('id').replace(/deduct-charges-/, '');
	    
	    $(this).html('Wait...');
	    
	    var amount = $.trim($('#deduction-amount-'+id).val());
	    
	    var purpose = $('#deduction-purpose-'+id).val();
	    
	    if(amount === '' || purpose === ''){
	        
	        $('#deduction-line-'+id).css('background', 'rgba(255, 0, 0, 0.3)');
	        
	        alert("Fill empty fields");
	        
	        setTimeout(function(){ $('#deduction-line-'+id).css('background', 'rgba(255, 255, 255, 1)'); }, 2000);
	        
	        $('#deduct-charges-'+id).html('Submit');
	        
	        return false;
	        
	    }
	    
	    if(isNaN(amount)){
	        
	        $('#deduction-amount-'+id).css('border', '1px solid rgba(255, 0, 0, 0.3)');
	        
	        alert("Remove special characters from amount. Insert only numbers");
	        
	        setTimeout(function(){ $('#deduction-amount-'+id).css('border', '1px solid #ced4da'); }, 2000);
	        
	        $('#deduct-charges-'+id).html('Submit');
	        
	        return false;
	        
	    }
	    
	    var data = {"amount" : amount, "purpose" : purpose, "userID" : id};
	    
	    $.ajaxSetup ({ cache: false });
    		
		$.ajax({
			url: baseUrl+"admin/deductWallet",
			
			type: "POST",
			
			dataType: 'json',
			
			data: data,
			
			success: function(data) {

				if( data.response == 1 ){

					$('#deduction-line-'+id).css('background', 'rgba(0, 128, 0, 0.3)');
	        
        	        alert("Deducted successfully!");
        	        
        	        $('#deduction-amount-'+id).val('');
	    
	                $('#deduction-purpose-'+id).val('');
        	        
        	        setTimeout(function(){ $('#deduction-line-'+id).css('background', 'rgba(255, 255, 255, 1)'); }, 2000);
        	        
                    location.reload(true);
                    
				}else if( data.response == 0){
				    
				    $('#deduction-line-'+id).css('background', 'rgba(255, 0, 0, 0.3)');
	        
        	        alert(data.message);
        	        
        	        setTimeout(function(){ $('#deduction-line-'+id).css('background', 'rgba(255, 255, 255, 1)'); }, 2000);
        	        
        	        $('#deduct-charges-'+id).html('Submit');
					

				}

			}

		});
	    
	    
	});
	$('#faqForm').on('submit', function(e){
	    
	    e.preventDefault();
	    
	    $('.faq-but').val("Uploading...");
	    
	    var question = $('#question').val();
    
		var answer = $('#answer').val();

		var faq_order = $('#faq-order').val();
		
		var filteredList = $('.float-txt').filter(function(){
    
			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			filteredList.css("border","1px solid rgba(251,1,1,0.5)");

			return false;

		}
	    
	    if(!$('#faq-id').val()){
    
    		var data = {
    
    			'question' : question,
    
    			'answer' : answer,
    			
    			'faq_order' : faq_order
    
    		};
    
    		$.ajaxSetup ({ cache: false });
    		
    		$.ajax({
    			url: baseUrl+"admin/insertFaq",
    			
    			type: "POST",
    			
    			async: true,
    			
    			data: data,
    			
    			success: function(data) {
    
    				if( data == 1 ){
    
    					$('.faq-but').val("Upload Entry");
    
    					alert("successful!");
    
    					$('.txt-f').val("");
    
    				}else if( data == 0){
    				    
    				    $('.faq-but').val("Upload Entry");
    
    					alert("Error uploading entry"+data.msg);
    					
    					return false;
    
    				}
    
    			}
    
    		});
	    }else{
	        
	        var faq_id = $('#faq-id').val();
	        
	        var data = {
    
    			'question' : question,
    
    			'answer' : answer,
    			
    			'faq_order' : faq_order,
    			
    			'faq_id' : faq_id
    
    		};
    
    		$.ajaxSetup ({ cache: false });
    		
    		$.ajax({
    		    
    			url: baseUrl+"admin/editFaq",
    			
    			type: "POST",
    			
    			async: true,
    			
    			data: data,
    			
    			success: function(data) {
    
    				if( data == 1 ){
    
    					alert("Successfully edited!");
    					
    					$('.faq-but').val("Upload Entry");
    
    					$('.txt-f').val("");
    
    				}else if( data == 0){
    
    					alert("Error editing entry"+data.msg);
    					
    					$('.faq-but').val("Upload Entry");
    					
    					return false;
    
    				}
    
    			}
    
    		});
	        
	    }

	});
	
	$('.faq-edit').on('click', function(){
	    
	    var id = $(this).attr("id").replace(/faq-/, '');
	    
	    $('#faq-'+id).html("Wait...");
	    
	    var data = { "id" : id };
	    
	    $.ajaxSetup ({ cache: false });
	    
    	$.ajax({		
    
			url: baseUrl+"admin/getFaqDetails/",
			type: "POST",
			dataType : 'json',
			data: data,

			success: function(data) {
			    
			    if(data.result == 'success'){
    			    
    			    $('#question').val(data.question);
    			    
    			    $('#answer').val(data.answer);
    			    
    			    $('#faq-order').val(data.faq_order);
    			    
    			    $('.faq-id').val(data.id);
    			    
    			    $('.modal-backdrop').css('visibility', 'visible');
    			    
            		$('.modal-backdrop').addClass('show fade');
            		
            		$('body').addClass('modal-open');
            		
            		$('#exampleModalLong').addClass('show');
            		
            		$('#exampleModalLong').css('display', 'block');
            		
            		$('#exampleModalLong').css('padding-right', '17px');
			    
    			    $('#faq-'+id).html("Edit");
			    }else{
			        
			        $('#faq-'+id).html("Edit");
			        
			        alert("Unknown error");
			        
			    }

			}

    	});
	    
	});
	
	$(document).on("click", ".close", function(){
	    
	    $('.modal-backdrop').css('visibility', 'hidden');
		$('.modal-backdrop').removeClass('show fade');
		$('body').removeClass('modal-open');
		$('#exampleModalLong').removeClass('show');
		$('#exampleModalLong').css('display', 'none');
		$('#exampleModalLong').css('padding-right', '0');
		
		$('.txt-f').val("");
		
	});
	
	$('.switch-property').click(function(){
	    
	    //$('.prop-search-field').hide();
	    
	    var ids = $(this).attr('id').replace(/switch-/, '').split("-");
	    
	    if($('.prop-search-field-'+ids[1]).is(":hidden")){
	    
    	    $(this).html("Close Option");
    	    
    	    $('.prop-search-field-'+ids[1]).show();
    	    
    	}else{
    	 
    	    $('#switch-'+ids[0]+'-'+ids[1]+'-'+ids['2']+'-'+ids['3']).html("Open Option");
    	    
    	    $('.prop-search-field-'+ids[1]).hide();
    	}
	    
	});
	
	$('#bookingStatusChange').submit(function(){
	    
	    var reason = $('#booking-status').val();
	    
	    var status_note = $('#status-note').val();
	    
	    var user_id = $('#user_id').val();
	    
	    var booking_id = $('#booking_id').val();
	    
	    var move_out_date = $('#move_out_date').val();
	    
	    var data = {"reason" : reason, "status_note" : status_note, "user_id" : user_id, "booking_id" : booking_id, "move_out_date" : move_out_date};
	    
	    $.ajaxSetup ({ cache: false });
	    
    	$.ajax({		
    
			url: baseUrl+"admin/changeBookingStatus/",
			
			type: "POST",
			
			async : true,
			
			data: data,

			success: function(data) {
			    
			    if(data == 1){
			        
			        alert("Successful!");
			        
			        $('#status-note').val('');

					location.reload(true);
    			    
			    }else{
			        alert(data);
			        
			        
			        return false;
			        
			    }

			}

    	});
	    
	});
	
	$('.activate-switch').click(function(){
	    
	    $(this).html("Processing...");
	    
	    var ids = $(this).attr('id').replace(/activate-/, '').split("-");
	    
	    var bookingID = ids[0];
	    
	    var userID = ids[2];
	    
	    var propertyID = ids[1];
	    
	    var verificationID = ids[3];
	    
	    var new_propID = $('#prop-id-'+propertyID).val();
	    
	    var move_in_date = $('#move-in-date-'+propertyID).val();
	    
	    var payment_plan = $('#payment-plan-'+propertyID).val();
	    
	    var security_deposit = $('#security-dep-'+propertyID).val();
	    
	    var renting_as = $('#renting-as-'+propertyID).val();
	    
	    var period_paid = $('#period-'+propertyID).val();
	    
	    if(new_propID == '' || move_in_date == '' || payment_plan == '' || security_deposit == '' || renting_as == ''){
	        alert("Please fill in all fields");
	        
	        $('#activate-'+ids[0]+'-'+ids[1]+'-'+ids['2']+'-'+ids['3']).html("Activate switch");
	        
	        return false;
	    }
	    
	    //alert(bookingID+' - '+userID+' - '+propertyID+' - '+verificationID);
	    
	    var data = {"bookingID" : bookingID, "userID" : userID, "propertyID" : propertyID, "verificationID" : verificationID, "newPropertyID" : new_propID, "move_in_date" : move_in_date, "paymentPlan" : payment_plan, "securityDeposit" : security_deposit, "renting_as" : renting_as, "period_paid" : period_paid};
	    
	    $.ajaxSetup ({ cache: false });
	    
    	$.ajax({		
    
			url: baseUrl+"admin/switchProperty/",
			
			type: "POST",
			
			async : true,
			
			data: data,

			success: function(data) {
			    
			    if(data == 1){
			        
			        alert("Successful!");

					location.reload(true);
    			    
			    }else{
			        alert(data);
			        
			        $('#activate-'+ids[0]+'-'+ids[1]+'-'+ids['2']+'-'+ids['3']).html("Activate switch");
			        
			        return false;
			        
			    }

			}

    	});
	    
	});
	
	$('.change-status').click(function(){
	    
        var actions = $(this).attr('id').split('-');
        
        var bookingID = actions[0];
        
        var action = actions[1];
        
        var data = {"bookingID" : bookingID, "action" : action};
        
        if(confirm("Are you sure you want to proceed?")){
        
            $.ajaxSetup ({ cache: false });
        
        	$.ajax({
        
        		url : baseUrl+'admin/changeStayoneBookingStatus',
        
        		type: "POST",
        
        		data: data,
        
        		success	: function (data){
        
        			if(data == 1){
        
        				alert("Successful!");
        
        				location.reload();
        
        			}else{
        
        				alert(data);
        				
        				return false;
        
        			}				
        
        		},
        
        		error: function(){
        
        			alert("Error!");
        
        			return false;
        
        		}
        	});
        }else{
            
            return false;
            
        }
        
    });
    
    $('.approve-finance').click(function(){
	    
        var ids = $(this).attr('id').replace(/finance-/, '').split('-');
        
        var refID = ids[0];
        
        var userID = ids[1];
        
        var data = {"refID" : refID, "userID" : userID};
        
        if(confirm("Are you sure you want to proceed?")){
        
            $.ajaxSetup ({ cache: false });
        
        	$.ajax({
        
        		url : baseUrl+'admin/approve_finance',
        
        		type: "POST",
        
        		data: data,
        
        		success	: function (data){
        
        			if(data == 1){
        
        				alert("Successful!");
        
        				location.reload();
        
        			}else{
        
        				alert(data);
        				
        				return false;
        
        			}				
        
        		},
        
        		error: function(){
        
        			alert("Error!");
        
        			return false;
        
        		}
        	});
        }else{
            
            return false;
            
        }
        
    });
	
	$('.new-booking').click(function(){
	    
	    $(this).html("Wait...");
	    
	    var ids = $(this).attr('id').replace(/book-id-/, '').split("-");
	    
	    var userID = ids[0];
	    
	    var verificationID = ids[1];
	    
	    var new_propID = $('#book-prop-id').val();
	    
	    var move_in_date = $('#new-move-in-date').val();
	    
	    var payment_plan = $('#new-payment-plan').val();
	    
	    var renting_as = $('#new-renting-as').val();
	    
	    var duration = $('#new-duration').val();
	    
	    if(new_propID == '' || move_in_date == '' || payment_plan == '' || duration == ''){
	        alert("Please fill in all fields");
	        
	        $('#book-id-'+ids[0]+'-'+ids[1]).html("Book Now");
	        
	        return false;
	    }
	    
	    
	    var data = {"userID" : userID, "verificationID" : verificationID, "propID" : new_propID, "move_in_date" : move_in_date, "paymentPlan" : payment_plan, "booked_as" : renting_as, "duration" : duration};
	    
	    $.ajaxSetup ({ cache: false });
	    
    	$.ajax({		
    
			url: baseUrl+"admin/insertNewBooking/",
			
			type: "POST",
			
			async : true,
			
			data: data,

			success: function(data) {
			    
			    if(data == 1){
			        
			        alert("Successful!");

					location.reload(true);
    			    
			    }else{
			        alert(data);
			        
			        $('#book-id-'+ids[0]+'-'+ids[1]).html("Book Now");
			        
			        return false;
			        
			    }

			}

    	});
	    
	});
	$('#notificationForm').submit(function(e){

		e.preventDefault();

		$('.submit-but').html("wait...");

		var title = $.trim($('#notificationTitle').val());

		var link = $.trim($('#notificationLink').val());

		var startDate = $('#startFrom').val();

		var endDate = $('#ends').val();
		
		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.submit-but').html("Submit");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'title' : title,

			'link' : link,

			'startDate' : startDate,

			'endDate' : endDate

		};
        
        $.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/addNotification/', 

			type: "POST",
			
			async : true,
			
			data: data,

			success	: function (data){

				if(data == 1){
				    
				    alert("Successfully uploaded!");

					$('.submit-but').html("Submit");
					
					window.location.reload();

				}else{

				    alert("Upload error: "+data);
				    
				    console.log(data);

					$('.submit-but').html("Submit");

					return false;

				}

			}

		});

		

	});
	$('#editNotificationForm').submit(function(e){

		e.preventDefault();

		$('.submit-but').html("wait...");

		var title = $.trim($('#notificationTitle').val());

		var link = $.trim($('#notificationLink').val());

		var startDate = $('#startFrom').val();

		var endDate = $('#ends').val();

		var id = $('#notification-id').val();
		
		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('.submit-but').html("Save");

			$('.form-result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>Fill all compulsory fields</div>');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = {

			'title' : title,

			'link' : link,

			'startDate' : startDate,

			'endDate' : endDate,
			
			'id' : id

		};
        
        $.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/editNotification/', 

			type: "POST",
			
			async : true,
			
			data: data,

			success	: function (data){

				if(data == 1){
				    
				    alert("Saved!");

					$('.submit-but').html("Save");
					
					window.location.reload();

				}else{

				    alert("Upload error: "+data);
				    
				    console.log(data);

					$('.submit-but').html("Save");

					return false;

				}

			}

		});

	});
	
	$(document).on('change','.new-user',function(){
		
		var user = $('.new-user').val();
		
		alert(user);
		return false;
		
		if(user == 'yes'){
			
		   $('.payment-plan-period-spc').show();
			
		}else{
			
			$('.payment-plan-period-spc').hide();
			
		}
	});
	
	$('#new-user').change(function(){
	    
       if(this.checked)
          $('.user-fields').show();
       else
          $('.user-fields').hide();
          
    });
	
	$('#adminSendShares').submit(function(e){

		e.preventDefault();

		$('#send-but').html("Sending...");

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('#send-but').html("Send Shares");

			alert('Fill all fields accordingly');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = $(this).serializeArray();
		
        $.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/sendShares/', 

			type: "POST",
			
			dataType : "json",
			
			data: data,

			success	: function (data){

				if(data.response == 'success'){
				    
				    alert("Success: "+data.msg);

					$('#send-but').html("Send Shares");
					
					window.location.reload();

				}else{

				    alert("Error: "+data.msg);
				    
				    console.log(data.msg);

					$('#send-but').html("Send Shares");

					return false;

				}

			}

		});

	});
	
	
	$('#adminBuytoletPromoForm').submit(function(e){

		e.preventDefault();

		$('#send-but').html("Publishing...");

		var filteredList = $('.verify-txt').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){

			$('#send-but').html("Publish");

			alert('Fill required fields accordingly');

			filteredList.css("border","2px solid rgba(251,1,1,0.5)");

			return false;

		}

		var data = $(this).serializeArray();
		
        $.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/publishPromo/', 

			type: "POST",
			
			dataType : "json",
			
			data: data,

			success	: function (data){

				if(data.response == 'success'){
				    
				    alert("Success: "+data.msg);

					$('#send-but').html("Publish");
					
					window.location.reload();

				}else{

				    alert("Error: "+data.msg);
				    
				    console.log(data.details);

					$('#send-but').html("Publish");

					return false;

				}

			}

		});

	});
});

function getsVal(id)
{
	let inputId = document.getElementById("sub-propty");
	
	let inputTitle = document.getElementById("live_search")

	var conT = document.getElementById(id).className;
	inputId.value = id;
	inputTitle.value = conT;
}