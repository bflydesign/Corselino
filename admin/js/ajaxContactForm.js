function validateEmail(email) { 
    var regEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regEmail.test(email);
}
function resetForm() {
    $("#name").val("");
    $("#email").val("");
    $("#message").val("");
    $("#inputcaptcha").val("");
}

$(document).ready(function() {    
    $("#confirm").on("click", function(e) {
        e.preventDefault();
        $("#succesmessage").addClass('hidden');
        $("#failmessage").addClass('hidden');
        
        //Check name
        var validName = true;
        if ($("#name").val().length == 0) {
            $("#name").addClass('error');
            validName = false;
        }
        $("#name").change(function() {
            $("#name").removeClass('error');
        })
       //Check email
       var validEmail = true;
       if ($("#email").val().length == 0 || validateEmail($("#email").val()) != true) {
            $("#email").addClass('error');
            validEmail = false;
        }
        $("#email").change(function() {
            $("#email").removeClass('error');
        })
        //Check message
        var validMessage = true;
        if ($("#message").val().length == 0) {
             $("#message").addClass('error');
             validMessage = false;
         }
         $("#message").change(function() {
             $("#message").removeClass('error');
         })
       //Check captcha
       if (validName == true && validEmail == true && validMessage == true) {
            $.ajax({
                 type: 'POST',           
                 url: 'captcha/checkCaptcha.php',
                 data: $("#mailform").serialize(),
                 success: function(data) {                    
                     var result = $.trim(data);
                     if (result == 'false') {
                         $("#inputcaptcha").addClass('error');
                         reloadCaptcha();
                         $("#inputcaptcha").val("");
                     } else if (result == 'true') {
                         $("#inputcaptcha").removeClass('error');
                         //Send email
                         $.ajax({
                            type: 'POST',           
                            url: 'admin/PHPCalls.php?CallID=SendMailFromContactForm',
                            data: $("#mailform").serialize(),
                            success: function(data) {                    
                                var result = $.trim(data);
                                if (result == 'true') {
                                    $("#succesmessage").removeClass('hidden');
                                    reloadCaptcha();
                                    resetForm();                                    
                                } else if (result == 'false') {
                                    $("#failmessage").removeClass('hidden');
                                }
                            }
                        });
                     }
                 }
            });
        } else {
            $.ajax({
                 type: 'POST',           
                 url: 'captcha/checkCaptcha.php',
                 data: $("#mailform").serialize(),
                 success: function(data) {                    
                     var result = $.trim(data);
                     if (result == 'false') {
                         $("#inputcaptcha").addClass('error');
                         reloadCaptcha();
                         $("#inputcaptcha").val("");
                     } else if (result == 'true') {
                         $("#inputcaptcha").removeClass('error');
                         reloadCaptcha();
                         $("#inputcaptcha").val("");
                     }
                 }
            });
        }
    });
});