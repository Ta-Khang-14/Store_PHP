$(document).ready(function () {
    function removeActive(list, id) {
        list.forEach((element) => {
            if (element.id != id) {
                element.classList.remove("active");
            }
        });
    }
    function checkActive(list) {
        list.forEach((element) => {
            if (element.classList.contains("active")) {
                return true;
            }
        });
        return false;
    }
    // -------------------------------------------
    $(".btn-menu").on("click", (e) => {
        $(".modal-custom").removeClass("active");
        $("#menu").removeClass("active");
    });
    $("#mobile-menu").on("click", (e) => {
        $("#menu").toggleClass("active");
        $(".modal-custom").toggleClass("active");
        removeActive(list, "menu");
    });

    // ------------------------------------------
    $(".btn-list").on("click", (e) => {
        $(".modal-custom").removeClass("active");
        $("#list-op").removeClass("active");
    });
    $("#mobile-list").on("click", (e) => {
        $("#list-op").toggleClass("active");
        $(".modal-custom").toggleClass("active");
        removeActive(list, "list-op");
    });

    // ---------------------------------------------
    $("#mobile-search").on("click", (e) => {
        $("#mobile-search-main").toggleClass("active");
        $(".modal-custom").toggleClass("active");
        removeActive(list, "mobile-search-main");
    });

    // ------------------------------------------
    $(".btn-cart").on("click", (e) => {
        $(".modal-custom").removeClass("active");
        $("#mobile-cart-main").removeClass("active");
    });
    $("#cart-mobile").on("click", (e) => {
        $("#mobile-cart-main").toggleClass("active");
        $(".modal-custom").toggleClass("active");
        removeActive(list, "list-op");
    });
});
