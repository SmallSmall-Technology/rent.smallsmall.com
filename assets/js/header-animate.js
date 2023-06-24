// JavaScript Document

/*var animateFlag = true

var element = document.querySelector(".element")



window.addEventListener("scroll", function() {

  if(this.pageYOffset > 0) {

    if(animateFlag) {

      element.classList.add("animateElement");

      animateFlag = false;

    }

  }

})*/
jQuery(document).ready(function($){
    $(window).scroll(function(){
    	
    	if ($(window).scrollTop() >= 150) {
    		
    		$('.header').removeClass('header-web');
    		$('.header').addClass('header-sticky');
    		
    	}else {
    		
    	   	$('.header').removeClass('header-sticky');
    	   	$('.header').addClass('header-web');
    		
    	}
    });
    
    $(window).scroll(function(){
    	
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
    });
});