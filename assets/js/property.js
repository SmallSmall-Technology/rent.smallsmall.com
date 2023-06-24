jQuery(document).ready(function($){

    /*$('#inspectionForm').submit(function(e){
            
        e.preventDefault();
    
        $('.popup-container').css("display", "block");
        				
        $('.popup.inspection').css("display", "block");
    
        $(".schedule-inspection").css("opacity","1");
    
        $(".schedule-inspection").html("Schedule inspection");
    
        return false;
    
    });
    
    $('#inspectionForm').submit(function(e){
            
        e.preventDefault();
        
        $('.popup-container').css("display", "block");
        				
        $('.popup.payment-option-pop').css("display", "block");
    });*/
    $('.close-button').click(function(){
            
        $('.popup-container').css("display", "none");
                    
        $('.popup.inspection').css("display", "none");
        
        $('.popup.payment-option-pop').css("display", "none");
        
        $('.popup.subscription').css("display", "none");
        
    });
});