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
    public function loadEvents($period = false) {
        $events = QueryManager::getInstance()->getEvents($period);
        if($events) {
            foreach($events as $event) {
                $this->loadEvent($event['itemid'], $event['name'], $event['description'], $event['location'], $event['startDate'], $event['endDate'], $event['userid']);
            }
        }
        else {
            //Throw new Exception('No events found');
        }
    }

    /**
     * This function loads events into the EventManager (not a getter)
     * @param bool $id
     * @param $name
     * @param $description
     * @param $location
     * @param $start
     * @param bool $end
     * @param $userid
     */
    public function loadEvent($id = false, $name, $description, $location, $start, $end = false, $userid) {
        $event = new Event(array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'location' => $location,
            'start' => $start,
            'end' => $end,
            'userid' => $userid
        ));
        EventManager::getInstance()->addEvent($event);
    }

    /**
     * Instantiate a new event based on an array
     * Then add this event to the EventManager and the database
     * @param $event
     * @return mixed
     */
    public function addEvent($event) {
        $event = new Event($event);
        EventManager::getInstance()->addEvent($event);
        QueryManager::getInstance()->saveEvent($event);
        return $event;
    }

    /**
     * Remove an event from the database and EventManager based on an eventid
     * @param $eventId
     */
    public function removeEvent($eventId) {
        EventManager::getInstance()->removeEvent($eventId);
        QueryManager::getInstance()->deleteEvent($eventId);
    }

    /**
     * Edit an event based on an array with the event details
     * This change will then be passed on the to EventManager and the Database
     * @param $event
     */
    public function editEvent($event) {
        $event = new Event($event);
        EventManager::getInstance()->editEvent($event);
        QueryManager::getInstance()->updateEvent($event);
    }

} 