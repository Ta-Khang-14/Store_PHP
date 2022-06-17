$(document).ready(function () {
    $(window).on("scroll", function () {
        if (!$(".nav-menu").hasClass("disabled")) {
            if ($(this).scrollTop() >= 100) {
                $(".nav-menu").addClass("disabled");
            }
        }
        if ($(".nav-menu").hasClass("disabled")) {
            if ($(this).scrollTop() == 0) {
                $(".nav-menu").removeClass("disabled");
            }
        }
    });
});
