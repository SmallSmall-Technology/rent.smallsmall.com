$('.search-pop').click(function(){
    $('.mobile-search-pane').css('display', 'block');
    $('body').addClass('no-scroll');
});
$('.close-search-overlay').click(function(){
    $('.mobile-search-pane').css('display', 'none');
    $('body').removeClass('no-scroll');
});

$('.bed-option-item').click(function(){

    $('.bed-option-item').removeClass('active-bed-option');

    var the_el = $(this);

    the_el.addClass('active-bed-option');

    var the_val = the_el.attr('id');

    $('.bed_num').val(the_val);

});
$('.bath-option-item').click(function(){

    $('.bath-option-item').removeClass('active-bath-option');

    $(this).addClass('active-bath-option');

    var the_val = $(this).attr('id');

    $('.bath_num').val(the_val);
});
$('.furniture-option-item').click(function(){

    $('.furniture-option-item').removeClass('active-furniture-option');

    $(this).addClass('active-furniture-option');

    var the_val = $(this).attr('id');

    $('.furnishing').val(the_val);

});