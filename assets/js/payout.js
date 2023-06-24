//Payout Javascript File

$('.excel-generate').click(function(){
    
    var property_name = $('.property_name').val();
    
    var startDate = $('#startDate').val();
    
    var endDate = $('#endDate').val();
    
    //alert(property_name+' - '+startDate+' - '+endDate);
    
    var data = {"property_name" : property_name, "startDate" : startDate, "endDate" : endDate};
    
    $.ajaxSetup ({ cache: false });
    
	$.ajax({

		url: baseUrl+"rss/generate_payout_report/",

		type: "POST",

		async: true,

		data: data, 

		success	: function (data){			

			if(data == 1){					

				alert("Successful");

				return false;					

			}else{				    

			    alert("Error generating report");
			    
			    return false;

			}			

		}

	});
    
});