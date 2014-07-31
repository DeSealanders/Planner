<?php

class QueryManager {

    private function __construct() {

    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new QueryManager();
        }
        return $instance;
    }

    /**
     * Save a specified event
     * @param $event
     * @return array|null
     */
    public function saveEvent(Event $event) {
        $query = "INSERT INTO events (itemid, name, description, startDate, endDate, image, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = array(
            $event->getId(),
            $event->getName(),
            $event->getDescription(),
            $event->getStartDate(),
            $event->getEndDate(),
            $event->getImage(),
            $event->getUserid()
        );
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

    /**
     * Delete an event based on the eventid
     * @param $eventId the eventid of the event which needs deleting
     * @return array|null
     */
    public function deleteEvent($eventId) {
        $query = "DELETE FROM events WHERE itemid = ?";
        $params = array($eventId);
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

    /**
     * Update an existing event based on the eventid
     * @param Event $event the event to update
     * @return array|null
     */
    public function updateEvent(Event $event) {
        $query = "UPDATE events SET NAME = ?, description = ?, startDate = ?, endDate = ?, image = ?, userid = ? WHERE itemid = ?";
        $params = array(
            $event->getName(),
            $event->getDescription(),
            $event->getStartDate(),
            $event->getEndDate(),
            $event->getImage(),
            $event->getUserid(),
            $event->getId()
        );
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

    /**
     * Retrieve all events
     * @return array|null
     */
    public function getEvents($period = array()) {
        // A period is specified
        if(!empty($period)) {

            // Two dates are specified
            if(count($period) == 2) {

                // Build query using prepared statement
                $query = "SELECT * FROM events AS e WHERE (e.startDate > ? AND e.startDate < ?) OR (e.endDate > ? AND e.endDate < ?)";
                $params = array($period[0], $period[1], $period[0], $period[1]);

                // If an user is found
                if($user = UserManager::getInstance()->getUser()) {
                    $query .= " AND userid = ?";
                    $params[] = $user->getUserId();
                }
                return DatabaseManager::getInstance()->executeQuery($query, $params);
            }
        }
        // Otherwise return all events
        $query = "SELECT * FROM events";
        // If an user is found
        if($user = UserManager::getInstance()->getUser()) {
            $query .= " WHERE userid = ?";
            $params = array($user->getUserId());
            return DatabaseManager::getInstance()->executeQuery($query, $params);
        }
        return DatabaseManager::getInstance()->executeQuery($query);
    }

    public function getUserByLink($link) {
        $query = "SELECT * FROM users WHERE pagelink = ?;";
        $params = array($link);
        return DatabaseManager::getInstance()->executeQuery($query, $params);
    }

} 