$(document).ready(function () {
    $("#search-input").on("keyup", function (e) {
        if (!$(".input-search-result").hasClass("active")) {
            $(".input-search-result").addClass("active");
        }
    });
    $("#search-input").on("focusout", function (e) {
        if ($(".input-search-result").hasClass("active")) {
            $(".input-search-result").removeClass("active");
        }
    });
});
