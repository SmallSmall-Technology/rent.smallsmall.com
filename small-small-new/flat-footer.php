        <script>
            $(document).ready(function(){
                $('.fa-eye').click(function(){

                    let passwordInput = $('.pass');

                    // Toggle the type attribute of the password input
                    if (passwordInput.attr("type") === "password") {
                        $('.pass').attr("type", "text");
                        $('#show-password').removeClass("fa-eye-slash").addClass("fa-eye");
                    } else {
                        $('.pass').attr("type", "password");
                        $('#show-password').removeClass("fa-eye").addClass("fa-eye-slash");
                    }
                });
                
            });
        </script>
    </body>
</html>