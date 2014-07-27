<?php

class EventManager {
    private $events;

    private function __construct() {
        $this->events = array();
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new EventManager();
        }
        return $instance;
    }

    public function getEvents() {
        $eventFactory = EventFactory::getInstance();
        $eventFactory->loadEvents();
        return $this->events;
    }

    public function addEvent(Event $event) {
        if(!isset($this->events[$event->getId()])) {
            $this->events[$event->getId()] = $event;
        }
        else {
            Throw new Exception('Duplicate event ids found');
        }
    }

    public function removeEvent($eventId) {
        if(isset($this->events[$eventId])) {
            unset($this->events[$eventId]);
        }
    }

    public function editEvent(Event $event) {
        if(isset($this->events[$event->getId()])) {
            $this->events[$event->getId()] = $event;
        }
    }

} 