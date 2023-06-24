//Javascript 
$('.rental-option-tab').click(function(){

    var the_option = $(this).attr('id');

    $('.subscription-list-container').hide();

    if(the_option == 'subscription'){

        $('#stayone').removeClass('active');

        $('#subscription').addClass('active');

        $('#rss-subscription-pane').show();

    }else if(the_option == 'stayone'){

        $('#subscription').removeClass('active');

        $('#stayone').addClass('active');

        $('#stayone-subscription-pane').show();

    }
});