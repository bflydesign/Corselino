function resetForm(){
        $("#successmessage").addClass("hidden");
        $("#errormessage").addClass("hidden");
}

$(document).ready(function(){        
        //Login
        $("#confirm").on("click", function(e) {
                 e.preventDefault();
                 
                 resetForm();

                var check = true;
                var empty_fields = ['lingerie', 'badmode', 'nachtmode', 'heren'];

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
                                url: 'PHPCalls.php?CallID=SaveBrands',
                                data: $("#form_brands").serialize(),
                                success: function(data) {                    
                                        var result = $.trim(data);
                                        if(result !== 'error') {
                                                $("#successmessage").removeClass("hidden");
                                        }
                                        else {
                                                $("#errormessage").removeClass("hidden");
                                        }
                                }
                        });
                }
        });
});