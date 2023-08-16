var baseUrl = "https://dev-rent.smallsmall.com/";

// $(document). on('click', '.remove-img', function(){
// 	"use strict";
// 	var remove_img_name = $(this).attr("id").replace(/img-/, "");
	
// 	var the_values = remove_img_name.split('-');
	
// 	//folder            //image
// 	//the_values[0]+' - '+the_values[1];
	
// 	var folder = $('#foldername').val();
	
// 	$(this).html('removing...');
	
// 	var id = the_values[2];
					
// 	//$(this).parent().remove();
	
// 	if(confirm("Are you sure you want to DELETE image?")){
		
// 		var data = {
			
// 			"imgName" : the_values[1],
			
// 			"folder"  : the_values[0]+'/'+folder
// 		};
		
// 		$.ajaxSetup ({ cache: false });
// 		$.ajax({

// 			url : baseUrl+'admin/removeImg/',

// 			type: "POST",

// 			async: true,

// 			data: data,

// 			success	: function (data){

// 				if(data == 1){
										
// 					alert("Image successfully deleted!" );
					
// 					$('.removal-id-'+id).remove();
							
// 				}else{

// 					alert('Could not delete image');
					
// 					$('.remove-img').html('remove <i class"fa fa-trash"></i>');

// 				}				

// 			}  

// 		});
// 	}else{
// 		$(this).html('remove <i class"fa fa-trash"></i>');
// 	}
	
// }); 

$(document).on('click', '.remove-img', function(){
    "use strict";
    var remove_img_name = $(this).attr("id").replace(/img-/, "");
    var the_values = remove_img_name.split('-');
    var folder = $('#foldername').val();
    var id = the_values[2];
    
    $(this).html('removing...');
    
    if (confirm("Are you sure you want to DELETE image?")) {
        var data = {
            "imgName": the_values[1],
            "folder": the_values[0] + '/' + folder
        };
        
        $.ajaxSetup({ cache: false });
        $.ajax({
            url: 'YOUR_BASE_URL/admin/removeImg/', // Replace with your actual base URL
            type: "POST",
            async: true,
            data: data,
            success: function (data) {
                if (data == 1) {
                    alert("Image successfully deleted!");
                    console.log("Image deleted from S3. Image URL: " + data);
                    $('.removal-id-' + id).remove();
                } else {
                    alert('Could not delete image');
                    console.log("Image deletion failed: " + data);
                    $('.remove-img').html('remove <i class"fa fa-trash"></i>');
                }
            },
            error: function (xhr, status, error) {
                console.log("AJAX error:", error);
            }
        });
    } else {
        $(this).html('remove <i class"fa fa-trash"></i>');
    }
});


$(document). on('click', '.remove-btl-img', function(){
    
	"use strict";
	
	var remove_img_name = $(this).attr("id").replace(/img-buytolet-/, "");
	
	var the_values = remove_img_name.split("-");
	
	var img_name = the_values[0];
	
	var folder = $('#foldername').val();
	
	$(this).html('removing...');
	
	var id = the_values[1];
	
	if(confirm("Are you sure you want to DELETE image?")){
		
		var data = {
			
			"imgName" : img_name,
			
			"folder"  : folder
		};
		
		$.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/removeBtlImg/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){

				if(data == 1){
										
					alert("Image successfully deleted!" );
					
					$('.removal-id-'+id).remove();
							
				}else{

					alert('Could not delete image');
					
					$(".remove-btl-img").html('remove <i class"fa fa-trash"></i>');

				}				

			}  

		});
	}else{

		$(".remove-btl-img").html('remove <i class"fa fa-trash"></i>');

	}
	
}); 
$(document). on('click', '.remove-stay-img', function(){
    
	"use strict";
	
	var remove_img_name = $(this).attr("id").replace(/img-/, "");
	
	var the_values = remove_img_name.split('-');
	
	//folder            //image
	//the_values[0]+' - '+the_values[1];
	
	var folder = $('#foldername').val();
	
	$(this).html('removing...');
	
	var id = the_values[2];
					
	//$(this).parent().remove();
	
	if(confirm("Are you sure you want to DELETE image?")){
		
		var data = {
			
			"imgName" : the_values[1],
			
			"folder"  : the_values[0]+'/'+folder
		};
		
		$.ajaxSetup ({ cache: false });
		$.ajax({

			url : baseUrl+'admin/removeStayoneImg/',

			type: "POST",

			async: true,

			data: data,

			success	: function (data){

				if(data == 1){
										
					alert("Image successfully deleted!" );
					
					$('#removal-id-'+id).remove();
							
				}else{

					alert('Could not delete image');
					$(this).html('remove <i class"fa fa-trash"></i>');

				}				

			}  

		});
	}else{
		$(this).html('remove <i class"fa fa-trash"></i>');
	}
	
}); 