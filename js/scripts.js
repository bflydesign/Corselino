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