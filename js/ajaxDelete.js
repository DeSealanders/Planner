$(document).ready(function () {

    // Deletebox html for the popup
    var deleteBox = $('<div class="deleteBox">' +
        '<p>Are you sure you want to delete?</p>' +
        '<button class="confirm">Yes</button>' +
        '<button class="cancel">Cancel</button></div>');

    // Show the popup upon clicking
    $('span.delete').click(function() {
        $(this).parents('li.event-item').append(deleteBox);

        // Bind cancel option
        $(this).parents('li.event-item').find('.cancel').bind('click', function () {
            deleteBox.remove();
            return false;
        })

        // Bind confirm option
        $(this).parents('li.event-item').find('.confirm').bind('click', function () {

            // Ajax call to remove item from the database
            var href = $(this).parents('li.event-item').find('a').attr('href');
            var eventId = getEventIdFromUrl(href);
            $.post('ajax.php', {
                    event: eventId,
                    action: 'delete' }
            ).done(function( data ) {
                    if(data != 'success') {
                        alert('Something went wrong');
                    }
                });

            // Remove the event from the DOM
            $(this).parents('li.event-item').remove();

            // Always return false to block other click actions
            return false;
        })
        return false;
    });
});

/**
 * Get eventid from the href
 * Eg delete.php?event=gj11zj2njb will output gj11zj2njb
 */
function getEventIdFromUrl(href) {
    var split = href.split('=');
    if(split.length == 2) {
        return split[1];
    }
    else {
        // Backup method
        var index = href.indexOf('event');
        return href.substr(index+6);
    }
}