$(document).ready(function () {
    menuSetup();
    setupListOrGrid();
    setDutchTranslations();
    eventEndDateCheckbox();

    //TESTING

    $(function () {
        var deleteBox = '<span class="deleteBox"><p>Are you sure you want to delete?</p><span class="cancel">Cancel</span><span class="confirm">Yes</span></span>';
        $('.deletenew').each(function () {
            $(this).append(deleteBox);
        }).click(function () {
            if (!$(this).hasClass('selected')) {
                $(this).addClass('selected');
                var owner = $(this);

                $(this).find('.cancel').unbind('click').bind('click', function () {
                    owner.removeClass('selected');
                    return false;
                })

                $(this).find('.confirm').unbind('click').bind('click', function () {
                    $(this).parent().addClass('loading');
                    var parent = $(this).parent();

                    //ajax to delete

                    setTimeout(function () { //On success
                        parent.addClass('deleted');
                        setTimeout(function () {
                            owner.fadeOut(600);

                            //remove item deleted

                            setTimeout(function () {
                                owner.find('.deleted').removeClass('loading').removeClass('deleted');
                                owner.removeClass('selected');
                                $('.event-item').remove();
                            }, 1000)
                        }, 1000)
                    }, 1000)

                    return false;
                })
            }
            return false;
        });
    })


    $(window).resize(function () {
        if ($(window).width() < 800) {
            if ($(".events").hasClass("list")){
                $('.events').removeClass('list').addClass('grid');
            }
            else {
            }
            $('.toggler').hide();
        }
        else {
            $('.toggler').show("fast");
        }

    });
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
            $("#eventEndDateText").html("Kies de tijd waarop het event eindigt");
            $("#endDate").hide("fast");
        } else {
            $("#eventEndDateText").html("Kies de datum en tijd waarop het event eindigt");
            $("#endDate").show("fast");
        }
    });
}





