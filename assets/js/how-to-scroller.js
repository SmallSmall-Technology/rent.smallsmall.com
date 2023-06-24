//Javascript document
var fixmeTop = $('.how-to-pane-inner').offset().top + 30;       // get initial position of the element

$(window).scroll(function() {                  // assign scroll event listener

    var currentScroll = $(window).scrollTop(); // get current position
    
    if (currentScroll >= fixmeTop && currentScroll <= (fixmeTop + 900)){
        $('.how-to-pane-inner').css("position", "fixed");
        $('.how-to-pane-inner').css("top", '30px');
        $('.how-to-pane-inner').css("left", '10%');
    }else{
        $('.how-to-pane-inner').css("position", "relative");
        $('.how-to-pane-inner').css("left", 0);
        $('.how-to-pane-inner').css("top", 0);
    }

    if (currentScroll >= fixmeTop && currentScroll < (fixmeTop + 100)) { // apply position: fixed if you
        $('#signup-and-search').fadeIn(1000);
        $('.topic-item').removeClass('active-topic-item');
        $('#signup-item').attr('class', 'topic-item active-topic-item');
        $('.how-to-img').html('<img src="https://test.rentsmallsmall.com/assets/images/sign-up-guy.png" alt="Signup Guy" />');
    }else{
        $('#signup-and-search').hide();
    }
    
    if (currentScroll >= (fixmeTop + 150) && currentScroll < (fixmeTop + 200)) { // apply position: fixed if you
        $('#inspection').fadeIn(1000);
        $('.topic-item').removeClass('active-topic-item');
        $('#inspection-item').attr('class', 'topic-item active-topic-item');
        $('.how-to-img').html('<img src="https://test.rentsmallsmall.com/assets/images/schedule_guy.png" alt="Schedule Guy" />');
    }else{
        $('#inspection').hide();
    }
    
    if (currentScroll >= (fixmeTop + 220) && currentScroll < (fixmeTop + 270)) { // apply position: fixed if you
        $('#verify').fadeIn(1000);
        $('.topic-item').removeClass('active-topic-item');
        $('#verification-item').attr('class', 'topic-item active-topic-item');
        $('.how-to-img').html('<img src="https://test.rentsmallsmall.com/assets/images/verified_lady.png" alt="Verified Lady" />');
    }else{
        $('#verify').hide();
    }
    
    if (currentScroll >= (fixmeTop + 290)) { // apply position: fixed if you
        $('#rent-and-pay').fadeIn(1000);
        $('.topic-item').removeClass('active-topic-item');
        $('#payment-item').attr('class', 'topic-item active-topic-item');
        $('.how-to-pane-inner').css("position", "relative");
        $('.how-to-pane-inner').css("left", 0);
        $('.how-to-pane-inner').css("top", 0);
        $('.how-to-img').html('<img src="https://test.rentsmallsmall.com/assets/images/sign-up-guy.png" alt="Sign up guy" />');
    }else{
        $('#rent-and-pay').fadeOut();
    }
});


/*$('#signup-and-search').focus(function(){
    alert('hi');
});*/