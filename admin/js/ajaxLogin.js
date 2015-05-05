$(document).ready(function(){
         //Logout
        $("a#logout").on("click", function(e) {
                e.preventDefault();

                $.ajax({
                        type: 'POST',           
                        url: 'PHPCalls.php?CallID=Logout',
                        success: function(data) {                    
                                var result = $.trim(data);
                                if (result == 'true') {
                                        window.location.href= '../index.php';
                                }
                        }
                });
        });
        
        //Login
        $("#confirm").on("click", function(e) {
                 e.preventDefault();

                var check = true;
                var empty_fields = ['username','password'];

                for (i=0; i<empty_fields.length; i++) {
                        var $field = $('#'+empty_fields[i]);

                        if ($.trim($field.val()) == '') {
                                    $field.addClass('error');
                                    check = false;
                        }
                        else {
                            $field.removeClass('error');
                        }            
                }

                if (check == true)
                {
                        $.ajax({
                                type: 'POST',           
                                url: 'PHPCalls.php?CallID=Login',
                                data: $("#loginform").serialize(),
                                success: function(data) {                    
                                        var result = $.trim(data);
                                        if(result !== 'error') {
                                                window.location.replace(result);
                                        }
                                        else if(result == 'error') {
                                                alert('Er werd geen match gevonden voor uw login en wachtwoord');
                                        }
                                }
                        });
                }
        });
});