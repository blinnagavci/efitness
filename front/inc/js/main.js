$(document).ready(function () {
    $(".main-left>ul>li").each(function () {
        if ($(this).find("ul").length > 0 && $(this).children().hasClass("active")) {
            $(this).find("ul").show();
        }
    });
    $(".main-left-after").width($('.main-left').width());
    $(".main-right").css("margin-left", $(".main-left").width());
//    $('.main-left>ul>li a').click(function () {
//        var innerList = $(this).parent().find("ul");
//        var innerList2 = $(this).parent();
//        $(this).parent().siblings().children().removeClass("active");
//        innerList.slideToggle();
//        if (innerList.length > 0) {
////            if (innerList2.hasClass("down-arrow")) {
////                innerList2.removeClass("down-arrow").addClass("right-arrow");
////            } else {
////                innerList2.removeClass("right-arrow").addClass("down-arrow");
////            }
//            innerList.find("a").removeClass("active");
//            innerList.find("a").first().addClass("active");
//        }
////        if (innerList.length === 0) {
////            $(".main-left>ul>li").each(function () {
////                if ($(this).hasClass("down-arrow")) {
////                    $(this).removeClass("down-arrow").addClass("right-arrow");
////                }
////            });
////        }
//
//        $(this).parent().siblings().find("ul").slideUp();
//        $(this).addClass("active");
//    });

    $(".date-picker").datepicker({
        maxDate: new Date(),
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:+0"
    });
    $(".membership-date-picker").datepicker({
        minDate: new Date(),
        changeYear: true,
        changeMonth: true,
        yearRange: "-0:+50"
    });
//    $(".date-picker, .membership-date-picker").datepicker("option", "dateFormat", 'dd-mm-yy');
    $("span.date:after").click(function () {
        $(".date-picker, .membership-date-picker").datepicker("show");
    });

    validateMemberForm();
    controlImg();
    $(".generate-pdf").click(function () {
        generatePDF();
    });
//    $(".readonly").on('keydown paste', function (e) {
//        e.preventDefault();
//    });
    $(document).on("focusin", ".readonly", function () {
        $(this).prop('readonly', true);
    });

    $(document).on("focusout", ".readonly", function () {
        $(this).prop('readonly', false);
    });
});
$(window).resize(function () {
    $(".main-right").css("margin-left", $(".main-left").width());
//    $(".main-left-after").width($('.main-left').width());
});

function validateMemberForm() {

    $("#member-form").validate({
        errorPlacement: function () {
            return false;
        },
        focusInvalid: false,
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $("html, body").animate({scrollTop: 0}, 500);
            }
        }
    });
    $("input[class='number']").on('keydown paste', function (e) {
        -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault();
    });
    $("#remove-membership-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#new-membership").validate({
        errorPlacement: function () {
            return false;
        }
    });
}

function controlImg() {
    $('input[type="file"]').change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                $('#member-upload').attr('disabled', false);
                $("span.error").remove();
                break;
            default:
                if (!($("span.error").is(":visible"))) {
                    $("#member-upload").after("<span class='error'>Wrong file format</span>");
                }
                $('#member-photo').attr('src', 'repository/no_image.png');
                $("#member-upload").val('');
        }
    });
    $('#remove').hide();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#member-photo').attr('src', e.target.result);
            },
                    reader.readAsDataURL(input.files[0]);
        }
    }

    $("#member-upload").change(function () {
        if ($('#member-upload').val() !== "") {

            $('#remove').show();
            $('#member-photo').show('slow');
        } else {
            $('#remove').hide();
        }
        readURL(this);
    });


    $('#remove').click(function () {
        $('#member-upload').val('');
        $(this).hide();
        $('#member-photo').attr('src', 'repository/no_image.png');
    });
}

function generatePDF() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.

    source = $('.main-box')[0],
            // we support special element handlers. Register them with jQuery-style 
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors 
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true;
                }
            };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 700
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, {// y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers

            },
            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('MembersList.pdf');
            }, margins
            );
}