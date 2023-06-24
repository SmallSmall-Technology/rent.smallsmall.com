// JavaScript Document
$('.duration').on('change', function(){
	var duration = $('.duration').val();
	if($(".payment_plan option[value='Quarterly']").is(':hidden')){
		return false;
	 }
	
	if(duration == 3){
	   $(".payment_plan option[value='Quarterly']").hide();		
	   $(".payment_plan option[value='Bi-annually']").hide();
	}else if(duration == 6){
	   $(".payment_plan option[value='Quarterly']").hide();		
	   $(".payment_plan option[value='Bi-annually']").hide();			 
	}
	//$(".payment_plan option[value='6']").hide();
});

$('.switch').click(function(){
    
    var act = $(this).attr('id');
    
    if(act == 'inspect'){ 
        
        $('#act-inspect').removeClass('whiten');
        
        $('#act-subscribe').addClass('whiten');
        
        setTimeout(function(){
        
            $('.switch').attr('id', 'subscription');
        
            $('.inspection-form').hide();
        
            $('.subscription-form').show();
        
            return false; }
         , 500);
        
        //return false;
        
    }else if(act == 'subscription'){
        
        $('#act-subscribe').removeClass('whiten');
        
        $('#act-inspect').addClass('whiten');
        
        setTimeout(function(){
        
            $('.switch').attr('id', 'inspect');
        
            $('.subscription-form').hide();
        
            $('.inspection-form').show();
        
            return false; }
         , 500);
        
        //return false;
        
    }
    
});