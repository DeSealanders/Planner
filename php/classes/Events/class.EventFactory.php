<?php

class EventFactory {

    private function __construct() {

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
     * Load events from database
     */
    public function loadEvents($period) {
        $events = QueryManager::getInstance()->getEvents($period);
        if($events) {
            foreach($events as $event) {
                $this->addEvent($event['itemid'], $event['name'], $event['description'], $event['startDate'], $event['endDate'], $event['image'], $event['userid']);
            }
        }
        else {
            Throw new Exception('No events found');
        }
    }

    /**
     * Add an event
     * @param $name
     * @param $description
     * @param $startDate
     * @param bool $endDate
     * @param bool $image
     */
    public function addEvent($id = false, $name, $description, $startDate, $endDate = false, $image = false, $userid) {
        $event = new Event($id, $name, $description, $startDate, $endDate, $image, $userid);
        EventManager::getInstance()->addEvent($event);
        QueryManager::getInstance()->saveEvent($event);
        return $event->getId();
    }

    public function removeEvent($eventId) {
        EventManager::getInstance()->removeEvent($eventId);
        QueryManager::getInstance()->deleteEvent($eventId);
    }

    public function editEvent($id = false, $name, $description, $startDate, $endDate = false, $image = false, $userid) {
        $event = new Event($id, $name, $description, $startDate, $endDate, $image, $userid);
        EventManager::getInstance()->editEvent($event);
        QueryManager::getInstance()->updateEvent($event);
    }

} 