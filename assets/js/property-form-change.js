jQuery(document).ready(function($){

    $('input:radio[name="form-type"]').change(function(){
        if ($(this).is(':checked')) {
            // append goes here
            //alert($(this).val());
            if($(this).val() === 'inspection'){            
                $('.subscription-form').hide();
                $('.inspection-form').show();
                return false;
            }else{
                $('.inspection-form').hide();
                $('.subscription-form').show();
                return false;
            }
        }
    });
    $('input:radio[name="form-overlay"]').change(function(){
    
        if ($(this).is(':checked')) {
            // append goes here
            //alert($(this).val());
            if($(this).val() === 'inspection'){            
                $('.inspection-overlay').css('display', 'block');
                $('body').addClass('no-scroll');
                return false;
            }else{
                $('.subscription-overlay').css('display', 'block');
                $('body').addClass('no-scroll');
                return false;
            }
        }
    });
    /*$('.close-mobile-overlay').click( function(){
        $('.mobile-overlays').css('display', 'none');
        $('body').removeClass('no-scroll');
    });*/
    $(document).on('click', '.close-mobile-overlay', function(){
        $('.mobile-overlays').css('display', 'none');
        $('body').removeClass('no-scroll');
    });
});