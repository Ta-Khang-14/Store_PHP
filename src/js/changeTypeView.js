$(document).ready(function () {
    $(".table-view").on("click", function (e) {
        if (!$(".table-view").hasClass("active")) {
            $(".main-product").toggleClass("list");
            $(".table-view").toggleClass("active");
            $(".list-view").toggleClass("active");
        }
    });
    $(".list-view").on("click", function (e) {
        if (!$(".list-view").hasClass("active")) {
            $(".main-product").toggleClass("list");
            $(".list-view").toggleClass("active");
            $(".table-view").toggleClass("active");
        }
    });
});
