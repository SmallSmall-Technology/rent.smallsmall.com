jQuery(document).ready(function($){

    $('.faq-box').click(function(){
    
        $('.faq-box').removeClass('faq-active');
    
        $('.faq-note').css('display', 'none');  
    
        var id_value = $(this).attr('id').replace(/faq-/, '');
    
        $('#note-'+id_value).css('display', 'block');    
    
        //alert("What is wrong2");
    
        $('#faq-'+id_value).addClass('faq-active');
    
        //alert("What is wrong");
    });
    
});