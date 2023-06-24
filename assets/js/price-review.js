$('.price-review').click(function(){
    
    $('body').addClass('no-scroll');
    
    $('.form-overlay').css('display', 'flex');
    
    var id = $(this).attr('id').replace(/review-button-/,'');
    
    $('#property-id').val(id);
    
});
$(document).on('click', '.close-button', function(){
    
    $('body').removeClass('no-scroll');
    
    $('.form-overlay').css('display', 'none');
    
});