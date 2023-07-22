// JavaScript Document
var baseUrl = "https://dev-rent.smallsmall.com/";
$('.file_drag_area').on('dragover', function(){
	"use strict";
	$(this).addClass('file_drag_over');
	return false;
});
$('.file_drag_area').on('dragleave', function(){
	"use strict";
	$(this).removeClass('file_drag_over');
	return false;
});
$('.file_drag_area').on('drop', function(e){
	"use strict";
	e.preventDefault();
	$(this).removeClass('file_drag_over');
	//var file_list = e.originalEvent.dataTransfer.files;
	var x = $('.multipleUplFiles')[0];
    const dT = e.originalEvent.dataTransfer.files;
   
    x.files = dT;
	
	var folderName = $('#foldername').val();
	
	if(!folderName){
	   folderName = 0;
	}
	
	var files = $('.multipleUplFiles')[0].files;
	var error = '';
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++){
		  
	   var name = files[count].name;
	   var extension = name.split('.').pop().toLowerCase();
	   if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1){ 
		   
			error += "Invalid " + count + " Image File";
		   
	   }else{
		   
			form_data.append("files[]", files[count]);
	   }
	}
	
	if(error == ''){
	   $.ajax({
			url:baseUrl+"admin/uploadBuytoletImages/"+folderName, //base_url() return http://localhost/tutorial/codeigniter/
			method:"POST",
			data:form_data,
		    secureuri : false,
			contentType:false,
			cache:false,
		    dataType : 'json',
			processData:false,
			beforeSend:function(){

				$('#file_drag_area').html("<label class='text-success'>Uploading...</label>");
			},
			success:function(data){
				
				if(data.error){

					$('#file_drag_area').html(data.error);

				}else{

					$('#file_drag_area').html("Drop Files Here");

					$('.multipleUplFiles').val("");

					$('#uploaded_images').append(data.pictures);

					$('#foldername').val(data.folder);

				}

			}
	   });
	}else{
		
		alert(error);
		
	}
	//console.log(allFiles);
	//$('#uploaded_files').append("");
	
	//Send data to php using formData
});
//If the upload button is used
$('.multipleUplFiles').on('change', function(e){

	"use strict";
	
	$('#file_drag_area').html("<label class='text-success'>Uploading...</label>");
	
	var fd = new FormData();

	var files = $('.multipleUplFiles')[0].files;

	var folderName = $('#foldername').val();
	
	if(!folderName){

	   folderName = 0;

	}

	
	for(let i = 0; i < files.length; i++){

		fd.append('files[]',files[i]); 
		
	}

	$.ajax({

		url:baseUrl+"admin/uploadBuytoletImages/"+folderName, //base_url() return http://localhost/tutorial/codeigniter/

		method:"POST",

		data:fd,

		secureuri : false,

		contentType:false,

		cache:false,

		dataType : 'json',

		processData:false,

		success:function(data){
			if(data.error){
				
				$('#file_drag_area').html(data.error);
				
			}else{
				
				$('#file_drag_area').html("Drop Files Here");
				
				$('.multipleUplFiles').val("");

				$('#uploaded_images').append(data.pictures);

				$('#foldername').val(data.folder);
				
			}

		}

   });

});