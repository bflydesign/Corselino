function validateEmail(email) { 
    var regEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regEmail.test(email);
}

$(document).ready(function() {
        $("#form_resetpassword").submit(function() {
        return false;
        });

        $("#confirm").on("click", function(){
                 //Melding resetten
                $("#message").html('');
        
                //Check username
                var usernameval = $("#username").val();
                var usernamelen = usernameval.length;

                if (usernamelen == 0) {
                        $("#username").addClass("error");
                }
                $("#username").change(function() {
                        $("#username").removeClass("error");
                });   
                
                //Check email
                var emailval = $("#email").val();
                var emaillen = emailval.length;
                var emailvalid = validateEmail(emailval);

                if (emaillen == 0) {
                    $("#email").addClass("error");
                }                    
                else if (emaillen > 0) {
                    if (emailvalid == false) {
                        $("#email").addClass("error");
                    }
                }
                else emailvalid = true;
                $("#email").change(function() {
                        $("#email").removeClass("error");
                });

                if (emailvalid == true && usernamelen > 0) {
                        $.ajax({
                                type: 'POST',             
                                url: 'PHPCalls.php?CallID=ResetPassword',
                                data: $("#form_resetpassword").serialize(),
                                success: function(data){
                                        var result = $.trim(data);
                                        $("#message").html(result);
                                        setTimeout(function() {
                                            location.href = "index.php";
                                        }, 2000);
                                }
                        });                  
                };
        });
});