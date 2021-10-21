$(document).ready(menulistener());

function menulistener() {
    $(".navbar-nav a").click(activatemenu);
}

function activatemenu() {
    var currenturl = location.href;

    $(".navbar-nav a").each(function () {
        var targeturl = $(this).prop("href");
        if (targeturl === currenturl) {
            $("nav a").parents("li, ul").removeClass("active");
            $(this).parents("li").addClass("active");
            return false;
        }
    });
}