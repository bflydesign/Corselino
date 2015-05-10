//$(document).ready(function() {
//    jQuery.fn.darkCenter = function() {
//        this.css("position","absolute");
//        this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
//        this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
//        return this;
//    };
//    $("#container").darkCenter();
//    
//    $(window).bind("resize", function() {
//        $("#container").darkCenter();
//    });
//    
//    $('#container').animate({'margin-top': '50px'}, 1000);    
//});

jQuery.fn.darkCenter = function () {
    this.css("position", "absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2 + $(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2 + $(window).scrollLeft() + "px");
    return this;
};

function centerContainer() {
    $("#container").darkCenter();

    $(window).bind("resize", function () {
        $("#container").darkCenter();
    });

    $('#container').animate({'margin-top': '50px'}, 1000);
}

!function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
}
(document, "script", "twitter-wjs");

// -- FORM VALIDATION
var nederlands = {
    errorTitle : 'Het formulier werd niet goed ingevuld!',
    requiredFields : 'Niet alle verplichte velden werden ingevuld',
    badTime : 'U voerde een foutieve tijdsnotatie in',
    badEmail : 'U voerde een foutief e-mailadres in',
    badTelephone : 'U voerde een foutief telefoonnummer in',
    badSecurityAnswer : 'Het antwoord op de beveiligingsvraag is niet correct',
    badDate : 'U voerde een foutieve datum in',
    lengthBadStart : 'Het antwoord moet liggen tussen ',
    lengthBadEnd : ' tekens',
    lengthTooLongStart : 'De invoer bedraagt meer dan ',
    lengthTooShortStart : 'De invoer bedraagt minder dan ',
    notConfirmed : 'De waarden kunnen niet worden bevestigd',
    badDomain : 'U voerde een foutieve domeinnaam in',
    badUrl : 'U voerde een foutieve URL in',
    badCustomVal : 'U voerde een foutief antwoord in',
    badInt : 'U voerde een foutief nummer in',
    badSecurityNumber : 'Uw rijksregisternummer werd niet correct ingevuld',
    badUKVatAnswer : 'Het BTW-nummer is niet geldig',
    badStrength : 'Uw wachtwoord is niet veilig genoeg',
    badNumberOfSelectedOptionsStart : 'U moet tenminste ',
    badNumberOfSelectedOptionsEnd : ' antwoorden',
    badAlphaNumeric : 'Het antwoord mag enkel alfanumeriekte tekens bevatten ',
    badAlphaNumericExtra: ' en ',
    wrongFileSize : 'De bestandsgrootte overschrijdt de limiet',
    wrongFileType : 'Dit bestandstype is niet toegelaten',
    groupCheckedRangeStart : 'Gelieve te kiezen tussen ',
    groupCheckedTooFewStart : 'Kies minimaal ',
    groupCheckedTooManyStart : 'Kies maximaal ',
    groupCheckedEnd : ' item(s)'
};

function emptyAllInputFields(form) {
    $(form).trigger('reset');
    $(form).each(function () {
        $('textarea').val('');
    })
}

function resetAlerts() {
    $('.alert').hide();
}