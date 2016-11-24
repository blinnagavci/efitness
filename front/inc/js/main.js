$(document).ready(function () {
    $('.main-left>ul>li a').click(function () {
        $(this).parent().siblings().children().removeClass("active");
        $(this).parent().children("ul").slideToggle();
        $(this).parent().siblings().find("ul").slideUp();
        $(this).addClass("active");
    });
});