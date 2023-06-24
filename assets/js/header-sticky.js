// JavaScript Document
jQuery(document).ready(function($){
    $(window).scroll(function(){
    
    	var width = $(window).width();
        
        //var s_width = "";
    	//alert(s_width);
    		
    	if (width < 900){
    	    
    		if ($(window).scrollTop() >= 400) {
    		
    			$('.mobile-header').addClass('white');
    			$('.mobile-header').removeClass('none-white');
    			$('.hamburger-menu').addClass('blue');
    			$('.hamburger-menu').removeClass('white');
    			$('.login-btn-mobile').addClass('blue');
    			$('.login-btn-mobile').removeClass('white');
    			$('.mobile-logo').addClass('blue');
    			$('.mobile-logo').removeClass('white');
    			
    		}else {
    			
    			$('.mobile-header').addClass('none-white');
    			$('.mobile-header').removeClass('white');
    			$('.hamburger-menu').addClass('white');
    			$('.hamburger-menu').removeClass('blue');
    			$('.login-btn-mobile').addClass('white');
    			$('.login-btn-mobile').removeClass('blue');	
    			$('.mobile-logo').addClass('white');
    			$('.mobile-logo').removeClass('blue');	
    		}
    	    
    	}
    
        if (width >= 900){
            
    	    if ($(window).scrollTop() >= 600) {
    		
    			$('.web-header').addClass('white');
    			$('.menu').removeClass('with-image');
    			$('.menu').addClass('without-image');
    			$('.logo').addClass('blue');
    			$('.logo').removeClass('white');
    			
    		}else {
    			
    			   $('.web-header').removeClass('white');
    			$('.menu').addClass('with-image');
    			$('.menu').removeClass('without-image');
    			$('.logo').addClass('white');
    			$('.logo').removeClass('blue');		
    		}
    	}	
    	
    });
});

/*$(window).scroll(function(){
	
	if ($(window).scrollTop() >= 100 && (window.innerHeight + window.scrollY) < document.body.offsetHeight) {
		
		//$('.sidebar').removeClass('sidebar-web');
		$('.sidebar').addClass('sidebar-sticky');
		
	}else{
		
	   	$('.sidebar').removeClass('sidebar-sticky');
	   	//$('.sidebar').addClass('sidebar-web');
		
	}
});
$('.close-header-advert').click(function(){
        $('.header-advert').slideUp();
});*/