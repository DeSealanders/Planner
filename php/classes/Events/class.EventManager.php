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
        return $this->events;
    }

    public function addEvent(Event $event) {
        $this->events[$event->getId()] = $event;
    }

    public function removeEvent(Event $event) {
        unset($this->events[$event->getId()]);
    }

} 