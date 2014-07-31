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
    public function loadEvents($period) {
        $events = $this->queryManager->getEvents($period);
        if($events) {
            foreach($events as $event) {
                $this->addEvent($event['itemid'], $event['name'], $event['description'], $event['startDate'], $event['endDate'], $event['image']);
            }
        }
        else {
            Throw new Exception('No events found');
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
    public function addEvent($id = false, $name, $description, $startDate, $endDate = false, $image = false) {
        $event = new Event($id, $name, $description, $startDate, $endDate, $image);
        $this->eventManager->addEvent($event);
        $this->queryManager->saveEvent($event);
        return $event->getId();
    }

    public function removeEvent($eventId) {
        $this->eventManager->removeEvent($eventId);
        $this->queryManager->deleteEvent($eventId);
    }

    public function editEvent($id = false, $name, $description, $startDate, $endDate = false, $image = false) {
        $event = new Event($id, $name, $description, $startDate, $endDate, $image);
        $this->eventManager->editEvent($event);
        $this->queryManager->updateEvent($event);
    }

} 