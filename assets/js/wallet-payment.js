//Javascript document

var baseUrl = "https://dev-rent.smallsmall.com/";

$('.wallet-transaction').click(function(){
    
    var details = $(this).attr('id').replace(/wallet-transaction-/,'');
    
    var book_details = details.split('-');
    
    var amount = book_details[0];
    
    var bookingID = book_details[1];
    
    if(amount == '' || amount < 1 || bookingID == ''){
        
        alert("Looks like you have no subscription yet.");
        
        return false;
        
    }
    
    var response = confirm('Do you wish to proceed?');
    
    if(response){
    
        //alert("Amount: "+amount+" Booking ID: "+bookingID);
           
        $('#wallet-transaction-'+amount).removeClass('wallet-transaction');
        
        $('#wallet-transaction-'+amount).addClass('grey-bg');
        
        $('#wallet-transaction-'+amount).css('cursor', 'not-allowed');
        
        var data = {"purchase_type" : "subscription", "amount" : amount, "bookingID" : bookingID};
        
        $.ajaxSetup ({ cache: false });
        
        $.ajax({			
        
    		url : baseUrl+"loans/purchase/",
    		
    		type : "POST",
    		
    		dataType : 'json',
    		
    		data : data,
    		
    		success: function(data) {
    		    
    			if(data.result == 'success'){
    			    
    			    alert("Success :"+data.message);
    			    
    			    $('#wallet-transaction-'+amount).addClass('wallet-transaction');
        
                    $('#wallet-transaction-'+amount).removeClass('grey-bg');
                    
                    $('#wallet-transaction-'+amount).css('cursor', 'pointer');
                    
                    window.location.href = baseUrl+"user/dashboard";
                    
                    return false;
                    
    			}else if(data.result == 'error'){
    			    
    			    alert("Error :"+data.message);
    			    
    			    $('#wallet-transaction-'+amount).addClass('wallet-transaction');
        
                    $('#wallet-transaction-'+amount).removeClass('grey-bg');
                    
                    $('#wallet-transaction-'+amount).css('cursor', 'pointer');
                    
                    return false;
    			    
    			}
    
    		},
    		
    		error: function() {
    		    
    		    alert('Contact admin!');
    		    
    		    $('#wallet-transaction-'+amount).addClass('wallet-transaction');
        
                $('#wallet-transaction-'+amount).removeClass('grey-bg');
                
                $('#wallet-transaction-'+amount).css('cursor', 'pointer');
                
                return false;
    		    
    		}
        
        });
        
    }else{
        
        return false;
    }
    
});