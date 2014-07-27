<?php

class EventExample {

    private $eventFactory;

    public function __construct() {
        $this->eventFactory = EventFactory::getInstance();
    }

    public function createEvent($eventId = false) {
        $this->eventFactory->addEvent($eventId, 'Taart eten', 'Samen gezellig de koelkast leegmaken', '28-07-2014 12:00');
    }

    public function editEvent($eventId) {
        $this->eventFactory->editEvent($eventId, 'Taart veroberen', 'Samen gezellig de koelkast leegmaken', '28-07-2014 12:00');
    }

    public function deleteEvent($eventId) {
        $this->eventFactory->removeEvent($eventId);
    }

} 