$(document).ready(function () {
    menuSetup();
    setupListOrGrid();
    setDutchTranslations();
    eventEndDateCheckbox();
});

function menuSetup() {
    var w = $(window).width(),
        toggle = $('#toggle-menu'),
        menu = $('nav ul'),
        hasChild = $('.has-child'),
        dropdown = $('.dropdown');

    $(function () {
        $(toggle).on('click', function (e) {
            e.preventDefault();
            menu.toggle();
        });

        $(hasChild).click(function (e) {
            e.preventDefault();
            dropdown.toggle();
        });
    });

    $(window).resize(function () {
        if (w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
}

function setupListOrGrid() {
    $(function () {
        return $('[data-toggle]').on('click', function () {
            var toggle;
            toggle = $(this).addClass('active').attr('data-toggle');
            $(this).siblings('[data-toggle]').removeClass('active');
            return $('.events').removeClass('grid list').addClass(toggle);
        });
    });
}

function setDutchTranslations() {
    $.fn.datetimepicker.dates['nl'] = {
        days: ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"],
        daysShort: ["Zon", "Maa", "Din", "Woe", "Don", "Vrij", "Zat"],
        daysMin: ["Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za"],
        months: ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"],
        today: "Vandaag"
    };
}


function eventEndDateCheckbox() {
    $("#eventEndDateCheckbox").click(function () {
        if ($(this).is(":checked")) {
            $("#input-endDate").val("");
            $("#eventEndDateText").html("Kies de tijd waarop het event eindigt");
            $("#endDate").hide();
        } else {
            $("#eventEndDateText").html("Kies de datum en tijd waarop het event eindigt");
            $("#endDate").show("fast");
        }
    });
}



