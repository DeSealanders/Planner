$(document).ready(function () {
    menuSetup();
    setupListOrGrid();
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




