 // JavaScript Document
var baseUrl = "https://rent.smallsmall.com/";

$('#dropzone-id').on('dragover', function(){
	"use strict";
	$(this).addClass('file_drag_over');
	return false;
});
$('#dropzone-id').on('dragleave', function(){
	"use strict";
	$(this).removeClass('file_drag_over');
	return false;
});
$('.identification-inp').on('change', function(e){
	"use strict";
	var fd = new FormData();
	var files = $(this)[0].files[0];
	var folderName = $('#userID').val();
	var filepath = "";
	
	//alert(files[0].name);
	
	//return false;
	
	fd.append('files',files);        
	$.ajax({
		xhr: function() {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function(evt) {
				if (evt.lengthComputable) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					$("#id-progress-bar").css("width", percentComplete + '%');
					
					if(percentComplete === 100){
					    
					    $('#id-state').val(1);
					    
					}
				}
			}, false);
			return xhr;
		},
		url: baseUrl+'rss/uploadIdentification/'+folderName,
		type: 'post',
		data: fd,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$('#id-meter-text').html("Uploading...");
		},
		success:function(data, folder, pictures){
			filepath = folderName+'/'+files.name.replace(/\s+/g, '_');
			$('#id-meter-text').html("Done");
			$('#id-fileName').html("<span style='color:green;'>Successful upload</span>");
			$('#idcard').val(filepath);

		}
	});
});
$('.statement-inp').on('change', function(e){
	"use strict";
	var fd = new FormData();
	var files = $(this)[0].files[0];
	var folderName = $('#userID').val();
	var filepath = "";
	
	//alert(files[0].name);
	
	//return false;
	
	fd.append('files',files);        
	$.ajax({
		xhr: function() {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function(evt) {
				if (evt.lengthComputable) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					$("#statement-progress-bar").css("width", percentComplete + '%');
					if(percentComplete === 100){
					    
					    $('#statement-state').val(1);
					    
					}
					
				}
			}, false);
			return xhr;
		},
		url: baseUrl+'rss/uploadIdentification/'+folderName,
		type: 'post',
		data: fd,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$('#statement-meter-text').html("Uploading...");
		},
		success:function(data, folder, pictures){
			filepath = folderName+'/'+files.name.replace(/\s+/g, '_');
			$('#statement-meter-text').html("Done");
			$('#statement-fileName').html("<span style='color:green;'>Successful upload</span>");
			$('#statement').val(filepath);

		}
	});
});


$('#dropzone-id').on('drop', function(e){
	"use strict";
	e.preventDefault();
	$(this).removeClass('file_drag_over');
	//var file_list = e.originalEvent.dataTransfer.files;
	var x = $('.identification-inp')[0];
    const dT = e.originalEvent.dataTransfer.files;
   
    x.files = dT;
	
	var folderName = $('#userID').val();
	
	if(!folderName){
	   folderName = 0;
	}
	
	var files = $('.identification-inp')[0].files;
	
	$('#box-id span').html(files[0].name);
	var error = '';
	var form_data = new FormData();
	var filepath = folderName+'/'+files[0].name.replace(/\s+/g, '_');
	
	for(var count = 0; count<files.length; count++){
		  
	   var name = files[count].name;
	   var extension = name.split('.').pop().toLowerCase();
	   if(jQuery.inArray(extension, ['png','jpg','jpeg','pdf']) == -1){
		   
			alert("File type not allowed");
			
			return false;
		   
	   }else{
		   
			form_data.append("files[]", files[count]);
	   }
	}
	
	if(error == ''){
		$('#id-meter-text').html("Uploading...");
	   $.ajax({
		    xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						$("#id-progress-bar").css("width", percentComplete + '%');
						if(percentComplete === 100){
					    
    					    $('#id-state').val(1);
    					    
    					}
						
					}
				}, false);
				return xhr;
			},
			url:baseUrl+"rss/uploadIdentification/"+folderName, //base_url() return http://localhost/tutorial/codeigniter/
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
			success:function(data, folder, pictures){
				$('#id-meter-text').html("Done");
				$('#id-fileName').html("<span style='color:green;'>Successful upload</span>");
			 	$('#idcard').val(filepath);

			}
	   });
	}else{
		
		$('#id-filename').html("<span style='color:red;'>"+error+"</span>");
		
	}
	
});

$('#dropzone-bank').on('dragover', function(){
	"use strict";
	$(this).addClass('file_drag_over');
	return false;
});
$('#dropzone-bank').on('dragleave', function(){
	"use strict";
	$(this).removeClass('file_drag_over');
	return false;
});

$('#dropzone-bank').on('drop', function(e){
	"use strict";
	e.preventDefault();
	$(this).removeClass('file_drag_over');
	//var file_list = e.originalEvent.dataTransfer.files;
	var x = $('.statement-inp')[0];
    const dT = e.originalEvent.dataTransfer.files;
   
    x.files = dT;
	
	var folderName = $('#userID').val();
	
	if(!folderName){
	   folderName = 0;
	}
	
	var files = $('.statement-inp')[0].files;
	
	$('#box-statement span').html(files[0].name);
	var error = '';
	var form_data = new FormData();
	
	var filepath = folderName+'/'+files[0].name.replace(/\s+/g, '_');
	
	for(var count = 0; count<files.length; count++){
		  
	   var name = files[count].name;
	   var extension = name.split('.').pop().toLowerCase();
	   if(jQuery.inArray(extension, ['png','jpg','jpeg','pdf']) == -1){
		   
			alert("File type not allowed");
			
			return false;
		   
	   }else{
		   
			form_data.append("files[]", files[count]);
	   }
	}
	
	if(error == ''){
		$('#statement-meter-text').html("Uploading...");
	   $.ajax({
		    xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						$("#statement-progress-bar").css("width", percentComplete + '%');
						//$("#progress-bar").html(percentComplete+'%');
						if(percentComplete === 100){
					    
    					    $('#statement-state').val(1);
    					    
    					}
					}
				}, false);
				return xhr;
			},
			url:baseUrl+"rss/uploadIdentification/"+folderName, //base_url() return http://localhost/tutorial/codeigniter/
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
			success:function(data, folder, pictures){
				$('#statement-meter-text').html("Done");
				$('#statement-fileName').html("<span style='color:green;'>Successful upload</span>");
			 	$('#statement').val(filepath);

			}
	   });
	}else{
		
		$('#statement-filename').html("<span style='color:red;'>"+error+"</span>");
		
	}
	
});
