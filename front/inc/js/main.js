$(document).ready(function () {
//    $(".main-left>ul>li").each(function () {
//        if ($(this).find("ul").length > 0) {
//            $(this).addClass("right-arrow");
//        }
//    });
    $('.main-left>ul>li a').click(function () {
        var innerList = $(this).parent().find("ul");
        var innerList2 = $(this).parent();
        $(this).parent().siblings().children().removeClass("active");
        innerList.slideToggle();
        if (innerList.length > 0) {
//            if (innerList2.hasClass("down-arrow")) {
//                innerList2.removeClass("down-arrow").addClass("right-arrow");
//            } else {
//                innerList2.removeClass("right-arrow").addClass("down-arrow");
//            }
            innerList.find("a").removeClass("active");
            innerList.find("a").first().addClass("active");
        }
//        if (innerList.length === 0) {
//            $(".main-left>ul>li").each(function () {
//                if ($(this).hasClass("down-arrow")) {
//                    $(this).removeClass("down-arrow").addClass("right-arrow");
//                }
//            });
//        }

        $(this).parent().siblings().find("ul").slideUp();
        $(this).addClass("active");
    });
    $(".date-picker").datepicker();
});