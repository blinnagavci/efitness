$(document).ready(function () {
    $(".main-left>ul>li").each(function () {
        if ($(this).find("ul").length > 0 && $(this).children().hasClass("active")) {
            $(this).find("ul").show();
        }
    });
//    $("#dialog-confirm").dialog({
//        autoOpen: false,
//        resizable: false,
//        height: "auto",
//        width: 400,
//        modal: false,
//        buttons: {
//            "Delete member": function () {
//                callbackFunctionTrue();
//                $(this).dialog("close");
//            },
//            Cancel: function () {
//                callbackFunctionTrue();
//                $(this).dialog("close");
//            }
//        },
//        close: function (event, ui) {
//            alert("Member has been successfully deleted.");
//        }
//    });
//    $(".remove-member").click(function () {
//        $("#dialog-confirm").dialog('open');
//    });
    $(".main-left-after").width($('.main-left').width());
    $(".main-right").css("margin-left", $(".main-left").width());
    $(".main-right-full input, .main-right-full select").prop("disabled", true);
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
    $(".employee-date-picker").datepicker({
        minDate: new Date(),
        changeYear: true,
        changeMonth: true,
        yearRange: "-0:+50"
    });
//    $(".date-picker, .membership-date-picker").datepicker("option", "dateFormat", 'dd-mm-yy');
    $("span.date:after").click(function () {
        $(".date-picker, .membership-date-picker, .employee-date-picker ").datepicker("show");
    });

    validateForms();
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
    $("input.readonly").change(function () {
        $(this).removeClass("error");
    });
    $(document).on("focusout", ".readonly", function () {
        $(this).prop('readonly', false);
    });

});

$(window).resize(function () {
    $(".main-right").css("margin-left", $(".main-left").width());
//    $(".main-left-after").width($('.main-left').width());
});

function validateForms() {
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
    $("input.number").on('keydown paste', function (e) {
        -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault();
    });
    $(".add-membership-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $(".remove-membership-form").validate({
        errorPlacement: function () {
            return false;
        }
    });

    $("#searchform").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#add-membership").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#member-edit-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#login-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#employee-form").validate({
        errorPlacement: function () {
            return false;
        }
    });

    $("#employee-edit-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $("#add-employee-contract").validate({
        errorPlacement: function () {
            return false;
        }
    });
    $(".add-employee-type-form").validate({
        errorPlacement: function () {
            return false;
        }
    });

    $(".remove-employee-type-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    
    $("#account-form").validate({
        errorPlacement: function () {
            return false;
        }
    });
    
    $("#account-edit-form").validate({
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
                $('#member-upload, #employee-upload').attr('disabled', false);
                $("span.error").remove();
                break;
            default:
                if (!($("span.error").is(":visible"))) {
                    $("#member-upload, #employee-upload").after("<span class='error'>Wrong file format</span>");
                }
                $('#member-photo, #employee-photo').attr('src', 'repository/no_image.png');
                $("#member-upload, #employee-upload").val('');
        }
    });
    $('#remove').hide();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#member-photo, #employee-photo').attr('src', e.target.result);
            },
                    reader.readAsDataURL(input.files[0]);
        }
    }

    $("#member-upload, #employee-upload").change(function () {
        if ($('#member-upload, #employee-upload').val() !== "") {

            $('#remove').show();
            $('#member-photo, #employee-photo').show('slow');
        } else {
            $('#remove').hide();
        }
        readURL(this);
    });


    $('#remove').click(function () {
        $('#member-upload, #employee-upload').val('');
        $(this).hide();
        $('#member-photo, #employee-photo').attr('src', 'repository/no_image.png');
    });
}

function generatePDF() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('.main-box')[0];
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true;
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 700
    };
    pdf.fromHTML(
            source,
            margins.left,
            margins.top, {
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },
            function (dispose) {
                pdf.save('MemberList.pdf');
            }, margins
            );
}
