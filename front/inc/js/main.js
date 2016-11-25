$(document).ready(function () {
    $('.main-left>ul>li a').click(function () {
        var innerList = $(this).parent().find("ul");
        $(this).parent().siblings().children().removeClass("active");
        innerList.slideToggle();
        if (innerList.length > 0) {
            innerList.find("a").removeClass("active");
            innerList.find("a").first().addClass("active");
        }
        $(this).parent().siblings().find("ul").slideUp();
        $(this).addClass("active");
    });
});