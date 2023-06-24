//Javascript File
$('#credit-request').click(function(){
    
    $('body').addClass('no-scroll');
    
    $('.form-overlay').css('display', 'flex');
    
    $('.credit-overlay').css('display', 'flex');
    
});
/*$('.close-button').click(function(){
    
    $('body').removeClass('no-scroll');
    
    $('.credit-overlay').css('display', 'none');
    
});*/
$(document).on('click', '.close-button', function(){
    
    $('body').removeClass('no-scroll');
    
    $('.credit-overlay').css('display', 'none');
    
    $('.form-overlay').css('display', 'none');
    
});