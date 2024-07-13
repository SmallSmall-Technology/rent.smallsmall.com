$(document).ready(function(){

   

    $('#menu-bars').click(function(){

        if($('.header-navigation').is(":hidden")){

            $('.header-navigation').slideDown();

        }else{

            $('.header-navigation').slideUp();

        }
    });


    $('.menu-item-parent').click(function(){

        var menu_elem = $(this).attr('id').replace(/menu-item-/, '');

        $('.sub-menu').slideUp();

        $('#'+menu_elem+'-menu').slideDown();

    });

});