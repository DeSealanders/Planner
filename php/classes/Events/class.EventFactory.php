<?php

class EventFactory {

    private $eventManager;
    private $queryManager;

    private function __construct() {
        $this->eventManager = EventManager::getInstance();
        $this->queryManager = QueryManager::getInstance();
    }

    /**
     * Load events from database
     */
    public function loadEvents() {
        $events = $this->queryManager->getEvents();
        foreach($events as $event) {
            $this->addEvent($event['itemid'], $event['name'], $event['description'], $event['startDate'], $event['endDate'], $event['image']);
        }
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return EventFactory
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new EventFactory();
        }
        return $instance;
    }

    /**
     * Add an event
     * @param $name
     * @param $description
     * @param $startDate
     * @param bool $endDate
     * @param bool $image
     */
    public function addEvent($name, $description, $startDate, $endDate = false, $image = false) {
        $event = new Event($name, $description, $startDate, $endDate, $image);
        $this->eventManager->addEvent($event);
        $this->queryManager->saveEvent($event);
    }

} 