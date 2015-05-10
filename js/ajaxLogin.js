$(document).ready(function () {

    $('#frmLogin').submit(function (e) {
        e.preventDefault();

        // -- reset alerts
        resetAlerts();
    });

    // -- form validation
    $.validate({
        form: '#frmLogin',
        language: nederlands,
        validateOnBlur: false,
        errorMessagePosition: 'top',
        onSuccess: function () {
            // -- show preloader
            $('body').toggleClass('loaded');
            $.ajax({
                type: 'POST',
                url: '/ajax',
                data: $("#frmLogin").serialize(),
                success: function (data) {
                    var result = $.trim(data);
                    if (result == 'true') {
                        // -- hide preloader
                        $('body').toggleClass('loaded');
                        setTimeout(function () {
                            window.location.replace("/admin/dashboard");
                        }, 1000);

                    }
                    else if (result == 'false') {
                        // -- alert
                        $('#alert-error').show();
                        // -- hide preloader
                        $('body').toggleClass('loaded');
                    }
                }
            });
        }
    });

    $('a#logout').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/ajax',
            data: {hfAction: 'hfLogout'},
            success: function (data) {
                var result = $.trim(data);
                if (result == 'true') {
                    window.location.replace("/");
                }
            }
        });
    });
});