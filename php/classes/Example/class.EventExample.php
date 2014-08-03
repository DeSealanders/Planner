<?php

class EventExample {


    public function __construct() {

    }

    public function createEvent($eventId = false) {
        $eventArray = array(
            'id' => $eventId,
            'name' => 'Taart eten',
            'description' => 'Samen gezellig de koelkast leegmaken',
            'start' => '2014-07-28 12:00',
            'end' => '2014-07-29 12:00',
            'userid' => 1
        );
        EventFactory::getInstance()->addEvent($eventArray);
        echo '<h2>creating event</h2>';
        var_dump($eventArray);
    }

    public function editEvent($eventId) {
        $eventArray = array(
            'id' => $eventId,
            'name' => 'Taart veroberen',
            'description' => 'Volvreten!',
            'start' => '2014-07-28 12:00',
            'end' => '2014-07-29 12:00',
            'userid' => 1
        );
        EventFactory::getInstance()->editEvent($eventArray);
        echo '<h2>editing event</h2>';
        var_dump($eventArray);
    }

    public function deleteEvent($eventId) {
        echo '<h2>deleting event</h2>';
        var_dump($eventId);
        EventFactory::getInstance()->removeEvent($eventId);
    }

} 