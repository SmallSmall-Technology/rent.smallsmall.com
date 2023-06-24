  $(document).ready(function() {
// password eye icon script
      // target the link
      $(".toggle_hide_password").on('click', function(e) {
        e.preventDefault()
    
        // get input group of clicked link
        var input_group = $(this).closest('.input-group')
    
        // find the input, within the input group
        var input = input_group.find('input.form-control')
    
        // find the icon, within the input group
        var icon = input_group.find('i')
    
        // toggle field type
        input.attr('type', input.attr("type") === "text" ? 'password' : 'text')
    
        // toggle icon class
        icon.toggleClass('fa-eye-slash fa-eye')
      })


      // multiple form
      var current = 1,current_step,next_step,steps;
      steps = $("fieldset").length;
      $(".next").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
      });
      $(".previous").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
      });
      setProgressBar(current);
      // Change progress bar action
      function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        var fig = parseFloat(3 / steps) * curStep;
        fig = fig.toFixed();
        $(".progress-bar")
          .css("width",percent+"%");
          $(".progress-p").html(fig+" of "+steps);		
      }
  });