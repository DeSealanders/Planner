<?php

class EventExample {

    private $eventFactory;

    public function __construct() {
        $this->eventFactory = EventFactory::getInstance();
    }

    public function createEvent($eventId = false) {
        $this->eventFactory->addEvent($eventId, 'Taart eten', 'Samen gezellig de koelkast leegmaken', '2014-07-28 12:00', '2014-07-29 12:00', false, 1);
    }

    public function editEvent($eventId) {
        $this->eventFactory->editEvent($eventId, 'Taart veroberen', 'Samen gezellig de koelkast leegmaken', '2014-07-28 12:00', '2014-07-29 12:00', false, 1);
    }

    public function deleteEvent($eventId) {
        $this->eventFactory->removeEvent($eventId);
    }

} 